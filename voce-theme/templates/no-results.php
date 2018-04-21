<?php
/*
* Content template for when a post cannot be found or a 404 error page cannot be found
*/
global $options;

if (is_404()){
	get_template_part('templates/404', 'index');
} else {
	?>
	<article id="post-0" class="post no-results not-found">
		<header class="entry-header">
			<h1 class="entry-title">
				<?php _e('Nothing Found', 'voce'); ?>
			</h1>
		</header>
		<section class="entry-content">
			<?php
			if (is_home() && current_user_can('publish_posts')){
				?>
				<p class="first-post">
					<?php echo __('Ready to publish your first post? ', 'voce'), '<a href="' . admin_url('post-new.php') . '">', __('Get started here', 'voce'), '</a>'; ?>
				</p>
				<?php
			} elseif (is_search()){
				?>
				<p class="no-search-results">
					<?php _e('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'voce'); ?>
				</p>
				<?php
				get_search_form();
			} else {
				?>
				<p class="no-posts">
					<?php _e('We cannot seem to find what you are looking for.', 'voce'); ?>
				</p>
				<?php
				get_search_form();
			}
			?>
		</section>
	</article>
	<?php
}