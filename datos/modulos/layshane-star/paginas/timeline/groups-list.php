<div class="col-xs-6 col-sm-4 nearby_user_wrapper text-center user-data" data-page-id="<?php echo $wo['GroupList']['id'];?>">
  <a href="<?php echo $wo['GroupList']['url'];?>" data-ajax="?link1=timeline&u=<?php echo $wo['GroupList']['username']?>">
    <div class="avatar">
      <img src="<?php echo $wo['GroupList']['avatar'];?>" alt="<?php echo $wo['GroupList']['name']; ?> Profile Picture" />
    </div>
    <span class="user_wrapper_link"><?php echo $wo['GroupList']['name']; ?></span>
  </a>
  <div class="user-lastseen">
    <?php echo $wo['lang']['members'];?>: <?php echo lui_CountGroupMembers($wo['GroupList']['id']); ?>
  </div>
  <div class="user-follow-button">
    <?php echo lui_GetJoinButton($wo['GroupList']['id']);?>
  </div>
</div>