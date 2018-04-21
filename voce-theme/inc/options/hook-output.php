<?php
/*
* Control when and where Voce Custom Hooks are used
*/
function voce_before_html_output() {
	global $options;
	if ($options['switch_voce_before_html'] == 0) {
		if 	((is_home() && is_front_page() && $options['home_voce_before_html'] == 0 && $options['front_voce_before_html'] == 0) ||
			(is_home() && ! is_front_page() && $options['home_voce_before_html'] == 0) ||
			(is_front_page() && ! is_home() && $options['front_voce_before_html'] == 0) ||
			(is_single() && $options['posts_voce_before_html'] == 0) ||
			(is_page() && ! is_front_page() && $options['pages_voce_before_html'] == 0) ||
			(is_archive() && $options['archive_voce_before_html'] == 0) ||
			(is_search() && $options['search_voce_before_html'] == 0) ||
			(is_404() && $options['404_voce_before_html'] == 0)) {
				voce_before_html();
		}
		do_action('voce_before_html');
	}
}

function voce_after_html_output() {
	global $options;
	if ($options['switch_voce_after_html'] == 0) {
		if 	((is_home() && is_front_page() && $options['home_voce_after_html'] == 0 && $options['front_voce_after_html'] == 0) ||
			(is_home() && ! is_front_page() && $options['home_voce_after_html'] == 0) ||
			(is_front_page() && ! is_home() && $options['front_voce_after_html'] == 0) ||
			(is_single() && $options['posts_voce_after_html'] == 0) ||
			(is_page() && ! is_front_page() && $options['pages_voce_after_html'] == 0) ||
			(is_archive() && $options['archive_voce_after_html'] == 0) ||
			(is_search() && $options['search_voce_after_html'] == 0) ||
			(is_404() && $options['404_voce_after_html'] == 0)) {
				voce_after_html();
		}
		do_action('voce_after_html');
	}
}

function voce_header_top_output() {
	global $options;
	if ($options['switch_voce_header_top'] == 0) {
		if 	((is_home() && is_front_page() && $options['home_voce_header_top'] == 0 && $options['front_voce_header_top'] == 0) ||
			(is_home() && ! is_front_page() && $options['home_voce_header_top'] == 0) ||
			(is_front_page() && ! is_home() && $options['front_voce_header_top'] == 0) ||
			(is_single() && $options['posts_voce_header_top'] == 0) ||
			(is_page() && ! is_front_page() && $options['pages_voce_header_top'] == 0) ||
			(is_archive() && $options['archive_voce_header_top'] == 0) ||
			(is_search() && $options['search_voce_header_top'] == 0) ||
			(is_404() && $options['404_voce_header_top'] == 0)) {
				voce_header_top();
		}
		do_action('voce_header_top');
	}
}

function voce_header_bottom_output() {
	global $options;
	if ($options['switch_voce_header_bottom'] == 0 && ! is_page_template('custom-landing.php')) {
		if 	((is_home() && is_front_page() && $options['home_voce_header_bottom'] == 0 && $options['front_voce_header_bottom'] == 0) ||
			(is_home() && ! is_front_page() && $options['home_voce_header_bottom'] == 0) ||
			(is_front_page() && ! is_home() && $options['front_voce_header_bottom'] == 0) ||
			(is_single() && $options['posts_voce_header_bottom'] == 0) ||
			(is_page() && ! is_front_page() && $options['pages_voce_header_bottom'] == 0) ||
			(is_archive() && $options['archive_voce_header_bottom'] == 0) ||
			(is_search() && $options['search_voce_header_bottom'] == 0) ||
			(is_404() && $options['404_voce_header_bottom'] == 0)) {
				voce_header_bottom();
		}
		do_action('voce_header_bottom');
	}
}

function voce_header_after_title_tagline_output() {
	global $options;
	if ($options['switch_voce_header_after_title_tagline'] == 0 && ! is_page_template('custom-landing.php')) {
		if 	((is_home() && is_front_page() && $options['home_voce_header_after_title_tagline'] == 0 && $options['front_voce_header_after_title_tagline'] == 0) ||
			(is_home() && ! is_front_page() && $options['home_voce_header_after_title_tagline'] == 0) ||
			(is_front_page() && ! is_home() && $options['front_voce_header_after_title_tagline'] == 0) ||
			(is_single() && $options['posts_voce_header_after_title_tagline'] == 0) ||
			(is_page() && ! is_front_page() && $options['pages_voce_header_after_title_tagline'] == 0) ||
			(is_archive() && $options['archive_voce_header_after_title_tagline'] == 0) ||
			(is_search() && $options['search_voce_header_after_title_tagline'] == 0) ||
			(is_404() && $options['404_voce_header_after_title_tagline'] == 0)) {
				voce_header_after_title_tagline();
		}
		do_action('voce_header_after_title_tagline');
	}
}

