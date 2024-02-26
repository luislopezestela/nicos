<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Paginas</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Crear nueva pagina</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Nueva pagina</h6>
                    <div class="add-settings-alert"></div>
                    <form class="add-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="page_name">Nombre de la página <small><?=$wo['config']['site_url'].'/paginas/NOMBRE_PAGINA'?></small></label>
                                <input type="text" id="page_name" name="page_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="page_title">Nombre de la página <small>El título de la página que se mostrará en el pie de página.</small></label>
                                <input type="text" id="page_title" name="page_title" class="form-control">
                            </div>
                        </div>
                         <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="page_content">Contenido de la página <small> El contenido de la página (HTML permitido)</small></label>
                                <textarea name="page_content" id="page_content" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <label for="page_type">Tipo de página</label>
                        <select class="form-control show-tick " id="page_type" name="page_type">
                            <option value="1">Incluir fondo y encabezado</option>
                            <option value="0">Pagina vacia</option>
                        </select>
                        <div class="clearfix"></div>
                        <br>
                        <input type="hidden" name="hash_id" value="<?=lui_CreateSession();?>">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Crear</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
<script>

$(function() {
    var form_add_settings = $('form.add-settings');
    form_add_settings.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=add_new_page',
        beforeSend: function() {
            form_add_settings.find('.waves-effect').text('Espere..');
        },
        success: function(data) {
            if (data.status == 200) {
                $("html, body").animate({ scrollTop: 0 }, "slow");
                $('.add-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i>Pagina creado con exito</div>');
                setTimeout(function () {
		            window.location.href = '<?=lui_LoadAdminLinkSettings('manage-custom-pages'); ?>';
		        }, 1000);
            } else if (data.status == 400) {
                $('.add-settings-alert').html('<div class="alert alert-danger">'+data.message+'</div>');
                setTimeout(function () {
                    $('.add-settings-alert').empty();
                }, 2000);
	        }
	        form_add_settings.find('.waves-effect').text('Crear');
        }
    });

    tinymce.init({
      selector: '#page_content',
      height: 270,
      images_upload_credentials: true,
      paste_data_images: true,
      image_advtab: true,
      entity_encoding : "raw",
      images_upload_url: Wo_Ajax_Requests_File() + '?f=upload-blog-image',
      toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
      toolbar2: "print preview media | forecolor backcolor emoticons",
      plugins: [
          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "insertdatetime media nonbreaking save table contextmenu directionality",
          "emoticons template paste textcolor colorpicker textpattern"
        ],
        file_picker_callback: function(callback, value, meta) {
          if (meta.filetype == 'image') {
            $('#upload').trigger('click');
            $('#upload').on('change', function() {
              var file = this.files[0];
              var reader = new FileReader();
              reader.onload = function(e) {
                callback(e.target.result, {
                  alt: ''
                });
              };
              reader.readAsDataURL(file);
            });
          }
        },
    });
});
</script>