<?php
/*
* Main Voce Theme Setup
*/
define ('THEME_NAME', 'Voce Theme');
define ('THEME_VERSION', '2.0.2');
define ('THEME_URI', 'https://wpstudio.com/themes/voce-theme');
define ('THEME_PATH', get_template_directory());
define ('THEME_PATH_CHILD', get_stylesheet_directory());
define ('THEME_PATH_URI', get_template_directory_uri());
define ('THEME_STYLESHEET', get_stylesheet_uri());
define ('THEME_HTML', THEME_PATH . '/inc/html');
define ('THEME_OPTIONS', THEME_PATH . '/inc/options');
define ('THEME_FUNCTIONS', THEME_PATH . '/inc/functions');

require_once (THEME_PATH . '/loops.php');
require_once (THEME_PATH . '/structure.php');
require_once (THEME_PATH . '/template-tags.php');
require_once (THEME_HTML . '/header-html.php');
require_once (THEME_HTML . '/around-content.php');
require_once (THEME_HTML . '/main-content.php');
require_once (THEME_HTML . '/footer-html.php');
require_once (THEME_OPTIONS . '/conditionals.php');
require_once (THEME_OPTIONS . '/hook-output.php');
require_once (THEME_OPTIONS . '/theme-options.php');
require_once (THEME_OPTIONS . '/options-setup.php');
require_once (THEME_OPTIONS . '/option-defaults.php');
require_once (THEME_OPTIONS . '/admin-menu.php');
require_once (THEME_OPTIONS . '/post-meta.php');
require_once (THEME_FUNCTIONS . '/menus.php');
require_once (THEME_FUNCTIONS . '/columns.php');
require_once (THEME_FUNCTIONS . '/widgets.php');
require_once (THEME_FUNCTIONS . '/byline.php');
require_once (THEME_FUNCTIONS . '/page-nav.php');
require_once (THEME_FUNCTIONS . '/content.php');
require_once (THEME_FUNCTIONS . '/body-class.php');
require_once (THEME_FUNCTIONS . '/post-formats.php');

if (!function_exists('voce_setup')){
// voce_setup() BEGINS here - If you ever need to override how the Voce theme is setup initially, you can override it here. I would recommend you do this as a last resort.
	function voce_setup() {
		if (!isset($content_width)){
			$content_width = apply_filters('voce_content_width', 580);
		}
		add_theme_support('automatic-feed-links');
		add_theme_support('post-thumbnails');
		add_image_size( 'product-image', 580, 360, true );
		add_theme_support( 'title-tag' );
		$menu_description = apply_filters('menu_descriptions', array(
			'header_menu_description' => __('Header Menu (Supports 1 drop-down level)', 'voce'),
			'standard_menu_description' => __('Standard Menu (unlimited drop-downs)', 'voce'),
			'footer_menu_description' => __('Footer Menu (unlimited drop-downs)', 'voce')
			)
		);
		register_nav_menus(array(
			'header' => $menu_description['header_menu_description']
		));
		$options = get_option('voce_content_options');
		if (voce_standard_menu_on()){
			register_nav_menus(array(
				'standard' => $menu_description['standard_menu_description']
			));
		}
		if (voce_footer_menu_on()){
			register_nav_menus(array(
				'footer' => $menu_description['footer_menu_description']
			));
		}
	}
// voce_setup() ENDS here
}
add_action('after_setup_theme', 'voce_setup');

if ( ! function_exists('voce_front_scripts')){
// voce_front_scripts() BEGINS here - This is the front end scripts and styles
	function voce_front_scripts(){
		wp_enqueue_style('style', THEME_PATH_URI . '/style.css', array(), '119');
		wp_enqueue_script('navigation', THEME_PATH_URI . '/inc/js/navigation.js', array(), THEME_VERSION, true);
		if (is_singular() && comments_open() && get_option('thread_comments')){
			wp_enqueue_script('comment-reply');
		}
		wp_enqueue_style('gridcss', THEME_PATH_URI . '/gridcss.php', array(), THEME_VERSION);
	}
// voce_front_scripts() ENDS here
}
add_action('wp_enqueue_scripts', 'voce_front_scripts', 1);

if ( ! function_exists( 'voce_back_scripts' )){
// voce_back_scripts() BEGINS here - This is the back end scripts and styles
	function voce_back_scripts(){
		wp_enqueue_style('theme-options-new', THEME_PATH_URI . '/inc/options/theme-options.css', array(), THEME_VERSION);
		if ('appearance_page_wpsvoce_options' == get_current_screen()->id){
			wp_enqueue_script('jquery');
			wp_enqueue_script('thickbox');
			wp_enqueue_style('thickbox');
			wp_enqueue_script('media-upload');
		}
	}
// voce_back_scripts() ENDS here
}
add_action('admin_enqueue_scripts', 'voce_back_scripts');