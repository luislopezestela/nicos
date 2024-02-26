<?php
class Ejecutor {
	public static function doit($sql){
		$con = BaseDatos::getCon();
		return array($con->query($sql),$con->insert_id);
	}
}