<?php
/*
* Template Tags for the Voce Theme
*/
if (!function_exists('voce_comment')){
// voce_comment() BEGINS here - This sets the structure of the comments
	function voce_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		$avatar_size = apply_filters('avatar_size', 50);
		switch ($comment->comment_type){
			case 'pingback':
			case 'trackback': ?>
				<li class="post pingback">
					<p><?php echo __('Pingback: ', 'voce'), comment_author_link(), edit_comment_link(__('(Edit)', 'voce'), ' '); ?></p>
					<?php
					break;
			default : ?>
				<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
					<article id="comment-<?php comment_ID(); ?>" class="comment">
						<footer>
							<div class="comment-author vcard">
								<div class="comment-avatar">
									<?php echo get_avatar($comment, $avatar_size); ?>
								</div>
							</div>
							<?php
							if ($comment->comment_approved == '0'){ ?>
								<em><?php _e('Your comment is awaiting moderation.', 'voce'); ?></em><br />
							<?php } ?>
							<div class="comment-meta commentmetadata">
								<cite class="fn"><?php echo get_comment_author_link(); ?></cite>
								<div class="comment-date">
									<a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
										<time pubdate datetime="<?php echo comment_time('c'); ?>">
										<?php echo get_comment_date(); ?>
										</time>
									</a>
									<?php edit_comment_link(__('(Edit)', 'voce'), ' '); ?>
								</div>
							</div>
						</footer>
						<div class="comment-content">
							<?php comment_text(); ?>
						</div>
						<div class="reply">
							<?php
							comment_reply_link(
								array_merge($args, array(
									'depth' => $depth,
									'max_depth' => $args['max_depth']
								))
							);
							?>
						</div>
					</article>
				<?php
				break;
		}
	}
// voce_comment() ENDS here
}

// Returns true if blog has more than one category
function voce_categorized_blog(){
	if (false === ($all_the_cool_cats = get_transient('all_the_cool_cats'))){
		$all_the_cool_cats = get_categories(array(
			'hide_empty' => 1,
		));
		$all_the_cool_cats = count($all_the_cool_cats);
		set_transient('all_the_cool_cats', $all_the_cool_cats);
	}
	if ('1' != $all_the_cool_cats){
		return true;
	} else {
		return false;
	}
}

// Flush Transients
function voce_category_transient_flusher(){
	delete_transient('all_the_cool_cats');
}
add_action('edit_category', 'voce_category_transient_flusher');
add_action('save_post', 'voce_category_transient_flusher');