<?php 
if (empty($wo['page'])) {
  $wo['page'] = 'home';
}
 ?>
<?php if($wo['story']['postType'] == 'ad'): ?>
  <?php echo lui_LoadPage('story/includes/advertisement'); ?>
<?php else: ?>
	<?php
	if(!empty($wo['story']['product_id']) && !empty($wo['story']['product']) && !empty($wo['story']['product']['images']) && $wo['page'] == 'story') {
		echo lui_LoadPage('story/includes/product_full');
	}else if(!empty($wo['story']['blog'])){ ?>
		<?php echo lui_LoadPage('story/includes/post-layout'); ?>
	<?php //}else if(!empty($wo['story']['album_name'])){ ?>
		<?php //echo lui_LoadPage('story/includes/post-layout'); ?>
	<?php }else if(!empty($wo['story']['product'])){ ?>
		<?php //is_array($wo['story']); // print_r($wo['story'])  !empty($wo['story']['product'])?>
	  <?php echo lui_LoadPage('story/includes/post-layout'); ?>
	<?php } //else{
		//print_r($wo['story']);
	//} ?>
<?php endif; ?>