function voce_footer_top_output() {
	global $options;
	if ($options['switch_voce_footer_top'] == 0 && ! is_page_template('custom-landing.php')) {
		if 	((is_home() && is_front_page() && $options['home_voce_footer_top'] == 0 && $options['front_voce_footer_top'] == 0) ||
			(is_home() && ! is_front_page() && $options['home_voce_footer_top'] == 0) ||
			(is_front_page() && ! is_home() && $options['front_voce_footer_top'] == 0) ||
			(is_single() && $options['posts_voce_footer_top'] == 0) ||
			(is_page() && ! is_front_page() && $options['pages_voce_footer_top'] == 0) ||
			(is_archive() && $options['archive_voce_footer_top'] == 0) ||
			(is_search() && $options['search_voce_footer_top'] == 0) ||
			(is_404() && $options['404_voce_footer_top'] == 0)) {
				voce_footer_top();
		}
		do_action('voce_footer_top');
	}
}

function voce_footer_bottom_output() {
	global $options;
	if ($options['switch_voce_footer_bottom'] == 0 && ! is_page_template('custom-landing.php')) {
		if 	((is_home() && is_front_page() && $options['home_voce_footer_bottom'] == 0 && $options['front_voce_footer_bottom'] == 0) ||
			(is_home() && ! is_front_page() && $options['home_voce_footer_bottom'] == 0) ||
			(is_front_page() && ! is_home() && $options['front_voce_footer_bottom'] == 0) ||
			(is_single() && $options['posts_voce_footer_bottom'] == 0) ||
			(is_page() && ! is_front_page() && $options['pages_voce_footer_bottom'] == 0) ||
			(is_archive() && $options['archive_voce_footer_bottom'] == 0) ||
			(is_search() && $options['search_voce_footer_bottom'] == 0) ||
			(is_404() && $options['404_voce_footer_bottom'] == 0)) {
				voce_footer_bottom();
		}
		do_action('voce_footer_bottom');
	}
}

function voce_site_info_output() {
	global $options;
	if ($options['switch_voce_site_info'] == 0) {
		if 	((is_home() && is_front_page() && $options['home_voce_site_info'] == 0 && $options['front_voce_site_info'] == 0) ||
			(is_home() && ! is_front_page() && $options['home_voce_site_info'] == 0) ||
			(is_front_page() && ! is_home() && $options['front_voce_site_info'] == 0) ||
			(is_single() && $options['posts_voce_site_info'] == 0) ||
			(is_page() && ! is_front_page() && $options['pages_voce_site_info'] == 0) ||
			(is_archive() && $options['archive_voce_site_info'] == 0) ||
			(is_search() && $options['search_voce_site_info'] == 0) ||
			(is_404() && $options['404_voce_site_info'] == 0)) {
				voce_site_info();
		}
		do_action('voce_site_info');
	}
}

function voce_headliner_output() {
	global $options;
	if ($options['switch_voce_headliner'] == 0 && ! is_page_template('custom-landing.php') && ! is_page_template('custom-layout.php')) {
		if 	((is_home() && is_front_page() && $options['home_voce_headliner'] == 0 && $options['front_voce_headliner'] == 0) ||
			(is_home() && ! is_front_page() && $options['home_voce_headliner'] == 0) ||
			(is_front_page() && ! is_home() && $options['front_voce_headliner'] == 0) ||
			(is_single() && $options['posts_voce_headliner'] == 0) ||
			(is_page() && ! is_front_page() && $options['pages_voce_headliner'] == 0) ||
			(is_archive() && $options['archive_voce_headliner'] == 0) ||
			(is_search() && $options['search_voce_headliner'] == 0) ||
			(is_404() && $options['404_voce_headliner'] == 0)) {
				voce_headliner();
		}
		do_action('voce_headliner');
	}
}

