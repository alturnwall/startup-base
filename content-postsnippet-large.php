<div class="post-snippet col-sm-4">
    
    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('thumbnail'); ?></a> 
    
    <!-- <div class="post-categories"><?php echo get_the_category_list(' ', 'turnwall'); ?></div> -->
    
    <h4 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"> <?php the_title(); ?> </a></h4> 
    
    <h5 class="entry-subtitle"><?php echo get_field('post_subtitle'); ?></h5>
    
    <div class="entry-meta">
        <?php echo get_the_date(); ?>
    </div>
    <div class="entry-excerpt caption">
        <?php if (has_post_thumbnail()) : ?>
            <?php //nothing ?>
        <?php else: ?>
            <?php the_excerpt(); ?>
        <?php endif; ?>
    </div>

</div>