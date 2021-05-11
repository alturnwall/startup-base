<div class="col-xs-12 col-sm-3 p-b-lg">  
  <a class="post-snippet" href="<?php the_permalink(); ?>" rel="bookmark">
    
    <?php the_post_thumbnail('thumbnail'); ?>
    
    <!-- <div class="post-categories">
      <?php //echo get_the_category_list(' ', 'turnwall'); ?>
    </div> -->
    
    <h4 class="entry-title"><?php the_title(); ?></h4> 
    
    <!-- <h5 class="entry-subtitle"><?php //echo get_field('post_subtitle'); ?></h5> -->
    
  </a> 
</div>