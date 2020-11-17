<div class="post-categories">
    
  <p>
    <?php echo get_the_category_list(' ', 'turnwall'); ?>
  </p>
  
  <?php 
  $terms = get_the_terms( $post->ID, 'post_series' );
  if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
    foreach ( $terms as $term ) {
      echo '<span>|</span><a href="'. get_term_link( $term ) .'">'. $term->name .'</a>';
    }
  } 
  ?>
  
</div>