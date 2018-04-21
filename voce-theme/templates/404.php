<?php
/*
* 404 template for content area
*/
$error_404 = apply_filters('error_404_content', array(
	'error_title' => __('Hmmm... Something went wrong.', 'voce'),
	'error_content' => __('Please use the search form or other tools below to find what you were looking for.', 'voce')
	));
?>
<article id="post-0" class="post error404 not-found">
	<header class="entry-header">
		<h1 class="entry-title">
			<?php echo $error_404['error_title']; ?>
		</h1>
	</header>
	<section class="entry-content">
		<p><?php echo $error_404['error_content']; ?></p>
		<?php
		get_search_form();

		the_widget('WP_Widget_Recent_Posts');
		?>
		<div class="widget">
			<h4 class="widget-title">
				<?php _e('Most Used Categories', 'voce'); ?>
			</h4>
			<ul>
				<?php
				wp_list_categories(array(
					'orderby' => 'count',
					'order' => 'DESC',
					'title_li' => '',
					'number' => 10,
					'depth' => -1,
				));
				?>
			</ul>
		</div>
		<?php
		$archive_content = '<p>' . sprintf(__('Try looking in the monthly archives. %1$s', 'voce'), convert_smilies(':)')) . '</p>';
		the_widget('WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content");
		?>
	</section>
</article>