<?php
class Modelo {
	public $query;
	public $aclass;
	public static function exists($modelname){
		$fullpath = self::getFullpath($modelname);
		$found=false;
		if(file_exists('$fullpath')){
			$found = true;
		}
		return $found;
	}
	public static function getFullpath($modelname){
		if(Luis::temass()==""){
			include "datos/modulos/bienvenido/modelo/".$modelname.".php";
		}else{
			include "datos/modulos/".Luis::temass()."/modelo/".$modelname.".php";
		}
		
	}
	public static function many($query,$aclass){
		$cnt = 0;
		$array = array();

		while($r = $query->fetch_array()){
			$array[$cnt] = new $aclass;
			$cnt2=1;
			foreach ($r as $key => $v) {
				if($cnt2>0 && $cnt2%2==0){ 
					$array[$cnt]->$key = $v;
				}
				$cnt2++;
			}
			$cnt++;
		}
		return $array;
	}

	public static function manylang($query,$aclass){
		$cnt = 0;
		$array = array();

		while($r = $query->fetch_array()){
			$array[$cnt] = new $aclass;
			$cnt2=1;
			foreach ($r as $key => $v) {
				if($cnt2>0 && $cnt2%2==0){ 
					$array[$cnt]->$key = $v;
				}
				$cnt2++;
			}
			$cnt++;
		}
		return $array;
	}

	public static function one($query,$aclass){
		$cnt = 0;
		$found = null;
		$data = new $aclass;
		while($r = $query->fetch_array()){
			$cnt=1;
			foreach ($r as $key => $v) {
				if($cnt>0 && $cnt%2==0){ 
					$data->$key = $v;
				}
				$cnt++;
			}
			$found = $data;
			break;
		}
		return $found;
	}
}