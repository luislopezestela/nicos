<div class="col-md-3 col-sm-6 linkedin_data" data-id="<?php echo $wo['result']['sort_time'];?>">
	<div class="wow_content wow_my_groups">
		<div class="avatar">
			<a href="<?php echo $wo['result']['url']. $wo['marker'];?>ref=se" data-ajax="?link1=timeline&u=<?php echo $wo['result']['username']?>&ref=se">
				<img src="<?php echo $wo['result']['avatar'];?>" alt="<?php echo $wo['result']['name']; ?> Profile Picture" />
			</a>
		</div>
		<div class="wow_my_groups_info">
			<h3 class="page_title"><a href="<?php echo $wo['result']['url']. $wo['marker'];?>ref=se" data-ajax="?link1=timeline&u=<?php echo $wo['result']['username']?>&ref=se"><?php echo $wo['result']['name']; ?></a></h3>
			<p><?php echo lui_CountGroupMembers($wo['result']['id']);?> <?php echo $wo['lang']['members']; ?></p>
			<?php echo lui_GetJoinButton($wo['result']['id']);?>
		</div>
	</div>
</div>