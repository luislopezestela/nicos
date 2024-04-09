<div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div>
<div class="wo_lbox_topbar">
	<span class="lbox_topbar_child <?php echo lui_RightToLeft('pull-right');?>">
		<span onclick="Wo_CloseLightbox();">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
		</span>
	</span>
</div>
<div class="lightbox-content multi wo_image_lightbox">
	<div class="story-img">
		<span class="changer previous-btn" onclick="Wo_PreviousProductPicture(<?php echo $wo['image']['product_id'];?>, <?php echo $wo['image']['id'];?>);">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left" color="#fff"><polyline points="15 18 9 12 15 6"></polyline></svg>
		</span>
		<span class="changer next-btn multi" onclick="Wo_NextProductPicture(<?php echo $wo['image']['product_id'];?>, <?php echo $wo['image']['id'];?>);">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right" color="#fff"><polyline points="9 18 15 12 9 6"></polyline></svg>
		</span>
		<div id="draggableHelper" style="display: table-cell;vertical-align: middle;">
			<img src="<?=$wo['config']['site_url'].'/'.$wo['image']['image'];?>" alt="media" class="" id="wo_zoom_product_<?php echo $wo['image']['id'];?>">
		</div>
	</div>
</div>
<script>
$(document).keydown(function(e) {
    if (e.keyCode == 27) {
        Wo_CloseLightbox();
    }   
});
$(document).keydown(function(e) {
    if (e.keyCode == 27) {
        Wo_CloseLightbox();
    }   
});
</script>