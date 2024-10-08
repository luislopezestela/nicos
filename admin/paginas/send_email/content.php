<?php
$week_end = time() - (60 * 60 * 24 * 7);
$week_start = time() - (60 * 60 * 24 * 14);
$week_users = $db->where('lastseen',$week_start,'>=')->where('lastseen',$week_end,'<=')->getValue(T_USERS,'COUNT(*)');

$month_end = time() - (60 * 60 * 24 * 30);
$month_start = time() - (60 * 60 * 24 * 60);
$month_users = $db->where('lastseen',$month_start,'>=')->where('lastseen',$month_end,'<=')->getValue(T_USERS,'COUNT(*)');

$month_end3 = time() - (60 * 60 * 24 * 61);
$month_start3 = time() - (60 * 60 * 24 * 150);
$month_users3 = $db->where('lastseen',$month_start3,'>=')->where('lastseen',$month_end3,'<=')->getValue(T_USERS,'COUNT(*)');

$month_end6 = time() - (60 * 60 * 24 * 151);
$month_start6 = time() - (60 * 60 * 24 * 210);
$month_users6 = $db->where('lastseen',$month_start6,'>=')->where('lastseen',$month_end6,'<=')->getValue(T_USERS,'COUNT(*)');

$month_end9 = time() - (60 * 60 * 24 * 211);
$month_start9 = time() - (60 * 60 * 24 * 300);
$month_users9 = $db->where('lastseen',$month_start9,'>=')->where('lastseen',$month_end9,'<=')->getValue(T_USERS,'COUNT(*)');

$year_end = time() - (60 * 60 * 24 * 365);
$year_users = $db->where('lastseen',$year_end,'<=')->getValue(T_USERS,'COUNT(*)');
?>
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
                <li class="breadcrumb-item active" aria-current="page">Enviar correo</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Enviar correos a los usuarios</h6>
                    <div id="alert"></div>
                    <form class="mailing-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Sujeto</label>
                                <input type="text" id="subject" name="subject" class="form-control">
                                <small class="admin-info">Elija el titulo para su mensaje.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Mensaje (HTML permitido)</label>
                                <textarea name="message" id="message" class="form-control" cols="30" rows="10"></textarea>
                                <small class="admin-info">Escriba su mensaje aqui.</small>
                            </div>
                        </div>
                        <label for="send_to">Enviar el correo a</label>
                        <select class="form-control show-tick" id="send_to" name="send_to">
                            <option value="all">Todos los usuarios</option>
                            <option value="active">Todos los usuarios activos</option>
                            <option value="inactive">Todos los usuarios inactivos</option>
                            <option value="week">Usuarios que no iniciaron sesion durante una semana ----- aproximadamente (<?php echo $week_users; ?> Usuario)</option>
                            <option value="month">Usuarios que no iniciaron sesion durante un mes ----- aproximadamente (<?php echo $month_users; ?> Usuario)</option>
                            <option value="3month">Usuarios que no iniciaron sesion durante 3 meses ----- aproximadamente (<?php echo $month_users3; ?> Usuario)</option>
                            <option value="6month">Usuarios que no iniciaron sesion durante 6 meses ----- aproximadamente (<?php echo $month_users6; ?> Usuario)</option>
                            <option value="9month">Usuarios que no iniciaron sesion durante 9 meses ----- aproximadamente (<?php echo $month_users9; ?> Usuario)</option>
                            <option value="year">Usuarios que no iniciaron sesion durante un año ----- aproximadamente (<?php echo $year_users; ?> Usuario)</option>
                        </select>
                        <div class="clearfix"></div>
                        <br>
                        <div class="form-group form-float selected_users_div" style="display:none;">
                            <div class="form-line">
                                <label class="form-label" id="mailing-selected-users">Usuarios seleccionados</label>
                                <input value="" data-role="tagsinput sometext" id="selected_users" name="selected_emails" readonly>
                            </div>
                        </div>
                        <small class="admin-info">Elija el tipo de usuarios a los que desea enviar el mensaje.</small>
                        <div class="clearfix"></div>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label" id="mailing-selected-users">Buscar usuarios (opcional) <span></span></label>
                                <input type="text" class="form-control" oninput="Wo_SearchMailingUsers(this.value)" autocomplete="off">
                                <small class="admin-info">Enviar solo a esos usuarios, dejelo vacio para enviar a todos los usuarios.</small>
                            </div>
                        </div>
                        <div class="search-mailing-users hidden"></div>
                        <div class="form-group">
                          <label for="test_message">Mensaje de prueba (Enviar primero a mi correo electronico)</label>
                           <input type="checkbox" id="test_message" class="filled-in" name="test_message">
			            </div>
                        
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <!-- <input type="hidden" name="selected_emails" id="selected_emails"> -->
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
<script>
var mailing_users = [];
$(function () {
    let users = $("#selected_users").tagsinput({
      maxTags: 1500,
      itemValue: 'id',
      itemText: 'text',
      allowDuplicates: false,
    });
    $("#selected_users").on('itemRemoved', function(event) {
        var tag = event.item;
        var items = mailing_users.filter(id => {
            return id != tag.id;
        });
        setTimeout(function () {
            mailing_users = items;
            $("#mailing-selected-users span").text(mailing_users.length);
        },100);
        
    });
   $('form.mailing-settings').ajaxForm({
      url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=send_mail_to_mock_users',
      beforeSend: function () {
         $('form.mailing-settings').find('.waves-effect').text('Please wait..');
      },
      success: function (data) {
         if (data.status == 400) {
            $("#alert").html('<div class="alert alert-danger">'+ data['message'] +'</div>');
         } else if (data.status == 200) {
            $("#alert").html('<div class="alert alert-success">Message Sent!</div>');
         } else if (data.status == 300) {
            $("#alert").html('<div class="alert alert-success">Messages are being sent in background.</div>');
         }
         $('form.mailing-settings').find('.waves-effect').text('Send');
      }
   });

   $(document).on('click', '.search-mailing-users p', function(event) {
      event.preventDefault();
      var id = $(this).attr('data-user');
      if ($.inArray(id, mailing_users) == -1) {
         mailing_users.push(id);
         $('.selected_users_div').slideDown();
         $("#selected_users").tagsinput('add', { id: id, text: $(this).text() });
         $("#mailing-selected-users span").text(mailing_users.length);
         $("#selected_emails").val(mailing_users.join());
         $(this).remove();
      }

   });

});
function Wo_SearchMailingUsers(name = ''){
   if (!name) { 
        $('.search-mailing-users').removeClass('hidden').html('');
        return false;
    }
   $.ajax({
      url: Wo_Ajax_Requests_File(),
      type: 'GET',
      dataType: 'json',
      data: {f: 'admin_setting',s:'get_users_emails',name:name},
   })
   .done(function(data) {
      if (data.status == 200) {
         $('.search-mailing-users').removeClass('hidden').html(data.html);     
      }
      else{
        $('.search-mailing-users').removeClass('hidden').html('');  
      }
   })
   .fail(function() {
      console.log("error");
   })
}
</script>