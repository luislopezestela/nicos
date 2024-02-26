<?php
class userdat{
	public $sql;
	public $email;
	public $pass;
	public $elcorreo;
	private $correo;
	private $passw;
	private $id;
	private $esta_activado;
	public static function conect_data($sql){
		$con = BaseDatos::getCon();
		return array($con->query($sql),$con->insert_id);
	}

	public static function verificar_usuario_activado($email){
		$sql = "select * from usuarios where (correo= \"$email\" )";
		$query = userdat::conect_data($sql);
		$found = null;
		$data = new userdat();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->esta_activado = $r['esta_activado'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function verificar_usuario_activado_iniciar($email,$pass){
		$sql = "select * from usuarios where (correo= \"$email\" ) and pass= \"$pass\" and esta_activado=1";
		$query = userdat::conect_data($sql);
		$found = null;
		$data = new userdat();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function validar_codigo_de_verificacion($email,$pass){
		$sql = "select * from usuarios where correo=\"$email\" and pass= \"$pass\"";
		$query = userdat::conect_data($sql);
		$found = null;
		$data = new userdat();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->codigo = $r['codigo'];
			$found = $data;
			break;
		}
		return $found;
	}

	public function activar_cuenta_administrado(){
		$sql = "update usuarios set esta_activado=1 where correo=\"$this->emails\" and pass=\"$this->passs\"";
		userdat::conect_data($sql);
	}

	public static function verificarexistenciadecorreo($elcorreo){
		$sql = "select * from usuarios where (correo=\"$elcorreo\")";
		$query = userdat::conect_data($sql);
		$found = null;
		$data = new userdat();
		while($r = $query[0]->fetch_array()){
			$data->correo = $r['correo'];
			$data->passw = $r['pass'];
			$found = $data;
			break;
		}
		return $found;
	}

	

	
}
//

if(Session::getUID()==""){
$email = $_POST['correo'];
$pass = sha1(md5($_POST['pass']));
$existeemail = userdat::verificarexistenciadecorreo($email);
$usuario_activado = userdat::verificar_usuario_activado($email,$pass);
$usuario_activado_inicio = userdat::verificar_usuario_activado_iniciar($email,$pass);



	if($email == ""){
		echo(json_encode(array('type' => false, 'mensaje' => "Escribe un correo.")));
	}elseif($existeemail==null){
		echo(json_encode(array('type' => false, 'mensaje' => "EL correo ingresado no existe en nuestra base de datos.")));
	}elseif($_POST['pass'] == ""){
		echo(json_encode(array('type' => false, 'mensaje' => "Escribe su contrase&ntilde de acceso.")));
	}elseif($existeemail->passw!=$pass){
		echo(json_encode(array('type' => false, 'mensaje' => "La contrase&ntilde;a no es correcto.")));
	}elseif($usuario_activado->esta_activado==0){
		if(isset($_POST['codd'])){
			$codigo_ver = userdat::validar_codigo_de_verificacion($email,$pass);
			if($_POST['codd']==$codigo_ver->codigo){
				$bus = new userdat();
				$bus->emails = $email;
				$bus->passs = $pass;
				$bus->activar_cuenta_administrado();
				$var_sucursal = new DatosAdmin();
				$var_sucursal->usuario = $usuario_activado_inicio->id;
				$var_sucursal->sucursal = $_POST['sucursal'];
				$var_sucursal->actualizar_sucursal_usuario();
				$_SESSION['admin_id']=$usuario_activado_inicio->id;
				echo(json_encode(array('type' => true, 'mensaje' => "Success", 'activar' => 1)));
			}else{
				echo(json_encode(array('type' => false, 'mensaje' => "Codigo no valido.", 'activar' => 1)));
			}
		}else{
			echo(json_encode(array('type' => false, 'mensaje' => "Activa tu cuenta con el codigo que enviamos a tu correo.", 'activar' => 1)));
		}
	}elseif($_POST['sucursal']==""){
		echo(json_encode(array('type' => false, 'mensaje' => "Selecciona el sucursal.")));
	}elseif(isset($usuario_activado_inicio->id)){
		$var_sucursal = new DatosAdmin();
		$var_sucursal->usuario = $usuario_activado_inicio->id;
		$var_sucursal->sucursal = $_POST['sucursal'];
		$var_sucursal->actualizar_sucursal_usuario();
		$_SESSION['admin_id']=$usuario_activado_inicio->id;
		echo(json_encode(array('type' => true, 'mensaje' => "Cargando...")));
		
	}


}