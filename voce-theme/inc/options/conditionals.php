<?php
/*
* Conditional statements for Voce Theme Framework
*/
function voce_is_full_width() {
	$option = get_option('voce_structure_options');
	if (1 == $option['wide']) {
		return true;
	} else {
		return false;
	}
}

function voce_uses_gridcss(){
	$option = get_option('voce_structure_options');
	if (1 == $option['gridcss']) {
		return true;
	} else {
		return false;
	}
}

function voce_get_layout() {
	$option = get_option('voce_structure_options');
	switch ($option['column']) {
		case 'c1':
			$layout = 'c1';
			break;
		case 'c2':
			$layout = 'c2';
			break;
		case 'sc':
			$layout = 'sc';
			break;
		case 'cs':
			$layout = 'cs';
			break;
		case 'css':
			$layout = 'css';
			break;
		case 'scs':
			$layout = 'scs';
			break;
		case 'ssc':
			$layout = 'ssc';
			break;
	}
	return $layout;
}

function voce_get_column_count() {
	$options = get_option('voce_structure_options');
	if ('c1' == $options['column'] || 'c2' == $options['column']) {
		return 1;
	} elseif ('sc' == $options['column'] || 'cs' == $options['column']) {
		return 2;
	} elseif ('css' == $options['column'] || 'scs' == $options['column'] || 'ssc' == $options['column']) {
		return 3;
	}
}

function voce_site_title_on() {
	$option = get_option('voce_content_options');
	if (1 == $option['title']) {
		return true;
	} else {
		return false;
	}
}

function voce_site_tagline_on() {
	$option = get_option('voce_content_options');
	if (1 == $option['tagline']) {
		return true;
	} else {
		return false;
	}
}

function voce_header_menu_on() {
	$option = get_option('voce_content_options');
	if (1 == $option['headermenu']) {
		return true;
	} else {
		return false;
	}
}

function voce_standard_menu_on() {
	$option = get_option('voce_content_options');
	if (1 == $option['standardmenu']) {
		return true;
	} else {
		return false;
	}
}

function voce_footer_menu_on() {
	$option = get_option('voce_content_options');
	if (1 == $option['footermenu']) {
		return true;
	} else {
		return false;
	}
}

function voce_default_widget_on() {
	$option = get_option('voce_content_options');
	if (1 == $option['widgets']) {
		return true;
	} else {
		return false;
	}
}

function voce_pagination_on() {
	$option = get_option('voce_content_options');
	if (1 == $option['pagination']) {
		return true;
	} else {
		return false;
	}
}

function voce_byline_date_on() {
	$option = get_option('voce_content_options');
	if (1 == $option['by-date-post']) {
		return true;
	} else {
		return false;
	}
}

function voce_byline_author_on() {
	$option = get_option('voce_content_options');
	if (1 == $option['by-author-post']) {
		return true;
	} else {
		return false;
	}
}

function voce_byline_comments_on() {
	$option = get_option('voce_content_options');
	if (1 == $option['by-comments-post']) {
		return true;
	} else {
		return false;
	}
}

function voce_byline_edit_on() {
	$option = get_option('voce_content_options');
	if (1 == $option['by-edit-post']) {
		return true;
	} else {
		return false;
	}
}

function voce_byline_cats_on() {
	$option = get_option('voce_content_options');
	if (1 == $option['by-cats']) {
		return true;
	} else {
		return false;
	}
}

function voce_has_byline_items() {
	if (voce_byline_date_on() || voce_byline_author_on() || voce_byline_comments_on() || voce_byline_edit_on() || voce_byline_cats_on()) {
		return true;
	} else {
		return false;
	}
}

function voce_has_postformats_on(){
	$option = get_option('voce_content_options');
	if (isset( $option['postformats-on'])){
		if (1 ==$option['postformats-on']){
			return true;
		} else {
			return false;
		}
	}
}

function voce_excerpt_on() {
	$option = get_option('voce_content_options');
	if (1 == $option['homeexcerpt']) {
		return true;
	} else {
		return false;
	}
}

function voce_excerpt_link_on() {
	$option = get_option('voce_content_options');
	if (1 == $option['excerptlink']) {
		return true;
	} else {
		return false;
	}
}

function voce_archive_featured_image_on() {
	$option = get_option('voce_content_options');
	if (1 == $option['feedfeaturedimage']) {
		return true;
	} else {
		return false;
	}
}

function voce_single_featured_image_on() {
	$option = get_option('voce_content_options');
	if (1 == $option['singlefeaturedimage']) {
		return true;
	} else {
		return false;
	}
}

function voce_archive_tags_on() {
	$option = get_option('voce_content_options');
	if (1 == $option['feedtags']) {
		return true;
	} else {
		return false;
	}
}

function voce_single_tags_on() {
	$option = get_option('voce_content_options');
	if (1 == $option['singletags']) {
		return true;
	} else {
		return false;
	}
}

function voce_search_pages_on() {
	$option = get_option('voce_content_options');
	if (1 == $option['searchpages']) {
		return true;
	} else {
		return false;
	}
}