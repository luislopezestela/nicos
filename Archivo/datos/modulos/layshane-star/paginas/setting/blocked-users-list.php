<div class="profile-style" id="member-<?php echo $wo['member']['user_id'] ?>">
   <a href="<?php echo $wo['member']['url'];?>" data-ajax="?link1=timeline&u=<?php echo $wo['member']['username'] ?>">
      <div class="avatar <?php echo lui_RightToLeft('pull-left');?>">
         <img src="<?php echo $wo['member']['avatar'];?>" alt="<?php echo $wo['member']['name']; ?> Profile Picture" />
      </div>
      <?php echo $wo['member']['name']; ?>
   </a>
   <div class="page-website">
      <?php echo lui_UserStatus($wo['member']['user_id'],$wo['member']['lastseen']); ?>
   </div>
   <div>
   <a class="btn btn-default btn-sm" href="<?php echo $wo['member']['url'] . $wo['marker'] . 'block_user=un-block';?>"><i class="fa fa-remove"></i> <?php echo $wo['lang']['un_block'];?></a>
   </div>
</div>