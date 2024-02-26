<div class="user-fetch">
	<div class="user-cover" style="background: url(<?php echo $wo['popover']['cover']?>);"></div>
	<div class="user-avatar">
		<img src="<?php echo $wo['popover']['avatar']; ?>" alt="">
	</div>
	<div class="user-name">
		<a href="<?php echo $wo['popover']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['popover']['group_name']?>"><?php echo $wo['popover']['name']; ?></a>
	</div>
	<div class="user-footer">
		<div class="user-buttons">
			<div class="user-button user-follow-button"><?php echo lui_GetJoinButton($wo['popover']['id']); ?></div>
		</div>
	</div>
	<div class="clear"></div>
	<ul class="user-information">
		<li>
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg>
			<?php echo $wo['popover']['category'];?>
		</li>
		<li>
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
			<?php echo lui_CountGroupMembers($wo['popover']['id']);?>
		</li>
	</ul>
	<div class="clear"></div>
</div>