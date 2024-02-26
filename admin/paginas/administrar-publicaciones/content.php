<?php if($wo['config']['theme']=='restaurante-star'): ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a>Inicio</a>
            </li>
            <li class="breadcrumb-item">
                <a>Administrar caracteristicas</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Publicaciones</li>
        </ol>
    </nav>
    <div>
        <div class="new_publications_sd_hovers">
            <div class="new_publications_sd_hoversw"></div>
        <form class="new_publications_sd" method="POST">
            <div>
                <div class="nueva_publicacion">
                    <div>Titulo</div>
                    <input class="titulo_publication" type="text" name="titulo" autocomplete="off">
                    <div>Detalles</div>
                    <textarea class="texto_detalles" name="detalles"></textarea>
                </div>
                <div class="options_data_sabes">
                <div class="adimg_conten">
                    <input type="file" name="imagen" accept="image/x-png, image/gif, image/jpeg, image/webp" class="image_publication_l" id="publicaciones_c_img">
                    <div class="change-file-ico">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z"></path></svg>
                    </div>
                    <div>
                        <b>Imagen</b>
                        <div class="mt-1 hidden" id="publicaciones_c_img-i">
                            <input type="text" class="change-file-input" readonly="" id="change-file-inputssy">
                        </div>
                    </div>
                </div>

                <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                <input type="hidden" name="editar_publicacion" class="editar_publicacion" value="">
                <div class="new_publications_sd-alert"></div>
                <br>
                <button type="submit" class="btn btn-secondary m-t-15 waves-effect">Guardar</button>
                <span class="horpil horpil_active btn btn-primary m-t-15">Cerrar</span>
                </div>
            </div>
            <div class="loader_fitsdf_s">
                <div class="loaderd_sitr"><div class="tile_lo"></div></div>
            </div>
        </form>
        
        </div>
    </div>
    <?php $publicaciones_data = lui_publicaciones_sd(); ?>
    <?php $urlimag  = $wo['config']['site_url']."/upload/publicacion/".date('Y')."/".date('m')."/"; ?>
    <div class="contenido_de_publicaciones cont_d_publicapols">
        <?php foreach ($publicaciones_data as $publ): ?>
            <div class="publicacion_daata publicaciondat<?=$publ["id"]?>">
                <div class="contenimg image_dird<?=$publ["id"]?>"><img src="<?=$urlimag.$publ["imagen"];?>"></div>
                <div class="contendata">
                    <h4 class="named<?=$publ["id"]?>"><?=$publ["nombre"]?></h4>
                    <p class="descript<?=$publ["id"]?>"><?=$publ["descripcion"]?></p>
                    <div class="options_t">
                        <span class="boton_editar b_editar" data="<?=$publ["id"]?>">Editar</span>
                        <span class="boton_eliminar b_eliminar" data="<?=$publ["id"]?>">Eliminar</span>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <style type="text/css">

        .horpil_active{display:none!important;}

            .adimg_conten {position:relative;overflow:hidden;cursor:pointer;background:#fff;display:block;width:100%;max-width:220px;text-align:center;border-radius:8px;border:1px solid #ccc;padding:6px;cursor:pointer;left:10px;}
    .adimg_conten input[type=file] { position: absolute; top: 0; right: 0; min-width: 100%; min-height: 100%; font-size: 100px; text-align: right; opacity: 0; outline: none; background: #fff; cursor: pointer;display: block;bottom:0;}
    .change-file-ico svg {border-radius: 50%;background: rgb(168 72 73 / 15%);color: <?php echo $wo['config']['btn_background_color'];?>;padding: 10px;width: 50px;height: 50px;}

    .change-file-input {padding: 3px 6px;border: 0;line-height: 1;background: rgb(0 0 0 / 10%);border-radius: 2em;font-size: 13px;width: 100%;}
    .options_data_sabes{display:flex;flex-wrap:wrap;max-width:600px;justify-content:space-between;align-items:center;}
        .nueva_publicacion{
            background:#FFF;
            width:100%;
            max-width:600px;
            border-radius:10px;
            margin:10px auto 10px 10px;
            color:#777;
            padding:10px;
        }
        .loaderd_sitr{display:none;}
        .loader_fitsdf{position:absolute;background:#fff;width:100%;height:100%;left:0;right:0;top:0;bottom:0;border-radius:10px;display:flex;justify-content:center;flex-wrap:wrap;align-items:center;z-index:1;}
        .loader_fitsdf .loaderd_sitr{display:block!important;}
        .loader_fitsdf.loaderd_sitr .tile_lo::before{background:rgb(65, 105, 225)!important}
        .nueva_publicacion input,
        .nueva_publicacion textarea{
            display:block;
            width:100%;
            outline:none;
            border:1px solid #ddd;
            padding:8px;
            transition:all .5s;
            margin-bottom:6px;
            border-radius:5px;
        }
        .nueva_publicacion input:hover,
        .nueva_publicacion textarea:hover,
        .nueva_publicacion input:focus,
        .nueva_publicacion textarea:focus{
            border:1px solid #333;
        }
        .image_publication_l{width:100px;height:100px;}
        .contenido_de_publicaciones{width:calc(100% - 20px);100%;background:#fff;border-radius:5px;position:relative;display:flex;flex-wrap:wrap;padding:10px;margin:10px;}
        .publicacion_daata{background:rgb(248, 248, 255);color:#333;padding:10px;display:inline-flex;margin:5px;border-radius:5px;width:100%;}
        .publicacion_daata .contenimg{display:block; width:25%;}
        .contenimg img{width:100%;object-fit:contain;border-radius:7px;}
        .publicacion_daata .contendata{display:block;width:75%;padding:10px;}
        .editarstyle {
            position:relative;
            bottom:0;
            left:0;
            right:0;
            background: #fff;
            width: 100%;
            max-width: 600px;
            padding: 16px;
            margin: 0;
            border-radius: 10px;
            z-index:4100;
        }
        .editarstyle .nueva_publicacion{margin:0!important;}
        .boton_editar,
        .boton_eliminar{display:inline-block;padding:10px;border-radius:5px;transition:all .5s;cursor:pointer;user-select:none;margin:5px;}
        .boton_editar:hover,
        .boton_eliminar:hover{opacity:.6;}
        .boton_editar{background:#f1c40f;color:#fff;}
        .boton_eliminar{background:#e74c3c;color:#fff;}
        .active_hoevr_editformw, .active_hoevr_editform{position:fixed;top:0;bottom:0;width:100%;left:0;right:0;z-index:4000;display:flex;justify-content:center;align-items:center;}
        .active_hoevr_editformw{background:rgba(0, 0, 0, 0.65);}
    </style>

    <script type="text/javascript">
        $("#publicaciones_c_img").change(function () {
            var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
            $("#publicaciones_c_img-i input").val(filename);
            $("#publicaciones_c_img-i").removeClass('hidden');
        });
        var form_d_new_publicad = $('form.new_publications_sd');
        form_d_new_publicad.ajaxForm({
            url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=add_new_publications_res',
            beforeSend: function() {
                form_d_new_publicad.find('.waves-effect').text('Espere..');
            },
            success: function(data) {
                if (data.status == 200) {
                    if(data.typed == "update"){
                        $("#publicaciones_c_img-i input").val("");
                        $("#publicaciones_c_img-i").addClass('hidden');
                        form_d_new_publicad.find('.waves-effect').text('Guardar');
                        $(".named"+data.id).html(data.nombre)
                        $(".descript"+data.id).html(data.detalle)
                        $(".image_dird"+data.id).html(data.img)
                        $('.new_publications_sd-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> '+data.mensaje+'</div>');
                        setTimeout(function () {
                            $('.new_publications_sd-alert').empty();
                        }, 2000);
                    }else{
                        form_d_new_publicad.find('.waves-effect').text('Guardar');
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                        $(".cont_d_publicapols").prepend(
                            '<div class="publicacion_daata publicaciondat'+data.id+'">'
                                +'<div class="contenimg image_dird'+data.id+'"><img src="'+data.img+'"></div>'
                                +'<div class="contendata">'
                                +'<h4 class="named'+data.id+'">'+data.nombre+'</h4>'
                                +'<p class="descript'+data.id+'">'+data.detalle+'</p>'
                                +'<div class="options_t">'
                                    +'<span class="boton_editar b_editar" data="'+data.id+'">Editar</span>'
                                    +'<span class="boton_eliminar b_eliminar" data="'+data.id+'">Eliminar</span>'
                                +'</div>'
                            +'</div>'
                        +'</div>')

                        form_d_new_publicad[0].reset();
                        $('.new_publications_sd-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> '+data.mensaje+'</div>');
                        setTimeout(function () {
                            $('.new_publications_sd-alert').empty();
                        }, 2000);
                    }
                }else{
                    form_d_new_publicad.find('.waves-effect').text('Guardar');
                    $('.new_publications_sd-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> '+data.mensaje+'</div>');
                    setTimeout(function () {
                        $('.new_publications_sd-alert').empty();
                    }, 2000);
                }
            }
        });
        $(document).on('click', '.b_eliminar', function(){
            var catcr = $(this).attr('data');
            $.ajax({
                type:"POST",
                url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=publicaciondat',
                data: {publication:catcr},
                success: function(data) {
                    if (data.status == 200) {
                        $('.publicaciondat'+catcr).remove();
                    }
                }
            });
        })

        $(document).on('click', '.b_editar', function(){
            $('.horpil').removeClass('horpil_active');
            $('.loader_fitsdf_s').addClass('loader_fitsdf');
            $('.new_publications_sd').addClass('editarstyle');
            $('.new_publications_sd_hovers').addClass('active_hoevr_editform');
            $('.new_publications_sd_hoversw').addClass('active_hoevr_editformw');
            var edff = $(this).attr('data');
            $('.editar_publicacion').val(edff);
            $.ajax({
                type:"POST",
                url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=publicaciondat_buscar',
                data: {publicv:edff,},
                success: function(data) {
                    if (data.status == 200) {
                        $('.loader_fitsdf_s').removeClass('loader_fitsdf');
                        $('.titulo_publication').val(data.nombre)
                        $('.texto_detalles').val(data.detalle)
                    }
                }
            });
            
        })
        $(document).on('click', '.active_hoevr_editformw', function(){
            $('.new_publications_sd').removeClass('editarstyle');
            $('.new_publications_sd_hovers').removeClass('active_hoevr_editform');
            $('.new_publications_sd_hoversw').removeClass('active_hoevr_editformw');
            $('.horpil').addClass('horpil_active');
            $('.editar_publicacion').val("");
            $('.titulo_publication').val("")
            $('.texto_detalles').val("")
        })
        $(document).on('click', '.horpil', function(){
            $('.new_publications_sd').removeClass('editarstyle');
            $('.new_publications_sd_hovers').removeClass('active_hoevr_editform');
            $('.new_publications_sd_hoversw').removeClass('active_hoevr_editformw');
            $('.horpil').addClass('horpil_active');
            $('.editar_publicacion').val("");
            $('.titulo_publication').val("")
            $('.texto_detalles').val("")
        })
    </script>
<?php elseif($wo['config']['theme']=='layshane-star'): ?>
    <?php 
    $page           = (!empty($_GET['page-id']) && is_numeric($_GET['page-id'])) ? $_GET['page-id'] : 1;
    $filter_keyword = (!empty($_GET['query'])) ? lui_Secure($_GET['query']) : '';
    $filter_type    = '';
    $db->pageLimit  = 50;
    $link = '';

    if (!empty($filter_keyword)) {
      $link .= '&query='.$filter_keyword;
      $sql   = "(`post_id` LIKE '%$filter_keyword%' OR `postText` LIKE '%$filter_keyword%')";
      $posts = $db->where($sql);
    } 
    if (!empty($_GET['range']) && in_array($_GET['range'], array('Today','Yesterday','This Week','This Month','Last Month','This Year'))) {
        if ($_GET['range'] == 'Today' || $_GET['range'] == 'Yesterday') {
            $this_start = strtotime(date('M')." ".date('d').", ".date('Y')." 12:00am");
            $this_end = strtotime(date('M')." ".date('d').", ".date('Y')." 11:59pm");
            if ($_GET['range'] == 'Yesterday') {
                $this_start = strtotime(date('M')." ".date('d',strtotime("-1 days")).", ".date('Y')." 12:00am");
                $this_end = strtotime(date('M')." ".date('d',strtotime("-1 days")).", ".date('Y')." 11:59pm");
            }
            $main_range = 'Today';
            $title = "Daily";
        }
        elseif ($_GET['range'] == 'This Week') {
            $time = strtotime(date('l').", ".date('M')." ".date('d').", ".date('Y'));

            if (date('l') == 'Saturday') {
                $this_start = strtotime(date('M')." ".date('d').", ".date('Y')." 12:00am");
            }
            else{
                $this_start = strtotime('last saturday, 12:00am', $time);
            }

            if (date('l') == 'Friday') {
                $this_end = strtotime(date('M')." ".date('d').", ".date('Y')." 11:59pm");
            }
            else{
                $this_end = strtotime('next Friday, 11:59pm', $time);
            }
            
            $main_range = 'This Week';
            $title = "Weekly";
        }
        elseif ($_GET['range'] == 'This Month' ||$_GET['range'] == 'Last Month') {
            $this_start = strtotime("1 ".date('M')." ".date('Y')." 12:00am");
            $this_end = strtotime(cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'))." ".date('M')." ".date('Y')." 11:59pm");
            if ($_GET['range'] == 'Last Month') {
                $this_start = strtotime("1 ".date('M',strtotime("-1 month"))." ".date('Y')." 12:00am");
                $this_end = strtotime(cal_days_in_month(CAL_GREGORIAN, date('m',strtotime("-1 month")), date('Y'))." ".date('M',strtotime("-1 month"))." ".date('Y')." 11:59pm");
            }
            $main_range = 'This Month';
            $title = "Monthly";
        }
        elseif ($_GET['range'] == 'This Year') {
            $this_start = strtotime("1 January ".date('Y')." 12:00am");
            $this_end = strtotime("31 December ".date('Y')." 11:59pm");
            $main_range = 'This Year';
            $title = "Yearly";
        }
    }
    $start = '';
    $end = '';
    $first_code = '';
    $second_code = '';
    if (!empty($_GET['range']) && !in_array($_GET['range'], array('Today','Yesterday','This Week','This Month','Last Month','This Year'))) {
        $arr = explode('-', $_GET['range']);
        if (preg_match('~(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d~m', $arr[0]) && preg_match('~(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d~m', $arr[1])) {
            $start = lui_Secure($arr[0]);
            $end = lui_Secure($arr[1]);
            $this_start = strtotime($start);
            $this_end = strtotime($end);
            $month_days = cal_days_in_month(CAL_GREGORIAN, date('m',strtotime($start)), date('Y',strtotime($start)));
            $diff = abs(strtotime($end) - strtotime($start));
            $years = floor($diff / (365*60*60*24));
            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
            if ($years >= 1) {
                $array = array();
                for ($i=date('Y',strtotime($start)); $i <= date('Y',strtotime($end)); $i++) { 
                    $array["'".$i."'"] = 0;
                }
                $main_range = 'Custom';
                $code = 'Y';
                $title = "Yearly";
            }
            elseif ($months >= 1) {
                $array = array('01' => 0 ,'02' => 0 ,'03' => 0 ,'04' => 0 ,'05' => 0 ,'06' => 0 ,'07' => 0 ,'08' => 0 ,'09' => 0 ,'10' => 0 ,'11' => 0 ,'12' => 0);
                $code = 'm';
                $main_range = 'This Year';
                $title = "Monthly";
                if (date('Y',strtotime($start)) == date('Y',strtotime($end))) {
                    $array = array();
                    for ($i=date('m',strtotime($start)); $i <= date('m',strtotime($end)); $i++) { 
                        $array["'".(int)$i."'"] = 0;
                    }
                    $code = 'm';
                    $main_range = 'Custom';
                }
                else{
                    $month = cal_days_in_month(CAL_GREGORIAN, date('m',strtotime($start)), date('Y',strtotime($start)));
                    $array = array();
                    for ($i=(int)date('m',strtotime($start)); $i <= 12; $i++) { 
                        $array["'".(int)$i.'-'.date('Y',strtotime($start))."'"] = 0;
                    }
                    for ($i=1; $i <= (int)date('m',strtotime($end)); $i++) { 
                        $array["'".(int)$i.'-'.date('Y',strtotime($end))."'"] = 0;
                    }
                    $first_code = 'm';
                    $second_code = 'Y';
                    $main_range = 'Custom';
                }
            }
            elseif ($days > 7) {
                if (date('m',strtotime($start)) == date('m',strtotime($end))) {
                    $array = array();
                    for ($i=date('d',strtotime($start)); $i <= date('d',strtotime($end)); $i++) { 
                        $array["'".(int)$i."'"] = 0;
                    }
                    $code = 'd';
                    $main_range = 'Custom';
                }
                else{
                    $month = cal_days_in_month(CAL_GREGORIAN, date('m',strtotime($start)), date('Y',strtotime($start)));
                    $array = array();
                    for ($i=(int)date('d',strtotime($start)); $i <= $month; $i++) { 
                        $array["'".(int)$i.'-'.date('m',strtotime($start))."'"] = 0;
                    }
                    for ($i=1; $i <= (int)date('d',strtotime($end)); $i++) { 
                        $array["'".(int)$i.'-'.date('m',strtotime($end))."'"] = 0;
                    }
                    $first_code = 'd';
                    $second_code = 'm';
                    $main_range = 'Custom';
                }
                $title = "Daily";
            }
            elseif ($days >= 1 && $days < 8) {
                $title = "Daily";
                $code = 'l';
                $array = array('Saturday' => 0 , 'Sunday' => 0 , 'Monday' => 0 , 'Tuesday' => 0 , 'Wednesday' => 0 , 'Thursday' => 0 , 'Friday' => 0);
                if (date('m',strtotime($start)) == date('m',strtotime($end))) {
                    $array = array();
                    for ($i=date('d',strtotime($start)); $i <= date('d',strtotime($end)); $i++) { 
                        $array["'".(int)$i."'"] = 0;
                    }
                    $code = 'd';
                    $main_range = 'Custom';
                }
                else{
                    $month = cal_days_in_month(CAL_GREGORIAN, date('m',strtotime($start)), date('Y',strtotime($start)));
                    $array = array();
                    for ($i=(int)date('d',strtotime($start)); $i <= $month; $i++) { 
                        $array["'".(int)$i.'-'.date('m',strtotime($start))."'"] = 0;
                    }
                    for ($i=1; $i <= (int)date('d',strtotime($end)); $i++) { 
                        $array["'".(int)$i.'-'.date('m',strtotime($end))."'"] = 0;
                    }
                    $first_code = 'd';
                    $second_code = 'm';
                    $main_range = 'Custom';
                }
            }
        }
    }


    $rang_link = $link;
    if (!empty($this_start) && !empty($this_end)) {
        $link .= "&range=".lui_Secure($_GET['range']);
        $db->where('time',$this_start,'>=')->where('time',$this_end,'<=');
    }
    $sort_link = $link;
    $sort_array = array('DESC_i' => array('id' , 'DESC'),
                        'ASC_i'  => array('id' , 'ASC'),
                        'DESC_t' => array('time' , 'DESC'),
                        'ASC_t'  => array('time' , 'ASC'),
                        'DESC_a' => array('active' , 'DESC'),
                        'ASC_a'  => array('active' , 'ASC'));
    if (!empty($_GET['sort']) && in_array($_GET['sort'], array_keys($sort_array))) {
      $link .= "&sort=".lui_Secure($_GET['sort']);
      $db->orderBy($sort_array[$_GET['sort']][0],$sort_array[$_GET['sort']][1]);
    }
    else{
        $_GET['sort'] = 'DESC_i';
        $db->orderBy('id', 'DESC');
    } 
    $posts = $db->objectbuilder()->paginate(T_POSTS, $page);

    if (($page > $db->totalPages) && !empty($_GET['page-id'])) {
      header("Location: " . lui_LoadAdminLinkSettings('manage-posts'));
      exit();
    }

    ?>

    <div class="container-fluid">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a>Inicio</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Administrar caracteristicas</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Publicaciones</li>
                </ol>
            </nav>
        </div>
        <!-- Vertical Layout -->
        <div class="row">
          <div class="col-md-3">
              <div class="card">
                  <div class="card-body">
                      <h6 class="card-title">Comentarios</h6>
                      <div class="d-flex align-items-center mb-3">
                          <div>
                              <div class="avatar">
                                  <span class="avatar-title bg-primary-bright text-primary rounded-pill">
                                      <i class="material-icons">comment</i>
                                  </span>
                              </div>
                          </div>
                          <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo lui_CountAllData('comments'); ?></div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-3">
              <div class="card">
                  <div class="card-body">
                      <h6 class="card-title">Me gusta</h6>
                      <div class="d-flex align-items-center mb-3">
                          <div>
                              <div class="avatar">
                                  <span class="avatar-title bg-info-bright text-info rounded-pill">
                                      <i class="material-icons">thumb_up</i>
                                  </span>
                              </div>
                          </div>
                          <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo lui_CountPostData('likes'); ?></div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-3">
              <div class="card">
                  <div class="card-body">
                      <h6 class="card-title">Pregunta / Disgusto</h6>
                      <div class="d-flex align-items-center mb-3">
                          <div>
                              <div class="avatar">
                                  <span class="avatar-title bg-warning-bright text-warning rounded-pill">
                                      <i class="material-icons">error</i>
                                  </span>
                              </div>
                          </div>
                          <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo lui_CountPostData('wonders'); ?></div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-3">
              <div class="card">
                  <div class="card-body">
                      <h6 class="card-title">Respuestas</h6>
                      <div class="d-flex align-items-center mb-3">
                          <div>
                              <div class="avatar">
                                  <span class="avatar-title bg-primary-bright text-primary rounded-pill">
                                      <i class="material-icons">reply</i>
                                  </span>
                              </div>
                          </div>
                          <div class="font-weight-bold ml-1 font-size-30 ml-3"><?php echo lui_CountPostData('replies'); ?></div>
                      </div>
                  </div>
              </div>
          </div>
            
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div id="dashboard-daterangepicker" class="btn btn-outline-light pull-right">
                                <?php 
                                if (!empty($_GET['range']) && in_array($_GET['range'], array('Today','Yesterday','This Week','This Month','Last Month','This Year'))) {
                                    echo $_GET['range'];
                                }else if (!empty($start) && !empty($end)){
                                    echo $_GET['range'];
                                }else{
                                    echo 'All';
                                } ?>
                            </div>
                      <h6 class="card-title">Admiinistrar & Editar Publicaciones</h6>
                        <div class="row">
                          <div class="col-md-9" style="margin-bottom:0;">
                            <form method="get" action="<?php echo lui_LoadAdminLinkSettings('administrar-publicaciones'); ?>">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                        <label class="form-label search-form">
                                            Buscar publicaciones por ID o por texto
                                          </label>
                                          <input type="text" name="query" id="query" class="form-control" value="<?php echo($filter_keyword); ?>">
                                      </div>
                                  </div>
                                </div>
                                <div class="col-md-1">
                                  <label>&nbsp;</label>
                                   <button class="btn btn-info">Buscar</button>
                                </div>
                              </div>
                              <div class="clearfix"></div>
                            </form>
                          </div>
                          <div class="col-md-3" style="margin-bottom:0;">
                            
                           </div>
                        </div>
                        <input type="hidden" id="hash_id" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <div class="clearfix"></div>
                        <div class="table-responsive1">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                 <th><input type="checkbox" id="check-all" class="filled-in check-all" ><label for="check-all"></label></th>
                                 <th>ID 
                                      <?php if (!empty($_GET['sort']) && $_GET['sort'] == 'DESC_i') { ?>
                                          <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-posts?page-id=1').$sort_link."&sort=ASC_i") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up cursor-p"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                                      <?php }else{ ?>
                                          <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-posts?page-id=1').$sort_link."&sort=DESC_i") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down cursor-p"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                                      <?php } ?></th>
                                 <th>Editor</th>
                                 <th>Url</th>
                                 <th>Publicado 
                                      <?php if (!empty($_GET['sort']) && $_GET['sort'] == 'DESC_t') { ?>
                                          <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-posts?page-id=1').$sort_link."&sort=ASC_t") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up cursor-p"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                                      <?php }else{ ?>
                                          <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-posts?page-id=1').$sort_link."&sort=DESC_t") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down cursor-p"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                                      <?php } ?></th>
                                 <th>Estado 
                                      <?php if (!empty($_GET['sort']) && $_GET['sort'] == 'DESC_a') { ?>
                                          <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-posts?page-id=1').$sort_link."&sort=ASC_a") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up cursor-p"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                                      <?php }else{ ?>
                                          <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-posts?page-id=1').$sort_link."&sort=DESC_a") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down cursor-p"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                                      <?php } ?></th>
                                 <th>Accion</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php 
                                  foreach ($posts as $post) {
                                    $wo['story'] = $post;
                                    if (!empty($post->user_id)) {
                                      $wo['story']->publisher = lui_UserData($post->user_id);
                                    }
                                    elseif (!empty($post->page_id)) {
                                      $user_page = lui_PageData($post->page_id);
                                      $wo['story']->publisher = lui_UserData($user_page['user_id']);
                                    }
                                    if ($wo['config']['useSeoFrindly'] == 1) {
                                        $wo['story']->url = lui_SeoLink('index.php?link1=post&id=' . $post->id) . '_' . lui_SlugPost($post->postText);
                                    } else {
                                        $wo['story']->url = lui_SeoLink('index.php?link1=post&id=' . $post->id);
                                    }
                                    
                                    echo lui_LoadAdminPage('administrar-publicaciones/list');
                                  }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="wo-admincp-feturepager">
                            <div class="pull-left">
                                <span>
                                  <?="Mostrar $page de " . $db->totalPages; ?>
                                </span>
                            </div>
                            <div class="pull-right">
                                <nav>
                                    <ul class="pagination">
                                        <li>
                                          <a href="<?php echo lui_LoadAdminLinkSettings('manage-posts?page-id=1').$link; ?>" data-ajax="?path=manage-posts&page-id=1<?php echo($link); ?>" class="waves-effect" title='First Page'>
                                              <i class="material-icons">first_page</i>
                                          </a>
                                        </li>
                                        <?php if ($page > 1) {  ?>
                                          <li>
                                              <a href="<?php echo lui_LoadAdminLinkSettings('manage-posts?page-id=' . ($page - 1)).$link; ?>" data-ajax="?path=manage-posts&page-id=<?php echo($page - 1) ?><?php echo($link); ?>" class="waves-effect" title='Previous Page'>
                                                  <i class="material-icons">chevron_left</i>
                                              </a>
                                          </li>
                                        <?php  } ?>

                                        <?php 
                                          $nums       = 0;
                                          $nums_pages = ($page > 4) ? ($page - 4) : $page;

                                          for ($i=$nums_pages; $i <= $db->totalPages; $i++) { 
                                            if ($nums < 20) {
                                        ?>
                                          <li class="<?php echo ($page == $i) ? 'active' : ''; ?>">
                                            <a href="<?php echo lui_LoadAdminLinkSettings('manage-posts?page-id=' . ($i)).$link; ?>" data-ajax="?path=manage-posts&page-id=<?php echo($i) ?><?php echo($link); ?>" class="waves-effect">
                                              <?php echo $i ?>   
                                            </a>
                                          </li>

                                        <?php } $nums++; }?>

                                        <?php if ($db->totalPages > $page) { ?>
                                          <li>
                                              <a href="<?php echo lui_LoadAdminLinkSettings('manage-posts?page-id=' . ($page + 1)).$link; ?>" data-ajax="?path=manage-posts&page-id=<?php echo($page + 1) ?><?php echo($link); ?>" class="waves-effect" title="Next Page">
                                                  <i class="material-icons">chevron_right</i>
                                              </a>
                                          </li>
                                        <?php } ?>
                                        <li>
                                          <a href="<?php echo lui_LoadAdminLinkSettings('manage-posts?page-id=' . ($db->totalPages)).$link; ?>" data-ajax="?path=manage-posts&page-id=<?php echo($db->totalPages) ?><?php echo($link); ?>" class="waves-effect" title='Last Page'>
                                              <i class="material-icons">last_page</i>
                                          </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-lg-2 col-md-2">
                                    <span>Accion</span>
                                    <select class="form-control show-tick" id="action_type">
                                        <option value="activate">Activar</option>
                                        <option value="deactivate">Desactivar</option>
                                        <option value="delete">Eliminar</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <span>&nbsp;</span>
                                    <button type="button" class="btn btn-info waves-effect delete-selected d-block" disabled>Confirmar<span></span></button>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModal1Label">Eliminar publicacion?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Seguro que quieres eliminar esta publicacion?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="DeleteModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModal1Label">¿Aprobar publicación?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Seguro que quieres aprobar esta publicación?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Aprobar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="SelectedDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModal1Label">Eliminar publicacion?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Está seguro de que desea eliminar las publicaciones seleccionadas?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="DeleteSelected()" data-dismiss="modal">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
    jQuery(document).ready(function($) {
            var range = { "All": [moment().startOf('year') , moment().endOf('year')],
                          "Today": [moment() , moment()], 
                          "Yesterday": [moment().subtract(1, 'days') , moment().subtract(1, 'days')], 
                          "This_Week": [moment().subtract(6, 'days') , moment()],
                          "This_Month": [moment().startOf('month') , moment().endOf('month')],
                          "Last_Month": [moment().subtract(1, 'month').startOf('month') , moment().subtract(1, 'month').endOf('month')],
                          "This_Year": [moment().subtract(1, 'year').startOf('year') , moment().subtract(1, 'year').endOf('year')]}; 
            <?php 
            if (!empty($_GET['range']) && in_array($_GET['range'], array('Today','Yesterday','This Week','This Month','Last Month','This Year'))) { 
                if ($_GET['range'] == 'Today') { ?>
                    var start = range.Today[0];
                    var end = range.Today[1];
                <?php }elseif ($_GET['range'] == 'Yesterday') { ?>
                    var start = range.Yesterday[0];
                    var end = range.Yesterday[1];
                <?php }elseif ($_GET['range'] == 'This Week') { ?>
                    var start = range.This_Week[0];
                    var end = range.This_Week[1];
                <?php }elseif ($_GET['range'] == 'This Month') { ?>
                    var start = range.This_Month[0];
                    var end = range.This_Month[1];
                <?php }elseif ($_GET['range'] == 'Last Month') { ?>
                    var start = range.Last_Month[0];
                    var end = range.Last_Month[1];
                <?php }elseif ($_GET['range'] == 'This Year') { ?>
                    var start = range.This_Year[0];
                    var end = range.This_Year[1];
                <?php } ?>
            <?php } elseif (!empty($_GET['range']) && !empty($start) && !empty($end)) { ?>
                var start = "<?php echo($start) ?>";
                var end = "<?php echo($end) ?>";
            <?php } else{ ?>
                var start = range.All[0];
                var end = range.All[1];
            <?php } ?>

            function cb(start, end) {
                //$('#dashboard-daterangepicker span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
            $('#dashboard-daterangepicker').daterangepicker({
                startDate: start,
                endDate: end,
                opens: $('body').hasClass('rtl') ? 'right' : 'left',
                ranges: {
                    'All': [moment().startOf('year') , moment().endOf('year')],
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'This Week': [moment().subtract(6, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    'This Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
                }
            }, cb);

            

            cb(start, end);

            // setTimeout(function (argument) {
            //     $('.ranges ul li').removeClass('active');
            // },800);
            
            $(document).on('click', '.ranges ul li', function(event) {
                event.preventDefault();
                if ($(this).attr('data-range-key') != 'Custom Range') {
                    $(document).off('click', '.ranges ul li');
                    $('#redirect_link').attr('href', "<?php echo lui_LoadAdminLinkSettings('manage-posts').$rang_link; ?>&range="+$(this).attr('data-range-key'));
                    $('#redirect_link').attr('data-ajax', "?path=manage-posts<?php echo('&'.$rang_link) ?>&range="+$(this).attr('data-range-key'));
                    $('#redirect_link').click();
                    //location.href = "<?php echo lui_LoadAdminLinkSettings('manage-posts').$rang_link; ?>&range="+$(this).attr('data-range-key');
                }
            });
            $(document).on('click', '.applyBtn', function(event) {
                event.preventDefault();
                $(document).off('click', '.applyBtn');
                $('#redirect_link').attr('href', "<?php echo lui_LoadAdminLinkSettings('manage-posts').$rang_link; ?>&range="+$(this).parent('.drp-buttons').find('.drp-selected').html());
                $('#redirect_link').attr('data-ajax', "?path=manage-posts<?php echo('&'.$rang_link) ?>&range="+$(this).parent('.drp-buttons').find('.drp-selected').html());
                $('#redirect_link').click();
                //location.href = "<?php echo lui_LoadAdminLinkSettings('manage-posts').$rang_link; ?>&range="+$('.drp-selected').html();
            });
    });



    $('.check-all').on('click', function(event) {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
    $('.delete-checkbox, .check-all').change(function(event) {
        $('.delete-selected').attr('disabled', false);
        $('.delete-selected').find('span').text(' (' + $('.delete-checkbox:checked').length + ')');
    });
    $('.delete-selected').on('click', function(event) {
        event.preventDefault();
        action_type = $('#action_type').val();
        $('#SelectedDeleteModal').find('.modal-body').html('Are you sure that you want to '+action_type+' the selected post(s)?');
        $('#SelectedDeleteModal').find('#exampleModal1Label').html(action_type+' post(s)');
        $('#SelectedDeleteModal').modal('show');
    });
    function DeleteSelected() {
        action_type = $('#action_type').val();
        data = new Array();
        $('td input:checked').parents('tr').each(function () {
            data.push($(this).attr('data_selected'));
        });
        $('.delete-selected').attr('disabled', true);
        $('.delete-selected').text('Please wait..');
        $.post(Wo_Ajax_Requests_File()+'?f=admin_setting&s=delete_multi_post', {ids: data,type: action_type}, function () {
            if (action_type == 'delete') {
                $.each( data, function( index, value ){
                    $('#PostID_' + value).remove();
                });
            }
            else{
                location.reload();
            }
            $('.delete-selected').text('Submit');
        });
    }
    function Wo_AdminDeletePost(post_id,type = 'show') {
        if (type == 'hide') {
          $('#DeleteModal').find('.btn-primary').attr('onclick', "Wo_AdminDeletePost('"+post_id+"')");
          $('#DeleteModal').modal('show');
          return false;
        }
        hash_id = $('#hash_id').val();
        $('#PostID_' + post_id).fadeOut(300, function() {
           $(this).remove();
        });
        $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=delete_post', {post_id:post_id, hash_id:hash_id});
    }

    function Wo_AdminApprovePost(post_id,type = 'show') {
        if (type == 'hide') {
          $('#DeleteModal2').find('.btn-primary').attr('onclick', "Wo_AdminApprovePost('"+post_id+"')");
          $('#DeleteModal2').modal('show');
          return false;
        }
        hash_id = $('#hash_id').val();
        $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=approve_post', {post_id:post_id, hash_id:hash_id}, function(data, textStatus, xhr) {
          location.reload();
        });
    }

    </script>
<?php endif ?>