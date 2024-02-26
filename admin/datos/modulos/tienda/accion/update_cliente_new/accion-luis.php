<?php
if(!empty($_POST)){
$usuario = DatosAdmin::por_el_id_cliente($_POST['id']);
$usuario->tipo = $_POST["linedefault"];
$usuario->nombre = htmlentities($_POST['nombre']);
$usuario->apellido_paterno = htmlentities($_POST['apellido_paterno']);
$usuario->apellido_materno = htmlentities($_POST['apellido_materno']);
$usuario->dni = $_POST['dni'];
$usuario->celular = $_POST['celular'];
$usuario->direccion = $_POST['direccion'];
$usuario->correo = $_POST['correo'];
$usuario->ukr=DatosAdmin::poner_guion(strip_tags($_POST["nombre"]."-".$_POST['apellido_paterno']."-".$_POST['apellido_materno']));
$usuario->update_client_in_pages_data();


if($_POST["pass"]!=""){
$usuario->pass = sha1(md5($_POST['pass']));
$usuario->editarpass_clients_in_page();
}
echo json_encode(array('estado' => 1, 'mensaje' => "Datos actualizadoscon exito"));
}