<?php
/*
* Default options for Voce Theme Framework
*/
function voce_structure_default_settings() {
	global $structure_options;
	$structure_options = array(
		'wide' => 1,
		'column' => 'sc',
		'gridcss' => 1,
		'containerwidth' => '1140',
		'gridcss_content' => '1fr',
		'gridcss_sidebar1' => '250px',
		'gridcss_sidebar2' => '250px'
	);
	return $structure_options;
}

function voce_structure_settings_init() {
	global $structure_options;
	$structure_options = get_option('voce_structure_options');
	if (false === $structure_options)
		$structure_options = voce_structure_default_settings();
	update_option('voce_structure_options', $structure_options);
}
add_action('after_setup_theme','voce_structure_settings_init');

function voce_content_default_settings() {
	global $content_options;
	$content_options = array(
		'title' => 1,
		'tagline' => 1,
		'headermenu' => 1,
		'standardmenu' => 0,
		'footermenu' => 0,
		'widgets' => 1,
		'pagination' => 0,
		'by-date-post' => 1,
		'by-author-post' => 1,
		'by-comments-post' => 1,
		'by-edit-post' => 1,
		'by-cats' => 1,
		'homeexcerpt' => 0,
		'excerptlink' => 0,
		'feedfeaturedimage' => 0,
		'singlefeaturedimage' => 1,
		'feedtags' => 1,
		'singletags' => 1,
		'searchpages' => 0,
		'postformats-on' => 1
	);
	return $content_options;
}

function voce_content_settings_init() {
	global $content_options;
	$content_options = get_option('voce_content_options');
	if (false === $content_options)
		$content_options = voce_content_default_settings();
	update_option('voce_content_options', $content_options);
}
add_action('after_setup_theme','voce_content_settings_init');