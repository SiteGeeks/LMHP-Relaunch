<?php
/*
* Content template for Status Post Format
*/
$da_title_or_no = get_post_meta($post->ID, '_singular-title', true);

// Custom filter
$post_page_nav = apply_filters('post_page_nav', __('Posts:', 'voce'));
$single_tags_text = apply_filters('single_tags_text', __('Tags: ', 'voce'));
?>
<article id="post-<?php echo the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="voce-postformat-status">

		<div class="voce-postformat-status-content">
			<?php the_title('<h1><a href="' . esc_url(get_permalink()) . '" title="' . esc_attr(the_title_attribute('echo=0')) . '" rel="bookmark">', '</a></h1>'); ?></a>
		</div>
		<span class="voce-postformat-status-timestamp">Update Posted on : <?php the_time(get_option('date_format')); ?></span>

	</div>
		<?php
			// internal page navigation
			wp_link_pages(array('before' => '<nav class="page-links post-meta-footer">' . $post_page_nav, 'after' => '</nav>'));
			if (voce_single_tags_on()) {
				the_tags('<div class="entry-meta tags post-meta-footer">' . $single_tags_text, ', ', '<br /></div>');
			}

		?>

</article>
<?php
wpsvoce_content_nav('nav-below');
voce_post_footer_output();
if (comments_open() || '0' != get_comments_number()) {
	comments_template('', true);
}