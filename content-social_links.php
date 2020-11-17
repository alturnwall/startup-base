<?php if( have_rows('embed_social_links', 'option') ): ?>
<div class="social-logos">
    <?php while( have_rows('embed_social_links', 'option') ): the_row(); ?>
        <a href="<?php the_sub_field('social_link_url'); ?>" target="_blank" title="<?php the_sub_field('social_link_service'); ?>">
            <span class="theme-icon icon-<?php the_sub_field('social_link_service'); ?>"></span> 
        </a>
    <?php endwhile; ?>
</div>
<?php endif; ?>