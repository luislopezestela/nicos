<div class="home profile-style promoted-style sidebar-page-data wo_sidebar_pages" data-page-id="<?php echo $wo['PageList']['page_id']?>">
    <div class="card hovercard promoted">
        <div class="cardheader">
            <img src="<?php echo $wo['PageList']['cover']?>" id="cover-image" alt="<?php echo $wo['PageList']['name']?>">
        </div>
		<div class="page_middle">
        <div class="avatar <?php echo lui_RightToLeft('pull-left');?>">
            <img id="updateImage-<?php echo $wo['PageList']['page_id']?>" alt="<?php echo $wo['PageList']['name']?>" src="<?php echo $wo['PageList']['avatar']?>">
        </div>
        <div class="info">
            <div class="title">
                <span class="user-popover" data-id="<?php echo $wo['PageList']['id'];?>" data-type="<?php echo $wo['PageList']['type'];?>">
                <a id="user-full-name" href="<?php echo $wo['PageList']['url'];?>" data-ajax="?link1=timeline&u=<?php echo $wo['PageList']['username']?>"><?php echo $wo['PageList']['user_name'];?></a>  <?php if ($wo['PageList']['verified'] == 1) { ?> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="verified-color feather feather-check-circle" title="<?php echo $wo['lang']['verified_user'];?>" data-toggle="tooltip" style="vertical-align: unset;"><path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z" /></svg> <?php } ?>
                </span>
            </div>
			<div class="page_catg text-muted" style="font-size: 12px;"><?php echo $wo['PageList']['category']?></div>
			<div class="text-muted" style="font-size: 12px;">
				<?php echo lui_CountPageLikes($wo['PageList']['page_id']);?> <?php echo $wo['lang']['people_likes_this']; ?>
			</div>
        </div>
		</div>
		<div class="user-follow-button">
			<?php echo lui_GetLikeButton($wo['PageList']['page_id']);?>
		</div>
    </div>
</div>