<li class="carousel__item <?php echo $wo['active_cat']?> scategorias_<?=$wo['cat_id_produc']?>" onclick="openCategory_pos(<?=$wo['cat_id_produc']?>)">
	<span alt="<?php echo $wo['cat_nombre_producs'];?>">
		<figure class="carousel__item__image categories-g__bg bg--change" data-bg="<?php echo($wo['cat_logo_produc']) ?>" style="background-image: url(&quot;<?php echo($wo['cat_logo_produc']) ?>&quot;);"></figure>
		<div class="carousel__description">
			<h3 class="carousel__title"><?=$wo['cat_nombre_producs'];?></h3>
		</div>
	</span>
</li>