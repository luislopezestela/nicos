<?php
$producto = DatosAdmin::porID_producto($_POST['prodc']);
$usuario=DatosUsuario::poriUsuario($_SESSION["admin_id"]);
$verifica = DatosAdmin::stock_por_item_y_codigo($_POST["prodc"],$_POST["barcode"]);

if(isset($_SESSION['admin_id'])){
	if($verifica){
		echo json_encode(array('estado' => false, 'mensaje' => "El codigo ya existe"));
	}else{
		$dat= new DatosAdmin();
		$dat->id_sucursal=$usuario->sucursal;
		$dat->proveedor=$_POST["proveedor"];
		$dat->documento=$_POST["documento"];
		$dat->num_documento=$_POST["num_documento"];
		$dat->barcode=$_POST["barcode"];
		$dat->fecha=date('Y-m-d H:i:s');
		$dat->id_producto=$_POST["prodc"];
		$dat->id_usuario=$_SESSION["admin_id"];
		if($_POST["proveedor"]==""){
			$estado=false;
			$mensaje="Selecciona el proveedor";
		}elseif($_POST["documento"]==""){
			$estado=false;
			$mensaje="Selecciona el documento";
		}elseif($_POST["num_documento"]==""){
			$estado=false;
			$mensaje="Escribe el numero del documento";
		}elseif($_POST["barcode"]==""){
			$estado=false;
			$mensaje="Escribe el numero de serie";
		}else{
			$estado=true;
			$mensaje="Stock actualizado";
			$dat->actualizar_stock_items_all();
		}
		$stcok_item=DatosAdmin::cantidad_stock_de_producto_admin_sucursal($_POST["prodc"],$usuario->sucursal)->c;
		//$stcok_item=DatosAdmin::cantidad_stock_de_producto($_POST["prodc"],$_SESSION["admin_id"])->c;
		echo json_encode(array('estado' => $estado, 'mensaje' => $mensaje,'stock' => $stcok_item));
	}
}