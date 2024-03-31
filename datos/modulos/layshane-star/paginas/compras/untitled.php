<?php if ($wo['config']['user_status'] == 1) { ?>
      <!-- // NEW STORY -->
      <script type="text/javascript">
        var storyLightboxElements = document.querySelectorAll('.story_lightbox');
        storyLightboxElements.forEach(function(element) {
          element.addEventListener('mouseover', function(event) {
            var postId = element.getAttribute('data-post-id');
            element.classList.add('dont_close_story_' + postId);
            var width = getComputedStyle(element).width;
            element.style.width = width;
          });
        });
        var storyLightboxElements = document.querySelectorAll('.story_lightbox');
        storyLightboxElements.forEach(function(element) {
          element.addEventListener('mouseleave', function(event) {
            Wo_Delay(function(){
              if ($('#users-reacted-modal').is(':hidden')) {
                value = $(this).attr('data-post-id');
                $(this).removeClass('dont_close_story_'+value);
                setTimeout(function(){
                  $('.width_').css('width', '100%');
                }, 700);
                Wo_Delay(function(){
                  if ($('.dont_close_story_'+value).length == 0) {
                    $('.story_lightbox').find('.next-btn').click();
                  }
                }, 10000);
              }
            }, 500);
          });
        });


          $(document).on('click', '.story-image-wrapper', function(event) {
          event.preventDefault();
          $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');

          $value = $(this).parents(".story-container").attr('data-status-id');
          $.post(Wo_Ajax_Requests_File() + '?f=story_view', {id: $value}, function(data, textStatus, xhr) {
            if (data.status == 200) {
              document.body.style.overflow = 'hidden';
                $('.lightbox-container').html(data.html);
                $('.width_').addClass('load');
                setTimeout(function(){
                    $('.width_').css('width', '100%');
              }, 200);
                Wo_Delay(function(){
                    if ($('.dont_close_story_'+$value).length == 0) {
                      Get_NextStory(data.story_id);
                    }
              }, 10000);
            }
            else{
              Wo_CloseLightbox();
            }
          });
        });
        function Wo_GetMoreStoryViews(story_id,self) {
          last_view = $('.story_views_').last().attr('id');
          $(self).addClass('dont_close_story_'+story_id);
          $(self).find('span').html('<?php echo $wo["lang"]["please_wait"]?>');
          $.post(Wo_Ajax_Requests_File() + '?f=story_views_', {last_view:last_view,story_id:story_id}, function(data, textStatus, xhr) {
            if (data.status == 200) {
              $(self).find('button').html('<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather"><polyline points="6 9 12 15 18 9"></polyline></svg> <?php echo($wo['lang']['load_more']) ?>');

              $('.views_container_').append(data.html);
            }
            else{
              $(self).find('button').html('<?php echo $wo["lang"]["no_more_views"]?>');

            }
          });
        }
        $(document).on('click', '.see_all_stories', function(event) {
          event.preventDefault();
          $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
          user_id = $(this).attr('data_story_user_id');
          type = $(this).attr('data_story_type');
          $.post(Wo_Ajax_Requests_File() + '?f=view_all_stories', {user_id: user_id,type:type}, function(data, textStatus, xhr) {
            if (node_socket_flow == "1") {
               socket.emit("user_notification", { to_id: user_id, user_id: _getCookie("user_id"), type: "added" });
            }
            document.body.style.overflow = 'hidden';
            $('.lightbox-container').html(data.html);
            setTimeout(function(){
              video_story = $('#video_story').attr('data-story-video');
                if ($('[data-story-video='+video_story+']').length == 0) {

                  $('.width_').addClass('load');
                  setTimeout(function(){
                      $('.width_').css('width', '100%');
                  }, 200);
                  Wo_Delay(function(){
                    value = $('.user_story_').attr('id');

                      if ($('.dont_close_story_'+value).length == 0) {
                        if (type == 'user') {
                          Get_NextStory(data.story_id);
                        }
                        else{

                          Get_NextStory(data.story_id,'friends');
                        }
                      }
                  }, 10000);
                }
              }, 200);
          });
        });
        function Get_PreviousStory(story_id,story_type = '') {
          if ($('.lightbox-container').is(":visible")) {

            Wo_CloseLightbox();
            $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
            $.post(Wo_Ajax_Requests_File() + '?f=view_story_by_id', {story_id: story_id,type:'previous',story_type:story_type}, function(data, textStatus, xhr) {
               user_id = $(this).attr('data_story_user_id');
               if (node_socket_flow == "1") {
               socket.emit("user_notification", { to_id: user_id, user_id: _getCookie("user_id"), type: "added" });
            }
              if (data.status == 200) {
                document.body.style.overflow = 'hidden';
                  $('.lightbox-container').html(data.html);
                  video_story = $('#video_story').attr('data-story-video');
                if ($('[data-story-video='+video_story+']').length == 0) {
                    $('.width_').addClass('load');
                    setTimeout(function(){
                        $('.width_').css('width', '100%');
                  }, 200);
                    Wo_Delay(function(){
                      value = $('.user_story_').attr('id');
                        if ($('.dont_close_story_'+value).length == 0) {
                          if (story_type == 'user') {
                            if ($('.lightpost-'+data.story_id).length > 0) {
                              Get_NextStory(data.story_id);
                            }
                          }
                          else{
                            if ($('.lightpost-'+data.story_id).length > 0) {
                              Get_NextStory(data.story_id,'friends');
                            }
                          }
                        }
                  }, 10000);
                }
              }
              else{
                Wo_CloseLightbox();
              }
            });
          }
        }
        function Get_NextStory(story_id,story_type = '') {
          if ($('.lightbox-container').is(":visible")) {
            Wo_CloseLightbox();
            $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
            $.post(Wo_Ajax_Requests_File() + '?f=view_story_by_id', {story_id: story_id,type:'next',story_type:story_type}, function(data, textStatus, xhr) {
              if (data.status == 200) {
               user_id = $(this).attr('data_story_user_id');
               if (node_socket_flow == "1") {
               socket.emit("user_notification", { to_id: user_id, user_id: _getCookie("user_id"), type: "added" });
            }
                document.body.style.overflow = 'hidden';
                  $('.lightbox-container').html(data.html);
                  video_story = $('#video_story').attr('data-story-video');
                if ($('[data-story-video='+video_story+']').length == 0) {
                    $('.width_').addClass('load');
                    setTimeout(function(){
                        $('.width_').css('width', '100%');
                  }, 200);
                    Wo_Delay(function(){
                      value = $('.user_story_').attr('id');
                        if ($('.dont_close_story_'+value).length == 0) {
                          if (story_type == 'user') {
                            if ($('.lightpost-'+data.story_id).length > 0) {
                              Get_NextStory(data.story_id);
                            }
                      }
                      else{
                        if ($('.lightpost-'+data.story_id).length > 0) {
                          Get_NextStory(data.story_id,'friends');
                        }
                      }
                        }
                  }, 10000);
                }
              }
              else{
                if (story_type == 'user') {
                  if($('.unseen_story').length > 0){
                    $('.unseen_story').addClass('seen_story');
                    $('.unseen_story').removeClass('unseen_story');

                  }
                }
                Wo_CloseLightbox();
              }
            });
          }
      }
      function Get_CurrentStory(story_id,story_type = '') {
            Wo_CloseLightbox();
            $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
            $.post(Wo_Ajax_Requests_File() + '?f=view_story_by_id', {story_id: story_id,type:'current',story_type:story_type}, function(data, textStatus, xhr) {
              if (data.status == 200) {
                  user_id = $(this).attr('data_story_user_id');
               if (node_socket_flow == "1") {
               socket.emit("user_notification", { to_id: user_id, user_id: _getCookie("user_id"), type: "added" });
            }
                document.body.style.overflow = 'hidden';
                  $('.lightbox-container').html(data.html);
                  video_story = $('#video_story').attr('data-story-video');
                if ($('[data-story-video='+video_story+']').length == 0) {
                    $('.width_').addClass('load');
                    setTimeout(function(){
                        $('.width_').css('width', '100%');
                  }, 200);
                    Wo_Delay(function(){
                      value = $('.user_story_').attr('id');
                        if ($('.dont_close_story_'+value).length == 0) {
                          if (story_type == 'user') {
                            if ($('.lightpost-'+data.story_id).length > 0) {
                              Get_NextStory(data.story_id);
                            }
                      }
                      else{
                        if ($('.lightpost-'+data.story_id).length > 0) {
                          Get_NextStory(data.story_id,'friends');
                        }
                      }
                        }
                  }, 10000);
                }
              }
              else{
                if (story_type == 'user') {
                  if($('.unseen_story').length > 0){
                    $('.unseen_story').addClass('seen_story');
                    $('.unseen_story').removeClass('unseen_story');

                  }
                }
                Wo_CloseLightbox();
              }
            });
      }
    </script>
      <!-- // NEW STORY -->
      <?php } ?>



