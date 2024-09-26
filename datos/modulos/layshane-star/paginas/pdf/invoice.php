<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boleta</title>
    <style>
        @page {
            size: A4;
            margin: 10mm;
        }
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .invoice_container {
            width: 100%;
            margin: 0 auto;
            padding: 0;
            margin-bottom: 10px;
        }

        /* Cabecera de la factura */
        .invoice_header {
            width: 100%;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .invoice_header table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice_header td {
            vertical-align: middle;
        }

        .invoice_logo img {
            width: 120px;
            height: auto;
            object-fit: contain;
        }

        .invoice_company {
            text-align: left;
        }

        .invoice_title {
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }

        .invoice_title p {
            font-size: 14px;
            color: #000;
            margin: 0;
            font-weight: bold;
        }

        /* Detalles del vendedor y cliente */
        .invoice_details {
            width: 100%;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            overflow: hidden;
        }

        .invoice_info {
            width: 48%;
            display: inline-block;
            vertical-align: top;
            margin-right: 2%;
        }

        .invoice_info:last-child {
            margin-right: 0;
        }

        .invoice_info p {
            margin: 5px 0;
            font-size: 12px;
        }

        /* Tabla de productos */
        table.invoice_table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }

        table.invoice_table th,
        table.invoice_table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table.invoice_table th {
            background-color: #f5f5f5;
        }

        /* Totales */
        .invoice_totals {
            width: 100%;
            text-align: right;
            margin-top: 20px;
        }

        .totals_details {
            margin-bottom: 20px;
        }

        .totals_details p {
            margin: 5px 0;
        }

        .totals_details .total_amount {
            font-size: 16px;
            font-weight: bold;
        }

        .invoice_footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 12px;
            color: #777;
        }

    </style>
