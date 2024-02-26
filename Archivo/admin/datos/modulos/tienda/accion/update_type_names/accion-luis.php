<?php
if($_POST['sub'] && $_POST['cat']){
	$cat_a = DatosAdmin::sub_categoria_getById($_POST['sub']);
	$det = new DatosAdmin();
	$det->nombre = htmlentities($_POST['dat_name']);
	$det->id = $_POST['dat'];
	$det->sub = $_POST['sub'];
	$det->update_options_type_c();
	$compadd = DatosAdmin::ver_detalles_opciones_b($_POST['dat']);
	if($compadd){
		if ($compadd->cat_act == $_POST['sub']) {
			$det->eliminar_cambios_b();
		}elseif ($compadd->cat_act == null) {
			$det->eliminar_cambios_b();
		}else{
			$det->eliminar_cambios_c();
		}
	}
	$itemsviews = "";
	$items_for_cat = DatosAdmin::MostrarItems_cartas_opciones_sub($cat_a->id);
	
	$itemsviews .= '<option value=""></option>';
	$itemsviews .= '<option value="">Ninguno</option>';
	foreach($items_for_cat as $c) {
		$itemsviews .= '<option value="'.$c->id.'">'.html_entity_decode($c->nombre).'</option>';
	}
	$opt_item_count = DatosAdmin::ver_detalles_opciones($_POST['dat']);
	$countdatasitm = count($opt_item_count);
	echo json_encode(array('tipo' => 1, 'message' => Luis::lang("guardado"),'values' => html_entity_decode($cat_a->nombre), 'options' => $itemsviews,"play_data" => $countdatasitm));
}elseif(isset($_POST['cat'])){
	$itemsviews = '';
	$cat_a = DatosAdmin::getById_categoria($_POST['cat']);
	$det = new DatosAdmin();
	$det->id = $_POST['dat'];
	$det->cat = $_POST['cat'];
	$det->update_options_type_b();

	$compadd = DatosAdmin::ver_detalles_opciones_b($_POST['dat']);
	if($compadd){
		if ($compadd->cat_act == $_POST['cat']) {
			$det->eliminar_cambios_b();
		}elseif ($compadd->cat_act == null) {
			$det->eliminar_cambios_b();
		}else{
			$det->eliminar_cambios_c();
		}
	}
	$items_for_cat = DatosAdmin::MostrarItems_cartas_opciones($cat_a->id);
	

	$itemsviews .= '<option value=""></option>';
	$itemsviews .= '<option value="">Ninguno</option>';
	foreach($items_for_cat as $c) {
		$itemsviews .= '<option value="'.$c->id.'">'.html_entity_decode($c->nombre).'</option>';
	}
	
	$opt_item_count = DatosAdmin::ver_detalles_opciones($_POST['dat']);
	$countdatasitm = count($opt_item_count);
	echo json_encode(array('tipo' => 1, 'message' => Luis::lang("guardado"), 'values' => html_entity_decode($cat_a->nombre), 'options' => $itemsviews ,"play_data" => $countdatasitm));
}elseif($_POST['dat_name']){
	$det = new DatosAdmin();
	$det->nombre = htmlentities($_POST['dat_name']);
	$det->id = $_POST['dat'];
	$det->update_options_type();
	$det->eliminar_cambios();
	$opt_item_count = DatosAdmin::ver_detalles_opciones($_POST['dat']);
	$countdatasitm = count($opt_item_count);
	echo json_encode(array('tipo' => 1, 'message' => Luis::lang("guardado"), 'values' => $_POST['dat_name'], 'options' => false,"play_data" => $countdatasitm));
}else{
	$opt_item_count = DatosAdmin::ver_detalles_opciones($_POST['dat']);
	$countdatasitm = count($opt_item_count);
	echo json_encode(array('tipo' => 0, 'message' => Luis::lang("el_campo_esta_vacio"), 'options' => false,"play_data" => $countdatasitm));
}


