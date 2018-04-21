<?php
?>
<h3 class="firstbar"><?php _e('License and Update Settings', 'voce'); ?></h3>
<div class="instructions radius">
	<p><?php _e('Step 1: Enter your license key.<br />Step 2: Click the "Send License Key Changes to Database" button.<br />Step 3: Click the "Activate License" button and you are done!', 'voce'); ?></p>
	<p><?php printf(__('You can use your license on as many installs as your purchase allows.  You license is valid for 1 year.  If you deactivate your license or do not have a valid and/or current license copy of %s, you will not receive automatic updates to the theme.', 'voce'), THEME_NAME); ?></p>
</div>
<table class="form-table">
	<tr valign="top">
		<th scope="row" valign="top"><?php _e('License Key', 'voce'); ?></th>
		<td>
			<input id="voce_license_key" name="voce_license_key" type="text" class="regular-text" value="<?php echo esc_attr($license, 'voce'); ?>" />
			<label class="description" for="voce_license_key"><?php _e(' Enter your license key', 'voce'); ?></label>
		</td>
	</tr>
	<?php
		if ( false !== $license) { ?>
			<tr valign="top">
				<th scope="row" valign="top"><?php _e('Activate License', 'voce'); ?></th>
				<td>
					<?php
					if ( false !== $status && 'valid' == $status) { ?>
						<span style="color:green;"><?php _e('active ', 'voce'); ?></span>
						<?php wp_nonce_field('voce_nonce', 'voce_nonce'); ?>
						<input type="submit" class="button-secondary" name="voce_license_deactivate" value="<?php _e('Deactivate License', 'voce'); ?>" />
					<?php
					} else {
						wp_nonce_field('voce_nonce', 'voce_nonce'); ?>
						<input type="submit" class="button-secondary" name="voce_license_activate" value="<?php _e('Activate License', 'voce'); ?>" />
					<?php
					}
				?>
				</td>
			</tr>
		<?php
		}
	?>
</table>
<hr>
<p><input name="wpsvoce_license_key[submit]" id="submit_options_form" type="submit" class="button-primary" value="<?php esc_attr_e('Send License Key Changes to Database', 'voce'); ?>" /></p>