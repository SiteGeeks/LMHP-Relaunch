<?php
/*
* Template Name: Landing Page
*/
$options = get_option('voce_hooks_options');

get_header();

voce_header_frame();

if (voce_is_full_width()) : ?>

	<div id="main-content" class="full clearfix">
		<div class="main clearfix">
			<?php voce_content(); ?>
		</div>
	</div>

<?php else : ?>

	<div id="main-content" class="clearfix">
		<?php voce_content(); ?>
	</div>

<?php endif;

voce_footer_frame();

get_footer();