function voce_footliner_output() {
	global $options;
	if ($options['switch_voce_footliner'] == 0 && ! is_page_template('custom-landing.php') && ! is_page_template('custom-layout.php')) {
		if 	((is_home() && is_front_page() && $options['home_voce_footliner'] == 0 && $options['front_voce_footliner'] == 0) ||
			(is_home() && ! is_front_page() && $options['home_voce_footliner'] == 0) ||
			(is_front_page() && ! is_home() && $options['front_voce_footliner'] == 0) ||
			(is_single() && $options['posts_voce_footliner'] == 0) ||
			(is_page() && ! is_front_page() && $options['pages_voce_footliner'] == 0) ||
			(is_archive() && $options['archive_voce_footliner'] == 0) ||
			(is_search() && $options['search_voce_footliner'] == 0) ||
			(is_404() && $options['404_voce_footliner'] == 0)) {
				voce_footliner();
		}
		do_action('voce_footliner');
	}
}

function voce_before_content_area_output() {
	$options = get_option('voce_hooks_options');
	$options_structure = get_option('voce_structure_options');
	if ($options['switch_voce_before_content_area'] == 0 && ! is_page_template('custom-landing.php') && $options_structure['wide'] == 1) {
		if 	((is_home() && is_front_page() && $options['home_voce_before_content_area'] == 0 && $options['front_voce_before_content_area'] == 0) ||
			(is_home() && ! is_front_page() && $options['home_voce_before_content_area'] == 0) ||
			(is_front_page() && ! is_home() && $options['front_voce_before_content_area'] == 0) ||
			(is_single() && $options['posts_voce_before_content_area'] == 0) ||
			(is_page() && ! is_front_page() && $options['pages_voce_before_content_area'] == 0) ||
			(is_archive() && $options['archive_voce_before_content_area'] == 0) ||
			(is_search() && $options['search_voce_before_content_area'] == 0) ||
			(is_404() && $options['404_voce_before_content_area'] == 0)) {
				voce_before_content_area();
		}
		do_action('voce_before_content_area');
	}
}

function voce_after_content_area_output() {
	$options = get_option('voce_hooks_options');
	$options_structure = get_option('voce_structure_options');
	if ($options['switch_voce_after_content_area'] == 0 && ! is_page_template('custom-landing.php') && $options_structure['wide'] == 1) {
		if 	((is_home() && is_front_page() && $options['home_voce_after_content_area'] == 0 && $options['front_voce_after_content_area'] == 0) ||
			(is_home() && ! is_front_page() && $options['home_voce_after_content_area'] == 0) ||
			(is_front_page() && ! is_home() && $options['front_voce_after_content_area'] == 0) ||
			(is_single() && $options['posts_voce_after_content_area'] == 0) ||
			(is_page() && ! is_front_page() && $options['pages_voce_after_content_area'] == 0) ||
			(is_archive() && $options['archive_voce_after_content_area'] == 0) ||
			(is_search() && $options['search_voce_after_content_area'] == 0) ||
			(is_404() && $options['404_voce_after_content_area'] == 0)) {
				voce_after_content_area();
		}
		do_action('voce_after_content_area');
	}
}

function voce_before_content_output() {
	$options = get_option('voce_hooks_options');
	$options_structure = get_option('voce_structure_options');
	if ($options['switch_voce_before_content'] == 0 && ! is_page_template('custom-landing.php') && $options_structure['wide'] == 0) {
		if 	((is_home() && is_front_page() && $options['home_voce_before_content'] == 0 && $options['front_voce_before_content'] == 0) ||
			(is_home() && ! is_front_page() && $options['home_voce_before_content'] == 0) ||
			(is_front_page() && ! is_home() && $options['front_voce_before_content'] == 0) ||
			(is_single() && $options['posts_voce_before_content'] == 0) ||
			(is_page() && ! is_front_page() && $options['pages_voce_before_content'] == 0) ||
			(is_archive() && $options['archive_voce_before_content'] == 0) ||
			(is_search() && $options['search_voce_before_content'] == 0) ||
			(is_404() && $options['404_voce_before_content'] == 0)) {
				voce_before_content();
		}
		do_action('voce_before_content');
	}
}

function voce_after_content_output() {
	$options = get_option('voce_hooks_options');
	$options_structure = get_option('voce_structure_options');
	if ($options['switch_voce_after_content'] == 0 && ! is_page_template('custom-landing.php') && $options_structure['wide'] == 0) {
		if 	((is_home() && is_front_page() && $options['home_voce_after_content'] == 0 && $options['front_voce_after_content'] == 0) ||
			(is_home() && ! is_front_page() && $options['home_voce_after_content'] == 0) ||
			(is_front_page() && ! is_home() && $options['front_voce_after_content'] == 0) ||
			(is_single() && $options['posts_voce_after_content'] == 0) ||
			(is_page() && ! is_front_page() && $options['pages_voce_after_content'] == 0) ||
			(is_archive() && $options['archive_voce_after_content'] == 0) ||
			(is_search() && $options['search_voce_after_content'] == 0) ||
			(is_404() && $options['404_voce_after_content'] == 0)) {
				voce_after_content();
		}
		do_action('voce_after_content');
	}
}

