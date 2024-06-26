<!-- Text input-->
<div class="col-lg-6">
	<div class="sun_input">
		<select id="discount_type_<?php echo($wo['offer']['id']) ?>" name="discount_type" class="form-control input-md" onchange="change_discount(this,<?php echo($wo['offer']['id']) ?>)"">
			<option value="discount_percent" <?php echo $wo['offer']['discount_type'] == 'discount_percent' ? 'selected' : ''; ?>><?php echo $wo['lang']['discount_percent'] ?></option>
			<option value="discount_amount" <?php echo $wo['offer']['discount_type'] == 'discount_amount' ? 'selected' : ''; ?>><?php echo $wo['lang']['discount_amount'] ?></option>
			<option value="buy_get_discount" <?php echo $wo['offer']['discount_type'] == 'buy_get_discount' ? 'selected' : ''; ?>><?php echo $wo['lang']['buy_get_discount'] ?></option>
			<option value="spend_get_off" <?php echo $wo['offer']['discount_type'] == 'spend_get_off' ? 'selected' : ''; ?>><?php echo $wo['lang']['spend_get_off'] ?></option>
			<option value="free_shipping" <?php echo $wo['offer']['discount_type'] == 'free_shipping' ? 'selected' : ''; ?>><?php echo $wo['lang']['free_shipping'] ?></option>
		</select>
	</div>
</div>

<div class="col-lg-6 discount_percent_input_<?php echo($wo['offer']['id']) ?>"  <?php echo $wo['offer']['discount_type'] == 'discount_percent' || $wo['offer']['discount_type'] == 'buy_get_discount' ? '' : 'style="display: none;"'; ?>>
	<div class="sun_input">
		<select name="discount_percent" class="form-control input-md">
			<?php for ($i=1; $i < 100 ; $i++) {  ?>
				<option value="<?php echo $i ?>" <?php echo $wo['offer']['discount_percent'] == $i ? 'selected' : ''; ?>><?php echo $i ?>%</option>
			<?php } ?>
		</select>
	</div>
</div>
<div class="clear"></div>
							<div class="col-lg-12">
								<br>
							</div>
<div class="col-lg-6 discount_amount_input_<?php echo($wo['offer']['id']) ?>"  <?php echo $wo['offer']['discount_type'] == 'discount_amount' ? '' : 'style="display: none;"'; ?>>
	<div class="sun_input">
		<input name="discount_amount" type="text" class="form-control input-md" placeholder="<?php echo $wo['lang']['discount_amount'] ?>" value="<?php echo($wo['offer']['discount_amount']) ?>" autocomplete="off">
	</div>
</div>
<div class="clear"></div>
							<div class="col-lg-12">
								<br>
							</div>
<div class="col-lg-12 buy_get_discount_input_<?php echo($wo['offer']['id']) ?>" <?php echo $wo['offer']['discount_type'] == 'buy_get_discount' ? '' : 'style="display: none;"'; ?>>
	<div class="col-lg-6">
		<div class="sun_input">
			<input name="buy" type="text" class="form-control input-md" placeholder="<?php echo $wo['lang']['buy'] ?>"  value="<?php echo($wo['offer']['buy']) ?>" autocomplete="off">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="sun_input">
			<input name="get" type="text" class="form-control input-md" placeholder="<?php echo $wo['lang']['get'] ?>" value="<?php echo($wo['offer']['get_price']) ?>" autocomplete="off">
		</div>
	</div>
</div>
<div class="clear"></div>
							<div class="col-lg-12">
								<br>
							</div>
<div class="col-lg-12 spend_get_off_input_<?php echo($wo['offer']['id']) ?>" <?php echo $wo['offer']['discount_type'] == 'spend_get_off' ? '' : 'style="display: none;"'; ?>>
	<div class="col-lg-6">
		<div class="sun_input">
			<input name="spend" type="text" class="form-control input-md" placeholder="<?php echo $wo['lang']['spend'] ?>" value="<?php echo($wo['offer']['spend']) ?>" autocomplete="off">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="sun_input">
			<input name="amount_off" type="text" class="form-control input-md" placeholder="<?php echo $wo['lang']['amount_off'] ?>" value="<?php echo($wo['offer']['amount_off']) ?>" autocomplete="off">
		</div>
	</div>
</div>


<div class="clear"></div>
							<div class="col-lg-12">
								<br>
							</div>

<div class="col-lg-12 no-padding-right">
	<div class="sun_input">
		<input name="discounted_items" type="text" class="form-control input-md" placeholder="<?php echo $wo['lang']['discounted_items'] ?>" value="<?php echo($wo['offer']['discounted_items']) ?>" maxlength="100" autocomplete="off">
		<small><?php echo $wo['lang']['items_services'] ?> </small>
	</div>
</div>
<div class="clear"></div>
							<div class="col-lg-12">
								<br>
							</div>
<div class="col-lg-12">
	<div class="sun_input">
		<textarea class="form-control" name="description" rows="3" placeholder="<?php echo $wo['lang']['description'] ?>"><?php echo($wo['offer']['description']) ?></textarea>
	</div>
</div>
<input type="hidden" name="page_id" class="form-control input-md" value="<?php echo $wo['offer']['page_id'];?>" autocomplete="off">
<input type="hidden" name="offer_id" class="form-control input-md" value="<?php echo $wo['offer']['id'];?>" autocomplete="off">
<input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>" autocomplete="off">