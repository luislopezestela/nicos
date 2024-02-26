<?php
$basepagina = Luis::basepage("base_page_admin");
$sucursal = DatosUsuario::porId($_SESSION["admin_id"]);
if($sucursal->tipo==1){
	DatosAdmin::noes_principal();
	DatosAdmin::aser_principal($_GET["id"]);
	Nucleo::redir($basepagina."sucursales");
}
