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
                <li class="breadcrumb-item active" aria-current="page">Notificaciones masivas</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Enviar notificaciones del sitio a los usuarios</h6>
                    <div id="alert"></div>
                    <form class="mass-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">URL</label>
                                <input type="text" id="url" name="url" class="form-control">
                                <small class="admin-info">¿Hacia donde desea apuntar esta notificacion? Se requiere URL.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Texto de notificacion</label>
                                <textarea name="description" id="description" class="form-control" cols="30" rows="5"></textarea>
                                <small class="admin-info">Escribe el cuerpo de tu notificacion.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label" id="mailing-selected-users">Usuarios seleccionados</label>
                                <input type="text" class="form-control" id="username" onkeydown="Wo_GetNotifiedUsers(this.value)" autocomplete="off">
                                <small class="admin-info">Si se deja vacio, la notificacion se enviara a todos los usuarios.</small>
                            </div>
                        </div>
                        <div class="notifications-users-list"></div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <input type="reset" class="hidden">
                        <input type="text" name="notifc-users" class="hidden" id="notifc-users">
                        <input type="reset" id="reset-notif-form" class="hidden">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Enviar notificacion</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
        	<div class="notif-selected-users card hidden"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
<script>
jQuery(document).ready(function($) {

      $('.mass-settings').ajaxForm({
         url: Wo_Ajax_Requests_File() + '?f=notifications&s=send',
         type:"POST",
         dataType:'json',
         beforeSend: function() {
           $('.mass-settings').find('button').text('Por favor espere..');
         },
         success: function(data) {
           if (data['status'] == 200) {
             $("#alert").html('<div class="alert alert-success">'+ data['message'] +'</div>');
             $(".notifications-users-list").empty();
             $(".notif-selected-users").empty();
             $(".notif-selected-users").addClass('hidden');
           } else if (data['status'] == 304) {
             $("#alert").html('<div class="alert alert-danger">'+ data['message'] +'</div>');
           } 
           $('.mass-settings').find('button').text('Enviar notificaciones');
      }});
   });

  var notified_user_ids = [];

   function Wo_GetNotifiedUsers(self){

      if (!self || $("#sendforall").is(':checked')) {
         $(".notifications-users-list").empty();
         return false;
      }
      $.ajax({
         url: Wo_Ajax_Requests_File() + "?f=notifications&s=get-users",
         type: 'POST',
         data: {name: $('#username').val()},
      })
      .done(function(data) {
         if (data.status == 200) {
            $(".notifications-users-list").html(data.html);
         }
         else{
            $(".notifications-users-list").empty();
         }
      })
      .fail(function() {
         console.log("error");
      })  
   }

   function Wo_AddNotifiedUser(user_id,self){
      if (user_id && self && !Wo_IsNotifiedUserExists(user_id)) {
         notified_user_ids.push(user_id);
         $(".notif-selected-users").append('<p id="'+user_id+'">'+$(self).find('span').text()+'</p>').removeClass('hidden');
         $("#notifc-users").val(notified_user_ids.join());
         $(self).remove();
      }
   }

   function Wo_IsNotifiedUserExists(user_id){
      if (!user_id) {
         return false;
      }
      return $(".notif-selected-users").find('p[id="'+user_id+'"]').length > 0;

   }
</script>
</script>