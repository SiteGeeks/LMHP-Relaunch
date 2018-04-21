<?php
/*
* Secondary sidebar layout
*/
?>
<div id="sidebars" class="widget-area sidebar-2 border-box">
	<?php
	voce_before_sidebar_2_output();
	$singular_sidebar_2 = get_post_meta(get_the_ID(), '_create-sidebar-2', true);
	if ('' !== $singular_sidebar_2 || 0 !== $singular_sidebar_2){
		if (!dynamic_sidebar('sidebar-2-' . get_the_ID())) {
			if (!dynamic_sidebar('sidebar-2')){
				voce_default_widget();
			}
		}
	} else {
		if (!dynamic_sidebar('sidebar-2')){
			voce_default_widget();
		}
	}
	voce_after_sidebar_2_output();
	?>
</div>