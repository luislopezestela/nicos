<?php
class Vista {

	public static function load($paginas){
		global $lui;
		if(!isset($_GET['paginas'])){
			include "datos/modulos/".Modulo::$modulo."/paginas/".$paginas."/luis_lopez.php";
		}else{
			if(Vista::esValido()){
				$vistas = explode("/", $_GET['paginas']);
				include "datos/modulos/".Modulo::$modulo."/paginas/".$vistas[0]."/luis_lopez.php";			
			}else{
				include "datos/modulos/".Modulo::$modulo."/paginas/404/luis_lopez.php";
			}
		}
	}

	public static function welcome_d($paginas){
		if(!isset($_GET['paginas'])){
			include "datos/modulos/".Modulo::$modulo."/paginas/".$paginas."/luis_lopez.php";
		}else{
			if(Vista::esValido()){
				$vistas = explode("/", $_GET['paginas']);
				include "datos/modulos/".Modulo::$modulo."/paginas/".$vistas[0]."/luis_lopez.php";				
			}else{
				include "datos/modulos/".Modulo::$modulo."/paginas/404/luis_lopez.php";
			}
		}
	}
	
	public static function esValido(){
		$valid=false;
		if(isset($_GET["paginas"])){
			$vistas = explode("/", $_GET['paginas']);
			if(file_exists($file = "datos/modulos/".Modulo::$modulo."/paginas/".$vistas[0]."/luis_lopez.php")){
				$valid = true;
			}
		}
		return $valid;
	}

	public static function Error($message){
		print $message;
	}

	public static function cargar($opcionretiroentienda){
		include "datos/modulos/index/accion/opcionretiroentienda/accion-luis.php";
	}

	public static function cargarts($opciondeliverienvio){
		include "datos/modulos/index/accion/opciondeliverienvio/accion-luis.php";
	}
	public static function opcionedepago($pago){
		include "datos/modulos/index/accion/".$pago."/accion-luis.php";
	}
}

class LuisLopez {
	public static function load($luis){
	 include "datos/modulos/index/paginas/footer/luis_lopez.php";
	}
}
class FooterMobil {
	public static function load($luis){
	 include "datos/modulos/index/paginas/footer_mobil/luis_lopez.php";
	}
}
class LuisLopezerrorconexion {
	public static function error($luis){
	 include "datos/modulos/index/paginas/errorconexion/luis_lopez.php";
	}
}

class error404 {
	public static function load($luis){
	 include "datos/modulos/index/paginas/404/luis_lopez.php";
	}
}

class Headerluislopez {
	public static function load($luis){
	 include "datos/modulos/index/paginas/header/luis_lopez.php";
	}
}
class HeaderMobil {
	public static function load($luis){
	 include "datos/modulos/index/paginas/header_mobil/luis_lopez.php";
	}
}
class Perfil {
	public static function load($luis){
	  include "datos/modulos/index/paginas/menuperfil/luis_lopez.php";
	}
}


class tables_in_pages_items{
	//// Mostrar la tabla header en pagina items
	public static function Mostrar_tabla_in_page_head_table($th){
		$sql = "select * from tablas where id=$th";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new tables_in_pages_items());
	}

	public static function items_rows_in_table($th){
		$sql = "select * from stock where id_producto=$th";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new tables_in_pages_items());
	}
}