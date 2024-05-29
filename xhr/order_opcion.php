<?php 
if ($f == "order_opcion") {
	if ($s == 'document') {
		if (!empty($_POST['comprobante'])){
			$comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado', '0')->where('web', '1')->getOne(T_VENTAS);
			if (!empty($comprobante_user) && ($comprobante_user->user_id == $wo['user']['user_id'])) {
				if ($_POST['comprobante']=='boleta_simple') {
					$dataarray = array('documento' => 'BS');
					$dataarray_b = array('doc_order' => lui_Secure($_POST['comprobante']), 'comprobante_dni' => null);
				}elseif($_POST['comprobante']=='boleta'){
                    $dataarray = array('documento' => 'B', 'user_document' => 'DNI','user_document_num' => null);
					$dataarray_b = array('doc_order' => lui_Secure($_POST['comprobante']), 'comprobante_dni' => null);
				}elseif($_POST['comprobante']=='factura'){
                    $dataarray = array('documento' => 'F', 'user_document' => 'RUC','user_document_num' => null);
					$dataarray_b = array('doc_order' => lui_Secure($_POST['comprobante']), 'comprobante_ruc' => null);
                }
				$db->where('user_id',$comprobante_user->user_id)->where('completado', '0')->update(T_VENTAS, $dataarray);
				$db->where('user_id',$comprobante_user->user_id)->update(T_USERS, $dataarray_b);
				$data['status'] = 200;
				$data['message'] = '';
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

	if ($s == 'document_pos_num') {
	    if (!empty($_POST['comprobante'])) {
	        $comprobante_users = $db->where('id_del_vendedor', lui_Secure($wo['user']['user_id']))
	                                ->where('estado_venta', '3')
	                                ->getOne(T_VENTAS);
	        if ($comprobante_users) {
	            if (!empty($_POST['hash_id'])) {
	                if ($_POST['comprobante'] == 'ND') {
	                    $dataarray = array(
	                        'user_document' => NULL
	                    );
	                    $hash_orden_p = $_POST['hash_id'];
                        $db->where('hash_id', $hash_orden_p)
                           ->where('id_del_vendedor', lui_Secure($wo['user']['user_id']))
                           ->where('estado_venta', '3')
                           ->update(T_VENTAS, $dataarray);

                        $data['status'] = 200;
                        $data['message'] = '';
	                } elseif ($_POST['comprobante'] == 'DNI') {
	                    $dataarray = array(
	                        'user_document' => 'DNI'
	                    );
	                    $hash_orden_p = $_POST['hash_id'];
                        $db->where('hash_id', $hash_orden_p)
                           ->where('id_del_vendedor', lui_Secure($wo['user']['user_id']))
                           ->where('estado_venta', '3')
                           ->update(T_VENTAS, $dataarray);

                        $data['status'] = 200;
                        $data['message'] = '';
	                } elseif ($_POST['comprobante'] == 'RUC') {
	                    $dataarray = array(
	                        'user_document' => 'RUC'
	                    );
	                    $hash_orden_p = $_POST['hash_id'];
                        $db->where('hash_id', $hash_orden_p)
                           ->where('id_del_vendedor', lui_Secure($wo['user']['user_id']))
                           ->where('estado_venta', '3')
                           ->update(T_VENTAS, $dataarray);

                        $data['status'] = 200;
                        $data['message'] = '';
	                }else{
	                	$data['status'] = 400;
	                	$data['message'] = $error_icon . $wo['lang']['please_check_details'];
	                }
	            } else {
	                $data['status'] = 400;
	                $data['message'] = $error_icon . $wo['lang']['please_check_details'];
	            }
	        } else {
	            $data['message'] = $error_icon . $wo['lang']['please_check_details'];
	        }
	    } else {
	        $data['message'] = $error_icon . $wo['lang']['please_check_details'];
	    }
	    header("Content-type: application/json");
	    echo json_encode($data);
	}
	if ($s == 'document_pos') {
	    if (!empty($_POST['comprobante'])) {
	        $comprobante_users = $db->where('id_del_vendedor', lui_Secure($wo['user']['user_id']))
	                                ->where('estado_venta', '3')
	                                ->getOne(T_VENTAS);
	        if ($comprobante_users) {
	            if (!empty($_POST['hash_id'])) {
	                $tipoDocumento = '';
	                $userDocument = '';

	                if ($_POST['comprobante'] == 'boleta_simple') {
	                    $tipoDocumento = 'BS';
	                    $userDocument = 'DNI';
	                } elseif ($_POST['comprobante'] == 'boleta') {
	                    $tipoDocumento = 'B';
	                    $userDocument = 'DNI';
	                } elseif ($_POST['comprobante'] == 'factura') {
	                    $tipoDocumento = 'F';
	                    $userDocument = 'RUC';
	                }

	                if ($tipoDocumento) {
	                    try {
	                        $dataarray = array(
	                            'documento' => $tipoDocumento,
	                            'user_document' => $userDocument
	                        );

	                        // Actualizar el documento en la base de datos con los nuevos datos
	                        $hash_orden_p = $_POST['hash_id'];
	                        $db->where('hash_id', $hash_orden_p)
	                           ->where('id_del_vendedor', lui_Secure($wo['user']['user_id']))
	                           ->where('estado_venta', '3')
	                           ->update(T_VENTAS, $dataarray);

	                        $data['status'] = 200;
	                        $data['message'] = '';
	                    } catch (Exception $e) {
	                        $data['status'] = 500;
	                        $data['message'] = $error_icon . ' Error generating document number: ' . $e->getMessage();
	                    }
	                } else {
	                    $data['status'] = 400;
	                    $data['message'] = $error_icon . $wo['lang']['please_check_details'];
	                }
	            } else {
	                $data['status'] = 400;
	                $data['message'] = $error_icon . $wo['lang']['please_check_details'];
	            }
	        } else {
	            $data['message'] = $error_icon . $wo['lang']['please_check_details'];
	        }
	    } else {
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

	if ($s == 'document_dni_pos') {
		if (!empty($_POST['number'])) {
			$comprobante_user_venta = $db->where('id_del_vendedor',lui_Secure($wo['user']['user_id']))->where('completado', '2')->where('estado_venta','3')->getOne(T_VENTAS);

			if (!empty($comprobante_user_venta)) {
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
			}else{
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

	if ($s == 'document_ruc_pos') {
		if (!empty($_POST['number'])) {
			$comprobante_user_venta = $db->where('id_del_vendedor',lui_Secure($wo['user']['user_id']))->where('completado', '2')->where('estado_venta','3')->getOne(T_VENTAS);
			if (!empty($comprobante_user_venta)) {
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
	if ($s == 'document_selectt_barcod') {
		if (!empty($_POST)) {
			if (isset($_POST['number']) && $_POST['number'] == 'true') {
			    $datos_opcio = array('pos_barcode' => 1);
			    $data['placeholder'] = 'Codigo de barras';
			    $data['funcions']    = '';
			} else {
			    $datos_opcio = array('pos_barcode' => 0);
			    $data['placeholder'] = 'Buscar por codigo, sku o nombre';
			    $data['funcions']    = 'Wo_SearchProducts(this.value)';
			}
			$db->where('user_id',lui_Secure($wo['user']['user_id']))->update(T_USERS,$datos_opcio);
			$data['status'] = 200;
		}else{
			$data['status'] = 400;
		}
		header("Content-type: application/json");
        echo json_encode($data);
        exit();
	}

	if ($s == 'barcode_inc_test') {
		if (!empty($_POST)) {
			if (!empty($_POST['hash'])) {
				//$codigo_de_barras = '0000000008280' 86_49_17_19;
				//0000000008655 / 86_49_18_19
				//0000000008723 / 5_49_18_20
				//0000000008730 
				//0000000008747
				$codigo_de_barras = $_POST['barcode']; /// esto es el codigo de barras que escaneo 
				$buscar_barcode_disponible = $db->where('estado', 1)
				->where('barcode', $codigo_de_barras)
				->getValue('imventario', 'SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = "ingreso" THEN cantidad WHEN modo = "salida" THEN -cantidad ELSE 0 END ELSE 0 END)');
				if ($buscar_barcode_disponible > 0) {
					$elproductoencontrado = $db->where('barcode',$codigo_de_barras)->getOne('imventario'); // aqui busco el atributo por el codigo de barras 
					if ($elproductoencontrado) {
						$atributos = $elproductoencontrado->atributo;
						$partes = explode('_', $atributos);
						array_shift($partes);
						$resultado_atributos = implode('_', $partes);
						$data['atributo'] = $resultado_atributos; // aqui ya encontre el atributo 

						// aqui falta el modo de agregar el barcode a la venta  que hay 5 con el mismo atributo pero no quiero que a los 5 le ponga el mismo barcode , tiene que ser solo a uno y asi uno en uno y si llega a los 5 y agrego un barcode mas  pues se agregaria una nueva fila al imventario con las mismas caracteristicas 
						$data['status'] = 200;
					}else{
						$data['status'] = 400;
					}
				}else{
					$data['status'] = 400;
				}
			}else{
				$data['status'] = 400;
			}
		}else{
			$data['status'] = 400;
		}
		header("Content-type: application/json");
        echo json_encode($data);
        exit();
	}

	if ($s == 'barcode_inc') {
	    if (!empty($_POST) && !empty($_POST['hash']) && !empty($_POST['barcode'])) {
	    	$venta_iniciada = $db->where('estado_venta',3)->where('id_del_vendedor',$wo['user']['user_id'])->getOne(T_VENTAS);
	        // Obtener el código de barras escaneado
	        $codigo_de_barras = $_POST['barcode'];

	        // Verificar si el código de barras está disponible en el imventario
	        $buscar_barcode_disponible = $db->where('estado', 1)
	            ->where('barcode', $codigo_de_barras)
	            ->getValue('imventario', 'SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = "ingreso" THEN cantidad WHEN modo = "salida" THEN -cantidad ELSE 0 END ELSE 0 END)');

	        if ($buscar_barcode_disponible > 0) {
	            // Buscar el producto en el imventario por su código de barras
	            $elproductoencontrado = $db->where('barcode', $codigo_de_barras)->getOne('imventario');

	            if ($elproductoencontrado) {
	                // Obtener el atributo del producto encontrado
	                $atributos = $elproductoencontrado->atributo;
	                $partes = explode('_', $atributos);
					array_shift($partes);
					$resultado_atributos = implode('_', $partes);
	                // Buscar un producto en el pedido que tenga los mismos atributos pero sin código de barras asignado
	                // asicnamos el atributo al pedido
	                $pedido_atributo = $venta_iniciada->id.'_'.$resultado_atributos;
	                $producto_carrito = $db->where('atributo', $pedido_atributo)->where('barcode', 0)->getOne('imventario');
	                
	               
	                if ($producto_carrito) {
	                    // Asignar el código de barras al producto en el pedido
	                    $buscar_barcode_en_pedido = $db->where('atributo', $pedido_atributo)->where('barcode', $codigo_de_barras)->getOne('imventario');
	                    if (empty($buscar_barcode_en_pedido)) {
	                    	$db->where('id', $producto_carrito->id)->update('imventario', ['barcode' => $codigo_de_barras]);
	                    	$sql = "SELECT COUNT(*) AS cantidad 
					        FROM imventario 
					        WHERE id_comprobante_v = ? 
					        AND atributo = ? 
					        AND barcode != '0'";
							$params = array($venta_iniciada->id, $pedido_atributo);
							$result = $db->rawQueryOne($sql, $params);

							$cantidad_productos_pos_listos = $result->cantidad;
			                $data['cantidad_listo'] = $cantidad_productos_pos_listos;
	                    	$data['message'] = 'Agregado con exito';
	                    	$data['atributo'] = $pedido_atributo;
	                    	$data['status'] = 200;
	                    }else{
	                    	$data['message'] = 'Ya esta agregado el producto';
	                    	$data['status'] = 400;
	                    }
	                } else {
	                    // No se encontró ningún producto en el pedido con los mismos atributos y sin código de barras asignado
	                    $data['status'] = 410;
	                }
	            } else {
	                // No se encontró ningún producto en el imventario con el código de barras escaneado
	                $data['status'] = 400;
	            }
	        } else {
	            // El código de barras escaneado no está disponible en el imventario
	            $data['status'] = 400;
	        }
	    } else {
	        // Los datos enviados no están completos
	        $data['status'] = 400;
	    }
	    // Enviar la respuesta como JSON
		header("Content-type: application/json");
		echo json_encode($data);
		exit();
	}




	if ($s == 'category_pos') {
		$html_categorys_alls = '';
		$html_data     = '';
		if (!empty($_POST)) {
			if (!empty($_POST['hash'])) {
				$categoria = $_POST['number'];
				$category_id = (!empty($categoria)) ? (int) $categoria : 0;

				foreach ($wo['products_categories'] as $category){
	    			$wo['cat_id_produc'] = $category['id'];
	    			$all_categorie = $category_id == $wo['cat_id_produc'];
	    			$wo['active_cat'] = ($category_id == $wo['cat_id_produc']) ? 'active not_seen_story' : '';
	    			$wo['cat_logo_produc'] = $category['logo'];
	    			$wo['cat_nombre_producs'] = $wo["lang"][$category["lang_key"]];
	    			if(!empty($wo['products_sub_categories'][$categoria])){
	    				if($all_categorie){
		    				$html_categorys_alls .= lui_LoadPage('pos/lista_cats_all');
		    			}
		    		}else{ 
	    				if(!$wo['cat_id_produc']==0){
	    					$html_categorys_alls .= lui_LoadPage('pos/lista_categorias');
	    				} 
	    		    }
	    		}
				
				if(!empty($categoria) && !empty($wo['products_sub_categories'][$categoria])){
	    			$category_id = (!empty($wo['user']['pos_sub_categorias'])) ? (int) $wo['user']['pos_sub_categorias'] : 0;
	    			foreach ($wo['products_sub_categories'][$categoria] as $key => $wo['category_sub']) {
	    				$wo['cat_logo_producs'] = $wo['category_sub']['logo'];
	    				$wo['active_sub_cat'] = ($category_id == $wo['category_sub']['id']) ? 'active products_seleccionado_cat' : '';
	    				$wo['categoria_selecc'] = $categoria;
	    				$html_categorys_alls .= lui_LoadPage('pos/lista_sub_categorias');
	    			}
	    		}
	    		$db->where('user_id',lui_Secure($wo['user']['user_id']))->update(T_USERS,array('pos_categorias' => $categoria,'pos_sub_categorias' => 0));

	    		$category_id_pos = (!empty($categoria)) ? (int) $categoria : 0;
				$category_sub_id_pos = 0;
				$category_name = '';
				$data = array();
				if (!empty($category_id_pos)) {
					if (is_numeric($category_id_pos)) {
						if (array_key_exists($category_id_pos, $wo['products_categories'])) {
							$category_name = $wo['products_categories'][$category_id_pos];
							$data['c_id'] = lui_Secure($category_id_pos);
						}
					}
					if (!empty($wo['products_sub_categories'][$category_id_pos]) && !empty($category_sub_id_pos)) {
						foreach ($wo['products_sub_categories'][$category_id_pos] as $key => $value) {
							if ($category_sub_id_pos == $value['id']) { 
								$data['sub_id'] = lui_Secure($value['id']);
								break;
							}
						}
					}
				} else {
				}
				$data['limit'] = 10;
				$products = lui_GetProducts($data);

	    		if (count($products) > 0) {
					foreach ($products as $key => $wo['product']) {
						$html_data .= lui_LoadPage('pos/products_lista');
					}
					$muestra_load_more = 1;
				} else {
					$muestra_load_more = 0;
					$html_data .= '<div class="empty_state" style="position:absolute;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z"></path></svg>' . $wo['lang']['no_available_products'] . '</div>';
				}

	    		$data['html_cats'] = $html_categorys_alls;
	    		$data['html'] = $html_data;
	    		$data['html_load'] = $muestra_load_more;
	    		$data['status'] = 200;
			}else{
				$data['status'] = 400;
			}
		}else{
			$data['status'] = 400;
		}
		header("Content-type: application/json");
        echo json_encode($data);
        exit();
	}

	if ($s == 'category_sub_pos') {
		$html_categorys_alls = '';
		$html_data     = '';
		if (!empty($_POST)) {
			if (!empty($_POST['hash'])) {
				$categoria = $_POST['category'];
				$sub_categoria = $_POST['number'];
				$category_id = (!empty($categoria)) ? (int) $categoria : 0;
				$sub_category_id = (!empty($sub_categoria)) ? (int) $sub_categoria : 0;
	    		$db->where('user_id',lui_Secure($wo['user']['user_id']))->update(T_USERS,array('pos_categorias' => $category_id,'pos_sub_categorias' => $sub_category_id));
	    		$category_id_pos = (!empty($categoria)) ? (int) $categoria : 0;
				$sub_category_idb = (!empty($sub_categoria)) ? (int) $sub_categoria : 0;

				$category_name = '';
				$data = array();
				if (!empty($category_id_pos)) {
					if (is_numeric($category_id_pos)) {
						if (array_key_exists($category_id_pos, $wo['products_categories'])) {
							$category_name = $wo['products_categories'][$category_id_pos];
							$data['c_id'] = lui_Secure($category_id_pos);
						}
					}
					if (!empty($wo['products_sub_categories'][$category_id_pos]) && !empty($sub_category_idb)) {
						foreach ($wo['products_sub_categories'][$category_id_pos] as $key => $value) {
							if ($sub_category_idb == $value['id']) { 
								$data['sub_id'] = lui_Secure($value['id']);
								break;
							}
						}
					}
				} else {
				}
				$data['limit'] = 10;
				$products = lui_GetProducts($data);

	    		if (count($products) > 0) {
					foreach ($products as $key => $wo['product']) {
						$html_data .= lui_LoadPage('pos/products_lista');
					}
					$muestra_load_more = 1;
				} else {
					$muestra_load_more = 0;
					$html_data .= '<div class="empty_state" style="position:absolute;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z"></path></svg>' . $wo['lang']['no_available_products'] . '</div>';
				}

	    		$data['html_cats'] = $html_categorys_alls;
	    		$data['html'] = $html_data;
	    		$data['html_load'] = $muestra_load_more;
	    		$data['status'] = 200;
			}else{
				$data['status'] = 400;
			}
		}else{
			$data['status'] = 400;
		}
		header("Content-type: application/json");
        echo json_encode($data);
        exit();
	}

}
 ?>
 
 