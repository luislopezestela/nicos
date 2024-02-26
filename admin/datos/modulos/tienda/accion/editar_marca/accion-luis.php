<?php
$base = Luis::basepage("base_page_admin");
 $categoria = new DatosAdmin();
 $categoria->id = $_POST["id"];
 $categoria->nombre = $_POST["nombre"];
 $categoria->editar_marca();
 Nucleo::redir($base."marcas");