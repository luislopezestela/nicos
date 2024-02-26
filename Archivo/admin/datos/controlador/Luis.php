<?php
/**
 * Luis lopez estela
 * lopezestelaluis@gmail.com
 */
class Luis{
	
	function __construct(){
	}

	public function loadModule($modulo){
			if(!isset($_GET['modulo'])){
				Modulo::setModule($modulo);
				include "datos/modulos/".$modulo."/autocarga.php";
				include "datos/modulos/".$modulo."/superinicio.php";
				include "datos/modulos/".$modulo."/ini.php";
			}else{
				Modulo::setModule($_GET['modulo']);
				if(Modulo::esValido()){
					include "datos/modulos/".$_GET['modulo']."/ini.php";
				}else{
					Modulo::Error();
				}
			}
	}

	public static function temass(){
		$base = new BaseDatos();
		$con = $base->conectar();
		$sql = "select name,value from lui_config where name=\"theme\"";
		$query = $con->query($sql);
		while($r = $query->fetch_array()){
			return $r['value'];
		}
	}

	
	public static function config(){
		$base = new BaseDatos();
	    $con = $base->conectar();
	    $sql = "select * from lui_config";
	    $query = $con->query($sql);
	    $lopez = array();
	    while($r = $query->fetch_array()){
	        $lopez[$r['name']] = $r['value'];
	    }
	    return $lopez;
	}

	public static function users($name){
		$base = new BaseDatos();
	    $con = $base->conectar();
	    $sql = "select * from lui_users";
	    $query = $con->query($sql);
	    $lopez = array();
	    while($r = $query->fetch_array()){
	        $lopez[$r[$name]] = $r['value'];
	    }
	    return $lopez;
	}

