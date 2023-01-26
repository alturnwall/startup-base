<article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12'); ?>>
  <div class="row">
    
    <div class="col-md-2 col-sm-5 col-xs-12">
      <?php include 'inc/post-cats.php'; ?>
      <?php get_template_part( 'content', 'readingtime' ); ?>
    </div>
    
    <div class="col-sm-6 col-sm-7 col-xs-12">
      <header class="entry-header">
        <h4>
          <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h4> 
      </header>
      <?php the_excerpt(); ?>
      <!-- <div class="entry-meta">
        <?php //echo get_the_date(); ?>
      </div> -->
    </div>

    <div class="col-md-4 col-sm-5 col-xs-12">
      <?php if (has_post_thumbnail()) : ?> 
        <a href="<?php the_permalink(); ?>" rel="bookmark" class="post-thumb">
            <?php the_post_thumbnail('thumbnail'); ?>
        </a> 
      <?php endif; ?> 
    </div>

  </div>
</article>