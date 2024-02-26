<?php
class DatosImagenes{
	public static $carta = "imagen_carta";
	public static $item_table = "imagen_item";
	public $fecha;
	public $id;
	public $imagen;
	public $estado;
	public $id_item;
	public function __construct(){
		$this->fecha = "NOW()";
	}

	// Data image carta

	public function delete_img(){
		$sql = "delete from ".self::$carta." where id=$this->id";
		Ejecutor::doit($sql);
	}

	public static function porId($id){
		$sql = "select * from ".self::$carta." where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosImagenes());
	}

	public static function mostrar_imagen_carta($carta){
		$sql = "select * from ".self::$carta." where id_carta=$carta and estado=1";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosImagenes());
	}

	public static function cantidadImage_carta($carta){
		$sql = "select count(*) as c from ".self::$carta." where id_carta=$carta";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosImagenes());
	}

	public function agregar_foto_carta(){
		$sql = "insert into ".self::$carta." (imagen,id_carta,fecha)";
		$sql .= "value (\"$this->imagen\",$this->id_carta,$this->fecha)";
		return Ejecutor::doit($sql);
	}

	public function agregar_foto_items_carta(){
		$sql = "insert into ".self::$item_table." (imagen,id_item,fecha)";
		$sql .= "value (\"$this->imagen\",$this->id_item,$this->fecha)";
		return Ejecutor::doit($sql);
	}
	// end image carta

	//imagen items



	public static function porId_items_list_view($id){
		$sql = "select * from ".self::$item_table." where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosImagenes());
	}

	public function delete_item_image(){
		$sql = "delete from ".self::$item_table." where id_item=$this->id_item";
		Ejecutor::doit($sql);
	}

	public static function cantidadImage_items_carta($carta){
		$sql = "select count(*) as c from ".self::$item_table." where id_item=$carta";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosImagenes());
	}

	public static function mostrar_imagen_items_carta($carta){
		$sql = "select * from ".self::$item_table." where id_item=$carta and estado=1";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosImagenes());
	}

	public static function Mostrarimageneditar_items($carta){
		$sql = "select * from ".self::$item_table." where id_item=$carta and estado=1";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosImagenes());
	}

	public static function cantidad_image_item($carta){
		$sql = "select count(*) as c from ".self::$item_table." where id_item=$carta";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosImagenes());
	}

	public static function  image_prev($cantidad,$itemview){
		$sql = "select * from ".self::$item_table." where id < $cantidad and id_item=$itemview limit 1";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosImagenes());
	}

	public static function  image_next($cantidad,$itemview){
		$sql = "select * from ".self::$item_table." where id > $cantidad and id_item=$itemview";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosImagenes());
	}

	public function delete_items_img_view(){
		$sql = "delete from ".self::$item_table." where id=$this->id";
		Ejecutor::doit($sql);
	}

	public function agregar_foto_items_view_carta(){
		$sql = "insert into ".self::$item_table." (imagen,id_item,fecha)";
		$sql .= "value (\"$this->imagen\",$this->id_item,$this->fecha)";
		return Ejecutor::doit($sql);
	}
	
}