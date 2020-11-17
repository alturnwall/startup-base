<div id="enterprise" class="section-enterprise-dashboard dark dark-brand section hairline pad-lg">
    <div class="row">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-4 text">

            <h6 class="brandon-bold">Enterprise Dashboard</h6>
            
            <?php if ( is_page_template('page-product-food.php') ) : ?>

                <h4 class="sans space-bt-sm">Manage your entire restaurant group with the Enterprise Dashboard</h4>
                <p><strong>Quick switch between accounts</strong> with one username, perfect for executive chefs or food and beverage directors managing multiple locations.</p>
                <p>Compare performance <strong>across your locations</strong>, including sitting inventory, ordering, usage, and sales.</p>
                <p>Control <strong>employee-level permissions</strong> for your entire kitchen staff, across each location, and across the entire group.</p>

            <?php elseif ( is_page_template('page-product-beverage.php') ) : ?>

                <h4 class="sans space-bt-sm">Managing multiple bars? The Enterprise Dashboard streamlines your efforts.</h4>
                <p><strong>Quick switch between accounts</strong> with one username, perfect for beverage directors managing multiple locations.</p>
                <p>Compare performance <strong>across your locations</strong>, including sitting inventory, ordering, usage, and sales.</p>
                <p>Control <strong>employee-level permissions</strong> for your entire bar staff, across each location, and across the entire group.</p>

            <?php elseif ( is_page_template('page-product-food-beverage.php') ) : ?>
            
                <h4 class="sans space-bt-sm">Manage your entire hotel or restaurant group with the Enterprise Dashboard</h4>
                <p><strong>Quick switch between accounts</strong> without needing to remember multiple usernames, perfect for food and beverage directors managing multiple locations.</p>
                <p><strong>Compare performance across your locations</strong>, including sitting inventory, ordering, usage, and sales.</p>
                <p><strong>Control employee-level permissions</strong> for your kitchen and bar staff, across each location, and across the entire group.</p>

            <?php else : // Currently serving the Flex Template ?>

                <?php the_sub_field('enterprise_section_text'); ?>

            <?php endif; ?>

            <?php include('schedule_chat.php'); ?>

        </div>
        <div class="col-sm-7">
            <div class="device laptop ent-laptop">
                <div class="screen-holder">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/201804/product-device-food-group-dash@2x.png"/>
                </div>
            </div>
        </div>
    </div>
</div>