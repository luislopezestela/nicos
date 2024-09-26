<?php
require_once('./luisincludes/librerias/vendor/dompdf/dompdf/vendor/autoload.php');
use Dompdf\Dompdf;
use Dompdf\Options;
if ($f == 'pdfsave') {
    if (!file_exists('upload/documentos/facturas/' . date('Y') . '/' . date('m'))) {
        @mkdir('upload/documentos/facturas/' . date('Y') . '/' . date('m'), 0777, true);
    }
    $folder   = 'documentos';
    $folderb   = 'facturas';
    if (empty($folder) || empty($folderb)) {
        return false;
    }
    $direc = realpath(__DIR__ . "/../upload/{$folder}/{$folderb}/". date('Y') . '/' . date('m'));
    $direcs         = "upload/{$folder}/{$folderb}/" . date('Y') . '/' . date('m');
    if (!empty($_POST['id'])) {
        $id = lui_Secure($_POST['id']);
        $wo['purchase'] = $db->where('hash_id', $id)->getOne(T_VENTAS);
        $wo['sucursalventa'] = $db->where('id', $wo['purchase']['sucursal'])->getOne(T_SUCURSALES);
        if (!empty($wo['purchase'])) {
            $orders = $db->orderBy('orden', 'asc')->objectbuilder()->where('id_comprobante_v',$wo['purchase']['id'])->get(T_INVENTARIO);
            if (!empty($orders)) {
                $wo['total'] = 0;
                $wo['total_final_price'] = 0;
                $wo['address_id'] = 0;
                $user_id = 0;
                $wo['html'] = '';
                $wo['htmlpdf'] = '';
                $wo['main_product'] = '';
                $productos_vistos = [];
                foreach ($orders as $order) {
                    $producto = lui_GetProduct($order->producto);
                    $producto_id = $producto['id'];
                    $wo['main_product'] = $producto;
                    if (in_array($producto_id, $productos_vistos)) {
                        continue;
                    }
                    $variantes_color = [];
                    foreach ($orders as $item) {
                        if ($item->producto == $producto_id) {
                            $variantes_color[] = $item;
                        }
                    }
                    $variantes_atributos = [];
                    $atributos = $db->objectbuilder()->where('id_imventario', $order->id)->get('imventario_atributos');
                    foreach ($atributos as $atributo) {
                        $variantes_atributos[$atributo->id_atributo][] = $atributo->id_atributo_opciones;
                    }
                    $identificador_unico = $wo['purchase']['id'] . '_' . $producto_id;
                    foreach ($variantes_atributos as $atributo => $opciones) {
                        $identificador_unico .= '_' . implode('_', $opciones);
                    }
                    if (in_array($identificador_unico, $productos_vistos)) {
                        continue;
                    }
                    $indexdefault_currency = array_search($variantes_color[0]->currency, array_column($wo['currencies'], 'text'));

                    $wo['producto']['id'] = $producto['id'];
                    $wo['producto']['id_productos'] =  $identificador_unico;
                    $wo['producto']['id_imventarios'] =  $order->id;
                    $wo['producto']['units'] = $producto['units'];
                    $wo['producto']['images'] = $producto['images'];
                    $wo['producto']['name'] = $producto['name'];
                    $wo['producto']['modelo'] = $producto['modelo'];
                    $wo['producto']['sku'] = $producto['sku'];
                    $wo['producto']['comprap'] = $wo['purchase']['id'];
                    $wo['producto']['symbol'] = (!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['symbol'] : '';
                    $wo['producto']['inventario'] = $variantes_color[0]->id;
                    $wo['producto']['color'] = $variantes_color[0]->color;
                    $wo['producto']['precio'] = $variantes_color[0]->precio;

                    $cantidad_productos = 0;
                    if (!empty($variantes_atributos)) {
                        $sql = "SELECT COUNT(*) AS cantidad FROM imventario WHERE producto = {$producto['id']} AND id_comprobante_v = {$wo['purchase']['id']}";
                        foreach ($variantes_atributos as $atributo => $opciones) {
                            foreach ($opciones as $opcion) {
                                $sql .= " AND id IN (SELECT id_imventario FROM imventario_atributos WHERE id_atributo = {$atributo} AND id_atributo_opciones = {$opcion})";
                            }
                        }
                        $cantidad_productos = $db->rawQueryOne($sql)['cantidad'];
                    } else{
                        $cantidad_productos = $db->where('id_comprobante_v', $wo['purchase']['id'])->where('producto', $wo['producto']['id'])->where('color', $wo['producto']['color'])->getValue('imventario', 'COUNT(*)');
                    }


                    if (empty($wo['main_product'])) {
                        $wo['main_product']['in_title'] = url_slug($wo['main_product']['name'], array(
                            'delimiter' => '-',
                            'limit' => 100,
                            'lowercase' => true,
                            'replacements' => array(
                                '/\b(an)\b/i' => 'a',
                                '/\b(example)\b/i' => 'Test'
                            )
                        ));
                    }
                    $wo['total'] = $cantidad_productos;
                    $user_id = $wo['purchase']['user_id'];
                    $subtotaldeitem = $variantes_color[0]->precio*$cantidad_productos;
                    $atributos_inv = $db->objectbuilder()->where('id_imventario', $wo['producto']['inventario'])->get('imventario_atributos'); 
                    if (!empty($variantes_atributos)){
                        $atributos_producto_principal = [];
                        foreach ($variantes_atributos as $atributo => $opciones){
                            $nombre_atributo = $db->where('id', $atributo)->getOne('atributos')['nombre'];
                            $valores_opciones_atributo = [];
                            foreach ($opciones as $opcion){
                                if($nombre_atributo=='Color'){
                                    $buscar_nombre_de_color = $db->where('id', $opcion)->getOne('lui_products_colores')['lang_key'];
                                    $nombre_opcion_atributo = $wo['lang'][$buscar_nombre_de_color];
                                }else{
                                    $nombre_opcion_atributo = $db->where('id', $opcion)->getOne('atributos_opciones')['nombre'];
                                }
                                $valores_opciones_atributo[] = $nombre_opcion_atributo;
                            }
                            $atributos_producto_principal[$nombre_atributo] = $valores_opciones_atributo;
                        }
                    }

                    $wo['html'] .= '<tr>
                    <td>' . $cantidad_productos . '</td>
                    <td>';
                    $added = false;
                    $wo['html'] .= $wo['main_product']['name'];
                    if (isset($atributos_inv)) {
                        if (!empty($variantes_atributos)) {
                            $wo['html'] .= ', ';
                            $added = true;

                            foreach ($atributos_producto_principal as $atributo => $valores) {
                                $wo['html'] .= '<span>' . $atributo . ': ' . implode(', ', $valores) . '</span><br>';
                            }
                        } else {
                            $opciones_del_producto = lui_poner_en_lista_las_opciones($wo['producto']['id']);
                            if ($opciones_del_producto) {
                                if (!$added) {
                                    $wo['html'] .= ', ';
                                }
                                $color_producto_sin_atributos = $db->where('id', $wo['producto']['color'])->getOne('lui_products_colores')['lang_key'];
                                $wo['html'] .= '<span>Color: ' . $wo['lang'][$color_producto_sin_atributos] . '</span>';
                            }
                        }
                    }

                    $wo['html'] .= '</td>
                                        <td>' . $wo['producto']['symbol'] . ' ' . number_format(($variantes_color[0]->precio), 2) . '</td>
                                        <td><span class="font-weight-semibold">' . $wo['config']['currency_symbol_array'][$order->currency] . ' ' . number_format(($subtotaldeitem), 2) . '</span></td>
                                    </tr>';


                    $productos_vistos[] = $identificador_unico;
                }

                $wo['product_owner'] = lui_UserData($wo['purchase']['id_del_vendedor']);
                $wo['sucursal'] = $wo['sucursalventa']['nombre'];
                $wo['htmlpdf'] = lui_LoadPage('pdf/invoice');
                
                // Initialize Dompdf
                $options = new Options();
                $options->set('defaultFont', 'Arial');
                $options->set('isHtml5ParserEnabled', true);
                $options->set('isPhpEnabled', true);
                $options->set('isRemoteEnabled', true);
                $options->set( 'defaultMediaType', 'all' );
                $dompdf = new Dompdf($options);
                // Load content into Dompdf
                $dompdf->loadHtml($wo['htmlpdf'], 'UTF-8');

                // Set paper size
                $dompdf->setPaper('A4', 'portrait');

                // Render PDF
                $dompdf->render();

                $output = $dompdf->output();

                $nombredeinvoice = $direcs.'/boleta_' .$id. '.pdf';
                $data['status'] = 200;
                $data['pdf_url'] = $wo['config']['site_url'].'/'.$nombredeinvoice;
                file_put_contents($nombredeinvoice, $output);
            } else {
                $data['message'] = $error_icon . $wo["lang"]["order_not_found"];
            }
        } else {
            $data['message'] = $error_icon . $wo["lang"]["you_are_not_purchased"];
        }
    } else {
        $data['message'] = $error_icon . $wo["lang"]["id_can_not_empty"];
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}