</head>
<body>
    <?php $registros_cajaw = $db->where('id_venta', $wo['purchase']['id'])->where('estado', 1)->get(T_CASH_REGISTRO); ?>
    <?php if (count($registros_cajaw)>0): ?>
        <?php $registros_caja = $registros_cajaw; ?>
    <?php else: ?>
        <?php $registros_caja = $db->where('id_comprobante_v', $wo['purchase']['id'])->get('imventario'); ?>
    <?php endif ?>
    
    <!-- Pie de factura -->
    <div class="invoice_footer">
        <p>#<?php echo $wo['purchase']['hash_id'] ?></p>
        <p>Gracias por su compra.</p>
    </div>
    <div class="invoice_container">
        <!-- Cabecera con tabla -->
        <div class="invoice_header">
            <table>
                <tr>
                    <td class="invoice_logo">
                        <img src="<?php echo $wo['config']['theme_url'].'/img/logo.png'; ?>" alt="Logo">
                    </td>
                    <td class="invoice_company">
                        <strong>LAYSHANE PERU E.I.R.L.</strong><br>
                        RUC: 20611292954<br>
                        URB. PANAMERICANA NORTE MZA. Q LOTE. 20<br>
                        LOS OLIVOS - LIMA - LIMA <br>
                        Email: <?php echo $wo['config']['siteEmail']; ?>
                    </td>
                    <td class="invoice_title">
                        <?php if ($wo['purchase']['num_doc']==0): ?>
                            <p>EN ESPERA</p>
                        <?php else: ?>
                            <p>BOLETA SIMPLE</p>
                            <p><?php echo $wo['purchase']['num_doc'] ?></p>
                        <?php endif ?>
                        
                    </td>
                </tr>
            </table>
        </div>

        

        <!-- Detalles del vendedor y cliente -->
        <div class="invoice_details">
            <div class="invoice_info">
                <p><strong>Cliente</strong></p>
                <p><strong><?php echo $wo['purchase']['user_document'] ?>:</strong> <?php echo $wo['purchase']['user_document_num'] ?></p>
                <?php if ($wo['purchase']['user_document']=='DNI'): ?>
                    <?php $personas = $db->where('dni', $wo['purchase']['user_document_num'])->getOne('personas_lista');?>
                    <?php if ($personas): $datos = json_decode($personas['datos'], true);?>
                        <p><strong>Señor(es):</strong> <?php echo $datos['nombres'] . ' ' . $datos['apellidoPaterno'] . ' ' . $datos['apellidoMaterno']; ?></p>
                        <p><strong>Dirección:</strong> <?php echo $wo['user']['address']; ?></p>
                    <?php endif ?>
                <?php elseif($wo['purchase']['user_document']=='RUC'): ?>
                    <?php $personas = $db->where('dni', $wo['purchase']['user_document_num'])->getOne('personas_lista');?>
                    <?php if ($personas): $datos = json_decode($personas['datos'], true);?>
                        <p><strong>Señor(es):</strong> <?php echo $datos['razonSocial']; ?></p>
                        <p><strong>Dirección:</strong> <?php echo $datos['direccion'].', '.$datos['distrito'].', '.$datos['provincia'].', '.$datos['departamento']; ?></p>
                    <?php endif ?>
                <?php else: ?>
                    <p><strong>Señor(es):</strong> <?php echo $wo['user']['name'] ?></p>
                    <p><strong>Dirección:</strong> <?php echo $wo['user']['address']; ?></p>
                <?php endif ?>
                <p><strong>Email:</strong> <?php echo $wo['user']['email']; ?></p>
            </div>

            <?php if ($wo['product_owner']): ?>
                <div class="invoice_info">
                    <p><strong>Vendedor</strong></p>
                    <p><strong>Nombre:</strong> <?php echo $wo['product_owner']['name']; ?></p>
                    <p><strong>Email:</strong> <?php echo $wo['product_owner']['email']; ?></p>
                    <?php if ($wo['product_owner']['phone_number']!=''): ?>
                        <p><strong>Contacto:</strong> <?php echo $wo['product_owner']['phone_number']; ?></p>
                    <?php endif ?>
                    <p><strong>Sucursal:</strong>  <?php echo $wo['sucursal']; ?></p>
                </div>
            <?php endif ?>
        </div>

        <!-- Fecha de emisión y forma de pago -->
        <div class="invoice_details">
            <div class="invoice_info">
                <?php if ($wo['purchase']['fecha']==''): ?>
                    <p><strong>Fecha de Emisión:</strong> <?php echo date('d/m/Y', $wo['purchase']['time']); ?></p>
                <?php else: ?>
                    <p><strong>Fecha de Emisión:</strong> <?php echo date('d/m/Y', strtotime($wo['purchase']['fecha'])); ?></p>
                <?php endif ?>
                <p><strong>Observación:</strong> </p>
            </div>
            <div class="invoice_info">
                <p><strong>Forma de pago:</strong> Contado</p>
                <p><strong>Tipo de Moneda:</strong>
                    <?php if (count($registros_cajaw)>0): ?>
                        <?php $monedas = array_column($registros_caja, 'moneda'); ?>
                        <?php echo implode(', ', $monedas); ?>
                    <?php else: ?>
                        <?php $monedas = array_column($registros_caja, 'currency'); ?>
                        <?php $monedas_unicas = array_unique($monedas); ?>
                        <?php echo implode(', ', $monedas_unicas); ?>
                    <?php endif ?>
                    
                    
                </p>
            </div>
        </div>

        <!-- Tabla de productos -->
        <table class="invoice_table">
            <thead>
                <tr>
                    <th>Cantidad</th>
                    <th>Descripción</th>
                    <th>Valor Unitario</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $wo['html']; ?>
            </tbody>
        </table>

        <?php if (count($registros_cajaw)>0): ?>
            <?php foreach ($registros_caja as $registro): ?>
                <?php 
                    $simboymoneda = array_search($registro['moneda'], array_column($wo['currencies'], 'text'));
                    $simbolo = (!empty($wo['currencies'][$simboymoneda]['symbol'])) ? $wo['currencies'][$simboymoneda]['symbol'] : $registro['moneda'];
                    $simbolo = $simbolo.' ';
                    $metodo = json_decode($registro['metodo'], true);
                    $totalMonto = isset($metodo['totalMonto']) ? number_format($metodo['totalMonto'], 2, '.', ',') : '0.00';
                    $metodo_texto = '';
                    foreach ($metodo as $key => $value) {
                        if ($key !== 'totalMonto' && $key !== 'hasSelected') {
                          $lastUnderscorePos = strrpos($key, '_');
                          if ($lastUnderscorePos !== false) {
                            $nombre_metodo = substr($key, 0, $lastUnderscorePos);
                          } else {
                            $nombre_metodo = $key;
                          }
                          $nombre_metodo = ucfirst(str_replace('_', ' ', $nombre_metodo));
                          $metodo_texto .= '<strong>'.$nombre_metodo . '</strong>: ' . $simbolo . number_format($value, 2, '.', ',') . '<br>';
                        }
                    }
                ?>
                <!-- Totales -->
                <div class="invoice_totals">
                    <div class="totals_details">
                        <p><?php echo $metodo_texto; ?></p>
                        <p class="total_amount"><strong>Total:</strong> <?php echo $simbolo.$totalMonto; ?></p>
                    </div>
                </div>
            <?php endforeach ?>
        <?php else: ?>
            <?php $totales_por_moneda = [];
            foreach ($registros_caja as $registro) {
                $simboymoneda = array_search($registro['currency'], array_column($wo['currencies'], 'text'));
                $simbolo = (!empty($wo['currencies'][$simboymoneda]['symbol'])) ? $wo['currencies'][$simboymoneda]['symbol'] : $registro['currency'];
                $precio = isset($registro['precio']) ? (float) $registro['precio'] : 0.00;
                if (!isset($totales_por_moneda[$registro['currency']])) {
                    $totales_por_moneda[$registro['currency']] = [
                        'simbolo' => $simbolo,
                        'total' => 0
                    ];
                }
                $totales_por_moneda[$registro['currency']]['total'] += $precio;
            }
            foreach ($totales_por_moneda as $moneda => $datos) {
                $total_formateado = number_format($datos['total'], 2, '.', ',');
                ?>
                <div class="invoice_totals">
                    <div class="totals_details">
                        <p class="total_amount"><strong>Total (<?php echo $moneda; ?>):</strong> <?php echo $datos['simbolo'] . $total_formateado; ?></p>
                    </div>
                </div>
                <?php
            }
            ?>
        <?php endif ?>
    </div>
</body>
</html>
