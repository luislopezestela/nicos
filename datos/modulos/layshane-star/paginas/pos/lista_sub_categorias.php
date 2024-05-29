<li onclick="openCategory_sub_pos(<?=$wo['categoria_selecc'];?>,<?=$wo['category_sub']['id'];?>)" class="carousel__item subcategorias_<?=$wo['category_sub']['id'];?> <?php echo $wo['active_sub_cat']?>">
	<span alt="<?php echo $wo['category_sub']['lang'];?>">
		<figure class="carousel__item__image categories-g__bg bg--change" data-bg="<?php echo($wo['cat_logo_producs']) ?>" style="background-image: url(&quot;<?php echo($wo['cat_logo_producs']) ?>&quot;);"></figure>

		<div class="carousel__description">
			<h3 class="carousel__title"><?php echo $wo['category_sub']['lang'];?></h3>
		</div>
	</span>
</li>