<?php
/*
* Content template
*/
$feed_tags_text = apply_filters('feed_tags_text', __('Tags: ', 'voce'));
$more_link_text = apply_filters('more_link_text', __('Read More', 'voce'));
$feed_post_page_nav = apply_filters('feed_post_page_nav', __('Pages: ', 'voce'));
?>
<article id="post-<?php echo the_ID(); ?>" <?php post_class(); ?>>
	<?php voce_before_article_header_main_output(); ?>
	<header class="entry-header">
		<?php the_title('<h1 class="entry-title"><a href="' . esc_url(get_permalink()) . '" title="' . esc_attr(the_title_attribute('echo=0')) . '" rel="bookmark">', '</a></h1>'); ?>
		<?php
		if ('post' == get_post_type()) {
			if (voce_has_byline_items() && !has_post_format()) {
				?>
				<div class="entry-meta">
					<?php wpsvoce_post_meta(); ?>
				</div>
				<?php
			}
		}
		?>
	</header>
	<?php
	voce_after_article_header_main_output();

	if (voce_archive_featured_image_on()) {
		if (has_post_thumbnail()) {
			?>
			<a class="featured-img-anchor" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php
				the_post_thumbnail('post-thumbnail', array(
					'class' => 'featured-img',
					'alt' => the_title_attribute('echo=0')
				));
				?>
			</a>
			<?php
		}
	}

	if (is_search() || voce_excerpt_on()) {
		?>
		<section class="entry-summary">
			WOOP
			<?php the_excerpt(); ?>
		</section>
		<?php
	} else {
		?>
		<section class="entry-content">
			<?php
			the_content($more_link_text);
			wp_link_pages(array('before' => '<nav class="page-links">' . $feed_post_page_nav, 'after' => '</nav>'));
			if (voce_archive_tags_on()){
				the_tags('<div class="entry-meta tags">' . $feed_tags_text, ', ', '<br /></div>');
			}
			?>
		</section>
		<?php
	} ?>
</article>