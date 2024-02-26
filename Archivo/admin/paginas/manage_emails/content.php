<?php $wo['emails'] = lui_GetHtmlEmails(); ?>
<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Herramientas</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Administrar correos</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Editar correos del sistema</h6>
                    <div class="alert alert-success">Si desea agregar textos traducidos, puede usar {{clave LANG}} y reemplazar la palabra clave con la clave de Idiomas.</div>
                    <div class="add-settings-alert"></div>
                    <form class="add-settings" method="POST">
                         <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Activar cuenta (HTML permitido)</label>
                                <div class="alert alert-warning">Asegurate de agregar {{USERNAME}} , {{SITE_URL}} , {{EMAIL}} , {{CODE}} , {{SITE_NAME}} en el lugar correcto</div>
                                <textarea name="activate" id="activate" class="form-control" cols="30" rows="10"><?php echo $wo['emails']['activate'];?></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Correo de invitación (HTML permitido)</label>
                                <div class="alert alert-warning">Asegurate de agregar {{USERNAME}} , {{SITE_URL}} , {{NAME}} , {{URL}} , {{SITE_NAME}} , {{BACKGOUND_COLOR}} en el lugar correcto</div>
                                <textarea name="invite" id="invite" class="form-control" cols="30" rows="10"><?php echo $wo['emails']['invite'];?></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Iniciar sesion con (HTML permitido)</label>
                                <div class="alert alert-warning">Asegurate de agregar {{FIRST_NAME}} , {{SITE_NAME}} , {{USERNAME}} , {{EMAIL}} en el lugar correcto</div>
                                <textarea name="login_with" id="login_with" class="form-control" cols="30" rows="10"><?php echo $wo['emails']['login_with'];?></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Notificacion (HTML permitido)</label>
                                <div class="alert alert-warning">Asegurate de agregar {{SITE_NAME}} , {{NOTIFY_URL}} , {{NOTIFY_AVATAR}} , {{NOTIFY_NAME}} , {{TEXT_TYPE}} , {{TEXT}} , {{URL}} en el lugar correcto</div>
                                <textarea name="notification" id="notification" class="form-control" cols="30" rows="10"><?php echo $wo['emails']['notification'];?></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Pago rechazado (HTML permitido)</label>
                                <div class="alert alert-warning">Asegurate de agregar {{name}} , {{amount}} , {{site_name}} en el lugar correcto</div>
                                <textarea name="payment_declined" id="payment_declined" class="form-control" cols="30" rows="10"><?php echo $wo['emails']['payment_declined'];?></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Pago aprobado (HTML permitido)</label>
                                <div class="alert alert-warning">Asegurate de agregar {{name}} , {{amount}} , {{site_name}} en el lugar correcto</div>
                                <textarea name="payment_approved" id="payment_approved" class="form-control" cols="30" rows="10"><?php echo $wo['emails']['payment_approved'];?></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Recuperar (HTML permitido)</label>
                                <div class="alert alert-warning">Asegurate de agregar {{USERNAME}} , {{SITE_NAME}} , {{LINK}} en el lugar correcto</div>
                                <textarea name="recover" id="recover" class="form-control" cols="30" rows="10"><?php echo $wo['emails']['recover'];?></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Inicio de sesion inusual (HTML permitido)</label>
                                <div class="alert alert-warning">Asegurate de agregar {{USERNAME}} , {{SITE_NAME}} , {{CODE}} , {{DATE}} , {{EMAIL}} , {{COUNTRY_CODE}} , {{IP_ADDRESS}} , {{CITY} } en el lugar correcto</div>
                                <textarea name="unusual_login" id="unusual_login" class="form-control" cols="30" rows="10"><?php echo $wo['emails']['unusual_login'];?></textarea>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Cuenta eliminada (HTML permitido)</label>
                                <div class="alert alert-warning">Asegurate de agregar {{USERNAME}}, {{SITE_NAME}} en el lugar correcto</div>
                                <textarea name="account_deleted" id="account_deleted" class="form-control" cols="30" rows="10"><?php echo $wo['emails']['account_deleted'];?></textarea>
                            </div>
                        </div>
                        <br>
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
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_html_emails',
        beforeSend: function() {
            form_add_settings.find('.waves-effect').text('Por favor espere..');
        },
        beforeSubmit : function(arr, $form, options){
            for (var i = 0; i < arr.length; i++) {
                if (arr[i].name == "activate") {
                    arr[i].value = btoa(unescape(encodeURIComponent($('#activate').value=tinymce.editors[$('#activate').attr('id')].getContent())));
                }
                if (arr[i].name == 'invite') {
                    arr[i].value = btoa(unescape(encodeURIComponent($('#invite').value=tinymce.editors[$('#invite').attr('id')].getContent())));
                }
                if (arr[i].name == 'login_with') {
                    arr[i].value = btoa(unescape(encodeURIComponent($('#login_with').value=tinymce.editors[$('#login_with').attr('id')].getContent())));
                }
                if (arr[i].name == 'notification') {
                    arr[i].value = btoa(unescape(encodeURIComponent($('#notification').value=tinymce.editors[$('#notification').attr('id')].getContent())));
                }
                if (arr[i].name == 'payment_declined') {
                    arr[i].value = btoa(unescape(encodeURIComponent($('#payment_declined').value=tinymce.editors[$('#payment_declined').attr('id')].getContent())));
                }
                if (arr[i].name == 'payment_approved') {
                    arr[i].value = btoa(unescape(encodeURIComponent($('#payment_approved').value=tinymce.editors[$('#payment_approved').attr('id')].getContent())));
                }
                if (arr[i].name == 'recover') {
                    arr[i].value = btoa(unescape(encodeURIComponent($('#recover').value=tinymce.editors[$('#recover').attr('id')].getContent())));
                }
                if (arr[i].name == 'unusual_login') {
                    arr[i].value = btoa(unescape(encodeURIComponent($('#unusual_login').value=tinymce.editors[$('#unusual_login').attr('id')].getContent())));
                }
                if (arr[i].name == 'account_deleted') {
                    arr[i].value = btoa(unescape(encodeURIComponent($('#account_deleted').value=tinymce.editors[$('#account_deleted').attr('id')].getContent())));
                }
            }
        },
        success: function(data) {
            if (data.status == 200) {
                $("html, body").animate({ scrollTop: 0 }, "slow");
                $('.add-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Correos guardados con exito</div>');
            } else if (data.status == 400) {
            $('.add-settings-alert').html('<div class="alert alert-danger">'+data.message+'</div>');
                setTimeout(function () {
                    $('.add-settings-alert').empty();
                }, 2000);
          }
          form_add_settings.find('.waves-effect').text('Guardar');
        }
    });
  tinymce.init({
      selector: '#activate',
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
  tinymce.init({
      selector: '#invite',
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
  tinymce.init({
      selector: '#login_with',
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
  tinymce.init({
      selector: '#notification',
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
  tinymce.init({
      selector: '#payment_declined',
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
  tinymce.init({
      selector: '#payment_approved',
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
  tinymce.init({
      selector: '#recover',
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
  tinymce.init({
      selector: '#unusual_login',
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
  tinymce.init({
      selector: '#account_deleted',
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
});
</script>