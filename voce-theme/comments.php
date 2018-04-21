<?php
/*
* Comments template for Voce Theme
*/
global $count;
$commenter = wp_get_current_commenter();
$req = get_option('require_name_email');
$aria_req = ($req ? " aria-required='true'" : '');
$comments_title = apply_filters(
	'comments_title',
	__(_n('1 Comment:', '%1$s Comments:', voce_comments_only_count($count), 'voce'), 'voce')
);
$comments_text = apply_filters('comments_text', array(
	'comments_closed' => __('Comments are closed.', 'voce'),
	'older_comments' => '&larr; ' . __('Older comments', 'voce'),
	'newer_comments' => __('Newer comments', 'voce') . ' &rarr;',
	'comment_reply_title' => __('Leave a Reply', 'voce'),
	'comment_submit' => __('Submit Comment', 'voce')
	)
);
if (post_password_required()) return; ?>

<div id="comments">
	<div class="comments-wrap">
		<div class="comments-content">

			<?php if (have_comments()) { ?>
				<?php if ('0' != voce_comments_only_count($count)) { ?>
					<span class="comments-title">
						<?php printf($comments_title, number_format_i18n(voce_comments_only_count($count))); ?>
					</span>
				<?php } ?>

				<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) {  ?>
					<nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation clearfix">
						<div class="nav-previous comment-nav border-box">
							<?php previous_comments_link($comments_text['older_comments']); ?>
						</div>
						<div class="nav-next comment-nav border-box">
							<?php next_comments_link($comments_text['newer_comments']); ?>
						</div>
					</nav>
				<?php }  ?>

				<ol class="commentlist">
					<?php

						wp_list_comments(array('callback' => 'voce_comment', 'type' => 'comment'));

					?>
				</ol>

				<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) { ?>
					<nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation clearfix">
						<div class="nav-previous comment-nav border-box">
							<?php previous_comments_link($comments_text['older_comments']); ?>
						</div>
						<div class="nav-next comment-nav border-box">
							<?php next_comments_link($comments_text['newer_comments']); ?>
						</div>
					</nav>
				<?php }
			}

			if (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) { ?>
				<p class="nocomments">
					<?php $comments_text['comments_closed']; ?>
				</p>
				<?php
			}


			/* Comment form */
			comment_form(
				array(
					'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" rows="8" aria-required="true"></textarea></p>',
					'comment_notes_after' => '',
					'title_reply' => $comments_text['comment_reply_title'] . ' ',
					'cancel_reply_link'	=> '<span class="cancel-reply">' . __('Cancel Reply', 'voce') . '</span>',
					'label_submit' => $comments_text['comment_submit'],
					'fields' => apply_filters('comment_form_default_fields', array(
						'author' => '<p class="comment-form-author">' . '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="20"' . $aria_req . ' /><label for="author">' . __('Name', 'voce') . '</label> ' . ($req ? '<span class="required">*</span>' : '') . '</p>',

						'email' => '<p class="comment-form-email">' . '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="20"' . $aria_req . ' /><label for="email">' . __('Email', 'voce') . '</label> ' . ($req ? '<span class="required">*</span>' : '') . '</p>',

						'url' => '<p class="comment-form-url"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url']) . '" size="20" /><label for="url">' . __('Website', 'voce') . '</label></p>'
					))
				)
			);
			?>
		</div>
	</div>
</div>