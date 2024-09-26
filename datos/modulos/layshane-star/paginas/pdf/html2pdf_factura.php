<style type="text/css">
/* Contenedor principal de la factura */
.invoice_container {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 210mm;
    min-height: 296mm; /* min-height para que crezca según el contenido */
    margin: 0 auto;
    background-color: #fff;
    padding: 10mm;
    box-sizing: border-box;
    border-radius: 8px;
    position: relative; /* Posición relativa para el pie de página */
}

/* Encabezado de la factura */
.invoice_header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 2px solid #e0e0e0;
    padding-bottom: 20px;
    page-break-inside: avoid; /* Evitar que se rompa en medio */
}

.invoice_logo img {
    width: 150px;
}

.invoice_title {
    font-size: 28px;
    font-weight: bold;
    color: #333;
}

/* Información de la factura */
.invoice_details {
    margin-top: 20px;
    display: flex;
    justify-content: space-between;
    page-break-inside: avoid; /* Evitar que se rompa en medio */
}

.invoice_details .invoice_info {
    width: 48%;
}

.invoice_details h3 {
    font-size: 18px;
    margin-bottom: 10px;
    color: #2196f3;
}

.invoice_details p {
    margin: 5px 0;
    color: #555;
}

/* Tabla de items */
.invoice_table {
    width: 100%;
    margin-top: 30px;
    border-collapse: collapse;
}

.invoice_table th, .invoice_table td {
    border: 1px solid #e0e0e0;
    padding: 12px;
    text-align: left;
}

.invoice_table th {
    background-color: #f9f9f9;
    font-weight: bold;
    color: #333;
}

.invoice_table td {
    background-color: #fff;
    color: #555;
}

.invoice_table {
    page-break-inside: auto; /* Permitir que la tabla se divida entre páginas */
}

/* Totales */
.invoice_totals {
    margin-top: 20px;
    display: flex;
    justify-content: flex-end;
    page-break-inside: avoid; /* Evitar ruptura en medio */
}

.invoice_totals .totals_details {
    width: 300px;
}

.invoice_totals p {
    display: flex;
    justify-content: space-between;
    margin: 5px 0;
    font-size: 16px;
    color: #555;
}

.invoice_totals p.total_amount {
    font-size: 18px;
    font-weight: bold;
    color: #333;
}

/* Pie de página (Mantenerlo en la parte inferior) */
.invoice_footer {
    margin-top: auto; /* Se empuja al final de la página usando flexbox */
    text-align: center;
    color: #777;
    font-size: 14px;
    page-break-inside: avoid; /* Evitar que se rompa el pie de página */
}

</style>


<div class="invoice_container" id="invoice_<?php echo($wo['purchase']['id']) ?>">
    <!-- Página 1 -->
    <div class="invoice_header">
        <div class="invoice_logo">
            <img src="<?php echo  $wo['config']['theme_url'].'/img/logo.png';?>" alt="Logo">
        </div>
        <div class="invoice_title">
            <?php echo $wo["lang"]["sale_invoice"] ?>
            <p style="font-size: 16px; color: #777;">#<?php echo($wo['purchase']['hash_id']) ?></p>
            <p style="font-size: 14px; color: #777;"><?php echo(date('d/m/Y', strtotime($wo['purchase']['time']))) ?></p>
        </div>
    </div>

    <div class="invoice_details">
        <div class="invoice_info">
            <h3>Vendedor</h3>
            <p><strong><?php echo $wo["lang"]["seller_name"] ?>:</strong> <?php echo($wo['product_owner']['name']) ?></p>
            <p><strong><?php echo $wo["lang"]["seller_email"] ?>:</strong> <?php echo($wo['product_owner']['email']) ?></p>
        </div>
        <div class="invoice_info">
            <h3><?php echo $wo["lang"]["invoice_to"] ?></h3>
            <p><strong><?php echo $wo['user']['name'] ?></strong></p>
            <p><?php echo $wo['user']['address'] ?></p>
            <p><?php echo $wo['user']['email'] ?></p>
        </div>
    </div>

    <table class="invoice_table">
        <thead>
            <tr>
                <th><?php echo $wo["lang"]["item"] ?></th>
                <th><?php echo $wo["lang"]["price"] ?></th>
                <th>QTY</th>
                <th><?php echo $wo["lang"]["total"] ?></th>
            </tr>
        </thead>
        <tbody>
            <?php echo $wo['html']; ?>
        </tbody>
    </table>

    <div class="invoice_totals">
        <div class="totals_details">
            <p><span><?php echo $wo["lang"]["subtotal"] ?>:</span><span><?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']]; ?><?php echo($wo['total']) ?></span></p>
            <p><span><?php echo $wo["lang"]["commission"] ?>:</span><span><?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']]; ?><?php echo($wo['total_commission']) ?></span></p>
            <p class="total_amount"><span><?php echo $wo["lang"]["total"] ?>:</span><span><?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']]; ?><?php echo($wo['total_final_price']) ?></span></p>
        </div>
    </div>

    <div class="invoice_footer">
        <p>Gracias por su compra</p>
    </div>

    <div class="page-break"></div>
</div>

<script type="text/javascript">
    var invoice = document.getElementById("invoice_<?php echo($wo['purchase']['id']) ?>");
    
    var opt = {
        margin: 0,  // Márgenes ajustados
        filename: "<?php echo(!empty($wo['main_product']) && !empty($wo['main_product']['in_title']) ? $wo['main_product']['in_title'] : $wo['purchase']['id'] ) ?>-boleta.pdf",
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2, scrollX: 0, scrollY: 0 },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' },
        pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }  // Control de saltos de página
    };

    html2pdf().from(invoice).set(opt).save();
</script>


