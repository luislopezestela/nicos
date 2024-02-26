<?php
$code                  = lui_CustomCode('g');
$error                 = "";

$final_array['HEADER'] = (
    (isset($code[0]) && trim(strlen($code[0])) > 0) ? $code[0] : ''
);

$final_array['FOOTER'] = (
    (isset($code[1]) && trim(strlen($code[1])) > 0) ? $code[1] : ''
);

$final_array['STYLE']  = (
    (isset($code[2]) && trim(strlen($code[2])) > 0) ? $code[2] : ''
);
?>
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
                <li class="breadcrumb-item active" aria-current="page">JS/CSS personalizado</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">JS/CSS personalizado</h6>
                    <div class="ads-settings-alert"></div>
                    <form class="ads-settings" method="POST">
                        <div class="form-group">
                        	<label class="form-label">Encabezado JavaScript personalizado</small></label>
                            <textarea name="cheader" id="cheader-js" class="form-control"><?php echo $final_array['HEADER']?></textarea>
                        </div>
                       <div class="form-group">
                        	<label class="form-label">Pie de página JavaScript personalizado</small></label>
                            <textarea name="cfooter" id="fheader-js" class="form-control"><?php echo $final_array['FOOTER']?></textarea>
                        </div>
                        <div class="form-group">
                        	<label class="form-label">Estilo CSS de encabezado</small></label>
                            <textarea name="css" id="custom-css" class="form-control"><?php echo $final_array['STYLE']?></textarea>
                        </div>
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
    var readOnlyCodeMirror = CodeMirror.fromTextArea(document.getElementById('cheader-js'), {
         mode: "javascript",
         theme: "default",
         lineNumbers: true,
         readOnly: false
      });

      var readOnlyCodeMirror = CodeMirror.fromTextArea(document.getElementById('fheader-js'), {
         mode: "javascript",
         theme: "default",
         lineNumbers: true,
         readOnly: false
      });

      var readOnlyCodeMirror = CodeMirror.fromTextArea(document.getElementById('custom-css'), {
         mode: "css",
         theme: "default",
         lineNumbers: true,
         readOnly: false
      });   
    form_ads_settings.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_custom_code',
        beforeSend: function() {
            form_ads_settings.find('.waves-effect').text('Espere por favor..');
        },
        beforeSubmit : function(arr, $form, options){
            console.log(arr)
            for (var i = 0; i < arr.length; i++) {
                if (arr[i].name != "hash_id" && arr[i].name != "lang_key") {
                    arr[i].value = btoa(arr[i].value);
                }
            }
        },
        success: function(data) {
        	if (data.status == 200) {
                $('.ads-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Tus cambios se han guardado con éxito</div>');
                setTimeout(function () {
                    $('.ads-settings-alert').empty();
                }, 2000);
	           }
	           else if (data.status == 400) {
                $('.ads-settings-alert').html('<div class="alert alert-danger">¡Por favor comprueba tus detalles!</div>');
                setTimeout(function () {
                    $('.ads-settings-alert').empty();
                }, 2000);
	           }
	           else if (data.status == 500) {
                   $('.ads-settings-alert').html('<div class="alert alert-danger">No se pueden guardar los cambios. temas/{{CONFIG theme}}/directorio personalizado ¡no se puede escribir!</div>');
                    setTimeout(function () {
                        $('.ads-settings-alert').empty();
                    }, 2000);
	           }
	           form_ads_settings.find('.waves-effect').text('Guardar');
              $("html, body").animate({ scrollTop: 0 }, "slow");
        }
    });
});
</script>