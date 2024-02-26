<?php
$lang = new DatosLang();
$lang->columna = $_POST['langs'];
unlink("datos/language/".$_POST['langs'].'.php');
$lang->eliminar_language_file();