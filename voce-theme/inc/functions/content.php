<?php
/*
* Content functions for Voce Theme Framework
*/
if ( ! function_exists( 'voce_first_post_class' )){
// voce_first_post_class() BEGINS here - This sets a class of 'top' to the first post.
	function voce_first_post_class($classes){
		global $wp_query;
		if (0 == $wp_query->current_post) {
			$classes[] = 'top';
		}
		return $classes;
	}
// voce_first_post_class() ENDS here
}
add_filter('post_class', 'voce_first_post_class');

if ( ! function_exists( 'voce_comments_only_count' )){
// voce_comments_only_count() BEGINS here - This returns the count number of comments.
	function voce_comments_only_count($count){
		if (!is_admin()){
			global $id;
			$status = get_comments('status=approve&post_id=' . $id );
			$comments_by_type = separate_comments($status);
			return count($comments_by_type['comment']);
		} else {
			return $count;
		}
	}
// voce_comments_only_count() ENDS here
}

if (voce_excerpt_link_on()){
	if ( ! function_exists( 'voce_replace_excerpt' )){
	// voce_replacement_excerpt() BEGINS here - This applys a filter for the Read More link
		function voce_replace_excerpt($content){
			global $excerpt_link;
			$excerpt_link = apply_filters('excerpt_link', __('Read More', 'voce') . ' &rarr;');
			return str_replace('[&hellip;]', '<p class="excerpt-link"><a class="read-more" href="' . get_permalink() . '">' . $excerpt_link . '</a></p>',
				$content
			);
		}
	// voce_replacement_excerpt() ENDS here
	}
	add_filter('get_the_excerpt', 'voce_replace_excerpt');
}

if ( ! function_exists( 'voce_wp_title' )){
// voce_wp_title() BEGINS here - This is an older method of setting the site SEO title. This is here for compatibility.
	function voce_wp_title($title, $sep){
		if (is_feed()){
			return $title;
		}
		global $page, $paged;
		$title .= get_bloginfo('name', 'display');
		$site_description = get_bloginfo('description', 'display');
		if ($site_description && (is_home() || is_front_page())){
			$title .= " $sep $site_description";
		}
		if (($paged >= 2 || $page >= 2 ) && ! is_404()){
			$title .= " $sep " . sprintf(__('Page %s', '_s'), max($paged, $page));
		}
		return $title;
	}
// voce_wp_title() ENDS here
}
add_filter('wp_title', 'voce_wp_title', 10, 2);