<div class="wo_settings_page wow_content">
	<div class="avatar-holder profile">
		<img src="<?php echo $wo['setting']['avatar']?>" alt="<?php echo $wo['setting']['name']?> Foto de perfil" class="avatar">
		<div class="infoz">
			<h5 title="<?php echo $wo['setting']['name']?>"><a href="<?=lui_SeoLink('index.php?link1=timeline&u='.$wo['setting']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['setting']['username']?>"><?php echo $wo['setting']['name']?></a></h5>
			<p><?php echo $wo['lang']['profile_setting']; ?></p>
		</div>
	</div>
	<hr>

	<form  method="post" class="form-horizontal setting-profile-form">
		<div class="setting-profile-alert setting-update-alert"></div>
		
		<div class="row">
			<div class="col-md-6">
				<div class="wow_form_fields">
					<label for="first_name"><?php echo $wo['lang']['first_name']; ?></label>  
					<input id="first_name" name="first_name" type="text" value="<?php echo $wo['setting']['first_name'];?>" autocomplete="off">
				</div>
			</div>
			<div class="col-md-6">
				<div class="wow_form_fields">
					<label for="last_name"><?php echo $wo['lang']['last_name']; ?></label>  
					<input id="last_name" name="last_name" type="text" value="<?php echo $wo['setting']['last_name'];?>" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="wow_form_fields">
			<label for="about"><?php echo $wo['lang']['about_me']; ?></label>  
			<?php $text = br2nl($wo['setting']['about']); ?>
			<textarea id="about" name="about" rows="4"><?php echo $text;?></textarea>
		</div>
		<div class="wow_form_fields">
			<label for="address"><?php echo $wo['lang']['location']; ?></label>  
			<input id="address" name="address" type="text" value="<?php echo $wo['setting']['address'];?>" autocomplete="off">
			<?php if ($wo['config']['yandex_map'] == 1) { ?>
          <div class="yandex_search_user"></div>
        <?php } ?>
		</div>
	

		<?php
			$fields = lui_GetProfileFields('profile');
			if (count($fields) > 0) {
				foreach ($fields as $key => $wo['field']) {
					echo lui_LoadPage('setting/profile-fields');
				}
				echo '<input name="custom_fields" type="hidden" value="1">';
			}
		?>
		
		<div class="text-center">
			<button type="submit" class="btn btn-main btn-mat btn-mat-raised add_wow_loader"><?php echo $wo['lang']['save']; ?></button>
		</div>

		<input type="hidden" name="user_id" id="user-id" value="<?php echo $wo['setting']['user_id'];?>">
		<input type="hidden" name="relationship_user" id="relationship_user_id" value="0">
		<input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
	</form>
</div>

<div class="modal fade" id="choose_rel_ship" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#relationship_user_id').val(0);"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title"><?php echo $wo['lang']['relationship_status']; ?></h4>
			</div>
			<div class="choose_rel_ship_alert">
             
			</div>
			<div class="modal-body">
				<div class="col-md-3">
					<div class="choose_rel_ship_avatar">
						<div>
							<i class="fa fa-user-circle-o"></i>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="form-group">
						<input name="user_names" type="text" class="form-control" onkeyup="Wo_RelationshipSearch(this.value);" placeholder="<?=$wo['lang']['username'];?>">
						<div>
							<div class="dropdown" id="select_relationship_with">
								<ul class="dropdown-menu" style="width: 100%;">
                        
								</ul>
							</div>
						</div>
					</div>
					<div class="form-group choose_rel_ship_meta" >
						<h4></h4>
						<p class="user-lastseen"></p>  
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-main" data-dismiss="modal"><?php echo $wo['lang']['save']; ?></button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
<?php if ($wo['config']['website_mode'] == 'linkedin') { ?>
	$("#skills").tagsinput({});
	$("#languages").tagsinput({});

	$($('.skills_div .bootstrap-tagsinput').find('input')).on('keyup', function(event) {
			SearchSkill($(this).val())
	});

	$($('.languages_div .bootstrap-tagsinput').find('input')).on('keyup', function(event) {
			SearchLanguages($(this).val())
	});
<?php } ?>
var relationship_users = [];
var relationship_user  = 0;
function Wo_RelationshipSearch(name = ''){
  if (!name) { return false;}
  $.ajax({
    url: Wo_Ajax_Requests_File(),
    type: 'GET',
    dataType: 'json',
    data: {f: 'family',s:'search',name:name},
  })
  .done(function(data) {
    if (data.status == 200 && data.users.length > 0) {
      relationship_users = data.users
      var html = '';
      for (var i = 0; i < data.users.length; i++) {
        html += '<li class="pointer select_relationship_user" data-id="'+i+'"><a>'+data.users[i].name+'</a></li>';        
      }
      $("#select_relationship_with").addClass('open').find('ul').html(html);
    }
    else{
      $("#select_relationship_with").removeClass('open');
    }
  })
  .fail(function() {
    console.log("error");
  })
}

