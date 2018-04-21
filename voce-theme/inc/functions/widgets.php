<?php
/*
* Widget functions for Voce Theme Framework
*/
if ( ! function_exists( 'voce_widgets_init' )){
// voce_widgets_init() BEGINS here - This sets up all the default widgets.
	function voce_widgets_init(){
		register_sidebar(array(
			'name' => __('Primary Sidebar', 'voce'),
			'id' => 'sidebar-1',
			'description' => __('In all layouts that include sidebars, this will be the leftmost sidebar (Sidebar 1).', 'voce'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => __('Secondary Sidebar', 'voce'),
			'id' => 'sidebar-2',
			'description' => __('In all layouts that include two sidebars, this will be the rightmost sidebar (Sidebar 2).', 'voce'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => __('Footer Left', 'voce'),
			'id' => 'footer-left',
			'description' => __('Far left footer widget', 'voce'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => __('Footer Middle', 'voce'),
			'id' => 'footer-middle',
			'description' => __('Middle footer widget', 'voce'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => __('Footer Right', 'voce'),
			'id' => 'footer-right',
			'description' => __('Far right footer widget', 'voce'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		));
	}
// voce_widgets_init() END here
}
add_action('widgets_init', 'voce_widgets_init', 10);

if (!function_exists('voce_default_widget')) {
// voce_default_widget() BEGINS here - This creates the default widget and text with the Voce Theme
	function voce_default_widget() {
		if (voce_default_widget_on()) {
			?>
			<aside class="widget default-widget">
				<h4 class="widget-title">
					<?php _e('Default Widget', 'voce'); ?>
				</h4>
				<p><?php printf(__('This is a widget placeholder. You have a widgetized area activated with no assigned widgets. To add widgets, visit the %s of your WordPress dashboard.', 'voce'), '<a href="' . admin_url('/widgets.php') . '">' . __('widgets page', 'voce') . '</a>'); ?></p>
			</aside>
			<?php
		}
	}
// voce_default_widget() ENDS here
}

if ( ! function_exists('voce_fat_footer_body_class' )){
// voce_fat_footer_body_class() BEGINS here - This creates the "fat footer" in the Voce Theme
	function voce_fat_footer_body_class($classes) {
		$count = 0;
		$footer_widgets = array('footer-left', 'footer-middle', 'footer-right');
		foreach ($footer_widgets as $widget) {
			if (is_active_sidebar($widget)) {
				$count = $count + 1;
			}
		}
		switch ($count) {
			case 1 :
				$classes[] = "one-footer-col";
				break;
			case 2 :
				$classes[] = "two-footer-col";
				break;
			case 3 :
				$classes[] = "three-footer-col";
				break;
		}
		return $classes;
	}
// voce_fat_footer_body_class() ENDS here
}
add_filter('body_class', 'voce_fat_footer_body_class');