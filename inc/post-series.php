<div class="post-series-list">
  <?php 
  $terms = get_the_terms( $post->ID, 'postseries' );
  if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
    foreach ( $terms as $term ) {
      echo '<a class="post-series-title" href="'. get_term_link( $term ) .'">'. $term->name .'</a>';
    }
  } 
  ?>
</div>