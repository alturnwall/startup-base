<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package turnwall
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

	<div class="pad-bt-sm">
		<div class="container">
				<div class="row">
					<div class="col-sm-8">
							<h1 class="page-title"><?php
							if ( is_category() ) :
								printf( __( '%s', 'turnwall' ), '<span>' . single_cat_title( '', false ) . '</span>' );

							elseif ( is_tag() ) :
								printf( __( '%s', 'turnwall' ), '<small>Tagged:</small><br/><span>&ldquo;' . single_tag_title( '', false ) . '&rdquo;</span>' );

							elseif ( is_author() ) :
								/* Queue the first post, that way we know
								* what author we're dealing with (if that is the case).
								*/
								the_post();
								printf( __( '%s', 'turnwall' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
								/* Since we called the_post() above, we need to
								* rewind the loop back to the beginning that way
								* we can run the loop properly, in full.
								*/
								rewind_posts();

							elseif ( is_day() ) :
								printf( __( 'Daily Archives: %s', 'turnwall' ), '<span>' . get_the_date() . '</span>' );

							elseif ( is_month() ) :
								printf( __( 'Monthly Archives: %s', 'turnwall' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

							elseif ( is_year() ) :
								printf( __( 'Yearly Archives: %s', 'turnwall' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

							elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
								_e( 'Asides', 'turnwall' );

							elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
								_e( 'Images', 'turnwall');

							elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
								_e( 'Videos', 'turnwall' );

							elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
								_e( 'Quotes', 'turnwall' );

							elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
								_e( 'Links', 'turnwall' );

							elseif ( is_tax() ) :
								$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
								echo $term->name;

							else :
								//_e( 'Archives', 'turnwall' );

							endif;
						?></h1>

					<?php
					if ( is_category() ) :
						// show an optional category description
						$category_description = category_description();
						if ( ! empty( $category_description ) ) :
							echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );
						endif;

					elseif ( is_tag() ) :
						// show an optional tag description
						$tag_description = tag_description();
						if ( ! empty( $tag_description ) ) :
							echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
						endif;

					endif;
					?>
					
					</div>
			</div>
		</div>
	</div>

<?php 
		if ( is_tag() || is_tax('related_establishment') || is_tax('related_personality') ) : 
			//Nothing
		else :
			get_template_part( 'content', 'featuredloop' );
		endif;
	
	get_template_part('content', 'archiveloop');

	else : // no posts
		get_template_part( 'no-results', 'archive' );
	endif; 
?>

<?php get_footer(); ?>