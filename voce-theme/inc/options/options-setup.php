<?php
/*
* Setup all Option Arrays for Voce Theme
*/
$column_image = '<img src="' . THEME_PATH_URI . '/inc/options/images';
$column_options = array(
	'c1' => array(
		'value' => 'c1',
		'description' => __('Content (No Sidebars)', 'voce'),
		'label' => $column_image . '/c1.png">'
	),
	'c2' => array(
		'value' => 'c2',
		'description' => __('Content (Sidebars below)', 'voce'),
		'label' => $column_image . '/c2.png">'
	),
	'cs' => array(
		'value' => 'cs',
		'description' => __('Content - Sidebar', 'voce'),
		'label' => $column_image . '/cs.png">'
	),
	'sc' => array(
		'value' => 'sc',
		'description' => __('Sidebar - Content', 'voce'),
		'label' => $column_image . '/sc.png">'
	),
	'css' => array(
		'value' => 'css',
		'description' => __('Content - Sidebar - Sidebar', 'voce'),
		'label' => $column_image . '/css.png">'
	),
	'scs' => array(
		'value' => 'scs',
		'description' => __('Sidebar - Content - Sidebar', 'voce'),
		'label' => $column_image . '/scs.png">'
	),
	'ssc' => array(
		'value' => 'ssc',
		'description' => __('Sidebar - Sidebar - Content', 'voce'),
		'label' => $column_image . '/ssc.png">'
	)
);
return $column_options;

function wpsvoce_general(){
	$voce_general = array();
	return $voce_general;
}

function wpsvoce_content() {
	$voce_content = array(
		'Site Title' => array(
			'table_name' => '<h3 class="firstbar">' . __('Content Area Activations', 'voce') . '</h3>',
			'table' => '<table class="form-table">',
			'tr' => '<tr>',
			'th' => '<th scope="row">' . __('Use the Following Header Elements', 'voce') . '</th>',
			'td' => '<td>',
			'title' => 'title',
			'label' => __('Site title', 'voce'),
		),
		'Site Tagline' => array(
			'title' => 'tagline',
			'label' => __('Site tagline', 'voce') ,
		),
		'Header Menu' => array(
			'title' => 'headermenu',
			'label' => __('Header menu', 'voce'),
			'td_end' => '</td>',
			'tr_end' => '</tr>'
		),
		'Standard Menu' => array(
			'tr' => '<tr>',
			'th' => '<th scope="row">' . __('Use Additional Menus', 'voce') . '</th>',
			'td' => '<td>',
			'title' => 'standardmenu',
			'label' => __('Standard Menu - Displays below the site header *<br>', 'voce'),
		),
		'Footer Menu' => array(
			'title' => 'footermenu',
			'label' => __('Footer Menu - Displays above the site footer *', 'voce'),
			'notes' => '<span class="notes">' . sprintf(__('* Once selected, you need to %s and add them to their respective "Theme Locations."', 'voce'), '<a href="nav-menus.php">' . __('create new menus', 'voce') . '</a>') . '</span>',
			'td_end' => '</td>',
			'tr_end' => '</tr>'
		),
		'Pagination' => array(
			'tr' => '<tr>',
			'th' => '<th scope="row">' . __('Activate Pagination', 'voce') . '</th>',
			'td' => '<td>',
			'title' => 'pagination',
			'label' => __('Activate numbered pagination on homepage, archives, search results, etc.', 'voce'),
			'td_end' => '</td>',
			'tr_end' => '</tr>',
		),
		'Default Widgets' => array(
			'tr' => '<tr>',
			'th' => '<th scope="row">' . __('Display Default Widgets', 'voce') . '</th>',
			'td' => '<td>',
			'title' => 'widgets',
			'label' => __('Show default widgets in empty sidebar areas.', 'voce'),
			'notes' => '<span class="notes">' . __('* The default widget does not show in footer widgetized areas because they only display if an actual widget is used.', 'voce') . '</span>',
			'td_end' => '</td>',
			'tr_end' => '</tr>'
		),
	);
	return $voce_content;
}

