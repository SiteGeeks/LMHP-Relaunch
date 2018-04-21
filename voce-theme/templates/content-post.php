<?php
/*
* Content template for single posts
*/
$post_page_nav = apply_filters('post_page_nav', __('Pages:', 'voce'));
$single_tags_text = apply_filters('single_tags_text', __('Tags: ', 'voce'));
?>
<article id="post-<?php echo the_ID(); ?>" <?php post_class(); ?>>
	<?php voce_before_article_header_posts_output(); ?>
	<header class="entry-header">
		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
		<?php
		if (voce_has_byline_items()){
			?>
			<div class="entry-meta">
				<?php wpsvoce_post_meta(); ?>
			</div>
			<?php
		}
		?>
	</header>
	<?php
	voce_after_article_header_posts_output();
	if (voce_single_featured_image_on()){
		the_post_thumbnail('full', array(
			'class' => 'featured-img',
			'alt' => the_title_attribute('echo=0')
		));
	}
	?>
	<section class="entry-content">
		<?php
		the_content();
		wp_link_pages(array('before' => '<nav class="page-links post-meta-footer">' . $post_page_nav, 'after' => '</nav>'));
		if (voce_single_tags_on()) {
			the_tags('<div class="entry-meta tags post-meta-footer">' . $single_tags_text, ', ', '<br /></div>');
		}
		?>
	</section>
</article>
<?php
voce_post_footer_output();
if (comments_open() || '0' != get_comments_number()) {
	comments_template('', true);
}
wpsvoce_content_nav('nav-below');