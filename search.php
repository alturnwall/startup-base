<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package turnwall
 */

get_header(); ?>

<div class="section page-default">
	<div class="container">
		<div class="row">
			<div id="content" class="col-xs-12 site-content" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'turnwall' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->

				<?php get_template_part( 'content', 'archiveloop' ); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'search' ); ?>

			<?php endif; ?>

			</div><!-- #content -->
		</div><!-- #primary -->
	</div>
</div>
<?php get_footer(); ?>