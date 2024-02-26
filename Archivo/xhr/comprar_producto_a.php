<?php 
if ($f == "comprar_producto_a") {

	if ($s == 'new_compras'){
		$comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->getOne("compras");
		if($comprapendiente) {
            $query  = mysqli_query($sqlConnect, "INSERT INTO compras (`user_id`,`time`) VALUES ('".$wo['user']['user_id']."','".time()."') ");
                if ($query) {
                    $data = array(
                        'status' => 200
                    );
                } else {
                    $data['status']  = 400;
                    $data['message'] = 'Por favor comprueba tus detalles';
                }

		}else{
            $data['status']  = 400;
            $data['message'] = 'Por favor comprueba tus detalles';
		}

        header("Content-type: application/json");
        echo json_encode($data);
        exit();
	}
    if ($s == 'select_proveedor'){
        $comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->getOne(T_COMPRAS);
        if($comprapendiente) {
            $comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->getOne(T_COMPRAS);
            $dataarray = array('proveedor' => $_POST['prov'],'numero_documento' => null,'proveedor_sucursal' => null);
            $db->where('user_id',$comprobante_user->user_id)->where('completado', '0')->update(T_COMPRAS, $dataarray);
                
            $data['status'] = 200;
            $data['message'] = '';
        }else{
            $data['status']  = 400;
            $data['message'] = 'Por favor comprueba tus detalles';
        }

        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'select_proveedor_direccion'){
        $comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->getOne(T_COMPRAS);
        if($comprapendiente) {
            $comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->getOne(T_COMPRAS);
            $dataarray = array('proveedor_sucursal' => $_POST['prov']);
            $db->where('user_id',$comprobante_user->user_id)->where('completado', '0')->update(T_COMPRAS, $dataarray);
                
            $data['status'] = 200;
            $data['message'] = '';
        }else{
            $data['status']  = 400;
            $data['message'] = 'Por favor comprueba tus detalles';
        }

        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'add_number_document'){
        $comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->getOne(T_COMPRAS);
        if($comprapendiente) {
            $comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->getOne(T_COMPRAS);
            $dataarray = array('numero_documento' => $_POST['docnum']);
            $db->where('user_id',$comprobante_user->user_id)->where('completado', '0')->update(T_COMPRAS, $dataarray);
                
            $data['status'] = 200;
            $data['message'] = '';
        }else{
            $data['status']  = 400;
            $data['message'] = 'Por favor comprueba tus detalles';
        }

        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'agregar_guia'){
        $comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->getOne(T_COMPRAS);
        if($comprapendiente) {
            $comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->getOne(T_COMPRAS);
            $dataarray = array('guia' => $_POST['guia'],'numero_guia' => null);
            $db->where('user_id',$comprobante_user->user_id)->where('completado', '0')->update(T_COMPRAS, $dataarray);
                
            $data['status'] = 200;
            $data['message'] = '';
        }else{
            $data['status']  = 400;
            $data['message'] = 'Por favor comprueba tus detalles';
        }

        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'add_number_guia_remicion'){
        $comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->getOne(T_COMPRAS);
        if($comprapendiente) {
            $comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->getOne(T_COMPRAS);
            $dataarray = array('numero_guia' => $_POST['docnum']);
            $db->where('user_id',$comprobante_user->user_id)->where('completado', '0')->update(T_COMPRAS, $dataarray);
                
            $data['status'] = 200;
            $data['message'] = '';
        }else{
            $data['status']  = 400;
            $data['message'] = 'Por favor comprueba tus detalles';
        }

        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }



	if ($s == 'document') {
		if (!empty($_POST['comprobante'])){
			$comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->getOne(T_COMPRAS);

			if (!empty($comprobante_user) && ($comprobante_user->user_id == $wo['user']['user_id'] || IsAdmin())) {
				if ($_POST['comprobante']=='boleta_simple') {
                    $cant_ventas = $db->where('documento', 'BS')->where('completado', '1')->getValue(T_COMPRAS, 'COUNT(*)');
                    if($cant_ventas > 0){
                        $numeroventa="00".$cant_ventas+1;
                    }else{
                        $numeroventa="001";
                    }
					$dataarray = array('documento' => 'BS', 'num_doc' => $numeroventa);
				}elseif($_POST['comprobante']=='boleta'){
					$cant_ventas = $db->where('documento', 'B')->where('completado', '1')->getValue(T_COMPRAS, 'COUNT(*)');
                    if($cant_ventas > 0){
                        $numeroventa="00".$cant_ventas+1;
                    }else{
                        $numeroventa="001";
                    }
                    $dataarray = array('documento' => 'B', 'num_doc' => $numeroventa);
				}elseif($_POST['comprobante']=='factura'){
                    $cant_ventas = $db->where('documento', 'F')->where('completado', '1')->getValue(T_COMPRAS, 'COUNT(*)');
                    if($cant_ventas > 0){
                        $numeroventa="00".$cant_ventas+1;
                    }else{
                        $numeroventa="001";
                    }
                    $dataarray = array('documento' => 'F', 'num_doc' => $numeroventa);
                }

				$db->where('user_id',$comprobante_user->user_id)->where('completado', '0')->update('compras', $dataarray);


				$data['status'] = 200;
				$data['message'] = '';
                $data['num_doc'] = $numeroventa;
			}else{
				$data['message'] = $error_icon . $wo['lang']['please_check_details'];
			}
		}
		else{
			$data['message'] = $error_icon . $wo['lang']['please_check_details'];
		}
        header("Content-type: application/json");
        echo json_encode($data);
	}






}
 ?>
 
 