<?php
/*
* Search form layout
*/
$search_text = apply_filters('search_text', array(
	'search_field_text' => __('Enter Keywords', 'voce') . '&hellip;',
	'search_submit_text' => __('Search', 'voce')
));
?>
<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" role="search">
	<label for="s" class="assistive-text"><?php __('Search', 'voce'); ?></label>
	<input type="search" class="field" name="s" value="<?php echo esc_attr(get_search_query()); ?>" id="s" placeholder="<?php echo esc_attr($search_text['search_field_text']); ?>">
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr($search_text['search_submit_text']); ?>" />
</form>