	/// verificar existencia de usuario administrador
	public static function buscarusuario(){
		$sql = "select * from lui_users";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new Luis());
	}

	public static function lui_carga_link_admin($link = ''){
		return BASE_URL_B.'datos/'.$link;
	}

	public static function notificaciones_contar(){
		$base = new BaseDatos();
		$con = $base->conectar();
		$sql = "select count(*) as c from lui_notifications where recipient_id=0 and admin=1 and seen=0";
		$query = $con->query($sql);
		while($r = $query->fetch_array()){
			return $r['c'];
		}
	}

	


	public static function notificaciones(){
		$sql = "select * from lui_notifications where recipient_id=0 and admin=1 and seen=0 ORDER BY id desc";
		$query = Ejecutor::doit($sql);
		$array = array();
		while($r = $query[0]->fetch_array()){
			foreach ($r as $key) {
				$array = $key; 
			}
		}
		return $array;
	}

	public static function old_notificaciones(){
		$sql = "select * from lui_notifications where recipient_id=0 and admin=1 and seen=0 ORDER BY id desc";
		$query = Ejecutor::doit($sql);
		$array = array();
		while($r = $query[0]->fetch_array()){
			foreach ($r as $key) {
				$array = $key; 
			}
		}
		return $array;
	}
	


	public static function head_init($name){

		$luis = Luis::config();
		if(isset($luis["siteTitle"])==null){
			$titulopagina="";
		}else{
			$titulopagina=$luis["siteTitle"];
		}
		if(isset($luis["siteName"])==null){
			$nombrepagina="";
		}else{
			$nombrepagina=$luis["siteName"];
		}
		if(isset($luis["siteDesc"])==null){
			$descripcionpagina="";
		}else{
			$descripcionpagina=$luis["siteDesc"];
		}
		if(isset($luis["siteKeywords"])==null){
			$keywordspagina="";
		}else{
			$keywordspagina=$luis["siteKeywords"];
		}
		if(isset($luis["googleAnalytics"])==null){
			$verifica="";
		}else{
			$verifica=$luis["googleAnalytics"];
		}
		if(isset($luis["header_background"])==null){
			$colorprimarioview='#FFF';
		}else{
			$colorprimarioview=$luis["header_background"];
		}
		$colorPrimario = $colorprimarioview."0D";
		if(isset($_GET["paginas"])){
			$urb=explode("/", $_GET["paginas"]);
			if(isset($urb[0])){$urb0=$urb[0];}else{$urb0=false;}
			if(isset($urb[1])){$urb1=$urb[1];}else{$urb1=false;}
			$laspaginas = $_GET["paginas"];
			switch($laspaginas){
				case '404':
					if($name==="title"){
					 	$data = "ERROR 404, pagina no encontrada!";
					 }elseif($name==="name"){
					 	$data = html_entity_decode($nombrepagina);
					 }elseif($name==="description"){
					 	$data = Luis::poner_guion_ur(strip_tags(html_entity_decode($descripcionpagina)));
					 }elseif($name==="keywords"){
					 	$data = html_entity_decode($keywordspagina);
					 }elseif($name==="primarycolor"){
					 	$data = $colorPrimario;
					 }
					 return $data;
					break;
				case $_GET["paginas"]:
				    if($_GET["paginas"]==="carrito"){
				    	if($name==="title") {
				    		$data = "CARRITO";
				    	}elseif($name==="name"){
				    		$data = html_entity_decode($nombrepagina);
				    	}elseif($name==="description"){
				    		$data = Luis::poner_guion_ur(strip_tags(html_entity_decode($descripcionpagina)));
				    	}elseif($name==="keywords"){
				    		$data = html_entity_decode($keywordspagina);
				    	}elseif($name==="primarycolor"){
				    		$data = $colorPrimario;
				    	}
				    }elseif($_GET["paginas"]==="perfil"){
				    	if($name==="title"){
				    		if(isset($_SESSION['usuarioid'])){
				    			$persona_vieew = DatosAdmin::usuario($_SESSION['usuarioid']);
				    			$titulo_perfil=$persona_vieew->nombreCompleto();
				    		}else{
				    			$titulo_perfil="Perfil";
				    		}
				    		$data = html_entity_decode($titulo_perfil);
				    	}elseif($name==="name"){
				    		$data = html_entity_decode($nombrepagina);
				    	}elseif($name==="description"){
				    		$data = Luis::poner_guion_ur(strip_tags(html_entity_decode($descripcionpagina)));
				    	}elseif($name==="keywords"){
				    		$data = html_entity_decode($keywordspagina);
				    	}elseif($name==="primarycolor"){
				    		$data = $colorPrimario;
				    	}
				    }else{
				    	if($name==="title") {
				    		$data = html_entity_decode($titulopagina);
				    	}elseif($name==="name"){
				    		$data = html_entity_decode($nombrepagina);
				    	}elseif($name==="description"){
				    		$data = Luis::poner_guion_ur(strip_tags(html_entity_decode($descripcionpagina)));
				    	}elseif($name==="keywords"){
				    		$data = html_entity_decode($keywordspagina);
				    	}elseif($name==="primarycolor"){
				    		$data = $colorPrimario;
				    	}
				    } 
					return $data;
					break;
				default:
					 if($name==="title") {
					 	$data = html_entity_decode($titulopagina);
					 }elseif($name==="name"){
					 	$data = html_entity_decode($nombrepagina);
					 }elseif($name==="description"){
					 	$data = Luis::poner_guion_ur(strip_tags(html_entity_decode($descripcionpagina)));
					 }elseif($name==="keywords"){
					 	$data = html_entity_decode($keywordspagina);
					 }elseif($name==="primarycolor"){
					 	$data = $colorPrimario;
					 }
					 return $data;
					break;
			}
		}else{
			if($name==="title") {
				$data = html_entity_decode($titulopagina);
			}elseif($name==="name"){
				$data = html_entity_decode($nombrepagina);
			}elseif($name==="description"){
				$data = Luis::poner_guion_ur(strip_tags(html_entity_decode($descripcionpagina)));
			}elseif($name==="keywords"){
				$data = html_entity_decode($keywordspagina);
			}elseif($name==="primarycolor"){
				$data = $colorPrimario;
			}
			return $data;
		}
	}


	public static function lui_crear_session_principal() {
	    $hash = substr(sha1(rand(1111, 9999)), 0, 20);
	    if (!empty($_SESSION["main_hash_id"])) {
	        $_SESSION["main_hash_id"] = $_SESSION["main_hash_id"];
	        return $_SESSION["main_hash_id"];
	    }
	    $_SESSION["main_hash_id"] = $hash;
	    return $hash;
	}
}