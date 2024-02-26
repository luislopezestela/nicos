<?php
$base = Luis::basepage("base_page_admin");
$urb = explode("/", $_GET["paginas"]);
if(isset($_SESSION["admin_id"])):
  $usuario=DatosUsuario::poriUsuario($_SESSION["admin_id"]);
  if($usuario->tipo==1):
    $productos=DatosAdmin::MostrarPublicacionesMarket($_SESSION["admin_id"],$usuario->categoria_prod_def);
    $categoria = DatosAdmin::mostrar_categorias();
    $marcas = DatosAdmin::mostrar_marcas();
    ?>
    <div class="optlistnull" data-nullb="<?=$base;?>"></div>
    <section class="vista_preb_page">
      <ol class="box_visw">
        <li><a href="<?=$base;?>"><?=Luis::lang("inicio");?></a></li>
        <li><a><?=Luis::lang("tienda");?></a></li>
        <li class="active"><?=Luis::lang("productos");?></li>
      </ol>
    </section>
    <div class="contenido">
      <?php if (isset($_SESSION["puhdr"])): ?>
        <div class="mensaje100">
          <div id="rem10000" class="alerta_top exito_top">
            <p class="alerta_top100"><?=Luis::lang("publicacion_con_exito");?>.</p>
            <span id="close_alert_10000" class="close_exito_100 close_alert_10000block">X</span>
          </div>
        </div>
        <?php unset($_SESSION["puhdr"]); else: ?>
      <?php endif ?>
      <div id="process456" class="lds-rippledef"><div></div><div></div> <div id="porsenrbozx"></div></div>
      <?php if(count($urb)>3): ?>
        <?php header('location:'.$base.'productos/'.$urb[1]);?>
      <?php else: ?>
        <?php if(isset($urb[2])): ?>
          <?php if(isset($urb[1])): ?>
            <?php if($urb[1]==="editar"): ?>
              <?php if(isset($urb[2])==$urb[2]): ?>
                <?php $idf=DatosAdmin::urlpersona_off($urb[2]);
                $prod=DatosAdmin::itemview_productos($idf);
                $imagenes=DatosAdmin::Mostrarimageneditar($prod->id);
                $imgescount=DatosAdmin::cantidad_imagenes($prod->id)->c;
                if($imgescount>=6){$infboxfail="dihs";}else{$infboxfail=false;}
                if($imgescount>=5){
                  $infboxmaxsize="disabled";
                  $infboxmaxclass="afyfdg5";
                  $infboxmaxclass1="adsgdg5";
                }else{
                  $infboxmaxclass="afsfdg5";
                  $infboxmaxclass1="adsfdg5";
                  $infboxmaxsize=false;
                }?>
                <script src="<?=$base."datos/source/ckeditor/ckeditor.js";?>"></script>
                <script src="<?=$base."datos/source/ckeditor/luchossedit.js";?>"></script>
                <!-- crear publicacion  -->
                <div class="contentboxbuttons">
                  <a href="<?=$base.'productos';?>">
                    <div class="boxdatabuttompublic pcol pcolh co0">❮  <?=Luis::lang("publicaciones");?> </div>
                  </a>
                </div>
                <div class="contenidoboxplasstcread">
                  <div class="untmsd4ss4listticread"><?=Luis::lang("editar");?></div>
                  <div class="contentboxitemslistcread">
                    <form action="#" id="form800goodlive100" role="form" method="POST" enctype="multipart/form-data">
                      <input class="hipboxmp" type="text" name="intlinear" value="<?=DatosAdmin::urlpersona($prod->id);?>">
                      <span class="infmaximgs <?=$infboxfail;?>">
                        <?=Luis::lang("fotos");?>
                        <span id="coukbox200" class="coukbox"><?=DatosAdmin::cantidad_imagenes($prod->id)->c;?></span>/5 
                        <span><?=Luis::lang("puedes_agregar_maximo_cinco_fotos");?></span>
                      </span>

                      <div class="litimgecurrrentbox">
                        <!-- imagenes lista -->
                        <?php foreach ($imagenes as $ims): ?>
                          <span class="addnewimageluisboxud">
                            <span class="addnewimageluisboxudremoves rols_int_disp" data-null="<?=$ims->id;?>">
                              <img src="<?=$base."datos/imagenes/icons/csacdjkclos.png";?>">
                            </span>
                            <img class="addnewimageluisboxudimage" src="<?=$base."../datos/modulos/".Luis::temass()."/source/imagenes/items/".$prod->id."/thumb/".$ims->imagen;?>" title="Foto">
                          </span>
                        <?php endforeach ?>
                        <!-- imagenes lista end -->
                        <div id="litimgecurrrent"></div>
                        <span class="addnewimageluis addnewimageluisboxus <?=$infboxmaxclass;?>" role="button" tabindex="1">
                          <img class="addnewimageluisimf" src="<?=$base."datos/imagenes/icons/imge_add.png";?>" alt="" height="16" width="16">
                          <span class="contentaddimgs"><?=Luis::lang("agregar_foto");?></span>
                          <input  class="addnewimageluisbotsccc <?=$infboxmaxclass1;?>" data-got="<?=$base;?>" type="file" id="files" title="Selecciona una foto" multiple="multiple" accept="image/*" <?=$infboxmaxsize;?>>
                        </span>
                      </div>

                      <div class="contentboxfunst">
                        <div class="boxinputlists">
                          <input id="ifgooda" class="inptexboslistspublic" type="text" name="titulo" autocomplete="off" value="<?=$prod->nombre;?>" required>
                          <label class="labelboxinptext"><?=Luis::lang("titulo");?></label>
                        </div>
                        <hr>
                        <div class="boxinputlists">
                          <input id="ifgoodb" class="inptexboslistspublic" type="text" name="precio" autocomplete="off" value="<?=$prod->precio;?>" required>
                          <label class="labelboxinptext"><?=Luis::lang("precio_venta_por_cantidad");?></label>
                        </div>

                        <div class="boxinputlists">
                          <input id="ifgoodb_two" class="inptexboslistspublic" type="text" name="precio_final" autocomplete="off" value="<?=$prod->precio_final;?>" required>
                          <label class="labelboxinptext"><?=Luis::lang("precio_venta_por_unidad");?></label>
                        </div>
                        <hr>

                        <div class="boxinputlists">
                          <select id="ifodmarc" class="inptexboslistspublic" name="marca" required>
                            <option value=""></option>
                            <?php foreach($marcas as $m): if($m->id==$prod->marca){$seleboxin0="selected";}else{$seleboxin0=false;}?>
                              <option value="<?=$m->id;?>" <?=$seleboxin0;?>><?=html_entity_decode($m->nombre);?></option>
                            <?php endforeach; ?>
                          </select>
                          <label class="labelboxinptext"><?=Luis::lang("marca");?></label>
                        </div>

                        <div class="boxinputlists">
                          <select id="ifgoodc" class="inptexboslistspublic" name="listone" required>
                            <option value=""></option>
                            <?php foreach($categoria as $t): if($t->id==$prod->categoria){$seleboxin="selected";}else{$seleboxin=false;}?>
                              <option value="<?=$t->id;?>" <?=$seleboxin;?>><?=html_entity_decode($t->nombre);?></option>
                            <?php endforeach; ?>
                          </select>
                          <label class="labelboxinptext"><?=Luis::lang("categoria");?></label>
                        </div>

                        <?php if($prod->subcategoria==null): ?>
                          <div class="boxinputlists" style="display:none;">
                            <select id="ifgoodd" class="inptexboslistspublic" name="listtwo" required disabled>
                              <option value=""></option>
                            </select>
                            <label class="labelboxinptext"><?=Luis::lang("sub_categoria");?></label>
                          </div>
                        <?php else: ?>
                          <div class="boxinputlists">
                            <select id="ifgoodd" class="inptexboslistspublic" name="listtwo" required>
                              <?php $catsd=DatosAdmin::poridDesubCategorias($prod->categoria);
                              if(count($catsd)>0):?>
                                <option value=""></option>
                                <?php foreach($catsd as $c): if($c->id==$prod->subcategoria){$seleboxins="selected";}else{$seleboxins=false;}?>
                                  <option value="<?=$c->id;?>" <?=$seleboxins;?>><?=html_entity_decode($c->nombre);?></option>
                                <?php endforeach; ?>
                              <?php endif; ?>
                            </select>
                            <label class="labelboxinptext"><?=Luis::lang("sub_categoria");?></label>
                          </div>
                        <?php endif ?>

                        <div class="boxinputlists opcilinesviewbox">
                          <textarea cols="20" rows="2" data-editable="0" class="inptexboslistspublic hedboxhomeeditorsblok" name="listboxstrin" id="editor" required=""><?=html_entity_decode($prod->descripcion);?></textarea>
                          <label class="labelboxinptext"><?=Luis::lang("caracteristicas");?></label>
                        </div>
                      </div>

                      <div class="aphlistbuttonnextopenbox">
                        <span class="aphlistbuttonnextopemboxlist100 co0 pcol pcolh "><?=Luis::lang("guardar");?></span>
                        <input id="blocknullfom1300" type="submit">
                      </div>
                    </form>
                  </div>
                </div>
                <script>initSample();</script>
                <script src="<?=$base."datos/source/scripts/editor.js";?>"></script>
              <?php else: ?>
                <?php header('location:'.$base.'productos');?>
              <?php endif ?>
            <?php elseif($urb[1]==="completar"): ?>
              <?php if(isset($urb[2])==$urb[2]): ?>
                <?php $identifica_producto_en_page = DatosAdmin::urlpersona_off($urb[2]);?>
                <?php $prod_item=DatosAdmin::itemview_productos($identifica_producto_en_page);?>
                <?php $categorias = DatosAdmin::mostrar_categoria_admin(); ?>
                <div class="contentboxbuttons">
                  <a href="<?=$base.'productos';?>">
                    <div class="boxdatabuttompublic pcol pcolh co0">❮  <?=Luis::lang("publicaciones");?> </div>
                  </a>
                </div>

                <div class="contenidoboxplasstcread">
                  <div class="add_details_items_box border_items_previews">
                    <?=html_entity_decode($prod_item->nombre);?>
                  </div>
                  <br>
                  <div class="untmsd4ss4listticread"><?=Luis::lang("caracteristicas");?></div>
                  <div class="fraces_precargadas">
                      <div class="boxinputlists in_day_ps">
                        <select id="ifgoodc" class="inptexboslistspublic inptexboslistspublic_funct" name="listone" required>
                          <option value=""></option>
                          <option value=""><?=Luis::lang("ninguno");?></option>
                          <?php foreach($categoria as $t):?>
                            <option value="<?=$t->id;?>"><?=html_entity_decode($t->nombre);?></option>
                          <?php endforeach; ?>
                        </select>
                        <label class="labelboxinptext"><?=Luis::lang("por_categorias");?></label>
                      </div>

                      <div class="boxinputlists in_day_ps" style="display:none;">
                        <select id="ifgoodd" class="inptexboslistspublic" name="listtwo" disabled></select>
                        <label class="labelboxinptext"><?=Luis::lang("por_sub_categoria");?></label>
                      </div>
                  </div>
                  
                  <div class="add_details_items_box">
                    <div class="boxinputlists in_day_ps_b">
                      <input class="inptexboslistspublic add_details_items_inputs" type="text" required>
                      <label class="labelboxinptext"><?=Luis::lang("por_nombre");?></label>
                    </div>
                  </div>

                  <div class="add_details_items_box">
                    <div class="boxinputlists">
                      <span class="add_details_items_button add_details_items_buttons_notes add_details_items_buttons" data="<?=$urb[2]; ?>"><?=Luis::lang("agregar");?></span>
                    </div>
                  </div>
                </div>

                <div class="list_details_types_options_box">
                  <?php $view_type_list = DatosAdmin::ver_opciones_type($identifica_producto_en_page); ?>
                  <?php foreach ($view_type_list as $td): ?>
                    <?php $detalles_opciones = DatosAdmin::ver_detalles_opciones($td->id); ?>
                    <div class="contentboxitemslistcread_border <?="contentboxitemslistcreadertype".$td->id;?> contentboxitemslistcread_view_det" >
                      <?php if($td->id_cat_sub_add): ?>
                        <?php $cat_a = DatosAdmin::sub_categoria_getById($td->id_cat_sub_add);?>
                        <label class="label_opcopnes_page label_data_types_detalle <?="label_data_types_detalle".$td->id;?>"><?=html_entity_decode($cat_a->nombre);?></label>
                      <?php elseif($td->id_cat_add): ?>
                        <?php $cat_a = DatosAdmin::getById_categoria($td->id_cat_add);?>
                        <label class="label_opcopnes_page label_data_types_detalle <?="label_data_types_detalle".$td->id;?>"><?=html_entity_decode($cat_a->nombre);?></label>
                      <?php else: ?>
                        <label class="label_opcopnes_page label_data_types_detalle <?="label_data_types_detalle".$td->id;?>"><?=html_entity_decode($td->nombre);?></label>
                      <?php endif ?>
                      
                      <div class="listar_opciones_de_tipo_box <?="listar_opciones_de_tipo_box".$td->id;?>">
                        <?php foreach ($detalles_opciones as $deop): ?>
                          <div class="box_options_inline <?="box_options_inline".$deop->id;?>">
                            <div class="box_type_inline_view">
                             
                              
                              <?php if($deop->principal==1): ?>
                                <span class="button_display_opciones_principal_active update_default_option <?="update_default_option".$td->id;?>" data_p="<?=$td->id;?>" data_s="<?=$deop->id;?>"><?=Luis::lang("principal");?></span>
                              <?php else: ?>
                                <span class="button_display_opciones_principal_desactivado update_default_option <?="update_default_option".$td->id;?>" data_p="<?=$td->id;?>" data_s="<?=$deop->id;?>"><?=Luis::lang("activar");?></span>
                              <?php endif ?>
                            </div>
                            <label class="<?="name_data_options_view".$deop->id;?>"><?=html_entity_decode($deop->nombre);?></label>
                            <div class="opcionesblocklist opcionesblocklist1000boxlist">
                              <a class="opcionesblocklist100 opcionesblocklist1000" href="javascript:void(0)">
                                <span class="opcionesblocklistoption opcionesblocklistoption100">
                                  <i class="opcionesblocklistoption200 opcionesblocklistoption300">•••</i>
                                </span>
                              </a>
                              <div class="boxoptionslistlines" style="display:none;">
                                <div class="makposdind"></div>
                                <div class="boxoptionslistitems <?="button_display_opciones_update".$deop->id;?>" data-modal-trigger="<?="dpl_details__subs_li".$deop->id;?>" data="<?=$deop->id?>" item_type="<?=$td->id;?>"><?=Luis::lang("editar");?></div>
                                <div class="boxoptionslistitems button_display_opciones_delete <?="button_display_opciones_delete".$deop->id;?>" data="<?=$deop->id?>" data_dels="<?=$td->id;?>"><?=Luis::lang("eliminar");?></div>
                              </div>
                              <div class="modal" data-modal-name="<?="dpl_details__subs_li".$deop->id;?>" data-modal-dismiss="">
                                <div class="modal__dialog">
                                  <header class="modal__header">
                                    <i class="modal__close" data-modal-dismiss="">X</i>
                                    <?php if($td->id_cat_sub_add): ?>
                                      <?php $cat_a = DatosAdmin::sub_categoria_getById($td->id_cat_sub_add);?>
                                      <label class="label_opcopnes_page label_data_types_detalle <?="label_data_types_detalle".$td->id;?>"><?=html_entity_decode($cat_a->nombre);?></label>
                                    <?php elseif($td->id_cat_add): ?>
                                      <?php $cat_a = DatosAdmin::getById_categoria($td->id_cat_add);?>
                                      <label class="label_opcopnes_page label_data_types_detalle <?="label_data_types_detalle".$td->id;?>"><?=html_entity_decode($cat_a->nombre);?></label>
                                    <?php else: ?>
                                      <label class="label_opcopnes_page label_data_types_detalle <?="label_data_types_detalle".$td->id;?>"><?=html_entity_decode($td->nombre);?></label>
                                    <?php endif ?>
                                  </header>
                                  <div class="modal__content">
                                    <div class="contenidoboxplasstcread">
                                      <div class="untmsd4ss4listticread"><?=Luis::lang("agregar_opciones");?></div>
                                      <?php if($td->id_cat_sub_add): ?>
                                        <?php $items_for_cat = DatosAdmin::MostrarItems_cartas_opciones_sub($td->id_cat_sub_add);?>
                                        <div class="fraces_precargadas">
                                          <div class="boxinputlists in_day_ps<?=$deop->id;?>">
                                            <select id="items_li_puv<?=$deop->id;?>" class="inptexboslistspublic inptexboslistspublic_funct" data="<?=$deop->id;?>" required>
                                              <option value=""></option>
                                              <option value=""><?=Luis::lang("ninguno");?></option>
                                              <?php foreach($items_for_cat as $t):?>
                                                <option value="<?=$t->id;?>" <?php if($t->id==$deop->item_k){echo("selected");}?>><?=html_entity_decode($t->nombre);?></option>
                                              <?php endforeach; ?>
                                            </select>
                                            <label class="labelboxinptext"><?=Luis::lang("por_categorias");?></label>
                                          </div>
                                        </div>
                                        <div class="add_details_items_box">
                                          <div class="boxinputlists in_day_ps_b<?=$deop->id;?> in_day_ps_true">
                                            <input class="inptexboslistspublic ad_opt_lk_up<?=$deop->id;?>" data="<?=$deop->id;?>" type="text" required>
                                            <label class="labelboxinptext"><?=Luis::lang("nombre");?></label>
                                          </div>
                                        </div>
                                        <label class="fraces_precargadas"><?=Luis::lang("usar_precio");?></label>
                                        <div class="price_option_actives">
                                          <input class="pric_hid pric-labelone" type="radio" name="<?="price_data".$deop->id?>" value="1" id="<?="pric_dl_o".$deop->id?>" <?php if($deop->precio==1){echo("checked");}?>/>
                                          <label class="btn_lab_styl" for="<?="pric_dl_o".$deop->id?>">
                                            <h1><?=Luis::lang("si");?></h1>
                                          </label>
                                          <input class="pric_hid pric-labeltwo" type="radio" name="<?="price_data".$deop->id?>" value="0" id="<?="pric_dl".$deop->id?>" <?php if($deop->precio==0){echo("checked");}?>/>
                                          <label class="btn_lab_styl" for="<?="pric_dl".$deop->id?>">
                                            <h1><?=Luis::lang("no");?></h1>
                                          </label>
                                        </div>
                                      <?php elseif($td->id_cat_add): ?>
                                        <?php $items_for_cat = DatosAdmin::MostrarItems_cartas_opciones($td->id_cat_add);?>
                                        <div class="fraces_precargadas">
                                          <div class="boxinputlists in_day_ps<?=$deop->id;?>">
                                            <select id="items_li_puv<?=$deop->id;?>" class="inptexboslistspublic inptexboslistspublic_funct" data="<?=$deop->id;?>" required>
                                              <option value=""></option>
                                              <option value=""><?=Luis::lang("ninguno");?></option>
                                              <?php foreach($items_for_cat as $t):?>
                                                <option value="<?=$t->id;?>" <?php if($t->id==$deop->item_k){echo("selected");}?>><?=html_entity_decode($t->nombre);?></option>
                                              <?php endforeach; ?>
                                            </select>
                                            <label class="labelboxinptext"><?=Luis::lang("por_categorias");?></label>
                                          </div>
                                        </div>
                                        <div class="add_details_items_box">
                                          <div class="boxinputlists in_day_ps_b<?=$deop->id;?> in_day_ps_true">
                                            <input class="inptexboslistspublic ad_opt_lk_up<?=$deop->id;?>" data="<?=$deop->id;?>" type="text" required>
                                            <label class="labelboxinptext"><?=Luis::lang("nombre");?></label>
                                          </div>
                                        </div>

                                        <label class="fraces_precargadas"><?=Luis::lang("usar_precio");?></label>
                                        <div class="price_option_actives">
                                          <input class="pric_hid pric-labelone" type="radio" name="<?="price_data".$deop->id?>" value="1" id="<?="pric_dl_o".$deop->id?>" <?php if($deop->precio==1){echo("checked");}?>/>
                                          <label class="btn_lab_styl" for="<?="pric_dl_o".$deop->id?>">
                                            <h1><?=Luis::lang("si");?></h1>
                                          </label>
                                          <input class="pric_hid pric-labeltwo" type="radio" name="<?="price_data".$deop->id?>" value="0" id="<?="pric_dl".$deop->id?>" <?php if($deop->precio==0){echo("checked");}?>/>
                                          <label class="btn_lab_styl" for="<?="pric_dl".$deop->id?>">
                                            <h1><?=Luis::lang("no");?></h1>
                                          </label>
                                        </div>
                                      <?php else: ?>
                                        <div class="fraces_precargadas">
                                          <div class="boxinputlists in_day_ps<?=$deop->id;?> in_day_ps_true">
                                            <select id="items_li_puv<?=$deop->id;?>" class="inptexboslistspublic inptexboslistspublic_funct" data="<?=$deop->id;?>" required></select>
                                            <label class="labelboxinptext"><?=Luis::lang("seleccionar_item");?></label>
                                          </div>
                                        </div>
                                        <div class="add_details_items_box">
                                          <div class="boxinputlists in_day_ps_b<?=$deop->id;?>">
                                            <input class="inptexboslistspublic ad_opt_lk_up<?=$deop->id;?>" data="<?=$deop->id;?>" type="text" value="<?=$deop->nombre; ?>" required>
                                            <label class="labelboxinptext"><?=Luis::lang("nombre");?></label>
                                          </div>
                                        </div>

                                        <div class="price_option_actives in_day_ps_true">
                                          <input class="pric_hid pric-labelone" type="radio" name="<?="price_data".$td->id?>" value="1" id="<?="pric_dl_o".$td->id?>"/>
                                          <label class="btn_lab_styl" for="<?="pric_dl_o".$td->id?>">
                                            <h1><?=Luis::lang("si");?></h1>
                                          </label>
                                          <input class="pric_hid pric-labeltwo" type="radio" name="<?="price_data".$td->id?>" value="0" id="<?="pric_dl".$td->id?>"/>
                                          <label class="btn_lab_styl" for="<?="pric_dl".$td->id?>">
                                            <h1><?=Luis::lang("no");?></h1>
                                          </label>
                                        </div>
                                      <?php endif ?>
                                      
                                      <div class="add_details_items_box">
                                        <div class="boxinputlists">
                                          <span class="add_details_items_button ad_det_it_b_upd_opts_update" data="<?=$td->id;?>" data_i="<?=$deop->id;?>"><?=Luis::lang("guardar");?>..</span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php endforeach ?>
                      </div>
                      <!-- /// -->
                      <div class="opcionesblocklist opcionesblocklist1000boxlist">
                        <a class="opcionesblocklist100 opcionesblocklist1000" href="javascript:void(0)">
                          <span class="opcionesblocklistoption opcionesblocklistoption100">
                            <i class="opcionesblocklistoption200 opcionesblocklistoption300">•••</i>
                          </span>
                        </a>
                        <div class="boxoptionslistlines" style="display:none;">
                          <div class="makposdind"></div>
                          <div class="boxoptionslistitems" data-modal-trigger="<?="add_det_subs_".$td->id;?>" data-config="<?=$td->id;?>"><?=Luis::lang("agregar_opciones");?></div>
                          <div class="boxoptionslistitems" data-modal-trigger="<?="dpl_details_".$td->id;?>" data-config="<?=$td->id;?>"><?=Luis::lang("editar");?></div>
                          <div class="boxoptionslistitems delete_button_types" data="<?=$td->id;?>"><?=Luis::lang("eliminar");?></div>
                        </div>
                        <div class="modal" data-modal-name="<?="add_det_subs_".$td->id;?>" data-modal-dismiss="">
                          <div class="modal__dialog">
                            <header class="modal__header">
                              <i class="modal__close" data-modal-dismiss="">X</i>
                              <?php if($td->id_cat_sub_add): ?>
                                <?php $cat_a = DatosAdmin::sub_categoria_getById($td->id_cat_sub_add);?>
                                <label class="label_opcopnes_page label_data_types_detalle <?="label_data_types_detalle".$td->id;?>"><?=html_entity_decode($cat_a->nombre);?></label>
                              <?php elseif($td->id_cat_add): ?>
                                <?php $cat_a = DatosAdmin::getById_categoria($td->id_cat_add);?>
                                <label class="label_opcopnes_page label_data_types_detalle <?="label_data_types_detalle".$td->id;?>"><?=html_entity_decode($cat_a->nombre);?></label>
                              <?php else: ?>
                                <label class="label_opcopnes_page label_data_types_detalle <?="label_data_types_detalle".$td->id;?>"><?=html_entity_decode($td->nombre);?></label>
                              <?php endif ?>
                            </header>
                            <div class="modal__content">
                              <div class="contenidoboxplasstcread">
                                <div class="untmsd4ss4listticread"><?=Luis::lang("agregar_opciones");?></div>
                                <?php if($td->id_cat_sub_add): ?>
                                  <?php $items_for_cat = DatosAdmin::MostrarItems_cartas_opciones_sub($td->id_cat_sub_add);?>
                                  <div class="fraces_precargadas">
                                    <div class="boxinputlists in_day_ps<?=$td->id;?>">
                                      <select id="items_li_puv<?=$td->id;?>" class="inptexboslistspublic inptexboslistspublic_funct" data="<?=$td->id;?>" required>
                                        <option value=""></option>
                                        <option value=""><?=Luis::lang("ninguno");?></option>
                                        <?php foreach($items_for_cat as $t):?>
                                          <option value="<?=$t->id;?>"><?=html_entity_decode($t->nombre);?></option>
                                        <?php endforeach; ?>
                                      </select>
                                      <label class="labelboxinptext"><?=Luis::lang("por_categorias");?></label>
                                    </div>
                                  </div>
                                  <div class="add_details_items_box">
                                    <div class="boxinputlists in_day_ps_b<?=$td->id;?> in_day_ps_true">
                                      <input class="inptexboslistspublic ad_opt_lk<?=$td->id;?>" data="<?=$td->id;?>" type="text" required>
                                      <label class="labelboxinptext"><?=Luis::lang("nombre");?></label>
                                    </div>
                                  </div>
                                <?php elseif($td->id_cat_add): ?>
                                  <?php $items_for_cat = DatosAdmin::MostrarItems_cartas_opciones($td->id_cat_add);?>
                                  <div class="fraces_precargadas">
                                    <div class="boxinputlists in_day_ps<?=$td->id;?>">
                                      <select id="items_li_puv<?=$td->id;?>" class="inptexboslistspublic inptexboslistspublic_funct" data="<?=$td->id;?>" required>
                                        <option value=""></option>
                                        <option value=""><?=Luis::lang("ninguno");?></option>
                                        <?php foreach($items_for_cat as $t):?>
                                          <?php if($t->subcategoria==null): ?>
                                            <option value="<?=$t->id;?>"><?=html_entity_decode($t->nombre);?></option>
                                          <?php endif ?>
                                        <?php endforeach; ?>
                                      </select>
                                      <label class="labelboxinptext"><?=Luis::lang("por_categorias");?></label>
                                    </div>
                                  </div>
                                  <div class="add_details_items_box">
                                    <div class="boxinputlists in_day_ps_b<?=$td->id;?> in_day_ps_true">
                                      <input class="inptexboslistspublic ad_opt_lk<?=$td->id;?>" data="<?=$td->id;?>" type="text" required>
                                      <label class="labelboxinptext"><?=Luis::lang("nombre");?></label>
                                    </div>
                                  </div>
                                <?php else: ?>
                                  <div class="fraces_precargadas">
                                    <div class="boxinputlists in_day_ps<?=$td->id;?> in_day_ps_true">
                                      <select id="items_li_puv<?=$td->id;?>" class="inptexboslistspublic inptexboslistspublic_funct" data="<?=$td->id;?>" required></select>
                                      <label class="labelboxinptext"><?=Luis::lang("seleccionar_item");?></label>
                                    </div>
                                  </div>
                                  <div class="add_details_items_box">
                                    <div class="boxinputlists in_day_ps_b<?=$td->id;?>">
                                      <input class="inptexboslistspublic ad_opt_lk<?=$td->id;?>" data="<?=$td->id;?>" type="text" required>
                                      <label class="labelboxinptext"><?=Luis::lang("nombre");?></label>
                                    </div>
                                  </div>
                                <?php endif ?>

                                <div class="price_option_actives in_day_ps_true">
                                  <label class=""><?=Luis::lang("usar_precio");?></label><br>
                                  <input class="pric_hid pric-labelone" type="radio" name="<?="price_data".$td->id?>" value="1" id="<?="pric_dl_o".$td->id?>"/>
                                  <label class="btn_lab_styl" for="<?="pric_dl_o".$td->id?>">
                                    <h1><?=Luis::lang("si");?></h1>
                                  </label>
                                  <input class="pric_hid pric-labeltwo" type="radio" name="<?="price_data".$td->id?>" value="0" id="<?="pric_dl".$td->id?>"/>
                                  <label class="btn_lab_styl" for="<?="pric_dl".$td->id?>">
                                    <h1><?=Luis::lang("no");?></h1>
                                  </label>
                                </div>
                                <div class="add_details_items_box">
                                  <div class="boxinputlists">
                                    <span class="add_details_items_button ad_det_it_b_upd_opts" data="<?=$td->id;?>"><?=Luis::lang("agregar");?>..</span>
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal" data-modal-name="<?="dpl_details_".$td->id;?>" data-modal-dismiss="">
                          <div class="modal__dialog">
                            <header class="modal__header">
                              <i class="modal__close" data-modal-dismiss="">X</i>
                              <?php if($td->id_cat_sub_add): ?>
                                <?php $cat_a = DatosAdmin::sub_categoria_getById($td->id_cat_sub_add);?>
                                <label class="label_opcopnes_page label_data_types_detalle <?="label_data_types_detalle".$td->id;?>"><?=html_entity_decode($cat_a->nombre);?></label>
                              <?php elseif($td->id_cat_add): ?>
                                <?php $cat_a = DatosAdmin::getById_categoria($td->id_cat_add);?>
                                <label class="label_opcopnes_page label_data_types_detalle <?="label_data_types_detalle".$td->id;?>"><?=html_entity_decode($cat_a->nombre);?></label>
                              <?php else: ?>
                                <label class="label_opcopnes_page label_data_types_detalle <?="label_data_types_detalle".$td->id;?>"><?=html_entity_decode($td->nombre);?></label>
                              <?php endif ?>
                            </header>
                            <div class="modal__content">
                              <div class="contenidoboxplasstcread">
                                <div class="untmsd4ss4listticread"><?=Luis::lang("caracteristicas");?></div>

                                <?php if($td->id_cat_sub_add): ?>
                                <?php $cat_a = DatosAdmin::sub_categoria_getById($td->id_cat_sub_add);?>
                                  <div class="fraces_precargadas">
                                    <div class="boxinputlists in_day_ps<?=$td->id;?>">
                                      <select id="ifgoodc<?=$td->id;?>" class="inptexboslistspublic inptexboslistspublic_funct" data="<?=$td->id;?>" name="listone" required>
                                        <option value=""></option>
                                        <option value=""><?=Luis::lang("ninguno");?></option>
                                        <?php foreach($categoria as $t):?>
                                          <option value="<?=$t->id;?>" <?php if($t->id==$cat_a->categoria){echo("selected");}?>><?=html_entity_decode($t->nombre);?></option>
                                        <?php endforeach; ?>
                                      </select>
                                      <label class="labelboxinptext"><?=Luis::lang("por_categorias");?></label>
                                    </div>

                                    <div class="boxinputlists in_day_ps<?=$td->id;?>">
                                      <select id="ifgoodd<?=$td->id;?>" class="inptexboslistspublic" name="listtwo" required>
                                        <option value=""></option>
                                        <option value=""><?=Luis::lang("ninguno");?></option>
                                        <?php $categoria_sub = DatosAdmin::mostrar_sub_categorias($cat_a->categoria); ?>
                                        <?php foreach($categoria_sub as $t):?>
                                          <option value="<?=$t->id;?>" <?php if($t->id==$td->id_cat_sub_add){echo("selected");}?>><?=html_entity_decode($t->nombre);?></option>
                                        <?php endforeach; ?>
                                      </select>
                                      <label class="labelboxinptext"><?=Luis::lang("por_sub_categoria");?></label>
                                    </div>
                                  </div>

                                  <div class="add_details_items_box">
                                    <div class="boxinputlists in_day_ps_b<?=$td->id;?> in_day_ps_true">
                                      <input class="inptexboslistspublic add_details_items_inputs_upd add_details_items_inputs_upd<?=$td->id;?>" data="<?=$td->id;?>" type="text" value="<?=html_entity_decode($td->nombre);?>" required>
                                      <label class="labelboxinptext"><?=Luis::lang("por_nombre");?></label>
                                    </div>
                                  </div>
                                <?php elseif($td->id_cat_add): ?>
                                  <div class="fraces_precargadas">
                                    <div class="boxinputlists in_day_ps<?=$td->id;?>">
                                      <select id="ifgoodc<?=$td->id;?>" class="inptexboslistspublic inptexboslistspublic_funct" data="<?=$td->id;?>" name="listone" required>
                                        <option value=""></option>
                                        <option value=""><?=Luis::lang("ninguno");?></option>
                                        <?php foreach($categoria as $t):?>
                                          <option value="<?=$t->id;?>" <?php if($t->id==$td->id_cat_add){echo("selected");}?>><?=html_entity_decode($t->nombre);?></option>
                                        <?php endforeach; ?>
                                      </select>
                                      <label class="labelboxinptext"><?=Luis::lang("por_categorias");?></label>
                                    </div>

                                    <div class="boxinputlists in_day_ps<?=$td->id;?>">
                                      <select id="ifgoodd<?=$td->id;?>" class="inptexboslistspublic" name="listtwo" required>
                                        <option value=""></option>
                                        <option value=""><?=Luis::lang("ninguno");?></option>
                                        <?php $categoria_sub = DatosAdmin::mostrar_sub_categorias($td->id_cat_add); ?>
                                        <?php foreach($categoria_sub as $t):?>
                                          <option value="<?=$t->id;?>" <?php if($t->id==$td->id_cat_sub_add){echo("selected");}?>><?=html_entity_decode($t->nombre);?></option>
                                        <?php endforeach; ?>
                                      </select>
                                      <label class="labelboxinptext"><?=Luis::lang("por_sub_categoria");?></label>
                                    </div>

                                  </div>

                                  <div class="add_details_items_box">
                                    <div class="boxinputlists in_day_ps_b<?=$td->id;?> in_day_ps_true">
                                      <input class="inptexboslistspublic add_details_items_inputs_upd add_details_items_inputs_upd<?=$td->id;?>" data="<?=$td->id;?>" type="text" value="<?=html_entity_decode($td->nombre);?>" required>
                                      <label class="labelboxinptext"><?=Luis::lang("por_nombre");?></label>
                                    </div>
                                  </div>
                                <?php else: ?>
                                  <div class="fraces_precargadas">
                                    <div class="boxinputlists in_day_ps<?=$td->id;?> in_day_ps_true">
                                      <select id="ifgoodc<?=$td->id;?>" class="inptexboslistspublic inptexboslistspublic_funct" data="<?=$td->id;?>" name="listone" required>
                                        <option value=""></option>
                                        <option value=""><?=Luis::lang("ninguno");?></option>
                                        <?php foreach($categoria as $t):?>
                                          <option value="<?=$t->id;?>"><?=html_entity_decode($t->nombre);?></option>
                                        <?php endforeach; ?>
                                      </select>
                                      <label class="labelboxinptext"><?=Luis::lang("por_categorias");?></label>
                                    </div>

                                    <div class="boxinputlists in_day_ps<?=$td->id;?> in_day_ps_true" style="display:none;">
                                      <select id="ifgoodd<?=$td->id;?>" class="inptexboslistspublic" name="listtwo" disabled></select>
                                      <label class="labelboxinptext"><?=Luis::lang("por_sub_categoria");?></label>
                                    </div>
                                  </div>

                                  <div class="add_details_items_box">
                                    <div class="boxinputlists in_day_ps_b<?=$td->id;?>">
                                      <input class="inptexboslistspublic add_details_items_inputs_upd add_details_items_inputs_upd<?=$td->id;?>" data="<?=$td->id;?>" type="text" value="<?=html_entity_decode($td->nombre);?>" required>
                                      <label class="labelboxinptext"><?=Luis::lang("por_nombre");?></label>
                                    </div>
                                  </div>
                                <?php endif ?>
                                <div class="add_details_items_box">
                                  <div class="boxinputlists">
                                    <span class="add_details_items_button add_details_items_buttons_upd" data="<?=$td->id;?>"><?=Luis::lang("guardar");?></span>
                                  </div>
                                </div>
                                
                                
                                
                              </div>
                            </div>
                          </div>
                        </div>                                  
                      </div>
                      <!-- **** -->
                    </div>
                  <?php endforeach ?>
                </div>
              <?php else: ?>
                <?php header('location:'.$base.'productos');?>
              <?php endif ?>
            <?php elseif($urb[1]==="crear"): ?>
              <?php header('location:'.$base.'productos');?>
            <?php else: ?>
              <?php header('location:'.$base.'productos');?>
            <?php endif ?>
          <?php endif ?>
        <?php elseif(isset($urb[1])): 
          if(isset($urb[1])==$urb[1]):
            $items_veficar=DatosAdmin::porUkr_producto($urb[1]);
            if($urb[1]==="crear"): ?>
              <script src="<?=$base."datos/source/ckeditor/ckeditor.js";?>"></script>
                <script src="<?=$base."datos/source/ckeditor/luchossedit.js";?>"></script>
              <!-- crear publicacion  -->
              <div class="contentboxbuttons">
                <a href="<?=$base.'productos';?>">
                  <div class="boxdatabuttompublic pcol pcolh co0">❮  <?=Luis::lang("publicaciones");?> </div>
                </a>
              </div>

              <div class="contenidoboxplasstcread">
                <div class="contentboxitemslistcread">
                  <form id="form800goodlive" role="form" method="POST" enctype="multipart/form-data">
                    <div>
                      <span class="infmaximgs"><?=Luis::lang("fotos");?> <span id="coukbox200" class="coukbox">0</span>/5 <span><?=Luis::lang("puedes_agregar_maximo_cinco_fotos");?></span></span>
                    </div>

                    <div class="litimgecurrrentbox">
                      <div id="litimgecurrrent"></div>
                      <span class="addnewimageluis addnewimageluisboxus afsfdg5" role="button" tabindex="1">
                        <img class="addnewimageluisimf" src="<?=$base."datos/imagenes/icons/imge_add.png" ?>" alt="" height="16" width="16">
                        <span class="contentaddimgs"><?=Luis::lang("agregar_foto");?></span>
                        <input  class="addnewimageluisbotsccc adsfdg5" data-got="<?=$base;?>" type="file" id="files" name="files[]" title="Selecciona una foto"  multiple="multiple" accept="image/*">
                      </span>
                    </div>

                    <div class="contentboxfunst">
                      <div class="boxinputlists">
                        <input id="ifgooda" class="inptexboslistspublic" type="text" name="titulo" autocomplete="off" required>
                        <label class="labelboxinptext"><?=Luis::lang("titulo");?></label>
                      </div>
                      <hr>
                      <div class="boxinputlists">
                        <input id="ifgoodb" class="inptexboslistspublic" type="text" name="precio" autocomplete="off" required>
                        <label class="labelboxinptext"><?=Luis::lang("precio_venta_por_cantidad");?></label>
                      </div>

                      <div class="boxinputlists">
                        <input id="ifgoodb_two" class="inptexboslistspublic" type="text" name="precio_final" autocomplete="off" required>
                        <label class="labelboxinptext"><?=Luis::lang("precio_venta_por_unidad");?></label>
                      </div>

                      <hr>
                      <div class="boxinputlists">
                        <select id="ifodmarc" class="inptexboslistspublic" name="marca" required>
                          <option value=""></option>
                          <?php foreach($marcas as $m): ?>
                            <option value="<?=$m->id;?>"><?=html_entity_decode($m->nombre);?></option>
                          <?php endforeach; ?>
                        </select>
                        <label class="labelboxinptext"><?=Luis::lang("marca");?></label>
                      </div>

                      <div class="boxinputlists">
                        <select id="ifgoodc" class="inptexboslistspublic" name="listone" required>
                          <option value=""></option>
                          <?php foreach($categoria as $t):?>
                            <option value="<?=$t->id;?>"><?=html_entity_decode($t->nombre);?></option>
                          <?php endforeach; ?>
                        </select>
                        <label class="labelboxinptext"><?=Luis::lang("categoria");?></label>
                      </div>

                      <div class="boxinputlists" style="display:none;">
                        <select id="ifgoodd" class="inptexboslistspublic" name="listtwo" disabled></select>
                        <label class="labelboxinptext"><?=Luis::lang("sub_categoria");?></label>
                      </div>

                      <div class="boxinputlists opcilinesviewbox">
                        <textarea cols="20" rows="2" data-editable="0" class="inptexboslistspublic hedboxhomeeditorsblok" name="listboxstrin" id="editor" style="resize:none;min-height:100px;max-height:500px;padding:5px;" required=""></textarea>
                        <label class="labelboxinptext"><?=Luis::lang("caracteristicas");?></label>
                      </div>
                    </div>

                    <div class="aphlistbuttonnextopenbox">
                      <span class="aphlistbuttonnextopembox co0 pcol pcolh"><?=Luis::lang("publicar");?></span>
                      <input id="blocknullfom12" type="submit">
                    </div>
                  </form>
                </div>
              </div>
              <script>initSample();</script>
                <script src="<?=$base."datos/source/scripts/editor.js";?>"></script>
            <?php elseif($urb[1]===$items_veficar->ukr): ?>
              <div class="container">
                <div class="contentboxbuttons">
                  <a href="<?=$base.'productos';?>"><div class="boxdatabuttompublic pcol pcolh co0">❮  Publicaciones </div></a>
                </div>
                <?php $irtm=DatosAdmin::porUkr_producto($urb[1]); ?>
                
                <div class="contenhead_products">
                  <span class="titulo_paginas_two_dettalles"><?=$irtm->nombre;?></span>
                  <?php $stcok_item=DatosAdmin::cantidad_stock_de_producto_admin_sucursal($irtm->id,$usuario->sucursal)->c;?>
                  <div class="box_head_products">
                    <label class="numbers_pag_head_products_label">Stock</label>
                    <?php if(!isset($stcok_item)): ?>
                      <span class="numbers_pag_head_products">0</span>
                    <?php else: ?>
                      <span class="numbers_pag_head_products"><?=$stcok_item;?></span>
                    <?php endif ?>
                  </div>
                </div>
                <br>
                <div class="panel panel-default table_is_productos_lists_dos" id="table_is_productos_lists_dos">
                  <div class="panel-body panel_tabla">
                    <table class="table table_data_info_pages" id="table_is_productos_lists_tres">
                      <tbody class="data_items_stock_controls">
                        <?php if($usuario->es_administrador==1): ?>
                          <?php $movstock=DatosAdmin::mostrar_productos_stock_lista_admin($irtm->id); ?>
                        <?php else: ?>
                          <?php $movstock=DatosAdmin::mostrar_productos_stock_lista($irtm->id,$_SESSION['admin_id']); ?>
                        <?php endif ?>
                        
                        <?php foreach ($movstock as $m): ?>
                          <?php $proveedor=DatosAdmin::poridproveedor($m->proveedor); ?>
                          <?php $docment=DatosAdmin::poriddocumento($m->documento); ?>
                          <tr>
                            <td><span class="delete_button_in_stock_item" data="<?=$m->id;?>">Eliminar</span></td>
                            <td><?=$proveedor->nombre;?></td>
                            <td><?=$docment->nombre;?></td>
                            <td><?=$m->num_documento;?></td>
                            <td><?=$m->barcode;?></td>
                            <td><?=$m->model;?></td>
                            <td><?=$m->series;?></td>
                          </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            <?php else: ?>
              <?php header('location:'.$base.'productos');?>
            <?php endif;?>
          <?php else: ?>
            <?php header('location:'.$base.'productos');?>
          <?php endif;?>
          <!-- end crear publicacion -->
        <?php else: ?>
          <!-- Publicaciones -->
          <div class="contenidoboxplasst">
            <?php if($usuario->es_administrador==1): ?>
              <div class="contentboxbuttons">
                <div class="butt_luis_one">
                  <a href="<?=$base.'productos/crear';?>">
                    <span class="add_producto_list"><?=Luis::lang("agregar");?></span>
                  </a>
                </div>
                <hr>
              </div>
            <?php endif ?>
            <div class="conten_controls_box_items">
              <select class="input_text_foot input_text_category_seaching">
                <?php foreach ($categoria as $k): ?>
                  <?php $productos_op=DatosAdmin::MostrarPublicacionesMarket($_SESSION["admin_id"],$k->id); ?>
                  <option <?php if($k->id==$usuario->categoria_prod_def){echo "selected";} ?> value="<?=$k->id;?>"><?=html_entity_decode($k->nombre);?> (<?=count($productos_op);?>)</option>
                <?php endforeach ?>
              </select>
              <input type="text" class="input_text_foot_b" id="search" placeholder="Buscar item...">              
            </div>

            <?php if($usuario->es_administrador==1): ?>
              <!-- admin publicaciones on -->
              <?php $total_productos=0;
              foreach($productos as $uss): ?>
                <?php $stcok_items=DatosAdmin::cantidad_stock_de_producto_admin_sucursal($uss->id,$usuario->sucursal)->c; ?>
                <?php $total_productos +=$stcok_items; ?>
              <?php endforeach ?>

              
              
              <div class="result_seaching_pag">
                <?php foreach($productos as $ite): 
                  $stcok_item=DatosAdmin::cantidad_stock_de_producto_admin_sucursal($ite->id,$usuario->sucursal)->c;?>
                  <div class="contentboxitemslist">
                      <div class="boxdisplay_stock">
                        <span class="tluisboxunliprice stock_view_page_items stockviewers">
                          <label class="labelstockitem">STOCK</label>
                          <span class="stock_view_init<?=$ite->id?> "><?=$stcok_item;?></span>
                        </span>
                      </div>

                      <div class="detaillsboxlists">
                        <div class="tluisboxunli">
                          <?=html_entity_decode($ite->nombre);?>
                        </div>
                        <?php if (is_numeric($ite->precio)): ?>
                          
                          
                          <?php if ($ite->moneda_a): ?>
                            <?php $moneda_por_id_a=DatosAdmin::Mostrar_las_monedas_por_id($ite->moneda_a)->simbolo; ?>
                          <?php else: ?>
                            <?php $moneda_por_id_a=false; ?>
                          <?php endif ?>
                          <?php if ($ite->moneda_b): ?>
                            <?php $moneda_por_id_b=DatosAdmin::Mostrar_las_monedas_por_id($ite->moneda_b)->simbolo; ?>
                          <?php else: ?>
                            <?php $moneda_por_id_b=false; ?>
                          <?php endif ?>
                          <span class="tluisboxunliprice"><?="X.M. ".$moneda_por_id_a.". ".number_format($ite->precio,2,".",",");?></span>
                          <span class="tluisboxunliprice"><?="P.U. ".$moneda_por_id_b.". ".number_format($ite->precio_final,2,".",",");?></span>
                        <?php else: ?>
                        <?php endif ?>

                        <?php if ($ite->estado): ?>
                          <div class="tluisboxunlipubl">Publicado</div>
                        <?php else: ?>
                          <div class="tluisboxunlipubl">Sin publicar</div>
                        <?php endif ?>
                      </div>

                      <div class="opcionesblocklist opcionesblocklist1000boxlist">
                        <a class="opcionesblocklist100 opcionesblocklist1000" href="javascript:void(0)">
                          <span class="opcionesblocklistoption opcionesblocklistoption100">
                            <i class="opcionesblocklistoption200 opcionesblocklistoption300">•••</i>
                          </span>
                        </a>
                        <div class="boxoptionslistlines">
                          <div class="makposdind"></div>
                          <a href="<?=$base."productos/".$ite->ukr;?>"><div class="boxoptionslistitems">Ver publicacion</div></a>
                          <?php if($usuario->es_administrador==1): ?>
                            <div class="boxoptionslistitems" data-modal-trigger="detaisorder<?=$ite->id?>" data-config="<?=$ite->id;?>">
                              Actualizar stock
                            </div>

                            <a href="<?=$base."productos/editar/".DatosAdmin::urlpersona($ite->id);?>">
                              <div class="boxoptionslistitems">Editar publicacion</div>
                            </a>

                            <a href="<?=$base."productos/completar/".DatosAdmin::urlpersona($ite->id);?>">
                              <div class="boxoptionslistitems">Agregar caracteristicas</div>
                            </a>

                            <div class="boxoptionslistitems boxitem_cl" data-config="<?=$ite->id;?>">Eliminar</div>
                          <?php endif ?>
                        </div>

                        <?php if($usuario->es_administrador==1): ?>
                          <div class="modal" data-modal-name="detaisorder<?=$ite->id?>" data-modal-dismiss>
                            <div class="modal__dialog">
                              <header class="modal__header">
                                <h3 class="modal__title">STOCK ACTUAL ( <span class="stock_view_init<?=$ite->id?>"><?=$stcok_item;?></span> )</h3>
                                <i class="modal__close" data-modal-dismiss>X</i>
                                <?php $irtms=DatosAdmin::porUkr_producto($ite->ukr);?>
                                <p><?=html_entity_decode($ite->nombre);?></p>
                              </header>
                              <div class="modal__content">
                                <select class="select_document_view" id="proveedor_cpl<?=$ite->id?>">
                                  <?php $proveedores=DatosAdmin::mostar_proveedores(); ?>
                                  <option value="">Selecciona un proveedor</option>
                                  <?php foreach ($proveedores as $y): ?>
                                    <option value="<?=$y->id;?>"><?=html_entity_decode($y->nombre);?></option>
                                  <?php endforeach ?>
                                </select>

                                <select class="select_document_view" id="document<?=$ite->id?>">
                                  <?php $documents=DatosAdmin::view_documents(); ?>
                                  <option value="">Selecciona documento</option>
                                  <?php foreach ($documents as $y): ?>
                                    <option value="<?=$y->id;?>"><?=html_entity_decode($y->nombre);?></option>
                                  <?php endforeach ?>
                                </select>

                                <input type="number" placeholder="NUMERO DE DOCUMENTO" id="numdoc<?=$ite->id?>">
                                <?php if($irtms->tipo==4):?>
                                  <input type="text" placeholder="Serie" id="barcode<?=$ite->id?>">
                                <?php else: ?>
                                  <input type="text" placeholder="Codigo de barras" id="barcode<?=$ite->id?>">
                                <?php endif ?>

                                <?php if($irtms->tipo==4):?>
                                  <input type="text" placeholder="CPU" id="cpu<?=$ite->id?>">
                                  <input type="text" placeholder="CPU_SPEED" id="cpu_speed<?=$ite->id?>">
                                  <br>
                                  <input type="button" class="butt_luis_two select_stock_item_imventori" data-conf="<?=$ite->id?>" value="Actualizar stock">
                                <?php else: ?>
                                  <input type="button" class="butt_luis_two select_stock_item_imventori" data-conf="<?=$ite->id?>" value="Actualizar stock">
                                <?php endif ?>
                              </div>
                            </div>
                          </div>
                        <?php endif ?>
                        
                      </div>
                    </div>
                <?php endforeach ?>
              </div>
              <div class="optlistnulldop" data-nullb="<?=$base;?>"></div>
              <!-- admin publicaciones off -->
            <?php else: ?>
              <!-- User publicaciones on -->
              <?php $total_productos=0; foreach($productos as $us): ?>
                <?php $stcok_item=DatosAdmin::cantidad_stock_de_producto($us->id,$_SESSION["admin_id"])->c; ?>
                <?php $total_productos +=$stcok_item; ?>
              <?php endforeach ?>
              <div class="result_seaching_pag" style="display:block;width:100%;">
                <div class="titulo_paginas"><?=$total_productos." ".Luis::lang("productos");?></div>
                <?php foreach ($productos as $t): 
                  $stcok_item=DatosAdmin::cantidad_stock_de_producto($t->id,$_SESSION["admin_id"])->c;?>
                  <?php if($stcok_item>0): ?>
                    <div class="contentboxitemslist">
                      <div class="boxdisplay_stock">
                        <span class="tluisboxunliprice stock_view_page_items">
                          <label class="labelstockitem">STOCK</label>
                          <span class="stock_view_init<?=$t->id?>"><?=$stcok_item;?></span>
                        </span>
                      </div>

                      <div class="detaillsboxlists">
                        <div class="tluisboxunli">
                          <?=html_entity_decode($t->nombre);?>
                        </div>
                        <?php if (is_numeric($t->precio)): ?>
                          <span class="tluisboxunliprice"><?="$. ".number_format($t->precio,2,".",",");?></span>
                        <?php else: ?>
                        <?php endif ?>

                        <?php if ($t->estado): ?>
                          <div class="tluisboxunlipubl">Publicado</div>
                        <?php else: ?>
                          <div class="tluisboxunlipubl">Sin publicar</div>
                        <?php endif ?>
                      </div>

                      <div class="opcionesblocklist opcionesblocklist1000boxlist">
                        <a class="opcionesblocklist100 opcionesblocklist1000" href="javascript:void(0)">
                          <span class="opcionesblocklistoption opcionesblocklistoption100">
                            <i class="opcionesblocklistoption200 opcionesblocklistoption300">•••</i>
                          </span>
                        </a>
                        <div class="boxoptionslistlines">
                          <div class="makposdind"></div>
                          <a href="<?=$base."productos/".$t->ukr;?>"><div class="boxoptionslistitems">Ver publicacion</div></a>
                          <?php if($usuario->es_administrador==1): ?>
                            <div class="boxoptionslistitems" data-modal-trigger="detaisorder<?=$t->id?>" data-config="<?=$t->id;?>">
                              Actualizar stock
                            </div>

                            <a href="<?=$base."productos/editar/".DatosAdmin::urlpersona($t->id);?>">
                              <div class="boxoptionslistitems">Editar publicacion</div>
                            </a>

                            <div class="boxoptionslistitems boxitem_cl" data-config="<?=$t->id;?>"><?=Luis::lang("eliminar");?></div>
                          <?php endif ?>
                        </div>

                        <?php if($usuario->es_administrador==1): ?>
                          <div class="modal" data-modal-name="detaisorder<?=$t->id?>" data-modal-dismiss>
                            <div class="modal__dialog">
                              <header class="modal__header">
                                <h3 class="modal__title">STOCK ACTUAL ( <span class="stock_view_init<?=$t->id?>"><?=$stcok_item;?></span> )</h3>
                                <i class="modal__close" data-modal-dismiss>X</i>
                                <?php $irtms=DatosAdmin::porUkr_producto($t->ukr);?>
                                <p><?=html_entity_decode($t->nombre);?></p>
                              </header>
                              <div class="modal__content">
                                <select class="select_document_view" id="proveedor_cpl<?=$t->id?>">
                                  <?php $proveedores=DatosAdmin::mostar_proveedores(); ?>
                                  <option value="">Selecciona un proveedor</option>
                                  <?php foreach ($proveedores as $y): ?>
                                    <option value="<?=$y->id;?>"><?=html_entity_decode($y->nombre);?></option>
                                  <?php endforeach ?>
                                </select>

                                <select class="select_document_view" id="document<?=$t->id?>">
                                  <?php $documents=DatosAdmin::view_documents(); ?>
                                  <option value="">Selecciona documento</option>
                                  <?php foreach ($documents as $y): ?>
                                    <option value="<?=$y->id;?>"><?=html_entity_decode($y->nombre);?></option>
                                  <?php endforeach ?>
                                </select>

                                <input type="number" placeholder="NUMERO DE DOCUMENTO" id="numdoc<?=$t->id?>">
                                <?php if($irtms->tipo==4):?>
                                  <input type="text" placeholder="Serie" id="barcode<?=$t->id?>">
                                <?php else: ?>
                                  <input type="text" placeholder="Codigo de barras" id="barcode<?=$t->id?>">
                                <?php endif ?>

                                <?php if($irtms->tipo==4):?>
                                  <input type="text" placeholder="CPU" id="cpu<?=$t->id?>">
                                  <input type="text" placeholder="CPU_SPEED" id="cpu_speed<?=$t->id?>">
                                  <br>
                                <input type="button" class="butt_luis_two select_stock_item_imventori" data-conf="<?=$t->id?>" value="<?=Luis::lang("actualizar_estok");?>">
                                <?php endif ?>
                              </div>
                            </div>
                          </div>
                        <?php endif ?>
                        
                      </div>
                    </div>
                  <?php endif ?>
                  <!-- fin de item -->
                <?php endforeach ?>
              </div>
              <div class="optlistnulldop" data-nullb="<?=$base;?>"></div>
              <!-- User publicaciones off -->
            <?php endif;?>
          </div>
          <!-- end publicaciones -->
        <?php endif;?>
      <?php endif ?>
    </div>
  <?php else: ?>
    <?php //header('location:'.$base.'panel');?>
  <?php endif;?>

<?php else: ?>
  <?php header('location:'.$base.'acceder');?>
  <?php endif;?>