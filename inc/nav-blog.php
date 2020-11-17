<?php
  if ( is_page_template('page-blog-home.php') ) : ?>

  <header class="blog-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-6">
          <!-- <a class="secondary-head" href="<?php echo home_url(); ?>/blog/">
            Blog.
          </a> -->
          <!-- <span class="detail">The Connected Proof blog.</span> -->
          <?php //wp_nav_menu( array( 'theme_location' => 'blog' ) ); ?>
        </div>
        <!-- <div class="col-xs-6 text-right">
          <a class="button button-outline button-small subscribe-button button-modal" data-target="#subscribe-default">Subscribe</a>
        </div> -->
    </div>
  </header>

<?php elseif ( is_home() || is_category() || is_tag() || is_tax()  ) : 
// is_singular('post') 
?>
    
  <header class="blog-header">
    <div class="container">          
      <!-- <a class="blog-back button button-text button-small" href="<?php echo home_url(); ?>/blog/">
        <span class="theme-icon icon-arrow_back icon-before"></span>
        <span class="font-secondary">Blog.</span>
      </a> -->
      <p>
        <a class="" href="<?php echo home_url(); ?>/blog/">
          <span class="">Blog</span>
        </a>
      </p>

    </div>
  </header>

<?php endif; ?>