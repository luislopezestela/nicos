<?php
$lista_de_gastos = DatosAdmin::ver_todos_los_gastos_caja_actual();
$base = Luis::basepage("base_page_admin");
$urb=explode("/", $_GET["paginas"]);
if(isset($urb[1])){$urbp=$urb[1];}else{$urbp=false;}
if(isset($urb[2])){$urbs=$urb[2];}else{$urbs=false;}
$usuario_iniciado = DatosUsuario::porId($_SESSION['admin_id']);
$caja_por_sucuarsal = DatosAdmin::Mostrar_las_cajas($usuario_iniciado->sucursal);
?>
<?php if(count($caja_por_sucuarsal)>0):?>
	<section class="vista_preb_page">
		<ol class="box_visw">
			<li><a href="<?=$base;?>">Inicio</a></li>
			<?php if($urbp==="view"): ?>
				<li><a href="<?=$base."gastos";?>">CAJA</a></li>
				<li class="active"><?=DatosAdmin::poridproveedor($urb[2])->nombre;?></li>
			<?php else: ?>
				<li class="active">CAJA</li>
			<?php endif ?>
		</ol>
	</section>
	<?php if(count($urb)>3): header('location:'.$base.'cajas');?>
	<?php else: ?>
		<?php if(isset($urb[1])): ?>
			<?php if($urb[1]==="view"): $user=DatosAdmin::poridproveedor($urb[2]);?>     
			<?php else: header('location:'.$base.'caja');?>
			<?php endif ?>
		<?php else: ?>
			<?php $cantidad_cajas = DatosAdmin::cantidad_de_cajas($usuario_iniciado->sucursal)->c;?>
			<?php $caja_actual = DatosAdmin::Mostrar_la_caja_por_id_sucursal($usuario_iniciado->sucursal);?>
			<?php $el_sucursal_activo = DatosAdmin::poridSucursal($usuario_iniciado->sucursal);?>
			<?php $mostrar_montos_por_monedas = DatosAdmin::Mostrar_los_montos_por_tipos_de_moneda($caja_actual->id);?>
			<div class="contenido_caja_open_currend">
				<div class="tabla_caja_en_funcion_actual">
					<div class="numero_de_caja">#<?=$cantidad_cajas;?></div><br>
					<span class="luis_accion_boton_10x2">DETALLES</span>
					<div class="contiene_informacion_caja">
						<div class="caja_detalles_list">
							<span><b>DESDE:</b> <?=Functions::fechafinalizacion($caja_actual->fecha_apertura);?></span>
							<span><b>SUCURSAL:</b> <?=html_entity_decode($el_sucursal_activo->nombre);?></span>
							<span><h5>Monto inicial</h5></span>
							<?php foreach ($mostrar_montos_por_monedas as $mk): ?>
								<?php $tipo_de_moneda_op = DatosAdmin::Mostrar_las_monedas_por_id($mk->moneda);?>
								<span><b><?=html_entity_decode($tipo_de_moneda_op->nombre);?>:</b> <?=$tipo_de_moneda_op->simbolo;?>. <?=number_format($mk->monto_inicial+$mk->monto,2,".",",");?></span>
							<?php endforeach ?>
							<span><h5>Monto vendido</h5></span>
							<span><span class="luis_accion_boton_10x2">CERRAR CAJA</span></span>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="message"></div>
			<div class="contentlists_items">
				<?php if(count($lista_de_gastos)): ?>
					<?php foreach ($lista_de_gastos as $user): ?>
            <div id="<?="provedorsdels".$user->id;?>" class="itemsviewslist">
              <div class="contensviewsitstr">
                <h4 class="nameshiff">
                  <?php if(!$user->nombre==null){echo($user->nombre);}else{echo('-');}?>
                </h4>
                <span class="nameshiffs"><span>RUC: </span> <?=$user->ruc;?></span>
                <div class="namesdeskp"><span>Celular:  </span> <?=$user->celular;?></div>
                <div class="namesdeskp"><span>Direccion:  </span> <?=$user->direccion;?></div>
              </div>
              <div class="opcionesblocklist opcionesblocklist1000boxlist">
                <a class="opcionesblocklist100 opcionesblocklist1000" href="javascript:void(0)">
                  <span class="opcionesblocklistoption opcionesblocklistoption100">
                    <i class="opcionesblocklistoption200 opcionesblocklistoption300">•••</i>
                  </span>
                </a>
                <div class="boxoptionslistlines">
                  <div class="makposdind"></div>
                  <a href="<?=$base."gastos/view/".$user->id;?>"><div class="boxoptionslistitems">Ver proveedor</div></a>
                  <a href="<?=$base."gastos/update/".$user->id;?>"><div class="boxoptionslistitems">Editar proveedor</div></a>
                  <?php if(isset($user->codigo)):?>
                    <?php if($user->esta_activado):?>
                      <a id="<?=$user->id;?>" class="usuariospt usuariospt<?=$user->id; ?>"><div class="boxoptionslistitems">Desactivar</div></a>
                    <?php else:?>
                      <a id="<?=$user->id;?>" class="usuariospt usuariospt<?=$user->id; ?>"><div class="boxoptionslistitems">Activar</div></a>
                    <?php endif;?>
                  <?php endif;?>
                  <div class="boxoptionslistitems proveedor_eliminar" id="<?=$user->id?>" data_rt="<?=$base;?>" data-config="<?=$user->id?>">Eliminar</div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        <?php else: ?>
          <div class="noitemsnull"><h3>No hay gastos s</h3></div>
        <?php endif ?>
      </div>
    <?php endif ?>
  <?php endif ?>
