<?php
/*
* Footer HTML structure
*/
if ( ! function_exists('voce_footer_element')){
// voce_footer_element() BEGINS here - This sets the footer structure area
	function voce_footer_element(){
		?>
		<footer class="site-footer">
			<?php
			voce_footer_top_output();
			if (!is_page_template('custom-landing.php') && (is_active_sidebar('footer-left') || is_active_sidebar('footer-middle') || is_active_sidebar('footer-right'))) :
				?>
				<div id="fat-footer" class="clearfix">
					<?php if (is_active_sidebar('footer-left')) {
						?>
						<div class="footer-widget border-box">
							<?php dynamic_sidebar('footer-left'); ?>
						</div>
						<?php
					}
					if (is_active_sidebar('footer-middle')){
						?>
						<div class="footer-widget border-box">
							<?php dynamic_sidebar('footer-middle'); ?>
						</div>
						<?php
					}
					if (is_active_sidebar('footer-right')){
						?>
						<div class="footer-widget border-box">
							<?php dynamic_sidebar('footer-right'); ?>
						</div>
						<?php
					}
					?>
				</div>
				<?php
			endif;
			voce_footer_bottom_output();
			?>
			<div class="site-info">
				<?php voce_site_info_output(); ?>
			</div>
		</footer>
		<?php
	}
// voce_footer_element() ENDS here
}

if (!function_exists('voce_footer_frame')){
// voce_footer_frame() BEGINS here - This wraps the footer area in full or page width
	function voce_footer_frame() {
		if (voce_is_full_width()){
			?>
			<div id="footer-area" class="full">
				<div class="main">
					<?php voce_footer_element(); ?>
				</div>
			</div>
			<?php
		} else {
			?>
				<?php voce_footer_element(); ?>
			</div>
			<?php
		}
	}
// voce_footer_frame() ENDS here
}