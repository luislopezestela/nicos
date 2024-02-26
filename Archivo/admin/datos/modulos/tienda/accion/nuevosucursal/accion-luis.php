<?php
$basepagina = Luis::basepage("base_page_admin");
$d = new DatosAdmin();
$d->nombre = htmlentities($_POST["nombre"]);
$d->direccion = htmlentities($_POST["direccion"]);
$d->departamento = $_POST["departamento"]; 
$d->provincia = $_POST["provincia"];
$d->distrito = $_POST["distrito"];
$d->referencia = htmlentities($_POST["referencia"]);
$d->latitud = $_POST["latitud"];
$d->longitud = $_POST["longitud"];
$d->zoom = $_POST["zoom"];
$d->agregar_sucursal();
Nucleo::redir($basepagina."sucursales");
?>