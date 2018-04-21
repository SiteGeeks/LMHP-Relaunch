<?php
/*
* HTML structure for main content
*/
if ( ! function_exists( 'voce_standard_content' )){
// voce_standard_content() BEGINS here - This wraps the content in a full or page width
	function voce_standard_content() {
		if (voce_is_full_width()) {
			?>
			<div id="main-content" class="full clearfix">
				<div class="main clearfix">
					<?php voce_columns(); ?>
				</div>
			</div>
			<?php
		} else { ?>
			<div id="main-content" class="clearfix">
				<?php voce_columns(); ?>
			</div>
			<?php
		}
	}
// voce_standard_content() ENDS here
}
add_action('main_content', 'voce_standard_content');

if ( ! function_exists( 'voce_singular_content' )){
// voce_singular_content() BEGINS here - This wraps the single content posts with full or page width
	function voce_singular_content() {
		if (voce_is_full_width()) {
			?>
			<div id="main-content" class="full clearfix">
				<div class="main clearfix">
					<?php voce_columns_singular(); ?>
				</div>
			</div>
			<?php
		} else { ?>
			<div id="main-content" class="clearfix">
				<?php voce_columns_singular(); ?>
			</div>
			<?php
		}
	}
// voce_singular_content() ENDS here
}
add_action('main_content_singular', 'voce_singular_content');

if ( ! function_exists('voce_custom_content')){
// voce_custom_content() BEGINS here - This is the custom content that gets added to the main_content_custom_layout hook
	function voce_custom_content() {}
// voce_custom_content() ENDS here
}
add_action('main_content_custom_layout', 'voce_custom_content');