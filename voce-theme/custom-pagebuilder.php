<?php
/*
* Template Name: Page Builder
*/
get_header();

if (voce_is_full_width()) : ?>

	<div id="main-content" class="full clearfix">
		<div class="main clearfix" style="width:100%;">
			<?php voce_content(); ?>
		</div>
	</div>

<?php else : ?>

	<div id="main-content" class="clearfix">
		<?php voce_content(); ?>
	</div>

<?php endif;

// footer.php
get_footer();