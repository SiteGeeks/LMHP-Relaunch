<?php
/*
* Post Meta setup for the Post/Page Edit Screens
*/
if ( ! function_exists('voce_add_meta_box' )){
// voce_add_meta_box() BEGINS here - This adds the Quick Edit box to custom post types
	function voce_add_meta_box() {
		add_meta_box('post-layout', __(THEME_NAME . ' Settings', 'voce'), 'voce_meta_box', null, 'side', 'default', array('__block_editor_compatible_meta_box' => false));
	}
// voce_add_meta_box() ENDS here
}
add_action('add_meta_boxes', 'voce_add_meta_box');

function voce_meta_box($post) {
	global $post, $current_screen, $column_options;
	$the_id = get_post_custom($post->ID);
	$selected = isset($the_id['_singular-column']) ? esc_attr($the_id['_singular-column'][0]) : '';
	$custom_class = isset($the_id['_custom-class']) ? esc_attr($the_id['_custom-class'][0]) : '';
	$da_title = isset($the_id['_singular-title']) ? $the_id['_singular-title'][0] : 0;
	$create_sidebar_1 = isset($the_id['_create-sidebar-1']) ? $the_id['_create-sidebar-1'][0] : 0;
	$create_sidebar_2 = isset($the_id['_create-sidebar-2']) ? $the_id['_create-sidebar-2'][0] : 0;
	$new_sidebars = array(
		'Sidebar 1' => array(
			'name' => '_create-sidebar-1',
			'label' => __('Create Unique Primary Sidebar:', 'voce'),
			'state' => $create_sidebar_1
		),
		'Sidebar 2' => array(
			'name' => '_create-sidebar-2',
			'label' => __('Create Unique Secondary Sidebar:', 'voce'),
			'state' => $create_sidebar_2
		)
	);

	wp_nonce_field('voce_meta_box_nonce', 'meta_box_nonce');
	?>
	<p>
		<label for="_singular-column"><?php _e('Select Unique Column Layout: ', 'voce'); ?> </label>
		<select name="_singular-column" id="_singular-column">
			<option value="default" <?php selected($selected, 'default'); ?>><?php _e('Site Default', 'voce'); ?></option>
			<?php
				foreach ($column_options as $key) { ?>
					<option value="<?php echo $key['value']; ?>" <?php selected($selected, $key['value']); ?>>
						<?php echo $key['description']; ?>
					</option>
					<?php
				}
			?>
		</select>
	</p>
	<p>
		<label for="_custom-class"><?php _e('Unique CSS Class: ', 'voce'); ?> </label>
		<input id="_custom-class" class="custom-class" name="_custom-class" value="<?php echo $custom_class; ?>" size="30" type="text" placeholder="<?php _e('separate by spaces', 'voce'); ?>">
	</p>
	<p>
		<?php
			foreach ($new_sidebars as $ns) { ?>
				<span class="input-group">
					<label for="<?php echo $ns['name']; ?>"><?php echo $ns['label']; ?> </label>
					<input id="<?php echo $ns['name']; ?>" class="create-sidebar" name="<?php echo $ns['name']; ?>" value="<?php echo $ns['state']; ?>" type="checkbox" <?php checked('1', $ns['state'], '1'); ?>>
				</span><br />
				<?php
			}
		?>
	</p>
	<?php
		if ('post' != $current_screen->post_type) { ?>
			<p>
				<span class="input-group">
					<label for="_singular-title"><?php _e('Remove Page Title: ', 'voce'); ?> </label>
					<input id="_singular-title" name="_singular-title" value="<?php echo $da_title; ?>" size="30" type="checkbox" <?php checked('1', $da_title, '1'); ?>>
				</span>
			</p>
	<?php
		}
	?>
	<?php
}

function voce_single_sidebar_posts($meta_key = '') {
	if (empty($meta_key)) {
		return false;
	}
	if (false === get_transient('voce_single_sidebar_posts_' . $meta_key)) {
		$args = array(
			'fields' => 'ids',
			'post_type' => array('post', 'page'),
			'meta_key' => $meta_key,
			'meta_value' => 1,
			'nopaging' => true
		);
		$items = get_posts($args);
		if (!$items) {
			return false;
		}
		set_transient('voce_single_sidebar_posts_' . $meta_key, $items, 0);
	}
	$items = get_transient('voce_single_sidebar_posts_' . $meta_key);
	return $items;
}

function singular_widgets_init() {
	$sidebar_1_items = voce_single_sidebar_posts('_create-sidebar-1');
	$sidebar_2_items = voce_single_sidebar_posts('_create-sidebar-2');
	if (!empty($sidebar_1_items)) {
		foreach ($sidebar_1_items as $side1_id) {
			$side1_title = get_the_title($side1_id);
			register_sidebar(array(
				'name' => 'Primary &#8212; ' . esc_html($side1_title),
				'id' => 'sidebar-1-' . absint($side1_id),
				'description' => sprintf(__('This sidebar is specific to the Post/Page titled "%s." This will replace the Primary Sidebar and will always be the leftmost sidebar, first in the HTML flow.', 'voce'), esc_html($side1_title)),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' => '</aside>',
				'before_title' => '<h4 class="widget-title">',
				'after_title' => '</h4>',
			));
		}
	}
	if (!empty($sidebar_2_items)) {
		foreach ($sidebar_2_items as $side2_id) {
			$side2_title = get_the_title($side2_id);
			register_sidebar(array(
				'name' => 'Secondary &#8212; ' . esc_html($side2_title),
				'id' => 'sidebar-2-' . absint($side2_id),
				'description' => sprintf(__('This sidebar is specific to the Post/Page titled "%s." This will replace the Secondary Sidebar and will always be the rightmost sidebar, last in the HTML flow. You must be using a layout with more than one sidebar to use this area.', 'voce'), esc_html($side2_title)),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' => '</aside>',
				'before_title' => '<h4 class="widget-title">',
				'after_title' => '</h4>',
			));
		}
	}
}
add_action('widgets_init', 'singular_widgets_init', 20);

function voce_meta_box_save($post_id) {
	global $options;
	$options_structure = get_option('voce_structure_options');
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;
	if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'voce_meta_box_nonce'))
		return;
	if (isset($_POST['_singular-column']))
		update_post_meta($post_id, '_singular-column', esc_attr($_POST['_singular-column']));
	elseif (!isset($_POST['_singular-column']))
		$_POST['_singular-column'] == $options_structure['column'];
	$allowed = array();
	if (isset($_POST['_custom-class']))
		update_post_meta($post_id, '_custom-class', wp_kses($_POST['_custom-class'], $allowed));
	$new_sidebar_1 = isset($_POST['_create-sidebar-1']) ? 1 : 0;
		update_post_meta($post_id, '_create-sidebar-1', $new_sidebar_1);
	$new_sidebar_2 = isset($_POST['_create-sidebar-2']) ? 1 : 0;
		update_post_meta($post_id, '_create-sidebar-2', $new_sidebar_2);
	$da_title_ = isset($_POST['_singular-title']) ? 1 : 0;
		update_post_meta($post_id, '_singular-title', $da_title_);
	delete_transient('voce_single_sidebar_posts__create-sidebar-1');
	delete_transient('voce_single_sidebar_posts__create-sidebar-2');
}
add_action('save_post', 'voce_meta_box_save');