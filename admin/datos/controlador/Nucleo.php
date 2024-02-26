<?php
class Nucleo {
	public static function CSSluislopez(){
		$path = "datos/modulos/estilos/";
		$handle=opendir($path);
		if($handle){
			while (false !== ($entry = readdir($handle)))  {
				if($entry!="." && $entry!=".."){
					$fullpath = $path.$entry;
				if(!is_dir($fullpath)){
						echo "<link rel='stylesheet' type='text/css' href='".$fullpath."' />";
					}
				}
			}
		closedir($handle);
		}
	}
	public static function alert($text){
		echo "<script>alert('".$text."');</script>";
	}
	public static function redir($url){
		echo "<script>window.location='".$url."';</script>";
	}
	public static function JSluislopez(){
		$path = "datos/script/";
		$handle=opendir($path);
		if($handle){
			while (false !== ($entry = readdir($handle)))  {
				if($entry!="." && $entry!=".."){
					$fullpath = $path.$entry;
				if(!is_dir($fullpath)){
						echo "<script type='text/javascript' src='".$fullpath."'></script>";
					}
				}
			}
		closedir($handle);
		}

	}

}