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

    <div class="row">
      <div class="col-md-6 p-r-xl">

      <?php get_template_part("inc/brand_logo_lockup");?> 

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