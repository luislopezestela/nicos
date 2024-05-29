<?php
if ($f == "comprar_producto_b") {
	if ($s == 'prev_venta_we') {

        $nueva_fecha = date('Y-m-d');
        // Obtener la compra pendiente del usuario
        $comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))
                               ->where('completado','0')
                               ->where('web',1)
                               ->getOne(T_VENTAS);
        // Verificar si hay una compra pendiente
        if (!empty($comprapendiente)) {
            $dataarrayd = array(
                'estado' => '0'
            );
            
			$db->where('id',$comprapendiente->id)
           		->update(T_VENTAS, $dataarrayd);

           	$data['estadop'] = 2;
           	$data['status'] = 200;
           	if (!empty($_SESSION['messages_carito'])) {
            	unset($_SESSION['messages_carito']);
            }
        } else {
            $data['status'] = 400;
            $data['message'] = 'Por favor comprueba tus detalles';
            $_SESSION['messages_carito'] = $data['message'];
        }
        
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

	if ($s == 'next_venta_we') {
        $nueva_fecha = date('Y-m-d');
        // Obtener la compra pendiente del usuario
        $comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))
                               ->where('completado','0')
                               ->where('web',1)
                               ->getOne(T_VENTAS);
        // Verificar si hay una compra pendiente
        if (!empty($comprapendiente)) {
            $dataarrayd = array(
                'estado' => '2'
            );

            if ($_POST['lista']==1) {
            	if ($comprapendiente->documento==null) {
            		$comprobante_user = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado', '0')->where('web', '1')->getOne(T_VENTAS);
					if (!empty($comprobante_user) && ($comprobante_user->user_id == $wo['user']['user_id'])) {
						
	                    $dataarray = array('documento' => 'B', 'user_document' => 'DNI', 'estado' => '2');
	                    $dataarray_b = array('doc_order' => 'boleta', 'comprobante_dni' => null);
						$db->where('user_id',$comprobante_user->user_id)->where('completado', '0')->update(T_VENTAS, $dataarray);
						$db->where('user_id',$comprobante_user->user_id)->update(T_USERS, $dataarray_b);
						
						$data['status'] = 200;
						if (!empty($_SESSION['messages_carito'])) {
			            	unset($_SESSION['messages_carito']);
			            }
					}
            	}else{
            		$data['estadop'] = 2;
					$data['status'] = 200;
					if (!empty($_SESSION['messages_carito'])) {
		            	unset($_SESSION['messages_carito']);
		            }
					$db->where('id',$comprapendiente->id)
					->update(T_VENTAS, $dataarrayd);
            	}
				
			}else{
            	$db->where('id',$comprapendiente->id)
               	->update(T_VENTAS, $dataarrayd);
            }

            $data['estadop'] = 2;
            $data['status'] = 200;
            if (!empty($_SESSION['messages_carito'])) {
            	unset($_SESSION['messages_carito']);
            }
        } else {
            $data['status'] = 400;
            $data['message'] = 'Por favor comprueba tus detalles';
            $_SESSION['messages_carito'] = $data['message'];
        }
        
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    
    if ($s == 'next_venta_web') {
        $nueva_fecha = date('Y-m-d');
        // Obtener la compra pendiente del usuario
        $comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))
                               ->where('completado','0')
                               ->where('web',1)
                               ->getOne(T_VENTAS);
        // Verificar si hay una compra pendiente
        if (!empty($comprapendiente)) {
            $dataarrayd = array(
                'estado' => '3'
            );

            if ($_POST['lista']==1) {
            	if ($comprapendiente->user_document_num==null) {
            		$usuarios = $db->where('user_id',lui_Secure($wo['user']['user_id']))->getOne(T_USERS);
            		if ($comprapendiente->user_document=='DNI') {
            			if ($usuarios->comprobante_dni==null) {
            				$data['estadop'] = 3;
            				$data['status'] = 400;
            				$data['message'] = 'Escribe el numero de tu DNI.';
            				$_SESSION['messages_carito'] = $data['message'];
            			}else{
            				$dataarraydPL = array(
            					'user_document_num' => $usuarios->comprobante_dni,
				                'estado' => '3'
				            );
            				$db->where('id',$comprapendiente->id)
		               		->update(T_VENTAS, $dataarraydPL);
		               		$data['estadop'] = 3;
		               		$data['status'] = 200;
		               		if (!empty($_SESSION['messages_carito'])) {
				            	unset($_SESSION['messages_carito']);
				            }
            			}
            		}elseif ($comprapendiente->user_document=='RUC') {
            			if ($usuarios->comprobante_ruc==null) {
            				$data['estadop'] = 3;
            				$data['status'] = 400;
            				$data['message'] = 'Escribe el numero de RUC.';
            				$_SESSION['messages_carito'] = 'Escribe el numero de RUC.';
            			}else{
            				$dataarraydPL = array(
            					'user_document_num' => $usuarios->comprobante_ruc,
				                'estado' => '3'
				            );
            				$db->where('id',$comprapendiente->id)
		               		->update(T_VENTAS, $dataarraydPL);
		               		$data['estadop'] = 3;
		               		$data['status'] = 200;
		               		if (!empty($_SESSION['messages_carito'])) {
				            	unset($_SESSION['messages_carito']);
				            }
            			}
            		}
            	}else{
            		$db->where('id',$comprapendiente->id)
		               ->update(T_VENTAS, $dataarrayd);
		            $data['estadop'] = 3;
		            $data['status'] = 200;
		            if (!empty($_SESSION['messages_carito'])) {
		            	unset($_SESSION['messages_carito']);
		            }
            	}
            }else{
            	$db->where('id',$comprapendiente->id)
	               ->update(T_VENTAS, $dataarrayd);
	            $data['estadop'] = 3;
	            $data['status'] = 200;
	            if (!empty($_SESSION['messages_carito'])) {
	            	unset($_SESSION['messages_carito']);
	            }
	            
            }
        } else {
            $data['status'] = 400;
            $data['message'] = 'Por favor comprueba tus detalles';
            $_SESSION['messages_carito'] = $data['message'];
        }
        
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'next_venta_web_c') {
    	$nueva_fecha = date('Y-m-d');
        // Obtener la compra pendiente del usuario
        $comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))
                               ->where('completado','0')
                               ->where('web',1)
                               ->getOne(T_VENTAS);
        // Verificar si hay una compra pendiente
        if (!empty($comprapendiente)) {
        	$dataarrayd = array(
                'estado' => '4'
            );
            if ($_POST['lista']==1) {
            	$usuarios = $db->where('user_id',lui_Secure($wo['user']['user_id']))->getOne(T_USERS);
            	if ($usuarios->opcion_de_compra == 'tienda') {
            		if ($usuarios->sucursal_entrega == null) {
            			$data['estadop'] = 4;
        				$data['status'] = 400;
        				$data['message'] = 'Selecciona una sucursal.';
        				$_SESSION['messages_carito'] = $data['message'];
            		}else{
            			$dataarraydPLc = array(
            				'envio' => 0,
            				'delivery' => 0,
        					'sucursal_entrega' => $usuarios->sucursal_entrega,
			                'estado' => '4'
			            );
        				$db->where('id',$comprapendiente->id)
	               		->update(T_VENTAS, $dataarraydPLc);
	               		$data['estadop'] = 4;
			            $data['status'] = 200;
			            if (!empty($_SESSION['messages_carito'])) {
			            	unset($_SESSION['messages_carito']);
			            }
            		}
            	}elseif ($usuarios->opcion_de_compra == 'delivery') {
            		if ($usuarios->direccion_delivery == null) {
            			$data['estadop'] = 4;
        				$data['status'] = 400;
        				$data['message'] = 'Selecciona una Dirección de entrega O Agrega una nueva direccion';
        				$_SESSION['messages_carito'] = $data['message'];
            		}else{
            			$dataarraydPLc = array(
            				'envio' => 0,
            				'delivery' => 1,
        					'dirección_id' => $usuarios->direccion_delivery,
			                'estado' => '4'
			            );
        				$db->where('id',$comprapendiente->id)
	               		->update(T_VENTAS, $dataarraydPLc);
	               		$data['status'] = 200;
			            if (!empty($_SESSION['messages_carito'])) {
			            	unset($_SESSION['messages_carito']);
			            }
            		}
            	}elseif ($usuarios->opcion_de_compra == 'envios') {
            		if ($usuarios->direccion_delivery == null) {
            			$data['estadop'] = 4;
        				$data['status'] = 400;
        				$data['message'] = 'Selecciona un lugar de envio O Agrega una nuevo lugar';
        				$_SESSION['messages_carito'] = $data['message'];
            		}else{
            			$dataarraydPLc = array(
            				'envio' => 1,
            				'delivery' => 0,
        					'datos_envios_id' => $usuarios->direccion_delivery,
			                'estado' => '4'
			            );
        				$db->where('id',$comprapendiente->id)
	               		->update(T_VENTAS, $dataarraydPLc);
	               		$data['status'] = 200;
			            if (!empty($_SESSION['messages_carito'])) {
			            	unset($_SESSION['messages_carito']);
			            }
            		}
            	}else{
            		$db->where('id',$comprapendiente->id)
	               ->update(T_VENTAS, $dataarrayd);
		            $data['estadop'] = 4;
		            $data['status'] = 200;
		            if (!empty($_SESSION['messages_carito'])) {
		            	unset($_SESSION['messages_carito']);
		            }
            	}
            	//
            }else{
            	$db->where('id',$comprapendiente->id)
	               ->update(T_VENTAS, $dataarrayd);
	            $data['estadop'] = 4;
	            $data['status'] = 200;
	            if (!empty($_SESSION['messages_carito'])) {
	            	unset($_SESSION['messages_carito']);
	            }
	            
            }
        } else {
            $data['status'] = 400;
            $data['message'] = 'Por favor comprueba tus detalles';
            $_SESSION['messages_carito'] = $data['message'];
        }
        
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'add_venta_address') {
    	$dataarraydPLc = array('add_direccion' => 1);
		$db->where('user_id',lui_Secure($wo['user']['user_id']))
   		->update(T_USERS, $dataarraydPLc);
    }
    if ($s == 'add_venta_address_n') {
    	$dataarraydPLc = array('add_direccion' => 0);
		$db->where('user_id',lui_Secure($wo['user']['user_id']))->update(T_USERS, $dataarraydPLc);
    }

    if ($s == 'add_venta_address_envio') {
    	$dataarraydPLc = array('add_direccion_envio' => 1);
		$db->where('user_id',lui_Secure($wo['user']['user_id']))
   		->update(T_USERS, $dataarraydPLc);
    }
    if ($s == 'add_venta_address_envio_n') {
    	$dataarraydPLc = array('add_direccion_envio' => 0);
		$db->where('user_id',lui_Secure($wo['user']['user_id']))->update(T_USERS, $dataarraydPLc);
    }

    if ($s == 'add_address_envios') {
    	$direccion_envio = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('estado',0)->getOne('direcciones_envios');
    	if (!empty($direccion_envio)) {
    		if (strlen($_POST['dni']) != 8) {
    			$estadodeagregado = 0;
    			$data['message'] = 'El dni no es valido';
				$_SESSION['messages_carito'] = $data['message'];
    		}elseif($_POST['nombres']=='') {
    			$estadodeagregado = 0;
    			$data['message'] = 'Escribe nombres y apellidos completos.';
				$_SESSION['messages_carito'] = $data['message'];
    		}elseif($_POST['departamento']=='') {
    			$estadodeagregado = 0;
    			$data['message'] = 'Escribe el nombre del departamendo.';
				$_SESSION['messages_carito'] = $data['message'];
    		}elseif($_POST['provincia']=='') {
    			$estadodeagregado = 0;
    			$data['message'] = 'Escribe el nombre el la provincia.';
				$_SESSION['messages_carito'] = $data['message'];
    		}elseif($_POST['distrito']=='') {
    			$estadodeagregado = 0;
    			$data['message'] = 'Escribe el nombre del distrito.';
				$_SESSION['messages_carito'] = $data['message'];
    		}elseif($_POST['contacto']=='') {
    			$estadodeagregado = 0;
    			$data['message'] = 'Escribe numero celular de contacto.';
				$_SESSION['messages_carito'] = $data['message'];
    		}elseif($_POST['transporte']=='') {
    			$estadodeagregado = 0;
    			$data['message'] = 'Escribe el nombre de la empresa de transporte. Ejemplo: SHALOM, OLVA etc.';
				$_SESSION['messages_carito'] = $data['message'];
    		}elseif($_POST['agencia']=='') {
    			$estadodeagregado = 0;
    			$data['message'] = 'Escribe el nombre de la sucursal de la agencia donde se enviara el producto.';
				$_SESSION['messages_carito'] = $data['message'];
    		}else{
    			$estadodeagregado = 1;
	    	}
	    	
	    		
	    	$dataarraydPLv = array(
    			'dni' => $_POST['dni'],
    			'nombre_completo' => $_POST['nombres'],
    			'departamento' => $_POST['departamento'],
    			'provincia' => $_POST['provincia'],
    			'distrito' => $_POST['distrito'],
    			'contacto' => $_POST['contacto'],
    			'transporte' => $_POST['transporte'],
    			'agencia' => $_POST['agencia'],
    			'comentarios' => $_POST['comentarios'],
    			'estado' => $estadodeagregado
    		);

			$db->where('user_id',lui_Secure($wo['user']['user_id']))->update('direcciones_envios', $dataarraydPLv);
			if ($estadodeagregado==1) {
	    		if (!empty($_SESSION['messages_carito'])) {
	            	unset($_SESSION['messages_carito']);
	            }
	            $dataarraydPLc = array('add_direccion_envio' => 0);
				$db->where('user_id',lui_Secure($wo['user']['user_id']))->update(T_USERS, $dataarraydPLc);
	    	}
    	}else{
    		if (strlen($_POST['dni']) == 8) {
				$lista_personas = $db->where('dni',$_POST['dni'])->getOne('personas_lista');
				if (isset($lista_personas->dni) == $_POST['dni']) {
					$datos_de_persona = json_decode($lista_personas->datos);
					$estado_documento = $lista_personas->estado;
				}else{
					$token = 'apis-token-8240.fCDeH4D6LNu9YmNBnFuqBQj1zE-E9S7-';
					// Iniciar llamada a API
					$curl = curl_init();
					// Buscar dni
					curl_setopt_array($curl, array(
					  CURLOPT_URL => 'https://api.apis.net.pe/v2/reniec/dni?numero=' . $_POST['dni'],
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
				$nombrescompletos = $datos_de_persona->nombres.' '.$datos_de_persona->apellidoPaterno. ' '. $datos_de_persona->apellidoMaterno;
				$dataarraydPLv = array(
					'time' => time(),
					'user_id' => lui_Secure($wo['user']['user_id']),
	    			'dni' => $_POST['dni'],
	    			'nombre_completo' => $nombrescompletos
	    		);
	    		$db->insert('direcciones_envios', $dataarraydPLv);
	    		if (!empty($_SESSION['messages_carito'])) {
	            	unset($_SESSION['messages_carito']);
	            }
			}else{
				$data['status'] = 400;
            	$data['message'] = 'El dni no es valido';
				$_SESSION['messages_carito'] = $data['message'];
			}
    	}
    	header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'opcion_compra_end') {
    	if (!empty($_POST)) {
    		if (!empty($_POST['hash'])) {
		    	require_once './luisincludes/librerias/PhpSpreadsheet-master/vendor/mpdf/mpdf/vendor/autoload.php';
		        $generator = new Mpdf\Barcode();
		        $comprapendiente4 = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->where('estado','4')->getOne(T_VENTAS);
		        $fechaHora = date("Y-m-d H:i:s");
		        if ($wo['user']['mode_pay']==0) {
		        	$data['status'] = 400;
		        	$data['message'] = 'Selecciona el modo de pago.';
					$_SESSION['messages_carito'] = $data['message'];
		        }elseif ($wo['user']['mode_pay']==1) {
                    if (isset($comprapendiente4->completado)) {
                    	$hash_id = uniqid(rand(11111,999999));
                        $dataarrayd = array(
                        	'hash_id'          => $hash_id,
                            'completado'       => '2',
                            'estado'           => '1',
                            'fecha'            => $fechaHora,
                            'sucursal'         => $wo['user']['sucursal_entrega'],
                            'duracion_reserva' => $wo['config']['reserva_duracion_compra'],
                            'time'             => time(),
                            'donde_paga'       => $wo['user']['mode_pay']
                        );
                        $inventarios = array(
                            'estado'      => 2,
                            'id_sucursal' => $wo['user']['sucursal_entrega']
                        );
                        $db->where('id',$comprapendiente4->id)
                           ->update(T_VENTAS, $dataarrayd);
                        
                        $db->where('id_comprobante_v',$comprapendiente4->id)
                           ->where('estado', '0')
                           ->update('imventario', $inventarios);


                        $data['status'] = 200;
			        	if (!empty($_SESSION['messages_carito'])) {
			            	unset($_SESSION['messages_carito']);
			            }
                    }else{
                        $data['status'] = 400;
                    }
		        }else{
		        	$data['status'] = 400;
		        	$data['message'] = 'Error de datos.';
					$_SESSION['messages_carito'] = $data['message'];
		        }
		    }else{
		    	$data['status'] = 400;
		    	$data['message'] = 'Error de datos.';
				$_SESSION['messages_carito'] = $data['message'];
		    }
	    }else{
	    	$data['status'] = 400;
	    }
    	header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'change_order_pend') {
    	if (!empty($_POST)) {
    		if (!empty($_POST['hash'])) {
    			if (!empty($_POST['hash_id'])) {
    				$verificar_venta = $db->where('hash_id',$_POST['hash_id'])->where('estado_venta',0)->getOne(T_VENTAS);
    				if ($verificar_venta) {
    					$recibir_compra = array(
		    				'estado_venta'    => 1,
	                        'id_del_vendedor' => $wo['user']['user_id']
		                );
		                $db->where('hash_id',$_POST['hash_id'])
		                           ->update(T_VENTAS, $recibir_compra);
		    			$data['status'] = 200;
			        	if (!empty($_SESSION['messages_orden'])) {
			            	unset($_SESSION['messages_orden']);
			            }
    				}else{
    					$data['status'] = 400;
		    			$data['message'] = 'Error de datos.';
    				}
	    			
	            }else{
    				$data['status'] = 400;
		    		$data['message'] = 'Error de datos.';
    			}
    		}else{
    			$data['status'] = 400;
		    	$data['message'] = 'Error de datos.';
    		}
    	}else{
    		$data['status'] = 400;
    	}
    	header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'change_orders_pen') {
    	if (!empty($_POST)) {
    		if (!empty($_POST['hash'])) {
    			if (!empty($_POST['hash_id'])) {
    				if($_POST['opcion_data']=='recibir_pedido') {
    					$verificar_venta = $db->where('hash_id',$_POST['hash_id'])->where('estado_venta',0)->getOne(T_VENTAS);
    					if ($verificar_venta) {
	    					$recibir_pedido = array(
		    					'estado_venta'    => 1,
	                        	'id_del_vendedor' => $wo['user']['user_id']
			                );
			                $db->where('hash_id',$_POST['hash_id'])
			                           ->update(T_VENTAS, $recibir_pedido);
			    			$data['status'] = 200;
				        	if (!empty($_SESSION['messages_orden'])) {
				            	unset($_SESSION['messages_orden']);
				            }
			            }else{
			            	$data['status'] = 400;
		    				$data['message'] = 'Error de datos.';
			            }
    				}elseif($_POST['opcion_data']=='aceptar_pedido') {
    					$verificar_pedido = $db->where('hash_id',$_POST['hash_id'])->where('estado_venta',1)->where('id_del_vendedor',$wo['user']['user_id'])->getOne(T_VENTAS);
    					if ($verificar_pedido) {
	    					$aceptar_pedido = array(
		    					'estado_venta'      => 2
			                );
			                $db->where('hash_id',$_POST['hash_id'])
			                           ->update(T_VENTAS, $aceptar_pedido);
			    			$data['status'] = 200;
				        	if (!empty($_SESSION['messages_orden'])) {
				            	unset($_SESSION['messages_orden']);
				            }
				        }else{
			            	$data['status'] = 400;
		    				$data['message'] = 'Error de datos.';
			            }
    				}elseif($_POST['opcion_data']=='preparar_pedido') {
    					$verificar_pedido = $db->where('estado_venta',3)->where('id_del_vendedor',$wo['user']['user_id'])->getOne(T_VENTAS);
    					if ($verificar_pedido) {
		    				$preparar_pedido_pre = array(
		    					'estado_venta'      => 2
			                );
			                $db->where('estado_venta',3)
			                    ->update(T_VENTAS, $preparar_pedido_pre);
    					}
    					$verificar_pedido = $db->where('hash_id',$_POST['hash_id'])->where('estado_venta',2)->where('id_del_vendedor',$wo['user']['user_id'])->getOne(T_VENTAS);
    					if ($verificar_pedido) {
	    					$preparar_pedido = array(
		    					'estado_venta'      => 3
			                );
			                $db->where('hash_id',$_POST['hash_id'])
			                           ->update(T_VENTAS, $preparar_pedido);
			    			$data['status'] = 200;
				        	if (!empty($_SESSION['messages_orden'])) {
				            	unset($_SESSION['messages_orden']);
				            }
				        }else{
			            	$data['status'] = 400;
		    				$data['message'] = 'Error de datos.';
			            }
			            
    				}elseif($_POST['opcion_data']=='rechazar_orden') {
    					$verificar_pedido = $db->where('hash_id',$_POST['hash_id'])->where('estado_venta',1)->where('id_del_vendedor',$wo['user']['user_id'])->getOne(T_VENTAS);
    					if ($verificar_pedido) {
	    					$rechazar_orden = array(
		    					'estado_venta'      => 11
			                );
			                $db->where('hash_id',$_POST['hash_id'])
			                           ->update(T_VENTAS, $rechazar_orden);
			    			$data['status'] = 200;
				        	if (!empty($_SESSION['messages_orden'])) {
				            	unset($_SESSION['messages_orden']);
				            }
				        }else{
			            	$data['status'] = 400;
		    				$data['message'] = 'Error de datos.';
			            }
    				}else{
    					$data['status'] = 400;
		    			$data['message'] = 'Error de datos.';
    				}
	            }else{
    				$data['status'] = 400;
		    		$data['message'] = 'Error de datos.';
    			}
    		}else{
    			$data['status'] = 400;
		    	$data['message'] = 'Error de datos.';
    		}
    	}else{
    		$data['status'] = 400;
    	}
    	header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }


    
}