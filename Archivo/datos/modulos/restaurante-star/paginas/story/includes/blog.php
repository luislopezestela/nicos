<?php if(!empty($wo['story']['blog_id'])) { ?>
	<div class="">
	<div class="wo_post_prod_img" id="fullsizeimg">
		<a href="<?php echo $wo['story']['blog']['url'];?>">
				<img class="wo_single_proimg image-file pointer" src="<?php echo $wo['story']['blog']['image_blogs'];?>" alt="<?php echo $wo['story']['blog']['title'];?>"/>
		</a>
	</div>
	<div class="produc_info">
		<div class="wo_store_post_btns">
			<span class="contact btn blogs_btn">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20,11H4V8H20M20,15H13V13H20M20,19H13V17H20M11,19H4V13H11M20.33,4.67L18.67,3L17,4.67L15.33,3L13.67,4.67L12,3L10.33,4.67L8.67,3L7,4.67L5.33,3L3.67,4.67L2,3V19A2,2 0 0,0 4,21H20A2,2 0 0,0 22,19V3L20.33,4.67Z"></path></svg>
			</span>
		</div>

		<div class="producto_stock product-title">
			<span>Blog</span>
		</div>
		<div class="blog-title">
			<span><?php echo $wo['story']['blog']['title'];?></span>
		</div>
	</div>
	</div>
<?php } ?>