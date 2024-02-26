<?php
class Action {
	public static function load($accion){
		if(!isset($_GET['accion'])){
			include "datos/modulos/".Modulo::$modulo."/accion/".$accion."/accion-luis.php";
		}else{
			if(Action::esValido()){
				include "datos/modulos/".Modulo::$modulo."/accion/".$_GET['accion']."/accion-luis.php";				
			}else{
				Action::Error("<b>404 NOT FOUND</b> Accion <b>".$_GET['accion']."</b> folder  !!");
			}
		}
	}

	public static function esValido(){
		$valid=false;
		if(file_exists($file = "datos/modulos/".Modulo::$modulo."/accion/".$_GET['accion']."/accion-luis.php")){
			$valid = true;
		}
		return $valid;
	}

	public static function Error($message){
		print $message;
	}

	public function execute($accion,$params){
		$fullpath =  "datos/modulos/".Modulo::$modulo."/accion/".$accion."/accion-luis.php";
		if(file_exists($fullpath)){
			include $fullpath;
		}else{
			assert("wtf");
		}
	}

	public static function htmlpdf($opciondeliverienvio){
		include "datos/modulos/index/accion/pdfdatanote/accion-luis.php";
	}

}