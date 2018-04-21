<?php
/*
* Options for Voce Theme
*/
function voce_options_add_page() {
	add_theme_page(THEME_NAME . __(' Options', 'voce'), THEME_NAME . __(' Options', 'voce'), 'edit_theme_options', 'wpsvoce_options', 'voce_options_do_page');
	register_setting('wpsvoce_global_options', 'voce_general_options', 'voce_options_validate');
	register_setting('wpsvoce_global_options', 'voce_structure_options', 'voce_options_validate');
	register_setting('wpsvoce_hooks_options', 'voce_hooks_options', 'voce_options_validate');
	register_setting('wpsvoce_content_options', 'voce_content_options', 'voce_options_validate');
	register_setting('wpsvoce_grid_options', 'voce_grid_options', 'voce_options_validate');
	//register_setting('wpsvoce_license_key', 'voce_license_key', 'voce_sanitize_license');
}
add_action('admin_menu', 'voce_options_add_page');

function voce_options_do_page() {
	global $column_options;
	if (!isset($_REQUEST['settings-updated'])) {
		$_REQUEST['settings-updated'] = false;
	}
	?>
	<div class="wrap wpsvoce-options">
		<h2 class="voce-options-title"><?php printf(__('%1$s %2$s Options and Resources', 'voce'), THEME_NAME, THEME_VERSION); ?></h2>
		<?php if (false !== $_REQUEST['settings-updated']) { ?>
			<div class="updated half fade radius">
				<p><strong><?php _e('Your settings have been updated.', 'voce'); ?></strong></p>
			</div>
		<?php } ?>
		<?php
			$active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'structure';
			$add_tab = array('structure', 'content', 'hooks', 'function builder', 'enhancements', 'grid help', 'information');
		?>
		<h2 class="nav-tab-wrapper">
			<?php
				foreach ($add_tab as $tab) { ?>
					<a href="?page=wpsvoce_options&tab=<?php echo $tab; ?>" class="nav-tab<?php echo ($active_tab == $tab ? ' nav-tab-active' : ''); ?>"><?php echo $tab; ?></a>
					<?php
				}
			?>
		</h2>
		<?php /*
		<div class="save-settings half fade radius">
			<p><strong><?php _e('Make sure you save changes before changing tabs.', 'voce'); ?></strong></p>
		</div>
		*/ ?>
		<?php
		if ($active_tab == 'structure') {
			$options_structure = get_option('voce_structure_options');
			$options_general = get_option('voce_general_options');
			?>
			<form method="post" action="options.php">
				<?php
					settings_fields('wpsvoce_global_options');
					do_settings_sections('wpsvoce_global_options');
					require_once(THEME_OPTIONS . '/options-pages/structure-options.php');
				?>
			</form>
		<?php
		} elseif ($active_tab == 'content') {
			$options_content = get_option('voce_content_options');
			$vcontent = wpsvoce_content();
			$vpost = wpsvoce_post();
			$varrays = array_merge($vcontent, $vpost);
			?>
			<form method="post" action="options.php">
				<?php
					settings_fields('wpsvoce_content_options');
					do_settings_sections('wpsvoce_content_options');
					require_once(THEME_OPTIONS . '/options-pages/content-options.php');
				?>
			</form>
		<?php
		} elseif ($active_tab == 'grid help') {
			?>
			<form method="post" action="options.php">
				<h3>Grid CSS settings</h3>
				<p>The "content" area will maintain the <b>1fr</b> <em>(fractional unit)</em> in the <code>grid-template-columns</code>.</p>
				<p>The "sidebar" options can be set in either <b>1fr</b>, <b>px</b>, or <b>%</b>.</p>
				<p>I'll be putting additional tools and resources here in this tab.</p>
			</form>
			<?php
		} elseif ($active_tab == 'hooks') {
			$options_hooks = get_option('voce_hooks_options');
			$vhooks = wpsvoce_hooks();
			?>
			<form method="post" action="options.php" class="hooks-form">
				<?php
					settings_fields('wpsvoce_hooks_options');
					do_settings_sections('wpsvoce_hooks_options');
					require_once(THEME_OPTIONS . '/options-pages/hooks-options.php');
				?>
			</form>
		<?php /*
		} elseif ($active_tab == 'updates') {
			$license = get_option('voce_license_key');
			$status = get_option('voce_license_key_status');
			?>
			<form method="post" action="options.php">
				<?php
					settings_fields('wpsvoce_license_key');
					do_settings_sections('wpsvoce_license_key');
					require_once( THEME_OPTIONS . '/options-pages/update-options.php');
				?>
			</form>
		<?php */
		} elseif ($active_tab == 'function builder'){
			require_once(THEME_OPTIONS . '/options-pages/function-builder.php');
		} elseif ($active_tab == 'enhancements'){
			require_once(THEME_OPTIONS . '/options-pages/enhancements.php');
		} elseif ($active_tab == 'information') {
			require_once(THEME_OPTIONS . '/options-pages/information.php');
		} else { ?>
			<p><?php printf(__('How did you get here? Get back to the %s Options please.', 'voce'), '<a href="themes.php?page=wpsvoce_options&tab=global">' . THEME_NAME . '</a>'); ?></p>
			<?php
		}
		?>
	</div>
	<?php
}

function submit_hooks() { ?>
	<p><input name="wpsvoce_hooks_options[submit]" id="submit_options_form" type="submit" class="button-primary submit-hooks" value="<?php esc_attr_e('Update Hooks', 'voce'); ?>" /></p>
	<?php
}

/*
if ( ! function_exists( 'voce_adjust_footer_admin')){
	function voce_adjust_footer_admin() {
		echo sprintf(__('Powered by %1$s and %2$s', 'voce'),
			'<a href="http://www.wordpress.org" target="_blank">WordPress</a> ',
			'<a href="https://wpstudio.com/themes/voce" target="_blank">Voce Theme</a>'
		);
	}
}
add_filter('admin_footer_text', 'voce_adjust_footer_admin');
*/

function voce_options_validate($input) {
	global $column_options;
	$options_structure = get_option('voce_structure_options');
	$options_content = get_option('voce_content_options');
	$submit = ! empty($input['submit']) ? true : false;

	if (!isset($input['wide']))
		$input['wide'] = null;
	$input['wide'] = ($input['wide'] == 1 ? 1 : 0);

	if (!isset($options_structure['column']))
		$input['column'] == $options_structure['column'];
	if (!array_key_exists($options_structure['column'], $column_options))
		$input['column'] == 'cs';

	$vcontent = wpsvoce_content();
	$vpost = wpsvoce_post();
	$varrays = array_merge($vcontent, $vpost);
	foreach ($varrays as $va) {
		if (!isset($input[$va['title']]))
			$input[$va['title']] = null;
		$input[$va['title']] = ($input[$va['title']] == 1 ? 1 : 0);
	}

	$vhooks = wpsvoce_hooks();
	$hook_conditions = array('switch_', 'home_', 'front_', 'posts_', 'pages_', 'archive_', 'search_', '404_');

	foreach ($vhooks as $hook) {
		if (isset ($input[$hook['name']]))
			$input[$hook['name']] = stripslashes($input[$hook['name']]);

		foreach ($hook_conditions as $hc) {
			if (!isset($input[$hc . $hook['name']]))
				$input[$hc . $hook['name']] = null;
			$input[$hc . $hook['name']] = ($input[$hc . $hook['name']] == 1 ? 1 : 0);
		}
	}
	return $input;
}

function voce_sanitize_license($new){
	$old = get_option('voce_license_key');
	if ($old && $old != $new)
		delete_option('voce_license_key_status');
	return $new;
}