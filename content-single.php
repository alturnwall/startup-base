<?php /*
    Template Part for displaying default posts
*/ ?>

<!-- Start Top Header Layout -->
<?php  
// $layout = get_field("post_header_layout");
    
  if( $layout == 'full_width'): ?>
    <?php 
      if (has_post_thumbnail()) : 
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
        $url = $thumb['0'];
      endif;
    ?>
    <div class="section post-header post-header-full" style="background-image: url(<?php echo $url; ?>);">
      <header class="entry-header dark">
        <?php include 'inc/post-cats.php'; ?>
        <h1 class="entry-title"><?php the_title(); ?></h1> 
        <h4 class="entry-subtitle"><?php //echo get_field('post_subtitle'); ?></h4>
      </header>
    </div>


  <?php elseif( $layout == 'no_image' ): ?>
      <div class="section post-header post-header-noimage">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 p-b-md">
              <header class="entry-header">
                <?php include 'inc/post-cats.php'; ?>
                <h1 class="entry-title"> <?php the_title(); ?> </h1> 
                <h4 class="entry-subtitle"><?php //echo get_field('post_subtitle'); ?></h4>
              </header>
            </div>
          </div>
        </div>
      </div>


  <?php elseif( $layout == 'side_image' ): ?>
        <?php 
            if (has_post_thumbnail()) : 
                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
                $url = $thumb['0'];
            endif;
        ?>
        <div class="section post-header post-header-side">
            <div class="col-sm-6 featured-image" style="background-image: url(<?php echo $url; ?>);">
            </div>
            <div class="col-sm-6 dark-grey">
                <header class="entry-header dark">
                    <?php include 'inc/post-cats.php'; ?>
                    <h1 class="entry-title"> <?php the_title(); ?> </h1> 
                    <h2 class="entry-subtitle"><?php //echo get_field('post_subtitle'); ?></h2>
                </header>
            </div>
        </div>


  <?php else: ?>
    <section class="post-header post-header-default">
      <div class="container">
        <div class="row">
          
          <div class="<?php 
            if ( has_post_thumbnail() ) : 
              echo 'col-sm-5';
            else : 
              echo 'col-sm-8 p-b-md';
            endif; ?>">
            <header class="entry-header">
              <p>
                <?php get_template_part('inc/blog-homelink'); ?>
                &nbsp;/&nbsp;<?php echo get_the_category_list(' ', 'turnwall'); ?>
              </p>
              <h1 class="entry-title"><?php the_title(); ?></h1> 
              <!-- <?php //if (get_field('post_subtitle')) : ?>
                <p class="entry-subtitle"><?php //echo get_field('post_subtitle'); ?></p>
              <?php //endif; ?> -->
            </header>
          </div>
          
          <?php if (has_post_thumbnail()) : ?>
            <div class="col-sm-7">
              <?php the_post_thumbnail('large'); ?>
            </div>
          <?php endif; ?>
          
        </div>
      </div>
    </section>

  <?php endif; ?>

<!-- End Top Header Layout -->


<div class="container">
  <div class="row" style="position: relative !important;">
    <div class="col-sm-2 blog-side-col">
      <div class="entry-meta">
        
        <?php 
        // $authors = get_field('post_byline');
        if( $authors ): ?>
        <span class="meta-author">
          <?php foreach( $authors as $post ): // variable MUST be called $post (IMPORTANT) ?>
            <?php setup_postdata($post); ?>
            <a class="byline-photos" href="<?php echo get_permalink( $post->ID ); ?>">
              <span class="byline-photo">
                <?php the_post_thumbnail(); ?>
              </span>
              <span class="byline-photo-name"><?php echo get_the_title( $post->ID ); ?></span>
            </a>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
          <?php endforeach; ?>
        </span>
        <?php endif; ?><br/>

        <span class="meta-date"><?php echo get_the_date(); ?></span><br/>
        
        <div class="meta-cats">
        <?php
          /* translators: used between list items, there is a space after the comma */
          $category_list = get_the_category_list( __( ', ', 'turnwall' ) );

          /* translators: used between list items, there is a space after the comma */
          $tag_list = get_the_tag_list( '', __( ', ', 'turnwall' ) );

          if ( ! turnwall_categorized_blog() ) {
              // This blog only has 1 category so we just need to worry about tags in the meta text
              if ( '' != $tag_list ) {
                  $meta_text = __( 'Tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'turnwall' );
              } else {
                  $meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'turnwall' );
              }

          } else {
              // But this blog has loads of categories so we should probably display them here
              if ( '' != $tag_list ) {
                  $meta_text = __( 'Posted in %1$s and tagged %2$s.', 'turnwall' );
              } else {
                  $meta_text = __( 'Posted in %1$s.', 'turnwall' );
              }

          } // end check for categories on this blog

          printf(
              $meta_text,
              $category_list,
              $tag_list,
              get_permalink(),
              the_title_attribute( 'echo=0' )
          );
          ?>
        </div>
      </div>
      
      <div class="social-share">
        <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
      </div>

    </div>
    <div class="col-sm-7">
      <article id="post-<?php the_ID(); ?>" class="post-content">

        <?php 
        $terms = get_the_terms( $post->ID, 'post_series' );
        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ):
          foreach ( $terms as $term ) : ?>
            <div class="series-info">
              <?php echo $term->description; ?><br/>
              <a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?> &rarr;</a> 
            </div>
        <?php endforeach; endif; ?>

        <?php the_content(); ?>

        <?php if ( in_category( 'press' ) ) : ?>
          <p class="press-source-text">An excerpt from 
            <?php 
            $terms = get_the_terms( $post->ID, 'news_source' );
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ):
              foreach ( $terms as $term ) : ?>
                <span><?php echo $term->name; ?></span> 
            <?php endforeach; endif; ?>
          </p>
          <a class="transition press-article-link brandon-bold" href="<?php //the_field('press_article_link'); ?>" target="_blank">
              <div class="press-arrow-wrapper"><span class="bevicon bevico-arrow-forward arrow-rotate-diagonal"></span></div>Read the Full Article <br>on<?php 
              $terms = get_the_terms( $post->ID, 'news_source' );
              if ( ! empty( $terms ) && ! is_wp_error( $terms ) ):
                  foreach ( $terms as $term ) : ?>
                  <?php echo $term->name; ?>
              <?php endforeach; endif; ?>
          </a>
        <?php ;
        endif; ?>
      </article>
    </div>
  </div>
</div>