function wpsvoce_post() {
	$voce_post = array(
		'Byline Date' => array(
			'table_name' => '</table><h3>' . __('Post-Related Activations', 'voce') . '</h3>',
			'table' => '<table class="form-table">',
			'tr' => '<tr>',
			'th' => '<th scope="row">' . __('Show Post Byline Elements', 'voce') . '</th>',
			'td' => '<td>',
			'title' => 'by-date-post',
			'label' => __('Date', 'voce'),
		),
		'Byline Author' => array(
			'title' => 'by-author-post',
			'label' => __('Author', 'voce'),
		),
		'Byline Comments' => array(
			'title' => 'by-comments-post',
			'label' => __('Responses/Comments', 'voce'),
		),
		'Byline Edit Link' => array(
			'title' => 'by-edit-post',
			'label' => __('Edit Link (logged in users)', 'voce'),
		),
		'Byline Categories' => array(
			'title' => 'by-cats',
			'label' => __('Categories', 'voce'),
			'td_end' => '</td>',
			'tr_end' => '</tr>',
		),
		'Excerpts' => array(
			'tr' => '<tr>',
			'th' => '<th scope="row">' . __('Display Post Excerpts', 'voce') . '</th>',
			'td' => '<td>',
			'title' => 'homeexcerpt',
			'label' => __('Display excerpts instead of full posts.', 'voce'),
		),
		'Excerpt Link' => array(
			'title' => 'excerptlink',
			'label' => __('Link to full article in excerpts.', 'voce'),
			'td_end' => '</td>',
			'tr_end' => '</tr>',
		),
		'Featured Image Feed' => array(
			'tr' => '<tr>',
			'th' => '<th scope="row">' . __('Display Featured Images', 'voce') . '</th>',
			'td' => '<td>',
			'title' => 'feedfeaturedimage',
			'label' => __('Post Feeds (home, search, archives, etc.)', 'voce')
		),
		'Featured Image Posts' => array(
			'title' => 'singlefeaturedimage',
			'label' => __('Single Posts', 'voce'),
			'td_end' => '</td>',
			'tr_end' => '</tr>'
		),
		'Tags Feed' => array(
			'tr' => '<tr>',
			'th' => '<th scope="row">' . __('Display Tags List', 'voce') . '</th>',
			'td' => '<td>',
			'title' => 'feedtags',
			'label' => __('Post Feeds (home, search, archives, etc.)', 'voce'),
		),
		'Tags Posts' => array(
			'title' => 'singletags',
			'label' => __('Single Posts', 'voce'),
			'td_end' => '</td>',
			'tr_end' => '</tr>',
		),
		'Post Formats On' => array(
			'tr' => '</table><h3>' . __('Post Format Options', 'voce') . '</h3><table class="form-table"><tr>',
			'th' => '<th scope="row">' . __('Enable Post Format', 'voce') . '</th>',
			'td' => '<td>',
			'title' => 'postformats-on',
			'label' => '<strong>Activate Customized Post Formats</strong> - <em>Voce Theme provides custom content structures for the following post formats: aside, quote, and status.  The other "known" post formats can be done using a regular post.</em>',
			'td_end' => '</td>',
			'tr_end' => '</tr>',
		)
	);
	return $voce_post;
}

