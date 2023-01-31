<div class="section pad-bt-sm">
  <div id="content" class="container" role="main">
    <hr class="rule-lg"/>
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-10">
        <?php while ( have_posts() ) : the_post();
          include(locate_template('content-archivepost.php')); 
        endwhile; ?>
        <?php base_pagination(); ?>
      </div>
    </div>
  </div>
</div>