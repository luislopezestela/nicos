<div class="col-md-3 col-sm-4 nearby_user_wrapper_prnt linkedin_data" data-id="<?php echo $wo['result']['sort_time'];?>">
	<div class="fndfrnd_user_wrapper">
		<div class="avatar">
			<a href="<?php echo $wo['result']['url']. $wo['marker'];?>ref=se" data-ajax="?link1=timeline&u=<?php echo $wo['result']['username']?>&ref=se"><img src="<?php echo $wo['result']['avatar'];?>" alt="<?php echo $wo['result']['name']; ?> Profile Picture" /></a>
			<?php if (!isset($wo['result']['no_btn'])) { ?>
			<div class="user-follow-button">
				<?php echo lui_GetFollowButton($wo['result']['user_id']);?>
			</div>
			<?php } ?>
			<div class="fndfrnd_user_wrapper_bg">
				<h4 class="user_wrapper_link">
					<span class="user-popover" data-type="<?php echo $wo['result']['type']; ?>" data-id="<?php echo $wo['result']['id']; ?>" data-search-type="<?php echo $wo['result']['type']; ?>">
						<a href="<?php echo $wo['result']['url']. $wo['marker'];?>ref=se" data-ajax="?link1=timeline&u=<?php echo $wo['result']['username']?>&ref=se"><?php echo $wo['result']['name']; ?></a>
					</span>
				</h4>
				<ul class="list-unstyled sun_friends_fetrs">
					<li>
						<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15 17,16.5V19H23V16.5C23,14.17 18.33,13 16,13M8,13C5.67,13 1,14.17 1,16.5V19H15V16.5C15,14.17 10.33,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z" /></svg></span>
						<div><p><?php echo lui_CountFollowers($wo['result']['user_id']);?> <?php if ($wo['config']['connectivitySystem'] == 1) { echo $wo['lang']['friends_btn'];} else { echo $wo['lang']['followers'];} ?></p></div>
					</li>
					<li>
						<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21,6V8H3V6H21M3,18H12V16H3V18M3,13H21V11H3V13Z" /></svg></span>
						<div><p><?php echo $wo['result']['details']['post_count'];?> <?php echo $wo['lang']['posts']; ?></p></div>
					</li>
					<?php if($wo['config']['user_lastseen'] == 1 && $wo['result']['showlastseen'] != 0) { ?>
						<li>
							<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z" /></svg></span>
							<div><p><?php echo $wo['lang']['last_active']; ?> <?php echo lui_UserStatus($wo['result']['user_id'],$wo['result']['lastseen']); ?></p></div>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>