<script type="text/javascript">
  
function NewAddress() {
  $('.modal_add_address_modal_alert').empty();
  $("#add_address_modal").find('.btn-mat').removeAttr('disabled')
  $("#add_address_modal").find('.btn-mat').text("<?php echo $wo['lang']['add'] ?>");
  $('#add_address_modal').modal('show');
}
$(document).ready(function() {
    var options = {
      url: Wo_Ajax_Requests_File() + '?f=address&s=add&hash=' + $('.main_session').val(),
        beforeSubmit:  function () {
          $('.modal_add_address_modal_alert').empty();
          $("#add_address_modal").find('.btn-mat').attr('disabled', 'true');
          $("#add_address_modal").find('.btn-mat').text("<?php echo($wo['lang']['please_wait']) ?>");
        },
        success: function (data) {
          $("#add_address_modal").find('.btn-mat').text("<?php echo $wo['lang']['add'] ?>");
          $("#add_address_modal").find('.btn-mat').removeAttr('disabled')
          if (data.status == 200) {
            $('.modal_add_address_modal_alert').html('<div class="alert alert-success bg-success"><i class="fa fa-check"></i> '+
              data.message
              +'</div>');
              if (data.url && data.url != '') {
                if ($('#setting_address_page').length > 0) {
                  setTimeout(function () {
                    location.href = data.url;
                  },2000);
                }
                else{
                  setTimeout(function () {
                    $('.modal_add_address_modal_alert').empty();
              $("#add_address_modal").find('.btn-mat').removeAttr('disabled')
              $("#add_address_modal").find('.btn-mat').text("<?php echo $wo['lang']['add'] ?>");
              $('#add_address_modal').modal('hide');
              $('#load_checkout').click();
                  },2000);
                }
              }
          } else {
            $('.modal_add_address_modal_alert').html('<div class="alert alert-danger bg-danger"> '+
            data.message
            +'</div>');
          }
        }
    };
    $('.address_form').ajaxForm(options);
});
</script>




