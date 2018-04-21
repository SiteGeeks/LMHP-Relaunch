<?php
/*
* 404 Override
*/
get_header();
voce_html_before_content();
?>
<div id="main-content" <?php if (voce_is_full_width()) {?>class="full"<?php } ?>>
	<?php if ( voce_is_full_width()) { ?>
	<div class="main clearfix">
	<?php } ?>
	<?php if ( !voce_is_full_width()){ ?>
		<div id="content" class="site-content border-box clearfix">
	<?php } ?>
		<?php
		get_template_part('templates/404', 'index');
		?>
	</div>
</div>
<?php
voce_html_after_content();
get_footer();