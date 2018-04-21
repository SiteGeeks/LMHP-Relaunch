<?php
/*
* Content template for attachments
*/
global $post, $options;
$metadata = wp_get_attachment_metadata();
$attachment_size = apply_filters('wpsvoce_attachment_size', array(1200, 1200));
$attachment_page_nav = apply_filters('attachment_page_nav', __('Pages:', 'voce'));
$attachment_navigation = apply_filters('attachment_navigation', array(
	'previous_image' => '&larr; ' . __('Previous', 'voce'),
	'next_image' => __('Next', 'voce') . ' &rarr;'
));
?>
<article id="post-<?php echo the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
		<div class="entry-meta">
			<span class="attachment-byline"><?php _e('Published ', 'voce'); ?><span class="entry-date"><time class="entry-date" datetime="<?php esc_attr(get_the_date('c')); ?>" pubdate><?php echo esc_html(get_the_date()); ?></time></span> <?php _e('at ', 'voce'); ?><a href="<?php wp_get_attachment_url(); ?>" title="Link to full-size image"><?php echo $metadata['width']; ?> &times; <?php echo $metadata['height']; ?></a> <?php _e('in ', 'voce'); ?><a href="<?php echo get_permalink($post->post_parent); ?>" title="Return to <?php echo get_the_title($post->post_parent); ?>" rel="gallery"><?php echo get_the_title($post->post_parent); ?></a></span>
		</div>
	</header>
	<section class="entry-content">
		<div class="entry-attachment">
			<div class="attachment">
				<?php
				$attachments = array_values(get_children(array(
					'post_parent' => $post->post_parent,
					'post_status' => 'inherit',
					'post_type' => 'attachment',
					'post_mime_type' => 'image',
					'order' => 'ASC',
					'orderby' => 'menu_order ID'
				)));
				foreach ($attachments as $k => $attachment){
					if ($attachment->ID == $post->ID)
						break;
				}
				$k++;
				if (count($attachments) > 1){
					((isset($attachments[$k])) ?
						$next_attachment_url = get_attachment_link($attachments[$k]->ID) :
						$next_attachment_url = get_attachment_link($attachments[0]->ID));
				} else {
					$next_attachment_url = wp_get_attachment_url();
				}
				?>
				<a href="<?php $next_attachment_url; ?>" title="<?php esc_attr(get_the_title()); ?>" rel="attachment">
					<?php echo wp_get_attachment_image($post->ID, $attachment_size); ?>
				</a>
			</div>
			<?php
			if (!empty($post->post_excerpt)) {
				?>
				<div class="entry-caption">
					<?php the_excerpt(); ?>
				</div>
				<?php
			}
			wp_link_pages(array('before' => '<nav class="page-links post-meta-footer">' . $attachment_page_nav, 'after' => '</nav>'));
			?>
		</div>
		<nav class="site-navigation image-navigation clearfix">
			<div class="nav-previous image-nav border-box">
				<?php previous_image_link(false, $attachment_navigation['previous_image']); ?>
			</div>
			<div class="nav-next image-nav border-box">
				<?Php next_image_link(false, $attachment_navigation['next_image']); ?>
			</div>
		</nav>
	</section>
</article>