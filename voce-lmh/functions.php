<?php
require_once( get_template_directory() . '/inc/init-functions.php' );

function child_front_scripts(){
	wp_enqueue_style( 'child-style', THEME_STYLESHEET, null, '18.04.21a');
}
add_action('wp_enqueue_scripts', 'child_front_scripts', 25);

// Add Google Fonts Support
function sg_google_fonts() {
	$query_args = array(
		'family' => 'Open+Sans:400|Raleway:400,700|Source+Code+Pro:400',
		'subset' => 'latin,latin-ext'
	);
	wp_register_style( 'sg_google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
            }
            
add_action('wp_enqueue_scripts', 'sg_google_fonts');