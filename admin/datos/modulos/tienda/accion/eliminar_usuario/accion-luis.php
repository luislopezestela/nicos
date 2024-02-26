<?php 
$d = new DatosUsuario();
$di = DatosUsuario::MostrarParaEditar($_POST["id"]);
$d->id = $_POST['id'];
$im = $di->foto_perfil;
if($di->foto_perfil==null){}else{
unlink("datos/imagenes/usuarios/$im");
}
$d->eliminar();
echo "Usuario eliminado";