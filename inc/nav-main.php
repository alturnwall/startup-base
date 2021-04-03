<nav class="public-navbar-main nav-top" role="navigation">
  <div class="container">
    <div class="nav-wrapper">
      <div class="nav-brand">
        <?php get_template_part("inc/brand_logo_lockup");?>  
      </div>
      <div class="nav-menu">
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
      </div>
    </div>
  </div>
  <?php 
    // if ( is_home() || is_singular('post') || is_category() || is_tag() || is_tax() || is_page_template('page-blog-home.php') ) :
    //   include "nav-blog.php";
    // endif; 
  ?>
</nav>