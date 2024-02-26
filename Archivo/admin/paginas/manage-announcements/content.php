<?php $rand = uniqid(); ?>
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
                <li class="breadcrumb-item active" aria-current="page">Anuncios</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Administrar anuncios</h6>
                    <div class="announcement-settings-alert"></div>
                    <form class="announcement-settings" method="POST">
                      <label class="form-label">Crear nuevo anuncio (HTML permitido)</label>
                    	<div class="form-group form-float">
                            <div class="form-line">
                                <textarea name="announcement_text" id="announcement_text_<?php echo $rand; ?>" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Crear</button>
                    </form>
                </div>
            </div>
        </div>
		<div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
					<h6 class="card-title">Anuncios activos</h6>
					<div class="active-announcements announcements">
			               <?php
			                  $activeAnnouncements = lui_GetActiveAnnouncements();
			                  
			                  if (count($activeAnnouncements) < 1) {
			                    
			                    echo '<h5 class="no-active-announcements"><small>No hay anuncios activos.</small></h5>';
			                  } else {
			                  foreach ($activeAnnouncements as $wo['activeAnnouncement']) {
			                  
			                     echo lui_LoadAdminPage('manage-announcements/active-list');
			                     
			                  }
			                  }
			                  ?>
			            </div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
					<h6 class="card-title">Anuncios inactivos</h6>
					<div class="inactive-announcements announcements">
			               <?php 
			                  $inactiveAnnouncements = lui_GetInactiveAnnouncements();
			                  
			                   if (count($inactiveAnnouncements) < 1) {
			                    
			                    echo '<h5 class="no-inactive-announcements"><small>No hay anuncios inactivos.</small></h5>';
			                  } else {
			                  foreach ($inactiveAnnouncements as $wo['inactiveAnnouncement']) {
			                  
			                     echo lui_LoadAdminPage('manage-announcements/inactive-list');
			                     
			                  } 
			                  }
			                  ?>
			            </div>
				</div>
			</div>
		</div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
<script>
$(function() {
    var form_announcement_settings = $('form.announcement-settings');
    form_announcement_settings.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=add_new_announcement',
        beforeSend: function() {
            form_announcement_settings.find('.waves-effect').text('Por favor espere..');
        },
        beforeSubmit : function(arr, $form, options){
          arr.splice(0, 1);
          tinymce.get("announcement_text_<?php echo $rand; ?>").setContent(tinymce.activeEditor.getContent());
          document.getElementById("announcement_text_<?php echo $rand; ?>").value=tinymce.activeEditor.getContent();
          arr.push({name:'announcement_text', value:btoa(unescape(encodeURIComponent($('#announcement_text_<?php echo $rand; ?>').val())))})
        },
        success: function(data) {
        	if (data.status == 200) {
	            $('.no-active-announcements').hide(100);
	            $('.active-announcements').prepend(data.text);
	            form_announcement_settings.find('.waves-effect').text('Crear');
	        }
        }
    });
    if (typeof(tinymce) == 'undefined') {
      // var s = document.createElement("script");
      // s.type = "text/javascript";
      // s.src = "<?php echo lui_LoadAdminLink('vendors/tinymce/js/tinymce/tinymce.min.js'); ?>";
      // $("head").append(s);
    }
    setTimeout(function (argument) {
      tinymce.init({
        selector: '#announcement_text_<?php echo $rand; ?>',
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
    },300);
    
});

function Wo_DeleteAnnouncement(id) {
   var announcement_container = $('.announcements').find('.announcement-' + id);
   $.get(Wo_Ajax_Requests_File(), {
      f: 'admin_setting',
      s: 'delete_announcement',
      id: id
   }, function (data) {
      if (data.status == 200) {
         announcement_container.slideUp(200, function () {
            $(this).remove();
         });
      }
   });
}

function Wo_DisableAnnouncement(id) {
   var announcement_container = $('.active-announcements').find('.announcement-' + id);
   var inactiveannouncement_container = $('.inactive-announcements');
   $.get(Wo_Ajax_Requests_File(), {
      f: 'admin_setting',
      s: 'disable_announcement',
      id: id
   }, function (data) {
      if (data.status == 200) {
         announcement_container.slideUp(200, function () {
            $(this).remove();
         });
         if (data.html.length != 0) {
            $('.no-inactive-announcements').hide(100);
            inactiveannouncement_container.prepend(data.html);
         }
      }
   });
}

function Wo_ActivateAnnouncement(id) {
   var announcement_container = $('.inactive-announcements').find('.announcement-' + id);
   var activeannouncement_container = $('.active-announcements');
   $.get(Wo_Ajax_Requests_File(), {
      f: 'admin_setting',
      s: 'activate_announcement',
      id: id
   }, function (data) {
      if (data.status == 200) {
         announcement_container.slideUp(200, function () {
            $(this).remove();
         });
         if (data.html.length != 0) {
            activeannouncement_container.prepend(data.html);
         }
      }
   });
}
</script>