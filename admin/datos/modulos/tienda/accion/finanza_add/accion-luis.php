<?php
$usuario = DatosUsuario::porId($_SESSION['admin_id']);

$data = new DatosAdmin();
$data->sucursal = $usuario->sucursal;
$data->fecha = date('Y-m-d H:i:s');
$s=$data->abrir_nueva_caja();

$data->caja = $s[1];
$data->moneda = $_POST['simbol'];
$data->monto_inicial = $_POST['mont'];

$data->abrir_monto_caja();