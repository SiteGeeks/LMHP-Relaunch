<?php
/*
* Functions file calls the Voce Theme's included function files.
*/
require_once(dirname(__FILE__) . '/inc/init-functions.php');
/* Include theme updater. */
require_once( trailingslashit( get_template_directory() ) . 'inc/wpstudio_updater.php' );

//loopbuddy support
add_theme_support('loop-standard');
if ( ! function_exists( 'dynamic_loop' ) ) {
	function dynamic_loop() {
		global $dynamic_loop_handlers;
		if ( empty( $dynamic_loop_handlers ) || ! is_array( $dynamic_loop_handlers ) )
			return false;
		ksort( $dynamic_loop_handlers );
		foreach ( (array) $dynamic_loop_handlers as $handlers ) {
			foreach ( (array) $handlers as $function ) {
				if ( is_callable( $function ) && ( false != call_user_func( $function ) ) ) {
					return true;
				}
			}
		}
		return false;
	}
}
if ( ! function_exists( 'register_dynamic_loop_handler' ) ) {
	function register_dynamic_loop_handler( $function, $priority = 10 ) {
		global $dynamic_loop_handlers;
		if ( ! is_numeric( $priority ) )
			$priority = 10;
		if ( ! isset( $dynamic_loop_handlers ) || ! is_array( $dynamic_loop_handlers ) )
			$dynamic_loop_handlers = array();
		if ( ! isset( $dynamic_loop_handlers[$priority] ) || ! is_array( $dynamic_loop_handlers[$priority] ) )
			$dynamic_loop_handlers[$priority] = array();
		$dynamic_loop_handlers[$priority][] = $function;
	}
}