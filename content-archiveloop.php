<div class="section pad-bt-sm">
  <div id="content" class="container" role="main">
    <div class="row">
      <?php while ( have_posts() ) : the_post();
        include(locate_template('content-archivepost.php')); 
      endwhile; ?>
      <?php base_pagination(); ?>
    </div>
  </div>
</div>