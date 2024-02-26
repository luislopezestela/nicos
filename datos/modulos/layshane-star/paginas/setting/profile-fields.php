<div class="wow_form_fields">
	<?php $fid = '';
		if (!empty($wo['setting']['fileds'][$wo['field']['fid']])) {
			$fid = $wo['setting']['fileds'][$wo['field']['fid']];
		} 
		if( isset( $_GET[ $wo['field']['fid'] ] ) && !empty( $_GET[ $wo['field']['fid'] ] ) ){
			$fid = lui_Secure( $_GET[ $wo['field']['fid'] ] );
		}
	?>
	<label for="<?php echo $wo['field']['fid'];?>"><?php echo $wo['field']['name']; ?></label>  
	<?php 
		if ($wo['field']['select_type'] == 'yes') {
		$options = @explode(',', $wo['field']['type']); ?>
		<select name="<?php echo $wo['field']['fid'];?>" class="form-control">
				<?php if( isset( $wo['field']['issearch'] ) ){ ?> <option value=""><?php echo $wo['lang']['all'];?></option> <?php } ?>
				<?php
					foreach ($options as $key => $value) {
					$selected = (($key + 1) == $fid) ? 'selected' : '';
				?>
				<option value="<?php echo $key + 1;?>" <?php echo $selected;?>><?php echo $value;?></option>
				<?php } ?>
		</select>
	<?php } else { if ($wo['field']['type'] == 'textbox') { ?>
		<input id="<?php echo $wo['field']['fid'];?>" name="<?php echo $wo['field']['fid'];?>" type="text" class="form-control input-md" value="<?php echo $fid?>">
	<?php } else if ($wo['field']['type'] == 'textarea') {?>
		<textarea class="form-control" id="<?php echo $wo['field']['fid'];?>" name="<?php echo $wo['field']['fid'];?>" rows="3"><?php echo br2nl($fid);?></textarea>
	<?php } } ?>
	<?php if( !isset( $wo['field']['issearch'] ) ){ ?>
		<span class="help-block"><?php echo $wo['field']['description'];?></span>
	<?php } ?>
</div>