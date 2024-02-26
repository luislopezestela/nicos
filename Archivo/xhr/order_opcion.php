<?php 
if ($f == "order_opcion") {
	if ($s == 'document') {
		if (!empty($_POST['comprobante'])) {
			$comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->getOne(T_USERS);

			if (!empty($comprobante_user) && ($comprobante_user->user_id == $wo['user']['user_id'] || IsAdmin())) {

				if ($_POST['comprobante']=='boleta') {
					$dataarray = array('doc_order' => lui_Secure($_POST['comprobante']), 'comprobante_ruc' => null);
				}elseif($_POST['comprobante']=='factura'){
					$dataarray = array('doc_order' => lui_Secure($_POST['comprobante']), 'comprobante_dni' => null);
				}
				$db->where('user_id',$comprobante_user->user_id)->update(T_USERS, $dataarray);


				$data['status'] = 200;
				$data['url'] = $wo['config']['site_url'].'/setting/'.$wo['user']['username'].'/addresses';
				$data['message'] = $wo['lang']['address_edited'];
			}
			else{
				$data['message'] = $error_icon . $wo['lang']['please_check_details'];
			}
		}
		else{
			$data['message'] = $error_icon . $wo['lang']['please_check_details'];
		}
	}

	if ($s == 'document_dni') {
		if (!empty($_POST['number'])) {
			$comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->getOne(T_USERS);

			if (!empty($comprobante_user) && ($comprobante_user->user_id == $wo['user']['user_id'] || IsAdmin())) {
				$db->where('user_id',$comprobante_user->user_id)->update(T_USERS,array('comprobante_dni' => lui_Secure($_POST['number'])));


				$data['status'] = 200;
				$data['url'] = $wo['config']['site_url'].'/setting/'.$wo['user']['username'].'/addresses';
				$data['message'] = $wo['lang']['address_edited'];
			}
			else{
				$data['message'] = $error_icon . $wo['lang']['please_check_details'];
			}
		}
		else{
			$data['message'] = $error_icon . $wo['lang']['please_check_details'];
		}
	}

	if ($s == 'document_ruc') {
		if (!empty($_POST['number'])) {
			$comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->getOne(T_USERS);

			if (!empty($comprobante_user) && ($comprobante_user->user_id == $wo['user']['user_id'] || IsAdmin())) {
				$db->where('user_id',$comprobante_user->user_id)->update(T_USERS,array('comprobante_ruc' => lui_Secure($_POST['number'])));


				$data['status'] = 200;
				$data['url'] = $wo['config']['site_url'].'/setting/'.$wo['user']['username'].'/addresses';
				$data['message'] = $wo['lang']['address_edited'];
			}
			else{
				$data['message'] = $error_icon . $wo['lang']['please_check_details'];
			}
		}
		else{
			$data['message'] = $error_icon . $wo['lang']['please_check_details'];
		}
	}

	if ($s == 'opcion_compra') {
		if (!empty($_POST['modo_compra'])) {
			$comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->getOne(T_USERS);

			if (!empty($comprobante_user) && ($comprobante_user->user_id == $wo['user']['user_id'] || IsAdmin())) {

				if ($_POST['modo_compra']=='tienda') {
					$dataarray = array('opcion_de_compra' => lui_Secure($_POST['modo_compra']), 'direccion_envio' => null);
				}elseif($_POST['modo_compra']=='delivery'){
					$dataarray = array('opcion_de_compra' => lui_Secure($_POST['modo_compra']), 'sucursal_entrega' => null);
				}

				$db->where('user_id',$comprobante_user->user_id)->update(T_USERS,$dataarray);


				$data['status'] = 200;
				$data['url'] = $wo['config']['site_url'].'/setting/'.$wo['user']['username'].'/addresses';
				$data['message'] = $wo['lang']['address_edited'];
			}
			else{
				$data['message'] = $error_icon . $wo['lang']['please_check_details'];
			}
		}
		else{
			$data['message'] = $error_icon . $wo['lang']['please_check_details'];
		}
	}

	if ($s == 'sucursalesdata') {
		if (!empty($_POST['sucursal'])) {
			$comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->getOne(T_USERS);

			if (!empty($comprobante_user) && ($comprobante_user->user_id == $wo['user']['user_id'] || IsAdmin())) {
				$db->where('user_id',$comprobante_user->user_id)->update(T_USERS,array('sucursal_entrega' => lui_Secure($_POST['sucursal'])));


				$data['status'] = 200;
				$data['url'] = $wo['config']['site_url'].'/setting/'.$wo['user']['username'].'/addresses';
				$data['message'] = $wo['lang']['address_edited'];
			}
			else{
				$data['message'] = $error_icon . $wo['lang']['please_check_details'];
			}
		}
		else{
			$data['message'] = $error_icon . $wo['lang']['please_check_details'];
		}
	}

	if ($s == 'direccionesdata') {
		if (!empty($_POST['direccion'])) {
			$comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->getOne(T_USERS);

			if (!empty($comprobante_user) && ($comprobante_user->user_id == $wo['user']['user_id'] || IsAdmin())) {
				$db->where('user_id',$comprobante_user->user_id)->update(T_USERS,array('direccion_envio' => lui_Secure($_POST['direccion'])));


				$data['status'] = 200;
				$data['url'] = $wo['config']['site_url'].'/setting/'.$wo['user']['username'].'/addresses';
				$data['message'] = $wo['lang']['address_edited'];
			}
			else{
				$data['message'] = $error_icon . $wo['lang']['please_check_details'];
			}
		}
		else{
			$data['message'] = $error_icon . $wo['lang']['please_check_details'];
		}
	}
}
 ?>
 
 