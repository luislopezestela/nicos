<?php
class BaseDatos{
	private static $db;
	private static $con;
	private string $host;
	public string $username;
	public string $password;
	public string $dbase;
     
	function __construct($host = null, $username = null, $password = null, $dbase = null){
	}

	function conectar(){
		if(file_exists("./../luis/config.php")) {
			include "./../luis/config.php";
		}
		if(file_exists("luis/config.php")) {
			include "luis/config.php";
		}
		if(file_exists("../../../../luis/config.php")) {
			include "../../../../luis/config.php";
		}
		
		
		$con = new mysqli($host,$username,$password,$dbase);
		$con->query("SET NAMES utf8");
		//$con->query("CREATE DATABASE IF NOT EXISTS " .$this->dbase." DEFAULT CHARACTER SET UTF8");
		//mysqli_select_db($con, $this->dbase);
		if (mysqli_connect_errno()){
			exit();
		}
		return $con;
	}
	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new BaseDatos();
			self::$con = self::$db->conectar();
		}
		return self::$con;
	}


	public static function creardatabase($nombre){
		$con = new mysqli($this->dbase,$this->user,$this->pass);
		$con->query("SET NAMES utf8");
		$con->query("CREATE DATABASE IF NOT EXISTS " .$nombre." DEFAULT CHARACTER SET UTF8");
		mysqli_select_db($con, $nombre);
		return $con;
	}
}


