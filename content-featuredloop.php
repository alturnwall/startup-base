<?php 

if ( is_category()):
    $mycats = get_the_category();
// elseif ( is_tax()):
//     $mycats = get_the_category();
endif;

if ($mycats){
    foreach($mycats as $cats) { 
        $catid = $cats->term_id;
    }
};

// get current page we are on. If not set we can assume we are on page 1.
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
// are we on page one?
if(1 == $paged) :

    $args = array( 
        'post_type' => 'post',
        'category__in' => $catid,
        'tax_query' => array(
            array(
                'taxonomy' => 'post_display',
                'field' => 'slug',
                'terms' => array('featured'),
            )
        ),
    );
    $featured_loop = new WP_Query( $args );
    if ( $featured_loop->have_posts() ) : ?>

    <div class="section featured-posts">
        <div id="content" class="container" role="main">
            <div class="row">

                <?php while ( $featured_loop->have_posts() ) : $featured_loop->the_post(); ?>
                    <div class="col-sm-12 feature-contain">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="row">
                                <div class="col-sm-7">
                                    <?php if (has_post_thumbnail()) : ?> 
                                        <a class="post-thumb" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('medium'); ?></a> 
                                    <?php endif; ?> 
                                </div>
                                <div class="col-sm-5">
                                    <div class="text-content">
                                        <header class="entry-header"> 
                                            <!-- <h6>Featured</h6> -->
                                            <?php include 'inc/post-cats.php'; ?>
                                            <h4 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"> <?php the_title(); ?> </a></h4> 
                                            <!-- <h5 class="entry-subtitle"><?php echo get_field('post_subtitle'); ?></h5> -->
                                            <div class="entry-meta"><?php echo get_the_date(); ?></div>
                                        </header>
                                        <div class="hentry-content">
                                            <?php the_excerpt(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endwhile; ?>
             

            </div>
        </div>
    </div>

<?php 
    endif; 
    wp_reset_postdata(); 
    $postcounter == 0; 
endif; ?>