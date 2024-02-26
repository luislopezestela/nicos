<?php
//if(isset($_SESSION['admin_id'])){
//	$data = new DatosAdmin();
//	$data->id = $_POST['item_updat'];
//	$data->nombre = $_POST['three'];
//	$data->ukr = DatosAdmin::poner_guion(strip_tags(htmlentities($_POST["three"])));
//	$data->precio = $_POST['four'];
//	$data->update_data_opciones_detalles();
//}

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
			if($opciones_detail->id == $_POST['dit']){
				echo json_encode(array('tipo' => 0, 'message' => Luis::lang("sin_cambios")));
			}else{
				echo json_encode(array('tipo' => 0, 'message' => Luis::lang("ya_existe_el_nombre")));
			}
			
		}elseif($_POST['itemp']){
			$prod_itd = DatosAdmin::itemview_productos($_POST['itemp']);
			$dataukr_views = DatosAdmin::poner_guion(strip_tags($prod_itd->nombre));
			

			$det = new DatosAdmin();
			$det->id = $_POST['dit'];
			$det->nombre = $prod_itd->nombre;
			$det->ukr = $det->ukr = DatosAdmin::poner_guion(strip_tags($prod_itd->nombre));
			$det->ith = $_POST['itemp'];
			$det->precio = $precios;
			$det->id_opciones_type = $item_view->id;
			$opciones_detail_b = DatosAdmin::ver_opciones_detalles_list_one_name_view_b_a($item_view->id,$dataukr_views);
			if($opciones_detail_b){
				if($opciones_detail_b->id == $_POST['dit']){
					$det->update_data_opciones_detalles_b();
					echo json_encode(array('tipo' => 0, 'message' => Luis::lang("actualizado")));
				}else{
					echo json_encode(array('tipo' => 0, 'message' => Luis::lang("ya_existe")));
				}
			}else{
				if(isset($_POST['option_pr'])=="") {
					echo json_encode(array('tipo' => 2, 'message' => Luis::lang("selecciona_si_usas_precio"), 'priv' => 4));
				}else{
					if($item_view->id_cat_add) {
						$det->cat_act = $item_view->id_cat_add;
						$det->update_data_opciones_detalles_c();
					}elseif($item_view->id_cat_sub_add) {
						$det->cat_act = $item_view->id_cat_sub_add;
						$det->update_data_opciones_detalles_c();
					}else{
						$det->update_data_opciones_detalles_b();
					}
					echo json_encode(array('tipo' => 1, 'message' => Luis::lang("datos_actualizados"), 'line' => $det->id, "active" => 0));
				}
			}
		}elseif($_POST['opcion_det']){
			$det = new DatosAdmin();
			$det->id = $_POST['dit'];
			$det->nombre = htmlentities($_POST['opcion_det']);
			$det->ukr = DatosAdmin::poner_guion(strip_tags(htmlentities($_POST["opcion_det"])));
			$det->id_opciones_type = $item_view->id;
			$det->update_data_opciones_detalles();
			echo json_encode(array('tipo' => 1, 'message' => Luis::lang("datos_actualizados"), 'line' => $det->id, "active" => 0));
		}else{
			echo json_encode(array('tipo' => 2, 'message' => Luis::lang("sin_datos")));
		}
	}else{
		echo json_encode(array('tipo' => 0, 'message' => Luis::lang("un_error_en_los_datos")));
	}
}else{
	echo json_encode(array('tipo' => 0, 'message' => Luis::lang("error_de_datos")));
}