function wpsvoce_hooks() {
	$voce_hooks = array(
		'voce_before_html' => array(
			'name' => 'voce_before_html',
			'title' => __('Before HTML', 'voce'),
			'description' => __('The first content inside of the opening &lt;body&gt; tag.<br>Suggestion: Use this hook to build a "Hello Bar" style attention grabber.', 'voce')
		),
		'voce_after_html' => array(
			'name' => 'voce_after_html',
			'title' => __('After HTML', 'voce'),
			'description' => __('The last content on your page just inside of the closing &lt;/body&gt; tag', 'voce')
		),
		'voce_header_top' => array(
			'name' => 'voce_header_top',
			'title' => __('Header Top', 'voce'),
			'description' => __('Inside of your header above where your site title and site tagline are located.<br>Suggestion: Try turning off your site title and site tagline to build your own header here.', 'voce')
		),
		'voce_header_bottom' => array(
			'name' => 'voce_header_bottom',
			'title' => __('Header Bottom', 'voce'),
			'description' => __('Inside of your header below where your site title and site tagline are located.<br>Suggestion: Try turning off your site title and site tagline to build your own header here.', 'voce')
		),
		'voce_header_after_title_tagline' 	=> array(
			'name' => 'voce_header_after_title_tagline',
			'title' => __('Header After Title/Tagline', 'voce'),
			'description' => __('Inside of your header below site title and site tagline but above<br>your header menu <em>in the HTML flow</em>', 'voce')
		),
		'voce_footer_top' => array(
			'name' => 'voce_footer_top',
			'title' => __('Footer Top', 'voce'),
			'description' => __('This displays inside of your footer at the very top.<br>If you have the Fat Footer activated, this will display above that.', 'voce')
		),
		'voce_footer_bottom' => array(
			'name' => 'voce_footer_bottom',
			'title' => __('Footer Bottom', 'voce'),
			'description' => __('This displays inside of your footer at the bottom. If you have the Fat Footer<br>activated, this will display below that but above the copyright section.', 'voce')
		),
		'voce_site_info' => array(
			'name' => 'voce_site_info',
			'title' => __('Site Information', 'voce'),
			'description' => __('This hook displays inside the .site-info class which is inside the footer div.', 'voce')
		),
		'voce_headliner' => array(
			'name' => 'voce_headliner',
			'title' => __('Headliner', 'voce'),
			'description' => __('Better known as a "Feature Box" displaying beneath the header but above content', 'voce')
		),
		'voce_footliner' => array(
			'name' => 'voce_footliner',
			'title' => __('Footliner', 'voce'),
			'description' => __('Much like the Headliner, this area can be used to highlight important<br>information below the main content area.', 'voce')
		),
		'voce_before_content_area' => array(
			'name' => 'voce_before_content_area',
			'title' => __('Before Content Area', 'voce'),
			'description' => __('Only active on full-width HTML structure, use this hook<br>to add full-width sections to your layout.', 'voce')
		),
		'voce_after_content_area' => array(
			'name' => 'voce_after_content_area',
			'title' => __('After Content Area', 'voce'),
			'description' => __('Only active on full-width HTML structure, use this hook<br>to add full-width sections to your layout.', 'voce')
		),
		'voce_before_content' => array(
			'name' => 'voce_before_content',
			'title' => __('Before Content', 'voce'),
			'description' => __('Only active on page-width HTML structure, use this hook<br>to add stacked sections to your layout', 'voce')
		),
		'voce_after_content' => array(
			'name' => 'voce_after_content',
			'title' => __('After Content', 'voce'),
			'description' => __('Only active on page-width HTML structure, use this hook<br>to add stacked sections to your layout', 'voce')
		),
		'voce_before_content_column' => array(
			'name' => 'voce_before_content_column',
			'title' => __('Before Content Column', 'voce'),
			'description' => __('Very top of the content column before article/feed<br>(home, archive, & single posts only)', 'voce')
		),
		'voce_after_content_column' => array(
			'name' => 'voce_after_content_column',
			'title' => __('After Content Column', 'voce'),
			'description' => __('Very bottom of the content column after article/feed<br>(home, archive, & single posts only)', 'voce')
		),
		'voce_before_article_header' => array(
			'name' => 'voce_before_article_header',
			'title' => __('Before Article Header', 'voce'),
			'description' => __('Displays above article headline and byline .<br>Suggestion: Many bloggers place ads in this area.', 'voce')
		),
		'voce_after_article_header' => array(
			'name' => 'voce_after_article_header',
			'title' => __('After Article Header', 'voce'),
			'description' => __('Displays beneath article headline and byline (if byline items show).<br>Suggestion: Many bloggers place ads in this area.', 'voce')
		),
		'voce_last_byline_item'=> array(
			'name' => 'voce_last_byline_item',
			'title' => __('Last Byline Item', 'voce'),
			'description' => __('Displays as the last item in the byline any time the byline is shown.<br>Your content will appear before the "edit" link as that link is not seen by visitors.', 'voce')
		),
		'voce_post_footer' => array(
			'name' => 'voce_post_footer',
			'title' => __('Single Post Footer', 'voce'),
			'description' => __('Displays below your articles but above the comments.<br>Suggestion: Use this area as a call-to-action after a visitor reads your content.', 'voce')
		),
		'voce_before_sidebar_1' 	=> array(
			'name' => 'voce_before_sidebar_1',
			'title' => __('Before Primary Sidebar', 'voce'),
			'description' => __('Directly above Primary Sidebar in all layouts', 'voce')
		),
		'voce_after_sidebar_1' => array(
			'name' => 'voce_after_sidebar_1',
			'title' => __('After Primary Sidebar', 'voce'),
			'description' => __('Directly below Primary Sidebar in all layouts', 'voce')
		),
		'voce_before_sidebar_2' => array(
			'name' => 'voce_before_sidebar_2',
			'title' => __('Before Secondary Sidebar', 'voce'),
			'description' => __('Directly above Secondary Sidebar in all layouts', 'voce')
		),
		'voce_after_sidebar_2' => array(
			'name' => 'voce_after_sidebar_2',
			'title' => __('After Secondary Sidebar', 'voce'),
			'description' => __('Directly below Secondary Sidebar in all layouts', 'voce')
		),
	);
	return $voce_hooks;
}
function voce_before_html() {
	global $options;
	echo stripslashes($options['voce_before_html']);
}
function voce_after_html() {
	global $options;
	echo stripslashes($options['voce_after_html']);
}
function voce_header_top() {
	global $options;
	echo stripslashes($options['voce_header_top']);
}
function voce_header_bottom() {
	global $options;
	echo stripslashes($options['voce_header_bottom']);
}
function voce_header_after_title_tagline() {
	global $options;
	echo stripslashes($options['voce_header_after_title_tagline']);
}
function voce_footer_top() {
	global $options;
	echo stripslashes($options['voce_footer_top']);
}
function voce_footer_bottom() {
	global $options;
	echo stripslashes($options['voce_footer_bottom']);
}
function voce_site_info() {
	global $options;
	echo stripslashes($options['voce_site_info']);
}
function voce_headliner() {
	global $options;
	echo stripslashes($options['voce_headliner']);
}
function voce_footliner() {
	global $options;
	echo stripslashes($options['voce_footliner']);
}
function voce_before_content_area() {
	global $options;
	echo stripslashes($options['voce_before_content_area']);
}
function voce_after_content_area() {
	global $options;
	echo stripslashes($options['voce_after_content_area']);
}
function voce_before_content() {
	global $options;
	echo stripslashes($options['voce_before_content']);
}
function voce_after_content() {
	global $options;
	echo stripslashes($options['voce_after_content']);
}
function voce_before_content_column() {
	global $options;
	echo stripslashes($options['voce_before_content_column']);
}
function voce_after_content_column() {
	global $options;
	echo stripslashes($options['voce_after_content_column']);
}
function voce_before_article_header() {
	global $options;
	echo stripslashes($options['voce_before_article_header']);
}
function voce_after_article_header() {
	global $options;
	echo stripslashes($options['voce_after_article_header']);
}
function voce_last_byline_item() {
	global $options_hooks;
	echo stripslashes($options_hooks['voce_last_byline_item']);
}
function voce_post_footer() {
	global $options;
	echo stripslashes($options['voce_post_footer']);
}
function voce_before_sidebar_1() {
	global $options_hooks;
	echo stripslashes($options_hooks['voce_before_sidebar_1']);
}
function voce_after_sidebar_1() {
	global $options_hooks;
	echo stripslashes($options_hooks['voce_after_sidebar_1']);
}
function voce_before_sidebar_2() {
	global $options_hooks;
	echo stripslashes($options_hooks['voce_before_sidebar_2']);
}
function voce_after_sidebar_2() {
	global $options_hooks;
	echo stripslashes($options_hooks['voce_after_sidebar_2']);
}