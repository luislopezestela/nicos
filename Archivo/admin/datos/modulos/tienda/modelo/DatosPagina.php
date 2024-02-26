<?php
class DatosPagina{
	public static $total = 0;
	public $id;
	public $activo;
	public $vercion;
	public $nombre;
	public function __construct(){

	}
	function nombreCompleto(){ return $this->nombre." ".$this->apellido_paterno; }
    function nombreCompleto_dos(){ return $this->nombre." ".$this->apellido_paterno." ".$this->apellido_materno; }


    public static function calculardistancia($lat1, $lon1, $lat2, $lon2, $unit){
    	$theta = $lon1 - $lon2;
    	$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    	$dist = acos($dist);
    	$dist = rad2deg($dist);
    	$miles = $dist * 60 * 1.1515;
    	$unit = strtoupper($unit);
    	if($unit == "K"){
    		return ($miles * 1.609344);
    	}else if($unit == "N"){
    		return($miles * 0.8684);
    	}else{
    		return $miles;
    	}
    }


	public static function confver($data){
		if($data==="base"){
			$viewdata=$base = Luis::basepage("base_page");
		}elseif($data==="logopagina"){
			$viewdata=$logopagina = Luis::page_conf("header")->logo_img;
		}elseif($data==="persona"){
			$viewdata=$persona = $_SESSION["usuarioid"];
		}
		return $viewdata;
	}

	public static function diapositivas(){
		$sql = "select * from diapositiva";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosPagina());
	}

	public static function persona($id){
		$sql = "select * from personas where id=$id";
		$query = Ejecutor::doit($sql);
		$found = null;
		$data = new DatosPagina();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->nombre = $r['nombre'];
			$data->apellido_paterno = $r['apellido_paterno'];
			$data->apellido_materno = $r['apellido_materno'];
			$data->dni = $r['dni'];
			$data->correo = $r['correo'];
			$data->pass = $r['pass'];
			$data->celular = $r['celular'];
			$data->direccion = $r['direccion'];
			$data->foto = $r['foto'];
			$data->fecha = $r['fecha'];
			$data->codigo = $r['codigo'];
			$data->estado = $r['estado'];
			$data->tipo = $r['tipo'];
			$data->sucursal_compra = $r['sucursal_compra'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function existehead(){
		$valid=false;
		if(isset($_GET["paginas"])){
			$vistas = explode("/", $_GET['paginas']);
			if(file_exists($file = "datos/modulos/".Modulo::$modulo."/paginas/".$vistas[0]."/luis_lopez.php")){
				$valid = true;
			}
		}
		return $valid;
	}

	public static function headerpage(){
		$head=Functions::header_disp();
		$filedad = "datos/modulos/".Modulo::$modulo."/headers/".$head->nombre."/luis_head.php";
		if(file_exists($filedad)){
			include $filedad;
		}else{
		}
	}

	public static function headerpage_b(){
		$head=Functions::header_disp();
		$filedad = "./../datos/modulos/".Modulo::$modulo."/headers/".$head->nombre."/luis_head.php";
		if(file_exists($filedad)){
			include $filedad;
		}else{
		}
	}

	public static function footerpage(){
		$footer=Functions::footer_disp();
		$filedad_f = "datos/modulos/".Modulo::$modulo."/footers/".$footer->nombre."/luis_footer.php";
		if(file_exists($filedad_f)){
			include $filedad_f;
		}else{
		}
	}

	public static function headerpage_mmmm(){
		$head=Functions::header_disp();
		if($head){
			$header=Functions::header_view($head->nombre);
		}else{
			$header=false;
		}
		
		return $header;
	}

	public static function diapositivas_view(){
		$diapositiva=DatosPagina::diapositivas();
	}

}