<?php else: ?>
  <br>
  <h4 class="titulo_paginas">No tiene una caja disponible en estos momentos. <p>Crea una caja para continuar</p></h4>
  <div class="contiene_lineas_montos">
    <label class="titulo_paginas">Monto inicial</label>
    <div class="sub_lineas_montos">
      <?php $monedas = DatosAdmin::Mostrar_las_monedas(); ?>
      <select class="monto_init_select_sty monto_init_input_simbolo">
        <?php foreach($monedas as $m): ?>
          <option value="<?=$m->id;?>"><?=$m->nombre; ?></option>
        <?php endforeach ?>
      </select>
      <input class="monto_init_input_sty monto_init_input_monto" type="search" placeholder="Monto en caja." value="0">
    </div>
    
    
  </div>

    <div class="butt_luis_one acctions_new_box_order"><span>Crear caja</span></div>
<?php endif ?>




<div class="contenido_ventas_caja">
	<div class="tabla_de_cajas_activos">
		<span class="span_cajas_numbers">Caja #1</span>
		<div class="box_body_cajas">
			<label>Fecha de apertura</label>
			<span>18 de coctubre 2021</span>
			<label>Fecha de cierre</label>
			<span>19 de octubre de 2021</span>
		</div>
	</div>

	<div class="tabla_de_cajas_activos">
		<span class="span_cajas_numbers">Caja #2</span>
		<div class="box_body_cajas">
			<label>Fecha de apertura</label>
			<span>18 de coctubre 2021</span>
			<label>Fecha de cierre</label>
			<span>19 de octubre de 2021</span>
		</div>
	</div>

	<div class="tabla_de_cajas_activos">
		<span class="span_cajas_numbers">Caja #3</span>
		<div class="box_body_cajas">
			<label>Fecha de apertura</label>
			<span>18 de coctubre 2021</span>
			<label>Fecha de cierre</label>
			<span>19 de octubre de 2021</span>
		</div>
	</div>

	<div class="tabla_de_cajas_activos">
		<span class="span_cajas_numbers">Caja #4</span>
		<div class="box_body_cajas">
			<label>Fecha de apertura</label>
			<span>18 de coctubre 2021</span>
			<label>Fecha de cierre</label>
			<span>19 de octubre de 2021</span>
		</div>
	</div>

	<div class="tabla_de_cajas_activos">
		<span class="span_cajas_numbers">Caja #1</span>
		<div class="box_body_cajas">
			<label>Fecha de apertura</label>
			<span>18 de coctubre 2021</span>
			<label>Fecha de cierre</label>
			<span>19 de octubre de 2021</span>
		</div>
	</div>

	<div class="tabla_de_cajas_activos">
		<span class="span_cajas_numbers">Caja #2</span>
		<div class="box_body_cajas">
			<label>Fecha de apertura</label>
			<span>18 de coctubre 2021</span>
			<label>Fecha de cierre</label>
			<span>19 de octubre de 2021</span>
		</div>
	</div>

	<div class="tabla_de_cajas_activos">
		<span class="span_cajas_numbers">Caja #3</span>
		<div class="box_body_cajas">
			<label>Fecha de apertura</label>
			<span>18 de coctubre 2021</span>
			<label>Fecha de cierre</label>
			<span>19 de octubre de 2021</span>
		</div>
	</div>

	<div class="tabla_de_cajas_activos">
		<span class="span_cajas_numbers">Caja #4</span>
		<div class="box_body_cajas">
			<label>Fecha de apertura</label>
			<span>18 de coctubre 2021</span>
			<label>Fecha de cierre</label>
			<span>19 de octubre de 2021</span>
		</div>
	</div>
