<?php
if($_POST['item']==""){}else{
	$items_for_cat = DatosAdmin::MostrarItems_cartas_opciones($_POST['item']);
	if(count($items_for_cat)>0):?>
		<option value=""></option>
		<option value="">Ninguno</option>
		<?php foreach($items_for_cat as $c):?>
			<option value="<?=$c->id;?>"><?=html_entity_decode($c->nombre);?></option>
		<?php endforeach; ?>
	<?php endif;
} ?>