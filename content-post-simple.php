<div class="col-xs-6 col-sm-3">
    <a class="post-simple-snippet" href="<?php the_permalink(); ?>" rel="bookmark">
        <?php the_post_thumbnail('thumbnail'); ?> 
        <h5 class="entry-title"><?php the_title(); ?></h5>
    </a>
</div>
<?php if ( $count % 2 == 0 ) : ?>
	<span class="clear-xs"></span>
<?php endif; ?>