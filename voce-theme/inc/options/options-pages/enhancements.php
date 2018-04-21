<?php
/*
*  Tab for Voce Theme Framework's Code Enhancements
*/
?>
<div class="voce-enhancments">
	<div class="enhancement">
		<h3>I want to add an additional menu to the very top of the browser.</h3>
		<div class="solution">
			<p>The following code will go in your <em>functions.php</em> file.</p>
			<pre>
			function voce_custom_topbar_menu() {
				$locations = array(
					'Topbar Menu' => __( 'Menu area placed above the header area.', 'voce' ),
				);
				register_nav_menus( $locations );
			}
			add_action( 'init', 'voce_custom_topbar_menu' );
			add_action( 'voce_before_html', 'add_custom_top_menu');
			function add_custom_top_menu(){
				wp_nav_menu(array('theme_location' => 'Topbar Menu', 'container_id' => 'topbar-menu'));
			}
			</pre>
		</div>
	</div>
	<div class="enhancement">
		<h3>I want to use a widget area to manage the "Hero Area".</h3>
		<div class="solution">
			<p>The following code will go in your <em>functions.php</em> file.</p>
			<pre>
			function voce_custom_sidebar() {
				$args = array(
					'id' => 'voce_custom_sidebar',
					'class' => 'voce-custom-sidebar',
					'name' => __( 'Voce Custom', 'voce' ),
					'description' => __( 'Additional Sidebar Location', 'voce' ),
				);
				register_sidebar( $args );
			}
			add_action( 'widgets_init', 'voce_custom_sidebar' );
			add_action( 'voce_headliner', 'add_custom_sidebar_headliner');
			function add_custom_sidebar_headliner(){
				dynamic_sidebar('voce_custom_sidebar');
			}
			</pre>
		</div>
	</div>
	<div class="enhancement">
		<h3>Combine the power of the Voce Theme 'Custom Layout' and Loop Studio's code output.</h3>
		<div class="solution">
			<p>The following code can go in your <em>functions.php</em> file. In this example the number '3622' is the page ID of the WordPress page that is being targeted.</p>
			<pre>
			add_action( 'main_content_custom_layout', 'custom_page_layout_3622');
			function custom_page_layout_3622() {
				if ( is_page('3622') ) { ?>
					&#60;div id="content" class="site-content border-box clearfix"&#62;
					
					&#60;&#45;&#45; PASTE LOOP STUDIO CODE HERE &#45;&#45;&#62;

					&#60;/div&#62;
				&#60;&#63;php }
			}
			</pre>
		</div>
	</div>
</div>