<?php
/**
 * The Template for displaying all single posts.
 *
 * @package turnwall
 */
get_header(); 
while ( have_posts() ) : the_post();

    get_template_part( 'content', 'single' );

    if ( comments_open() || '0' != get_comments_number() ) comments_template(); 

    //theme_content_nav( 'nav-below' );

    get_template_part( 'inc/blog-moreposts' );

endwhile;
get_footer(); ?>