<?php
class IpLogger {
public static function getRealIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) // encaso de que la ip sea compartida
        return $_SERVER['HTTP_CLIENT_IP'];
       
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) // encaso de provenir de un proxy
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
   
    return $_SERVER['REMOTE_ADDR'];
}

public static function addIP(){
	if(UserLogged::isLogged()){
		if(!self::verifyIP()){
		$con = Database::getCon();
		$sql = "insert into iplog (id_usuario,realip,fecha) value(".Session::getUID().",\"".self::getRealIP()."\",".time().")";
		$con->query($sql);
		return $con->insert_id;
		}
	}else {
		return false;
	}
}

public static function getIPLogId(){
	$con = Database::getCon();
$sql = "select * from iplog where realip=\"".self::getRealIP()."\" and id_usuario=".Session::getUID()." order by fecha desc limit 1";
	$query = $con->query($sql);
	$ca = 0;
	$id=0;
	while($r=$query->fetch_array()){
//		$found = true ;
		$ca = $r['fecha'];
		$id = $r['id'];
	}
		$found=false;
		$ca2 = $ca + (24)*3600;
		if(time()>=$ca2){
			$found=true;
		}

		if($found==true){
			// si es mayor enonces generaremos un id nuevo
			$id = self::addIP();
		}else {

		}
		return array("id"=>$id,"ca"=>$ca);

}

public static function verifyIP(){
	$con = Database::getCon();
	$sql = "select * from iplog where realip=\"".self::getRealIP()."\" and id_usuario=".Session::getUID();
	$query = $con->query($sql);
	$found=false;
	$ca = "" ;
	while($r=$query->fetch_array()){
		$found = true ;
		$ca = $r['fecha'];
	}

	if($found==true){
		$ca2 = $ca + (24)*3600;
		if(time()>=$ca2){
			$found=false;
		}
	}
	return $found;
}

}
?>