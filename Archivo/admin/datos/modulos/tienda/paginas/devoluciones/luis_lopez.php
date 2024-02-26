<?php
$total=0;
$base = Luis::basepage("base_page_admin");
$namepage =  Luis::dato("luis_nombre")->valor;
$metodopago=DatosAdmin::MostrarMetododepago();
if(isset($_SESSION["admin_id"])){
	$documentos=DatosAdmin::mostrardocumentos();
	?>

	<section class="vista_preb_page">
      <ol class="box_visw">
        <li><a href="<?=$base;?>">Inicio</a></li>
        <li><a>Tienda</a></li>
        <li class="active">Devoluciones</li>
      </ol>
    </section>

    <?php
    if(isset($_GET["paginas"])){
    	$urb = explode("/", $_GET["paginas"]);
		if(count($urb)>1){
			header('location:'.$base.'devoluciones');
		}else{
				$ventas_finalizadas = DatosAdmin::Mostrar_ventas_finalizados($_SESSION['admin_id']);
				?>
				<div class="contenido">
					<h3 class="titulo_paginas">DEVOLUCIONES.</h3>
					<?php $devolutions = DatosAdmin::devoluciones_data($_SESSION['admin_id']);?>
					<?php if(count($devolutions)>0): ?>
                        <?php $devolucion_vista = DatosAdmin::devoluciones_data_one($_SESSION['admin_id']); ?>
                        <?php if(isset($devolucion_vista->id_cliente)):?>
                            <?php $data_client_view = DatosAdmin::por_el_id_cliente($devolucion_vista->id_cliente); ?>
                            <?php $cliente_de_devolucion = $data_client_view->nombre." ".$data_client_view->apellido_paterno;
                            $data_cliente_realtime = true;
                            $numero_docs = $devolucion_vista->num_documento;?>
                        <?php else: ?>
                            <?php $cliente_de_devolucion = false;
                            $data_cliente_realtime=false;
                            $numero_docs = false;?>
                        <?php endif ?>
                        
						<div class="funciones_en_ventas_continuados">
							<label class="titulo_paginas_devolutions">Nombre o dni del cliente.</label>
							<input id="view_devolucion_stored" type="search" class="buscar_cliente_en_paginas buscar_cliente_en_paginas_opcion board" placeholder="Nombre o dni del cliente" value="<?=html_entity_decode($cliente_de_devolucion);?>">
						</div>
						<div class="sugerencias_clientes_posible_dato">
						</div>
                        <?php if($data_cliente_realtime): ?>
                            <?php $documentos=DatosAdmin::mostrardocumentos(); ?>
                            <select class="options_selects_document_dev options_selects_document_dev_real_action">
                                <option value="null">Documento</option>
                                <?php foreach($documentos as $doc): ?>
                                    <?php if($devolucion_vista->documento==$doc->id): ?>
                                        <?=$selex_document_page="selected"; ?>
                                    <?php else: ?>
                                        <?=$selex_document_page=false; ?>
                                    <?php endif ?>
                                    <option value="<?=$doc->id;?>" data="<?=html_entity_decode($doc->nombre);?>" <?=$selex_document_page;?>><?=html_entity_decode($doc->nombre);?></option>
                                <?php endforeach ?>
                            </select>
                            <input type="number" class="num_doc_in_devolutions" placeholder="Numero de documento." value="<?=$numero_docs;?>">
                            <textarea rows="6" class="text_area_comments_data" placeholder="Comentarios."></textarea>
                            <input type="text" class="buscar_items_en_paginas buscar_items_en_paginas_option" placeholder="Buscar producto por codigo nombre o marca.">
                            <div class="conten_items_devolutions_user_and_client">
                                <p>Productos a devolver.</p>
                            </div>
                        <?php endif ?>
					<?php else: ?>
						<div class="funciones_en_ventas_continuados">
							<span class="button_devoluciones button_devoluciones_sty">Devolucion.</span>
							<input id="view_devolucion_stored" type="hidden" hidden="hidden">
						</div>
					<?php endif ?>
					
				</div>
			<?php
		}
	}else{
		header('location:'.$base);
	}
}else{
	header('location:'.$base.'acceder');
}
?>

<div id="teclado_devoluciones_stored_client" class="teclado_none" style="display:none;">
    <div id="number_tec_client" class="teclado_cliente_numeros">
        <a class="number" href="#" data="1">1</a>
        <a class="number" href="#" data="2">2</a>
        <a class="number" href="#" data="3">3</a>
        <a class="number" href="#" data="4">4</a>
        <a class="number" href="#" data="5">5</a>
        <a class="number" href="#" data="6">6</a>
        <a class="number" href="#" data="7">7</a>
        <a class="number" href="#" data="8">8</a>
        <a class="number" href="#" data="9">9</a>
        <a class="number" href="#" data="0">0</a>
    </div>
    <div id="number_tec_clientdos" class="letras_teclado_clientes">
        <a href="#" data="Q">Q</a>
        <a href="#" data="W">W</a>
        <a href="#" data="E">E</a>
        <a href="#" data="R">R</a>
        <a href="#" data="T">T</a>
        <a href="#" data="Y">Y</a>
        <a href="#" data="U">U</a>
        <a href="#" data="I">I</a>
        <a href="#" data="O">O</a>
        <a href="#" data="P">P</a>
    </div>
    <div id="number_tec_clienttres" class="letras_teclado_clientes">
        <a href="#" data="A">A</a>
        <a href="#" data="S">S</a>
        <a href="#" data="D">D</a>
        <a href="#" data="F">F</a>
        <a href="#" data="G">G</a>
        <a href="#" data="H">H</a>
        <a href="#" data="J">J</a>
        <a href="#" data="K">K</a>
        <a href="#" data="L">L</a>
        <a href="#" data="Ñ">Ñ</a>
    </div>
    <div id="number_tec_clientcuatro" class="letras_teclado_clientes">
        <a href="#" data="Z">Z</a>
        <a href="#" data="X">X</a>
        <a href="#" data="C">C</a>
        <a href="#" data="V">V</a>
        <a href="#" data="B">B</a>
        <a href="#" data="N">N</a>
        <a href="#" data="M">M</a>
    </div>
    <div id="number_tec_clientcinco" class="opciones_teclado_clientes">
        <a href="#" data=" ">ESPACIO</a>
        <a href="#" data="DEL">ELIMINAR</a>
    </div>
</div>
