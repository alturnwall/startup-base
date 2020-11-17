<section class="text-dark bottom-cta">
    <div class="container">
        <p><?php include('primary_cta.php'); ?></p>
        <?php if(!is_page_template("page-platform.php")):?>
            <p class="pad-tp-sm">
                <a href="<?php echo home_url(); ?>/product/" class="learn-more text-underline">Learn more about the platform &rarr;</a>
            </p>
        <?php endif;?>
    </div>
</section>