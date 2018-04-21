<?php
/*
* Page navigation functions
*/
if (!function_exists('wpsvoce_content_nav')){
// wpsvoce_content_nav() BEGINS here - This sets the post navigation system
	function wpsvoce_content_nav($nav_id){
		global $wp_query, $post;
		$nav_class = 'site-navigation paging-navigation clearfix';
		$post_navigation = apply_filters('post_navigation', array(
			'previous_post' => __('Previous Article:', 'voce'),
			'next_post' => __('Next Article:', 'voce'),
			'older_posts' => '&larr; ' . __('Older posts', 'voce'),
			'newer_posts' => __('Newer posts', 'voce') . ' &rarr;'
		));
		if (is_single()){
			$previous = (is_attachment()) ? get_post($post->post_parent) : get_adjacent_post(false, '', true);
			$next = get_adjacent_post(false, '', false);
			if (!$next && !$previous){
				return;
			}
		}
		if ($wp_query->max_num_pages < 2 && (is_home() || is_archive() || is_search())) {
			return;
		}
		if (is_single()){
			$nav_class = 'site-navigation post-navigation clearfix';
		}
		?>
		<nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
			<?php
			if (is_single()) {
				?>
				<div class="nav-previous post-nav border-box">
					<?php previous_post_link('<span class="post-nav-title">' . $post_navigation['previous_post'] . '</span>%link'); ?>
				</div>
				<div class="nav-next post-nav border-box">
					<?php next_post_link('<span class="post-nav-title">' . $post_navigation['next_post'] . '</span>%link'); ?>
				</div>
				<?php
			} elseif ($wp_query->max_num_pages > 1 && (is_home() || is_archive() || is_search())){
				if (get_next_posts_link()){
					?>
					<div class="nav-previous border-box">
						<?php next_posts_link($post_navigation['older_posts']); ?>
					</div>
					<?php
				}
				if (get_previous_posts_link()){
					?>
					<div class="nav-next border-box">
						<?php previous_posts_link($post_navigation['newer_posts']); ?>
					</div>
					<?php
				}
			}
			?>
		</nav>
		<?php
	}
// wpsvoce_content_nav() ENDS here
}

if (!function_exists('voce_pagination')){
// voce_pagintion() BEGINS here - This sets the paged posts system
	function voce_pagination($pages = '', $range = 2){
		global $paged;
		$pagination_range = apply_filters('pagination_range', 2);
		$showitems = ($range * $pagination_range)+1;
		if (empty($paged)){
			$paged = 1;
		}
		if ($pages == ''){
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if (!$pages){
				$pages = 1;
			}
		}
		$pagination_place = apply_filters('pagination_place', '<span class="pagination-place">' . __('Page ', 'voce') . $paged . __(' of ', 'voce') . $pages . '</span>');
		$pagination_navigation = apply_filters('pagination_navigation', array(
			'first_page' => '&laquo;',
			'previous_page' => '&lsaquo;',
			'next_page' => '&rsaquo;',
			'last_page' => '&raquo;'
		));
		if (1 != $pages) {
			?>
			<div class="pagination clearfix">
				<?php
				echo $pagination_place;
				if ($paged > 2 && $paged > $range+1 && $showitems < $pages) {
					?>
					<a href="<?php echo esc_url(get_pagenum_link(1)); ?>" title="<?php _e('First Page', 'voce'); ?>">
						<?php echo $pagination_navigation['first_page']; ?>
					</a>
					<?php
				}
				if ($paged > 1 && $showitems < $pages) {
					?>
					<a href="<?php echo esc_url(get_pagenum_link($paged - 1)); ?>" title="<?php _e('Previous Page', 'voce'); ?>">
						<?php echo $pagination_navigation['previous_page']; ?>
					</a>
					<?php
				}
				for ($i=1; $i <= $pages; $i++){
					if (1 != $pages && (!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems)){
						if ($paged == $i) {
							?>
							<span class="current"><?php echo $i; ?></span>
							<?php
						} else {
							?>
							<a href="<?php echo esc_url(get_pagenum_link($i)); ?>" class="inactive"><?php echo $i; ?></a>
							<?php
						}
					}
				}
				if ($paged < $pages && $showitems < $pages) {
					?>
					<a href="<?php echo esc_url(get_pagenum_link($paged + 1)); ?>" title="<?php _e('Next Page', 'voce'); ?>"><?php echo $pagination_navigation['next_page']; ?></a>
					<?php
				}
				if ($paged < $pages-1 && $paged+$range-1 < $pages && $showitems < $pages){
					?>
					<a href="<?php echo esc_url(get_pagenum_link($pages)); ?>" title="<?php _e('Last Page', 'voce'); ?>"><?php echo $pagination_navigation['last_page']; ?></a>
					<?php
				}
				?>
			</div>
			<?php
		}
	}
// voce_pagintion() ENDS here
}

if ( ! function_exists('voce_pagination_type')){
// voce_pagination_type() BEGINS here - This function sets which pagination system wpsvoce or voce is used basid on post type
	function voce_pagination_type(){
		if (voce_pagination_on() && (is_home() || is_archive() || is_search())){
			voce_pagination();
		} else {
			wpsvoce_content_nav('nav-below');
		}
	}
// voce_pagination_type() ENDS here
}