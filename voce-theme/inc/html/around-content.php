<?php
/*
* HTML structure around the content
*/
if ( ! function_exists('voce_html_before_content')){
// voce_html_before_content() BEGINS here - This sets the structure before the content
	function voce_html_before_content(){
		global $options;
		$options = get_option('voce_hooks_options');
		voce_before_html_output();
		voce_header_frame();
		voce_standard_menu_output();
		voce_headliner_output();
		voce_before_content_output();
		voce_before_content_area_output();
	}
// voce_html_before_content() ENDS here
}

if ( ! function_exists( 'voce_html_after_content' )){
// voce_html_after_content() BEGINS here - This set the structure after the content
	function voce_html_after_content(){
		global $options;
		$options = get_option('voce_hooks_options');
		voce_after_content_area_output();
		voce_after_content_output();
		voce_footliner_output();
		voce_footer_menu_output();
		voce_footer_frame();
		voce_after_html_output();
	}
// voce_html_after_content() ENDS here
}