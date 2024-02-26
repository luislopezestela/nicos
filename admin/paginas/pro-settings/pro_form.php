<div class="form-group">
	<label for="status" class="main-label">Estado</label>
	<div class="form-group float-right switcher">
		<input type="hidden" name="status" value="0" />
		<input type="checkbox" name="status" id="status-enabledd" value="1" <?php echo ($wo['pro']['status'] == 1) ? 'checked': '';?>>
		<label for="status-enabledd" class="check-trail"><span class="check-handler"></span></label>
	</div>
</div>

<div class="clearfix"></div>
<hr>

<div class="row">
	<div class="col-md-7">
		<div class="form-group form-float">
			<div class="form-line focused">
				<label class="form-label">Nombre</label>
				<input type="text" name="name" class="form-control" value="<?php echo $wo['pro']['type'];?>">
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group form-float">
			<div class="form-line focused">
				<label class="form-label">Compras</label>
				<input type="number" name="price" class="form-control" value="<?php echo $wo['pro']['price'];?>">
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group form-float">
			<div class="form-line">
				<label class="form-label">Color</label>
				<input type="color" name="color" class="form-control" value="<?php echo $wo['pro']['color'];?>">
			</div>
		</div>
	</div>
</div>

<div class="clearfix"></div>
<hr>

<div class="form-group">
	<label for="featured_member" class="main-label">Featured member</label>
	<div class="form-group float-right switcher">
		<input type="hidden" name="featured_member" value="0" />
		<input type="checkbox" name="featured_member" id="featured_member-enabledd" value="1" <?php echo ($wo['pro']['featured_member'] == 1) ? 'checked': '';?>>
		<label for="featured_member-enabledd" class="check-trail"><span class="check-handler"></span></label>
	</div>
</div>

<div class="form-group">
	<label for="profile_visitors" class="main-label">See profile visitors</label>
	<div class="form-group float-right switcher">
		<input type="hidden" name="profile_visitors" value="0" />
		<input type="checkbox" name="profile_visitors" id="profile_visitors-enabledd" value="1" <?php echo ($wo['pro']['profile_visitors'] == 1) ? 'checked': '';?>>
		<label for="profile_visitors-enabledd" class="check-trail"><span class="check-handler"></span></label>
	</div>
</div>

<div class="form-group">
	<label for="last_seen" class="main-label">Show / Hide last seen</label>
	<div class="form-group float-right switcher">
		<input type="hidden" name="last_seen" value="0" />
		<input type="checkbox" name="last_seen" id="last_seen-enabledd" value="1" <?php echo ($wo['pro']['last_seen'] == 1) ? 'checked': '';?>>
		<label for="last_seen-enabledd" class="check-trail"><span class="check-handler"></span></label>
	</div>
</div>

<div class="form-group">
	<label for="verified_badge" class="main-label">Verified badge</label>
	<div class="form-group float-right switcher">
		<input type="hidden" name="verified_badge" value="0" />
		<input type="checkbox" name="verified_badge" id="verified_badge-enabledd" value="1" <?php echo ($wo['pro']['verified_badge'] == 1) ? 'checked': '';?>>
		<label for="verified_badge-enabledd" class="check-trail"><span class="check-handler"></span></label>
	</div>
</div>

<div class="clearfix"></div>
<hr>

<div class="row">
	<div class="col-md-6">
		<div class="form-group form-float">
			<div class="form-line focused">
				<label class="form-label">Pages promotion</label>
				<input type="number" name="pages_promotion" class="form-control" value="<?php echo $wo['pro']['pages_promotion'];?>">
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group form-float">
			<div class="form-line focused">
				<label class="form-label">Posts promotion</label>
				<input type="number" name="posts_promotion" class="form-control" value="<?php echo $wo['pro']['posts_promotion'];?>">
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group form-float">
			<div class="form-line focused">
				<label class="form-label">Max Upload Size</label>
				<select class="form-control show-tick" name="max_upload">
					<option value="2000000"    <?php echo ($wo['pro']['max_upload'] == 2000000)   ? ' selected': '';?>>2 MB</option>
					<option value="6000000"    <?php echo ($wo['pro']['max_upload'] == 6000000)   ? ' selected': '';?>>6 MB</option>
					<option value="12000000"   <?php echo ($wo['pro']['max_upload'] == 12000000)  ? ' selected': '';?>>12 MB</option>
					<option value="24000000"   <?php echo ($wo['pro']['max_upload'] == 24000000)  ? ' selected': '';?>>24 MB</option>
					<option value="48000000"   <?php echo ($wo['pro']['max_upload'] == 48000000)  ? ' selected': '';?>>48 MB</option>
					<option value="96000000"   <?php echo ($wo['pro']['max_upload'] == 96000000)  ? ' selected': '';?>>96 MB</option>
					<option value="256000000"  <?php echo ($wo['pro']['max_upload'] == 256000000) ? ' selected': '';?>>256 MB</option>
					<option value="512000000"  <?php echo ($wo['pro']['max_upload'] == 512000000) ? ' selected': '';?>>512 MB</option>
					<option value="1000000000" <?php echo ($wo['pro']['max_upload'] == 1000000000) ? ' selected': '';?>>1 GB</option>
					<option value="5000000000" <?php echo ($wo['pro']['max_upload'] == 5000000000) ? ' selected': '';?>>5 GB</option>
					<option value="10000000000" <?php echo ($wo['pro']['max_upload'] == 10000000000) ? ' selected': '';?>>10 GB</option>
					<option value="1000000000000" <?php echo ($wo['pro']['max_upload'] == 1000000000000) ? ' selected': '';?>>Unlimited</option>
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group form-float">
			<div class="form-line focused">
				<label class="form-label">Discount (<?php echo $wo['pro']['discount'];?>%)</label>
				<input type="number" name="discount" class="form-control" value="<?php echo $wo['pro']['discount'];?>">
			</div>
		</div>
	</div>
