<div class="wow_form_fields">
	<label for="fid_<?php echo $wo['field']['id'];?>"><?php echo $wo['field']['name']; ?></label>  
	<?php 
	$required = '';
	if ($wo['field']['required'] == 'on') {
		$required = 'required';
	}
		if ($wo['field']['type'] == 'selectbox') {
		$options = @explode(',', $wo['field']['options']); ?>
		<select name="fid_<?php echo $wo['field']['id'];?>" class="form-control" <?php echo $required ?>>
				<?php
					foreach ($options as $key => $value) {
						$selected = (($key + 1) == $wo['product']['fid_'.$wo['field']['id']]) ? 'selected' : '';
				?>
				<option value="<?php echo $key + 1;?>" <?php echo $selected; ?>><?php echo $value;?></option>
				<?php } ?>
		</select>
	<?php } else { if ($wo['field']['type'] == 'textbox') { ?>
		<input id="fid_<?php echo $wo['field']['id'];?>" name="fid_<?php echo $wo['field']['id'];?>" type="text" class="form-control input-md" value="<?php echo $wo['product']['fid_'.$wo['field']['id']] ?>" <?php echo $required ?>>
	<?php } else if ($wo['field']['type'] == 'textarea') {?>
		<textarea class="form-control" id="fid_<?php echo $wo['field']['id'];?>" name="fid_<?php echo $wo['field']['id'];?>" rows="3" <?php echo $required ?>><?php echo $wo['product']['fid_'.$wo['field']['id']]; ?></textarea>
	<?php } } ?>
	<span class="help-block"><?php echo $wo['field']['description'];?></span>
</div>