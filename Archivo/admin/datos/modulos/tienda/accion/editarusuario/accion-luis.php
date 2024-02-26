<?php
if(!empty($_POST)){
$usuario = DatosUsuario::porId($_POST['id']);
$usuario->funcion = $_POST["linedefault"];
$usuario->nombre = htmlentities($_POST['nombre']);
$usuario->apellido = htmlentities($_POST['apellido']);
$usuario->dni = $_POST['dni'];
$usuario->celular = $_POST['celular'];
$usuario->direccion = $_POST['direccion'];
$usuario->correo = $_POST['correo'];
$usuario->sucursal=$_POST['sucursal'];
$usuario->editarusuarioadmin();
$usuario->ukr=DatosAdmin::poner_guion(strip_tags($_POST["nombre"]."-".$_POST['apellido']));


if($_POST["pass"]!=""){
$usuario->pass = sha1(md5($_POST['pass']));
$usuario->editarpass();
}
echo "Usuario editado con exito";
}