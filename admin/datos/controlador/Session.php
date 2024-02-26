<?php
class Session{
	public static function setUID($uid){
		$_SESSION['admin_id'] = $uid;
	}

	public static function unsetUID(){
		if(isset($_SESSION['admin_id'])) 
			unset($_SESSION['admin_id']);
	}

	public static function issetUID(){
		if(isset($_SESSION['admin_id']))
			return true;
		else return false;
	}

	public static function getUID(){
		if(isset($_SESSION['admin_id']))
			return $_SESSION['admin_id'];
		else return false;
	}
}