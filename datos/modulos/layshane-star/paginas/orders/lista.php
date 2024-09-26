<?php 
$anulados = '';
$total_productos_price = 0.00;
$total_productos_price_por_moneda = 0.00;
if($wo['comprass']['anulado']==1) {
	$anulados = "table-row--red";
}
if($wo['comprass']['anulado']==1) {
    $cantidad_de_carantia_text = '<p style="color:#dc2121;font-weight:bold;text-transform:uppercase;letter-spacing:3px;" class="table-row__policy">Anulado</p>';
    $cantidad_de_carantia = '<p class="table-row__policy">'.date('Y-m-d',strtotime($wo['comprass']['fecha_anulado'])).'</p>';
}else{
    $cantidad_de_carantia_text = false;
    $cantidad_de_carantia = false;
}

$proveedor = $db->where('id', $wo['comprass']['proveedor'])->getOne("lui_proveedores");
$fechaped = false;
if(!empty($wo['comprass']['time'])){
	$fechaped = date("Y-m-d", $wo['comprass']['time']);
}
$fecha = false;
if(!empty($wo['comprass']['fecha'])){
    $fecha = date("Y-m-d", strtotime($wo['comprass']['fecha']));
}
$estadodeventa = estadodeventaVendedor($wo['comprass']['estado_venta']);
$data_hash_ids = $wo['comprass']['hash_id'];
if ($wo['comprass']['estado_venta']==0) {
    $ventas_actions = 'onclick="changue_order_page(`'.$data_hash_ids.'`);"';
}else{
    $ventas_actions = '';
}

?>
<?php $verificar_pedido = $db->where('estado_venta',1)->where('id_del_vendedor',$wo['user']['user_id'])->getOne(T_VENTAS); ?>

<div class="pedido" data-orders-id="<?php echo $wo['comprass']['id']; ?>">
    <a <?=$ventas_actions;?> href="<?php echo lui_SeoLink('index.php?link1=order&id='.$wo['comprass']['hash_id']); ?>" data-ajax="<?php echo ('?link1=order&id='.$wo['comprass']['hash_id']); ?>">
        <div class="pedido-header">
            <h1 class="id">#<?php echo $wo['comprass']['hash_id']; ?></h1>
            <p><strong>Fecha de pedido:</strong> <?=$fechaped;?></p>
            <p><strong>Fecha entrega:</strong> <?=$fecha;?></p>
            <p><strong>Estado:</strong> <span style="color:<?=$estadodeventa['background'];?>"><?=$estadodeventa['estado_ventas'];?></span></p>
        </div>
        <div class="pedido-items">
            <?php $wo['eninventario'] = $db->where('id_sucursal', $wo['user']['sucursal'])->where('id_comprobante_v',$wo['order']['id'])->orderBy('id', 'DESC')->groupBy('atributo')->get('imventario');?>
            <?php if (!empty($wo['eninventario'])): ?>
                <p class="producto-nombre">
                    <?php foreach ($wo['eninventario'] as $key2 => $wo['order_inv']): ?>
                        <?php $wo['product'] = $db->where('id', $wo['order_inv']['producto'])->getOne(T_PRODUCTS, array('name')); ?>
                        <?=$wo['product']['name'];?>,
                    <?php endforeach ?>
                </p>
            <?php endif ?>
        </div>
        <?php $cantidad_prod_por_moneda = $db->where('id_comprobante_v', $wo['comprass']['id'])->where('estado', '2')->where('id_sucursal',$wo['user']['sucursal'])->groupBy('currency')->get('imventario') ?>
        <?php foreach ($cantidad_prod_por_moneda as $cantidades): ?>
            <?php $total_productos_por_moneda = $db->where('id_comprobante_v',$wo['comprass']['id'])->where('estado','2')->where('id_sucursal',$wo['user']['sucursal'])->where('currency',$cantidades['currency'])->getValue('imventario','COUNT(*)');
                if ($total_productos_por_moneda>0) {
                    $total_productos_price_por_moneda = $db->where('id_comprobante_v',$wo['comprass']['id'])->where('estado','2')->where('id_sucursal',$wo['user']['sucursal'])->where('currency',$cantidades['currency'])->getValue('imventario','SUM(precio)');
                }
                $indexdefault_currency = array_search($cantidades['currency'], array_column($wo['currencies'], 'text'));
                $monedaf_s = (!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['text'] : '';
                $monedaf = (!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['symbol'] : '';
            ?>
            <p><strong><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M5,6H23V18H5V6M14,9A3,3 0 0,1 17,12A3,3 0 0,1 14,15A3,3 0 0,1 11,12A3,3 0 0,1 14,9M9,8A2,2 0 0,1 7,10V14A2,2 0 0,1 9,16H19A2,2 0 0,1 21,14V10A2,2 0 0,1 19,8H9M1,10H3V20H19V22H1V10Z"></path></svg> <?php echo $wo['lang']['price']; ?></strong>: <?php echo $monedaf.' '.$total_productos_price_por_moneda; ?></p>
            <p><strong><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M11,13.5V21.5H3V13.5H11M12,2L17.5,11H6.5L12,2M17.5,13C20,13 22,15 22,17.5C22,20 20,22 17.5,22C15,22 13,20 13,17.5C13,15 15,13 17.5,13Z"></path></svg> <?php echo $wo['lang']['qty']; ?></strong>: <?php echo $total_productos_por_moneda; ?>
            </p>
        <?php endforeach ?>
        <div class="">
            <?=$cantidad_de_carantia_text;?>
            <?=$cantidad_de_carantia;?>
        </div>
    </a>
</div>