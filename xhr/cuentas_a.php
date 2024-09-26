<?php
if($f == 'cuentas_a'){
	if($s == 'nueva_cuenta') {
		if (!empty($_POST['hash'])){
			$cuentas_corrientes_empresa = $db->where('es_empresa', 1)->where('estado',0)->getOne("cuentas_corrientes");
			if(empty($cuentas_corrientes_empresa)) {
				$query  = mysqli_query($sqlConnect, " INSERT INTO cuentas_corrientes (`es_empresa`) VALUES (1) ");
				if ($query) {
                    $data = array(
                        'status' => 200
                    );
                } else {
                    $data['status']  = 400;
                    $data['message'] = 'Por favor comprueba tus detalles';
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
	if($s == 'clean_cuenta') {
		if (!empty($_POST['hash'])){
			$cuentas_corrientes_empresa = $db->where('es_empresa', 1)->where('estado',0)->getOne("cuentas_corrientes");
			if(!empty($cuentas_corrientes_empresa)) {
				$db->where('id', $cuentas_corrientes_empresa['id'])->where('es_empresa', 1)->where('estado',0)->delete("cuentas_corrientes");
                $data = array(
                	'status' => 200
                );
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

	if($s == 'add_c_cuenta') {
		if (!empty($_POST)){
			if($_POST['nombre']=='') {
				$data['status'] = 300;
				$data['none'] = 'nombre';
				$data['message'] = 'Escribe nombre de la cuenta';
			}elseif($_POST['currency']=='') {
				$data['status'] = 300;
				$data['none'] = 'currency';
				$data['message'] = 'Selecciona el tipo de moneda de la cuenta';
			}elseif($_POST['numero_c']=='') {
				$data['status'] = 300;
				$data['none'] = 'numero_c';
				$data['message'] = 'Escribe el numero de cuenta';
			}elseif($_POST['numero_cci']=='') {
				$data['status'] = 300;
				$data['none'] = 'numero_cci';
				$data['message'] = 'Escribe el numero CCI de la cuenta';
			}elseif($_POST['nombre_banco']=='') {
				$data['status'] = 300;
				$data['none'] = 'nombre_banco';
				$data['message'] = 'Escribe nombre del banco';
			}elseif($_POST['nombre_corto_banco']=='') {
				$data['status'] = 300;
				$data['none'] = 'nombre_corto_banco';
				$data['message'] = 'Escribe un nombre corto del banco';
			}else{
				if(!empty($_FILES)){
					if (isset($_FILES['imagen']['name'])) {
						$fileInfo = array(
	                        'file' => $_FILES["imagen"]["tmp_name"],
	                        'name' => $_FILES['imagen']['name'],
	                        'size' => $_FILES["imagen"]["size"],
	                        'type' => $_FILES["imagen"]["type"],
	                        'types' => 'jpg,png,gif,jpeg,webp',
	                        'crop' => array(
	                            'width' => 200,
	                            'height' => 200
	                        )
	                    );
                   		$media    = lui_addImages_load($fileInfo);
                   		if (!empty($media) && !empty($media['filename'])) {
		                    $images = $media['filename'];
		                }

		                if (!empty($images)) {
		                	$arraydatoscuenta = array(
								'nombre_cuenta'      => $_POST['nombre'],
								'moneda'             => $_POST['currency'],
								'numero_de_cuenta'   => $_POST['numero_c'],
								'cci'                => $_POST['numero_cci'],
								'banco_nombre'       => $_POST['nombre_banco'],
								'banco_nombre_corto' => $_POST['nombre_corto_banco'],
								'estado'             => 1,
								'activo'             => 1,
								'banco_logo'         => $images,
								'tipo_de_cuenta'     => 'CORRIENTE'
							);
		                    $cuentas_corrientes_empresa = $db->where('es_empresa', 1)->where('estado',0)->getOne("cuentas_corrientes");
		                    if (!empty($cuentas_corrientes_empresa)) {
		                        $db->where('id', $cuentas_corrientes_empresa->id)->update("cuentas_corrientes", $arraydatoscuenta);
		                        $data = array(
									'status' => 200
								);
		                    } else {
		                        $data['status'] = 400;
								$data['message'] = 'Revisa los detalles';
		                    }
		                }else{
		                	$data['status'] = 400;
							$data['message'] = 'Revisa los detalles img';
		                }
			            
			            
			        }else{
			        	$data['status'] = 400;
						$data['message'] = 'No se encontro datos';
			        }


					
				}else{
					$data['status'] = 400;
					$data['message'] = 'No se encontro imagenes d';
				}
				
			}
		}else{
			$data['status'] = 400;
		}
		header("Content-type: application/json");
        echo json_encode($data);
        exit();
	}

	if($s == 'selecct') {
		if (!empty($_POST['hash'])){
			if(!empty($_POST['base'])) {
				$dataarray = array(
					'banco_select' => $_POST['base']
				);

				$db->where('user_id', lui_Secure($wo['user']['user_id']))->update(T_USERS, $dataarray);
                $data = array(
                	'status' => 200
                );
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

	if($s == 'depo_init') {
		if (!empty($_POST['hash'])){
			$cuentas_corrientes_mov = $db->where('linea', 1)->where('tipo', 1)->where('estado',0)->where('usuario',lui_Secure($wo['user']['user_id']))->where('sucursal',$wo['user']['sucursal'])->where('id_cuenta_corriente',$wo['user']['banco_select'])->getOne("cuentas_corrientes_transactions");
			$usuario_b = $wo['user']['user_id'];
			$sucursal_actual = $wo['user']['sucursal'];
			$cuenta_corrient = $wo['user']['banco_select'];
			if(empty($cuentas_corrientes_mov)) {
				$query  = mysqli_query($sqlConnect, " INSERT INTO cuentas_corrientes_transactions (`linea`,`usuario`,`sucursal`,`id_cuenta_corriente`,`tipo`) VALUES (1,'{$usuario_b}','{$sucursal_actual}','{$cuenta_corrient}',1) ");
				if ($query) {
                    $data = array(
                        'status' => 200
                    );
                } else {
                    $data['status']  = 400;
                    $data['message'] = 'Por favor comprueba tus detalles';
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

	if($s == 'dep_inline') {
		require_once './luisincludes/librerias/PhpSpreadsheet-master/vendor/mpdf/mpdf/vendor/autoload.php';
        $generator = new Mpdf\Barcode();
		if (!empty($_POST['hash'])){
			$cuentas_corrientes_mov = $db->where('linea', 1)->where('tipo', 1)->where('estado',0)->where('usuario',lui_Secure($wo['user']['user_id']))->where('sucursal',$wo['user']['sucursal'])->where('id_cuenta_corriente',$wo['user']['banco_select'])->getOne("cuentas_corrientes_transactions");
			if(!empty($cuentas_corrientes_mov)) {
				if($_POST['base']=='') {
                    $data['status']  = 400;
                    $data['message'] = 'Agrega el numero de operacion';
                }elseif($_POST['monto']=='') {
                    $data['status']  = 400;
                    $data['message'] = 'No se puede depositar el monto vacio o en 0.';
                } else{
                	$fechaHora = date("Y-m-d H:i:s");
                	$numero_operacion_banco = $generator->getBarcodeArray($cuentas_corrientes_mov['id'], 'EAN13');
                	$dataarrayinline = array(
                		'estado'            => 1,
                		'numero_operacion'  => $_POST['base'],
						'monto'             => $_POST['monto'],
						'fecha_transaccion' => $fechaHora,
						'operacion'         => $numero_operacion_banco['code'],
						'nota'              => 'DEPOSITO'
					);

					$db->where('id', $cuentas_corrientes_mov['id'])->update('cuentas_corrientes_transactions', $dataarrayinline);
                    $data = array(
                        'status' => 200
                    );
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

	if($s == 'clean_dep_inline') {
		if (!empty($_POST['hash'])){
			$cuentas_corrientes_mov = $db->where('linea', 1)->where('tipo', 1)->where('estado',0)->where('usuario',lui_Secure($wo['user']['user_id']))->where('sucursal',$wo['user']['sucursal'])->where('id_cuenta_corriente',$wo['user']['banco_select'])->getOne("cuentas_corrientes_transactions");
			if(!empty($cuentas_corrientes_mov)) {
				$db->where('id', $cuentas_corrientes_mov['id'])->where('estado',0)->delete("cuentas_corrientes_transactions");
                $data = array(
                	'status' => 200
                );
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
