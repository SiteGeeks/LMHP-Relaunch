<?php
/*
* Settings Tab for Voce Theme Framework's Content Options
*/
?>
<?php
foreach ($varrays as $va) {
	echo
	(isset($va['table_name']) ? $va['table_name'] : ''),
	(isset($va['table']) ? $va['table'] : ''),
	(isset($va['tr']) ? $va['tr'] : ''),
	(isset($va['th']) ? $va['th'] : ''),
	(isset($va['td']) ? $va['td'] : '');
	?>
	<span class="input-group">
		<input class="checkbox-space" id="voce_content_options[<?php echo $va['title']; ?>]" name="voce_content_options[<?php echo $va['title']; ?>]" type="checkbox" value="1" <?php checked('1', $options_content[$va['title']], true); ?>>
		<label class="description label-space" for="voce_content_options[<?php echo $va['title']; ?>]">
			<?php echo $va['label']; ?>
		</label>
	</span>
	<?php
	echo
	(isset($va['notes']) ? $va['notes'] : ''),
	(isset($va['td_end']) ? $va['td_end'] : ''),
	(isset($va['tr_end']) ? $va['tr_end'] : '');
}
?>
</table>
<hr>
<p><input name="wpsvoce_content_options[submit]" id="submit_options_form" type="submit" class="button-primary" value="<?php esc_attr_e('Save Content Settings', 'voce'); ?>" /></p>