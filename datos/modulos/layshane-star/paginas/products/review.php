<div class="review_list review_<?php echo $wo['review']->id ?>" id="<?php echo $wo['review']->id ?>" product_id="<?php echo $wo['review']->product_id ?>">
	<div class="review_list_head">
		<div class="review-meta-desc">
			<div class="reviewMeta--author-avatar">
				<img src="<?php echo $wo['review']->user_data['avatar'] ?>" alt="">
			</div>
			<div class="reviewMeta--author-text">
				<div><a class="linkk" href="<?php echo $wo['review']->user_data['url'] ?>" data-load="{{username}}"><?php echo $wo['review']->user_data['name'] ?></a></div>
				<small><?php echo lui_Time_Elapsed_String($wo['review']->time) ?></small>
			</div>
		</div>
		<div class="prod_review-meta">
			<div class="Review-rating <?php echo $wo['review_class']; ?>"><?php echo $wo['review_stars'] ?></div>
		</div>
	</div>
	<p class="prod_review-desc"><?php echo $wo['review']->review ?></p>
	<?php if (!empty($wo['review']->images)) { ?>
	<div class="create_prod_images">
		<div class="productimage-holder">
			<div class="row photos">
				<?php foreach ($wo['review']->images as $key => $value) { ?>
					<div class="col-sm-6 col-md-4 col-lg-3 item"><a href="<?php echo($value['image']) ?>" data-lightbox="photos" target="_blank"><img src="<?php echo($value['image']) ?>"></a></div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php } ?>
</div>