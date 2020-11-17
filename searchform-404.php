<?php
/**
 * The template for displaying search forms in turnwall
 *
 * @package turnwall
 */
?>

<div>
	<form method="get" id="searchform404"  action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="screen-reader-text"><?php _ex( 'Search', 'assistive text', 'turnwall' ); ?></label>		
 		<button type="submit" class="submit button-clear" id="searchsubmit">
			<span class="bevicon bevico-search"></span>
		</button>
 		<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'turnwall' ); ?>" />
	</form>
</div>
