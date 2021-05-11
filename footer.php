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

  
  <?php get_template_part("inc/site_footer");?>  
  
  <?php get_template_part("inc/subscribe_modal");?>  

  <?php //include "inc/subscribe_modal.php" ?>

</div>
<?php wp_footer(); ?>
</body>
</html>