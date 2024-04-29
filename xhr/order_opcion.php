<?php 
if ($f == "order_opcion") {
	if ($s == 'document') {
		if (!empty($_POST['comprobante'])){
			$comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado', '0')->where('web', '1')->getOne(T_VENTAS);
			if (!empty($comprobante_user) && ($comprobante_user->user_id == $wo['user']['user_id'])) {
				if ($_POST['comprobante']=='boleta_simple') {
                    $cant_ventas = $db->where('documento', 'BS')->where('completado', '1')->getValue(T_VENTAS, 'COUNT(*)');
                    if($cant_ventas > 0){
                        $numeroventa="00".$cant_ventas+1;
                    }else{
                        $numeroventa="001";
                    }

                    $lastGroupNumberRow = $db->orderBy('numero_documento', 'desc')->where('documento','BS')->getOne(T_VENTAS, 'numero_documento');
                    if($lastGroupNumberRow){
                        $lastGroupNumber = $lastGroupNumberRow->numero_documento;
                    } else{
                        $lastGroupNumber = null;
                    }
                    if(!$lastGroupNumber) {
                        $nextGroupNumber = 1;
                    } else{
                        $sameIdentifierProducts = $db->where('numero_documento','')->where('documento','BS')->get(T_VENTAS);
                        if($sameIdentifierProducts) {
                            $nextGroupNumber = $sameIdentifierProducts[0]->numero_documento;
                        }else{
                            $nextGroupNumber = $lastGroupNumber + 1;
                        }
                    }
					$dataarray = array('documento' => 'BS', 'num_doc' => $numeroventa, 'numero_documento' => $nextGroupNumber);
					$dataarray_b = array('doc_order' => lui_Secure($_POST['comprobante']), 'comprobante_dni' => null);
				}elseif($_POST['comprobante']=='boleta'){
					$cant_ventas = $db->where('documento', 'B')->where('completado', '1')->getValue(T_VENTAS, 'COUNT(*)');
                    if($cant_ventas > 0){
                        $numeroventa="00".$cant_ventas+1;
                    }else{
                        $numeroventa="001";
                    }

                    $lastGroupNumberRow = $db->orderBy('numero_documento', 'desc')->where('documento','B')->getOne(T_VENTAS, 'numero_documento');
                    if($lastGroupNumberRow){
                        $lastGroupNumber = $lastGroupNumberRow->numero_documento;
                    } else{
                        $lastGroupNumber = null;
                    }
                    if(!$lastGroupNumber) {
                        $nextGroupNumber = 1;
                    } else{
                        $sameIdentifierProducts = $db->where('numero_documento','')->where('documento','B')->get(T_VENTAS);
                        if($sameIdentifierProducts) {
                            $nextGroupNumber = $sameIdentifierProducts[0]->numero_documento;
                        }else{
                            $nextGroupNumber = $lastGroupNumber + 1;
                        }
                    }

                    $dataarray = array('documento' => 'B', 'num_doc' => $numeroventa, 'numero_documento' => $nextGroupNumber,'user_document' => 'DNI','user_document_num' => null);
					$dataarray_b = array('doc_order' => lui_Secure($_POST['comprobante']), 'comprobante_dni' => null);
				}elseif($_POST['comprobante']=='factura'){
                    $cant_ventas = $db->where('documento', 'F')->where('completado', '1')->getValue(T_VENTAS, 'COUNT(*)');
                    if($cant_ventas > 0){
                        $numeroventa="00".$cant_ventas+1;
                    }else{
                        $numeroventa="001";
                    }

                    $lastGroupNumberRow = $db->orderBy('numero_documento', 'desc')->where('documento','F')->getOne(T_VENTAS, 'numero_documento');
                    if($lastGroupNumberRow){
                        $lastGroupNumber = $lastGroupNumberRow->numero_documento;
                    } else{
                        $lastGroupNumber = null;
                    }
                    if(!$lastGroupNumber) {
                        $nextGroupNumber = 1;
                    } else{
                        $sameIdentifierProducts = $db->where('numero_documento','')->where('documento','F')->get(T_VENTAS);
                        if($sameIdentifierProducts) {
                            $nextGroupNumber = $sameIdentifierProducts[0]->numero_documento;
                        }else{
                            $nextGroupNumber = $lastGroupNumber + 1;
                        }
                    }
                    $dataarray = array('documento' => 'F', 'num_doc' => $numeroventa, 'numero_documento' => $nextGroupNumber,'user_document' => 'RUC','user_document_num' => null);
					$dataarray_b = array('doc_order' => lui_Secure($_POST['comprobante']), 'comprobante_ruc' => null);
                }

				$db->where('user_id',$comprobante_user->user_id)->where('completado', '0')->update(T_VENTAS, $dataarray);
				$db->where('user_id',$comprobante_user->user_id)->update(T_USERS, $dataarray_b);


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

	if ($s == 'document_dni') {
		

		if (!empty($_POST['number'])) {
			$comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->getOne(T_USERS);
			$comprobante_user_venta = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado', '0')->where('web', '1')->getOne(T_VENTAS);

			if (!empty($comprobante_user) && ($comprobante_user->user_id == $wo['user']['user_id'])) {
				$db->where('user_id',$comprobante_user->user_id)->update(T_USERS,array('comprobante_dni' => lui_Secure($_POST['number'])));
				$db->where('user_id',$comprobante_user_venta->user_id)->update(T_VENTAS,array('user_document_num' => lui_Secure($_POST['number'])));
				$dni=$_POST['number'] ;
				if (strlen($_POST['number']) == 8) {
					$lista_personas = $db->where('dni',$dni)->getOne('personas_lista');
					if (isset($lista_personas->dni) == $_POST['number']) {
						$datos_de_persona = json_decode($lista_personas->datos);
						$estado_documento = $lista_personas->estado;
					}else{
						$token = 'apis-token-8240.fCDeH4D6LNu9YmNBnFuqBQj1zE-E9S7-';
						// Iniciar llamada a API
						$curl = curl_init();
						// Buscar dni
						curl_setopt_array($curl, array(
						  CURLOPT_URL => 'https://api.apis.net.pe/v2/reniec/dni?numero=' . $dni,
						  CURLOPT_RETURNTRANSFER => true,
						  CURLOPT_SSL_VERIFYPEER => 0,
						  CURLOPT_ENCODING => '',
						  CURLOPT_MAXREDIRS => 2,
						  CURLOPT_TIMEOUT => 0,
						  CURLOPT_FOLLOWLOCATION => true,
						  CURLOPT_CUSTOMREQUEST => 'GET',
						  CURLOPT_HTTPHEADER => array(
						    'Referer: https://apis.net.pe/consulta-dni-api',
						    'Authorization: Bearer ' . $token
						  ),
						));

						$response = curl_exec($curl);
						$datos_de_persona = json_decode($response);
						if (empty($datos_de_persona->numeroDocumento)) {
							$estado_documento = 0;
						}else{
							$estado_documento = 1;
						}
						curl_close($curl);
						$datospersona1 = array(
						'dni' => $dni,
						'datos' => $response,
						'estado' => $estado_documento
						);
						$db->insert('personas_lista',$datospersona1);
					}
				}else{
					$estado_documento = 0;
					$datos_de_persona = '';
				}

				$data['status'] = 200;
				$data['usuario'] = $datos_de_persona;
				$data['usuario_dni'] = $estado_documento;
			}
			else{
				$data['message'] = $error_icon . $wo['lang']['please_check_details'];
			}
		}
		else{
			$data['message'] = $error_icon . $wo['lang']['please_check_details'];
		}
		header("Content-type: application/json");
        echo json_encode($data);
        exit();

	}

	if ($s == 'document_ruc') {
		if (!empty($_POST['number'])) {
			$comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->getOne(T_USERS);
			$comprobante_user_venta = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado', '0')->where('web', '1')->getOne(T_VENTAS);
			if (!empty($comprobante_user) && ($comprobante_user->user_id == $wo['user']['user_id'])) {
				$db->where('user_id',$comprobante_user->user_id)->update(T_USERS,array('comprobante_ruc' => lui_Secure($_POST['number'])));
				$db->where('user_id',$comprobante_user_venta->user_id)->update(T_VENTAS,array('user_document_num' => lui_Secure($_POST['number'])));
				$ruc=$_POST['number'] ;
				if (strlen($_POST['number']) == 11) {
					$lista_personas = $db->where('ruc',$ruc)->getOne('personas_juridicas_lista');
					if (isset($lista_personas->ruc) == $_POST['number']) {
						$datos_de_persona = json_decode($lista_personas->datos);
						$estado_documento = $lista_personas->estado;
					}else{
						$token = 'apis-token-8240.fCDeH4D6LNu9YmNBnFuqBQj1zE-E9S7-';
						// Iniciar llamada a API
						$curl = curl_init();
						// Buscar ruc sunat
						curl_setopt_array($curl, array(
						  CURLOPT_URL => 'https://api.apis.net.pe/v2/sunat/ruc?numero=' . $ruc,
						  CURLOPT_RETURNTRANSFER => true,
						  CURLOPT_SSL_VERIFYPEER => 0,
						  CURLOPT_ENCODING => '',
						  CURLOPT_MAXREDIRS => 10,
						  CURLOPT_TIMEOUT => 0,
						  CURLOPT_FOLLOWLOCATION => true,
						  CURLOPT_CUSTOMREQUEST => 'GET',
						  CURLOPT_HTTPHEADER => array(
						    'Referer: http://apis.net.pe/api-ruc',
						    'Authorization: Bearer ' . $token
						  ),
						));

						$response = curl_exec($curl);
						$datos_de_persona = json_decode($response);
						if (empty($datos_de_persona->numeroDocumento)) {
							$estado_documento = 0;
						}else{
							$estado_documento = 1;
						}
						curl_close($curl);
						$datospersona1 = array(
						'ruc' => $ruc,
						'datos' => $response,
						'estado' => $estado_documento
						);
						$db->insert('personas_juridicas_lista',$datospersona1);
					}
				}else{
					$estado_documento = 0;
					$datos_de_persona = '';
				}
				$data['status'] = 200;
				$data['usuario'] = $datos_de_persona;
				$data['usuario_dni'] = $estado_documento;
			}
			else{
				$data['message'] = $error_icon . $wo['lang']['please_check_details'];
			}
		}
		else{
			$data['message'] = $error_icon . $wo['lang']['please_check_details'];
		}
		header("Content-type: application/json");
        echo json_encode($data);
        exit();
	}

	if ($s == 'opcion_compra') {
		if (!empty($_POST['modo_compra'])) {
			$comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->getOne(T_USERS);
			$comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))
                               ->where('completado','0')
                               ->where('web',1)
                               ->getOne(T_VENTAS);

			if (!empty($comprobante_user) && ($comprobante_user->user_id == $wo['user']['user_id'] || IsAdmin())) {
				
				if ($_POST['modo_compra']=='tienda') {
					$dataarray = array('opcion_de_compra' => lui_Secure($_POST['modo_compra']), 'direccion_envio' => null,'direccion_delivery' => null,'add_direccion' => 0,'add_direccion_envio' => 0);
					$db->where('user_id',$comprobante_user->user_id)->update(T_USERS,$dataarray);
					$dataarraydPLc = array('datos_envios_id' => 0,'dirección_id' => 0);
					if (!empty($comprapendiente)) {
						$db->where('id',$comprapendiente->id)->update(T_VENTAS, $dataarraydPLc);
					}
				}elseif($_POST['modo_compra']=='delivery'){
					$dataarray = array('opcion_de_compra' => lui_Secure($_POST['modo_compra']), 'sucursal_entrega' => null,'direccion_envio' => null,'add_direccion_envio' => 0);
					$db->where('user_id',$comprobante_user->user_id)->update(T_USERS,$dataarray);
					$dataarraydPLc = array('sucursal_entrega' => 0,'datos_envios_id' => 0);
					if (!empty($comprapendiente)) {
						$db->where('id',$comprapendiente->id)->update(T_VENTAS, $dataarraydPLc);
					}
				}elseif($_POST['modo_compra']=='envios'){
					$dataarray = array('opcion_de_compra' => lui_Secure($_POST['modo_compra']), 'sucursal_entrega' => null,'direccion_delivery' => null,'add_direccion' => 0);
					$db->where('user_id',$comprobante_user->user_id)->update(T_USERS,$dataarray);
					$dataarraydPLc = array('sucursal_entrega' => 0,'dirección_id' => 0);
					if (!empty($comprapendiente)) {
						$db->where('id',$comprapendiente->id)->update(T_VENTAS, $dataarraydPLc);
					}
				}
		        
				$data['status'] = 200;
				$data['url'] = $wo['config']['site_url'].'/setting/'.$wo['user']['username'].'/addresses';
				if (!empty($_SESSION['messages_carito'])) {
	            	unset($_SESSION['messages_carito']);
	            }
			}
			else{
				$data['message'] = $error_icon . $wo['lang']['please_check_details'];
				$_SESSION['messages_carito'] = $data['message'];
			}
		}
		else{
			$data['message'] = $error_icon . $wo['lang']['please_check_details'];
			$_SESSION['messages_carito'] = $data['message'];
		}
	}

	if ($s == 'sucursalesdata') {
		if (!empty($_POST['sucursal'])) {
			$comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->getOne(T_USERS);
			$comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))
                               ->where('completado','0')
                               ->where('web',1)
                               ->getOne(T_VENTAS);

			if (!empty($comprobante_user) && ($comprobante_user->user_id == $wo['user']['user_id'])) {
				$db->where('user_id',$comprobante_user->user_id)->update(T_USERS,array('sucursal_entrega' => lui_Secure($_POST['sucursal'])));
				$dataarraydPLc = array('sucursal_entrega' => lui_Secure($_POST['sucursal']));
		        // Verificar si hay una compra pendiente
		        if (!empty($comprapendiente)) {
					$db->where('id',$comprapendiente->id)->update(T_VENTAS, $dataarraydPLc);
				}

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
				$db->where('user_id',$comprobante_user->user_id)->update(T_USERS,array('direccion_delivery' => lui_Secure($_POST['direccion'])));


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

	if ($s == 'direccionesdata_envios') {
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

	if($s == 'mode_pay'){
		if(!empty($_POST['pay_mod'])){
			$coe_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->getOne(T_USERS);
			$db->where('user_id',$coe_user->user_id)->update(T_USERS,array('mode_pay' => lui_Secure($_POST['pay_mod'])));
		}else{
			$data['message'] = $error_icon . $wo['lang']['please_check_details'];
		}
	}
	if($s == 'pays_vie'){
		$html = '';
		$couser = $db->where('user_id',lui_Secure($wo['user']['user_id']))->getOne(T_USERS);
		$wo['total_bux'] = $_GET['tols'];
		if($couser->mode_pay==0) {
		}elseif($couser->mode_pay==1) {
			$html = lui_LoadPage('checkout/pay_one');
		}elseif($couser->mode_pay==2) {
			$html = lui_LoadPage('checkout/pay_two');
		}elseif($couser->mode_pay==3) {
			$html = lui_LoadPage('checkout/pay_three');
		}elseif($couser->mode_pay==4) {
			$html = lui_LoadPage('checkout/pay_four');
		}elseif($couser->mode_pay==5) {
			$html = lui_LoadPage('checkout/pay_five');
		}
	    echo $html;
	}
}
 ?>
 
 