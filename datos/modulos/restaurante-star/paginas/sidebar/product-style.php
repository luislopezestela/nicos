<div class="wow_side_prods_prnt">
	<div class="wow_side_prods" id="product_<?php echo $wo['product']['id'];?>">
		<a href="<?php echo $wo['product']['url'];?>" data-ajax="?link1=post&id=<?php echo $wo['product']['seo_id'];?>">
			<div class="avatar">
				<img src="<?php echo $wo['product']['images'][0]['image_org'];?>" alt="<?php echo $wo['product']['name']; ?>" />
			</div>
			<div class="produc_info">
				<span title="<?php echo $wo['product']['name']; ?>"><?php echo $wo['product']['name']; ?></span>
				<h4><?php echo (!empty($wo['currencies'][$wo['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];?><?php echo $wo['product']['price_format']; ?></h4>
			</div>
		</a>
	</div>
</div>