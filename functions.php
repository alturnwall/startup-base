<?php
/**
 * basetheme functions and definitions
 *
 * @package basetheme
 */


/*
	General basetheme Setup
*/
if ( ! function_exists( 'basetheme_setup' ) ) :
function basetheme_setup() {

	load_theme_textdomain( 'turnwall', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'basetheme' ),
		'footer-1' => __( 'Footer Menu 1', 'basetheme' ),
	) );

	// REMOVE WP EMOJI
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
}
endif;
add_action( 'after_setup_theme', 'basetheme_setup' );


// Additional settings from default theme
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/jetpack.php';

// Additional settings for customizations for theme
require get_template_directory() . '/functions/admin_editor.php';

// WP Advanced Search
//require_once('wp-advanced-search/wpas.php');

function basetheme_scripts() {

	// Default Styles
	wp_enqueue_style( 'basetheme-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));

	// Default Scripts
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array('jquery'), '3.1.1');
	// wp_enqueue_script( 'cookie', get_template_directory_uri() . '/js/js.cookie.js', '2.2' );
	wp_enqueue_script( 'base', get_template_directory_uri() . '/js/base.js', array('jquery'), '3.6' );

	// Single Posts with commenting turned on
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'basetheme_scripts' );



add_action( 'wp_print_styles', 'my_deregister_styles', 100 );
function my_deregister_styles() {
	wp_deregister_style( 'wp-pagenavi' );
  // deregister as many stylesheets as you need...
}



/*
	Custom Post Types and Taxonomies
*/
add_action( 'init', 'create_parent_post_types' );
function create_parent_post_types() {


	// Create "Post Display"
	register_taxonomy('post_display',
	  array( 'post' ),
	  array(
			'hierarchical' => true,
			'has_archive' => false,
			'label' => __('Display'),
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'post_display' ),
			'show_in_rest' => true,
	  )
	);

}
/* End Custom post types and taxonomies */









// Add classes to the <body> element
function custom_cat_body_classes( $classes ){

	// Added so we can get custom field values from page loop
	global $wp_query;
	$postid = $wp_query->post->ID;
	$page_options = get_post_meta($postid, 'show_template_parts', true);

	// if has custom field to hide main menu
	if( is_array($page_options) && in_array('hide_nav', $page_options) ) {
	    $classes[] = 'hide_menu';
	};

	// if has custom field to hide footer
	if( is_array($page_options) && in_array('hide_footer', $page_options) ) {
	    $classes[] = 'hide_footer';
	};

	// this whole statement needs to be here to control...
	// BOTH the help center and blog section styling
	if( is_tax('resource_type') || is_tax('resource_series') ) {
		// the first statement need to be empty
		$classes[] = '';
	}
	elseif( is_in_help_center() ) {
	    // help center
	    $classes[] = 'help_center';
	}
	elseif( is_in_blog_section() ) {
	    // blog section
	    $classes[] = 'blog_section';
	};

	if( is_singular() ) {
		// custom categories
		$custom_terms = get_the_terms(0, 'category');
		if ($custom_terms) {
			$classes[] = 'has_category';
			foreach ($custom_terms as $custom_term) {
				$classes[] = 'category-' . $custom_term->slug;
			}
		}
		//post-display
		$post_display_terms = get_the_terms(0, 'post_display');
		if ($post_display_terms) {
			$classes[] = 'has_display';
			foreach ($post_display_terms as $post_display_term) {
				$classes[] = 'display-' . $post_display_term->slug;
			}
		}
	}
	return $classes;

	//reset loop from global
	wp_reset_query();
}
add_filter( 'body_class', 'custom_cat_body_classes' );



// Global Options Pages for ACF
if( function_exists('acf_add_options_page') ) {
	//Parent
	$parent = acf_add_options_page(array(
		'page_title' 	=> 'Sitewide General Settings',
		'menu_title'	=> 'Global Options',
		'menu_slug' 	=> 'sitewide-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	//Child
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Call-To-Action',
		'menu_title'	=> 'CTA',
		'menu_slug' 	=> 'call-to-action',
		'parent_slug' 	=> $parent['menu_slug'],

	));
}


//Add Shortcode for social icons
function social_links_shortcode() {
	ob_start();
		get_template_part('content','social_links');
	return ob_get_clean();
}
add_shortcode( 'social-links', 'social_links_shortcode' );



// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
	if ( is_page_template('page-press.php') ) {
    	return '...';
    }
  else {
		// return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Read the full article...</a>';
		return '...';
	}
}
add_filter('excerpt_more', 'new_excerpt_more');



//Modify the main (index) archive loop
// Do Not include "main-feature" posts, since we include them elsewhere
function main_archive_loop($query) {

	//Help Category Taxonomy Pages
	// if( !is_admin() && is_tax('help_category') && $query->is_main_query() ) {
	// 	$query->set( 'tax_query', array(
	// 		array(
	// 				'taxonomy' => 'help_article_display',
	// 				'terms' => array('help-category-feature'),
	// 				'field' => 'slug',
	// 				'operator' => 'NOT IN',
	// 			  )
	// 	 ));
	// 	$query->set( 'posts_per_page', -1 );
	// }
	//Help Article Type Taxonomy Pages
	// elseif( !is_admin() && is_tax('help_article_type') && $query->is_main_query() ) {
	// 	$query->set( 'tax_query', array(
	// 		array(
	// 				'taxonomy' => 'help_article_display',
	// 				'terms' => array('help-category-feature'),
	// 				'field' => 'slug',
	// 				'operator' => 'NOT IN',
	// 			  )
	// 	 ));
	// 	$query->set( 'posts_per_page', -1 );
	// }
	
	// // Blog Category Pages
	// if( !is_admin() && is_category() && $query->is_main_query() ) {
	// 	$query->set( 'tax_query', array(
	// 	  array(
	// 			'taxonomy' => 'post_display',
	// 			'terms' => array('featured'),
	// 			'field' => 'slug',
	// 			'operator' => 'NOT IN',
	// 		  )
  // 		));
	// }
	// // Blog Homepage Features
	// elseif( !is_admin() && $query->is_main_query() ) {
	// 	$query->set( 'tax_query', array(
	// 	  array(
	// 			'taxonomy' => 'post_display',
	// 			'terms' => array('main-feature'),
	// 			'field' => 'slug',
	// 			'operator' => 'NOT IN',
	// 		  )
  // 		));
	// }
}
add_action( 'pre_get_posts', 'main_archive_loop' );



// Filter the main search archive loop to only return blog posts
function blog_search_filter($query) {
	if ( !is_admin() && $query->is_main_query() ) {
	    if ($query->is_search) {
	      $query->set('post_type', array( 'post' ) );
	    }
	 }
}
add_action( 'pre_get_posts', 'blog_search_filter' );



// Remove Default Jetpack Share icons
// Only removing from the_excerpt, uncomment the_content to remove from posts
// ... in order to place where you want in design.
// function jptweak_remove_share() {
//     remove_filter( 'the_content', 'sharing_display',19 );
//     remove_filter( 'the_excerpt', 'sharing_display',19 );
//     if ( class_exists( 'Jetpack_Likes' ) ) {
//         remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
//     }
// }
// add_action( 'loop_start', 'jptweak_remove_share' );



