<?php
/*
 * Template Name: Squeeze Page
*/
get_header();

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

get_footer();