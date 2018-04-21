<?php
/*
* Header HTML structure
*/
if ( ! function_exists('voce_header_element')){
// voce_header_element() BEGINS here - This sets the header structure.
	function voce_header_element() { ?>
		<header class="site-header inner">
			<?php
			voce_header_top_output();
			?>
			<span class="header-logo-image"></span>
			<?php
			if (voce_site_title_on()) {
				?>
				<h1 class="site-title">
					<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php esc_attr(get_bloginfo('name')); ?>" rel="home">
						<?php echo get_bloginfo('name'); ?>
					</a>
				</h1>
				<?php
			}
			if (voce_site_tagline_on() && ! is_page_template('custom-landing.php')) {
				?>
				<h2 class="site-description">
					<?php echo esc_attr_e(get_bloginfo('description')); ?>
				</h2>
				<?php
			}
			voce_header_after_title_tagline_output();
			voce_header_menu();
			voce_header_bottom_output();
			?>
		</header>
		<?php
	}
// voce_header_element() ENDS here
}

if (!function_exists('voce_header_frame')) {
// voce_header_frame() BEGINS here - This wraps the header in a full or page width
	function voce_header_frame() {
		if (voce_is_full_width()) {
			?>
			<div id="header-area" class="full">
				<div class="main">
					<?php voce_header_element(); ?>
				</div>
			</div>
			<?php
		} else {
			?>
			<div id="container">
				<?php voce_header_element(); ?>
			<?php
		}
	}
// voce_header_frame() ENDS here
}