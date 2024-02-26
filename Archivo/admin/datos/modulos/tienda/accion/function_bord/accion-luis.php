<?php

if($_POST['cats']==""){}else{
	$catsd=DatosAdmin::poridDesubCategorias($_POST['cats']);
	if(count($catsd)>0):?>
		<option value=""></option>
		<option value="">Ninguno</option>
		<?php foreach($catsd as $c):?>
			<option value="<?=$c->id;?>"><?=html_entity_decode($c->nombre);?></option>
		<?php endforeach; ?>
	<?php endif;
} ?>