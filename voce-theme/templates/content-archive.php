<?php
/*
* Content template for archives
*/
$archive_title = apply_filters('archive_title', array(
	'cat_title' => __('Category Archives:', 'voce'),
	'tag_title' => __('Tag Archives:', 'voce'),
	'author_title' => __('Author Archives:', 'voce'),
	'daily_title' => __('Daily Archives:', 'voce'),
	'monthly_title' => __('Monthly Archives:', 'voce'),
	'yearly_title' => __('Yearly Archives:', 'voce'),
	'default_title' => __('Archives', 'voce')
));
?>
<header class="page-header">
	<h1 class="page-title">
		<?php
		if (is_category()) {
			echo $archive_title['cat_title'], ' <span>', single_cat_title('', true), '</span>';
		} elseif (is_tag()) {
			echo $archive_title['tag_title'], ' <span>', single_cat_title('', true), '</span>';
		} elseif (is_author()){
			the_post();
			echo $archive_title['author_title'], ' <span class="vcard">' . get_the_author() . '</span>';
			rewind_posts();
		} elseif (is_day()) {
			echo $archive_title['daily_title'], ' <span>', get_the_date(), '</span>';
		} elseif (is_month()) {
			echo $archive_title['monthly_title'], ' <span>', get_the_date('F Y'), '</span>';
		} elseif (is_year()) {
			echo $archive_title['yearly_title'], ' <span>', get_the_date('Y'), '</span>';
		} else {
			echo $archive_title['default_title'];
		}
		?>
	</h1>
	<?php
	if (is_author()) {
		?>
		<p class="user-description"><?php echo get_the_author_meta('description'); ?></p>
		<?php
	} elseif (is_category()) {
		$category_description = category_description();
		if (!empty($category_description)){
			echo apply_filters('category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>');
		}
	} elseif (is_tag()) {
		$tag_description = tag_description();
		if (!empty($tag_description)){
			echo apply_filters('tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>');
		}
	}
	?>
</header>
<?php
while (have_posts()) : the_post();
	get_template_part('templates/content', get_post_format());
endwhile;
voce_pagination_type();