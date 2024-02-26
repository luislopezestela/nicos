<?php
if(!empty($_POST)){
$alpha="abcdefgihjklmnopqrstuvwxyz123456780";
$codigodeactivacion="";
for($i=0;$i<10;$i++){
	$codigodeactivacion.= $alpha[rand(0,strlen($alpha)-1)];
}
$usuario = new DatosUsuario();
$usuario->funcion = $_POST["linedefault"];
$usuario->nombre = htmlentities($_POST['nombre']);
$usuario->apellido = htmlentities($_POST['apellido']);
$usuario->codigo = $codigodeactivacion;
$usuario->dni = $_POST['dni'];
$usuario->celular = $_POST['celular'];
$usuario->direccion = $_POST['direccion'];
$usuario->correo = $_POST['correo'];
$usuario->pass = sha1(md5($_POST['pass']));
$usuario->ukr=DatosAdmin::poner_guion(strip_tags($_POST["nombre"]."-".$_POST['apellido']));
if($_POST["linedefault"]==2){
	$usuario->sucursal=$_POST['sucursal'];
	$usuario->agregar_usuario_b();
}else{
	$usuario->agregar_usuario();
}
echo "Usuario agregado con exito";
}