function voce_before_content_column_home_output() {
	global $options;
	if ($options['switch_voce_before_content_column'] == 0) {
		if ($options['home_voce_before_content_column'] == 0) {
			voce_before_content_column();
		}
		do_action('voce_before_content_column');
	}
}

function voce_before_content_column_posts_output() {
	global $options;
	if ($options['switch_voce_before_content_column'] == 0) {
		if ($options['posts_voce_before_content_column'] == 0) {
			voce_before_content_column();
		}
		do_action('voce_before_content_column');
	}
}

function voce_before_content_column_archive_output() {
	global $options;
	if ($options['switch_voce_before_content_column'] == 0) {
		if ($options['archive_voce_before_content_column'] == 0) {
			voce_before_content_column();
		}
		do_action('voce_before_content_column');
	}
}

function voce_after_content_column_home_output() {
	global $options;
	if ($options['switch_voce_after_content_column'] == 0) {
		if ($options['home_voce_after_content_column'] == 0) {
			voce_after_content_column();
		}
		do_action('voce_after_content_column');
	}
}

function voce_after_content_column_post_output() {
	global $options;
	if ($options['switch_voce_after_content_column'] == 0) {
		if ($options['posts_voce_after_content_column'] == 0) {
			voce_after_content_column();
		}
		do_action('voce_after_content_column');
	}
}

function voce_after_content_column_archive_output() {
	global $options;
	if ($options['switch_voce_after_content_column'] == 0) {
		if ($options['archive_voce_after_content_column'] == 0) {
			voce_after_content_column();
		}
		do_action('voce_after_content_column');
	}
}

function voce_before_article_header_main_output() {
	$options_hooks = get_option('voce_hooks_options');
	if ($options_hooks['switch_voce_before_article_header'] == 0) {
		if ((is_home() && is_front_page() && $options_hooks['home_voce_before_article_header'] == 0 && $options_hooks['front_voce_before_article_header'] == 0) || (is_home() && ! is_front_page() && $options_hooks['home_voce_before_article_header'] == 0) || (is_front_page() && ! is_home() && $options_hooks['front_voce_before_article_header'] == 0)) {
			voce_before_article_header();
		}
		do_action('voce_before_article_header');
	}
}

function voce_before_article_header_posts_output() {
	global $options;
	$options = get_option('voce_hooks_options');
	if ($options['switch_voce_before_article_header'] == 0) {
		if ($options['posts_voce_before_article_header'] == 0) {
			voce_before_article_header();
		}
		do_action('voce_before_article_header');
	}
}

function voce_after_article_header_main_output() {
	$options_hooks = get_option('voce_hooks_options');
	if ($options_hooks['switch_voce_after_article_header'] == 0) {
		if ((is_home() && is_front_page() && $options_hooks['home_voce_after_article_header'] == 0 && $options_hooks['front_voce_after_article_header'] == 0) || (is_home() && ! is_front_page() && $options_hooks['home_voce_after_article_header'] == 0) || (is_front_page() && ! is_home() && $options_hooks['front_voce_after_article_header'] == 0)) {
			voce_after_article_header();
		}
		do_action('voce_after_article_header');
	}
}

function voce_after_article_header_posts_output() {
	global $options;
	$options = get_option('voce_hooks_options');
	if ($options['switch_voce_after_article_header'] == 0) {
		if ($options['posts_voce_after_article_header'] == 0) {
			voce_after_article_header();
		}
		do_action('voce_after_article_header');
	}
}

function voce_last_byline_item_output() {
	global $options_hooks;
	if ($options_hooks['switch_voce_last_byline_item'] == 0) {
		if	((is_single() && $options_hooks['posts_voce_last_byline_item'] == 0) ||
			(is_home() && $options_hooks['home_voce_last_byline_item'] == 0) ||
			(is_archive() && $options_hooks['archive_voce_last_byline_item'] == 0) ||
			(is_search() && $options_hooks['search_voce_last_byline_item'] == 0)) {
				voce_last_byline_item();
		}
		do_action('voce_last_byline_item');
	}
}

function voce_post_footer_output() {
	global $options;
	if ($options['switch_voce_post_footer'] == 0) {
		if ($options['posts_voce_post_footer'] == 0) {
			voce_post_footer();
		}
		do_action('voce_post_footer');
	}
}

