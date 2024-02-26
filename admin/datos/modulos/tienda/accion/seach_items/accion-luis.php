<script type="text/javascript">$(document).ready(function() {
  var _targettedModal,
  _triggers = document.querySelectorAll('[data-modal-trigger]'),
  _dismiss = document.querySelectorAll('[data-modal-dismiss]'),
  modalActiveClass = "is-modal-active";
  function abrirModal(el){
    _targettedModal = document.querySelector('[data-modal-name="'+ el + '"]');
    _targettedModal.classList.add(modalActiveClass);
  }

  function hideModal(event){
    if(event === undefined || event.target.hasAttribute('data-modal-dismiss')) {
      _targettedModal.classList.remove(modalActiveClass);
    }
  }

  function bindEvents(el, callback){
    for (i = 0; i < el.length; i++) {
      (function(i){
        el[i].addEventListener('click', function(event) {
          callback(this, event);
        });
      })(i);
    }
  }

  function triggerModal(){
    bindEvents(_triggers, function(that){
      abrirModal(that.dataset.modalTrigger);
    });
  }

  function cerrarModal(){
    bindEvents(_dismiss, function(that){
        hideModal(event);
      });
  }

  function iniciarModal(){
    triggerModal();
    cerrarModal();
  }

  

  iniciarModal();
});</script>
<?php
$base = Luis::basepage("base_page_admin");
$usuario=DatosUsuario::poriUsuario($_SESSION["admin_id"]);
if (isset($_POST["categori"])) {
	$pro = DatosAdmin::buscar_item_categoria($_SESSION['admin_id'],$_POST["name_searching"]);
	$cantidad_search=DatosAdmin::ContarPublicacionesMarket_seacrh_categoria($_POST["name_searching"])->c;
    DatosAdmin::update_prod_default($_POST["name_searching"],$_SESSION["admin_id"]);
}else{
	$pro = DatosAdmin::buscar_item($_SESSION['admin_id'],$_POST["name_searching"]);
	$cantidad_search=DatosAdmin::ContarPublicacionesMarket_seacrh($_POST["name_searching"])->c;
}

$total_productos=0;
foreach ($pro as $us){
  $stcok_item=DatosAdmin::cantidad_stock_de_producto($us->id,$_SESSION["admin_id"])->c;
  $total_productos +=$stcok_item;
}


