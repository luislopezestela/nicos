<?php
$base = BASE_URL_B;
$base_a = BASE_URL_A;
$usuario = DatosUsuario::porId($_SESSION["admin_id"]);
$cantidad_de_ventas_hoy=DatosAdmin::contar_cantidad_de_ventas_en_el_dia_actual($usuario->sucursal);
$cantidad_de_gastos_hoy=DatosAdmin::contar_cantidad_de_gastos_en_el_dia_actual($usuario->sucursal);
$cantidad_de_cajas_open=DatosAdmin::cantidad_de_cajas_abiertos($usuario->sucursal);
$cantidad_de_categorias=DatosAdmin::cantidad_de_categorias();
$cantidad_de_productos_stock=DatosAdmin::cantidad_de_productos_stock($usuario->sucursal);
$cantidad_de_sucursales=DatosAdmin::cantidad_de_sucursales();
$cantidad_de_usuarios=DatosAdmin::cantidad_de_usuarios_r();
$cantidad_de_clientes=DatosAdmin::cantidad_de_clientes_r();
$cantidad_de_proveedores=DatosAdmin::cantidad_de_proveedores_r();
$cantidad_total_de_ventas=DatosAdmin::contar_cantidad_de_ventas_en_total($usuario->sucursal);
$moneda_principal = DatosAdmin::mostrar_la_moneda_principal();
?>
                              
