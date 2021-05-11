<div class="section read-more-posts p-t-md p-b-xl">
  <div class="container">
    <hr class="rule"/>
    <div class="row">
      <?php
        // Create the "Get posts in this section" area for posts.
        global $post;
        $cat_ID=array();
        $categories = get_the_category(); 
        foreach($categories as $category) {
            array_push($cat_ID,$category->cat_ID);
        }
      ?>
      <div class="col-xs-12">
        <h6>More in
        <?php
          /* translators: used between list items, there is a space after the comma */
          $category_list = get_the_category_list( __( ' and ', 'nunews' ) );
          $meta_text = __( '%1$s', 'nunews' );
          printf(
            $meta_text,
            $category_list,
            get_permalink(),
            the_title_attribute( 'echo=0' )
              );
            ?>
        </h6>
      </div>
      <div class="col-xs-12">
        <div class="row">
          <?php
          $args = array(
              'orderby' => 'date',
              'order' => 'DESC',
              'post_type' => 'post',
              'posts_per_page' => 4,
              'post__not_in' => array($post->ID),
              'category__and' => $cat_ID
          );
          $query = new WP_Query( $args );
              while ( $query->have_posts()) : $query->the_post();
                  get_template_part('content', 'postsnippet');
              endwhile;
          wp_reset_postdata();
          ?>
        </div>
      </div>
    </div>
  </div>
</div>