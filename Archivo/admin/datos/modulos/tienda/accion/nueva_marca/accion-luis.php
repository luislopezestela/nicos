<?php
$base = Luis::basepage("base_page_admin");
$m =  new DatosAdmin();
$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
$codigos = "";
for($i=0;$i<11;$i++){
    $codigos .= $alphabeth[rand(0,strlen($alphabeth)-1)];
}
$m->nombre = htmlentities($_POST["nombre"]);
$m->codigo = $codigos;
$m->agregar_marca();
Nucleo::redir($base."marcas");