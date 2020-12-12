<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package turnwall
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

  <!-- Google Analytics Goes Here -->
  <!-- End gtag -->

  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

  <span id="top"></span>
  
  <div id="page" class="hfeed site">
  
    <?php do_action( 'before' ); ?>
    
    <header class="public-header transition header-top">
      <?php //include "inc/global-alert-banner.php";?>
      <?php include "inc/nav-main.php";?>  
    </header>

    <header class="mobile-header">
      <div class="mobile-header-inner">
        <?php include "inc/brand_logo_lockup.php" ?>
      </div>
    </header>
    
    <a class="navbar-toggle">
      <span class="one"></span>
      <span class="two"></span>
      <span class="three"></span>
    </a>

    <div class="section public-body-container">
    
    <?php
      if ( is_home() || is_singular('post') || is_category() || is_tag() || is_tax() || is_page_template('page-blog-home.php') || is_page_template('page-flex-resource.php')  || is_404()  ) :
        include "inc/nav-blog.php";
     endif; 
    ?>