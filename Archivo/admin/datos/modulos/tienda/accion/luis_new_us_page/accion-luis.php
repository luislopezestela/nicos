<?php
$alphabeth ="ABCDEFGHIJKLMNOPQRSTUVWYZ1234567890";
$codigos = "";
for($i=0;$i<11;$i++){
    $codigos .= $alphabeth[rand(0,strlen($alphabeth)-1)];
}

$correos = DatosMails::check_email($_POST["correo"]);
$contra = sha1(md5($_POST['pass']));
$contra2 = sha1(md5($_POST['pass_ver']));
if($correos){
	if($contra==$contra2) {
		$person = new Luis();
		$person->dni = $_POST["dni"];
		$person->nombre = htmlentities($_POST["nombres"]);
		$person->apellido_paterno = htmlentities($_POST["apellido_paterno"]);
		$person->apellido_materno = htmlentities($_POST["apellido_materno"]);
		$person->email = $_POST["correo"];
		$person->pass = $contra;
		$person->codigo = $codigos;
		$person->ukrr = DatosAdmin::poner_guion(strip_tags($_POST["nombres"]))."_".DatosAdmin::poner_guion(strip_tags($_POST["apellido_paterno"]))."_".DatosAdmin::poner_guion(strip_tags($_POST["apellido_materno"]));
		$person->fecha = date('Y-m-d H:i:s');
		$person->registrar_admin_page();


		$vmail = new DatosMails();
		$vmail->correos = $person->email;
		$vmail->unombres = htmlentities($_POST["nombres"]." ".$_POST["apellido_paterno"]." ".$_POST["apellido_materno"]);
		$vmail->codigo_activacion = $person->codigo;
		$vmail->verificar_nuevo_administrador();
		echo json_encode(array("type" => 1,'mensaje' => Luis::lang("genial")));
	}else{
		echo json_encode(array("type" => 0,'mensaje' => Luis::lang("la_contrasena_no_son_iguales")));
	}
	
}else{
	echo json_encode(array("type" => 0,'mensaje' => Luis::lang("el_correo_no_es_valido")));
}