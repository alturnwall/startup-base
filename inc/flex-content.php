<?php while(has_sub_field('flex_content')): ?>



    <?php /* layout: General Text */ 
    if(get_row_layout() == 'flex_text_general'): 
        $bgphoto = get_sub_field('flex_text_background_image');
        $bgphoto_thumb = wp_get_attachment_image_src( $bgphoto, 'large' );
        $thumb_url = $bgphoto_thumb['0'];
    ?>
    <div class="section flex <?php the_sub_field('flex_text_background_color'); ?>" 
            style="
                <?php if (!empty($thumb_url) ) : ?>
                    background-size:cover;
                    background-position:center;
                    <?php if (get_sub_field('flex_text_background_image_overlay') === 'dark' ): ?>
                        background-image:linear-gradient(rgba(71, 82, 90, 0.7), rgba(71, 82, 90, 0.7) ), url(<?php echo $thumb_url; ?>);
                    <?php else : ?>
                        background-image:url(<?php echo $thumb_url; ?>);
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ( get_sub_field('flex_text_block_min_height') ) : ?>
                    min-height:<?php the_sub_field('flex_text_block_min_height'); ?>;
                <?php endif; ?>
            ">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <?php the_sub_field('flex_text_intro'); ?>
                </div>
            </div>
            <?php 
            $colwidth = get_sub_field('flex_optional_text_column_width');
            if (have_rows('flex_optional_text_columns')) : ?>
                <div class="row">
                    <?php while ( have_rows('flex_optional_text_columns') ) : the_row(); ?>
                        <div class="<?php echo $colwidth; ?>">
                            <?php the_sub_field('flex_optional_column_text'); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>



    <?php /* layout: Featured Personality */ 
    elseif(get_row_layout() == 'flex_featured_personality'): ?>
    <div class="section flex flex-personality">
        <div class="container">
            <?php 
            $term = get_sub_field('choose_personality');
            if( $term ): ?>
            <div class="row">
                <?php 
                    //echo get_field('term_color', $term);
                    $photo = get_field('personality_photo', $term);
                    $post_thumb = wp_get_attachment_image_src( $photo, 'thumbnail' );
                    $thumb_url = $post_thumb['0']; 
                ?>
                <div class="col-sm-3">
                    <a class="byline-photos" href="<?php echo home_url(); ?>/personality/<?php echo $term->slug; ?>">
                        <span class="byline-photo" style="background-image:url(<?php echo $thumb_url; ?>);">
                        </span>
                    </a>
                </div>
                <div class="col-sm-3">
                    <h6>Featured Personality</h6>
                    <h3><a href="<?php echo home_url(); ?>/personality/<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></h3>
                </div>
                <div class="col-sm-5 pad-bt-sm">
                    <p class="caption"><?php echo $term->description; ?></p>
                </div>
            </div>
            <?php endif; ?>

            <?php 
            $posts = get_sub_field('personality_related_posts');
            if( $posts ): ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                    <?php foreach( $posts as $post): ?>
                        <?php setup_postdata($post); ?>
                        <?php get_template_part('content', 'postsnippet'); ?>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>

        </div>
    </div>



    <?php /* layout: Featured Posts */ 
    elseif(get_row_layout() == 'flex_featured_posts'): ?>
    <div class="section flex">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <?php the_sub_field('flex_featured_posts_info'); ?>
                </div>
            </div>
            <div class="row">
            <?php 
            $posts = get_sub_field('flex_featured_post_select');
            if( $posts ): ?>
                <?php foreach( $posts as $post): ?>
                    <?php setup_postdata($post); ?>
                    <?php 
                        // store type of post
                        $postType = get_post_type($post);
                        switch($postType) {
                            case 'customer_stories':
                                // execute and render customer stories snippet if post is a customer story
                                echo '<div class="customerstory-snippet col-xs-12 col-sm-4">';
                                    get_template_part('content', 'customerstorysnippet');
                                echo '</div>';
                                break;
                            default:
                                // default render post snippet
                                get_template_part('content', 'postsnippet');
                        }
                    ?>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
            </div>
        </div>
    </div>



    <?php /* layout: Big CTA */ 
    elseif(get_row_layout() == 'flex_big_cta'): ?>
    <div class="section flex dark dark-brand flex-big-cta cta-pattern">
        <div class="container">
            <?php the_sub_field('flex_big_cta_content'); ?>
        </div>
    </div>



    <?php /* layout: Featured Video */ 
    elseif(get_row_layout() == 'flex_featured_video'): ?>
    <div class="section flex flex-video dark">
        <div class="container">
            <div class="row">
                <!-- <div class="col-sm-1"></div> -->
                <div class="col-sm-8">
                    <div class="video-wrapper">
                        <?php the_sub_field('flex_embed_video_code'); ?>
                    </div>
                </div>
                <div class="col-sm-4 pad-tp-sm">
                    <?php the_sub_field('flex_video_caption'); ?>
                </div>
            </div>
        </div>
    </div>



    <?php /* layout: Form Section */ 
    elseif(get_row_layout() == 'flex_form_section'):
        $bgphoto = get_sub_field('flex_text_background_image');
        $bgphoto_thumb = wp_get_attachment_image_src( $bgphoto, 'large' );
        $thumb_url = $bgphoto_thumb['0'];
    ?>
    <div class="section flex flex-form <?php the_sub_field('flex_text_background_color'); ?>" 
            style="
                <?php if (!empty($thumb_url)) : ?>
                    background-image:url(<?php echo $thumb_url; ?>);
                    background-size:cover;
                    background-position:center;
                <?php endif; ?>
                <?php if ( get_sub_field('flex_text_block_min_height') ) : ?>
                    min-height:<?php the_sub_field('flex_text_block_min_height'); ?>;
                <?php endif; ?>
            ">
        <div class="form-section-overlay">
        </div>
        <div class="form-section-textbox dark">
            <?php the_sub_field('form_section_intro_text'); ?>
        </div>
        <div id="gated-form" class="floating-form">
            <?php if (get_sub_field('choose_form_type') == "retailer"): ?>
                <div id="create-retailer-form-mount"></div>
            <?php elseif (get_sub_field('choose_form_type') == "channel_promo"): ?>
                <div id="create-retailer-partner-form-mount"></div>
            <?php elseif (get_sub_field('choose_form_type') == "user"): ?>
                <div id="user-sign-up-form-mount"></div>
            <?php elseif (get_sub_field('choose_form_type') == "embed"): ?>
                <?php the_sub_field('form_section_optional_embed'); ?>
            <?php else : 
                // NOTHING ELSE
            ?>
            <?php endif; ?>
        </div>
    </div>



    <?php /* layout: Logos Layout */ 
    elseif(get_row_layout() == 'flex_logos_layout'): ?>
    <div class="section flex-logos">
        <div class="container">
            <span class="logos-contain">
                <?php
                // check if the repeater field has rows of data
                if( have_rows('flex_logos_layout_repeater') ):
                    // loop through the rows of data
                    while ( have_rows('flex_logos_layout_repeater') ) : the_row(); 
                        // display the flex logos image(s) ?>
                        <span class="flex-logo">
                            <img src="<?php echo the_sub_field('flex_logos_image'); ?>" />
                        </span>
                <?php endwhile;
                endif;
                ?>
            </span>
        </div>
    </div>




    <?php /* layout: Enterprise Section */ 
    elseif(get_row_layout() == 'enterprise_section'): ?>
    <div class="section flex-enterprise">
        <?php include 'section_enterprise_dashboard.php'; ?>
    </div>




    <?php endif; ?> 
<?php endwhile; ?> 