</div>	

<div class="row">
	<div class="col-md-6">
		<div class="form-group form-float">
			<div class="form-line focused">
				<label class="form-label">Paid Every</label>
				<input type="number" name="count" class="form-control" value="<?php echo $wo['pro']['time_count'];?>">
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group form-float">
			<div class="form-line focused">
				<label class="d-block mt-4"></label>
				<select class="form-control show-tick" name="time">
                    <option value="day" <?php echo $wo['pro']['time'] == 'day' ? 'selected' : '';?>>Day</option>
                    <option value="week" <?php echo $wo['pro']['time'] == 'week' ? 'selected' : '';?>>Week</option>
                    <option value="month" <?php echo $wo['pro']['time'] == 'month' ? 'selected' : '';?>>Month</option>
                    <option value="year" <?php echo $wo['pro']['time'] == 'year' ? 'selected' : '';?>>Year</option>
                    <option value="unlimited" <?php echo $wo['pro']['time'] == 'unlimited' ? 'selected' : '';?>>Unlimited</option>
                </select>
			</div>
		</div>
	</div>
</div>

<div class="clearfix"></div>
<hr>

<div class="row">
	<div class="col-md-6">
		<div class="btn-file d-flex align-items-center mb-3">
			<input type="file" id="pro-iconn" name="icon" class="hidden">
			<div class="mr-3 change-file-ico">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16.5,6V17.5A4,4 0 0,1 12.5,21.5A4,4 0 0,1 8.5,17.5V5A2.5,2.5 0 0,1 11,2.5A2.5,2.5 0 0,1 13.5,5V15.5A1,1 0 0,1 12.5,16.5A1,1 0 0,1 11.5,15.5V6H10V15.5A2.5,2.5 0 0,0 12.5,18A2.5,2.5 0 0,0 15,15.5V5A4,4 0 0,0 11,1A4,4 0 0,0 7,5V17.5A5.5,5.5 0 0,0 12.5,23A5.5,5.5 0 0,0 18,17.5V6H16.5Z"></path></svg>
			</div>
			<div>
				<b>Icon</b>
				<div class="mt-1 hidden" id="pro-iconn-i">
					<input type="text" class="change-file-input" readonly="">
				</div>
			</div>
		</div>
		<small>The icon size (width = 32px and height: 32px and .png)</small>
		<div class="clearfix"></div>
	</div>
	<div class="col-md-6">
		<div class="btn-file d-flex align-items-center mb-3">
			<input type="file" id="pro-night-iconn" name="night_icon" class="hidden">
			<div class="mr-3 change-file-ico">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16.5,6V17.5A4,4 0 0,1 12.5,21.5A4,4 0 0,1 8.5,17.5V5A2.5,2.5 0 0,1 11,2.5A2.5,2.5 0 0,1 13.5,5V15.5A1,1 0 0,1 12.5,16.5A1,1 0 0,1 11.5,15.5V6H10V15.5A2.5,2.5 0 0,0 12.5,18A2.5,2.5 0 0,0 15,15.5V5A4,4 0 0,0 11,1A4,4 0 0,0 7,5V17.5A5.5,5.5 0 0,0 12.5,23A5.5,5.5 0 0,0 18,17.5V6H16.5Z"></path></svg>
			</div>
			<div>
				<b>Night Icon</b>
				<div class="mt-1 hidden" id="pro-night-iconn-i">
					<input type="text" class="change-file-input" readonly="">
				</div>
			</div>
		</div>
		<small>The icon size (width = 32px and height: 32px and .png)</small>
		<div class="clearfix"></div>
	</div>
</div>

<div class="clearfix"></div>
<hr>

<div class="form-group form-float">
    <div class="form-line focused">
        <label class="form-label">Description</label>
        <textarea class="form-control show-tick" name="description"><?php echo $wo['pro']['description'];?></textarea> 
    </div>
</div>
<?php if ((!empty($wo['pro']['image']) || !empty($wo['pro']['night_image'])) && in_array($wo['pro']['id'], array(1,2,3,4))) { ?>
<label for="icon_to_use">Icon to use</label>
<div class="form-group">
    <input type="radio" name="icon_to_use" id="icon_to_use-enabled" value="1">
    <label for="icon_to_use-enabled">Default</label>
    <input type="radio" name="icon_to_use" id="icon_to_use-disabled" value="0" checked>
    <label for="icon_to_use-disabled" class="m-l-20">My Icon</label>
</div>
<?php } ?>

<input type="hidden" name="type" value="<?php echo $wo['pro']['id'];?>">

<script>
$("#pro-iconn").change(function () {
	var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
	$("#pro-iconn-i input").val(filename);
	$("#pro-iconn-i").removeClass('hidden');
});
$("#pro-night-iconn").change(function () {
	var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
	$("#pro-night-iconn-i input").val(filename);
	$("#pro-night-iconn-i").removeClass('hidden');
});
</script>