function voce_before_sidebar_1_output() {
	global $options_hooks;
	if ($options_hooks['switch_voce_before_sidebar_1'] == 0) {
		if 	((is_home() && is_front_page() && $options_hooks['home_voce_before_sidebar_1'] == 0 && $options_hooks['front_voce_before_sidebar_1'] == 0) ||
			(is_home() && ! is_front_page() && $options_hooks['home_voce_before_sidebar_1'] == 0) ||
			(is_front_page() && ! is_home() && $options_hooks['front_voce_before_sidebar_1'] == 0) ||
			(is_single() && $options_hooks['posts_voce_before_sidebar_1'] == 0) ||
			(is_page() && ! is_front_page() && $options_hooks['pages_voce_before_sidebar_1'] == 0) ||
			(is_archive() && $options_hooks['archive_voce_before_sidebar_1'] == 0) ||
			(is_search() && $options_hooks['search_voce_before_sidebar_1'] == 0) ||
			(is_404() && $options_hooks['404_voce_before_sidebar_1'] == 0)) {
				voce_before_sidebar_1();
		}
		do_action('voce_before_sidebar_1');
	}
}

function voce_after_sidebar_1_output() {
	global $options_hooks;
	if ($options_hooks['switch_voce_after_sidebar_1'] == 0) {
		if 	((is_home() && is_front_page() && $options_hooks['home_voce_after_sidebar_1'] == 0 && $options_hooks['front_voce_after_sidebar_1'] == 0) ||
			(is_home() && ! is_front_page() && $options_hooks['home_voce_after_sidebar_1'] == 0) ||
			(is_front_page() && ! is_home() && $options_hooks['front_voce_after_sidebar_1'] == 0) ||
			(is_single() && $options_hooks['posts_voce_after_sidebar_1'] == 0) ||
			(is_page() && ! is_front_page() && $options_hooks['pages_voce_after_sidebar_1'] == 0) ||
			(is_archive() && $options_hooks['archive_voce_after_sidebar_1'] == 0) ||
			(is_search() && $options_hooks['search_voce_after_sidebar_1'] == 0) ||
			(is_404() && $options_hooks['404_voce_after_sidebar_1'] == 0)) {
				voce_after_sidebar_1();
		}
		do_action('voce_after_sidebar_1');
	}
}

function voce_before_sidebar_2_output() {
	global $options_hooks;
	if ($options_hooks['switch_voce_before_sidebar_2'] == 0) {
		if 	((is_home() && is_front_page() && $options_hooks['home_voce_before_sidebar_2'] == 0 && $options_hooks['front_voce_before_sidebar_2'] == 0) ||
			(is_home() && ! is_front_page() && $options_hooks['home_voce_before_sidebar_2'] == 0) ||
			(is_front_page() && ! is_home() && $options_hooks['front_voce_before_sidebar_2'] == 0) ||
			(is_single() && $options_hooks['posts_voce_before_sidebar_2'] == 0) ||
			(is_page() && ! is_front_page() && $options_hooks['pages_voce_before_sidebar_2'] == 0) ||
			(is_archive() && $options_hooks['archive_voce_before_sidebar_2'] == 0) ||
			(is_search() && $options_hooks['search_voce_before_sidebar_2'] == 0) ||
			(is_404() && $options_hooks['404_voce_before_sidebar_2'] == 0)) {
				voce_before_sidebar_2();
		}
		do_action('voce_before_sidebar_2');
	}
}

function voce_after_sidebar_2_output() {
	global $options_hooks;
	if ($options_hooks['switch_voce_after_sidebar_2'] == 0) {
		if 	((is_home() && is_front_page() && $options_hooks['home_voce_after_sidebar_2'] == 0 && $options_hooks['front_voce_after_sidebar_2'] == 0) ||
			(is_home() && ! is_front_page() && $options_hooks['home_voce_after_sidebar_2'] == 0) ||
			(is_front_page() && ! is_home() && $options_hooks['front_voce_after_sidebar_2'] == 0) ||
			(is_single() && $options_hooks['posts_voce_after_sidebar_2'] == 0) ||
			(is_page() && ! is_front_page() && $options_hooks['pages_voce_after_sidebar_2'] == 0) ||
			(is_archive() && $options_hooks['archive_voce_after_sidebar_2'] == 0) ||
			(is_search() && $options_hooks['search_voce_after_sidebar_2'] == 0) ||
			(is_404() && $options_hooks['404_voce_after_sidebar_2'] == 0)) {
				voce_after_sidebar_2();
		}
		do_action('voce_after_sidebar_2');
	}
}