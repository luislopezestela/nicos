<?php
class DatosAdmin{
	public static $total = 0;
	public static $valortotaldecompra=0;

	public $fecha;
	public $id;
	public $nombre;
	public $logo;
	public $codigo;
	public $posicion;
	public $estado;
	public $sucursal;
	public $id_carta;
	public $ukr;
	public $usuario;
	public $texto;
	public $imagen;
	public $url;
	public $activado;
	public $ub;
	public $boton;
	public $icono;
	public $id_diapositiva;
	public $nombre_corto;
	public $barcode;
	public $descripcion;
	public $carta;
	public $categoria;
	public $subcategoria;
	public $marca;
	public $precio_compra;
	public $moneda_a;
	public $precio;
	public $moneda_b;
	public $precio_final;
	public $tipo;
	public $publicar_web;
	public $en_carrito;
	public $simbolo;
	public $icon;
	public $moneda;
	public $principal;
	public $longitud;
	public $latitud;
	public $departamento;
	public $provincia;
	public $distrito;
	public $direccion;
	public $referencia;
	public $encardado;
	public $zoom;
	public $c;

	public function __construct(){
		$this->fecha = "NOW()";
	}

	public static function poner_guion($url){
        $url = strtolower($url);
        $find = array('á','é','í','ó','ú','â','ê','î','ô','û','ã','õ','ç','ñ');
        $repl = array('a','e','i','o','u','a','e','i','o','u','a','o','c','n');
        $url = str_replace($find, $repl, $url);
        $find = array('<','>','div','styletext');
        $url = str_replace($find, '', $url);
        $find = array(' ', '&', '\r\n', '\n','+','amp');
        $url = str_replace($find, '-', $url);
        $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<{^>*>/');
        $repl = array('', '-', '');
        $url = preg_replace($find, $repl, $url);
        return $url;
    }

    public function cambio_logo_page(){
    	$sql = "update configuracion SET valor=\"$this->icono\" where nombre=\"luis_logo\"";
    	Ejecutor::doit($sql);
    }
    
    function nombreCompleto(){ return $this->nombre." ".$this->apellido_paterno; }
    function nombreCompleto_dos(){ return $this->nombre." ".$this->apellido_paterno." ".$this->apellido_materno; }
	public static function usuario($id){
		$sql = "select * from personas where id=$id";
		$query = Ejecutor::doit($sql);
		$found = null;
		$data = new DatosAdmin();
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
			$data->estado = $r['estado'];
			$data->tipo = $r['tipo'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function headerpage(){
		$header="<header>";
		$header.="<nav class=\"menu_administracion\">";
		$header.="<ul class=\"submenu_administracion\">";
		$header.="<li class=\"logo_sistema primer_logotipo\">";
		$header.="<div id=\"optluisfunt\" class=\"icono_menu_de_celular\">";
		$header.="<div class=\"_lineas -uno\"></div>";
		$header.="<div class=\"_lineas -dos\"></div>";
		$header.="<div class=\"_lineas -tres\"></div>";
		$header.="</div>";
		$header.="<h5 class=\"titulosistemahosting\"> <p>Sistema</p> <p>Hosting</p></h5>";
		$header.="</li>";
		$header.="</ul>";
		$header.="</nav> ";
		$header.="<div id=\"hoverlistv\"></div>";
		$header.="</header>";
		return $header;
	}

	public static function page_menu_list($page){
		if(isset($_GET["paginas"])){
		$urb=explode("/", $_GET["paginas"]);
		if(isset($urb[1])){$urb1=$urb[1];}else{$urb1=false;}
		if(isset($urb[2])){$urb2=$urb[2];}else{$urb2=false;}
		if(isset($urb[3])){$urb3=$urb[3];}else{$urb3=false;}
		}
		$home_a=false;
		$home_ca=false;
		$configurar_a=false;
		$temas_a=false;
		$lista_menu="";
		if(isset($_GET["paginas"])&&$_GET["paginas"]){$home_a=false;}else{$home_a="opcionActivado";}
		if(isset($_GET["paginas"])&&$_GET["paginas"]=="cajas"){$home_ca="opcionActivado";}else{$home_ca=false;}
		if(isset($_GET["paginas"])&&$_GET["paginas"]=="configurar_pagina"){$configurar_a="opcionActivado";}else{$configurar_a=false;}
		if(isset($_GET["paginas"])&&$_GET["paginas"]=="tema_select_page" or isset($_GET["paginas"])&&$_GET["paginas"]=="administrar_skin/".$urb1){
			$temas_a="opcionActivado";
		}else{
			$temas_a=false;
		}
	
		if(isset($_GET["paginas"])&&$_GET["paginas"]=="metododepago"){$metodo_de_pago_a="opcionActivado";}else{$metodo_de_pago_a=false;}
		if($page==="tienda"){
			$restaurant_a=false;
			$restaurant_b=false;
			$restaurantit_a=false;
			$restaurantit_b=false;
			$restaurantit_c=false;
			$restaurantit_d=false;
			$restaurantit_e=false;
			$restaurantit_f=false;
			$restaurantit_g=false;
			$restaurantit_h=false;
			$restaurantit_i=false;
			$restaurantit_j=false;
			$restaurantit_k=false;
			$restaurantit_l=false;
			$restaurantit_m=false;

			$restaurantit_ab=false;
			$restaurantit_bb=false;
			$restaurantit_cb=false;
			$restaurantit_db=false;
			$restaurantit_eb=false;

			if(isset($_GET["paginas"])){
				if($_GET["paginas"]=="ventas" or $_GET["paginas"]=="ventas/".$urb1 or  $_GET["paginas"]=="ventas/".$urb1."/".$urb2){
					$restaurant_a="opcionActivado";
					$restaurant_b="opcionulActivado";
					$restaurantit_a="opciontiendaActivado";
				}
				if($_GET["paginas"]=="sucursales" or $_GET["paginas"]=="sucursales/".$urb1 or  $_GET["paginas"]=="sucursales/".$urb1."/".$urb2){
					$restaurant_a="opcionActivado";
					$restaurant_b="opcionulActivado";
					$restaurantit_b="opciontiendaActivado";
				}
				if($_GET["paginas"]=="categorias" or $_GET["paginas"]=="categorias/".$urb1 or  $_GET["paginas"]=="categorias/".$urb1."/".$urb2){
					$restaurant_a="opcionActivado";
					$restaurant_b="opcionulActivado";
					$restaurantit_c="opciontiendaActivado";
				}
				if($_GET["paginas"]=="marcas"){
					$restaurant_a="opcionActivado";
					$restaurant_b="opcionulActivado";
					$restaurantit_d="opciontiendaActivado";
				}
				if($_GET["paginas"]=="productos" or $_GET["paginas"]=="productos/".$urb1 or  $_GET["paginas"]=="productos/".$urb1."/".$urb2){
					$restaurant_a="opcionActivado";
					$restaurant_b="opcionulActivado";
					$restaurantit_e="opciontiendaActivado";
				}
				if($_GET["paginas"]=="usuarios" or $_GET["paginas"]=="usuarios/".$urb1 or  $_GET["paginas"]=="usuarios/".$urb1."/".$urb2){
					$restaurant_a="opcionActivado";
					$restaurant_b="opcionulActivado";
					$restaurantit_f="opciontiendaActivado";
				}
				if($_GET["paginas"]=="clientes" or $_GET["paginas"]=="clientes/".$urb1 or  $_GET["paginas"]=="clientes/".$urb1."/".$urb2){
					$restaurant_a="opcionActivado";
					$restaurant_b="opcionulActivado";
					$restaurantit_i="opciontiendaActivado";
				}
				if($_GET["paginas"]=="gastos" or $_GET["paginas"]=="gastos/".$urb1 or  $_GET["paginas"]=="gastos/".$urb1."/".$urb2){
					$restaurant_a="opcionActivado";
					$restaurant_b="opcionulActivado";
					$restaurantit_g="opciontiendaActivado";
				}

				if($_GET["paginas"]=="proveedores" or $_GET["paginas"]=="proveedores/".$urb1 or  $_GET["paginas"]=="proveedores/".$urb1."/".$urb2){
					$restaurant_a="opcionActivado";
					$restaurant_b="opcionulActivado";
					$restaurantit_h="opciontiendaActivado";
				}

				if($_GET["paginas"]=="devoluciones" or $_GET["paginas"]=="devoluciones/".$urb1 or  $_GET["paginas"]=="devoluciones/".$urb1."/".$urb2){
					$restaurant_a="opcionActivado";
					$restaurant_b="opcionulActivado";
					$restaurantit_j="opciontiendaActivado";
				}

				if($_GET["paginas"]=="lotes" or $_GET["paginas"]=="lotes/".$urb1 or  $_GET["paginas"]=="lotes/".$urb1."/".$urb2){
					$restaurant_a="opcionActivado";
					$restaurant_b="opcionulActivado";
					$restaurantit_k="opciontiendaActivado";
				}

				if($_GET["paginas"]=="diapositiva" or $_GET["paginas"]=="diapositiva/".$urb1 or  $_GET["paginas"]=="diapositiva/".$urb1."/".$urb2){
					$restaurant_a="opcionActivado";
					$restaurant_b="opcionulActivado";
					$restaurantit_l="opciontiendaActivado";
				}

				if($_GET["paginas"]=="servicios" or $_GET["paginas"]=="servicios/".$urb1 or  $_GET["paginas"]=="servicios/".$urb1."/".$urb2){
					$restaurant_a="opcionActivado";
					$restaurant_b="opcionulActivado";
					$restaurantit_m="opciontiendaActivado";
				}

				if($_GET["paginas"]=="agregar_idioma"){
					$restaurantit_ab="opcionActivado";
					$restaurantit_bb="opcionulActivado";
					$restaurantit_cb="opciontiendaActivado";
				}
				if($_GET["paginas"]=="administrar_idioma" or $_GET["paginas"]=="administrar_idioma/".$urb1 or  $_GET["paginas"]=="administrar_idioma/".$urb1."/".$urb2){
					$restaurantit_ab="opcionActivado";
					$restaurantit_bb="opcionulActivado";
					$restaurantit_eb="opciontiendaActivado";
				}
				if($_GET["paginas"]=="agregar_nuevas_palabras"){
					$restaurantit_ab="opcionActivado";
					$restaurantit_bb="opcionulActivado";
					$restaurantit_db="opciontiendaActivado";
				}


			}
			//------  $lang["tablero"] ----//
			$lista_menu.='<li><a class="inicio opcion '.$home_a.'" href="'.BASE_URL_B.'"><i class="icono__principal"></i> '."Tablero".'</a></li>';
			$lista_menu.='<li><a class="inicio opcion '.$home_ca.'" href="'.BASE_URL_B.'cajas"><i class="icono__cajas"></i> '."Caja".'</a></li>';
			$lista_menu.='<li class="sub-menu">';
			$lista_menu.='<a class="tienda opcion '.$restaurant_a.'" href="javascript:void(0);"><i class="icono__restaurant"></i> '."Tienda".'</a>';
			$lista_menu.='<ul class="ultienda '.$restaurant_b.'">';
			$lista_menu.='<li><a href="'.BASE_URL_B.'" target="_blank">'."Ver pagina".'</a></li>';
			$lista_menu.='<li><a class="'.$restaurantit_a.'" href="'.BASE_URL_B.'ventas">'."Ventas".'</a></li>';
			$lista_menu.='<li><a class="'.$restaurantit_b.'" href="'.BASE_URL_B.'sucursales">'."Sucursales".'</a></li>';
			$lista_menu.='<li><a class="'.$restaurantit_h.'" href="'.BASE_URL_B.'proveedores">'."Proveedores".'</a></li>';
			$lista_menu.='<li><a class="'.$restaurantit_c.'" href="'.BASE_URL_B.'categorias">'."Categorias".'</a></li>';
			$lista_menu.='<li><a class="'.$restaurantit_d.'" href="'.BASE_URL_B.'marcas">'."Marcas".'</a></li>';
			$lista_menu.='<li><a class="'.$restaurantit_e.'" href="'.BASE_URL_B.'productos">'."Productos".'</a></li>';
			$lista_menu.='<li><a class="'.$restaurantit_k.'" href="'.BASE_URL_B.'lotes">'."Lotes".'</a></li>';
			$lista_menu.='<li><a class="'.$restaurantit_f.'" href="'.BASE_URL_B.'usuarios">'."Usuarios".'</a></li>';
			$lista_menu.='<li><a class="'.$restaurantit_i.'" href="'.BASE_URL_B.'clientes">'."Clientes".'</a></li>';
			$lista_menu.='<li><a class="'.$restaurantit_g.'" href="'.BASE_URL_B.'gastos">'."Gastos".'</a></li>';
			$lista_menu.='<li><a class="'.$restaurantit_j.'" href="'.BASE_URL_B.'devoluciones">'."Devoluciones".'</a></li>';
			$lista_menu.='<li><a class="'.$restaurantit_l.'" href="'.BASE_URL_B.'diapositiva">'."Diapositiva".'</a></li>';
			$lista_menu.='<li><a class="'.$restaurantit_m.'" href="'.BASE_URL_B.'servicios">'."Servicios".'</a></li>';
			$lista_menu.='</ul>';
			$lista_menu.='</li>';

			$lista_menu.='<li><a class="inicio opcion '.$metodo_de_pago_a.'" href="'.BASE_URL_B.'metododepago"><i class="icono__metododepago"></i> '."Metodo de pago".' </a></li>';

			$lista_menu.='<li class="sub-menu">';
			$lista_menu.='<a class="tienda opcion '.$restaurantit_ab.'" href="javascript:void(0);"><i class="icono__idioma"></i> '."Idiomas".'</a>';
			$lista_menu.='<ul class="ultienda '.$restaurantit_bb.'">';
			$lista_menu.='<li><a class="'.$restaurantit_cb.'" href="'.BASE_URL_B.'agregar_idioma">'."Nuevo Idioma".'</a></li>';
			$lista_menu.='<li><a class="'.$restaurantit_db.'" href="'.BASE_URL_B.'agregar_nuevas_palabras">'."Agrgar nuvas palabras".'</a></li>';
			$lista_menu.='<li><a class="'.$restaurantit_eb.'" href="'.BASE_URL_B.'administrar_idioma">'."Administrar Idioma".'</a></li>';
			$lista_menu.='</ul>';
			$lista_menu.='</li>';

			$lista_menu.='<li><a class="inicio opcion '.$configurar_a.'" href="'.BASE_URL_B.'configurar_pagina"><i class="icono__configurar"></i> '."Configurar".' </a></li>';
			$lista_menu.='<li><a class="inicio opcion '.$temas_a.'" href="'.BASE_URL_B.'tema_select_page"><i class="icono__temas"></i> '."Temas".' </a></li>';
			$lista_menu.='<li><a class="pointer sess_page_users"><i class="icono__userlog"></i> '."Cerrar Session".'</a></li>';

		}
		return $lista_menu;
	}

	public static function header_page_menu(){
		$u=null;
		if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""):
			$u=DatosUsuario::porId($_SESSION["admin_id"]);
			$header_menu="<div id=\"sidebar\" class=\"sidebar\">";
			$header_menu.="<ul class=\"menu\">";
			$header_menu.=DatosAdmin::page_menu_list(Luis::temass());
			$header_menu.="</ul>";
			$header_menu.="<div class=\"user_view_in_pages\">";
			$header_menu.=$u->nombre." ".$u->apellido;
			$header_menu.="</div>";
			$header_menu.="</div>";
		else:
			$header_menu=false;
		endif;
		return $header_menu;
	}

	public static function page_timeline_view(){
		$users = Luis::buscarusuario();
		if(count($users)>0){
			if(isset($_SESSION["admin_id"]) && $_SESSION["admin_id"]!=""){
				$vkluis=Luis::checktemas();
				if($vkluis->color_admin==null){
					print("<link rel=\"stylesheet\" type=\"text/css\" href=\"".BASE_URL_B."datos/source/estilos/coloreschangue.css\">");
					echo("<div class=\"contenidos_config_color\">");
					Vista::load("color_tema_select");
					echo("</div>");

					echo("<span id=\"optluisfunt\"><span>");
					echo("<span id=\"sidebar\"><span>");
					echo("<span id=\"hoverlistv\"><span>");
				}else{
					echo(DatosAdmin::headerpage());
					echo(DatosAdmin::header_page_menu());
					echo("<div id=\"contenidos_data\">");
					Vista::load("index");
					echo("</div>");
					echo('<footer class="footer">');
					echo('<p> &copy; Sistema Hosting '.date("Y").'</p>');
					echo('</footer>');
				}
				
				$pageview=false;
			}else{
				$datos_sucursales = DatosAdmin::Mostrar_sucursales_all();
				$pageview="<div class=\"iniciarpanel\">";
				if(count($datos_sucursales)>0){
					$pageview.="<form id=\"logboxinit\">";
					$pageview.="<h4 class=\"titulo\">PANEL<b>lopez</b></h4>";
					$pageview.="<br>";
					$pageview.="<input type=\"email\" name=\"correo\" class=\"cajas_de_texto_acceder\" autocomplete=\"off\" placeholder=\""."Correo"."\">";
					$pageview.="<input type=\"password\" name=\"pass\" class=\"cajas_de_texto_acceder\" autocomplete=\"off\" placeholder=\""."Clave"."\">";
					$pageview.="<select name=\"sucursal\" class=\"cajas_de_texto_acceder\">";
					$pageview.="<option value=\"\">"."Sucursales"."</option>";
					foreach ($datos_sucursales as $suc){
						$pageview.="<option value=\"$suc->id\">".html_entity_decode($suc->nombre)."</option>";
					}
					$pageview.="</select>";
					$pageview.="<div class=\"border_pals_luis\"></div>";
					$pageview.="<br>";
					$pageview.="<input type=\"submit\" class=\"boton_acceder\" value=\"Acceder\">";
					//$pageview.="<a href=\"#\" class=\"olvide_mi_pass\">Olvide mi contraseña</a>";
					$pageview.="<br>";
					$pageview.="</form>";
				}else{
					$pageview.="<script src=\"".BASE_URL_B."datos/source/scripts/jquery.min.js\"></script>";
					$pageview.="<form id=\"create_new_sucursal_page\">";
					$pageview.="<h4 class=\"titulo\">"."Crear sucursal"."</h4>";
					$pageview.="<br>";
					$pageview.="<input type=\"text\" required name=\"nombre\" class=\"cajas_de_texto_acceder_suc\" autocomplete=\"off\" placeholder=\""."Nombre sucursal"."\">";

					

					$pageview.="<br>";
					$pageview.="<div id=\"pac-container\">";
					$pageview.="<input type=\"text\" id=\"pac-input\" required name=\"address\" class=\"controls cajas_de_texto_acceder_suc\" placeholder=\""."Direccion".".\">";
					$pageview.="<div id=\"location-error\"></div>";
					$pageview.="</div>";
					$pageview.="<input id=\"lat_a\" type=\"hidden\" hidden required name=\"lati\">";
					$pageview.="<input id=\"lon_a\" type=\"hidden\" hidden required name=\"longi\">";
					$pageview.="<br>";

					$pageview.="<input type=\"text\" required name=\"referencia\" class=\"cajas_de_texto_acceder_suc\" autocomplete=\"off\" placeholder=\""."Referencia".".\">";
					$pageview.="<br>";
			        $pageview.="<div style=\"max-width:480px;height:350px;width:100%;margin:0 auto; \" id=\"map\"></div>";

			        $pageview.="<div id=\"infowindow-content\">";
				    $pageview.="<img src=\"\" width=\"16\" height=\"16\" id=\"place-icon\">";
				    $pageview.="<span id=\"place-name\"  class=\"title\"></span><br>";
				    $pageview.="<span id=\"place-address\"></span>";
				    $pageview.="</div>";
			        $pageview.="<br>";
					$pageview.="<input type=\"submit\" class=\"boton_acceder\" value=\""."Siguiente"."\">";
					$pageview.="<br>";
					$pageview.="</form>";

					$pageview.="<script src=\"".BASE_URL_B."datos/source/scripts/scriptdemapa.js\"></script>";
					$pageview.="<script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyAzVClbbKRZ2Id-N8Xr-Sws5Z32NpVB-JY&libraries=places&callback=initMap\"></script>";
					          
			
				}
				if(isset($_SESSION['adios_user'])):
					$pageview.='<div class="message_session_unsed"><b>Session finalizado.</b></div>';
					unset($_SESSION['adios_user']);
					else:
				endif;
				$pageview.="</div>";
				$pageview.="<footer class=\"footer\">";
				$pageview.="<p> &copy; Luislopez ".date("Y")."</p>";
				$pageview.="</footer>";
			}
		}else{
				$pageview="<div class=\"iniciarpanel\">";
				$pageview.="<form id=\"logboxinitregister\">";
				$pageview.="<h4 class=\"titulo\">"."Registrar"."<b></b></h4>";
				$pageview.="<input type=\"number\" required name=\"dni\" class=\"cajas_de_texto_acceder\" autocomplete=\"off\" placeholder=\""."Numero DNI"."\">";
				$pageview.="<br>";
				$pageview.="<input type=\"text\" required name=\"nombres\" class=\"cajas_de_texto_acceder\" autocomplete=\"off\" placeholder=\""."Nombres"."\">";
				$pageview.="<br>";
				$pageview.="<input type=\"text\" required name=\"apellido_paterno\" class=\"cajas_de_texto_acceder\" autocomplete=\"off\" placeholder=\""."apellido paterno"."\">";
				$pageview.="<br>";
				$pageview.="<input type=\"text\" required name=\"apellido_materno\" class=\"cajas_de_texto_acceder\" autocomplete=\"off\" placeholder=\""."apellido materno"."\">";
				$pageview.="<br>";
				$pageview.="<input type=\"email\" required name=\"correo\" id=\"inputEmail1\" class=\"cajas_de_texto_acceder\" autocomplete=\"off\" placeholder=\""."correo"."\">";
				$pageview.="<br>";
				$pageview.="<input type=\"password\" name=\"pass\" class=\"cajas_de_texto_acceder\" autocomplete=\"off\" placeholder=\""."clave"."\">";
				$pageview.="<br>";
				$pageview.="<input type=\"password\" name=\"pass_ver\" class=\"cajas_de_texto_acceder\" autocomplete=\"off\" placeholder=\""."confirma su clave"."\">";
				$pageview.="<br>";
				$pageview.="<input type=\"submit\" class=\"boton_acceder\" value=\""."siguiente"."\">";
				$pageview.="<br>";
				$pageview.="</form>";
				$pageview.="</div>";
				$pageview.="<footer class=\"footer\">";
				$pageview.="<p> &copy; Sistema Hosting ".date("Y")."</p>";
				$pageview.="</footer>";
		}
		return $pageview;
	}

	public static function urlpersona($data){
    	$encode = base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($data)))))))));
    	return $encode;
    }

    public static function urlpersona_off($data){
    	$encode = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($data)))))))));
    	return $encode;
    }

    //actualizar_sucursal_usuario
	public function actualizar_sucursal_usuario(){
		$sql = "update usuarios SET sucursal=\"$this->sucursal\" where id=$this->usuario";
		Ejecutor::doit($sql);
	}



	/// SUCURSALES
	public static function Mostrar_sucursales_all(){
		$sql = "select * from sucursales where estado=1 ORDER BY fecha desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function Mostrar_sucursales(){
		$sql = "select * from sucursales ORDER BY fecha desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function poridSucursal($id){
		$sql = "select * from sucursales where id=\"$id\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public function activarsucursal(){
		$sql = "update sucursales SET estado=\"$this->estado\" where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}

	public function agregar_sucursal(){
		$sql = "insert into sucursales (nombre,direccion,departamento,provincia,distrito,referencia,latitud,longitud,zoom,fecha) ";
		$sql .= "value (\"$this->nombre\",\"$this->direccion\",\"$this->departamento\",\"$this->provincia\",\"$this->distrito\",\"$this->referencia\",\"$this->latitud\",\"$this->longitud\",\"$this->zoom\",$this->fecha)";
		Ejecutor::doit($sql);
	}

	public function guardar_sucursal_nuevo(){
		$sql = "insert into sucursales (nombre,direccion,referencia,latitud,longitud,zoom,estado,fecha) ";
		$sql .= "value (\"$this->nombre\",\"$this->direccion\",\"$this->referencia\",\"$this->latitud\",\"$this->longitud\",\"$this->zoom\",1,$this->fecha)";
		Ejecutor::doit($sql);
	}



	public function eliminar_sucursal(){
		$sql = "delete from sucursales where id=$this->id";
		Ejecutor::doit($sql);
	}

	public function editar_sucursal(){
		$sql = "update sucursales SET nombre=\"$this->nombre\",direccion=\"$this->direccion\",departamento=\"$this->departamento\",provincia=\"$this->provincia\",distrito=\"$this->distrito\",referencia=\"$this->referencia\",latitud=\"$this->latitud\",longitud=\"$this->longitud\",zoom=\"$this->zoom\" where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}

	public static function noes_principal(){
		$sql = "update sucursales set principal=0";
		Ejecutor::doit($sql);
	}

	public static function aser_principal($id){
		$sql = "update sucursales set principal=1 where id=$id";
		Ejecutor::doit($sql);
	}


	/// DEPARTAMENTOS 

	public static function Mostrar_departamentos(){
		$sql = "select * from departamentos";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	/// PROVINCIAS 

	public static function poridDeDepartamento($departamento){
		$sql = "select * from provincias where id_departamento=$departamento and esta_activado=1 order by fecha desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	/// DISTRITOS 

	public static function poridDeProvincia($provincia){
		$sql = "select * from distritos where id_provincia=$provincia and esta_activado=1 order by fecha desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}


	//// CATEGORIAS

	public static function mostrar_categorias(){
		$sql = "select * from categorias where estado=1 ORDER BY posicion";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function categorias($id){
		$sql = "select * from categorias where ukr=\"$id\"";
		$query = Ejecutor::doit($sql);
		$found = null;
		$data = new DatosAdmin();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->nombre = $r['nombre'];
			$data->logo = $r['logo'];
			$data->sucursal = $r['sucursal'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function categoriaporUkr($ukr){
		$sql = "select * from categorias where ukr=\"$ukr\" ORDER BY id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function categoria_view_one($ukr){
		$sql = "select * from categorias where ukr=\"$ukr\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function mostrar_categoria_admin(){
		$limitepagina = 10;
		$pagina = 1;
		if(isset($_GET["pagina"]) && $_GET["pagina"]!=""){ $pagina=$_GET["pagina"]; }
		$iniciarpagina = 0;
		$finpagina = $limitepagina;
		if($pagina>1){  $iniciarpagina=($pagina-1)*$limitepagina;$finpagina=($pagina)*$limitepagina; }
		$sql = "select * from categorias order by fecha desc limit $iniciarpagina,$limitepagina";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function getById_categoria($id){
		$sql = "select * from categorias where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function contar_id_categorias(){
		$sql = "select count(*) as c from categorias where id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function Verif_categoria($name){
		$sql = "select * from categorias where ukr=\"$name\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public function editar_categoria(){
		$sql = "update categorias SET nombre=\"$this->nombre\",ukr=\"$this->ukr\",logo=\"$this->logo\" where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}

	public function agregar_categoria(){
		$sql = "insert into categorias (nombre,logo,codigo,ukr,fecha) ";
		$sql .= "value (\"$this->nombre\",\"$this->logo\",\"$this->codigo\",\"$this->ukr\",$this->fecha)";
		Ejecutor::doit($sql);
	}

	public function eliminar_categoria(){
		$sql = "delete from categorias where id=$this->id";
		Ejecutor::doit($sql);
	}

	/// SUB CATEGORIAS

	public static function mostrar_sub_categoriass(){
		$sql = "select * from subcategorias";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function mostrar_sub_categorias($categoria){
		$sql = "select * from subcategorias where categoria=$categoria order by fecha desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function sub_categorias_porNombreuk($uk){
		$sql = "select * from subcategorias where ukr=\"$uk\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function sub_categorias_por_item($it){
		$sql = "select * from subcategorias where id=$it";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public function agregar_sub_categoria(){
		$sql = "insert into subcategorias (nombre,codigo,ukr,categoria,fecha) ";
		$sql .= "value (\"$this->nombre\",\"$this->codigo\",\"$this->ukr\",\"$this->id_categoria\",$this->fecha)";
		Ejecutor::doit($sql);
	}

	public static function poridDesubCategorias($categoria){
		$sql = "select * from subcategorias where categoria=$categoria order by fecha desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function Verif_sub_categoria($name){
		$sql = "select * from subcategorias where ukr=\"$name\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function contar_id_sub_categorias(){
		$sql = "select count(*) as c from subcategorias where id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public function editar_sub_categoria(){
		$sql = "update subcategorias SET nombre=\"$this->nombre\",ukr=\"$this->ukr\" where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}

	public static function sub_categoria_getById($id){
		$sql = "select * from subcategorias where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public function eliminar_sub_categoria(){
		$sql = "delete from subcategorias where id=$this->id";
		Ejecutor::doit($sql);
	}
	
	/// MARCAS
	
	public static function mostrar_marcas(){
		$sql = "select * from marcas ORDER BY fecha desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public function agregar_marca(){
		$sql = "insert into marcas (nombre,codigo,fecha) ";
		$sql .= "value (\"$this->nombre\",\"$this->codigo\",$this->fecha)";
		Ejecutor::doit($sql);
	}
	
	public function editar_marca(){
		$sql = "update marcas SET nombre=\"$this->nombre\" where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}

	public function eliminar_marca(){
		$sql = "delete from marcas where id=$this->id";
		Ejecutor::doit($sql);
	}

	//// PRODUCTOS

	public static function MostrarItems_cartas_opciones($opc){
		$sql = "select * from items where categoria=$opc ORDER BY id desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function MostrarItems_cartas_opciones_sub($opc){
		$sql = "select * from items where subcategoria=$opc ORDER BY id desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function porUkr_items_page($ukr){
		$sql = "select * from items where ukr=\"$ukr\" and estado=1  ORDER BY id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function porID_producto_add_compra($id){
		$sql = "select * from items where barcode=\"$id\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function MostrarPublicacionesMarket($persona,$catte){
		$sql = "select * from items where categoria=$catte ORDER BY fecha desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function itemview_productos($producto){
		$sql = "select * from items where id=$producto ORDER BY id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	/*public static function ContarPublicacionesMarket($persona,$catte){
		$sql = "select count(*) as c from items where categoria=$catte and estado=1";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}*/

	public static function ContarPublicacionesMarket($persona,$catte){
		$sql = "select count(*) as c from items where categoria=$catte and estado=1";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}


/*public static function view_page_searchs($q){
		$sql = "select stock.barcode,stock.en_carrito, stock.ram,stock.hard_drive,stock.drivetype,stock.aditional_information,stock.other_information, items.nombre,items.precio from stock JOIN items on items.id = stock.id_producto where (stock.barcode like '%$q%' or stock.make like '%$q%' or items.nombre like '%$q%') and stock.en_carrito=0 and stock.estado=0";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}*/



	public static function porID_producto($id){
		$sql = "select * from items where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function porID_producto_detail($id){
		$sql = "select * from items where id=\"$id\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function porID_producto_stock($id){
		$sql = "select * from stock where id_producto=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	

	public static function porUkr_producto($ukr){
		$sql = "select * from items where ukr=\"$ukr\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function mostrar_productos(){
		$sql = "select * from items ORDER BY fecha desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function mostrar_productos_stock_lista($id,$user){
		$sql = "select * from stock where id_producto=$id and en_carrito=0 and reserva=$user ORDER BY fecha desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function mostrar_productos_stock_lista_admin($id){
		$sql = "select * from stock where id_producto=$id and en_carrito=0 ORDER BY fecha desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function mostrar_productos_stock_lista_order($id){
		$sql = "select * from stock where id_producto=$id and en_carrito=1 ORDER BY fecha desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function mostrar_productos_stock_lista_order_dos_tabla($id,$barcode){
		$sql = "select * from stock where id_producto=$id and en_carrito=1 and barcode=\"$barcode\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function producto_categoria($id){
		$sql = "select * from items where categoria=$id";
		$query = Ejecutor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new DatosAdmin();
			$array[$cnt]->id = $r['id'];
			$cnt++;
		}
		return $array;
	}

	

	public function agregar_producto(){
		$sql = "insert into items (nombre,codigo,fecha) ";
		$sql .= "value (\"$this->nombre\",\"$this->codigo\",$this->fecha)";
		Ejecutor::doit($sql);
	}

	public function editar_producto(){
		$sql = "update items SET nombre=\"$this->nombre\" where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}

	public function eliminar_producto(){
		$sql = "delete from items where id=$this->id";
		Ejecutor::doit($sql);
	}

	public function publicar_producto(){
		$sql = "insert into items (usuario,nombre,moneda_a,precio,precio_final,marca,descripcion,categoria,subcategoria,codigo,barcode,sucursal,ukr,fecha)";

		$sql .= "value ($this->id_persona,\"$this->titulo\",$this->moneda_a,\"$this->precio\",\"$this->precio_final\",$this->marca,\"$this->descripcion\",\"$this->id_categoria\",".(($this->id_subcategoria=='')?"NULL":("'".$this->id_subcategoria."'")).",\"$this->codigo\",\"$this->barcode\",$this->sucursal,\"$this->ub\",\"$this->fecha\")";
		return Ejecutor::doit($sql);
	}

	public function update_producto(){
		$sql = "update items set nombre=\"$this->titulo\",descripcion=\"$this->descripcion\",moneda_a=$this->moneda_a,precio=\"$this->precio\",precio_final=\"$this->precio_final\",marca=\"$this->marca\",categoria=\"$this->id_categoria\",subcategoria=".(($this->id_subcategoria=='')?"NULL":("'".$this->id_subcategoria."'")).",ukr=\"$this->ub\" where id=$this->id";
		Ejecutor::doit($sql);
	}

	public function agregar_stock_items(){
		$sql = "insert into stock (stock,id_producto,id_sucursal,id_usuario,fecha) ";
		$sql .= "value ($this->stock,$this->id_producto,$this->id_sucursal,$this->id_usuario,$this->fecha)";
		Ejecutor::doit($sql);
	}

	public static function buscar_item($user,$q){
		$sql = "select * from items where (nombre like '%$q%' and $user or codigo like '%$q%' and $user) ORDER BY fecha desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function buscar_items_page($q){
		$sql = "select * from items where (nombre like '%$q%' or codigo like '%$q%') ORDER BY fecha desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function view_page_searchs($q){
		$sql = "select stock.barcode,stock.en_carrito, stock.ram,stock.hard_drive,stock.drivetype,stock.aditional_information,stock.other_information, items.nombre,items.precio from stock JOIN items on items.id = stock.id_producto where (stock.barcode like '%$q%' or stock.make like '%$q%' or items.nombre like '%$q%') and stock.en_carrito=0 and stock.estado=0";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}


	////// realizar la busqueda de los items en stock de compra en la web
	public static function view_page_searchs_venta_en_la_web($q){
		$sql = "select stock.barcode,stock.en_carrito, stock.ram,stock.hard_drive,stock.drivetype,stock.aditional_information,stock.other_information, items.nombre,items.precio,items.id from stock JOIN items on items.id = stock.id_producto where (stock.barcode like '%$q%' or stock.make like '%$q%' or items.nombre like '%$q%') and stock.en_carrito=0 and stock.estado=0";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}
	/*** finaliza el proceso de la busqueda de los items en stock de la web *///
	public static function view_page_searchs_reservas($q,$clien){
		$sql = "select stock.barcode,stock.en_carrito, stock.ram,stock.hard_drive,stock.drivetype,stock.aditional_information,stock.other_information, items.nombre,items.precio from stock JOIN items on items.id = stock.id_producto where (stock.barcode like '%$q%' or stock.make like '%$q%' or items.nombre like '%$q%') and stock.en_carrito=0 and stock.estado=4 and stock.cliente=$clien";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function view_page_searchs_two($q){
		$sql = "select stock.barcode, stock.ram,stock.hard_drive,stock.drivetype,stock.aditional_information,stock.other_information, items.nombre,items.id,items.precio from stock JOIN items on items.id = stock.id_producto where stock.barcode=\"$q\" or stock.make=\"$q\" or items.nombre=\"$q\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function contar_items_stock_por_items($persona,$item){
		$sql = "select count(*) as c from stock where id_usuario=$persona and id_producto=$item and en_carrito=1";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function items_view_list_add_order($user,$id_item){
		$sql = "select * from items where id=$id_item and usuario=$user and estado=1 ";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function ver_item_por_su_id($id){
		$sql = "select * from items where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function items_stock_in_order_items($user){
		$sql = "select * from items where usuario=$user and estado=1 and en_carrito=1";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function item_principal_stock($user,$item){
		$sql = "select * from items where usuario=$user and id=$item";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function items_stock_in_order_items_consulta($user,$item){
		$sql = "select * from stock where id_usuario=$user and id_producto=$item";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function items_stock_in_order_stock($user){
		$sql = "select * from stock where en_carrito=1 and id_usuario=$user";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function porID_producto_add_comprasssss($id){
		$sql = "select * from items where barcode=\"$id\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function buscar_item_categoria($user,$q){
		$sql = "select * from items where usuario=$user and categoria=$q ORDER BY fecha desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function ContarPublicacionesMarket_seacrh_categoria($q){
		$sql = "select count(*) as c from items where categoria=$q";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function cantidad_stock_de_producto($producto,$user){
		$sql = "select count(*) as c from stock where id_producto=$producto and reserva=$user";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function cantidad_stock_de_producto_admin($producto){
		$sql = "select count(*) as c from stock where id_producto=$producto and estado=0";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function cantidad_stock_de_producto_admin_sucursal($producto,$sucursal){
		$sql = "select count(*) as c from stock where id_producto=$producto and id_sucursal=$sucursal";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function ContarPublicacionesMarket_seacrh($q){
		$sql = "select count(*) as c from items where nombre like '%$q%' or codigo like '%$q%'";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function stocks_items($id){
		$sql = "select sum(stock) as dc from stock where id_producto=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function stocks_items_ukr($id){
		$sql = "select sum(stock) as dc from stock where ukr=\"$id\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function view_documents(){
		$sql = "select * from documentos";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	/// IMAGENES

	public static function listimagetienda($producto){
		$sql = "select * from imagen_item where id_item=$producto order by id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function imagenviewlist($imagen){
		$sql = "select * from imagen_item where id=$imagen";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function Mostrarimageneditar($producto){
		$sql = "select * from imagen_item where id_item=$producto ORDER BY id";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function porProductoslista_imagenes($id){
		$sql = "select * from imagen_item where id_item=\"$id\"";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function cantidad_imagenes($producto){
		$sql = "select count(*) as c from imagen_item where id_item=$producto";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public function agrega_imagen_producto(){
		$sql = "insert into imagen_item (imagen,id_item,fecha)";
		$sql .= "value (\"$this->imagen\",$this->id_producto,$this->fecha)";
		return Ejecutor::doit($sql);
	}

	public function eliminar_imagen_one_items(){
		$sql = "delete from imagen_item where id=$this->id";
		Ejecutor::doit($sql);
	}

	/// PROVEEDORES

	public static function mostar_proveedores(){
		$sql = "select * from proveedores";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public function agregar_proveedor(){
		$sql = "insert into proveedores (nombre,celular,direccion,ruc,ukr,fecha)";
		$sql .= "value (\"$this->nombre\",\"$this->celular\",\"$this->direccion\",\"$this->ruc\",\"$this->ukr\",$this->fecha)";
		return Ejecutor::doit($sql);
	}

	public static function poridproveedor($id){
		$sql = "select * from proveedores where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public function update_proveedor(){
		$sql = "update proveedores SET nombre=\"$this->nombre\",celular=\"$this->celular\",direccion=\"$this->direccion\",ruc=\"$this->ruc\",ukr=\"$this->ukr\" where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}

	public function eliminar_proveedor(){
		$sql = "delete from proveedores where id=$this->id";
		Ejecutor::doit($sql);
	}

	// DOCUMENTOS
	public static function mostrardocumentos(){
		$sql = "select * from documentos";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function poriddocumento($id){
		$sql = "select * from documentos where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	// CLIENTES
	public static function Cliente_porElCorreo($mail){
		$sql = "select * from personas where correo=\"$mail\"";
		$query = Ejecutor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new DatosAdmin();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->apellido_paterno = $r['apellido_paterno'];
			$array[$cnt]->apellido_materno = $r['apellido_materno'];
			$array[$cnt]->celular = $r['celular'];
			$array[$cnt]->correo = $r['correo'];
			$array[$cnt]->codigo = $r['codigo'];
			$array[$cnt]->pass = $r['pass'];
			$array[$cnt]->estado = $r['estado'];
			$array[$cnt]->fecha = $r['fecha'];
			$cnt++; 
		}
		return $array;
	}

	public function new_client_in_page_orders(){
		$sql = "insert into personas (tipo,dni,nombre,apellido_paterno,apellido_materno,celular,direccion,ukr,correo,pass,vendedor,fecha) ";
		$sql .= "value ($this->tipo,\"$this->dni\",\"$this->nombre\",\"$this->apellido_paterno\",\"$this->apellido_materno\",\"$this->celular\",\"$this->direccion\",\"$this->ukr\",\"$this->correo\",\"$this->pass\",$this->vendedor,$this->fecha)";
		Ejecutor::doit($sql);
	}

	public function registrar_cliente_page(){
		$sql = "insert into personas (tipo,dni,nombre,apellido_paterno,apellido_materno,celular,ukr,correo,pass,codigo,fecha) ";
		$sql .= "value ($this->tipo,\"$this->dni\",\"$this->nombre\",\"$this->apellido_paterno\",\"$this->apellido_materno\",\"$this->celular\",\"$this->ukr\",\"$this->correo\",\"$this->pass\",\"$this->codigo\",\"$this->fecha\")";
		Ejecutor::doit($sql);
	}

	public function update_client_in_pages_data(){
		$sql = "update personas SET tipo=$this->tipo,dni=\"$this->dni\",nombre=\"$this->nombre\",apellido_paterno=\"$this->apellido_paterno\",apellido_materno=\"$this->apellido_materno\",celular=\"$this->celular\",direccion=\"$this->direccion\",ukr=\"$this->ukr\",correo=\"$this->correo\" where id=$this->id";
		Ejecutor::doit($sql);
	}
	public function update_client_in_pages_data_personal(){
		$sql = "update personas SET dni=\"$this->dni\",nombre=\"$this->nombre\",apellido_paterno=\"$this->apellido_paterno\",apellido_materno=\"$this->apellido_materno\",ukr=\"$this->ukr\" where id=$this->id";
		Ejecutor::doit($sql);
	}
	public function editarpass_clients_in_page(){
		$sql = "update personas SET pass=\"$this->pass\" where id=$this->id";
		Ejecutor::doit($sql);
	}

	public function activar_persona(){
		$sql = "update personas SET estado=1 where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}
	public function update_password(){
		$sql = "update personas SET pass=\"$this->pass\" where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}
	

	public static function MostrarClientes($user){
		$sql = "select * from personas where vendedor=$user";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function porclientview($client,$vendedor){
		$sql = "select * from personas where dni like '%$client%' and vendedor=$vendedor or nombre like '%$client%' and vendedor=$vendedor or apellido_paterno like '%$client%' and vendedor=$vendedor or apellido_materno like '%$client%' and vendedor=$vendedor";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function porclientview_one($client,$vendedor){
		$sql = "select * from personas where (nombre like '%$client%' and vendedor=$vendedor)";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function cliente_ver_por_ukr($client){
		$sql = "select * from personas where ukr=\"$client\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	
	public function delete_client_in_pages(){
		$sql = "delete from personas where id=$this->id";
		Ejecutor::doit($sql);
	}

	public static function por_el_id_cliente($id){
		$sql = "select * from personas where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	

	/// METODO DE PAGO

	public static function MostrarMetododepago(){
		$sql = "select * from tipo_de_pago";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function metodo_de_pago_por_id($id){
		$sql = "select * from tipo_de_pago where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	/// actualisar categogia por default en productos

	public static function update_prod_default($namsdat,$user){
		$sql = "update usuarios SET categoria_prod_def=\"$namsdat\" where id=$user";
		Ejecutor::doit($sql);
	}


	///// tipo de productos a ver 
	public static function tiposdeclientes(){
    	$sql = "select * from tipo_clientes";
    	$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
    }

    public static function tiposdeclientes_por_id($id){
    	$sql = "select * from tipo_clientes where id=$id";
    	$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
    }

	public static function Mostrar_typeitems_list(){
		$sql = "select * from tipo_items";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function Ver_tipo_deproducto_por_item($item){
		$sql = "select * from tipo_items where id=$item";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}


	/// stock datas 
	public static function stock_por_item_y_codigo($item,$barcode){
		$sql = "select * from stock where id_producto=$item and barcode=$barcode";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public function actualizar_stock_items_procesador(){
		$sql = "insert into stock (id_sucursal,proveedor,documento,num_documento,barcode,cpu,cpu_speed,id_producto,id_usuario,fecha) ";
		$sql .= "value ($this->id_sucursal,$this->proveedor,$this->documento,\"$this->num_documento\",\"$this->barcode\",\"$this->cpu\",\"$this->cpu_speed\",$this->id_producto,$this->id_usuario,\"$this->fecha\")";
		Ejecutor::doit($sql);
	}

	public function actualizar_stock_items_all(){
		$sql = "insert into stock (id_sucursal,proveedor,documento,num_documento,barcode,id_producto,id_usuario,fecha) ";
		$sql .= "value ($this->id_sucursal,$this->proveedor,$this->documento,\"$this->num_documento\",\"$this->barcode\",$this->id_producto,$this->id_usuario,\"$this->fecha\")";
		Ejecutor::doit($sql);
	}

	public function importar_exel_database_laptop(){
		$sql = "insert into stock (proveedor,documento,num_documento,barcode,make,model,series,coa,cpu,cpu_speed,ram,hard_drive,drivetype,aditional_information,other_information,screen_size,battery,battery_test,web_cam,stock,id_producto,id_sucursal,id_usuario,fecha) ";
		
		$sql .= "value ($this->proveedor,$this->documento,\"$this->num_documento\",\"$this->barcode\",\"$this->make\",\"$this->model\",\"$this->series\",\"$this->coa\",\"$this->cpu\",\"$this->cpu_speed\",\"$this->ram\",\"$this->hard_drive\",\"$this->drivetype\",\"$this->aditional_information\",\"$this->other_information\",\"$this->screen_size\",\"$this->battery\",\"$this->battery_test\",\"$this->web_cam\",\"$this->stock\",$this->id_producto,$this->id_sucursal,$this->id_usuario,\"$this->fecha\")";
		return Ejecutor::doit($sql);
	}

	public function importar_exel_database_cpu(){
		$sql = "insert into stock (proveedor,documento,num_documento,barcode,make,model,series,form_factor,coa,cpu,cpu_speed,ram,hard_drive,drivetype,aditional_information,other_information,stock,id_producto,id_sucursal,id_usuario,fecha) ";
		
		$sql .= "value ($this->proveedor,$this->documento,\"$this->num_documento\",\"$this->barcode\",\"$this->make\",\"$this->model\",\"$this->series\",\"$this->form_factor\",\"$this->coa\",\"$this->cpu\",\"$this->cpu_speed\",\"$this->ram\",\"$this->hard_drive\",\"$this->drivetype\",\"$this->aditional_information\",\"$this->other_information\",\"$this->stock\",$this->id_producto,$this->id_sucursal,$this->id_usuario,\"$this->fecha\")";
		return Ejecutor::doit($sql);
	}

	public function importar_exel_database_aio(){
		$sql = "insert into stock (proveedor,documento,num_documento,barcode,make,model,series,coa,cpu,cpu_speed,ram,hard_drive,drivetype,aditional_information,other_information,screen_size,web_cam,ac_adapter,stock,id_producto,id_sucursal,id_usuario,fecha) ";
		$sql .= "value ($this->proveedor,$this->documento,$this->num_documento,\"$this->barcode\",\"$this->make\",\"$this->model\",\"$this->series\",\"$this->coa\",\"$this->cpu\",\"$this->cpu_speed\",\"$this->ram\",\"$this->hard_drive\",\"$this->drivetype\",\"$this->aditional_information\",\"$this->other_information\",\"$this->screen_size\",\"$this->web_cam\",\"$this->ac_adapter\",\"$this->stock\",$this->id_producto,$this->id_sucursal,$this->id_usuario,\"$this->fecha\")";
		return Ejecutor::doit($sql);
	}

	///Ventas vender
	public static function ventas_registrados_all(){
		$sql = "select * from ventas";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function verifica_la_venta_para_entregar_actualiza($venta){
		$sql = "select * from ventas where id=$venta and estado_de_venta=7";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function verifica_detalles_venta_actualizado($venta){
		$sql = "select * from ventas where id=$venta";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	

	public static function verifica_la_venta_para_entregar_actualiza_preparar($venta){
		$sql = "select * from ventas where id=$venta and estado_de_venta=6";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function ventas_registrados($dataa){
		$sql = "select * from ventas where vendedor=$dataa and estado_de_venta=0";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function ventas_registrados_entregar($dataa){
		$sql = "select * from ventas where vendedor=$dataa and estado_de_venta=4 and entregar=1";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function ventas_registrados_en_la_web_preparar($venta){
		$sql = "select * from ventas where id=$venta and estado_de_venta=6 and web=1";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}
	public static function visualizar_venta_realtime_en_la_web_preparar($venta){
    	$sql = "select * from ventas where id=$venta and estado_de_venta=6 and web=1";
    	$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
    }

    public static function ventas_registrados_en_la_web_entregar($venta){
		$sql = "select * from ventas where id=$venta and estado_de_venta=7";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function ventas_registrados_en_la_web_detalles_venta($venta){
		$sql = "select * from ventas where id=$venta";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function visualizar_venta_realtime_en_la_web_entregar($venta){
    	$sql = "select * from ventas where id=$venta and estado_de_venta=7 and web=1";
    	$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
    }

    public static function visualizar_venta_realtime_en_la_web_detalles_venta($venta){
    	$sql = "select * from ventas where id=$venta";
    	$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
    }

	public static function ventas_registrados_en_la_web($venta){
		$sql = "select * from ventas where id=$venta and estado_de_venta=7 and web=1";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}
	public static function visualizar_venta_realtime_en_la_web($venta){
    	$sql = "select * from ventas where id=$venta and estado_de_venta=7 and web=1";
    	$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
    }

	public static function TotaldeVentas(){
		$sql = "select count(*) as c from ventas";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	
	public function nueva_venta(){
		$sql = "insert into ventas (vendedor,numero_venta,barcode,entregar) ";
		$sql .= "value ($this->vendedor,\"$this->numero_venta\",\"$this->barcode\",$this->entregar)";
		Ejecutor::doit($sql);
	}

	public static function visualizar_venta_realtime($da){
    	$sql = "select * from ventas where vendedor=$da and estado_de_venta=0";
    	$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
    }

    public function actualiza_documento_venta(){
		$sql = "update ventas set documento=$this->documento where estado_de_venta=0 and vendedor=$this->vendedor";
		Ejecutor::doit($sql);
	}

	public function actualiza_cliente_venta(){
		$sql = "update ventas set cliente=$this->cliente where estado_de_venta=0 and vendedor=$this->vendedor";
		Ejecutor::doit($sql);
	}

	public function actualiza_num_doc_venta(){
		$sql = "update ventas set numero_doc=$this->numero_doc where estado_de_venta=0 and vendedor=$this->vendedor";
		Ejecutor::doit($sql);
	}

	public function actualiza_metodo_de_pago_venta(){
		$sql = "update ventas set metodo_pago=$this->metodo_pago where estado_de_venta=0 and vendedor=$this->vendedor";
		Ejecutor::doit($sql);
	}

	/// Itemd and stock config
	public static function items_view_list_add_order_one($user,$barcodes,$car){
		$sql = "select * from stock where id_usuario=$user and barcode=\"$barcodes\" and en_carrito=$car ";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function items_view_list_add_order_two_items($user,$item){
		$sql = "select * from items where usuario=$user and id=$item";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public function add_item_in_order_page(){
		$sql = "update stock set en_carrito=$this->en_carrito where barcode=\"$this->barcode\"";
		Ejecutor::doit($sql);
	}

	public function add_order_item_lists_up(){
		$sql = "update items set en_carrito=$this->en_carrito where id=$this->id_producto";
		Ejecutor::doit($sql);
	}

	public static function codes_items_stock($producto){
    	$sql = "select * from stock where id_producto=$producto";
    	$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
    }

    public static function codes_items_stock_view_stocks($producto,$user,$en_carrito){
    	$sql = "select * from stock where id_producto=$producto and id_usuario=$user and en_carrito=$en_carrito";
    	$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
    }

    public function update_item_in_order(){
		$sql = "update items set en_carrito=$this->en_carrito where id=$this->id";
		Ejecutor::doit($sql);
	}

	public function update_stock_data(){
		$sql = "update stock set en_carrito=$this->en_carrito where id=$this->id_stock";
		Ejecutor::doit($sql);
	}
    
    public static function revisar_n_venta($user){
    	$sql = "select * from ventas where ";
    	$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
    }

    public static function documento_por_id($id){
    	$sql = "select * from documentos where id=$id";
    	$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
    }


    ///// GESTION DEL CARRITO ACCIONES

    /// Buscamos el codigo de barras en estok para ver el id
    public static function buscar_el_item_en_estok($user,$barcodes){
		$sql = "select * from stock where id_usuario=$user and barcode=\"$barcodes\" ";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	// agregamos el producto al carrito
	public function agregar_producto_en_carrito(){
		$sql = "update items set en_carrito=1 where id=$this->id";
		Ejecutor::doit($sql);
	}

	// agregamos stock al producto
	public function agregar_estok_en_carrito(){
		$sql = "update stock set en_carrito=1 where id_usuario=$this->id_usuario and id_producto=$this->id and barcode=\"$this->barcode\"";
		Ejecutor::doit($sql);
	}

	/// contamos el stock agregado
	public static function contamos_stock_agregado($user,$item){
		$sql = "select * from stock where id_usuario=$user and id_producto=$item and en_carrito=1";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	// mostrammos datos del producto pre cargados
	public static function mostramos_el_producto_en_carrito($usuario,$producto){
		$sql = "select * from items where usuario=$usuario and id=$producto and en_carrito=1";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	///mostrar data para eliminar la compra
	public static function mostrar_datos_para_eliminar_compra($usuario){
		$sql = "select * from items where usuario=$usuario and en_carrito=1";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function mostrar_datos_para_eliminar_compra_stock($usuario){
		$sql = "select * from stock where id_usuario=$usuario and en_carrito=1";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	/// eliminar items de carrito
	public function eliminar_carrito_item(){
		$sql = "update items set en_carrito=0 where id=$this->id and usuario=$this->id_usuario";
		Ejecutor::doit($sql);
	}

	public function eliminar_carrito_items_de_venta(){
		$sql = "update items set en_carrito=0 where id=$this->id_item and usuario=$this->id_usuario";
		Ejecutor::doit($sql);
	}

	public function eliminar_carrito_stock(){
		$sql = "update stock set en_carrito=0 where id=$this->id and id_usuario=$this->id_usuario";
		Ejecutor::doit($sql);
	}

	public function eliminar_venta_completa(){
		$sql = "delete from ventas where id=$this->venta";
		Ejecutor::doit($sql);
	}

	


	/// proccesar venta tienda
	public static function stock_en_venta_ver($user){
		$sql = "select * from stock where id_usuario=$user and estado=0 and en_carrito=1";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function stock_en_venta_reservado_ver($user,$cliente){
		$sql = "select * from stock where id_usuario=$user and estado=4 and en_carrito=1 and cliente=$cliente";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public function procesar_venta_en_lista(){
		$sql = "update ventas set estado_de_venta=$this->estado_venta, vuelto=\"$this->vuelto\",pago_con=\"$this->pago_con\",numero_operacion=\"$this->numero_operacion\",fecha=\"$this->fecha\" where id=$this->id and vendedor=$this->id_usuario";
		Ejecutor::doit($sql);
	}

	public function procesar_venta_items_venta(){
		$sql = "update items set en_carrito=0 where id=$this->id and usuario=$this->id_usuario";
		Ejecutor::doit($sql);
	}

	public function procesar_productos_de_stock(){
		$sql = "update stock set estado=$this->estado_venta,en_carrito=0,cliente=$this->cliente,numero_venta=\"$this->numero_venta\" where barcode=\"$this->barcode\" and id_usuario=$this->id_usuario";
		Ejecutor::doit($sql);
	}

	public function procesar_numero_de_venta_reserva(){
		$sql = "update ventas set numero_venta_reserva=\"$this->numero_venta_reserva_venta\" where id=$this->id and vendedor=$this->id_usuario";
		Ejecutor::doit($sql);
	}

	//// se muestran las ventas y tipos de ventas 
	public static function todas_las_ventas($tienda){
		$sql = "select * from ventas where sucursal=$tienda";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}
	
	public static function Mostrar_ventas_finalizados($user){
		$sql = "select * from ventas where vendedor=$user and estado_de_venta=3";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function Mostrar_ventas_finalizados_hoy($user){
		$sql = "select * from ventas where vendedor=$user and estado_de_venta=3 and date(fecha_entrega)=date(NOW())";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}


	//// visualizar documento y otros mas en ventas 
	public static function Ver_documento_por_id($id){
		$sql = "select * from documentos where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function Ver_nombre_del_cliente_por_id($id){
		$sql = "select * from personas where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function Ver_estado_de_venta_por_id($id){
		$sql = "select * from estado_venta where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}
	
	/// devoluciones

	public static function devoluciones_data($user){
		$sql = "select * from devoluciones where id_vendedor=$user";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function devoluciones_data_one($user){
		$sql = "select * from devoluciones where id_vendedor=$user and estado=0";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public function crear_devolucion(){
		$sql = "insert into devoluciones (id_vendedor,fecha) ";
		$sql .= "value ($this->id_vendedor,\"$this->fecha\")";
		Ejecutor::doit($sql);
	}

	public function cliente_devolucion_item(){
		$sql = "update devoluciones set id_cliente=$this->id_cliente where id_vendedor=$this->id_vendedor and estado=0";
		Ejecutor::doit($sql);
	}
	
	public function actualiza_documento_devolucion(){
		$sql = "update devoluciones set documento=$this->documento where id_vendedor=$this->vendedor and estado=0";
		Ejecutor::doit($sql);
	}

	public function actualiza_num_doc_devolucion(){
		$sql = "update devoluciones set num_documento=\"$this->numero_doc\" where id_vendedor=$this->vendedor and estado=0";
		Ejecutor::doit($sql);
	}


	///// lotes y detalles. 
	public static function lotes_lista(){
		$sql = "select * from stock where id in (SELECT max(id) FROM stock GROUP BY num_documento)";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function lotes_lista_por_lotes($nums){
		$sql = "select * from stock where num_documento=\"$nums\" ORDER BY id_producto";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function lotes_lista_contar($doc){
		$sql = "select count(num_documento) as c from stock where num_documento=\"$doc\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function lotes_lista_contar_rest($doc){
		$sql = "select count(num_documento) as c from stock where num_documento=\"$doc\" and estado=0";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function cantidad_reservado($doc){
		$sql = "select count(num_documento) as c from stock where num_documento=\"$doc\" and estado=4";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function cantidad_vendidos_lote($doc){
		$sql = "select count(num_documento) as c from stock where num_documento=\"$doc\" and estado=3";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function visualizar_lotes_pagina($doc){
		$sql = "select * from stock where num_documento=\"$doc\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function ver_el_item($item){
		$sql = "select * from stock where id=$item";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}


	/// revisar errores 
	public static function lotes_lista_sin_bateria($doc){
		$sql = "select count(num_documento) as c from stock where num_documento=\"$doc\" and battery=\"N\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function lotes_lista_no_carga_bateria($doc){
		$sql = "select count(num_documento) as c from stock where num_documento=\"$doc\" and battery_test=\"NG\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function lotes_lista_error_teclado($doc){
		$sql = "select count(num_documento) as c from stock where num_documento=\"$doc\" and teclado_error=1";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function lotes_lista_ac_adaptador($doc){
		$sql = "select count(num_documento) as c from stock where num_documento=\"$doc\" and ac_adapter=\"N\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}


	////// reservas 
	public function reservar_item_stock_vendedor(){
		$sql = "update stock set reserva=$this->vendedor where id=$this->id and en_carrito=0";
		Ejecutor::doit($sql);
	}

	public function quitar_reservar_item_stock_vendedor(){
		$sql = "update stock set reserva=$this->vendedor where id=$this->id and en_carrito=0 and reserva=$this->usuario";
		Ejecutor::doit($sql);
	}
	
	//// eliminar datos de stock
	
	public function eliminar_item_de_stock(){
		$sql = "delete from stock where id=$this->id";
		Ejecutor::doit($sql);
	}


	////// DATOS TIPO DE OPCIONES DE ITEMS  
	public function add_detalle_type_b(){
		$sql = "insert into opciones_type (nombre,id_items,id_cat_add) ";
		$sql .= "value (\"$this->nombre\",$this->id_items,$this->cat)";
		return Ejecutor::doit($sql);
	}

	public function add_detalle_type_c(){
		$sql = "insert into opciones_type (nombre,id_items,id_cat_sub_add) ";
		$sql .= "value (\"$this->nombre\",$this->id_items,$this->cat)";
		return Ejecutor::doit($sql);
	}

	public function add_detalle_type(){
		$sql = "insert into opciones_type (nombre,id_items) ";
		$sql .= "value (\"$this->nombre\",$this->id_items)";
		return Ejecutor::doit($sql);
	}

	public function update_options_type(){
		$sql = "update opciones_type set nombre=\"$this->nombre\", id_cat_add=null, id_cat_sub_add=null where id=$this->id";
		Ejecutor::doit($sql);
	}

	public function update_options_type_b(){
		$sql = "update opciones_type set nombre=null, id_cat_add=$this->cat, id_cat_sub_add=null where id=$this->id";
		Ejecutor::doit($sql);
	}

	public function update_options_type_c(){
		$sql = "update opciones_type set nombre=null, id_cat_add=null, id_cat_sub_add=$this->sub where id=$this->id";
		Ejecutor::doit($sql);
	}
	
	public function eliminar_cambios(){
		$sql = "delete from opciones_items where id_opciones_type=$this->id and inb=1";
		Ejecutor::doit($sql);
	}

	public function eliminar_cambios_b(){
		$sql = "delete from opciones_items where id_opciones_type=$this->id and inb=0";
		Ejecutor::doit($sql);
	}

	public function eliminar_cambios_c(){
		$sql = "delete from opciones_items where id_opciones_type=$this->id and inb=1";
		Ejecutor::doit($sql);
	}

	
	public function delete_option_type(){
		$sql = "delete from opciones_type where id=$this->id";
		Ejecutor::doit($sql);
	}

	public static function ver_opciones_type($id){
		$sql = "select * from opciones_type where id_items=\"$id\"";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function ver_opciones_type_por_id($id){
		$sql = "select * from opciones_type where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function ver_opciones_type_one_name($id){
		$sql = "select * from opciones_type where nombre=\"$id\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function ver_opciones_type_one_name_view($id,$nomb){
		$sql = "select * from opciones_type where id_items=$id and nombre=\"$nomb\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function porID_opciones_type($id){
		$sql = "select * from opciones_type where id=\"$id\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	////// DATOS OPCIONES DE ITEMS
	public function add_opciones_detalle(){
		$sql = "insert into opciones_items (nombre,ukr,id_opciones_type)";
		$sql .= "value (\"$this->nombre\",\"$this->ukr\",$this->id_opciones_type)";
		return Ejecutor::doit($sql);
	}

	public function add_opciones_detalle_b(){
		$sql = "insert into opciones_items (nombre,ukr,precio,id_opciones_type,item_k,inb)";
		$sql .= "value (\"$this->nombre\",\"$this->ukr\",\"$this->precio\",$this->id_opciones_type,\"$this->ith\",1)";
		return Ejecutor::doit($sql);
	}

	public function add_opciones_detalle_c(){
		$sql = "insert into opciones_items (nombre,ukr,precio,id_opciones_type,item_k,inb,cat_act)";
		$sql .= "value (\"$this->nombre\",\"$this->ukr\",\"$this->precio\",$this->id_opciones_type,\"$this->ith\",1,$this->cat_act)";
		return Ejecutor::doit($sql);
	}

	public static function ver_detalles_opciones($id){
		$sql = "select * from opciones_items where id_opciones_type=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function ver_detalles_opciones_b($id){
		$sql = "select * from opciones_items where id_opciones_type=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function ver_opciones_detalles_list_one_name($id){
		$sql = "select * from opciones_items where nombre=\"$id\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function view_iten_in_pages_por_id($id){
		$sql = "select * from opciones_items where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function ver_opciones_detalles_list_one_name_view($id,$nams){
		$sql = "select * from opciones_items where id_opciones_type=$id and nombre=\"$nams\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function ver_opciones_detalles_list_one_name_view_b($id,$nams){
		$sql = "select * from opciones_items where id_opciones_type=$id and ukr=\"$nams\"";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function ver_opciones_detalles_list_one_name_view_b_a($id,$nams){
		$sql = "select * from opciones_items where id_opciones_type=$id and ukr=\"$nams\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public function update_data_opciones_detalles(){
		$sql = "update opciones_items set nombre=\"$this->nombre\",ukr=\"$this->ukr\",id_opciones_type=\"$this->id_opciones_type\" where id=$this->id";
		Ejecutor::doit($sql);
	}

	public function update_data_opciones_detalles_b(){
		$sql = "update opciones_items set nombre=\"$this->nombre\",ukr=\"$this->ukr\",precio=\"$this->precio\",id_opciones_type=\"$this->id_opciones_type\",item_k=\"$this->ith\",inb=1 where id=$this->id";
		Ejecutor::doit($sql);
	}

	public function update_data_opciones_detalles_c(){
		$sql = "update opciones_items set nombre=\"$this->nombre\",ukr=\"$this->ukr\",precio=\"$this->precio\",id_opciones_type=\"$this->id_opciones_type\",item_k=\"$this->ith\",inb=1,cat_act=\"$this->cat_act\" where id=$this->id";
		Ejecutor::doit($sql);
	}

	public function delete_optiones_data_lines(){
		$sql = "delete from opciones_items where id=$this->id";
		Ejecutor::doit($sql);
	}

	public static function options_noes_principal($types){
		$sql = "update opciones_items set principal=0 where id_opciones_type=$types";
		Ejecutor::doit($sql);
	}

	public static function options_aser_principal($id){
		$sql = "update opciones_items set principal=1 where id=$id";
		Ejecutor::doit($sql);
	}

	///// COMPRA ONLINE WEB PROCESO



	///*** guardar sucursal de despacho
	public function guardar_sucursal_de_compra(){
		$sql = "update personas SET sucursal_compra=\"$this->sucursal_compra\" where id=$this->id";
		Ejecutor::doit($sql);
	}

	///*** guardar direccion de envio
	public function guardar_direccion_de_envio(){
		$sql = "update ventas SET direccion_envio=\"$this->direccion_envio\" where id=$this->id_venta";
		Ejecutor::doit($sql);
	}

	////**** mostrar direcciones de envio
	public static function Mostrar_direcciones_de_envio($dataa){
		$sql = "select * from direccion_envio where id_persona=$dataa";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	////**** mostrar direcciones de envio en linea  
	public static function Mostrar_direcciones_de_envio_one($dataa){
		$sql = "select * from direccion_envio where id=$dataa";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	////***** agregar nueva direccion de usuario de delivery
	public function add_address_delivery_cliente(){
		$sql = "insert into direccion_envio (nombre,direccion,sugerencia,id_persona) ";
		$sql .= "value (\"$this->nombre\",\"$this->direccion\",\"$this->sugerencia\",$this->id_persona)";
		return Ejecutor::doit($sql);
	}

	/////** eliminar la direccion de delivery de la persona por el id 
	public function delete_address_delivery_persona(){
		$sql = "delete from direccion_envio where id=$this->id";
		Ejecutor::doit($sql);
	}
	
	/////***** acctualizar datos de una direccion de envio de delivery
	public function update_address_delivery_cliente(){
		$sql = "update direccion_envio SET nombre=\"$this->nombre\", direccion=\"$this->direccion\",sugerencia=\"$this->sugerencia\" where id=$this->id";
		Ejecutor::doit($sql);
	}
	

	//**** nueva venta web tipo de venta
	public function nueva_venta_web_tipo_venta(){
		$sql = "insert into ventas (tipo_venta,cliente,web,numero_venta,barcode,documento,entregar) ";
		$sql .= "value (\"$this->tipo_venta\",$this->id,1,\"$this->numero_venta\",\"$this->barcode\",\"$this->documento\",$this->entregar)";
		Ejecutor::doit($sql);
	}

	public function update_venta_web_tipo_venta($data){
		$sql = "update ventas SET tipo_venta=\"$this->tipo_venta\",cliente=$this->id,web=1 where id=$data";
		Ejecutor::doit($sql);
	}

	//**** nueva venta web 
	public function nueva_venta_web(){
		$sql = "insert into ventas (cliente,web,numero_venta,barcode,documento,entregar) ";
		$sql .= "value ($this->id,1,\"$this->numero_venta\",\"$this->barcode\",\"$this->documento\",$this->entregar)";
		Ejecutor::doit($sql);
	}

	///*** visualizar venta en tiempo real
	public static function view_order_realtime_in_page($dataa){
		$sql = "select * from ventas where cliente=$dataa and estado_de_venta=0";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	///*** visualizar tipos de venta en tiempo real
	public static function Mostrartipos_de_ventas_or(){
		$sql = "select * from tipo_venta";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function tipo_de_venta_nombre($tipo){
		$sql = "select * from tipo_venta where code=\"$tipo\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	///*** visualizar el usuario en tiempo real
	public static function ver_el_cliente_data_requerido($viewl,$data){
		$sql = "select $viewl as c from personas where id=$data";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	////*** actualizar tipo de documento de la compra en web
	public function actualizar_el_documento_page(){
		$sql = "update ventas SET documento=\"$this->documento\" where id=$this->id";
		Ejecutor::doit($sql);
	}

	////*** actualizar el metodo de pago en la compra en web
	public function actualizar_el_metodo_de_pago_page(){
		$sql = "update ventas SET metodo_pago=$this->metodo_pago,cliente_doc=\"$this->cliente_doc\" where id=$this->id";
		Ejecutor::doit($sql);
	}

	////*** actualizar el numero de documento de la compra en web  
	public function actualizar_el_numero_de_documento_page(){
		$sql = "update ventas SET cliente_doc=".(($this->num_doc=='')?"NULL":("'".$this->num_doc."'"))." where id=$this->id";
		Ejecutor::doit($sql);
	}

	public static function ventas_contar_cliente($persona,$estado){
		$sql = "select count(*) as c from ventas where cliente=$persona and estado_de_venta=$estado";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	///***
	public static function ventas_registrados_verificar($dataa){
		$sql = "select * from ventas where cliente=$dataa and estado_de_venta=0";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function compras_de_cliente($cliente){
		$sql = "select * from ventas where cliente=$cliente";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public function guardar_tipo_de_documento(){
		$sql = "update personas SET sucursal_compra=\"$this->sucursal_compra\" where id=$this->id";
		Ejecutor::doit($sql);
	}

	/////*** visualizar documento seleccionado por el cliente.
	public static function visualizar_documento_seleccionado_por_cliente($document){
		$sql = "select * from documentos where id=$document";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	/////*** visualizar documento seleccionado por el cliente.
	public static function view_documents_por_defecto(){
		$sql = "select * from documentos where por_defecto_web=1";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	/////******** mostrar metodo de pago
	public static function MostrarAdmin_metodo_pagos(){
		$sql = "select * from tipo_de_pago";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function MostrarAdmin_metodo_pagos_web(){
		$sql = "select * from tipo_de_pago where web=1";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function MostrarAdmin_metodo_pagos_web_one($id){
		$sql = "select * from tipo_de_pago where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function metododepago_porelId($id){
		$sql = "select * from tipo_de_pago where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public function activar_metodo_de_pago(){
		$sql = "update tipo_de_pago SET activado=\"$this->activado\" where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}


	////// Punto para finalizar la compra en la [pagina web].
	public function finalizar_la_venta_web(){
		$sql = "update ventas SET estado_de_venta=\"$this->estado_de_venta\",moneda=\"$this->moneda\",sucursal=\"$this->sucursal\",fecha=\"$this->fecha\" where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}

	public function agregar_los_detalles_del_item_producto(){
		$sql = "insert into detalles_venta (id_venta,id_item,codigo,cantidad) ";
		$sql .= "value ($this->id_venta,$this->id_item,\"$this->codigo\",\"$this->cantidad\")";
		Ejecutor::doit($sql);
	}

	public function agregar_los_detalles_del_item_producto_sub(){
		$sql = "insert into detalles_venta_sub (id_venta,codigo_item,id_opcion_sub,type) ";
		$sql .= "value ($this->id_venta,\"$this->codigo\",\"$this->id_opcion_sub\",$this->type)";
		Ejecutor::doit($sql);
	}

	public function agregar_stock_en_la_venta_para_identificar_producto(){
		$sql = "insert into stock_venta_cliente (id_venta,codigo_item,id_item) ";
		$sql .= "value ($this->id_venta,\"$this->codigo\",$this->id_item)";
		Ejecutor::doit($sql);
	}

	public static function contar_stock_en_venta($vent){
		$sql = "select count(*) as c from stock_venta_cliente where id_venta=$vent";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	

	/////////funciones de vendedores
	
	public function aceptar_la_compra_web_vendedor(){
		$sql = "update ventas SET estado_de_venta=\"$this->estado_de_venta\", vendedor=$this->vendedor where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}

	public function aceptar_la_compra_web(){
		$sql = "update ventas SET estado_de_venta=\"$this->estado_de_venta\" where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}

	public function finalizar_la_compra_web(){
		$sql = "update ventas SET estado_de_venta=\"$this->estado_de_venta\", fecha_entrega=\"$this->fecha_venta\" where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}



	/// --- fin de punto para finbalizar la venta web---///


	///---- visualizar las ventas en panel admin o contar -----////
	public static function cantidad_de_ventas_pendientes_web(){
		$sql = "select count(web) as c from ventas where estado_de_venta=5";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	/**Listar ventas por entregar **/
	public static function listar_cantidad_de_ventas_pendientes_web(){
		$sql = "select * from ventas where estado_de_venta=5";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	/**Listar ventas recibidos para entregar **/
	public static function listar_cantidad_de_ventas_recibidos_web(){
		$sql = "select * from ventas where estado_de_venta=6";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	/**Listar ventas listos para entregar **/
	public static function listar_cantidad_de_ventas_listos_web(){
		$sql = "select * from ventas where estado_de_venta=7";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	/**Listar ventas entregados a los clientes **/
	public static function listar_cantidad_de_ventas_entregados_web(){
		$sql = "select * from ventas where estado_de_venta=3";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function listar_detalles_ventas_pendientes_web($venta){
		$sql = "select * from detalles_venta where id_venta=\"$venta\"";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function listar_detalles_ventas_pendientes_web_one($venta){
		$sql = "select * from detalles_venta where id_venta=\"$venta\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function listar_detalles_ventas_pendientes_web_sub($venta){
		$sql = "select * from detalles_venta_sub where codigo_item=\"$venta\"";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function listar_detalles_ventas_pendientes_web_sub_one($venta){
		$sql = "select * from detalles_venta_sub where codigo_item=\"$venta\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function cantidad_de_ventas_entregados_al_cliente_web(){
		$sql = "select count(web) as c from ventas where estado_de_venta=3";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function cantidad_de_ventas_recibidos_web(){
		$sql = "select count(web) as c from ventas where estado_de_venta=6";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function cantidad_de_ventas_listos_web(){
		$sql = "select count(web) as c from ventas where estado_de_venta=7";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function cantidad_de_ventas_cancelados_web(){
		$sql = "select count(web) as c from ventas where estado_de_venta=2";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	////// realizamos la comprobacion o ventas y entregas en ventas admin 

	public static function visualizamos_el_produscto_desde_el_stock($q){
		$sql = "select stock.barcode,stock.en_carrito, stock.ram,stock.hard_drive,stock.drivetype,stock.aditional_information,stock.other_information, items.nombre,items.precio,items.id from stock JOIN items on items.id = stock.id_producto where (stock.barcode like '%$q%' or stock.make like '%$q%' or items.nombre like '%$q%') and stock.en_carrito=0 and stock.estado=0";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function listamos_los_items_de_la_venta_web_type($venta){
		$sql = "select * from detalles_venta where codigo=\"$venta\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function listamos_los_items_de_la_venta_web($venta){
		$sql = "select * from detalles_venta_sub where id_venta=\"$venta\"";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}



	/////***** preparar la venta stock

	public function preparar_actualiza_documento_venta(){
		$sql = "update ventas set documento=$this->documento where estado_de_venta=6 and id=$this->venta";
		Ejecutor::doit($sql);
	}

	public static function preparar_items_stock_in_order_items($user){
		$sql = "select * from items where usuario=$user and estado=6 and en_carrito=1";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	//// realizamos la busqueda del item y comprovamos si hay stock disponible.
	/*public static function verificamos_si_hay_stock($q,$item){ 
		$sql = "select stock.barcode,stock.en_carrito, stock.ram,stock.series,stock.proveedor,stock.hard_drive,stock.drivetype,stock.aditional_information,stock.other_information, items.nombre,items.precio,items.id from stock JOIN items on items.id = stock.id_producto where (stock.barcode like '%$q%' or stock.make like '%$q%' or items.nombre like '%$q%') and stock.en_carrito=0 and stock.estado=0 and stock.id_producto=$item";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}*/

	public static function comprovar_disponibilidad_de_stock($item,$codigo){
		$sql = "select * from stock where id_producto=$item and barcode=\"$codigo\" and en_carrito=0 and estado=0";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function ver_el_stock_del_item_por_barcode($codigo){
		$sql = "select * from stock where barcode=\"$codigo\" and en_carrito=0 and estado=0";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function ver_el_stock_del_item_por_barcode_en_lista($codigo){
		$sql = "select * from stock where barcode=\"$codigo\" and en_carrito=0 and estado=7";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	

	//// Buscamos al item en lista de cliente
	public static function visualizamos_detalles_del_item_por_id($id){
		$sql = "select * from stock_venta_cliente where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}
	
	public function orden_preparado_esta_listo_actualizar_lista(){
		$sql = "update stock set estado=7 where id=$this->id";
		Ejecutor::doit($sql);
	}

	public static function preparar_mostrar_productos_stock_lista_order($id){
		$sql = "select * from stock where id_producto=$id and en_carrito=7 ORDER BY fecha desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function preparar_mostrar_productos_en_la_orden_item($codigo){
		$sql = "select * from stock_venta_cliente where codigo_item=\"$codigo\"";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public function restablecer_stock_item(){
		$sql = "update stock set estado=0,codigo_item_compra=null where barcode=\"$this->codigo_barras\"";
		Ejecutor::doit($sql);
	}

	public function procesar_stock_item(){
		$sql = "update stock set estado=$this->estado,codigo_item_compra=\"$this->codigo_item_compra\" where barcode=\"$this->barcode\"";
		Ejecutor::doit($sql);
	}

	public function procesar_item_lista_compra(){
		$sql = "update stock_venta_cliente set barcode=\"$this->barcode\", listo=1 where id=$this->id";
		Ejecutor::doit($sql);
	}

	/// Visualizar el item de la order por id 
	public static function ver_el_item_de_la_orden_por_su_id($id){
		$sql = "select * from stock_venta_cliente where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	//// eliminar de lista de pedigos de orden (compra ) stock
	public function elinar_seleccion_de_orden_stock(){
		$sql = "update stock set estado=0,numero_venta=null,cliente=null,reserva=0,codigo_venta=null,codigo_item_compra=null where barcode=\"$this->barcode\"";
		Ejecutor::doit($sql);
	}

	/// eliminar seleccion de item de la compra de preparar
	public function delete_selection_order_prepare(){
		$sql = "update stock_venta_cliente set barcode=null,listo=0 where id=$this->id";
		Ejecutor::doit($sql);
	}
	
	// contar restates de preparacion de orden 
	public static function contar_productos_que_faltan_preparar_total($venta){
		$sql = "select count(*) as c from stock_venta_cliente where listo=0 and id_venta=$venta";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function contar_productos_que_faltan_preparar($code){
		$sql = "select count(*) as c from stock_venta_cliente where listo=0 and codigo_item=\"$code\" ";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}



	/// funciones HOME pagina principal 
	public static function contar_cantidad_de_ventas_en_total($sucursal){
		$sql = "select count(*) as c from ventas where sucursal=$sucursal and estado_de_venta=3";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}
	public static function contar_cantidad_de_ventas_en_el_dia_actual($sucursal){
		$sql = "select count(*) as c from ventas where sucursal=$sucursal and estado_de_venta=3 and date(fecha_entrega)=date(NOW())";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function contar_cantidad_de_gastos_en_el_dia_actual($sucursal){
		$sql = "select count(*) as c from gastos where sucursal=$sucursal and date(fecha)=date(NOW())";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}
	public static function contar_cantidad_de_gastos_en_total($sucursal){
		$sql = "select count(*) as c from gastos where sucursal=$sucursal";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function cantidad_de_cajas_abiertos($sucursal){
		$sql = "select count(*) as c from caja where sucursal=$sucursal and cierre=0";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	// Cantidad categorias
	public static function cantidad_de_categorias(){
		$sql = "select count(*) as c from categorias";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	/// cantidad de productos
	public static function cantidad_de_productos_stock($sucursal){
		$sql = "select count(*) as c from stock where id_sucursal=$sucursal and estado=0";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	/// cantidad de sucursales
	public static function cantidad_de_sucursales(){
		$sql = "select count(*) as c from sucursales where estado=1";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	/// cantidad de usuarios
	public static function cantidad_de_usuarios_r(){
		$sql = "select count(*) as c from usuarios where esta_activado=1";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	/// cantidad de clientes
	public static function cantidad_de_clientes_r(){
		$sql = "select count(*) as c from personas where estado=1";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	/// cantidad de proveedores
	public static function cantidad_de_proveedores_r(){
		$sql = "select count(*) as c from proveedores";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	/// Visualizar los gastos
	public static function ver_todos_los_gastos_caja_actual(){
		$sql = "select * from gastos";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}


	public static function item_pndiente_en_ventas_por_item($item){
		$sql = "select count(*) as c from stock_venta_cliente where id_item=$item and listo=0";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	//// Caja actual 
	public static function Mostrar_las_cajas($sucursal){
		$sql = "select * from caja where sucursal=$sucursal and cierre=0 ORDER BY fecha_de_cierre desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function Mostrar_la_caja_por_id_sucursal($sucursal){
		$sql = "select * from caja where sucursal=$sucursal and cierre=0 ORDER BY fecha_de_cierre desc";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function Mostrar_los_montos_por_tipos_de_moneda($caja){
		$sql = "select * from monto_caja where caja=$caja";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public function abrir_nueva_caja(){
		$sql = "insert into caja (sucursal,fecha_apertura) ";
		$sql .= "value ($this->sucursal,\"$this->fecha\")";
		return Ejecutor::doit($sql);
	}

	public function abrir_monto_caja(){
		$sql = "insert into monto_caja (caja,moneda,monto_inicial) ";
		$sql .= "value ($this->caja,$this->moneda,$this->monto_inicial)";
		Ejecutor::doit($sql);
	}

	public static function cantidad_de_cajas($sucursal){
		$sql = "select count(*) as c from caja where sucursal=$sucursal";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	/// Monedas
	public static function mostrar_la_moneda_principal(){
		$sql = "select * from moneda where estado=1 and principal=1";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function Mostrar_las_monedas(){
		$sql = "select * from moneda where estado=1";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}
	public static function Mostrar_las_monedas_admin(){
		$sql = "select * from moneda order by principal=1 desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}
	public static function Mostrar_las_monedas_por_id($id){
		$sql = "select * from moneda where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function actualizar_moneda_none(){
		$sql = "update moneda set principal=0";
		Ejecutor::doit($sql);
	}

	public static function actualizar_moneda_page($id){
		$sql = "update moneda set principal=1 where id=$id";
		Ejecutor::doit($sql);
	}

	public function agregar_moneda(){
		$sql = "insert into moneda (nombre,moneda,simbolo,icon)";
		$sql .= "value (\"$this->nombre\",\"$this->moneda\",\"$this->simbolo\",\"$this->icon\")";
		return Ejecutor::doit($sql);
	}

	public function editar_moneda(){
		$sql = "update moneda set nombre=\"$this->nombre\", moneda=\"$this->moneda\", simbolo=\"$this->simbolo\", icon=\"$this->icon\" where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}
	public function editar_moneda_b(){
		$sql = "update moneda set nombre=\"$this->nombre\", moneda=\"$this->moneda\", simbolo=\"$this->simbolo\" where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}

	public function activar_monedas(){
		$sql = "update moneda SET estado=\"$this->estado\" where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}

	public function eliminar_moneda(){
		$sql = "delete from moneda where id=$this->id";
		Ejecutor::doit($sql);
	}

	/// Publicidad

	/**diapositiva principal**/
	public static function diapositivas_lista(){
		$sql = "select * from diapositiva";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0], new DatosAdmin());
	}
	public static function diapositivas_lista_public(){
		$sql = "select * from diapositiva where activado=1";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0], new DatosAdmin());
	}

	public static function diapositiva_detalle($id){
		$sql = "select * from diapositiva where id=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public function publicar_diapositiva(){
		$sql = "insert into diapositiva (usuario,nombre,texto,codigo,ub,fecha) ";
		$sql .= "value ($this->usuario,\"$this->nombre\",\"$this->texto\",\"$this->codigo\",\"$this->ub\",\"$this->fecha\")";
		return Ejecutor::doit($sql);
	}

	public function publicar_diapositiva_b(){
		$sql = "insert into diapositiva (usuario,nombre,texto,codigo,ub,url,boton,fecha) ";
		$sql .= "value ($this->usuario,\"$this->nombre\",\"$this->texto\",\"$this->codigo\",\"$this->ub\",\"$this->url\",\"$this->boton\",\"$this->fecha\")";
		return Ejecutor::doit($sql);
	}

	public function activardiapositiva(){
		$sql = "update diapositiva SET activado=\"$this->activado\" where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}

	////editar datos de diapositiva
	public function editar_diapositiva(){
		$sql = "update diapositiva SET usuario=\"$this->usuario\",nombre=\"$this->nombre\",texto=\"$this->texto\",ub=\"$this->ub\",url=null,boton=null,fecha=\"$this->fecha\" where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}

	public function editar_diapositiva_b(){
		$sql = "update diapositiva SET usuario=\"$this->usuario\",nombre=\"$this->nombre\",texto=\"$this->texto\",ub=\"$this->ub\",url=\"$this->url\",boton=\"$this->boton\",fecha=\"$this->fecha\" where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}



	//// agregar imagen de publicidad
	public function agrega_imagen_diapositiva(){
		$sql = "insert into imagen_diapositiva (id_diapositiva,imagen,fecha)";
		$sql .= "value ($this->id_diapositiva,\"$this->imagen\",\"$this->fecha\")";
		return Ejecutor::doit($sql);
	}

	////editar la imagen de la diapositiva
	public function editar_imagen_diapositiva(){
		$sql = "update imagen_diapositiva SET imagen=\"$this->imagen\",fecha=\"$this->fecha\" where id_diapositiva=\"$this->id_diapositiva\"";
		Ejecutor::doit($sql);
	}

	/// visualiza imagen diapositiva
	public static function diapositiva_image($id){
		$sql = "select * from imagen_diapositiva where id_diapositiva=$id";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	//// eliminar diapositiva
	public function eliminar_diapositiva(){
		$sql = "delete from diapositiva where id=$this->id";
		Ejecutor::doit($sql);
	}



	/// Servicios acciones
	public function publicar_servicios(){
		$sql = "insert into servicios (usuario,nombre,icono,codigo,url) ";
		$sql .= "value ($this->usuario,\"$this->nombre\",\"$this->icono\",\"$this->codigo\",\"$this->url\")";
		return Ejecutor::doit($sql);
	}
	
	/// mostrar servicios al publico
	public static function servicios_lista(){
		$sql = "select * from servicios";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0], new DatosAdmin());
	}

	public static function servicios_public(){
		$sql = "select * from servicios where activado=1";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0], new DatosAdmin());
	}

	public static function serv_view($url){
		$sql = "select * from servicios where url=\"$url\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	public static function serv_view_data($url){
		$sql = "select * from servicios where url=\"$url\"";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}

	public static function ver_servicio_id($id){
		$sql = "select * from servicios where id=\"$id\"";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}
	public function activar_servicio(){
		$sql = "update servicios SET activado=\"$this->activado\" where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}
	

	////editar la imagen de la servicios 
	public function editar_servicios(){
		$sql = "update servicios SET nombre=\"$this->nombre\",icono=\"$this->icono\",url=\"$this->url\" where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}
	public function editar_servicios_fals(){
		$sql = "update servicios SET nombre=\"$this->nombre\",url=\"$this->url\" where id=\"$this->id\"";
		Ejecutor::doit($sql);
	}

	//// eliminar servicios
	public function eliminar_servicio(){
		$sql = "delete from servicios where id=$this->id";
		Ejecutor::doit($sql);
	}

	/// Servicios acciones publicaciones
	public function publicar_servicios_post_a(){
		$sql = "insert into servicios_datos (usuario,texto,sucursal,color,url,id_servicio,fecha) ";
		$sql .= "value ($this->usuario,\"$this->texto\",\"$this->sucursal\",\"$this->color\",\"$this->url\",$this->id_servicio,\"$this->fecha\")";
		return Ejecutor::doit($sql);
	}

	public function publicar_servicios_post_b(){
		$sql = "insert into servicios_datos (usuario,texto,sucursal,color,url,imagen,id_servicio,fecha) ";
		$sql .= "value ($this->usuario,\"$this->texto\",\"$this->sucursal\",\"$this->color\",\"$this->url\",\"$this->imagen\",$this->id_servicio,\"$this->fecha\")";
		return Ejecutor::doit($sql);
	}

	public static function vista_previa_lp($servicio){
		$sql = "select * from servicios_datos where id_servicio=$servicio order by fecha desc";
		$query = Ejecutor::doit($sql);
		return Modelo::many($query[0],new DatosAdmin());
	}
	public static function public_post_image_data($servicio){
		$sql = "select * from servicios_datos where id=$servicio";
		$query = Ejecutor::doit($sql);
		return Modelo::one($query[0],new DatosAdmin());
	}

	//// eliminar servicio post publics
	public function eliminar_list_service_post(){
		$sql = "delete from servicios_datos where id=$this->id";
		Ejecutor::doit($sql);
	}

	
	



}