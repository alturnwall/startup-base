<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package turnwall
 */

get_header(); ?>
<div class="container">

	<div class="row p-t-lg p-b-lg">
		<div class="col-xs-12 error">
			<span>
				<?php _e( '404 error', 'turnwall' ); ?>
			</span>
			<header class="entry-header">
				<h1 class="entry-title error-msg p-b-sm">
					Whoops, we can&rsquo;t seem to find that.
					<!-- <b><?php //_e( 'Whoops, we can&apos;t find that page&hellip;', 'turnwall' ); ?></b> -->
					<!-- <br/><?php // _e( 'Try searching for it.', 'turnwall' ); ?> -->
				</h1>
				<p class="font-xl">Sorry partner, you're just going to have to head <a href="<?php echo home_url(); ?>">home</a>.</p>
			</header>
		</div>
	</div>

	<div class="row p-b-3xl">
		<div class="col-sm-6 p-b-sm grid-center">
			<p class="font-lg">Rest assured, somebody has been notified to prevent this from happening to an unsuspecting visitor in the future.</p>
		</div>
		<div class="col-sm-6 p-b-sm">
			<!-- <iframe seamless="seamless" style="width: 100%; border: none; display: block; max-width: 595px; height: 460px;" src="https://getyarn.io/yarn-clip/embed/4bb8fec7-3ede-42c9-96a0-8c8d34ce101b?autoplay=false"> </iframe> -->
		</div>
	</div>
	
	<!-- <div class="row">
		<div class="col-xs-12 content-block-404">
			<hr/>
			<h4 class="space-bt-xs"><i>the</i> Blog</h4>
		</div>
	</div> -->

	<!-- <div class="row">
		<?php 	
				// $p_loop = new WP_Query( array( 	
				//     'post_type' => 'post',	
				//     'showposts' => '6',	
				// ));	
				// if ( $p_loop->have_posts() ) :	
				//     while ( $p_loop->have_posts() ) : $p_loop->the_post();	
				//         include(locate_template('content-archivepost.php')); 
				//     endwhile; 	
				//     wp_reset_postdata(); 	
				// endif;  	
			?> 	
	</div>
	<div class="row">
		<div class="col-sm-12 text-center pad-tp-md pad-bt-sm">
			<p><a href="<?php echo home_url(); ?>/archive/">See All Articles &rarr;</a></p>
		</div>
	</div> -->

</div>
<?php get_footer(); ?>