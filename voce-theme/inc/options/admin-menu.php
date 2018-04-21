<?php
/*
* Admin Menu Bar
*/
include_once(ABSPATH.'wp-admin/includes/plugin.php');
if ( current_user_can('manage_options')){
// voce_toolbar() BEGINS here - This sets the Voce Admin Toolbar options
	function voce_toolbar($admin_bar){
		$admin_bar->add_menu(array(
			'id' => 'wpsvoce',
			'title' => THEME_NAME,
			'meta' => array(
				'title' => THEME_NAME,
			),
		));
		$admin_bar->add_menu(array(
			'id' => 'wpsvoce-options-global',
			'parent' => 'wpsvoce',
			'title' => __('Structure Options', 'voce'),
			'href' => site_url('/wp-admin/themes.php?page=wpsvoce_options&tab=structure'),
			'meta' => array(
				'title' => __('Structure Options', 'voce'),
				'target' => '_self'
			),
		));
		$admin_bar->add_menu(array(
			'id' => 'wpsvoce-options-content',
			'parent' => 'wpsvoce',
			'title' => __('Content Options', 'voce'),
			'href' => site_url('/wp-admin/themes.php?page=wpsvoce_options&tab=content'),
			'meta' => array(
				'title' => __('Content Options', 'voce'),
				'target' => '_self'
			),
		));
		$admin_bar->add_menu(array(
			'id' => 'wpsvoce-options-hooks',
			'parent' => 'wpsvoce',
			'title' => __('Custom Hooks', 'voce'),
			'href' => site_url('/wp-admin/themes.php?page=wpsvoce_options&tab=hooks'),
			'meta' => array(
				'title' => __('Custom Hooks', 'voce'),
				'target' => '_self'
			),
		));
		$admin_bar->add_menu(array(
			'id' => 'wpsvoce-options-functionbuilder',
			'parent' => 'wpsvoce',
			'title' => __('Function Builder', 'voce'),
			'href' => site_url('/wp-admin/themes.php?page=wpsvoce_options&tab=function+builder'),
			'meta' => array(
				'title' => __('Function Builder', 'voce'),
				'target' => '_self'
			),
		));
		$admin_bar->add_menu(array(
			'id' => 'wpsvoce-options-enhancedcode',
			'parent' => 'wpsvoce',
			'title' => __('Enhanced Code', 'voce'),
			'href' => site_url('/wp-admin/themes.php?page=wpsvoce_options&tab=enhancements'),
			'meta' => array(
				'title' => __('Enhanced Code', 'voce'),
				'target' => '_self'
			),
		));
		$admin_bar->add_menu(array(
			'id' => 'wpsvoce-version',
			'parent' => 'wpsvoce',
			'title' => __('Version: ' . THEME_VERSION, 'voce')
		));
	}
// voce_toolbar() ENDS here
add_action('admin_bar_menu', 'voce_toolbar', 100);
}