<?php
/*
* Menu functions for Voce Theme Framework
*/
if (!function_exists('voce_header_menu')){
// voce_header_menu() BEGINS here - This sets the header menu wrap.
	function voce_header_menu(){
		$header_menu_toggle = apply_filters('header_menu_toggle', __('Menu', 'voce'));
		if (voce_header_menu_on() && !is_page_template('custom-landing.php') && (true == has_nav_menu('header'))){
			?>
			<nav id="header-menu-wrap" class="site-navigation header-navigation border-box">
				<span class="header-menu-toggle"><?php echo $header_menu_toggle; ?></span>
				<?php wp_nav_menu(array('theme_location' => 'header')); ?>
			</nav>
			<?php
		}
	}
// voce_header_menu() ENDS here
}

if (!function_exists('voce_standard_menu')){
// voce_standard_menu() BEGINS here - This sets the standard (main) menu wrap.
	function voce_standard_menu(){
		$standard_menu_toggle = apply_filters('standard_menu_toggle', __('Navigation', 'voce'));
		?>
		<nav id="standard-menu-wrap" class="site-navigation secondary-navigation standard-navigation border-box">
			<span class="standard-menu-toggle secondary-menu-toggle"><?php echo $standard_menu_toggle; ?></span>
			<?php wp_nav_menu(array('theme_location' => 'standard')); ?>
		</nav>
		<?php
	}
// voce_standard_menu() ENDS here
}

if (!function_exists('voce_footer_menu')){
// voce_footer_menu() BEGINS here - This sets the footer menu wrap.
	function voce_footer_menu(){
		$footer_menu_toggle = apply_filters('footer_menu_toggle', __('Navigation', 'voce'));
		?>
		<nav id="footer-menu-wrap" class="site-navigation secondary-navigation footer-navigation border-box">
			<span class="footer-menu-toggle secondary-menu-toggle"><?php echo $footer_menu_toggle; ?></span>
			<?php wp_nav_menu(array('theme_location' => 'footer')); ?>
		</nav>
		<?php
	}
// voce_footer_menu() ENDS here
}

if ( ! function_exists( 'voce_standard_menu_output')){
// voce_standard_menu_output() BEGINS here  - This wraps the standard menu with full width or page width
	function voce_standard_menu_output(){
		if (voce_is_full_width()){
			if (voce_standard_menu_on()) {
				?>
				<div id="menu-area-standard" class="full">
					<div class="main">
						<?php voce_standard_menu(); ?>
					</div>
				</div>
				<?php
			}
		} else {
			if (voce_standard_menu_on()){
				voce_standard_menu();
			}
		}
	}
// voce_standard_menu_output() ENDS here
}

if ( ! function_exists('voce_footer_menu_output')){
// voce_footer_menu_output() BEGINS here - This wraps the footer menu with full width or page width
	function voce_footer_menu_output(){
		if (voce_is_full_width()){
			if (voce_footer_menu_on()){
				?>
				<div id="menu-area-footer" class="full">
					<div class="main">
						<?php voce_footer_menu(); ?>
					</div>
				</div>
				<?php
			}
		} else {
			if (voce_footer_menu_on()){
				voce_footer_menu();
			}
		}
	}
// voce_footer_menu_output() ENDS here
}