$datas='<div class="titulo_paginas">'.$total_productos.' Productos</div>';
foreach ($pro as $t){
  $stcok_item=DatosAdmin::cantidad_stock_de_producto($t->id,$_SESSION["admin_id"])->c;
  if($stcok_item>0){
  	$imgsb=DatosAdmin::listimagetienda($t->id);
  	$ab=strtotime($t->fecha);$exp_date=$ab + (168)*3600;$actual=strtotime(date("Y-m-d H:i:s"));
  	$datas.='<div class="contentboxitemslist">';
      $datas.='<div class="boxpicturelistst">';
      if ($imgsb==null){
      	$datas.='<picture><img class="boxpictureliststimg" src="'.$base.'datos/imagenes/icons/foto.png"></picture>';
      }else{
      	if(is_file("datos/imagenes/productos_tum/".$t->id."/".$imgsb->imagen)){
      		$datas.='<picture><img class="boxpictureliststimg" src="'.$base."datos/imagenes/productos_tum/".$t->id."/".$imgsb->imagen.'"></picture>';
      	}else{
      		$datas.='<picture><img class="boxpictureliststimg" src="'.$base.'datos/imagenes/icons/foto.png"></picture>';
      	}

      }
      $datas.='</div>';
      $datas.='<div class="detaillsboxlists">';
      $datas.='<div class="tluisboxunli">'.html_entity_decode($t->nombre).'</div>';
      if(is_numeric($t->precio)){
      	$datas.='<span class="tluisboxunliprice">S/. '.number_format($t->precio,2,".",",").'</span>';
      }else{
      }
      if($t->estado){
      	$datas.='<div class="tluisboxunlipubl">Publicado</div>';
      }else{
      	$datas.='<div class="tluisboxunlipubl">Sin publicar</div>';
      }
      $stcok_item=DatosAdmin::cantidad_stock_de_producto($t->id,$_SESSION["admin_id"])->c;
      $datas.='<span class="tluisboxunliprice stock_view_page_items">';
      $datas.='STOCK: <span class="stock_view_init'.$t->id.'">'.$stcok_item.'</span>';
      $datas.='</span>';
      $datas.='</div>';
      $datas.='<div class="opcionesblocklist opcionesblocklist1000boxlist">';
      $datas.='<a class="opcionesblocklist100 opcionesblocklist1000" href="javascript:void(0)">';
      $datas.='<span class="opcionesblocklistoption opcionesblocklistoption100">';
      $datas.='<i class="opcionesblocklistoption200 opcionesblocklistoption300">•••</i>';
      $datas.='</span>';
      $datas.='</a>';
      $datas.='<div class="boxoptionslistlines">';
      $datas.='<div class="makposdind"></div>';
      $datas.='<a href="'.$base.'productos/'.$t->ukr.'"><div class="boxoptionslistitems">Ver publicacion</div></a>';
      $datas.='<div class="boxoptionslistitems reneewitemlist" data-modal-trigger="detaisorder'.$t->id.'" data-config="'.$t->id.'">Actualizar stock</div>';
      $datas.='<a href="'.$base.'productos/editar/'.DatosAdmin::urlpersona($t->id).'"><div class="boxoptionslistitems">Editar publicacion</div></a>';
      $datas.='<div class="boxoptionslistitems boxitem_cl" data-config="'.$t->id.'">Eliminar</div>';
      $datas.='</div>';

      $datas.='<div class="modal" data-modal-name="detaisorder'.$t->id.'" data-modal-dismiss>';
      $datas.='<div class="modal__dialog">';
      $datas.='<header class="modal__header">';
      $datas.='<h3 class="modal__title">STOCK ACTUAL ( <span class="stock_view_init'.$t->id.'">'.$stcok_item.'</span> )</h3>';
      $datas.='<i class="modal__close" data-modal-dismiss>X</i>';
      $datas.='<p>'.html_entity_decode($t->nombre).'</p>';
      $datas.='</header>';
      $datas.='<div class="modal__content">';
      $datas.='<select class="select_document_view" id="proveedor_cpl'.$t->id.'">';
      $proveedores=DatosAdmin::mostar_proveedores();
      $datas.='<option>Selecciona un proveedor</option>';
      foreach ($proveedores as $y){
      	$datas.='<option value="'.$y->id.'">'.html_entity_decode($y->nombre).'</option>';
      }
      $datas.='</select>';
      $datas.='<select class="select_document_view" id="document'.$t->id.'">';
      $documents=DatosAdmin::view_documents();
      $datas.='<option>Selecciona documento</option>';
      foreach ($documents as $y) {
      	 $datas.='<option value="'.$y->id.'">'.html_entity_decode($y->nombre).'</option>';
      }
      $datas.='</select>';
      $datas.='<input type="number" placeholder="NUMERO DE DOCUMENTO" id="numdoc'.$t->id.'">';
      $datas.='<input type="number" placeholder="Cantidad" id="stocklist'.$t->id.'">';
      $datas.='<select class="select_document_view" id="sucursal'.$t->id.'">';
      $sucursales_b=DatosAdmin::Mostrar_sucursales();
      $datas.='<option>Selecciona sucursal</option>';
      foreach ($sucursales_b as $s) {
      	$datas.='<option value="'.$s->id.'">'.html_entity_decode($s->nombre).'</option>';
      }
      $datas.='</select>';
      $datas.='<input type="button" class="butt_luis_two select_stock_item_imventori" data-conf="'.$t->id.'" value="Actualizar stock">';
      $datas.='</div>';
      $datas.='</div>';
      $datas.='</div>';

      $datas.='</div>';
      $datas.='</div>';
    }
}
    					
print($datas);