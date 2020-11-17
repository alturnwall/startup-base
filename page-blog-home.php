<?php
/* Template Name: S - Blog Home */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<div class="container p-t-lg">
  <div class="row">
    <div class="col-sm-7">
      <h1>CP Blog</h1>
      <p class="font-lg">Our latest updates, plus insights and educational material on tech, engineering, design & business.</p>
      <?php //the_content(); ?>
    </div>
  </div>
</div>

<?php
  // Cover Story Vars
  $cover_vars = get_field('blog_cover_story');
  $cover_id = array();
  foreach($cover_vars as $post_object):
    $cover_id[] = ''.$post_object->ID.', ';
  endforeach;

  // Secondary Story Vars
  $secondary_vars = get_field('blog_secondary_features');
  $secondary_id = array();
  foreach($secondary_vars as $post_object):
    $secondary_id[] = ''.$post_object->ID.', ';
  endforeach;

  $excluded_vars = array_merge($cover_id, $secondary_id);
?>

<div class="container blog-home-feature featured-posts">
    <div class="row">
        <?php 
            if ($cover_vars) : 
                $args = array(
                    'post_type' => 'post',
                    'post__in' => $cover_id,
                    'showposts' => '-1'
                );
                $hpquery = new WP_Query( $args );
                if ( $hpquery->have_posts()) :
                    usort($hpquery->posts, function($a, $b) use ($hpid) {
                    return array_search($a->ID, $hpid) - array_search($b->ID, $hpid);
                });
                while ( $hpquery->have_posts()) : $hpquery->the_post();

                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
                $url = $thumb['0'];

        ?>  
            <article id="post-<?php the_ID(); ?>" class="cover-post col-xs-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-8">
                        <a class="featured-image" style="background-image: url(<?php echo $url; ?>);" href="<?php the_permalink(); ?>" rel="bookmark">
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <header class="entry-header"> 
                            <!-- <h6><?php include 'inc/post-cats.php'; ?></h6> -->
                            <h4 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"> <?php the_title(); ?> </a></h4> 
                        </header>
                        <div class="hentry-content"><?php the_excerpt(); ?></div>
                        <div class="entry-meta"><?php echo get_the_date(); ?></div>
                    </div>
                </div>
            </article>

        <?php 
                endwhile; 
                wp_reset_postdata(); 
            endif;
        endif; 
        ?> 
        <div class="col-sm-12">
            <div class="row">
            <?php 
                //$hpvars = get_field('blog_secondary_features');
                if ($secondary_vars) : 
                    $args = array(
                        'post_type' => 'post',
                        'post__in' => $secondary_id,
                        'showposts' => '-1'
                    );
                    $hpquery = new WP_Query( $args );
                    if ( $hpquery->have_posts()) :
                        usort($hpquery->posts, function($a, $b) use ($hpid) {
                        return array_search($a->ID, $hpid) - array_search($b->ID, $hpid);
                    });
                    while ( $hpquery->have_posts()) : $hpquery->the_post();

                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
                    $url = $thumb['0'];
            ?>  
                <article id="post-<?php the_ID(); ?>" class="feature-secondary col-sm-6">
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background-image: url(<?php echo $url; ?>);">
                    </article></a>
                    <div class="pad-tp-xs">
                        <?php //include 'inc/post-cats.php'; ?>
                        <h4><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
                        <div class="hentry-content"><?php the_excerpt(); ?></div>
                        <div class="entry-meta"><?php echo get_the_date(); ?></div>
                    </div>
                </article>
            <?php 
                    endwhile; 
                    wp_reset_postdata(); 
                endif;
            endif; 
            ?> 
            </div>
        </div>
    </div>
</div>

<?php if ( get_field('embed_blog_subscribe_code', 'option') ): ?>
<div class="container newsletter-signup">
    <div class="row">
        <div class="col-md-6">
            <?php the_field('embed_blog_info_text', 'option'); ?>
        </div>
        <div class="col-md-6">
            <?php the_field('embed_blog_subscribe_code', 'option'); ?>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="container">
    <div class="row">
        <?php 
        $feat_vars = get_field('blog_featured_posts');
        if ($feat_vars) : 
            $feat_id = array();
            foreach($feat_vars as $post_object):
                $feat_id[] = ''.$post_object->ID.', ';
                endforeach;
            $args = array(
                'post_type' => 'post',
                'post__in' => $feat_id,
                'showposts' => '-1'
            );
            $hpquery = new WP_Query( $args );
            if ( $hpquery->have_posts()) :
            usort($hpquery->posts, function($a, $b) use ($hpid) {
                return array_search($a->ID, $hpid) - array_search($b->ID, $hpid);
            });
                while ( $hpquery->have_posts()) : $hpquery->the_post();
                    include(locate_template('content-archivepost.php')); 
                endwhile; 
                wp_reset_postdata(); 
            endif;
        
        else:
        
            $p_loop = new WP_Query( array( 
                'post_type' => 'post',
                'showposts' => '6',
                'post__not_in' => $excluded_vars,
            ));
            if ( $p_loop->have_posts() ) :
                while ( $p_loop->have_posts() ) : $p_loop->the_post();
                    include(locate_template('content-archivepost.php')); 
                endwhile; 
                wp_reset_postdata(); 
            endif;  
        
        endif; 
        ?> 
    </div>
    <div class="row">
        <div class="col-sm-12 text-center pad-tp-md pad-bt-sm">
            <p><a href="<?php echo home_url(); ?>/blog/articles/">See All Articles &rarr;</a></p>
        </div>
    </div>
</div>


<?php endwhile; ?>
<?php get_footer(); ?>