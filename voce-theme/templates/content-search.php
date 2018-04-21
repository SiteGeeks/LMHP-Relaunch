<?php
/*
* Content template for search results
*/
global $post;
$search_title = apply_filters('search_title', __('Search Results for:', 'voce'));
?>
<header class="page-header">
	<h1 class="page-title">
		<?php echo $search_title, ' <span>', get_search_query(), '</span>'; ?>
	</h1>
</header>
<?php
while (have_posts()){
	the_post();
	get_template_part('templates/content', get_post_format());
}
voce_pagination_type();