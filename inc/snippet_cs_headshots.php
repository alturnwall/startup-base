<?php
$p_loop = new WP_Query( array(
    'post_type' => 'people',
    'showposts' => '-1',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy'  => 'team',
            'field'     => 'slug',
            'terms'     => 'cs-consultants',
            'operator'  => 'IN'
            )
        )
));
$counter = 0;
if ( $p_loop->have_posts() ) :
while ( $p_loop->have_posts() ) : $p_loop->the_post();
    $counter++;
?>
<div class="cs-member popover-contain">
    <div class="image-crop">
        <a href="<?php echo get_permalink(); ?>"> <?php the_post_thumbnail('thumbnail'); ?> </a>
    </div>
    <h6 class="space-tp-xs"><?php the_title(); ?></h6>
    <!-- <div class="popover">
        <div class="popover-body">
            <h5><?php the_title(); ?></h5>
            <h6><?php echo get_field('person_title'); ?></h6>
            <p><?php the_content(); ?><br></p>
        </div>
    </div> -->
</div>
<?php endwhile; wp_reset_postdata(); endif; ?>