<style type="text/css">
	.venta_pendiente_view_alert_box{display:block;margin:10px auto;padding:10px;background-color:rgba(243, 156, 18,0.40);color:rgba(230, 126, 34,1.0);border:2px solid rgba(243, 156, 18,1.0);}
	.button_venta_pendiente{border-radius:7px;cursor:pointer;padding:4px;display:inline-block;width:100%;max-width:150px;background:rgba(52, 152, 219,1.0);color:#fff;text-align:center;}
</style>
<div class="contenido">
	<?php $venta_pendiente = DatosAdmin::visualizar_venta_realtime($_SESSION['admin_id']);?>
	 <?php if(isset($venta_pendiente)): ?>
	 	<div class="venta_pendiente_view_alert_box">
		<span>Tienes una venta pendiente. <a class="button_venta_pendiente" href="<?=$base."ventas/vender";?>">Continuar venta.</a></span>
	</div>
	 <?php endif ?>
	<h3 class="titulospanel"><?="Inicio";?></h3>
	<div class="datos_pag">
		<div class="cubos cubs_tr">
			<a class="fotercubo_tr" href="<?=$base."color_tema_select";?>">
				<div class="admin_titulo_tablero_index"><span class="color_seleccionado_view"></span></div><br>
				<i class=" icon_respont">
					<img class="iccono_imagens" src="<?=$base."datos/source/icons/pintar.png";?>">
				</i>
				<b><?="Color";?></b>
			</a>
		</div>

		<div class="cubos cubs_tr">
			<a class="fotercubo_tr" href="<?=$base."idioma";?>">
				<?php if($usuario->idioma): ?>
					<?php $idiomapages=$usuario->idioma; ?>
				<?php else: ?>
					<?php if(Luis::lenguagedeUsuario()=="es"){
						$idiomapages = "spanish";
					}elseif(Luis::lenguagedeUsuario()=="en"){
					    $idiomapages = "ingles";
					}else{
						$idiomapages = "spanish";
					} ?>
				<?php endif ?>
				<div class="admin_titulo_tablero_index sty_lang_def"><span><?=ucwords($idiomapages); ?></span></div><br>
				<i class=" icon_respont">
					<img class="iccono_imagens" src="<?=$base."datos/source/icons/idiomas.png";?>">
				</i>
				<b><?="Idioma";?></b>
			</a>
		</div>

		<div class="cubos cubs_tr">
			<a class="fotercubo_tr" href="<?=$base."moneda";?>">
				<?php if(isset($moneda_principal->nombre)): ?>
					<div class="admin_titulo_tablero_index sty_lang_def"><span><?=html_entity_decode($moneda_principal->nombre);?></span></div><br>
					<i class=" icon_respont">
						<img class="iccono_imagens" src="<?=$base_a."datos/modulos/".Luis::temass()."/source/imagenes/divisas/".$moneda_principal->icon;?>">
					</i>
				<?php else: ?>
					<div class="admin_titulo_tablero_index sty_lang_def"><span><?="Selecciona divisas";?></span></div><br>
					<i class=" icon_respont">
						<img class="iccono_imagens" src="<?=$base."datos/source/icons/sin-dinero.png";?>">
					</i>
				<?php endif ?>
				<b><?="Divisas";?></b>
			</a>
		</div>

		<div class="cubos cubs_tr">
			<a class="fotercubo_tr" href="<?=$base."tema_select_page";?>">
				<?php $data_skin = Luis::checktemas(); ?>
				<div class="admin_titulo_tablero_index sty_lang_def"><span><?=$data_skin->nombre_skin; ?></span></div><br>
				<i class=" icon_respont">
					<img class="iccono_imagens" src="<?=$base."datos/source/icons/web_luis.png";?>">
				</i>
				<b><?="Web";?></b>
			</a>
		</div>
	</div>
	<h3 class="titulospanel"><?="Functiones";?></h3>
	<div class="datos_pag">
	<div class="cubos cubs_tr">
		<a class="fotercubo_tr" href="<?=$base."ventas/vender";?>">
			<i class="icono__vender icon_respont"></i>
			<span class="realtime_update"><?="Hoy";?> <?=$cantidad_de_ventas_hoy->c;?></span>
			<b><?="Vender";?></b>
		</a>
	</div>
	<div class="cubos cubs_tr">
		<a class="fotercubo_tr" href="<?=$base."gastos/add";?>">
			<i class="icono__gastos icon_respont"></i>
			<span class="realtime_update"><?="Hoy";?> <?=$cantidad_de_gastos_hoy->c;?></span>
			<b><?="Gastos";?></b>
		</a>
	</div>
	<div class="cubos cubs_tr">
		<a class="fotercubo_tr" href="<?=$base."cajas/add";?>">
			<i class="icono__comision icon_respont"></i>
			<span class="realtime_update"><?="Abiertos";?> <?=$cantidad_de_cajas_open->c;?></span>
			<b><?="Cajas";?></b>
		</a>
	</div>
	<div class="cubos cubs_tr">
		<a class="fotercubo_tr" href="<?=$base."devoluciones";?>">
			<i class="icono__devolucion icon_respont"></i>
			<span class="realtime_update"><?="Hoy";?> 0</span>
			<b><?="Devoluciones";?></b>
		</a>
	</div>
	<div class="cubos cubs_tr">
		<a class="fotercubo_tr" href="<?=$base."gastos/add";?>">
			<i class="icono__garantias icon_respont"></i>
			<span class="realtime_update"><?="Hoy";?> 0</span>
			<b><?="Ganancias";?></b>
		</a>
	</div>
	<div class="cubos cubs_tr">
		<a class="fotercubo_tr" href="<?=$base."gastos/add";?>">
			<i class="icono__malos icon_respont"></i>
			<span class="realtime_update"><?="Hoy";?> 0</span>
			<b><?="Garantias";?></b>
		</a>
	</div>
	</div>
	<br>
	<h3 class="titulospanel"><?="Tablero";?></h3>
	<div class="datos_pag">
	<div class="cubos productos_total_un">
		<div class="admin_titulo_tablero_index"><?="Categorias";?></div>
		<b><?=$cantidad_de_categorias->c;?></b>
	</div>
	<div class="cubos productos_total_un">
		<div class="admin_titulo_tablero_index"><?="Productos";?></div>
		<b><?=$cantidad_de_productos_stock->c;?></b>
	</div>
	<div class="cubos productos_total_un">
		<div class="admin_titulo_tablero_index"><?="Sucursales";?></div>
		<b><?=$cantidad_de_sucursales->c;?></b>
	</div>
	<div class="cubos productos_total_un">
		<div class="admin_titulo_tablero_index"><?="Usuarios";?></div>
		<b><?=$cantidad_de_usuarios->c;?></b>
	</div>
	<div class="cubos productos_total_un">
		<div class="admin_titulo_tablero_index"><?="Clientes";?></div>
		<b><?=$cantidad_de_clientes->c;?></b>
	</div>
	<div class="cubos productos_total_un">
		<div class="admin_titulo_tablero_index"><?="Proveedores";?></div>
		<b><?=$cantidad_de_proveedores->c;?></b>
	</div>
	</div>
	<br>
	<h3 class="titulospanel"><?="Accesos directos";?></h3>
  <div class="datos_pag">
    	<a class="botonfunciones" href="<?=$base."productos/crear";?>"><?="Agregar producto";?></a>
    	<a class="botonfunciones" href="<?=$base."usuarios/add";?>"><?="Agregar usuario";?></a>
    	<a class="botonfunciones" href="<?=$base."sucursales/add";?>"><?="Agregar sucursal";?></a>
    	<a class="botonfunciones" href="<?=$base."configurar_pagina";?>"><?="Configuracion";?></a>
  </div>
    <br>
</div>