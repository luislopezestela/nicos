<div class="col-sm-3 ch_main_items">
	<div class="prod_img">
		<a href="<?php echo $wo['order']->product['url'] ?>" data-ajax="?link1=item&items=<?php echo $wo['order']->product['seo_id']?>">
			<img src="<?php echo $wo['imagen_producto']; ?>">
		</a>
		<div><?php echo (!empty($wo['currencies'][$wo['order']->product['currency']]['symbol'])) ? $wo['currencies'][$wo['order']->product['currency']]['symbol'] : $wo['config']['classified_currency_s'];?><?php echo $wo['order']->precio?></div>
	</div>
    <div class="prod_info">
        <h4><a href="<?php echo $wo['order']->product['url'] ?>" data-ajax="?link1=item&items=<?php echo $wo['order']->product['seo_id']?>"><?php echo $wo['order']->product['name'];?></a></h4>
        <div class="price-wrap">
			<div class="quantity">
				Cantidad: <?php echo $wo['cantidad_productos'] ?>
			</div>
		</div>
    </div>
</div>