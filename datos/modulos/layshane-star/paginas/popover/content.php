<div class="user-fetch">
	<div class="user-cover" style="background: url(<?php echo $wo['popover']['cover']?>);"></div>
	<div class="user-avatar">
		<img src="<?php echo $wo['popover']['avatar']; ?>" alt="user avatar">
	</div>
	<div class="user-name">
		<a href="<?php echo $wo['popover']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['popover']['username']?>"><?php echo $wo['popover']['name']; ?></a>
		<?php if($wo['popover']['verified'] == 1) {   ?>
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="verified-color feather feather-check-circle" title="<?php echo $wo['lang']['verified_user'];?>" data-toggle="tooltip"><path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z" /></svg>
		<?php } ?>
	</div>
	<div class="user-footer">
		<div class="user-buttons text-center">
			<div class="user-button user-follow-button"><?php echo lui_GetFollowButton($wo['popover']['user_id']); ?></div>
			<div class="user-button message-button"><?php echo lui_GetMessageButton($wo['popover']['user_id']); ?></div>
		</div>
	</div>
	<div class="clear"></div>
	<ul class="user-information">
		<?php $gender = ucfirst(strtolower($wo['popover']['gender']));?>
		<?php if($wo['config']['user_lastseen'] == 1 && $wo['popover']['showlastseen'] != 0) {  ?>
			<li>
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
				<?php echo lui_UserStatus($wo['popover']['user_id'], $wo['popover']['lastseen']);?>
			</li>
		<?php } ?>
		<li>
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
			<?php if (in_array($wo['popover']['gender'], array_keys($wo['genders']))) {
                	echo $wo['genders'][$wo['popover']['gender']];
                }
                else{
                	echo $wo['genders'][array_keys($wo['genders'])[0]];
                } ;?>
		</li>
		<?php if ($wo['popover']['country_id'] > 0) { ?>
			<li>
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
				<?php echo $wo['lang']['living_in'];?> <?php echo $wo['countries_name'][$wo['popover']['country_id']];?>
			</li>
		<?php } ?>
	</ul>
	<div class="clear"></div>
</div>