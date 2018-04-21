<?php
/*
* Body classes for different views
*/
if ( ! function_exists( 'voce_page_template_body_class' )) {
// voce_page_template_body_class() BEGINS here - This adds classes to the body class based on the page template used.
	function voce_page_template_body_class($classes){
		if (is_page_template('custom-landing.php')){
			$classes[] = "landing";
		} elseif (is_page_template('custom-pagebuilder.php')){
			$classes[] = "pagebuilder";
		} elseif (is_page_template('custom-squeeze.php')){
			$classes[] = "squeeze";
		}
		return $classes;
	}
}
// voce_page_template_body_class() ENDS here
add_filter('body_class', 'voce_page_template_body_class');


if ( ! function_exists( 'voce_main_layout_class' )) {
// voce_main_layout_class() BEGINS here - This assigns additional classes to the body class based on layout structure.
	function voce_main_layout_class($classes){
		global $post;
		if (!is_404() && !is_search()){
			$single_layout = get_post_meta($post->ID, '_singular-column', true);
		}
		if (is_singular()){
			if ('default' == $single_layout || '' == $single_layout){
				if (1 == voce_get_column_count()){
					$classes[] = 'one-col';
				} elseif (2 == voce_get_column_count()){
					$classes[] = 'two-col';
				} elseif (3 == voce_get_column_count()){
					$classes[] = 'three-col';
				}
				$classes[] = voce_get_layout();
			} elseif ($single_layout == 'c1' || $single_layout == 'c2') {
				$classes[] = 'one-col';
				$classes[] = $single_layout;
			} elseif ($single_layout == 'cs' || $single_layout == 'sc'){
				$classes[] = 'two-col';
				$classes[] = $single_layout;
			} elseif ($single_layout == 'css' || $single_layout == 'scs' || $single_layout == 'ssc'){
				$classes[] = 'three-col';
				$classes[] = $single_layout;
			}
		} else {
			if (1 == voce_get_column_count()){
				$classes[] = 'one-col';
			} elseif (2 == voce_get_column_count()){
				$classes[] = 'two-col';
			} elseif (3 == voce_get_column_count()){
				$classes[] = 'three-col';
			}
			$classes[] = voce_get_layout();
		}
		return $classes;
	}
}
// voce_main_layout_class() ENDS here
add_filter('body_class', 'voce_main_layout_class');

if ( ! function_exists( 'voce_singular_body_class' )){
// voce_singular_body_class() BEGINS here - This adds a no-title class to single post pages if no title is checked and also adds any additional classes added to the Voce Quick Post Settings boxes.
	function voce_singular_body_class($classes){
		global $post;
		if (is_singular()){
			$da_title_or_no = get_post_meta($post->ID, '_singular-title', true);
			$singular_body_class = get_post_meta($post->ID, '_custom-class', true);
			if ('' !== $singular_body_class){
				$classes[] = $singular_body_class;
			}
			if (is_page() && 1 == $da_title_or_no){
				$classes[] = 'no-title';
			}
		}
		return $classes;
	}
}
// voce_singular_body_class() ENDS here
add_filter('body_class', 'voce_singular_body_class');