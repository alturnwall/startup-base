<?php 
$terms = get_the_terms( $post->ID, 'postseries' );
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){?>
  <p class="post-series-list">&nbsp;/&nbsp; 
  <?php foreach ( $terms as $term ) {
      echo '<a class="post-series-title" href="'. get_term_link( $term ) .'">'. $term->name .' Series</a>';
    }?>
  </p>
<?php }; ?>