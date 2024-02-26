<div class="ch_main_items">
	<div class="prod_img">
		<a href="<?php echo $wo['product']['url'];?>" data-ajax="?link1=post&id=<?php echo $wo['product']['seo_id']?>">
			<img src="<?php echo $wo['product']['images'][0]['image']?>">
		</a>

		<div class="quantity">
			<div class="ch_qty_toggle">
				<div class="value-button" onclick="decreaseValueMax<?php echo $wo['product']['id'];?>()">
					<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M19,13H5V11H19V13Z"></path></svg>
				</div>
				<input type="number" id="qty_<?php echo $wo['product']['id'];?>" name="" max="$wo['product']['units']" min="1" onchange="ChangeQty(this,'<?php echo $wo['product']['id'];?>')" value="<?php echo $wo['item']->units; ?>">
				<div class="value-button" onclick="increaseValueMax<?php echo $wo['product']['id'];?>()">
					<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z"></path></svg>
				</div>
			</div>
		</div>
			
		
	</div>
    <div class="prod_info">
        <h4><a href="<?php echo $wo['product']['url'];?>" data-ajax="?link1=post&id=<?php echo $wo['product']['seo_id']?>"><?php echo $wo['product']['name'];?></a></h4>
		<p><a href="<?php echo $wo['product']['user_data']['url'];?>" data-ajax="?link1=timeline&u=<?php echo $wo['product']['user_data']['username'];?>"><?php echo $wo['product']['user_data']['name'];?></a></p>
        <div >
			<div><?php echo (!empty($wo['currencies'][$wo['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];?><?php echo $wo['product']['price']?></div>
		</div>
    </div>
	<div class="closed" onclick="RemoveProductFromCart('<?php echo $wo['product']['id'];?>');LoadCheckout();">&#10005;</div>

	<script>
		function increaseValueMax<?php echo $wo['product']['id'];?>() {
			var value = parseInt(document.getElementById('qty_<?php echo $wo['product']['id'];?>').value, 10);
			value = isNaN(value) ? 0 : value;
			value++;
			document.getElementById('qty_<?php echo $wo['product']['id'];?>').value = value;
			ChangeQty('#qty_<?php echo $wo['product']['id'];?>','<?php echo $wo['product']['id'];?>');
		}
		function decreaseValueMax<?php echo $wo['product']['id'];?>() {
			var value = parseInt(document.getElementById('qty_<?php echo $wo['product']['id'];?>').value, 10);
			value = isNaN(value) ? 0 : value;
			value < 1 ? value = 1 : '';
			value--;
			document.getElementById('qty_<?php echo $wo['product']['id'];?>').value = value;
			ChangeQty('#qty_<?php echo $wo['product']['id'];?>','<?php echo $wo['product']['id'];?>');
		}
	</script>
</div>