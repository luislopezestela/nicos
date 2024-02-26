<?php
class DatosUsuario {
	public $id;
	public $nombre;
	public $apellido;
	public $correo;
	public $pass;
	public $codigodeactivacion;
	public $esta_activado;
	public $fechaderegistro;
	public $fecha;
	public $limite;
	public $foto_perfil;
	public $celular;
	public $es_administrador;
	public $idioma;
	public $dni;
	public $ruc;
	public $ukr;
	public $direccion;
	public $codigo;
	public $sucursal;
	public $tipo;
	public static $tabladeusuario = "usuarios";

	public  function createForm(){
		$form = new lbForm();
	    $form->addField("mail",array('type' => new lbInputText(array()),"validate"=>new lbValidator(array())));
	    $form->addField("password",array('type' => new lbInputPassword(array()),"validate"=>new lbValidator(array())));
	    return $form;

	}

	public function __construct(){
		$nombre = "";
		$apellido = "";
		$correo = "";
		$pass = "";
		$codigodeactivacion = "";
		$esta_activado = "0";
		$fechaderegistro = "NOW()";
		$fecha = "NOW()";
	}

	function nombreCompleto(){ return $this->nombre." ".$this->apellido; }

	 public static function porId($id){
		$sql = "select * from ".self::$tabladeusuario." where id=$id";
		$query = Ejecutor::doit($sql);
		$found = null;
		$data = new DatosUsuario();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->idioma = $r['idioma'];
			$data->es_administrador = $r['es_administrador'];
			$data->nombre = $r['nombre'];
			$data->apellido = $r['apellido'];
			$data->correo = $r['correo'];
			$data->pass = $r['pass'];
			$data->fecha = $r['fecha'];
			$data->celular = $r['celular'];
			$data->dni = $r['dni'];
			$data->ruc = $r['ruc'];
			$data->direccion = $r['direccion'];
			$data->codigo = $r['codigo'];
			$data->esta_activado = $r['esta_activado'];
			$data->tipo = $r['tipo'];
			$data->foto_perfil = $r['foto_perfil'];
			$data->limite = $r['limite'];
			$data->sucursal = $r['sucursal'];
			$data->ukr = $r['ukr'];
			$found = $data;
			break;
		}
		return $found;
	}


	//////////////////////////////////////////////////////

    public static function Mostrar(){
		$sql = "select * from ".self::$tabladeusuario;
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosUsuario());
	}

	public function eliminar(){
		$sql = "delete from ".self::$tabladeusuario." where id=$this->id";
		Ejecutor::doit($sql);
	}

	public static function MostrarParaEditar($id){
		$sql = "select * from ".self::$tabladeusuario." where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosUsuario());
	}

	public function agregar_usuario(){
		$sql = "insert into usuarios (funcion,nombre,apellido,dni,celular,direccion,correo,pass,codigo,ukr,fecha) ";
		$sql .= "value (\"$this->funcion\",\"$this->nombre\",\"$this->apellido\",\"$this->dni\",\"$this->celular\",\"$this->direccion\",\"$this->correo\",\"$this->pass\",\"$this->codigo\",\"$this->ukr\",$this->fecha)";
		return Ejecutor::doit($sql);
	}

	public function agregar_usuario_b(){
		$sql = "insert into usuarios (funcion,sucursal,nombre,apellido,dni,celular,direccion,correo,pass,codigo,ukr,fecha) ";
		$sql .= "value (\"$this->funcion\",$this->sucursal,\"$this->nombre\",\"$this->apellido\",\"$this->dni\",\"$this->celular\",\"$this->direccion\",\"$this->correo\",\"$this->pass\",\"$this->codigo\",\"$this->ukr\",$this->fecha)";
		return Ejecutor::doit($sql);
	}

	public function register(){
		$sql = "insert into usuarios (esta_activado,nombre,apellido,correo,pass,codigodeactivacion,fechaderegistro) ";
		$sql .= "value (0,\"$this->nombre\",\"$this->apellido\",\"$this->correo\",\"$this->pass\",\"$this->codigodeactivacion\",$this->fechaderegistro)";
		return Ejecutor::doit($sql);
	}
      
    public function TipodeUsuarioactualiza(){
		$sql = "update ".self::$tabladeusuario." set id_tipodeusuario=$this->id_tipodeusuario where id=$this->id";
		Ejecutor::doit($sql);
	}
    
    public function enlinea(){
		$sql = "update ".self::$tabladeusuario." set limite=\"$this->limite\" where id=$this->id";
		Ejecutor::doit($sql);
	}

	public function actualizardatosusuario(){
		$sql = "update ".self::$tabladeusuario." set nombre=\"$this->nombre\",apellido=\"$this->apellido\" where id=$this->id";
		Ejecutor::doit($sql);
	}

    public function ubdate_pass(){
		$sql = "update ".self::$tabladeusuario." set pass=\"$this->pass\" where id=$this->id";
		Ejecutor::doit($sql);
	}

	public function update_fotoperfil(){
		$sql = "update ".self::$tabladeusuario." set foto_perfil=\"$this->foto_perfil\" where id=$this->id";
		Ejecutor::doit($sql);
	}

	public static function countSId(){
		$sql = "select count(*) as c from ".self::$tabladeusuario." where id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosUsuario());
	}
    
    public static function optenerPorIdDeUsuario($id){
		$sql = "select * from ".self::$tablaproductos." where id=$id order by fecha desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosUsuario());
	}
    
    	public static function getAll(){
		$sql = "select * from ".self::$tabladeusuario;
		$query = Ejecutor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new DatosUsuario();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->apellido = $r['apellido'];
			$cnt++;
		}
		return $array;
	}

	public static function poriUsuario($id){
		$sql = "select * from ".self::$tabladeusuario." where id=\"$id\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosUsuario());
	}
	

 
    
    public static function optenerUsuarioporiddechat($id){
		$sql = "select * from ".self::$tabladeusuario." where id=\"$id\"";
		$query = Ejecutor::doit($sql);
		$found = null;
		$data = new DatosUsuario();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->nombre = $r['nombre'];
			$data->apellido = $r['apellido'];
			$data->foto_perfil = $r['foto_perfil'];
			$data->limite = $r['limite'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function getByEmail($mail){
		$sql = "select * from ".self::$tabladeusuario." where correo=\"$mail\"";
		$query = Ejecutor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new DatosUsuario();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->apellido = $r['apellido'];
			$array[$cnt]->correo = $r['correo'];
			$array[$cnt]->pass = $r['pass'];
			$array[$cnt]->codigodeactivacion = $r['codigodeactivacion'];
			$array[$cnt]->esta_activado = $r['esta_activado'];
			$array[$cnt]->fechaderegistro = $r['fechaderegistro'];
			$cnt++;
		}
		return $array;
	}

	public function activarusuario(){
		$sql = "update ".self::$tabladeusuario." SET esta_activado=\"$this->esta_activado\" where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}

    public static function estaActivado(){
		$sql = "select * from ".self::$tabladeusuario." where esta_activado=1";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosUsuario());
	}

    public static function TipodeUsuario($id){
		$sql = "select * from ".self::$tabladeusuario." where id=$id";
		$query = Ejecutor::doit($sql);
		$found = null;
		$data = new DatosUsuario();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->id_tipodeusuario = $r['id_tipodeusuario'];
			$found = $data;
			break;
		}
		return $found;
	}
	
   

	public function editarusuarioadmin(){
		$sql = "update ".self::$tabladeusuario." set funcion=\"$this->funcion\",nombre=\"$this->nombre\",apellido=\"$this->apellido\",dni=\"$this->dni\",celular=\"$this->celular\",direccion=\"$this->direccion\",correo=\"$this->correo\",sucursal=\"$this->sucursal\",ukr=\"$this->ukr\" where id=$this->id";
		Ejecutor::doit($sql);
	}

	public function editarpass(){
		$sql = "update ".self::$tabladeusuario." set pass=\"$this->pass\" where id=$this->id";
		Ejecutor::doit($sql);
	}
	
    public function activate(){
		$sql = "update ".self::$tabladeusuario." set esta_activado=1 where id=$this->id";
		Ejecutor::doit($sql);
	}
}

?>