<?php if ($wo['loggedin']) { ?>
    <div class="modal fade" id="add_address_modal" role="dialog" data-keyboard="false" style="overflow-y: auto;">
      <div class="modal-dialog wow_mat_mdl">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
            <h4 class="modal-title"><?php echo $wo['lang']['add_new_address'] ?></h4>
          </div>
          <form class="form form-horizontal address_form" method="post" action="#">
            <div class="modal-body twocheckout_modal">
              <div class="modal_add_address_modal_alert"></div>
              <div class="clear"></div>
              <div class="row">
                <div class="col-md-12">
                  <div class="wow_form_fields">
                    <label for="name"><?php echo $wo['lang']['name']; ?></label>
                    <input id="name" name="name" type="text" autocomplete="off" placeholder="<?php echo $wo['lang']['name']; ?>" value="<?php echo($wo['user']['name']) ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="wow_form_fields">
                    <label for="phone"><?php echo $wo['lang']['phone_number']; ?></label>
                    <input id="phone" name="phone" type="text" autocomplete="off" placeholder="<?php echo $wo['lang']['phone_number']; ?>" value="<?php echo($wo['user']['phone_number']) ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="wow_form_fields">
                    <label for="country"><?php echo $wo['lang']['country']; ?></label>
                    <input id="country" name="country" type="text" autocomplete="off" placeholder="<?php echo $wo['lang']['country']; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="wow_form_fields">
                    <label for="city"><?php echo $wo['lang']['city']; ?></label>
                    <input id="city" name="city" type="text" autocomplete="off" placeholder="<?php echo $wo['lang']['city']; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="wow_form_fields">
                    <label for="zip"><?php echo $wo['lang']['zip']; ?></label>
                    <input id="zip" name="zip" type="text" autocomplete="off" placeholder="<?php echo $wo['lang']['zip']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="wow_form_fields">
                    <label for="address"><?php echo $wo['lang']['name']; ?></label>
                    <textarea id="address" placeholder="<?php echo $wo['lang']['address']; ?>" name="address" rows="3" autocomplete="off"></textarea>
                  </div>
                </div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="modal-footer">
              <div class="ball-pulse"><div></div><div></div><div></div></div>
              <button type="submit" class="btn btn-main btn-mat"><?php echo $wo['lang']['add']; ?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php } ?>