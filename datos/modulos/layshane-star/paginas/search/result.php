<div class="col-xs-6 col-sm-4 nearby_user_wrapper text-center">
	<div>
		<a href="<?php echo $wo['result']['url']. $wo['marker'];?>ref=se" data-ajax="?link1=timeline&u=<?php echo $wo['result']['username']?>&ref=se">
			<div class="avatar">
				<img src="<?php echo $wo['result']['avatar'];?>" alt="<?php echo $wo['result']['name']; ?> Profile Picture" />
			</div>
				
			<span class="user-popover" data-type="<?php echo $wo['result']['type']; ?>" data-id="<?php echo $wo['result']['id']; ?>" data-search-type="<?php echo $wo['result']['type']; ?>">
				<h4 class="title user_wrapper_link" title="<?php echo $wo['result']['name']; ?>"><?php echo $wo['result']['name']; ?></h4>
			</span>
				
			<?php if(empty($wo['result']['group_id'])) { ?>
				<?php if($wo['result']['verified'] == 1) {   ?>
				<!--<span class="verified-color">
					<i class="fa fa-check-circle" title="<?php echo $wo['lang']['verified_user'];?>"></i>
				</span>-->
				<?php  } ?>
			<?php } ?>
		</a>
		
		<?php if (!empty($wo['result']['page_id'])) { ?>
		<div class="user-lastseen">
			<?php echo $wo['lang']['category'];?> <?php echo $wo['result']['category']; ?>
		</div>
		<div class="user-follow-button">
			<?php echo lui_GetLikeButton($wo['result']['page_id']);?>
		</div>
		<?php } else if (!empty($wo['result']['group_id'])) { ?>
		<div class="user-lastseen">
			<?php echo $wo['lang']['members'];?>: <?php echo lui_CountGroupMembers($wo['result']['id']);?>
		</div>
		<div class="user-follow-button">
			<?php echo lui_GetJoinButton($wo['result']['id']);?>
		</div>
		<?php } else { ?>
		<?php if($wo['config']['user_lastseen'] == 1 && $wo['result']['showlastseen'] != 0) { ?>
		<div class="user-lastseen">
			<?php echo lui_UserStatus($wo['result']['user_id'],$wo['result']['lastseen']); ?>
		</div>
		<?php } ?>
		<?php if (!isset($wo['result']['no_btn'])) { ?>
		<div class="user-follow-button">
			<?php echo lui_GetFollowButton($wo['result']['user_id']);?>
		</div>
		<?php } ?>
		<?php } ?>
	</div>
</div>