<?php
$lang = new DatosLang();
$lang->columna = $_POST['langs'];
$lang->data_cols = Luis::poner_subguion(html_entity_decode($_POST["langs_data"]));
$lang->guardar_cambios_language_files();
echo Luis::poner_subguion(html_entity_decode($_POST["langs_data"]));