<div class="secondary-nav nav-products dark transition">
    <?php 
        if ( 
            is_page_template('page-product-food-beverage.php') || 
            is_page_template('page-product-food.php') || 
            is_page_template('page-product-beverage.php')
        ) : ?>
    <div class="secondary-nav-section">
        <!-- <a class="secondary-head transition" href="#">By Use Case:</a> -->
        <?php wp_nav_menu( array( 'theme_location' => 'products' ) ); ?>
    </div>

    <?php 
        elseif ( 
            is_page_template('page-module-inventory.php') || 
            is_page_template('page-module-purchasing.php') || 
            is_page_template('page-module-sales.php')
        ) : ?>

    <div class="secondary-nav-section">
        <!-- <a class="secondary-head transition" href="#">By Feature:</a> -->
        <?php wp_nav_menu( array( 'theme_location' => 'modules' ) ); ?>
    </div>

    <?php endif; ?>

</div>