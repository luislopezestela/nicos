<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura Elegante</title>
    <style>
        @page {
            size: A4;
            margin: 20mm;
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
        }

        /* Cabecera de la factura */
        .invoice_header {
            width: 100%;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
            display: table;
        }

        .invoice_logo {
            display: table-cell;
            width: 50%;
            vertical-align: middle;
        }

        .invoice_logo img {
            width: 120px;
            height: auto;
        }

        .invoice_title {
            display: table-cell;
            width: 50%;
            vertical-align: middle;
            text-align: right;
        }

        .invoice_title h1 {
            font-size: 18px;
            color: #000;
            margin: 0;
            font-weight: bold;
        }

        .invoice_title p {
            margin: 3px 0;
            font-size: 12px;
        }

        /* Detalles del vendedor y cliente */
        .invoice_details {
            width: 100%;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        .invoice_info {
            width: 48%;
            float: left;
        }

        .invoice_info h3 {
            font-size: 14px;
            color: #000;
            margin-bottom: 8px;
        }

        .invoice_info p {
            margin: 5px 0;
            font-size: 12px;
        }

        .clear {
            clear: both;
        }

        /* Tabla de productos */
        table.invoice_table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
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

        /* Pie de factura */
        .invoice_footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="invoice_container">
        <!-- Cabecera con logo y título -->
        <div class="invoice_header">
            <div class="invoice_logo">
                <img src="<?php echo $wo['config']['theme_url'].'/img/logo.png'; ?>" alt="Logo">
            </div>
            <div class="invoice_title">
                <h1>LAYSHANE PERU E.I.R.L.</h1>
                <p>URB. PANAMERICANA NORTE MZA. Q LOTE. 20</p>
                <p>LOS OLIVOS - LIMA - LIMA</p>
                <h1>FACTURA ELECTRONICA</h1>
                <p>RUC: 20611292954</p>
                <p>E001-16</p>
            </div>
        </div>

        <!-- Detalles del vendedor y cliente -->
        <div class="invoice_details">
            <div class="invoice_info">
                <h3>Vendedor</h3>
                <p><strong>Nombre:</strong> <?php echo $wo['product_owner']['name']; ?></p>
                <p><strong>Email:</strong> <?php echo $wo['product_owner']['email']; ?></p>
            </div>
            <div class="invoice_info">
                <h3>Cliente</h3>
                <p><strong>RUC:</strong>20607933988</p>
                <p><strong>Señor(es):</strong> INTERMAX TIC S.A.C. <?php //echo $wo['user']['name']; ?></p>
                <p><strong>Dirección:</strong> <?php echo $wo['user']['address']; ?></p>
                <p><strong>Email:</strong> <?php echo $wo['user']['email']; ?></p>
            </div>
            <div class="clear"></div>
        </div>

        <!-- Tabla de productos -->
        <table class="invoice_table">
            <thead>
                <tr>
                    <th>Artículo</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $wo['html']; ?>
            </tbody>
        </table>

        <!-- Totales -->
        <div class="invoice_totals">
            <div class="totals_details">
                <p>Subtotal: <?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']]; ?><?php echo $wo['total']; ?></p>
                <p>Comisión: <?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']]; ?><?php echo $wo['total_commission']; ?></p>
                <p class="total_amount">Total: <?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']]; ?><?php echo $wo['total_final_price']; ?></p>
            </div>
        </div>

        <!-- Pie de factura -->
        <div class="invoice_footer">
            <p>#<?php echo $wo['purchase']['hash_id'] ?></p>
            <p>Gracias por su compra.</p>
        </div>
    </div>
</body>
</html>
