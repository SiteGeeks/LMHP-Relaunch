<?php
/*
* Content template for page results
*/
$da_title_or_no = get_post_meta($post->ID, '_singular-title', true);

// Custom filter
$page_page_nav = apply_filters('page_page_nav', __('Pages:', 'voce')); ?>

<article id="post-<?php echo the_ID(); ?>" <?php post_class(); ?>>
	<?php if (0 == $da_title_or_no) { ?>
		<header class="entry-header">
			<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
		</header>
	<?php } ?>
	<section class="entry-content">
		<?php
			// display page content
			the_content();

			// internal page navigation
			wp_link_pages(array('before' => '<nav class="page-links post-meta-footer">' . $page_page_nav, 'after' => '</nav>'));

		?>
	</section>
</article>