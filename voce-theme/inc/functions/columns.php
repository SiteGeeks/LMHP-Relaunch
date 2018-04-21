<?php
/*
* Column layouts for Voce Theme
*/
if ( ! function_exists( 'voce_columns' )){
// voce_columns() BEGINS here - This sets the structure of the layouts based on the sidebar and content relations.
	function voce_columns(){
		switch (voce_get_layout()){
			case 'c1':
				voce_content();
				break;
			case 'c2':
				voce_content();
				?>
				<div id="sidebars-wrap" class="clearfix">
					<?php get_sidebar('one'); get_sidebar('two'); ?>
				</div>
				<?php
				break;
			case 'cs':
				voce_content();
				get_sidebar('one');
				break;
			case 'sc':
				get_sidebar('one');
				voce_content();
				break;
			case 'css':
				voce_content();
				get_sidebar('one');
				get_sidebar('two');
				break;
			case 'ssc':
				get_sidebar('one');
				get_sidebar('two');
				voce_content();
				break;
			case 'scs':
				get_sidebar('one');
				voce_content();
				get_sidebar('two');
				break;
			case '':
				printf(__('Error: Please select a column structure in the %s Options.', 'voce'), THEME_NAME);
		}
	}
// voce_columns() ENDS here
}

if ( ! function_exists( 'voce_columns_singular' )){
// voce_columns_singular() BEGINS here - This sets the layout structure on individual posts that may override the site default.
	function voce_columns_singular(){
		global $post;
		$single_layout = get_post_meta($post->ID, '_singular-column', true);
		switch ($single_layout){
			case 'c1':
				voce_content();
				break;
			case 'c2':
				voce_content();
				?>
				<div id="sidebars-wrap" class="border-box clearfix">
					<?php get_sidebar('one'); get_sidebar('two'); ?>
				</div>
				<?php
				break;
			case 'cs':
			case 'sc':
				voce_content();
				get_sidebar('one');
				break;
			case 'css':
			case 'ssc':
				voce_content();
				get_sidebar('one');
				get_sidebar('two');
				break;
			case 'scs':
				?>
				<div id="wrap">
					<?php voce_content(); get_sidebar('one'); ?>
				</div>
				<?php
				get_sidebar('two');
				break;
			default:
				voce_columns();
		}
	}
// voce_columns_singular() ENDS here
}