<link href="<?php echo lui_LoadAdminLink('vendors/colorpicker/css/bootstrap-colorpicker.css'); ?>" rel="stylesheet">
<script src="<?php echo lui_LoadAdminLink('vendors/colorpicker/js/bootstrap-colorpicker.js'); ?>"></script>
<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Diseño</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Cambiar el diseño del sitio</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Cambiar el diseño del sitio</h6>
                    <hr>
                    <form class="d-settings" method="POST">
						<div class="btn-file d-flex align-items-center">
							<input type="file" id="favicon" accept="image/x-png, image/gif, image/jpeg" name="favicon" class="hidden">
							<div class="mr-3 change-file-ico">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16.5,6V17.5A4,4 0 0,1 12.5,21.5A4,4 0 0,1 8.5,17.5V5A2.5,2.5 0 0,1 11,2.5A2.5,2.5 0 0,1 13.5,5V15.5A1,1 0 0,1 12.5,16.5A1,1 0 0,1 11.5,15.5V6H10V15.5A2.5,2.5 0 0,0 12.5,18A2.5,2.5 0 0,0 15,15.5V5A4,4 0 0,0 11,1A4,4 0 0,0 7,5V17.5A5.5,5.5 0 0,0 12.5,23A5.5,5.5 0 0,0 18,17.5V6H16.5Z"></path></svg>
							</div>
							<div>
								<b>Favicon</b>
								<div class="mt-1 hidden" id="favicon-i">
									<input type="text" class="change-file-input" readonly="" id="change-file-inputsfg">
								</div>
							</div>
						</div>
						<div class="clearfix"></div><br>
						<div class="btn-file d-flex align-items-center">
							<input type="file" id="logo" accept="image/x-png, image/gif, image/jpeg, image/webp" name="logo" class="hidden">
							<div class="mr-3 change-file-ico">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z"></path></svg>
							</div>
							<div>
								<b>Logo (470x75)</b>
								<div class="mt-1 hidden" id="logo-i">
									<input type="text" class="change-file-input" readonly="" id="change-file-inputss">
								</div>
							</div>
						</div>
                        <div class="clearfix"></div><br>
                        <div class="btn-file d-flex align-items-center">
                            <input type="file" id="icono" accept="image/x-png, image/gif, image/jpeg, image/webp" name="icono" class="hidden">
                            <div class="mr-3 change-file-ico">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z"></path></svg>
                            </div>
                            <div>
                                <b> Logo pequeño para celular (Heigh max 45px - width max 200px)</b>
                                <div class="mt-1 hidden" id="icono-i">
                                    <input type="text" class="change-file-input" readonly="" id="change-file-inputss">
                                </div>
                            </div>
                        </div>
						<div class="clearfix"></div><br><br>
                        <h5>Encabezamiento</h5><hr>
						<br>
                    	<div class="bold">Color de fondo del encabezado</div>
                        <div class="input-group colorpicker colorpicker-element">
                            <div class="form-line">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['header_background'] ?>" name="header_background">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>

                        <div class="bold">Iconos de encabezado/color de texto</div>
                        <div class="input-group colorpicker colorpicker-element">
                            <div class="form-line">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['header_color'] ?>" name="header_color">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>
                        <div class="bold">Color de fondo de buscador de Header</div>
                        <div class="input-group colorpicker colorpicker-element">
                            <div class="form-line">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['header_search_color'] ?>" name="header_search_color">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>

                        <div class="bold">Color de texto de buscador de Header</div>
                        <div class="input-group colorpicker colorpicker-element">
                            <div class="form-line">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['header_search_color_text'] ?>" name="header_search_color_text">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>

                        <div class="bold">Iconos de encabezado Color de sombra</div>
                        <div class="input-group colorpicker colorpicker-element">
                            <div class="form-line">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['header_button_shadow'] ?>" name="header_button_shadow">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>
                        <?php if($wo['config']['theme']=='restaurante-star'): ?>
                        <div class="clearfix"></div><br>
                        <h5>Portada</h5>
                        <div class="btn-file d-flex align-items-center">
                            <input type="file" id="portada" accept="image/x-png, image/gif, image/jpeg, image/webp" name="portada" class="hidden">
                            <div class="mr-3 change-file-ico">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z"></path></svg>
                            </div>
                            <div>
                                <b>Portada Presentacion</b>
                                <div class="mtp-1 hidden" id="portada-i">
                                    <input type="text" class="change-file-input" readonly="" id="change-file-inputsso">
                                </div>
                            </div>
                        </div>
                        
                        <div class="clearfix"></div><br>
                        <br><h5>Slogan y Titulo portada</h5><hr>
                        <div class="bold">Slogan</div>
                        <div class="input-group">
                            <div class="form-line" style="width:100%;">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['slogan'] ?>" name="slogan" style="width:100%;">
                            </div>
                        </div>
                        <div class="bold">Titulo portada</div>
                        <div class="clearfix"></div><br>
                        <div class="input-group">
                            <div class="form-line" style="width:100%;">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['titulo_b'] ?>" name="titulo_b" style="width:100%;">
                            </div>
                        </div>

                        <div class="clearfix"></div><br>
                        <br><h5>Caracterisicas</h5><hr>
                        <div class="bold">Nombre</div>
                        <div class="input-group">
                            <div class="form-line" style="width:100%;max-width:300px;">
                                <input type="text" class="form-control caracteristica_ist" style="width:100%;" autocomplete="off" id="carci">
                            </div>
                            <span class="add_caracterristic">Agregar</span>
                        </div>
                        <?php $caracterist = lui_caracteristicas(); ?>
                        <div class="caracteristica_conten">
                            <?php foreach ($caracterist as $ca): ?>
                                <span class="caracteristicas caracterist<?=$ca['id'];?>"><?=$ca['nombre'];?><i class="delete_caract" data="<?=$ca['id'];?>">X</i></span>
                            <?php endforeach ?>
                        </div>
                        <style type="text/css">
                            .beneficios_conten{white-space:nowrap;overflow-x:auto;padding-bottom:15px;user-select:none;display:flex;width:100%;margin-top:10px;}
                            .caracteristica_conten{width:100%;position:relative;display:block;margin-top:10px;}
                            .caracteristicas{border-radius:9px;border:1px solid #ddd;padding:8px 5px;display:inline-flex;cursor:default;user-select:none;}
                            .beneficio i{background:red;border-radius:10px;right:5px;color:#fff;height:20px;width:20px;display:flex;justify-content:space-evenly;font-family:arial;cursor:pointer;margin-left:10px;top:5px;position:absolute;}
                            .caracteristicas i{background:red;border-radius:10px;right:0;color:#fff;height:20px;width:20px;display:flex;justify-content:space-evenly;font-family:arial;cursor:pointer;margin-left:10px;}
                            .add_beneficio,.add_caracterristic{display:flex;border-radius:5px;background:green;padding:8px 7px;color:#FAFAFA;margin-left:5px;cursor:pointer;user-select:none;transition:all .5s;}
                            .add_beneficio:hover,.add_caracterristic:hover{opacity:.8;}
                            .image_beneficio{border:2px solid #ddd;border-radius:4px;max-width:350px;padding:10px}
                            .beneficio{width:100px;height:100px;border:2px solid #ddd;display:inline-flex;position:relative;justify-content:center;align-items:center;border-radius:5px;flex-wrap:wrap;margin:5px}
                            .beneficio img{width:50px;height:50px;display:block;border-radius:50%;}
                            .beneficio span{width:100%;text-align:center;overflow:auto;}
                        </style>
                        <div class="clearfix"></div><br>
                        <br><h5>Beneficios</h5><hr>
                        <div class="image_beneficio">
                            <div class="btn-file d-flex align-items-center">
                                <input type="file" id="beneficio_img" accept="image/x-png, image/gif, image/jpeg, image/webp" class="hidden">
                                <div class="mr-3 change-file-ico">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z"></path></svg>
                                </div>
                                <div>
                                    <b>Imagen</b>
                                    <div class="mt-1 hidden" id="beneficio_img-i">
                                        <input type="text" class="change-file-input" readonly="" id="change-file-inputssy">
                                    </div>
                                </div>
                            </div>
                        
                            <div class="bold">Nombre</div>
                            <div class="input-group">
                                <div class="form-line" style="width:100%;max-width:300px;">
                                    <input type="text" class="form-control beneficio_ist" style="width:100%;" autocomplete="off" id="bencs">
                                </div><br><br>
                                <span class="add_beneficio">Agregar</span>
                            </div>
                        </div>
                        <?php $beneficioss = lui_beneficios(); ?>
                        <div class="beneficios_conten">
                            <?php foreach ($beneficioss as $ben): ?>
                                <span class="beneficio beneficio_dps<?=$ben['id'];?>">
                                    <img src="<?=$wo['config']['theme_url'].'/img/beneficios/'.$ben['imagen']; ?>">
                                    <span><?=$ben['nombre'];?><i class="delete_beneficio" data="<?=$ben['id'];?>">X</i></span>
                                </span>
                            <?php endforeach ?>
                        </div>

                        <div class="clearfix"></div><br>
                        <br><h5>Presentacion 1</h5><hr>

                        <div class="btn-file d-flex align-items-center">
                            <input type="file" id="presentacion" accept="image/x-png, image/gif, image/jpeg, image/webp" name="imagenpresentacion_d" class="hidden">
                            <div class="mr-3 change-file-ico">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z"></path></svg>
                            </div>
                            <div>
                                <b>Imagen Presentacion 1</b>
                                <div class="mtp-1 hidden" id="presentacion-i">
                                    <input type="text" class="change-file-input" readonly="" id="change-file-inputsspresent">
                                </div>
                            </div>
                        </div>

                        <div class="bold">Nombre presentacion</div>
                        <div class="input-group">
                            <div class="form-line" style="width:100%;max-width:300px;">
                                <input type="text" name="texto_uno_presentacion" class="form-control beneficio_ist" value="<?php echo $wo['config']['texto_uno_presentacion'] ?>" style="width:100%;" autocomplete="off" id="one_text_mini">
                            </div><br><br>
                        </div>
                        <div class="bold">Titulo Presentacion</div>
                        <div class="input-group">
                            <div class="form-line" style="width:100%;max-width:300px;">
                                <input type="text" name="texto_dos_presentacion" class="form-control beneficio_ist" style="width:100%;" autocomplete="off" id="two_text_por" value="<?php echo $wo['config']['texto_dos_presentacion'] ?>">
                            </div><br><br>
                        </div>
                        <div class="bold">Descripcion Presentacion</div>
                        <div class="input-group">
                            <div class="form-line" style="width:100%;max-width:300px;">
                                <textarea class="form-control beneficio_ist" style="width:100%;" name="texto_descripcion_presentacion" id="thee_text_por"><?php echo $wo['config']['texto_descripcion_presentacion'] ?></textarea>
                            </div><br><br>
                        </div>
                        <?php endif ?>


                        <div class="clearfix"></div><br>
                        <br><h5>Body</h5><hr>
                        <div class="bold">Color de fondo del Body</div>
                        <div class="input-group colorpicker colorpicker-element">
                            <div class="form-line">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['body_background'] ?>" name="body_background">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>
                        <br><h5>Botones</h5><hr>
                        <div class="bold">Color de texto</div>
                        <div class="input-group colorpicker colorpicker-element">
                            <div class="form-line">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['btn_color'] ?>" name="btn_color">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>
                        <div class="bold">Color de fondo</div>
                        <div class="input-group colorpicker colorpicker-element">
                            <div class="form-line">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['btn_background_color'] ?>" name="btn_background_color">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>
                        <div class="bold">Color del texto flotante</div>
                        <div class="input-group colorpicker colorpicker-element">
                            <div class="form-line">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['btn_hover_color'] ?>" name="btn_hover_color">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>
                        <div class="bold">Color de fondo flotante</div>
                        <div class="input-group colorpicker colorpicker-element">
                            <div class="form-line">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['btn_hover_background_color'] ?>" name="btn_hover_background_color">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>
                        <div class="bold">Color de fondo deshabilitado</div>
                        <div class="input-group colorpicker colorpicker-element">
                            <div class="form-line">
                                <input type="text" class="form-control" value="<?php echo $wo['config']['btn_disabled'] ?>" name="btn_disabled">
                            </div>
                            <span class="input-group-addon">
                                <i></i>
                            </span>
                        </div>
                        <br>
                        <div class="alert alert-info">Asegurese de limpiar la memoria cache de su navegador despues de cambiar la configuracion de diseño.</div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <div class="d-settings-alert"></div>
                        <br>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
<script>
$(function() {
	$('.colorpicker').colorpicker();
	$("#background-image").change(function () {
         var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
         $("#background-image-i input").val(filename);
         $("#background-image-i").removeClass('hidden');
    });
    $("#favicon").change(function () {
         var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
         $("#favicon-i input").val(filename);
         $("#favicon-i").removeClass('hidden');
    });
    $("#logo").change(function () {
         var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
         $("#logo-i input").val(filename);
         $("#logo-i").removeClass('hidden');
    });
    $("#icono").change(function () {
         var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
         $("#icono-i input").val(filename);
         $("#icono-i").removeClass('hidden');
    });
    $("#portada").change(function () {
         var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
         $("#portada-i input").val(filename);
         $("#portada-i").removeClass('hidden');
    });
    $("#beneficio_img").change(function () {
         var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
         $("#beneficio_img-i input").val(filename);
         $("#beneficio_img-i").removeClass('hidden');
    });

    $("#presentacion").change(function () {
         var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
         $("#presentacion-i input").val(filename);
         $("#presentacion-i").removeClass('hidden');
    });
    var form_d_settings = $('form.d-settings');
    form_d_settings.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_design_setting',
        beforeSend: function() {
            form_d_settings.find('.waves-effect').text('Espere por favor..');
        },
        success: function(data) {
            if (data.status == 200) {
                form_d_settings.find('.waves-effect').text('Guardar');
                $("html, body").animate({ scrollTop: 0 }, "slow");
                $('.d-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Configuracion actualizada con exito</div>');
                setTimeout(function () {
                    $('.d-settings-alert').empty();
                }, 2000);
            }
        }
    });

    $(document).on('click', '.add_caracterristic', function(){
        var catcr = $('.caracteristica_ist').val();
        $.ajax({
            type:"POST",
            url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=caracteristicas_d',
            data: {caracteristica:catcr},
            beforeSend: function() {
                $('.add_caracterristic').html('Espere..');
            },
            success: function(data) {
                if (data.status == 200) {
                    $('.add_caracterristic').html('Agregar');
                    $('.caracteristica_conten').prepend('<span class="caracteristicas">'+catcr+'<i class="delete_caract" data="'+data.id+'">X</i></span>');
                    $('.caracteristica_ist').val("");
                }
            }
        });
    })
    $(document).on('click', '.delete_caract', function(){
        var catcr = $(this).attr('data');
        $.ajax({
            type:"POST",
            url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=caracteristicas_dps',
            data: {caracteristica:catcr},
            success: function(data) {
                if (data.status == 200) {
                    $('.caracterist'+catcr).remove();
                }
            }
        });
    })

    $(document).on('click', '.add_beneficio', function(){
        var benef = $('.beneficio_ist').val();
        let files = new FormData();
        files.append('img', $('#beneficio_img')[0].files[0]);
        files.append('beneficio', benef);
        $.ajax({
            type:"POST",
            mimeType: 'multipart/form-data',
            url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=beneficios_df',
            processData: false,
            contentType: false,
            data: files,
            dataType: 'json',
            beforeSend: function() {
                $('.add_beneficio').html('Espere..');
            },
            success: function(data){
                if (data.status == 200) {
                    $('.add_beneficio').html('Agregar');
                    $('.beneficios_conten').prepend('<span class="beneficio beneficio_dps'+data.id+'">'
                        +'<img src="'+data.img+'">'
                        +'<span>'+benef+'<i class="delete_beneficio" data="'+data.id+'">X</i></span>'
                        +'</span>');
                    document.getElementById('beneficio_img').value = "";
                    $('#beneficio_img-i').addClass("hidden");
                    $('.beneficio_ist').val("");
                }
            }
        });
    })

    $(document).on('click', '.delete_beneficio', function(){
        var catcr = $(this).attr('data');
        $.ajax({
            type:"POST",
            url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=beneficio_dps',
            data: {beneficio:catcr},
            success: function(data) {
                if (data.status == 200) {
                    $('.beneficio_dps'+catcr).remove();
                }
            }
        });
    })
    
});
</script>
<style type="text/css">
	.btn-file { position: relative; overflow: hidden;cursor: pointer;}
	.btn-file input[type=file] { position: absolute; top: 0; right: 0; min-width: 100%; min-height: 100%; font-size: 100px; text-align: right; opacity: 0; outline: none; background: #fff; cursor: inherit; display: block; }
	.change-file-ico svg {border-radius: 50%;background: rgb(168 72 73 / 15%);color: <?php echo $wo['config']['btn_background_color'];?>;padding: 10px;width: 50px;height: 50px;}
	.change-file-input {padding: 3px 6px;border: 0;line-height: 1;background: rgb(0 0 0 / 10%);border-radius: 2em;font-size: 13px;width: 100%;}
	.colorpicker {z-index: 0 !important;}
</style>