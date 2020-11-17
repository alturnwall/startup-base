<?php 

$tax = $wp_query->get_queried_object();
$mytax = $tax->name; 

// get current page we are on. If not set we can assume we are on page 1.
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
// are we on page one?
if(1 == $paged) :

    $args = array( 
        'post_type' => 'resources',
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'resource_display',
                'field' => 'slug',
                'terms' => array('featured'),
            ),
            array(
                'taxonomy' => 'resource_type',
                'field' => 'slug',
                'terms' => $mytax,
            )
        )  
    );
    $featured_loop = new WP_Query( $args );
    if ( $featured_loop->have_posts() ) : ?>

<div class="section pad-bt-md">

    <?php while ( $featured_loop->have_posts() ) : $featured_loop->the_post(); 
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
        $url = $thumb['0']; 
        $color = get_field('resource_background_color'); ?>

        <div class="clearfix featured-resource dark" style="background-color:rgba(<?php echo $color; ?>,.78);">
            <div class="container">
                <div class="col-sm-5 featured-resource-thumb" style="background-image: url(<?php echo $url; ?>);"></div>
                <div class="col-sm-5"></div>
                <div class="col-sm-6 feature-resource-content">
                    <header class="entry-header"> 
                        <?php $myseries = get_the_terms($post->ID, 'resource_series');
                            if (!empty($myseries)) : 
                                foreach ( $myseries as $series ) : ?>
                                    <a class="transition resource-series" href="<?php echo get_term_link( $series, 'resource_series' ); ?>">
                                        <h6><?php echo $series->name; ?></h6>
                                    </a>
                        <?php endforeach; endif; ?>
                        <h3 class="entry-title"><a href="<?php if( get_field('resource_direct_link') ): the_field('resource_direct_link'); else: the_permalink(); endif; ?>" rel="bookmark" <?php if( get_field('resource_direct_link') ): ?>target="_blank" <?php endif; ?>> <?php the_title(); ?> </a></h3> 
                    </header>
                    <div class="hentry-content">
                        <p class="aktiv"><?php the_field('resource_short_description'); ?></p>
                    </div>
                    <?php if( get_field('resource_direct_link') ): ?>
                        <a target="_blank" href="<?php the_field('resource_direct_link') ?>" class="button button-default transition" style="background-color:rgb(<?php echo $color; ?>); border-color:rgb(<?php echo $color; ?>);">
                            Check it out <span class="bevicon bevico-ic_open_in_new_black_24px">
                        </a>
                    <?php else: ?>
                        <a href="<?php the_permalink(); ?>" class="button button-default transition" style="background-color:rgb(<?php echo $color; ?>); border-color:rgb(<?php echo $color; ?>);">
                            <?php echo get_field('resource_cta_text'); ?>
                        </a>
                    <?php endif; ?>         
                </div>
            </div>
        </div>
        
    <?php endwhile; ?>

</div>

<?php 
    endif; 
    wp_reset_postdata(); 
endif; ?>