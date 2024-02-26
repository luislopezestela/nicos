<?php
class Visitas {
	public static function addView($servid,$field,$table){
		if(Session::getUID()!=""){

			if(self::checkView($servid,$field,$table)==true){
				$con = BaseDatos::getCon();
					$sql = "insert into $table (vista_id, $field,realip,fecha) value (".Session::getUID().",$servid,\"".IpLogger::getRealIP()."\",NOW())";
				if($con->query($sql)){
					return true;
				}else{
					return false;
				}
			}

		}else{
			if(self::checkView($servid,$field,$table)==true){
				$con = BaseDatos::getCon();
				$tim = time();
				$sql = "insert into $table ($field,realip,fecha) value ($servid,\"".IpLogger::getRealIP()."\",NOW())";
				if($con->query($sql)){
					return true;
				}else{
					return false;
				}
			}
		}
	}

public static function countIt($servid,$field,$table){
	$con = BaseDatos::getCon();
	$sql = "select count(*) as c  from $table where $field=".$servid;
	$c = 0;
	$query = $con->query($sql);
	while($r=$query->fetch_array()){				
		$c = $r['c'];
		}
	return $c;
}

public static function countByAdId($ad_id){
	$con = BaseDatos::getCon();
	$sql = "select count(*) as c  from vista_productos where id_producto=".$ad_id;
	$c = 0;
	$query = $con->query($sql);
	while($r=$query->fetch_array()){				
		$c = $r['c'];
		}
	return $c;
}

public static function countAll(){
	$con = BaseDatos::getCon();
	$sql = "select count(*) as c  from vista_productos";
	$c = 0;
	$query = $con->query($sql);
	while($r=$query->fetch_array()){				
		$c = $r['c'];
		}
	return $c;
}

public static function countAllFromDay($day){
	$con = BaseDatos::getCon();
	$sql = "select count(*) as c  from vista_productos where date(fecha)=\"$day\"";
	$c = 0;
	$query = $con->query($sql);
	while($r=$query->fetch_array()){				
		$c = $r['c'];
		}
	return $c;
}


public static function countAllFromToday(){
	$con = BaseDatos::getCon();
	$sql = "select count(*) as c  from vista_productos where date(fecha)=date(NOW())";
	$c = 0;
	$query = $con->query($sql);
	while($r=$query->fetch_array()){				
		$c = $r['c'];
		}
	return $c;
}


public static function countByAdIdFromToday($ad_id){
	$con = BaseDatos::getCon();
	$sql = "select count(*) as c  from vista_productos where post_id=".$ad_id." and date(fecha)=date(NOW())";
	$c = 0;
	$query = $con->query($sql);
	while($r=$query->fetch_array()){				
		$c = $r['c'];
		}
	return $c;
}


	public static function checkView($servid,$field,$table){
		// vamos a verficar que no se haya visto el servicio en un lapso de tiempo
		$con = BaseDatos::getCon();
//		$sql = "select serviceview.id as svid, iplog.id as ilid serviceview inner join iplog on (serviceview.iplog_id=iplog.id) where $field=$servid and order by created_at desc limit 1";
		$sql = "select * from $table where realip='".IpLogger::getRealIP()."' and $field='$servid' order by fecha desc limit 1";
		$query = $con->query($sql);
		$found=false;
		$ca = 0;
		while($r=$query->fetch_array()){
			$found=true;
			$ca = strtotime($r['fecha']);
		}
if($found==true){
		$ca2 = $ca + (24)*3600;
		if(time()>=$ca2){
			$found=false;
		}
	}
		if($found==false){
			return true;
		}else{
			return false;
		}
	}
}