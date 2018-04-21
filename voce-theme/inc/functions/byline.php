<?php
/*
* Byline functions
*/
if (!function_exists('wpsvoce_post_meta')){
// wpsvoce_post_meta() BEGINS here - This applies the structure of the post byline based on the settings in the admin area.
	function wpsvoce_post_meta(){
		global $count, $options_hooks;
		$options_hooks = get_option('voce_hooks_options');
		$byline_text = apply_filters('byline_text', array(
			'publish_date' => __('Published on', 'voce'),
			'author_text' => __('by', 'voce'),
			'comments_dash' => '&ndash;',
			'comments_off' => __('Comments off', 'voce'),
			'category_text' => __('Filed under:', 'voce')
		));
		$byline_top_items = voce_byline_date_on() || voce_byline_author_on() || voce_byline_comments_on() || voce_byline_edit_on();
		$byline_categories = voce_byline_cats_on();
		if ($byline_top_items) echo '<div class="meta-top">';
		if (voce_byline_date_on()){
			?>
			<span class="posted-on">
				<?php echo $byline_text['publish_date']; ?>
			</span>
			<span class="meta-date">
				<a href="<?php echo esc_url(the_permalink()); ?>" title="<?php esc_attr_e(__('Permalink - ', 'voce')); _e(the_title_attribute('echo=0')); ?>" rel="bookmark"><?php the_time(get_option('date_format')); ?></a>
			</span>
			<?php
		}
		if (voce_byline_author_on()){
			?>
			<span class="post-by">
				<?php echo $byline_text['author_text']; ?>
			</span>
			<span class="meta-author">
				<a class="fn" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" title="<?php esc_attr_e(get_the_author()); ?>"><?php echo the_author_meta('display_name'); ?></a>
			</span>
			<?php
		}
		if (voce_byline_comments_on()){
			if (!voce_byline_date_on() && !voce_byline_author_on()){
				?>
				<span class="meta-comments">
				<?php
			} else {
				?>
				<span class="comments-dash">
					<?php echo $byline_text['comments_dash']; ?>
				</span>
				<span class="meta-comments">
				<?php
			}
			$response_count = get_comments_number();
			$comment_count = voce_comments_only_count($count);
			if (!comments_open() && 0 == $response_count){
				$comments = $byline_text['comments_off'] . ' ';
			} else {
				$num_comments = voce_comments_only_count($count);
				if (0 == $num_comments) {
					$comments = __('0 Comments ', 'voce');
				} elseif ($num_comments > 1) {
					$comments = $num_comments . __(' Comments ', 'voce');
				} else {
					$comments = __('1 Comment', 'voce');
				}
			}
			echo $comments . '</span>';
		}
		voce_last_byline_item_output();
		if (voce_byline_edit_on()){
			edit_post_link(__('Edit', 'voce'), '<span class="edit-link"> ', '</span> ');
		}
		if ($byline_top_items) echo '</div>';
		if ($byline_categories) echo '<div class="meta-bottom">';
		if (voce_byline_cats_on()){
			?>
			<span class="cat-title"><?php echo $byline_text['category_text']; ?></span>
				<span class="meta-category">
					<?php the_category(', '); ?>
				</span>
			<?php
		}
		if ($byline_categories) echo '</div>';
	}
// wpsvoce_post_meta() ENDS here
}