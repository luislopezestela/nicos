<?php
$cart = $_SESSION["carrito"];
$cnt=0;
$total = 0;
$valortotaldecompra = 0;
$controlcarts=false;
$basepagina = Luis::basepage("base_page_admin");
$p = DatosAdmin::porID_producto($_POST["identbox"]);
if(isset($_SESSION["carrito"])){

if(count($_SESSION["carrito"])>0){
	$controlcarts=false;
}else{
	$controlcarts=true;
}
}else{
	$controlcarts=true;
}

$_SESSION["carrito"]==array();
foreach ($cart as $c) {
	if($c["id_producto"]==$_POST["identbox"]){
		$carrito_count_item = $c["q"] = $_POST["btls"];
	}
	$_SESSION["carrito"][$cnt]=$c;
	$cnt++;
}


foreach($_SESSION['carrito'] as $cantidadtotalcarrito){
	$ptwo =  DatosAdmin::porID_producto($cantidadtotalcarrito["id_producto"]);
	$valortotaldecompra += $cantidadtotalcarrito["q"];
    $total += $cantidadtotalcarrito["q"]*$ptwo->precio;
}

$carhiddd='<div class="total_monto_order_list">Total <span>S/. '.number_format($total,2,".",",").'</span></div>';
$carhiddd.='<a class="button_list_order" href="'.$basepagina."carrito".'">Ir a pagar</a>';
$totalpricelist=number_format($total,2,".",",");

echo json_encode(array('estado' => "exito",'cantidad' => $valortotaldecompra, 'order' => $p->id, 'itemcount' => $carrito_count_item, 'totalprice' => $p->precio*$carrito_count_item,'totalodershops' => $carhiddd,'nullcarts' => $controlcarts,'totalpriceorderslist' => $totalpricelist));