$(function() {
  $(document).on('click', '.select_relationship_user', function(event) {
    event.preventDefault();
    var user_data     = relationship_users[$(this).attr('data-id')];
    $("#relationship_user_id").val(user_data.user_id);
    $(".choose_rel_ship_meta").find('h4').text(user_data.name);
    $(".choose_rel_ship_meta").find('p').html(user_data.lastseen);
    $(".choose_rel_ship_avatar").html('<img src="'+user_data.avatar+'" alt="Picture">');
    $("#select_relationship_with").removeClass('open').find('ul').empty();
  });

  $('form.setting-profile-form').ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=update_profile_setting',
    beforeSend: function() {
      $('.wo_settings_page').find('.add_wow_loader').addClass('btn-loading');
    },
    success: function(data) {
    	$('.skills_result').html('');
      if (data.status == 200) {
        <?php if($wo['user']['user_id'] == $wo['setting']['user_id']) { ?>
        if (data.first_name != '' || data.last_name != '') {
        	<?php if ($wo['config']['node_socket_flow'] == "1") { ?>
            socket.emit("on_name_changed", {from_id: _getCookie("user_id"), name: data.first_name + ' ' + data.last_name});
            <?php } ?>
          $('[id^=user-full-name]').text(data.first_name + ' ' + data.last_name);
        }
        <?php } ?>
        scrollToTop();
        $('.setting-profile-alert').html('<div class="alert alert-success">' + data.message + '</div>');
        $('.alert-success').fadeIn('fast', function() {
          $(this).delay(2500).slideUp(500, function() {
            $(this).remove();
          });
        });
      } else if (data.errors) {
        var errors = data.errors.join("<br>");
        scrollToTop();
        $('.setting-profile-alert').html('<div class="alert alert-danger">' + errors + '</div>');
        $('.alert-danger').fadeIn(300);
      }
      $('.wo_settings_page').find('.add_wow_loader').removeClass('btn-loading');
    }
  });
});
  var pac_input = document.getElementById('address');
  (function pacSelectFirst(input) {
    // store the original event binding function
    var _addEventListener = (input.addEventListener) ? input.addEventListener : input.attachEvent;
    function addEventListenerWrapper(type, listener) {
      // Simulate a 'down arrow' keypress on hitting 'return' when no pac suggestion is selected,
      // and then trigger the original listener.
      if(type == "keydown") {
        var orig_listener = listener;
        listener = function (event) {
          var suggestion_selected = $(".pac-item-selected").length > 0;
          if(event.which == 13 && !suggestion_selected) {
            var simulated_downarrow = $.Event("keydown", {
              keyCode: 40,
              which: 40
            });
            orig_listener.apply(input, [simulated_downarrow]);
          }
          orig_listener.apply(input, [event]);
        };
      }
      // add the modified listener
      _addEventListener.apply(input, [type, listener]);
    }
    if(input.addEventListener)
      input.addEventListener = addEventListenerWrapper;
    else if(input.attachEvent)
      input.attachEvent = addEventListenerWrapper;
  })(pac_input);

  <?php if ($wo['config']['google_map']) { ?>
  $(function () {
     var autocomplete = new google.maps.places.Autocomplete(pac_input);
  });
  <?php }?>
<?php if ($wo['config']['yandex_map'] == 1) { ?>
  $(function() {
    $('#address').on( "keydown", function() {
      let self = this;
      var myGeocoder = ymaps.geocode($(this).val());
      myGeocoder.then(
          function (res) {
            if (res.geoObjects.getLength() == 0) {
              $('.yandex_search_user').html('');
            }
            else{
              let html = '';
              for (var i = 0; i < res.geoObjects.getLength(); i++) {
                html += '<p class="pointer" onclick="AddYandexResult(\'#address\',this,\'.yandex_search_user\')">'+res.geoObjects.get(i).properties.get('name')+'</p>';
              }
              $('.yandex_search_user').html(html);
            }
          },
          function (err) {
              $('.yandex_search_user').html('');
          }
      );
    });
  });
<?php } ?>
</script>