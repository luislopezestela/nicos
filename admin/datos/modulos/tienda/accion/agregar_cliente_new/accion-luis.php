<?php
$sirectpage=DatosAdmin::poner_guion(strip_tags($_POST["nombre"]))."_".DatosAdmin::poner_guion(strip_tags($_POST["apellido_paterno"]))."_".DatosAdmin::poner_guion(strip_tags($_POST["apellido_materno"]));
$cliente_view=DatosAdmin::cliente_ver_por_ukr($sirectpage);

if($cliente_view==null){
	$dat = new DatosAdmin();
	$dat->tipo = $_POST['linedefault'];
	$dat->nombre = $_POST['nombre'];
	$dat->apellido_paterno = $_POST['apellido_paterno'];
	$dat->apellido_materno = $_POST['apellido_materno'];
	$dat->dni = $_POST['dni'];
	$dat->celular = $_POST['celular'];
	$dat->direccion = $_POST['direccion'];
	$dat->ukr = $sirectpage;
	$dat->correo = $_POST['correo'];
	$dat->pass = sha1(md5($_POST['pass']));
	$dat->vendedor = $_SESSION['admin_id'];
	$dat->new_client_in_page_orders();
	echo json_encode(array('estado' => 1, 'mensaje' => "Cliente creado con exito"));
}else{
	echo json_encode(array('estado' => 0, 'mensaje' => "El usuario ya existe"));
}