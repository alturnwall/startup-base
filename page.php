<?php
get_header(); 
while ( have_posts() ) : the_post(); 
?>

<div class="section page-default p-t-lg">
    <?php the_content(); ?>
</div>


<?php //include('inc/flex-content.php'); ?>
<?php //the_field("adwords_conversion_code"); ?>
<?php endwhile; ?>
<?php get_footer(); ?>