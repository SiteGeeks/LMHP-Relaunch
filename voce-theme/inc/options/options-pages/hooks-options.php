<?php
/*
* Settings Tab for Voce Theme Framework's Hooks Options
*/
?>
<h3 class="firstbar"><?php echo THEME_NAME . __(' Hooks', 'voce'); ?></h3>
<div class="hook-selector">
	<h2><?php _e('Hook Selector', 'voce'); ?></h2>
	<p><?php _e('Use the select menu below to skip directly to the hook you would like to edit. Or just scroll.', 'voce'); ?></p>
	<select class="select-a-hook" name="hooks" onchange="location = this.options[this.selectedIndex].value;">
		<option value="#"><?php _e('-- Select a hook --', 'voce'); ?></option>
		<?php foreach ($vhooks as $link) { ?>
			<option value="<?php echo '#' . $link['name']; ?>"><?php echo $link['title']; ?></option>
		<?php } ?>
		<option value="#"><?php _e('-- to the top --', 'voce'); ?></option>
	</select>
	<?php /*
	<br /><span><a href="#" target="_blank"><?php _e('Voce Hooks Guide', 'voce'); ?></a></span>
	*/ ?>
</div>

<?php
foreach ($vhooks as $hook) { ?>
	<div class="hook-section">
		<h4 class="hook-title" id="<?php echo $hook['name']; ?>"> <?php echo $hook['title']; ?></h4>
		<span class="hook-info"><?php echo $hook['name']; ?> -
			<span class="notes"><?php echo $hook['description']; ?></span>
		</span>
		<textarea class="hook-field" cols="70" rows="5" id="voce_hooks_options[<?php echo $hook['name']; ?>]" name="voce_hooks_options[<?php echo $hook['name']; ?>]"><?php echo stripslashes(esc_textarea($options_hooks[$hook['name']])); ?></textarea>
		<br>
		<span class="hide-on"><?php _e(' Hide on:', 'voce'); ?></span>

		<?php
			switch ($hook['name']) {
				case 'voce_post_footer':
					echo '';
					break;
				default: ?>
					<span class="input-hook-conditions">
						<input id="voce_hooks_options[home_<?php echo $hook['name']; ?>]" name="voce_hooks_options[home_<?php echo $hook['name']; ?>]" type="checkbox" value="1" <?php checked('1', $options_hooks['home_' . $hook['name']], true); ?> />
						<label class="description hook-label-space" for="voce_hooks_options[home_<?php echo $hook['name']; ?>]">
							<?php _e(' Blog ', 'voce'); ?>
						</label>
					</span>
					<?php
			}

			switch ($hook['name']) {
				case 'voce_post_footer':
				case 'voce_below_first_post':
				case 'voce_last_byline_item':
					echo '';
					break;
				default: ?>
					<span class="input-hook-conditions">
						<input id="voce_hooks_options[front_<?php echo $hook['name']; ?>]" name="voce_hooks_options[front_<?php echo $hook['name']; ?>]" type="checkbox" value="1" <?php checked('1', $options_hooks['front_' . $hook['name']], true); ?> />
						<label class="description hook-label-space" for="voce_hooks_options[front_<?php echo $hook['name']; ?>]">
							<?php _e(' Front Page ', 'voce'); ?>
						</label>
					</span>
					<?php
			}

			switch ($hook['name']) {
				case 'voce_below_first_post':
					echo '';
					break;
				default: ?>
					<span class="input-hook-conditions">
						<input id="voce_hooks_options[posts_<?php echo $hook['name']; ?>]" name="voce_hooks_options[posts_<?php echo $hook['name']; ?>]" type="checkbox" value="1" <?php checked('1', $options_hooks['posts_' . $hook['name']], true); ?> />
						<label class="description hook-label-space" for="voce_hooks_options[posts_<?php echo $hook['name']; ?>]">
							<?php _e(' Posts ', 'voce'); ?>
						</label>
					</span>
				<?php
			}

			switch ($hook['name']) {
				case 'voce_before_content_column':
				case 'voce_after_content_column':
				case 'voce_before_article_header':
				case 'voce_after_article_header':
				case 'voce_last_byline_item':
				case 'voce_post_footer':
				case 'voce_below_first_post':
					echo '';
					break;
				default: ?>
					<span class="input-hook-conditions">
						<input id="voce_hooks_options[pages_<?php echo $hook['name']; ?>]" name="voce_hooks_options[pages_<?php echo $hook['name']; ?>]" type="checkbox" value="1" <?php checked('1', $options_hooks['pages_' . $hook['name']], true); ?> />
						<label class="description hook-label-space" for="voce_hooks_options[pages_<?php echo $hook['name']; ?>]">
							<?php _e(' Pages ', 'voce'); ?>
						</label>
					</span>
					<?php
			}

			switch ($hook['name']) {
				case 'voce_before_article_header':
				case 'voce_after_article_header':
				case 'voce_post_footer':
				case 'voce_below_first_post':
					echo '';
					break;
				default: // Hide on archives ?>
					<span class="input-hook-conditions">
						<input id="voce_hooks_options[archive_<?php echo $hook['name']; ?>]" name="voce_hooks_options[archive_<?php echo $hook['name']; ?>]" type="checkbox" value="1" <?php checked('1', $options_hooks['archive_' . $hook['name']], true); ?> />
						<label class="description hook-label-space" for="voce_hooks_options[archive_<?php echo $hook['name']; ?>]">
							<?php _e(' Archives ', 'voce'); ?>
						</label>
					</span>
					<?php
			}

			switch ($hook['name']) {
				case 'voce_before_content_column':
				case 'voce_after_content_column':
				case 'voce_before_article_header':
				case 'voce_after_article_header':
				case 'voce_post_footer':
				case 'voce_below_first_post':
					echo '';
					break;
				default: ?>
					<span class="input-hook-conditions">
						<input id="voce_hooks_options[search_<?php echo $hook['name']; ?>]" name="voce_hooks_options[search_<?php echo $hook['name']; ?>]" type="checkbox" value="1" <?php checked('1', $options_hooks['search_' . $hook['name']], true); ?> />
						<label class="description hook-label-space" for="voce_hooks_options[search_<?php echo $hook['name']; ?>]">
							<?php _e(' Search ', 'voce'); ?>
						</label>
					</span>
					<?php
			}

			switch ($hook['name']) {
				case 'voce_before_content_column':
				case 'voce_after_content_column':
				case 'voce_before_article_header':
				case 'voce_after_article_header':
				case 'voce_last_byline_item':
				case 'voce_post_footer':
				case 'voce_below_first_post':
					echo '';
					break;
				default: ?>
					<span class="input-hook-conditions">
						<input id="voce_hooks_options[404_<?php echo $hook['name']; ?>]" name="voce_hooks_options[404_<?php echo $hook['name']; ?>]" type="checkbox" value="1" <?php checked('1', $options_hooks['404_' . $hook['name']], true); ?> />
						<label class="description hook-label-space" for="voce_hooks_options[404_<?php echo $hook['name']; ?>]">
							<?php _e(' 404 ', 'voce'); ?>
						</label>
					</span>
					<?php
			}
		?>
	<br>
	<input id="voce_hooks_options[switch_<?php echo $hook['name']; ?>]" name="voce_hooks_options[switch_<?php echo $hook['name']; ?>]" type="checkbox" value="1" <?php checked('1', $options_hooks['switch_' . $hook['name']], true); ?> />
	<label class="description label-space" for="voce_hooks_options[switch_<?php echo $hook['name']; ?>]">
		<?php
			printf(__(' Disable hook %s', 'voce'),
				'<span class="notes">' . __('(any content placed in the textarea above will be saved)', 'voce'), '</span>'
			);
		?>
	</label>
	<?php submit_hooks(); ?>
</div>
<?php
}