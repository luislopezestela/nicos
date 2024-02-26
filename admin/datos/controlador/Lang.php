<?php
class DatosLang{
	public $fecha;
	public $id;
	public $lang_key;
	public $label;
	public $lang;
	public $nombre;
	public $spanish;
	public $keyname;
	public $keylangid;
	public $langdefault;
	public static $tabladeusuario = "lang";

	public function __construct(){
		$lang = $this->lang;
		$fecha = "NOW()";
	}

	public function eliminar(){
		$sql = "delete from ".self::$tabladeusuario." where id=$this->id";
		Ejecutor::doit($sql);
	}

	public static function seach_lang_file($lang,$lang_key) {
		$sql = "select $lang as lg from ".self::$tabladeusuario." where lang_key=\"$lang_key\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosLang());
	}

	public static function luis_lang_bd($lang = 'spanish') {
		$sql = "select lang_key, $lang from ".self::$tabladeusuario;
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosLang());
	}

	public static function luis_lang_alls(){
		$sql = "select * from ".self::$tabladeusuario;
		$query = Ejecutor::doit($sql);
		return Modelo::manylang($query[0],new DatosLang());
	}

	public static function idiomarecient($id){
		$sql = "select * from ".self::$tabladeusuario." where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosLang());
	}

	public function add_languages(){
		$sql = "ALTER TABLE lang ADD $this->nombre TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;";
		return Ejecutor::doit($sql);
	}

	public function guardar_cambios_language_files(){
		$sql = "ALTER TABLE lang CHANGE $this->columna $this->data_cols TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;";
		return Ejecutor::doit($sql);
	}

	public function eliminar_language_file(){
		$sql = "ALTER TABLE lang DROP $this->columna";
		return Ejecutor::doit($sql);
	}

	public function add_language_name(){
		$sql ="update ".self::$tabladeusuario." set $this->keyname=\"$this->langdefault\" where lang_key=\"$this->keylangid\"";
		return Ejecutor::doit($sql);
	}

	public function agregar_palabra_languages(){
		$sql = "insert into lang (lang_key) ";
		$sql .= "value(\"$this->lang_key_name\")";
		return Ejecutor::doit($sql);
	}

	public function agregar_palabra_languages_two($id){
		$sql ="update ".self::$tabladeusuario." set $this->columnadata=\"$this->datavalue\" where id=$id";
		return Ejecutor::doit($sql);
	}

	public function change_word_new_label(){
		$sql ="update ".self::$tabladeusuario." set $this->lang_files=\"$this->nueva_palabra\" where lang_key=\"$this->palabra\"";
		return Ejecutor::doit($sql);
	}

}