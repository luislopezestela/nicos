<li>
	<a href="<?php echo $wo['result']['url'] . $wo['marker'];?>ref=se" data-ajax="?link1=timeline&u=<?php echo $wo['result']['username']?>&ref=se">
		<span class="user-popover" data-id="<?php echo $wo['result']['id'];?>" data-type="<?php echo $wo['result']['type'];?>">
			<div class="search-user-avatar <?php echo lui_RightToLeft('pull-left');?>">
				<img src="<?php echo $wo['result']['avatar']?>" alt="<?php echo $wo['result']['name']?> Profile Picture">
			</div>
			<span class="search-user-name">
				<?php echo $wo['result']['name']?>
				<?php if(empty($wo['result']['group_id'])) {?>   
					<?php if($wo['result']['verified'] == 1) {?>   
						<span class="verified-color"><i class="fa fa-check-circle" title="<?php echo $wo['lang']['verified_user'];?>"></i></span>
					<?php } ?>
				<?php } ?>
			</span>
			<?php if (!empty($wo['result']['page_id'])) { ?>
				<span class="search_result_badge"><?php echo $wo['lang']['page'];?></span>
			<?php } else if (!empty($wo['result']['group_id'])) { ?>
				<span class="search_result_badge"><?php echo $wo['lang']['group'];?></span>
			<?php } ?>
		</span>
		<?php if (!empty($wo['result']['page_id'])) { ?>
		<div class="user-lastseen">
			<?php echo $wo['result']['category']; ?>
		</div>
		<?php } else if (!empty($wo['result']['group_id'])) { ?>
		<div class="user-lastseen">
			<?php echo lui_CountGroupMembers($wo['result']['group_id']); ?> <?php echo $wo['lang']['members'];?>
		</div>
		<?php } else { ?>
		<?php if($wo['config']['user_lastseen'] == 1 && $wo['result']['showlastseen'] != 0) { ?>
		<div class="user-lastseen">
			<?php echo lui_UserStatus($wo['result']['user_id'],$wo['result']['lastseen']); ?>
		</div>
		<?php } ?>
		<?php } ?>
	</a>
	<div class="clear"></div>
</li>
