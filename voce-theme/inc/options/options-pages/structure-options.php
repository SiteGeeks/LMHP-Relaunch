<?php
/*
* Settings Tab for Voce Theme Framework's Global Options
*/
?>
<h3 class="firstbar"><?php _e('Site Structural Settings', 'voce'); ?></h3>
<table class="form-table">
	<tr>
		<th scope="row"><?php _e('Content Layout Defaults', 'voce'); ?></th>
		<td>
			<fieldset>
				<?php
					echo !isset($checked) ? $checked = '' : '';
					foreach ($column_options as $option) {
						$column_setting = $options_structure['column'];
						if ('' != $column_setting) {
							if ($options_structure['column'] == $option['value']) {
								$checked = 'checked="checked"';
							} else {
								$checked = '';
							}
						}
						?>
						<label class="description layout-label">
							<input class="layout-radio" type="radio" name="voce_structure_options[column]" value="<?php echo $option['value']; ?>" <?php echo $checked; ?>/>
							<?php echo $option['label']; ?>
						</label>
						<?php
					}
				?>
			</fieldset>
		</td>
	</tr>
	<tr>
		<th scope="row"><?php _e('Full Width Structure', 'voce'); ?></th>
		<td>
			<input class="checkbox-space" id="voce_structure_options[wide]" name="voce_structure_options[wide]" type="checkbox" value="1" <?php checked(1, voce_is_full_width(), true); ?>/>
			<label class="description" for="voce_structure_options[wide]">
				<?php _e('Activate. <em>If you choose not to activate this setting, your content will have some difficulty rendering with the Grid CSS options. This is a legacy setting that will be going away.</em>', 'voce'); ?>
			</label>
		</td>
	</tr>
	<tr>
		<th scope="row"><?php _e('Container Width', 'voce'); ?></th>
		<td>
			<input class="" id="voce_structure_options[containerwidth]" name="voce_structure_options[containerwidth]" size="4" type="text" value="<?php echo (esc_textarea($options_structure['containerwidth'])); ?>" /><b>px</b><br />
			<label class="description" for="voce_structure_options[containerwidth]">
				<?php _e('Choose the pixel width for the "gridcontainer".', 'voce'); ?>
			</label>
		</td>
	</tr>
	<tr>
		<th scope="row"><?php _e('Enable Grid CSS Capability', 'voce'); ?></th>
		<td>
			<input class="checkbox-space" id="voce_structure_options[gridcss]" name="voce_structure_options[gridcss]" type="checkbox" value="1" <?php checked(1, voce_uses_gridcss(), true); ?> />
			<label class="description" for="voce_structure_options[gridcss]">
				<?php _e('Enable Voce Theme\'s Grid CSS capability.', 'voce'); ?>
			</label>
		</td>
	<tr>
		<th scope="row"><?php _e('Grid CSS Width Settings', 'voce'); ?></th>
		<td>
			<input class="" id="voce_structure_options[gridcss_content]" name="voce_structure_options[gridcss_content]" size="6" type="text" value="<?php echo (esc_textarea($options_structure['gridcss_content'])); ?>" /><label class="description" for="voce_structure_options[gridcss_content]"><?php _e('Set the width of the content area including the <em>fr, px, or %</em>.', 'voce'); ?></label>
			<br />
			<input class="" id="voce_structure_options[gridcss_sidebar1]" name="voce_structure_options[gridcss_sidebar1]" size="6" type="text" value="<?php echo (esc_textarea($options_structure['gridcss_sidebar1'])); ?>" /><label class="description" for="voce_structure_options[gridcss_sidebar1]"><?php _e('Set the width of the primary sidebar including the <em>fr, px, or %</em>.', 'voce'); ?></label>
			<br />
			<input class="" id="voce_structure_options[gridcss_sidebar2]" name="voce_structure_options[gridcss_sidebar2]" size="6" type="text" value="<?php echo (esc_textarea($options_structure['gridcss_sidebar2'])); ?>" /><label class="description" for="voce_structure_options[gridcss_sidebar2]"><?php _e('Set the width of the secondary sidebar including the <em>fr, px, or %</em>.', 'voce'); ?></label>
	<tr>
		<th scope="row"><?php _e('Child Theme Check', 'voce'); ?></th>
		<td>
			<?php
			if ( is_child_theme() ){
				?>
				<p><?php _e('Thank you for using a child theme.', 'voce'); ?></p>
				<?php
			} else {
				?>
				<p><?php printf(__('Did you know you should really should be using a child theme to customize your site? For more information check out %s', 'voce'), '<a href="https://wpstudio.com/themes/voce/child-themes">' . THEME_NAME . ' Child Themes</a>'); ?></p>
				<?php
			}
			?>
		</td>
	</tr>

</table>
<p><input name="wpsvoce_global_options[submit]" id="submit_options_form" type="submit" class="button-primary" value="<?php esc_attr_e('Save Global Settings', 'voce'); ?>"/></p>