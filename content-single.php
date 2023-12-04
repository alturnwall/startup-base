<?php /*
    Template Part for displaying default posts
*/ ?>

<!-- Start Top Header Layout -->

<section class="post-header post-header-default">
  <div class="container">
    <div class="row">
      
      <div class="<?php 
        if ( has_post_thumbnail() ) : 
          echo 'col-sm-5';
        else : 
          echo 'col-sm-8 p-b-md';
        endif; ?>">
        <header class="post-header">
          <p class="single-cats-breadcrumbs">
            <?php get_template_part('inc/blog-homelink'); ?> &nbsp;/&nbsp; <?php echo get_the_category_list(' ', 'turnwall'); ?>
          </p>
          
          <?php get_template_part( 'inc/post-series' ); ?> 

          <h1 class="entry-title"><?php the_title(); ?></h1> 
          
          <?php //if (get_field('post_subtitle')) : ?>
            <!-- <p class="entry-subtitle"><?php //echo get_field('post_subtitle'); ?></p> -->
          <?php //endif; ?>

          <?php if ( has_excerpt() ) : // Only show custom excerpts not autoexcerpts ?>
              <span class="entry-subtitle"><?php echo get_the_excerpt(); ?></span>
          <?php endif; ?>

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

<!-- End Top Header Layout -->


<div class="container">
  <div class="row" style="position: relative !important;">
    <div class="col-sm-2 blog-side-col">
      
      <div class="entry-meta">
        
        <?php get_template_part( 'content', 'readingtime' ); ?> 

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
                  $meta_text = __( '<p>Tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.</p>', 'turnwall' );
              } else {
                  $meta_text = __( '<p>Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.</p>', 'turnwall' );
              }

          } else {
              // But this blog has loads of categories so we should probably display them here
              if ( '' != $tag_list ) {
                  $meta_text = __( '<p>Posted in %1$s and tagged %2$s.</p>', 'turnwall' );
              } else {
                  $meta_text = __( '<p>Posted in %1$s.</p>', 'turnwall' );
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
      
      <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) :?> 
        <div class="social-share">
          <?php ADDTOANY_SHARE_SAVE_KIT();?>
        </div>
      <?php endif; ?>
      
    </div>
    <div class="col-sm-7">
      <article id="post-<?php the_ID(); ?>" class="post-content">

        <?php 
        $terms = get_the_terms( $post->ID, 'postseries' );
        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ):
          foreach ( $terms as $term ) : ?>
            <div class="series-info">
              <p>
                <?php echo $term->description; ?>
                <br/>
                <a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?> Series &rarr;</a> 
              </p>
            </div>
        <?php endforeach; endif; ?>

        <?php the_content(); ?>

      </article>
    </div>
  </div>
</div>