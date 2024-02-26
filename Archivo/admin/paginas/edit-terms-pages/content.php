<?php 
if (empty($_GET['type']) || !in_array($_GET['type'], array('terms_of_use_page','privacy_policy_page','about_page','refund_terms_page'))) {
    header("Location: " . lui_SeoLink('index.php?link1=admin-cp'));
    exit();
}
$page = $db->where('lang_key',lui_Secure($_GET['type']))->getOne(T_LANGS);
?>
<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Paginas</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Editar teminos de pagina</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Editar terminos de pagina</h6>
                    <div class="add-settings-alert"></div>
                    <form class="add-settings" method="POST">
                        <?php 
                        foreach ($page as $key => $value) {
                            if (!in_array($key, array('id','lang_key','type'))  ) { ?>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label"><?php echo(ucfirst($key)) ?> (HTML permitido)</label>
                                <textarea name="<?php echo($key); ?>" id="<?php echo($key); ?>" class="form-control" cols="30" rows="10"><?php echo $value;?></textarea>
                            </div>
                        </div>
                        <br>
                        <?php } }  ?>
                        <input type="hidden" name="lang_key" value="<?php echo $page->lang_key;?>">
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
    <?php 
    foreach ($page as $key => $value) {
        if (!in_array($key, array('id','lang_key','type'))  ) { ?>
    tinymce.init({
          selector: '#<?php echo($key); ?>',
          height: 270,
          entity_encoding : "raw",
          paste_data_images: true,
          image_advtab: true,
          toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
          toolbar2: "print preview media | forecolor backcolor",
          plugins: [
              "advlist autolink lists link image charmap print preview hr anchor pagebreak",
              "searchreplace wordcount visualblocks visualchars code fullscreen",
              "insertdatetime media nonbreaking save table contextmenu directionality",
              "template paste textcolor colorpicker textpattern"
            ],
    });
    <?php } }  ?>
    var form_add_settings = $('form.add-settings');
    form_add_settings.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_terms_setting',
        beforeSend: function() {
            form_add_settings.find('.waves-effect').text('Por favor espere..');
        },
        beforeSubmit : function(arr, $form, options){
            for (var i = 0; i < arr.length; i++) {
                if (arr[i].name != "hash_id" && arr[i].name != "lang_key") {
                    arr[i].value = btoa(unescape(encodeURIComponent($("#"+arr[i].name).value=tinymce.editors[$("#"+arr[i].name).attr('id')].getContent())));
                }
            }
        },
        success: function(data) {
            if (data.status == 200) {
                $("html, body").animate({ scrollTop: 0 }, "slow");
                $('.add-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Pagina guardado con exito</div>');
                location.reload()
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