</div>

<style type="text/css">
	.contenido_caja_open_currend{
		display:block;
		width:100%;
		max-width:900px;
		margin:16px auto;
		padding:20px;
	}
	.tabla_caja_en_funcion_actual{
		display:block;
		background:#ddd;
		padding:20px;
		box-shadow:6px 6px 10px -1px rgba(0, 0, 0, 0.1), -6px -6px 10px -1px rgba(255, 255, 255, 0.7);
		border:1px solid rgba(0, 0, 0, 0.07);
		border-radius:16px;
	}
	.numero_de_caja{
		display:flex;
		border-radius:7px;
		font-size:28px;
		justify-content:center;
		align-self:center;
		align-items:center;
		background:var(--color_primario);
		color:var(--color_a);
		box-shadow:6px 6px 10px -1px rgba(0, 0, 0, 0.1), -6px -6px 10px -1px rgba(255, 255, 255, 0.7);
		border:1px solid rgba(0, 0, 0, 0.09);
		width:100%;
		height:100px;
		position:relative;
		top:0px;
	}
	.caja_detalles_list{
		display:block;
		padding:12px;
		text-transform:uppercase;
	}
	.caja_detalles_list span{
		padding:10px;
		display:block;
		width:100%;
		font-size:15px;
	}
	.caja_detalles_list span b{
		color:#777;
	}
	.contenido_ventas_caja{
		display:flex;
		flex-wrap:wrap;
		position:relative;
		user-select:none;
		background:transparent;
		width:100%;
		box-sizing:content-box;
	}
	.tabla_de_cajas_activos{
		background:#FFF;
		padding:3px;
		margin:10px;
		width:calc(50% - 20px);
		position:relative;
		display:inline-flex;
		border-radius:7px;
		box-shadow:6px 6px 10px -1px rgba(0, 0, 0, 0.1), -6px -6px 10px -1px rgba(255, 255, 255, 0.7);
		border:1px solid rgba(0, 0, 0, 0.09);
	}
	.tabla_de_cajas_activos .span_cajas_numbers{
		height:70px;
		width:80px;
		left:-10px;
		position:relative;
		display:flex;
		text-align:center;
		align-self:center;
		align-items:center;
		justify-content:center;
		background:var(--color_primario);
		color:var(--color_a);
		border-radius:7px;
		box-shadow:6px 6px 10px -1px rgba(0, 0, 0, 0.1), -6px -6px 10px -1px rgba(255, 255, 255, 0.7);
	}
	.box_body_cajas{
		display:block;
		padding:10px;
	}
	.box_body_cajas label{
		display:block;
		width:100%;
	}
	@media screen and (max-width: 1010px){
		.contenido_ventas_caja{display:block;}
		.tabla_de_cajas_activos{width:calc(100% - 20px);}
	}

	@media screen and (max-width: 920px){
		.contenido_ventas_caja{display:flex;}
		.tabla_de_cajas_activos{width:calc(50% - 20px);}
	}
	@media screen and (max-width: 745px){
		.contenido_ventas_caja{display:block;}
		.tabla_de_cajas_activos{width:calc(100% - 20px);}
	}
</style>