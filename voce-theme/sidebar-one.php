<?php
/*
* Primary sidebar layout
*/
?>
<div id="sidebars" class="widget-area sidebar-1 border-box">
	<?php
	voce_before_sidebar_1_output();
	$singular_sidebar_1 = get_post_meta(get_the_ID(), '_create-sidebar-1', true);
	if ('' !== $singular_sidebar_1 || 0 !== $singular_sidebar_1){
		if (!dynamic_sidebar('sidebar-1-' . get_the_ID())){
			if (!dynamic_sidebar('sidebar-1')){
				voce_default_widget();
			}
		}
	} else {
		if (!dynamic_sidebar('sidebar-1')){
			voce_default_widget();
		}
	}
	voce_after_sidebar_1_output();
	?>
</div>