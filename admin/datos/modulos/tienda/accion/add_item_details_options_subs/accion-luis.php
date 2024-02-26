<?php
if(isset($_POST['option_pr'])){
	$precios = $_POST['option_pr'];
}else{
	$precios = 0;
}
if($_POST['type_option']){
	$item_view = DatosAdmin::porID_opciones_type($_POST['type_option']);
	if($item_view){
		$opciones_detail = DatosAdmin::ver_opciones_detalles_list_one_name_view($item_view->id,$_POST['opcion_det']);
		if($opciones_detail){
			echo json_encode(array('tipo' => 0, 'message' => Luis::lang("ya_existe_el_nombre")));
		}elseif($_POST['itemp']){
			$prod_itd = DatosAdmin::itemview_productos($_POST['itemp']);
			$dataukr_views = DatosAdmin::poner_guion(strip_tags($prod_itd->nombre));
			$opciones_detail_b = DatosAdmin::ver_opciones_detalles_list_one_name_view_b($item_view->id,$dataukr_views);
			if($opciones_detail_b){
				echo json_encode(array('tipo' => 0, 'message' => Luis::lang("ya_existe_el_nombre")));
			}else{
				$det = new DatosAdmin();
				$det->nombre = $prod_itd->nombre;
				$det->ukr = $det->ukr = DatosAdmin::poner_guion(strip_tags($prod_itd->nombre));
				$det->ith = $_POST['itemp'];
				$det->precio = $precios;
				$det->id_opciones_type = $item_view->id;
				$detalles_opciones = DatosAdmin::ver_detalles_opciones($item_view->id);
				
				if(count($detalles_opciones)==0){
					if(isset($_POST['option_pr'])=="") {
						echo json_encode(array('tipo' => 2, 'message' => Luis::lang("selecciona_si_usas_precio"), 'priv' => 4));
					}else{
						if($item_view->id_cat_add) {
							$det->cat_act = $item_view->id_cat_add;
							$s=$det->add_opciones_detalle_c();
						}elseif($item_view->id_cat_sub_add) {
							$det->cat_act = $item_view->id_cat_sub_add;
							$s=$det->add_opciones_detalle_c();
						}else{
							$s=$det->add_opciones_detalle_b();
						}
						
						DatosAdmin::options_noes_principal($item_view->id);
						DatosAdmin::options_aser_principal($s[1]);
						echo json_encode(array('tipo' => 1, 'message' => Luis::lang("agregado_con_exito"), 'line' => $s[1], "active" => 1));
					}
					
				}else{
				 	if(isset($_POST['option_pr'])=="") {
						echo json_encode(array('tipo' => 2, 'message' => Luis::lang("selecciona_si_usas_precio"), 'priv' => 4));
					}else{
						if($item_view->id_cat_add) {
							$det->cat_act = $item_view->id_cat_add;
							$s=$det->add_opciones_detalle_c();
						}elseif($item_view->id_cat_sub_add) {
							$det->cat_act = $item_view->id_cat_sub_add;
							$s=$det->add_opciones_detalle_c();
						}else{
							$s=$det->add_opciones_detalle_b();
						}
						
						echo json_encode(array('tipo' => 1, 'message' => Luis::lang("agregado_con_exito"), 'line' => $s[1], "active" => 0));
					}
				 	
				}
			}
		}elseif($_POST['opcion_det']){
			$det = new DatosAdmin();
			$det->nombre = htmlentities($_POST['opcion_det']);
			$det->ukr = DatosAdmin::poner_guion(strip_tags(htmlentities($_POST["opcion_det"])));
			$det->id_opciones_type = $item_view->id;
			$s=$det->add_opciones_detalle();
			$detalles_opciones = DatosAdmin::ver_detalles_opciones($item_view->id);
			if(count($detalles_opciones)==1){
			 	DatosAdmin::options_noes_principal($item_view->id);
			 	DatosAdmin::options_aser_principal($s[1]);
			 	echo json_encode(array('tipo' => 1, 'message' => Luis::lang("agregado_con_exito"), 'line' => $s[1], "active" => 1));
			 }else{
			 	echo json_encode(array('tipo' => 1, 'message' => Luis::lang("agregado_con_exito"), 'line' => $s[1], "active" => 0));
			 }
		}else{
			echo json_encode(array('tipo' => 2, 'message' => Luis::lang("sin_datos")));
		}
	}else{
		echo json_encode(array('tipo' => 0, 'message' => Luis::lang("un_error_en_los_datos")));
	}
}else{
	echo json_encode(array('tipo' => 0, 'message' => Luis::lang("error_de_datos")));
}