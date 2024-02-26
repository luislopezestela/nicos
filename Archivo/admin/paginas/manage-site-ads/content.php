<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Anuncion</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Administrar anuncios del sitio</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Administrar anuncios del sitio</h6>
                    
                    <form class="ads-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Encabezamiento </label>
                                <textarea name="header" id="header" class="form-control" cols="30" rows="5"><?php echo lui_GetAd('header', true);?></textarea>
                                <small class="admin-info">Aparece en todas las paginas justo debajo de la barra de navegacion (HTML permitido)</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Barra lateral</label>
                                <textarea name="sidebar" id="sidebar" class="form-control" cols="30" rows="5"><?php echo lui_GetAd('sidebar', true);?></textarea>
                                <small class="admin-info">Aparece en la parte inferior de la barra lateral de inicio (HTML permitido)</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Pie de pagina </label>
                                <textarea name="footer" id="footer" class="form-control" cols="30" rows="5"><?php echo lui_GetAd('footer', true);?></textarea>
                                <small class="admin-info">Aparece en todas las paginas justo antes del pie de pagina (HTML permitido)</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Publicaciones 1</label>
                                <textarea name="post_first" id="post_first" class="form-control" cols="30" rows="5"><?php echo lui_GetAd('post_first', true);?></textarea>
                                <small class="admin-info">Aparece despues de que se cargan 10 publicaciones, entre las publicaciones (HTML permitido)</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Publicaciones 2</label>
                                <textarea name="post_second" id="post_second" class="form-control" cols="30" rows="5"><?php echo lui_GetAd('post_second', true);?></textarea>
                                <small class="admin-info">Aparece despues de que se cargan 20 publicaciones, entre las publicaciones (HTML permitido)</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Publicaciones 3</label>
                                <textarea name="post_third" id="post_third" class="form-control" cols="30" rows="5"><?php echo lui_GetAd('post_third', true);?></textarea>
                                <small class="admin-info">Aparece despues de que se cargan 30 publicaciones, entre las publicaciones (HTML permitido)</small>
                            </div>
                        </div>
                        <div class="ads-settings-alert"></div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
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
    var form_ads_settings = $('form.ads-settings');
    form_ads_settings.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_ads',
        beforeSend: function() {
            form_ads_settings.find('.waves-effect').text('Por favor espere..');
        },
        beforeSubmit : function(arr, $form, options){
            for (var i = 0; i < arr.length; i++) {
                if (arr[i].name == "header") {
                    arr[i].value = btoa(unescape(encodeURIComponent($('#header').val())));
                }
                if (arr[i].name == 'footer') {
                    arr[i].value = btoa(unescape(encodeURIComponent($('#footer').val())));
                }
                if (arr[i].name == 'sidebar') {
                    arr[i].value = btoa(unescape(encodeURIComponent($('#sidebar').val())));
                }
                if (arr[i].name == 'post_first') {
                    arr[i].value = btoa(unescape(encodeURIComponent($('#post_first').val())));
                }
                if (arr[i].name == 'post_second') {
                    arr[i].value = btoa(unescape(encodeURIComponent($('#post_second').val())));
                }
                if (arr[i].name == 'post_third') {
                    arr[i].value = btoa(unescape(encodeURIComponent($('#post_third').val())));
                }
            }
          // delete arr[0];
          // delete arr[1];
          // delete arr[2];
          // delete arr[3];
          // delete arr[4];
          // delete arr[5];
          // arr.push({name:'header', value:btoa(unescape(encodeURIComponent($('#header').val())))});
          // arr.push({name:'sidebar', value:btoa(unescape(encodeURIComponent($('#sidebar').val())))}); 
          // arr.push({name:'footer', value:btoa(unescape(encodeURIComponent($('#footer').val())))}); 
          // arr.push({name:'post_first', value:btoa(unescape(encodeURIComponent($('#post_first').val())))}); 
          // arr.push({name:'post_second', value:btoa(unescape(encodeURIComponent($('#post_second').val())))}); 
          // arr.push({name:'post_third', value:btoa(unescape(encodeURIComponent($('#post_third').val())))}); 
        },
        success: function(data) {
            if (data.status == 200) {
                form_ads_settings.find('.waves-effect').text('Save');
                $("html, body").animate({ scrollTop: 0 }, "slow");
                $('.ads-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Anuncios actualizados correctamente</div>');
                setTimeout(function () {
                    $('.ads-settings-alert').empty();
                }, 2000);
            }
        }
    });
});
</script>