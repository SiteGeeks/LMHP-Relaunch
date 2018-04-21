<?php
$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
$wp_load = $absolute_path[0] . 'wp-load.php';
require_once($wp_load);
$options_structure = get_option('voce_structure_options');
// Variables
$containerwidth = $options_structure['containerwidth'];
$contentwidth = $options_structure['gridcss_content'];
$sidebar1width = $options_structure['gridcss_sidebar1'];
$sidebar2width = $options_structure['gridcss_sidebar2'];
$columnoption = $options_structure['column'];
header('Content-type: text/css');
header('Cache-control: must-revalidate');
?>
.main, #container {
	width: <?php echo esc_attr($containerwidth); ?>px;
}
<?php
if (voce_uses_gridcss()){
?>
/* Column Layouts */
<?php
if ($columnoption == 'c1'){
	?>
	#main-content .main {
		display:grid;
		grid-template-columns: <?php echo esc_attr($contentwidth); ?>;
		grid-column-gap: 20px;
		grid-row-gap: 20px;
		justify-items: stretch;
		align-items: stretch;
	}
	<?php
} elseif ($columnoption == 'c2'){
	?>
	#main-content .main {
		display:grid;
		grid-template-columns: <?php echo esc_attr($contentwidth); ?>;
		grid-column-gap: 20px;
		grid-row-gap: 20px;
		justify-items: stretch;
		align-items: stretch;
	}
	#main-content .main #sidebars-wrap {
		display:grid;
		grid-template-columns: 1fr 1fr;
		grid-column-gap: 20px;
		grid-row-gap: 20px;
		justify-items: stretch;
		align-items: stretch;
	}
	<?php
} elseif ($columnoption == 'sc'){
	?>
	#main-content .main {
		display:grid;
		grid-template-columns: <?php echo esc_attr($sidebar1width); ?> <?php echo esc_attr($contentwidth); ?>;
		grid-column-gap: 20px;
		grid-row-gap: 20px;
		justify-items: stretch;
		align-items: stretch;
	}
	<?php
} elseif ($columnoption == 'cs'){
	?>
	#main-content .main {
		display:grid;
		grid-template-columns: <?php echo esc_attr($contentwidth); ?> <?php echo esc_attr($sidebar1width); ?>;
		grid-column-gap: 20px;
		grid-row-gap: 20px;
		justify-items: stretch;
		align-items: stretch;
	}
	<?php
} elseif ($columnoption == 'css'){
	?>
	#main-content .main {
		display:grid;
		grid-template-columns: <?php echo esc_attr($contentwidth); ?> <?php echo esc_attr($sidebar1width); ?> <?php echo esc_attr($sidebar2width); ?>;
		grid-column-gap: 20px;
		grid-row-gap: 20px;
		justify-items: stretch;
		align-items: stretch;
	}
	<?php
} elseif ($columnoption == 'scs'){
	?>
	#main-content .main {
		display:grid;
		grid-template-columns: <?php echo esc_attr($sidebar1width); ?> <?php echo esc_attr($contentwidth); ?> <?php echo esc_attr($sidebar2width); ?>;
		grid-column-gap: 20px;
		grid-row-gap: 20px;
		justify-items: stretch;
		align-items: stretch;
	}
	<?php
} elseif ($columnoption == 'ssc'){
	?>
	#main-content .main {
		display:grid;
		grid-template-columns: <?php echo esc_attr($sidebar1width); ?> <?php echo esc_attr($sidebar2width); ?> <?php echo esc_attr($contentwidth); ?>1fr1fr;
		grid-column-gap: 20px;
		grid-row-gap: 20px;
		justify-items: stretch;
		align-items: stretch;
	}
	<?php
}
} else {
	?>
	/* Column Layouts */

	.scs #wrap,
	.cs #content,
	.css #content,
	.sc #sidebars,
	.c2 .sidebar-1,
	.three-col .sidebar-1,
	.css .sidebar-2,
	.ssc .sidebar-2 {
		float: left;
		padding: 1.33334em;
	}

	.c2 .sidebar-2,
	.cs #sidebars,
	.sc #content,
	.scs #content,
	.scs .sidebar-2,
	.ssc #content {
		float: right;
		padding: 1.33334em;
	}

	.ssc .pagination,
	.sc .pagination {
		padding: 1.33334em 0;
	}

	.one-col #content {
		width: 100%;
		padding: 1.33334em;
	}

	.c2 .sidebar-1,
	.c2 .sidebar-2 {
		width: 50%;
	}

	.two-col #content {
		width: 800px;
	}

	.two-col #sidebars {
		width: 340px;
	}

	.css #content,
	.ssc #content {
		width: 650px;
	}

	.three-col #sidebars {
		width: 245px;
	}

	.scs #sidebars {
		width: 245px;
	}

	.scs #wrap {
		width: 895px;
		padding: 0;
	}

	.scs #content {
		width: 650px;
	}

	#main-content #content {
		padding-top: 0;
		padding-bottom: 1.33334em;
	}

	#main-content #sidebars {
		padding-top: .66667em;
	}
<?php
}
?>
@media screen and (max-width: <?php echo esc_attr($containerwidth); ?>px){
	.main, #container {
		width: 100%;
	}
}
@media screen and (max-width: <?php echo esc_attr($containerwidth); ?>px){
	#main-content .main {
		display:grid;
		grid-template-columns: 1fr;
		grid-column-gap: 20px;
		grid-row-gap: 20px;
		justify-items: stretch;
		align-items: stretch;
	}
	#content {
		order:1;
	}
	#sidebars {
		order:2;
	}
}