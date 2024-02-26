<?php
if($_SESSION["admin_id"]){
	$idioma = DatosLang::luis_lang_bd_names();
	$palabra = new DatosLang();
	$palabra->lang_key_name = Luis::poner_subguion(html_entity_decode($_POST["spanish"]));
	$valord=false;
	$d=$palabra->agregar_palabra_languages();
	if($d[1]) {
		$palabras = new DatosLang();
		foreach ($idioma as $key) {
			foreach ($_POST as $ky => $data) {
				if ($ky===$key) {
					$palabras->columnadata=$key;
					$palabras->datavalue=html_entity_decode($data);
				}
			}
			$palabras->agregar_palabra_languages_two($d[1]);
		}
		$data = array('estado' => 200);
	}else{
		$data = array('estado' => 400);
	}
	header("Content-type: application/json");
    echo json_encode($data);
    exit();
}