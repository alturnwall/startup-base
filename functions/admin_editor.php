<?php

// Post 3.9 TinyMCE customizations
// Add Formats Dropdown Menu To MCE
function custom_mce_styles( $buttons ) {
	array_push( $buttons, 'styleselect' );
	return $buttons;
}
add_filter( 'mce_buttons', 'custom_mce_styles' );


// Add new styles to the TinyMCE "formats" menu dropdown (created above)
// see: http://codex.wordpress.org/TinyMCE_Custom_Styles
function custom_mce_format_dropdown( $settings ) {
	$new_styles = array(
			array(
				'title'		=> 'Intro Paragraph',
				'selector'	=> 'p',
				'classes'	=> 'intro'
			),
			array(
				'title'		=> 'Pullquote',
				'selector'	=> 'p',
				'classes'	=> 'mce-pullquote'
			),
			array(
				'title'		=> 'Quote with Background',
				'selector'	=> 'p',
				'classes'	=> 'mce-quote-background'
			),
			array(
				'title'		=> 'Speech Bubble: Quote',
				'selector'	=> 'p',
				'classes'	=> 'mce-speech-bubble-quote'
			),
			array(
				'title'		=> 'Speech Bubble: Citation',
				'selector'	=> 'p',
				'classes'	=> 'mce-speech-bubble-citation'
			),
			array(
				'title'		=> 'Button Default',
				'selector'	=> 'a',
				'classes'	=> 'button button-default'
			),
			array(
				'title'		=> 'Recipe Box',
				'block' 	=> 'div',  
				'classes'	=> 'recipe-box',
				'wrapper'	=> 'true'
			),
			array(
				'title'		=> 'Alert Warning',
				'selector'	=> 'p',
				'classes'	=> 'mce-alert-warning'
			),
	);
	$settings['style_formats'] = json_encode( $new_styles );
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'custom_mce_format_dropdown' );


//Add the styles to the editor
function add_custom_editor_style() {
	add_editor_style();
}
add_action( 'admin_init', 'add_custom_editor_style' );



// Create button shortcode
function chat_button_function() {
	// file_get_contents can only read strings 
	// (can't use include because it outputs out of order)
	$return_string = file_get_contents( get_template_directory() . '/inc/schedule_chat.php' );
	return $return_string;
}

// Register shortcodes
function register_shortcodes(){
   add_shortcode('button-chat', 'chat_button_function');
}
add_action( 'init', 'register_shortcodes');



// Fin.