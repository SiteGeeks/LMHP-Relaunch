<?php
/*
* The base structure for Voce Theme's layout
*/
if ( ! function_exists( 'wpsvoce' )) {
// wpsvoce() BEGINS here - You can reproduce this wpsvoce() function in your child theme if you want to override how the parent theme handles the construction of the site.
	function wpsvoce(){
		global $post;
		get_header();
		voce_html_before_content();
		if (is_page_template('custom-layout.php')) {
			do_action('main_content_custom_layout');
		} elseif (is_singular()){
			do_action('main_content_singular');
		} else {
			do_action('main_content');
		}
		voce_html_after_content();
		get_footer();
	}
// wpsvoce() ENDS here
}