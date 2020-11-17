<?php
/**
 * The template for displaying search forms in turnwall
 *
 * @package turnwall
 */
?>
	<form method="get" id="searchform" class="searchform hidden" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="screen-reader-text"><?php _ex( 'Search', 'assistive text', 'turnwall' ); ?></label>		
		<a class="search-close">
			<span class="bevicon bevico-close"></span>
		</a>
 		<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'turnwall' ); ?>" />
		<button type="submit" class="submit button-clear" id="searchsubmit">
			<span class="bevicon bevico-search"></span>
		</button>
	</form>
