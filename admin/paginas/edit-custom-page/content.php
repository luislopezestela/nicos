<?php
if (empty($_GET['id'])) {
   header("Location: " . $wo['config']['site_url']);
   exit();
}
$page = lui_GetCustomPage($_GET['id']);
if (empty($page)) {
   header("Location: " . $wo['config']['site_url']);
   exit();
}
?>
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
                <li class="breadcrumb-item active" aria-current="page">Editar pagina</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Editar pagina: <?php echo $page['page_title'] ?></h6>
                    <div class="add-settings-alert"></div>
                    <form class="add-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="page_name">Nombre de la página <small><?php echo $wo['config']['site_url'] . '/site-pages/NOMBRE_PAGINA'?></small></label>
                                <input type="text" id="page_name" name="page_name" class="form-control" value="<?php echo $page['page_name'];?>">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="page_title">Nombre de la página <small> El título de la página que se mostrará en el pie de página.</small></label>
                                <input type="text" id="page_title" name="page_title" class="form-control" value="<?php echo $page['page_title'];?>">
                            </div>
                        </div>
                         <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="page_content">Contenido de la página <small>El contenido de la página (HTML permitido)</small></label>
                                <textarea name="page_content" id="page_content" class="form-control" cols="30" rows="5"><?php echo br2nl($page['page_content']);?></textarea>
                            </div>
                        </div>
                        <label for="page_type">Tipo de página</label>
                        <select class="form-control show-tick " id="page_type" name="page_type">
                            <option value="1" <?php echo ($page['page_type'] == 1) ? 'selected': '';?>>Incluir fondo y encabezado</option>
                 			<option value="0" <?php echo ($page['page_type'] == 0) ? 'selected': '';?>>Pagina vacia</option>
                        </select>
                        <div class="clearfix"></div>
                        <br>
                        <input type="hidden" value="<?php echo $page['id'];?>" name="page_id">
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
    var form_add_settings = $('form.add-settings');
    form_add_settings.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=edit_page',
        beforeSend: function() {
            form_add_settings.find('.waves-effect').text('Espere..');
        },
        success: function(data) {
            if (data.status == 200) {
                $("html, body").animate({ scrollTop: 0 }, "slow");
                $('.add-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Actualizado con exito</div>');
                setTimeout(function () {
		            window.location.href = '<?php echo lui_LoadAdminLinkSettings('manage-custom-pages'); ?>';
		        }, 1000);
            } else if (data.status == 400) {
	          $('.add-settings-alert').html('<div class="alert alert-danger">'+data.message+'</div>');
                setTimeout(function () {
                    $('.add-settings-alert').empty();
                }, 2000);
	        }
	        form_add_settings.find('.waves-effect').text('Guardar');
        }
    });
});
</script>