// Change header current states
function my_special_nav_class( $classes, $item ) {
    if ( is_post_type_archive('case_study') || is_singular('case_study') || is_tax('case_study_tag') ) {
        if (in_array('menu-item-3355', $classes)) {
        	$classes[] = 'current-menu-item';
        }
    }
    elseif ( is_post_type_archive('resources') || is_tax('resource_type') || is_singular('resources') || is_tax('resource_type') ) {
        if (in_array('menu-item-3145', $classes)) {
        	$classes[] = 'current-menu-item';
        }
    }
    elseif ( is_archive() || is_home() || is_singular('post')  ) {
        if (in_array('menu-item-497', $classes)) {
        	$classes[] = 'current-menu-item';
        }
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'my_special_nav_class', 10, 2 );



//Resources Archive set posts per page
// function set_posts_per_page_resources_archive($query)
// {
//     if ($query->is_main_query() && $query->is_post_type_archive('resources') && ! is_admin() )
//         $query->set('posts_per_page', 12);
// }
// add_action('pre_get_posts', 'set_posts_per_page_resources_archive');



//Remove (remove-from-archive) Resources Type from Resources archive and resources type archive
function resources_type_remove($query)
{
    if (
    		( $query->is_main_query() && $query->is_tax('resource_type') && ! is_admin() )
    		|| ( $query->is_main_query() && $query->is_post_type_archive('resources') && ! is_admin() )
    	)
    	$query->set( 'tax_query', array(
		  array(
				'taxonomy' => 'resource_display',
				'terms' => array('remove-from-archives'),
				'field' => 'slug',
				'operator' => 'NOT IN',
			  )
  		));
}
add_action('pre_get_posts', 'resources_type_remove');



//Case Studies Archive set posts per page
function set_posts_per_page_case_study_archive($query)
{
    if ($query->is_main_query() && $query->is_post_type_archive('case_study') && ! is_admin())
        $query->set('posts_per_page', 12);
}

add_action('pre_get_posts', 'set_posts_per_page_case_study_archive');



/*
 * Replace Taxonomy slug with Post Type slug in url
 * Version: 1.1
 */
function taxonomy_slug_rewrite($wp_rewrite) {
    $rules = array();
    // get all custom taxonomies
    $taxonomies = get_taxonomies(array('_builtin' => false), 'objects');
    // get all custom post types
    $post_types = get_post_types(array('public' => true, '_builtin' => false), 'objects');

    foreach ($post_types as $post_type) {
        foreach ($taxonomies as $taxonomy) {

            // go through all post types which this taxonomy is assigned to
            foreach ($taxonomy->object_type as $object_type) {

                // check if taxonomy is registered for this custom type
                if ($object_type == $post_type->rewrite['slug']) {

                    // get category objects
                    $terms = get_categories(array('type' => $object_type, 'taxonomy' => $taxonomy->name, 'hide_empty' => 0));

                    // make rules
                    foreach ($terms as $term) {
                        $rules[$object_type . '/' . $term->slug . '/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug;
                    }
                }
            }
        }
    }
    // merge with global rules
    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
add_filter('generate_rewrite_rules', 'taxonomy_slug_rewrite');



//Custom RSS Feed
add_action('init', 'customRSS');
function customRSS(){
        add_feed('blog_email_feed', 'customRSSFunc');
}
function customRSSFunc(){
    get_template_part('rss', 'blog_email_feed');
}



// Check if a page is a child decendant of another page
// Example use:
// is_descendant('about-us');
// is_descendant(123);
// is_descendant('about-us', 134);
function is_descendant($ancestor, $tofind = 0) {
    global $post;
    if ($tofind == 0) $tofind = $post->ID;
    $arrpostids = get_post_ancestors($tofind);
    $arrpostslugs = array();
    foreach($arrpostids as $postid) {
        $temppost = get_post($postid);
        array_push($arrpostslugs, $temppost->post_name);
    }
    return (in_array($ancestor, $arrpostids) || in_array($ancestor, $arrpostslugs));
}



/**
 * Pagination for archive, taxonomy, category, tag and search results pages
 *
 * @global $wp_query http://codex.wordpress.org/Class_Reference/WP_Query
 * @return Prints the HTML for the pagination if a template is $paged
 */
function base_pagination() {
  global $wp_query;

  $big = 999999999; // This needs to be an unlikely integer

  // For more options and info view the docs for paginate_links()
  // http://codex.wordpress.org/Function_Reference/paginate_links
  $paginate_links = paginate_links( array(
      'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
      'current' => max( 1, get_query_var('paged') ),
      'total' => $wp_query->max_num_pages,
      'mid_size' => 5
  ) );

  // Display the pagination if more than one page is found
  if ( $paginate_links ) {
      echo '<div class="pagination col-xs-12">';
      echo $paginate_links;
      echo '</div><!--// end .pagination -->';
  }
}



/*
	Global re-usable functions for the conditionals
*/
function is_in_help_center() {
    $is_in_cond = is_page_template('page-help-center-home.php') || is_page_template('page-help-search-results.php') || is_post_type_archive('help_article') || is_singular('help_article') || is_singular('tech_docs') || is_tax('help_category') || is_tax('help_article_type') || is_descendant('help') ;
    return $is_in_cond;
}
function is_in_blog_section() {
    $is_in_cond = is_home() || is_singular('post') || is_category() || is_tag() || is_tax() || is_page_template('page-blog-home.php') || is_page_template('page-craft.php') || is_descendant('blog') ;
    return $is_in_cond;
}
function is_in_resources_section() {
    $is_in_cond = is_page_template('page-flex-resource.php') || is_page_template('page-resources-home.php') || is_tax('resource_type') || is_tax('resource_series') || is_singular('resources') || is_post_type_archive('resources') ;
    return $is_in_cond;
}
function is_in_case_study() {
    $is_in_cond = is_singular('case_study') || is_post_type_archive('case_study');
    return $is_in_cond;
}


/*
	Fin.
*/