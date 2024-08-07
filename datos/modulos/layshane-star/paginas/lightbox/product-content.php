<div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div>
<div class="wo_lbox_topbar">
	<span class="lbox_topbar_child <?php echo lui_RightToLeft('pull-right');?>">
		<span onclick="window.open('<?php echo lui_GetMedia($wo['image']['image']);?>', '_blank')">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
		</span>
		<span onclick="zoomin(<?php echo $wo['image']['id'];?>)">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zoom-in"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
		</span>
		<span onclick="zoomout(<?php echo $wo['image']['id'];?>)">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zoom-out"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
		</span>
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
			<img src="<?=$wo['config']['site_url'].'/'.$wo['image']['image'];?>" alt="media" class="imagen" id="wo_zoom_product_<?php echo $wo['image']['id'];?>">
		</div>
	</div>
</div>
<script>

  var script = document.createElement('script');
  script.id = "scripts_page2";
  script.src = "<?php echo $wo['config']['theme_url'];?>/javascript/jquery-ui.min.js?version=<?php echo $wo['config']['version']; ?>";
  var targetElement = document.getElementById('var_data_script');
  targetElement.parentNode.insertBefore(script, targetElement.nextSibling);

$(document).keydown(function(e) {
    if (e.keyCode == 27) {
        Wo_CloseLightbox();
    }   
});
function zoomin(id){
	var myImg = document.getElementById("wo_zoom_product_<?php echo $wo['image']['id'];?>");
	$(myImg).addClass("double_zoom");
	$('#draggableHelper').draggable({ cursor: "move", revert: true, disabled: false });
}
function zoomout(id){
	var myImg = document.getElementById("wo_zoom_product_<?php echo $wo['image']['id'];?>");
	$(myImg).removeClass("double_zoom");
	$('#draggableHelper').draggable({ disabled: true, revert: true });
}
</script>