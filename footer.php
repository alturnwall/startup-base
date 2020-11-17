<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package turnwall
 */
?>
    <?php
    //     if ( is_page_template('page-resources-home.php') || is_post_type_archive('resources') || is_tax('resource_type') || is_tax('resource_series') || is_singular('resources') ) :
    //     include"inc/resources_footer.php";

    //     elseif ( is_post_type_archive('customer_stories') || is_singular('customer_stories') ) :
    //         include"inc/customer_stories_footer.php";

    //     elseif ( is_page_template('page-help-center-home.php') || is_post_type_archive('help_article') || is_singular('help_article') || is_singular('tech_docs') || is_tax('help_category') || is_tax('help_article_type') ) :
    //         include"inc/help_footer.php";

    //     elseif ( is_home() || is_singular('post') || is_category() || is_tag() || is_tax() || is_page_template('page-blog-home.php') || is_page_template('page-flex-resource.php')  || is_404()  ) :
    //         include"inc/blog_footer.php";

    // endif; 
  ?>

  </div><!-- end .public-body-container -->

  <footer class="site-footer hidden-print text-dark">
    <div class="container">

      <div class="footer-head">
        <!-- <div class="row">
          <div class="col-md-6 grid-center">
            <?php //include "inc/brand_logo_lockup.php" ?>
          </div>
          <div class="col-md-6 grid-center text-right">

          </div>
        </div> -->
      </div>
      
      <!-- <div class="row">
        <div class="col-md-12 p-b-xl">
          <p class="font-xl header">Text here.</p>
        </div>
      </div> -->

      <div class="row">
        <div class="col-md-6 p-r-xl">
        <?php include "inc/brand_logo_lockup.php" ?>
          <!-- <p><span class="header">Text here.</p> -->
          <?php //include "inc/form_mailchimp_subscribe.php";?>
        </div>
        <div class="col-md-6 footer-menu">
          <?php wp_nav_menu( 
            array( 
              'theme_location' => 'footer-1', 
              'fallback_cb' => false,
            ) 
          ); ?>
        </div>
      </div>
      
      <?php //echo do_shortcode("[social-links]"); ?>

      <div class="row">
        <div class="col-md-12 footer-sub">
          <p class="font-sm">&copy; <?php echo date("Y"); ?> 
            <?php echo get_bloginfo( $show, 'display' ); ?>
          </p>
        </div>
      </div>
    </div>
  </footer>

  <?php include "inc/subscribe_modal.php" ?>

</div>
<?php wp_footer(); ?>
</body>
</html>