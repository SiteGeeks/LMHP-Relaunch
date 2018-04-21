<?php
/*
* Content template for Aside Post Format
*/
$da_title_or_no = get_post_meta($post->ID, '_singular-title', true);

// Custom filter
$post_page_nav = apply_filters('post_page_nav', __('Posts:', 'voce'));
$single_tags_text = apply_filters('single_tags_text', __('Tags: ', 'voce'));
?>
<article id="post-<?php echo the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="voce-postformat-aside">
	<?php if (0 == $da_title_or_no) { ?>
		<div class="voce-postformat-aside-title">
		<header class="entry-header">
			<?php the_title('<h1 class="entry-title"><a href="' . esc_url(get_permalink()) . '" title="' . esc_attr(the_title_attribute('echo=0')) . '" rel="bookmark">', '</a></h1>'); ?>
		</header>
		</div>
	<?php } ?>
	<div class="voce-postformat-aside-content">
	<section class="entry-content">	
		<?php 
			// display page content
			the_content(); 
				
			// internal page navigation
			wp_link_pages(array('before' => '<nav class="page-links post-meta-footer">' . $post_page_nav, 'after' => '</nav>'));
			if (voce_single_tags_on()) {
				the_tags('<div class="entry-meta tags post-meta-footer">' . $single_tags_text, ', ', '<br /></div>');
			}

		?>
	</section>
	</div>
	</div>
</article>
<?php
wpsvoce_content_nav('nav-below');
voce_post_footer_output();
if (comments_open() || '0' != get_comments_number()) {
	comments_template('', true);
}