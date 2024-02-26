<?php
class Modulo {
	public static $modulo;
	public static $vista;
	public static $mensaje;

	public static function setModule($modulo){
		self::$modulo = $modulo;
	}

	public static function loadLayout(){
		global $lui; 
		include "datos/modulos/".Modulo::$modulo."/paginas/principal.php";
	}
	
	public static function esValido(){
		$valid = false;
		$folder = "datos/modulos/".Modulo::$modulo;
		
			if(is_dir($folder)){
				$valid=true;
			}else{self::$mensaje= "<b>404 PAGINA NO ENCONTRADO</b> MODULO <b>".Modulo::$modulo."</b> FOLDER  !!"; }
		    return $valid;
	}

	public static function Error(){
		echo self::$mensaje;
		die();
	}

}