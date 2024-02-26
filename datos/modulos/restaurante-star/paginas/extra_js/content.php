<script>
  
  function CheckIfCanUse() {
    <?php if(!$wo['config']['can_use_chat']){ ?>
    $("#error_post").modal('show');
    $('#error_post_text').text("<?php echo $wo['lang']['can_not_use_feature'] ?>");
    Wo_Delay(function(){
        $("#error_post").modal('hide');
    },3000);
    <?php } ?>
  }
  

     var create_bar = $('.create-product-bar');
  var create_percent = $('.create-product-percent');
  $(document).ready(function() {

    $('form.edit-offer-form').ajaxForm({
          url: Wo_Ajax_Requests_File() + '?f=offer&s=edit_offer',
          beforeSend: function() {
           var percentVal = '0%';
           create_bar.width(percentVal);
           create_percent.html(percentVal);


            $('.edit-offer-form').find('.last-sett-btn .ball-pulse').fadeIn(100);
          },
          uploadProgress: function (event, position, total, percentComplete) {
             var percentVal = percentComplete + '%';
             create_bar.width(percentVal);
             $('.edit-offer-form').find('.create-product-progress').slideDown(200);
             create_percent.html(percentVal);
          },
          success: function(data) {
           if (data.status == 200) {
             $('.edit-offer-form').find('.app-general-alert').html("<div class='alert alert-success'><?php echo($wo['lang']['offer_successfully_edited']) ?></div>");
               $('.edit-offer-form').find('.alert-success').fadeIn(300);
               setTimeout(function (argument) {
                $('.edit-offer-form').find('.alert-success').fadeOut(300);
                window.location.reload(true);

               },3000);
           } else {
            $('.edit-offer-form').animate({
              scrollTop: $('html, body').offset().top //#DIV_ID is an example. Use the id of your destination on the page
          });
               $('.edit-offer-form').find('.app-general-alert').html('<div class="alert alert-danger">' + data.error + '</div>');
               $('.edit-offer-form').find('.alert-danger').fadeIn(300);
               setTimeout(function (argument) {
                $('.edit-offer-form').find('.alert-danger').fadeOut(300);

               },3000);
           }
           $('.edit-offer-form').find('.last-sett-btn .ball-pulse').fadeOut(100);
          }
      });

  });
function Wo_RegisterReactionLike(element,reaction_icon,is_html){

    var reaction = parseInt($(element).attr('data-reaction-id'));
    var post_id = $(element).attr('data-post-id');

    if ($('#react_'+post_id).attr('data_react') == 1) {
      return false;
    }

    var path = "<?php echo $wo['config']['theme_url']?>";
    var lang = $(element).attr('data-reaction-lang');
    if (!post_id || !reaction) {
      return false;
    }

    $('.reactions-box-container-'+post_id).fadeOut(1);

    var reaction_color = '';
    switch (reaction) {
          case 1:
              reaction_color = '#3498db';
              break;
          case 2:
              
              reaction_color = '#f25268';
              break;
          case 3:
              reaction_color = '#f3b715';
              break;
          case 4:
              reaction_color = '#f3b715';
              break;
          case 5:
              reaction_color = '#f3b715';
              break;
          case 6:
              reaction_color = '#f7806c';
              break;
      }

      console.log(reaction_color);

       reaction_html = '<div class="inline_post_emoji no_anim"><div class="reaction"><img src="'+reaction_icon+'"></div></div>';

    $('.status-reaction-'+post_id).html(''+reaction_html+'' + lang).css({"color": reaction_color});
    $('.status-reaction-'+post_id).addClass("active-like");
    $.get(Wo_Ajax_Requests_File(), {f: 'posts', s: 'register_reaction', post_id: post_id, reaction: reaction}, function (data) {

      if(data.status == 200) {
         <?php if ($wo['config']['node_socket_flow'] == 1) { ?>
      if ($('#react_'+post_id).attr('data_react') == 0) {
        socket.emit("post_notification", { post_id: post_id, user_id: _getCookie("user_id"), type: "added" });
      }
      <?php } ?>
        $('.post-reactions-icons-'+post_id).html(data.reactions);

      }
      if (data.can_send == 1) {
        Wo_SendMessages();
      }
      $('#react_'+post_id).attr('data_react','1');
    });
}

function Wo_RegisterStoryReaction(element,reaction_icon,is_html) {
  var reaction = parseInt($(element).attr('data-reaction-id'));
  var post_id = $(element).attr('data-post-id');
  var path = "<?php echo $wo['config']['theme_url']?>";
  var lang = $(element).attr('data-reaction-lang');
  if (!post_id || !reaction) {
    return false;
  }
  $('.like-story-lightbox').addClass('active');
  $.get(Wo_Ajax_Requests_File(), {f: 'status', s: 'register_reaction', story_id: post_id, reaction: reaction}, function (data) {
    if(data.status == 200) {
      <?php if ($wo['config']['node_socket_flow'] == 1) { ?>
  if ($('#react_'+post_id).attr('data_react') == 0) {
    //socket.emit("post_notification", { post_id: post_id, user_id: _getCookie("user_id"), type: "added" });
  }
  <?php } ?>
      $('.post-reactions-icons-'+post_id).html(data.reactions);

    }
    if (data.can_send == 1) {
      Wo_SendMessages();
    }
    //$('#react_'+post_id).attr('data_react','1');
  });
}

function Wo_RegisterMessageReaction(element,reaction_icon,is_html) {
  var reaction = parseInt($(element).attr('data-reaction-id'));
  var post_id = $(element).attr('data-post-id');
  var path = "<?php echo $wo['config']['theme_url']?>";
  var lang = $(element).attr('data-reaction-lang');
  if (!post_id || !reaction) {
    return false;
  }
   <?php if ($wo['config']['node_socket_flow'] == 1) { ?>
    socket.emit("register_reaction", {
        type: 'messages',
        id: post_id,
        reaction: reaction,
        user_id: _getCookie("user_id")
      })

  <?php }else{ ?>
    $.get(Wo_Ajax_Requests_File(), {f: 'messages', s: 'register_reaction', message_id: post_id, reaction: reaction}, function (data) {
        if(data.status == 200) {
          $('.post-reactions-icons-m-'+post_id).html(data.reactions);
		  $('.mess_margin_b-'+post_id).addClass('margin-active');
        }
        if (data.can_send == 1) {
          Wo_SendMessages();
        }
        //$('#react_'+post_id).attr('data_react','1');
      });

  <?php } ?>
  $('.reactions-box-container-'+post_id).fadeOut(50);

}
function Wo_RegisterReaction(element,reaction_icon,is_html){
    var reaction = parseInt($(element).attr('data-reaction-id'));
    var post_id = $(element).attr('data-post-id');
    var path = "<?php echo $wo['config']['theme_url']?>";
    var lang = $(element).attr('data-reaction-lang');
    if (!post_id || !reaction) {
      return false;
    }

    $('.reactions-box-container-'+post_id).fadeOut(1);

    var reaction_color = '';

    switch (reaction) {
          case 1:
              reaction_color = '#1da1f2';
              break;
          case 2:
              reaction_color = '#f25268';
              break;
          case 3:
              reaction_color = '#f3b715';
              break;
          case 4:
              reaction_color = '#f3b715';
              break;
          case 5:
              reaction_color = '#f3b715';
              break;
          case 6:
              reaction_color = '#f7806c';
              break;
      }

    reaction_html = '<div class="inline_post_count_emoji reaction"><img src="'+reaction_icon+'"></div>&nbsp;&nbsp;';
    reaction_color = '';

    $('.status-reaction-'+post_id).removeClass (function (index, css) {
       return (css.match (/(^|\s)active-like\S+/g) || []).join(' ');
    });
    $('.status-reaction-'+post_id).removeClass('active-like');
    $('.status-reaction-'+post_id).html(''+reaction_html+'' + lang).css({"color": reaction_color});
    $('.status-reaction-'+post_id).addClass("active-like");
    $('.status-reaction-'+post_id).addClass("active-like-" + reaction);
    $.get(Wo_Ajax_Requests_File(), {f: 'posts', s: 'register_reaction', post_id: post_id, reaction: reaction}, function (data) {
      if(data.status == 200) {
        <?php if ($wo['config']['node_socket_flow'] == 1) { ?>
    //if ($('#react_'+post_id).attr('data_react') == 0) {
      socket.emit("post_notification", { post_id: post_id, user_id: _getCookie("user_id"), type: "added" });
    //}
    <?php } ?>
        $('.post-reactions-icons-'+post_id).html(data.reactions);

      }
      if (data.can_send == 1) {
        Wo_SendMessages();
      }
      $('#react_'+post_id).attr('data_react','1');
    });
}


function Wo_RegisterFollowNotify(id, type) {
  var _follow_con = $('[id=Notify-' + id + ']');
  data_next = $('[id=Notify-' + id + ']').attr('title');
  title = $('[id=Notify-' + id + ']').attr('data_next');
  html_ = '<span id="Notify-' + id + '" title="'+title+'" data_next="'+data_next+'" class="btn-glossy"><button type="button" onclick="Wo_RegisterFollowNotify(' + id + ',0)" class="btn-active btn btn-default btn-sm wo_following_btn wo_user_folw_empty_btns" id="wo_useract_btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell-off"><path d="M13.73 21a2 2 0 0 1-3.46 0"></path><path d="M18.63 13A17.89 17.89 0 0 1 18 8"></path><path d="M6.26 6.26A5.86 5.86 0 0 0 6 8c0 7-3 9-3 9h14"></path><path d="M18 8a6 6 0 0 0-9.33-5"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg></button></span>';
  if (type == 0) {
    html_ = '<span id="Notify-' + id + '" title="'+title+'" data_next="'+data_next+'" class="btn-glossy"><button type="button" onclick="Wo_RegisterFollowNotify(' + id + ',1)" class="btn btn-default btn-sm wo_user_folw_empty_btns" id="wo_useract_btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg></button></span>';
  }

  _follow_con.replaceWith(html_);

  $.get(Wo_Ajax_Requests_File(), {f: 'notify_user', following_id: id}, function(data) {});

}





function Wo_RegisterFollow(id, is_confirm,show_modal= false) {
  var _follow_con = $('[id=Follow-' + id + ']');
  is_confirm_f    = 0;

  if (is_confirm == 1) {
    is_confirm_f = 1;
  }
  if (show_modal == true) {
    $('#unfriend_btn').attr('onclick', 'Wo_RegisterFollow('+id+')');
    $('#un_friend_modal').modal('show');
    return false;
  }
  $('#un_friend_modal').modal('hide');

  <?php if ($wo['config']['connectivitySystem'] == 0): ?>
    html_ = '<button type="button" onclick="Wo_RegisterFollow(' + id + ', ' + is_confirm_f + ')" class="btn-active btn btn-default btn-sm wo_following_btn" id="wo_useract_btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg><span class="button-text"> <?php echo $wo["lang"]["following_btn"];?></span></button>';
    if (is_confirm_f == 1) {
      html_ = '<button type="button" onclick="Wo_RegisterFollow(' + id + ', ' + is_confirm_f + ')" class="btn-requested btn btn-default btn-sm wo_request_btn" id="wo_useract_btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg><span class="button-text"> <?php echo $wo["lang"]["requested"];?></span></button>';
    }
    if (_follow_con.find('button').hasClass('btn-active') || _follow_con.find('button').hasClass('btn-requested')) {
      html_ = '<button type="button" onclick="Wo_RegisterFollow(' + id + ', ' + is_confirm_f + ')" class="btn btn-default btn-sm wo_follow_btn" id="wo_useract_btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg><span class="button-text"> <?php echo $wo["lang"]["follow"];?></span></button>';

    }
  <?php else: ?>
    // if (_follow_con.find('button').hasClass('btn-active')) {
    //   if (!confirm("<?php echo $wo['lang']['are_you_sure_unfriend'] ?>")) {
    //       return false;
    //   }
    // }
    html_ = '<button type="button" onclick="Wo_RegisterFollow(' + id + ')" class="btn-requested btn btn-default btn-sm wo_request_btn" id="wo_useract_btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg><span class="button-text"> <?php echo $wo["lang"]["requested"];?></span></button>';
    if (_follow_con.find('button').hasClass('btn-requested') || _follow_con.find('button').hasClass('btn-active')) {
      html_ = '<button type="button" onclick="Wo_RegisterFollow(' + id + ')" class="btn btn-default btn-sm wo_follow_btn" id="wo_useract_btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg><span class="button-text"> <?php echo $wo["lang"]["add_friend"];?></span></button>';

    }

  <?php endif; ?>

  _follow_con.html(html_);

  $.get(Wo_Ajax_Requests_File(), {f: 'follow_user', following_id: id}, function(data) {

    <?php if ($wo['config']['connectivitySystem'] == 0): ?>

    if (_follow_con.find('button').hasClass('btn-active') || _follow_con.find('button').hasClass('btn-requested')) {
      if (node_socket_flow == "1") {
        if (is_confirm_f == 1) {
          socket.emit("user_notification", { to_id: id, user_id: _getCookie("user_id"), type: "request" });
        } else {
          socket.emit("user_notification", { to_id: id, user_id: _getCookie("user_id"), type: "added" });
        }

      }
    } else {
      if (node_socket_flow == "1") {
        if (is_confirm_f == 1) {
         socket.emit("user_notification", { to_id: id, user_id: _getCookie("user_id"), type: "removed" });
          } else {
            socket.emit("user_notification", { to_id: id, user_id: _getCookie("user_id"), type: "request_removed" });
          }
      }
    }
  <?php else: ?>
    if (_follow_con.find('button').hasClass('btn-requested') || _follow_con.find('button').hasClass('btn-active')) {
      if (node_socket_flow == "1") {
         socket.emit("user_notification", { to_id: id, user_id: _getCookie("user_id"), type: "request" });
      }
    } else {
      if (node_socket_flow == "1") {
         socket.emit("user_notification", { to_id: id, user_id: _getCookie("user_id"), type: "request_removed" });
      }
    }
  <?php endif; ?>

    if (data.can_send == 1) {
      Wo_SendMessages();
    }

    else if(data.status == 400){
      html_ = '<button type="button" onclick="Wo_RegisterFollow(' + id + ')" class="btn btn-default btn-sm wo_follow_btn" id="wo_useract_btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg><span class="button-text"> <?php echo $wo["lang"]["add_friend"];?></span></button>';
      _follow_con.html(html_);

      $("#modal-alert").modal('show');

      Wo_Delay(function(){
        $("#modal-alert").modal('hide');
      },3000);
    }
  });

}

function Wo_RegisterGroupJoin(id, is_confirm) {
  var _join_con = $('[id=join-' + id + ']');
  is_confirm_ = 0;
  if (is_confirm == 1) {
    is_confirm_ = 1;
  }
  html_join = '<button type="button" onclick="Wo_RegisterGroupJoin(' + id + ', ' + is_confirm_ + ')" class="btn-active btn btn-default btn-sm wo_following_btn" id="wo_useract_btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg><span class="button-text"> <?php echo $wo["lang"]["joined"];?></span></button>';
  if (is_confirm_ == 1) {
    html_join = '<button type="button" onclick="Wo_RegisterGroupJoin(' + id + ', ' + is_confirm_ + ')" class="btn-requested btn btn-default btn-sm wo_request_btn" id="wo_useract_btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg><span class="button-text"> <?php echo $wo["lang"]["requested"];?></span></button>';
  }
  if (_join_con.find('button').hasClass('btn-requested') || _join_con.find('button').hasClass('btn-active')) {
    html_join = '<button type="button" onclick="Wo_RegisterGroupJoin(' + id + ', ' + is_confirm_ + ')" class="btn btn-default btn-sm wo_follow_btn" id="wo_useract_btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg><span class="button-text"> <?php echo $wo["lang"]["join"];?></span></button>';
  }
  _join_con.html(html_join);
  $.get(Wo_Ajax_Requests_File(), {f: 'join_group', group_id: id}, function (data) {
    if (node_socket_flow == "1") {
      if (_join_con.find('button').hasClass('btn-active') || _join_con.find('button').hasClass('btn-requested')) {
          socket.emit("group_notification", { to_id: id, user_id: _getCookie("user_id"), type: "added" });
      } else {
          socket.emit("group_notification", { to_id: id, user_id: _getCookie("user_id"), type: "removed" });
      }
    }
    if (data.can_send == 1) {
      Wo_SendMessages();
    }
  });
}

function Wo_RegisterEventGoing(id) {
  var _join_con = $('[id=going-' + id + ']');
  html_join = '<button type="button" onclick="Wo_RegisterEventGoing(' + id + ')" class="btn btn-main btn-mat"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M0.41,13.41L6,19L7.41,17.58L1.83,12M22.24,5.58L11.66,16.17L7.5,12L6.07,13.41L11.66,19L23.66,7M18,7L16.59,5.58L10.24,11.93L11.66,13.34L18,7Z" /></svg> <span class="button-text"> <?php echo $wo["lang"]["joined"];?></span></button>';
  if (_join_con.find('button').hasClass('btn-main')) {
    html_join = '<button type="button" onclick="Wo_RegisterEventGoing(' + id + ')" class="btn btn-default btn-mat"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10.74,11.72C11.21,12.95 11.16,14.23 9.75,14.74C6.85,15.81 6.2,13 6.16,12.86L10.74,11.72M5.71,10.91L10.03,9.84C9.84,8.79 10.13,7.74 10.13,6.5C10.13,4.82 8.8,1.53 6.68,2.06C4.26,2.66 3.91,5.35 4,6.65C4.12,7.95 5.64,10.73 5.71,10.91M17.85,19.85C17.82,20 17.16,22.8 14.26,21.74C12.86,21.22 12.8,19.94 13.27,18.71L17.85,19.85M20,13.65C20.1,12.35 19.76,9.65 17.33,9.05C15.22,8.5 13.89,11.81 13.89,13.5C13.89,14.73 14.17,15.78 14,16.83L18.3,17.9C18.38,17.72 19.89,14.94 20,13.65Z" /></svg> <span class="button-text"> <?php echo $wo["lang"]["join"];?></span></button>';
  }
  _join_con.html(html_join);
  $.get(Wo_Ajax_Requests_File(), {f: 'go_event', event_id: id}, function (data) {
    if (node_socket_flow == "1") {
      if (_join_con.find('button').hasClass('btn-main')) {
          socket.emit("event_notification", { to_id: id, user_id: _getCookie("user_id"), type: "added" });
      } else {
          socket.emit("event_notification", { to_id: id, user_id: _getCookie("user_id"), type: "removed" });
      }
    }
    if (data.can_send == 1) {
      Wo_SendMessages();
    }
  });
}

function Wo_RegisterEventInterested(id) {
  var _join_con = $('[id=interested-' + id + ']');
  html_join = '<button type="button" onclick="Wo_RegisterEventInterested(' + id + ')" class="btn btn-main btn-mat"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M0.41,13.41L6,19L7.41,17.58L1.83,12M22.24,5.58L11.66,16.17L7.5,12L6.07,13.41L11.66,19L23.66,7M18,7L16.59,5.58L10.24,11.93L11.66,13.34L18,7Z" /></svg> <span class="button-text"> <?php echo $wo["lang"]["interested"];?></span></button>';
  if (_join_con.find('button').hasClass('btn-main')) {
    html_join = '<button type="button" onclick="Wo_RegisterEventInterested(' + id + ')" class="btn btn-default btn-mat"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16.5,5C15,5 13.58,5.91 13,7.2V17.74C17.25,13.87 20,11.2 20,8.5C20,6.5 18.5,5 16.5,5M16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3Z" /></svg> <span class="button-text"> <?php echo $wo["lang"]["interested"];?></span></button>';
  }
  _join_con.html(html_join);
  $.get(Wo_Ajax_Requests_File(), {f: 'interested_event', event_id: id}, function (data) {
     if (node_socket_flow == "1") {
      if (_join_con.find('button').hasClass('btn-main')) {
          socket.emit("event_notification", { to_id: id, user_id: _getCookie("user_id"), type: "added" });
      } else {
          socket.emit("event_notification", { to_id: id, user_id: _getCookie("user_id"), type: "removed" });
      }
    }
    if (data.can_send == 1) {
      Wo_SendMessages();
    }
  });
}


function Wo_RegisterPageLike(id) {
  element_like = $('[id=like-' + id + ']');
  html_like = '<button type="button" onclick="Wo_RegisterPageLike(' + id + ')" class="btn-active btn btn-default btn-sm wo_following_btn" id="wo_useract_btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg><span class="button-text"> <?php echo $wo["lang"]["liked"];?></span></button>';
  if (element_like.find('button').hasClass('btn-active')) {
  	html_like = '<button type="button" onclick="Wo_RegisterPageLike(' + id + ')" class="btn btn-default btn-sm wo_follow_btn" id="wo_useract_btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg><span class="button-text">' + "<?php echo $wo["lang"]["like"];?></span></button>" ;
  }
  element_like.html(html_like);
  $.get(Wo_Ajax_Requests_File(), {f: 'like_page', page_id: id}, function (data) {
    if(data.status == 200) {
      if (node_socket_flow == "1") {
        if (element_like.find('button').hasClass('btn-active')) {
           socket.emit("page_notification", { to_id: id, user_id: _getCookie("user_id"), type: "added"});
        } else {
          socket.emit("page_notification", { to_id: id, user_id: _getCookie("user_id"), type: "removed"});
        }
      }
      if ($('.sidebar-listed-page-like').attr('data-type') == "sidebar") {
        setTimeout(function () {
          Wo_ReloadSideBarPages();
        }, 500);
      }
    }
    if (data.can_send == 1) {
      Wo_SendMessages();
    }
  });
}

function Wo_RegisterLike(post_id) {
  var post = $('[id=post-' + post_id + ']');
    html_like = "<?php echo GetModeBtn('liked_btn'); ?>"; 
    if (post.find("[id^=like-button]").parent().find('.active-like').length > 0) {
      html_like = "<?php echo GetModeBtn('like_btn'); ?>";
    }
  <?php if ($wo['config']['second_post_button'] == 'dislike') { ?>
   post.find("[id^=wonder-button]").html("<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-thumbs-down'><path d='M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 0-2 1.7l-1.38 9a2 2 0 0 0 2 2.3zm7-13h2.67A2.31 2.31 0 0 1 22 4v7a2.31 2.31 0 0 1-2.33 2H17'></path></svg> <span class='like-btn-mobile'> <?php echo $wo["lang"]["dislike"];?></span>");
  <?php } ?>
  post.find("[id^=like-button]").html(html_like);
  $.get(Wo_Ajax_Requests_File(), {f: 'posts', s: 'register_like', post_id: post_id}, function (data) {
    if (post.find("[id^=like-button]").parent().find('.active-like').length > 0) {
      if (node_socket_flow == "1") { socket.emit("post_notification", { post_id: post_id, user_id: _getCookie("user_id"), type: "added" }); }
    } else {
      if (node_socket_flow == "1") { socket.emit("post_notification", { post_id: post_id, user_id: _getCookie("user_id"), type: "removed" });}
    }
    if(data.status == 200) {
      post.find("[id^=likes]").text(data.likes);
      post.find("[id^=wonders]").text(data.wonders);
    } else {
      post.find("[id^=likes]").text(data.likes);
      post.find("[id^=wonders]").text(data.wonders);
    }
    if (data.can_send == 1) {
      Wo_SendMessages();
    }
  });
}

function Wo_RegisterWonder(post_id) {
  var post = $('[id=post-' + post_id + ']');
  wonder_icon = '<?php echo $wo["second_post_button_icon"]?>';
  wonder_lang = "<?php echo $wo['lang']['wonder']; ?>";
  wonder_lang_2 = "<?php echo $wo['lang']['wondered']; ?>";
  <?php if ($wo['config']['second_post_button'] == 'dislike') { ?>
  wonder_lang = "<?php echo $wo['lang']['dislike']; ?>";
  wonder_lang_2 = "<?php echo $wo['lang']['disliked']; ?>";
  <?php } ?>
  html_wonder = '<span class="active-wonder">' + wonder_icon + '<span class="like-btn-mobile">' + wonder_lang_2 + '</span></span>';
  if (post.find("[id^=wonder-button]").parent().find('.active-wonder').length > 0) {
  	html_wonder = '' + wonder_icon + '<span class="like-btn-mobile">' + wonder_lang + '</span>';
  }
  post.find("[id^=wonder-button]").html(html_wonder);
  <?php if ($wo['config']['second_post_button'] == 'dislike') { ?>
   post.find("[id^=like-button]").html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg> <span class="like-btn-mobile"> <?php echo $wo["lang"]["like"];?></span>');
  <?php } ?>
  $.get(Wo_Ajax_Requests_File(), {f: 'posts', s: 'register_wonder', post_id: post_id}, function (data) {
    if (post.find("[id^=wonder-button]").parent().find('.active-wonder').length > 0) {
      if (node_socket_flow == "1") { socket.emit("post_notification", { post_id: post_id, user_id: _getCookie("user_id"), type: "added" }); }
    } else {
      if (node_socket_flow == "1") { socket.emit("post_notification", { post_id: post_id, user_id: _getCookie("user_id"), type: "removed" });}
    }
    if(data.status == 200) {
      post.find("[id^=wonders]").text(data.wonders);
      post.find("[id^=likes]").text(data.likes);
    } else {
      post.find("[id^=wonders]").text(data.wonders);
      post.find("[id^=likes]").text(data.likes);
    }
    if (data.can_send == 1) {
      Wo_SendMessages();
    }
  });
}
function Wo_IsLangValid(lang){
  var langs = [ "en", "tr","fr","es","nl","de","it","pt","ru","ar"];
  if (lang && langs.indexOf(lang) != -1) {
    return true;
  }
  else{
    return false;
  }
}
function Wo_DetectTextLang(text){
  var lcode = false;
  if (text || typeof(text) == 'string') {
    guessLanguage.info(text, function(lang) {
    lcode = lang[0];
    });
  }
  return lcode;
}
function Wo_Translate(id,lang){
  if (!id || !lang && Wo_IsLangValid(lang)) {
    return false;
  }else{
    <?php if ($wo['config']['google_translate'] != 1 && $wo['config']['yandex_translate'] != 1) { ?>
      return false;
    <?php } ?>
    var translatable_text = $("[data-translate-text="+id+"]").text();
    if (lang == Wo_DetectTextLang(translatable_text)) {
      // $("[data-trans-btn=" + id + "]").removeAttr('onclick')
      // return false;
    }
    $("[data-trans-btn="+id+"]").text("<?php echo($wo['lang']['loading']); ?>");
    if ($("[data-translate-text="+id+"]").parents('.post-description').find('.data_translated').length > 0) {
      let tx = $("[data-translate-text="+id+"]").parents('.post-description').find('.data_translated').text();
      $("[data-translate-text="+id+"]").parents('.post-description').find('.data_translated').remove();
      $("[data-translate-text="+id+"]").text(tx);
      $("[data-trans-btn="+id+"]").text("<?php echo($wo['lang']['translate']); ?>");
      return false;
    }
    $("[data-translate-text="+id+"]").parents('.post-description').append('<span class="hidden data_translated">'+translatable_text+'</span>');
    
    <?php if ($wo['config']['google_translate'] == 1) { ?>
      let url = "https://translation.googleapis.com/language/translate/v2?key=<?php echo($wo['config']['google_translation_api']); ?>";
      let method = "POST";
      let r_data = {
          q:String(translatable_text),
          target:String(lang)
      };
    <?php }else if($wo['config']['yandex_translate'] == 1){ ?>
      let url = "https://translate.yandex.net/api/v1.5/tr.json/translate";
      let method = "GET";
      let r_data = {
          key:'<?php echo $wo['config']['yandex_translation_api']; ?>',
          text:String(translatable_text),
          lang:String(lang)
      };
    <?php } ?>
    $.ajax({
      url: url,
      type: method,
      dataType: 'json',
      data: r_data
    }).done(function(data) {
      <?php if ($wo['config']['google_translate'] == 1) { ?>
      let translation = data.data.translations[0].translatedText;
      $("[data-translate-text="+id+"]").text(translation)
      <?php }else if($wo['config']['yandex_translate'] == 1){ ?>
      if (data.code == 200) {
        $("[data-translate-text="+id+"]").text(data.text[0])
      }
    <?php } ?>
    $("[data-trans-btn="+id+"]").text("<?php echo($wo['lang']['show_original']); ?>");
    }).fail(function() {
      let tx = $("[data-translate-text="+id+"]").parents('.post-description').find('.data_translated').text();
      $("[data-translate-text="+id+"]").parents('.post-description').find('.data_translated').remove();
      $("[data-translate-text="+id+"]").text(tx);
      $("[data-trans-btn="+id+"]").text("<?php echo($wo['lang']['translate']); ?>");
      console.log("translation error");
    })
  }
}

$(document).on('click', '#night_mode_toggle', function(event) {
  mode = $(this).attr('data-mode');
  if (mode == 'night') {
      $('head').append('<link rel="stylesheet" href="<?php echo $wo['config']['theme_url'];?>/stylesheet/dark.css<?php echo $wo['update_cache']; ?>" id="night-mode-css">');
      $('#night_mode_toggle').attr('data-mode', 'day');
      $('#night-mode-text').text('<?php echo $wo['lang']['day_mode']?>');
  } else {
      $('#night-mode-css').remove();
      $('#night_mode_toggle').attr('data-mode', 'night');
      $('#night-mode-text').text('<?php echo $wo['lang']['night_mode']?>');
  }
  $.post(Wo_Ajax_Requests_File() + '?mode=' + mode);
});

$(document).on('click', '#share_post_on_btn', function(event) {
  text = $('#share_post_text').val();
  type = $('#SearchForInputType').val();
  post_id = $('#SearchForInputPostId').val();
  type_id = $('#SearchForInputTypeId').val();
  self = this;
  $(this).text('<?php echo($wo['lang']['please_wait']) ?>');
  $(this).attr('disabled', 'true');
    $.ajax({
      url: Wo_Ajax_Requests_File(),
      type: 'GET',
      dataType: 'json',
      data: {f: 'share_post_on',s:type,type_id:type_id,post_id:post_id,text:text},
    })
    .done(function(data) {
      if (node_socket_flow == "1") {
          socket.emit("post_notification", { post_id: post_id, user_id: _getCookie("user_id")});
        }
      $(self).text('<?php echo($wo['lang']['share']) ?>');
      $(self).removeAttr('disabled');
      if (data.status == 200) {
        $('.share_post_modal_alert').html('<div class="alert alert-success"><?php echo($wo['lang']['post_shared_successfully']) ?></div>');

        setTimeout(function () {
          $('#share_post_modal').modal('hide');
        },2000);
      }
      else{
        $('.share_post_modal_alert').html("<div class='alert alert-danger'><?php echo($wo['lang']['cant_share_own']) ?></div>");
        setTimeout(function () {
          $('.share_post_modal_alert').html('');
        },2000);
      }
    })
    .fail(function() {
    })
    .always(function() {
    });
});

$(document).on('change', '#share_type_select', function(event) {
  var type = $(this).val();
  if (type == 'user') {
    $('.search_for_form').hide(400);
    $('#type_user_name').show(400);
    $('#SearchForInputType').val('user');
  }
  else if(type == 'page'){
    $('.search_for_form').hide(400);
    $('#type_page_name').show(400);
    $('#SearchForInputType').val('page');
  }
  else if(type == 'group'){
    $('.search_for_form').hide(400);
    $('#type_group_name').show(400);
    $('#SearchForInputType').val('group');
  }
  else if(type == 'timeline'){
    $('.search_for_form').hide(400);
    $('#SearchForInputType').val('timeline');
  }
});

// $(document).on('click', '#share_post_on_page_form_btn', function(event) {
//   page_id = $('#SearchForInputPage').val();
//   post_id = $('#SearchForInputPostIdPage').val();
//   $.ajax({
//     url: Wo_Ajax_Requests_File(),
//     type: 'GET',
//     dataType: 'json',
//     data: {f: 'share_post_on',s:'page',page_id:page_id,post_id:post_id},
//   })
//   .done(function() {
//   })
//   .fail(function() {
//   })
//   .always(function() {
//   });

// });
// $(document).on('click', '#share_post_on_user_form_btn', function(event) {
//   user_id = $('#SearchForInputUser').val();
//   post_id = $('#SearchForInputUserPostId').val();
//   $.ajax({
//     url: Wo_Ajax_Requests_File(),
//     type: 'GET',
//     dataType: 'json',
//     data: {f: 'share_post_on',s:'user',user_id:user_id,post_id:post_id},
//   })
//   .done(function() {
//   })
//   .fail(function() {
//   })
//   .always(function() {
//   });

// });


function Wo_LoadViewsInfo(self) {
  $('#load_more_info_btn').html('<?php echo $wo['lang']['please_wait'] ?>');
  var type = $(self).attr('data-type');
  var table = $(self).attr('table-type');
  var post_id = $(self).attr('post-id');
  var id   = $('.views_info_count').last().attr('data-row-id');
  var request = '';
  if (type == 'like') {
    request = 'get_post_likes';
  }
  if (type == 'wonder') {
    request = 'get_post_wonders';
  }
  if (type == 'share') {
    request = 'get_post_shared';
  }
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: request,
    type:type,
    post_id: post_id,
    offset: id,
    table:table
  }, function (data) {
    if(data.status == 200) {
      if(data.html.length == 0) {
        $(self).css('display', 'none');
      } else {
        $('#views_info').append(data.html);
        $('#load_more_info_btn').html('<?php echo $wo['lang']['load_more'] ?>');
      }
    }
    $('#load_more_info_btn').html('<?php echo $wo['lang']['load_more'] ?>');
  });
}

function Wo_LoadReactedUsers(type) {
  $('#reacted_users_box').html('<div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div>');
  var post_id = $('.reacted_users_load_more').attr('post-id');
  var col = $('.reacted_users_load_more').attr('col-type');
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: 'get_post_reacted',
    type:type,
    post_id: post_id,
    col:col
  }, function (data) {
    if(data.status == 200) {
      if(data.html.length == 0) {
        $('.reacted_users_load_more').css('display', 'none');
        $('.reacted_users_load_more').attr('data-type', '');
        $('#reacted_users_box').html('<span class="view-more-wrapper text-center">' + data.message + '</span>');
      } else {
        $('.reacted_users_load_more').attr('data-type', type);
        $('.reacted_users_load_more').attr('post-id', post_id);
        $('.reacted_users_load_more').attr('col-type', col);
        $('#load_more_reacted_btn').html('<?php echo $wo['lang']['load_more'] ?>');
        $('.reacted_users_load_more').css('display', 'inline');
        $('#reacted_users_box').html(data.html);
      }
    }
    //$('#load_more_info_btn').html('<?php echo $wo['lang']['load_more'] ?>');
  });
}

function Wo_LoadMoreReactedUsers(self) {
  $('.reacted_users_load_more').find('#load_more_reacted_btn').html('<?php echo $wo['lang']['please_wait'] ?>');
  var type = $(self).attr('data-type');
  var post_id = $(self).attr('post-id');
  var id   = $('.views_info_count').last().attr('data-row-id');
  var col = $('.reacted_users_load_more').attr('col-type');
  var request = 'get_post_reacted';
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: request,
    type:type,
    post_id: post_id,
    offset: id,
    col:col
  }, function (data) {
    if(data.status == 200) {
      if(data.html.length == 0) {
        $(self).css('display', 'none');
      } else {
        $('#reacted_users_box').append(data.html);
        $('.reacted_users_load_more').find('#load_more_reacted_btn').html('<?php echo $wo['lang']['load_more'] ?>');
      }
    }
    $('.reacted_users_load_more').find('#load_more_reacted_btn').html('<?php echo $wo['lang']['load_more'] ?>');
  });
}

function Wo_SortComments(type,post_id) {
  if (type == 'top') {
    $('.order-text-'+post_id).text('<?php echo($wo['lang']['top']) ?>');
  }
  else{
    $('.order-text-'+post_id).text('<?php echo($wo['lang']['latest']) ?>');
  }
  main_wrapper = $('#post-' + post_id);
  view_more_wrapper = main_wrapper.find('.view-more-wrapper');
  Wo_progressIconLoader(view_more_wrapper);
  $('#post-' + post_id).find('.view-more-wrapper .ball-pulse').fadeIn(100);
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: 'load_more_comments_sort',
    post_id: post_id,
    type: type
  }, function (data) {
    if(data.status == 200) {
      main_wrapper.find('.comments-list').html(data.html);
      $('.ball-pulse-'+post_id).fadeOut('100');
    }
  });
}

function count_char(self,id) {
  <?php if ($wo['config']['maxCharacters'] != 10000) { ?>
  $(self).limit("<?php echo $wo['config']['maxCharacters']?>", '#charsLeft_'+id);
  <?php } ?>
}

function ApplyJobNow(job_id) {
  $.post(Wo_Ajax_Requests_File()+'?f=job&s=get_apply_modal', {job_id: job_id}, function(data, textStatus, xhr) {
    if (data.status == 200) {
      $('#apply-job-modal').html(data.html);
      $('#apply-job-modal').modal('show');
    }
  });
}

$(document).on('change', '#i_currently_work', function(event) {
  if ($('#i_currently_work').is(":checked")) {
    $('#experience_end_date').css('display', 'none');
  }
  else{
    $('#experience_end_date').css('display', 'block');
  }
});



function Wo_GetPaymentMethods(self) {
  var amount = $('#fund_donate_amount').val();
  var fund_id = $('#fund_donate_id').val();
  if (!amount || !fund_id) {
    $('#fund_donate_amount').attr('style', 'border-color: red !important');
    return false;
  }
  $('#fund_donate_amount').attr('style', 'border-color: unset');
  $(self).attr('disabled', 'true');
  $.get(Wo_Ajax_Requests_File() + '?f=funding&s=get_payment_donate_method&fund_id=' + fund_id + '&amount=' + amount, function (data) {
      if (data.status == 200) {
          $('#donate_for_fund_modal').html(data.html);
		  $('#dont_modal').modal('hide');
          $('#fund_payment_donate_modal').modal({
           show: true
          });
      }
      else{
        $('#amount_fund_alert').html('<div class="alert alert-danger">' + data['message'] + '</div>');
        setTimeout(function (argument) {
          $('#amount_fund_alert').html('');
        },2000);
      }
      $(self).removeAttr('disabled');
  });
}


function Wo_StripeDonate(fund_id,amount,type = 'credit_card') {
  if (!amount || !fund_id) {
    return false;
  }

  if (type == 'credit_card') {
    $('.btn-cart').attr('disabled', true).text("<?php echo $wo["lang"]["please_wait"]?>");
  }
  else{
    $('.btn-alipay').attr('disabled', true).text("<?php echo $wo["lang"]["please_wait"]?>");
  }
  var stripe = Stripe('<?php echo $wo['config']['stripe_id'];?>');
  $.post(Wo_Ajax_Requests_File() + '?f=stripe&s=session', {amount: amount,type:'fund',fund_id:fund_id,payment_type:type}, function(data, textStatus, xhr) {
    if (data.status == 200) {
      return stripe.redirectToCheckout({ sessionId: data.sessionId });
    }
  });
}

function Wo_BankTransferDonate(fund_id,amount) {
  if (!amount || !fund_id) {
    return false;
  }

  $('.bank_payment').attr('disabled', true).text("<?php echo $wo["lang"]["please_wait"]?>");

  $('#configreset').click();
  $(".prv-img").html('<div class="thumbnail-rendderer"><div><h4 class="bold"><?php echo $wo['lang']['drop_img_here']; ?></h4><div class="error-text-renderer"></div><div><span><?php echo $wo['lang']['or']; ?></span><p><?php echo $wo['lang']['browse_to_upload']; ?></p></div></div> </div>');
  $("#blog-alert").html('');
  $('#bank_donate_price').val(amount);
  $('#bank_donate_fund_id').val(fund_id);
  $('#pay-go-pro').modal('hide');
  $('#bank_transfer_donate_modal').modal({
         show: true
        });
}

function Wo_BitcoinDonate(fund_id,amount) {
  if (!amount || !fund_id) {
    return false;
  }

  $('.btn-bitcoin').attr('disabled', true).text("<?php echo $wo["lang"]["please_wait"]?>");
  $('#pay-go-pro').modal('hide');
  $.get(Wo_Ajax_Requests_File() + '?f=donate_with_bitcoin&amount=' + amount+"&fund_id="+fund_id, function (data) {
    if (data.status == 200) {
      $(data.html).appendTo('body').submit();
    }
  });
}



function openInNewTab(url, id) {
   var myWindow = window.open(url, "", "width=600,height=700");
   return false;
}

function Wo_LiveComment(text,event,post_id,insert = 0) {
  text = $('[id=post-' + post_id + ']').find('.comment-textarea').val();
  if (text && (event.keyCode == 13 || insert == 1)) {
    if ($('#live_post_comments_'+post_id+' .live_comments').length >= 4) {
      $('#live_post_comments_'+post_id+' .live_comments').first().remove();
    }
      $('#live_post_comments_'+post_id).append('<div class="live_comments" live_comment_id=""><a class="pull-left" href="<?php echo($wo['user']['url']) ?>"><img class="live_avatar pull-left" src="<?php echo($wo['user']['avatar']) ?>" alt="avatar"></a><div class="comment-body" style="float: left;"><div class="comment-heading"><span><a href="<?php echo($wo['user']['url']) ?>" data-ajax="?link1=timeline&amp;u=<?php echo($wo['user']['username']) ?>" ><h4 class="live_user_h"> <?php echo($wo['user']['name']) ?> </h4></a></span><?php if ($wo['user']['verified'] == 1) { ?><span class="verified-color" data-toggle="tooltip" title="Verified User"><i class="fa fa-check-circle"></i></span><?php } ?><div class="comment-text">'+text+'</div></div></div><div class="clear"></div></div>');

  }
}
function Wo_ReplyChatMessage(chat_id,id) {
  $('.message_reply_id_'+chat_id).val(id);
  $('.message_reply_text_'+chat_id+' span').find('.reply_content').remove();
  if ($("#message_text_reply_"+id).length > 0 && $("#message_text_reply_"+id).html() != '') {
    $('.message_reply_text_'+chat_id+' span').prepend('<p class="reply_content">'+$("#message_text_reply_"+id).html()+'</p>')
  }
  else if($('#message_media_reply_'+id).length > 0 && $('#message_media_reply_'+id).find('img').length > 0){
    $('.message_reply_text_'+chat_id+' span').prepend('<div class="message-user-image pull-left reply_content"><img src="'+$('#message_media_reply_'+id).find('img').attr('src')+'" alt="User image"></div>')
  }
  $('.message_reply_text_'+chat_id).fadeIn(50);
}
function Wo_ClearReplyChatMessage(chat_id) {
  $('.message_reply_id_'+chat_id).val(0);
  $('.message_reply_text_'+chat_id).find('.reply_content').remove();
  $('.message_reply_text_'+chat_id).fadeOut(50);
}
function Wo_ReplyMessage(id) {
  $('.message_reply_id').val(id);
  $('.message_reply_text span').find('.reply_content').remove();
  if ($("#message_text_reply_"+id).length > 0 && $("#message_text_reply_"+id).html() != '') {
    $('.message_reply_text span').prepend('<p class="reply_content">'+$("#message_text_reply_"+id).html()+'</p>')
  }
  else if($('#message_media_reply_'+id).length > 0 && $('#message_media_reply_'+id).find('img').length > 0){
    $('.message_reply_text span').prepend('<div class="message-user-image reply_content"><img src="'+$('#message_media_reply_'+id).find('img').attr('src')+'" alt="User image"></div>')
  }
  $('.message_reply_text').fadeIn(50);
}
function Wo_ClearReplyMessage() {
  $('.message_reply_id').val(0);
  $('.message_reply_text').find('.reply_content').remove();
  $('.message_reply_text').fadeOut(50);
}
$(window).on('load', function() {
  //reactions
  $('body').delegate('.wo-reaction-post','mouseenter', function() {
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
      if ($('#post-' + id + ' .wo-reaction-post:hover').length != 0) {
          $('.reactions-box-container-'+id).fadeIn(50);
      }
    }, 300);
  });
  $('body').delegate('.like-story-lightbox','click', function() {
    var id = $( this ).attr( 'data-story-id' );
    setTimeout( function () {
      $('.reactions-box-story-container-'+id).fadeIn(50);
    }, 300);
  });
  $('body').delegate('.like-story-lightbox','mouseleave', function() {
    var id = $( this ).attr( 'data-story-id' );
      setTimeout( function () {
          $('.reactions-box-story-container-'+id).fadeOut(50);
    }, 1000);
  });
  $('body').delegate('.messages-reactions','click', function() {
    var id = $( this ).attr( 'data-message-id' );
    setTimeout( function () {
      $('.reactions-box-container-'+id).fadeIn(50);
    }, 300);
  });
  $('body').delegate('.messages-reactions','mouseleave', function() {
    var id = $( this ).attr( 'data-message-id' );
      setTimeout( function () {
        if ($('.reactions-box-container-'+id + ':hover').length == 0) {
          $('.reactions-box-container-'+id).fadeOut(50);
        }
    }, 500);
  });

  $('body').delegate('.wo-reaction-post','mouseleave', function() {
    var id = $( this ).attr( 'data-id' );
      setTimeout( function () {
      if ($('.reactions-box-container-'+id + ':hover').length == 0 && $('#post-' + id + ' .wo-reaction-post:hover').length == 0) {
          $('.reactions-box-container-'+id).fadeOut(50);
      }
    }, 500);
  });

  $('body').delegate('.like-btn-post','click', function() {
    if ($( this ).attr( 'data_react' ) == 0) {
      return false;
    }
    var self = this;
    var post_id = $( this ).attr( 'data-id' );

    $.get(Wo_Ajax_Requests_File(), {f: 'posts', s: 'delete_reaction', post_id: post_id}, function (data) {
      if(data.status == 200) {
        <?php if ($wo['config']['node_socket_flow'] == 1) { ?>
        socket.emit("post_notification", { post_id: post_id, user_id: _getCookie("user_id"), type: "removed" });
        <?php } ?>
        $('.reactions-box-container-'+post_id).toggle();
        $('.post-reactions-icons-'+post_id).html(data.reactions);
        $('.status-reaction-'+post_id).removeClass("active-like");
        $('.status-reaction-'+post_id).html('<svg xmlns="http://www.w3.org/2000/svg" width="58.553" height="58.266" viewBox="0 0 58.553 58.266" class="feather"> <path d="M-7080.317,1279.764l-26.729-1.173a1.657,1.657,0,0,1-1.55-1.717l1.11-33.374a4.112,4.112,0,0,1,2.361-3.6l.014-.005a13.62,13.62,0,0,1,1.978-.363h.007a9.007,9.007,0,0,0,3.249-.771c2.645-1.845,3.973-4.658,5.259-7.378l.005-.013.031-.061.059-.13.012-.023c.272-.576.61-1.289.944-1.929l0-.007c.576-1.105,2.327-4.46,4.406-5.107a2.3,2.3,0,0,1,.59-.105c.036,0,.072,0,.109,0a2.55,2.55,0,0,1,1.212.324c2.941,1.554,1.212,7.451.561,9.672a38.306,38.306,0,0,1-3.7,8.454l-.71,1.218,18.363.808a3.916,3.916,0,0,1,3.784,3.735,3.783,3.783,0,0,1-1.123,2.834,3.629,3.629,0,0,1-2.559,1.055c-.046,0-.1,0-.145,0h-.027l-2.141-.093-9.331-.41-.075,1.7,9.333.408a3.721,3.721,0,0,1,2.666,1.3,3.855,3.855,0,0,1,.936,2.934,3.779,3.779,0,0,1-3.821,3.38c-.061,0-.122,0-.181-.005l-1.974-.082-8.9-.392-.075,1.7,8.9.39a3.723,3.723,0,0,1,2.666,1.3,3.86,3.86,0,0,1,.937,2.933,3.784,3.784,0,0,1-3.827,3.381c-.057,0-.118,0-.177,0l-1.976-.088-8.472-.372-.075,1.7,8.474.372a3.726,3.726,0,0,1,2.666,1.3,3.857,3.857,0,0,1,.935,2.933,3.782,3.782,0,0,1-3.827,3.381C-7080.2,1279.765-7080.26,1279.765-7080.317,1279.764Zm-38.4,0-.089,0a6.558,6.558,0,0,1-6.193-6.8l.907-27.293a6.446,6.446,0,0,1,2.074-4.553,6.214,6.214,0,0,1,3.954-1.672c.081,0,.17-.005.29-.005s.212,0,.292.005a6.561,6.561,0,0,1,6.192,6.8l-.907,27.293a6.441,6.441,0,0,1-2.072,4.547,6.249,6.249,0,0,1-4.261,1.681Z" transform="translate(7126.251 -1222.75)" fill="none" stroke="currentColor" stroke-width="2.5"></path> </svg> ' + data.like_lang).css({"color": "inherit"});
      }
      $(self).attr('data_react','0');
    });
  });

   $('body').delegate('.reactions-box','mouseleave', function() {
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
      if ($('.reactions-box-container-'+id + ':hover').length == 0 && $('#post-' + id + ' .wo-reaction-post:hover').length == 0) {
          $('.reactions-box-container-'+id).fadeOut(50);
      }
    }, 500);
  });

  //reactions lightbox
  $('body').delegate('.wo-reaction-lightbox','mouseenter', function() {
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
      if ($('#post-' + id + ' .wo-reaction-lightbox:hover').length != 0) {
        $('.reactions-lightbox-container-'+id).fadeIn(50);
      }
    }, 500);
  });

  $('body').delegate('.wo-reaction-lightbox','mouseleave', function() {
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
      if ($('.reactions-lightbox-container-'+id + ':hover').length == 0 && $('#post-' + id + ' .wo-reaction-lightbox:hover').length == 0) {
          $('.reactions-lightbox-container-'+id).fadeOut(50);
      }
    }, 500);
  });

  $('body').delegate('.like-btn-lightbox','click', function() {
    var post_id = $( this ).attr( 'data-id' );

    $.get(Wo_Ajax_Requests_File(), {f: 'posts', s: 'delete_reaction', post_id: post_id}, function (data) {
      if(data.status == 200) {
         <?php if ($wo['config']['node_socket_flow'] == 1) { ?>
        socket.emit("post_notification", { post_id: post_id, user_id: _getCookie("user_id"), type: "removed" });
        <?php } ?>
        $('.reactions-lightbox-container-'+post_id).toggle();
        $('.post-reactions-icons-'+post_id).html("");
        $('.status-reaction-'+post_id).removeClass("active-like");
        $('.status-reaction-'+post_id).html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>' + data.like_lang).css({"color": "inherit"});
      }
    });
  });

  //reactions comment
  $('body').delegate('.like-btn-comment','mouseenter', function() {
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
        $('.reactions-comment-container-'+id).fadeIn(50);
    }, 500);
  });

  $('body').delegate('.like-btn-comment','mouseleave', function() {
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
      if( $('.reactions-comment-container-'+id+':hover').length == 0 && $('#comment-' + id + ' .wo-reaction-comment:hover').length == 0 ){
        $('.reactions-comment-container-'+id).fadeOut(50);
      }
    }, 500);
  });

  $('body').delegate('.reactions-box','mouseleave', function() {
    if( !$( this ).hasClass( 'reactions-comment-container-' + $( this ).attr( 'data-id' ) ) ){
      return false;
    }
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
        $('.reactions-comment-container-'+id).fadeOut(50);
    }, 500);
  });

  $('body').delegate('.like-btn-comment','click', function() {
    var comment_id = $( this ).attr( 'data-id' );

    $.get(Wo_Ajax_Requests_File(), {f: 'posts', s: 'delete_comment_reaction', comment_id: comment_id}, function (data) {
      if(data.status == 200) {
        <?php if ($wo['config']['node_socket_flow'] == 1) { ?>
        socket.emit("comment_notification", { comment_id: comment_id, user_id: _getCookie("user_id"), type: "removed" });
        <?php } ?>
        $('.reactions-comment-container-'+comment_id).toggle();
        $('.comment-reactions-icons-'+comment_id).html(data.reactions);
        $('.comment-status-reaction-'+comment_id).removeClass("active-like");
      }
    });
  });

  //reactions replay
  $('body').delegate('.like-btn-replay','mouseenter', function() {
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
        $('.reactions-box-comment-replay-container-'+id).fadeIn(50);
    }, 500);
  });
  $('body').delegate('.reactions-box','mouseenter', function() {
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
        $('.reactions-box-comment-replay-container-'+id).fadeIn(50);
    }, 500);
  });

  $('body').delegate('.like-btn-replay','mouseleave', function() {
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
      if( $('.reactions-comment-replay-container-'+id+':hover').length == 0 && $('#comment_reply_' + id + ' .wo-reaction-replay:hover').length == 0 ){
        $('.reactions-box-comment-replay-container-'+id).fadeOut(50);
      }
    }, 500);
  });

  $('body').delegate('.reactions-box','mouseleave', function() {
    if( !$( this ).hasClass( 'reactions-box-comment-replay-container-' + $( this ).attr( 'data-id' ) ) ){
      return false;
    }
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
        $('.reactions-box-comment-replay-container-'+id).fadeOut(50);
    }, 500);
  });

  $('body').delegate('.like-btn-replay','click', function() {
    var replay_id = $( this ).attr( 'data-id' );

    $.get(Wo_Ajax_Requests_File(), {f: 'posts', s: 'delete_replay_reaction', replay_id: replay_id}, function (data) {
      if(data.status == 200) {
        if (node_socket_flow == "1") {
          socket.emit("reply_notification", { reply_id: replay_id, user_id: _getCookie("user_id"), type: "removed" });
        }
        $('.reactions-box-comment-replay-container-'+replay_id).toggle();
        $('.replay-reactions-icons-'+replay_id).html(data.reactions);
        $('.replay-status-reaction-'+replay_id).removeClass("active-like");
      }
    });
  });


  //reactions comment lightbox
  $('body').delegate('.like-btn-lightbox-comment','mouseenter', function() {
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
        $('.reactions-lightbox-comment-container-'+id).fadeIn(50);
    }, 500);
  });

  $('body').delegate('.like-btn-lightbox-comment','mouseleave', function() {
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
      if( $('.reactions-lightbox-comment-container-'+id+':hover').length == 0 && $('#comment_' + id + ' .wo-reaction-lightbox-comment:hover').length == 0 ){
        $('.reactions-lightbox-comment-container-'+id).fadeOut(50);
      }
    }, 500);
  });

  $('body').delegate('.reactions-box','mouseleave', function() {
    if( !$( this ).hasClass( 'reactions-lightbox-comment-container-' + $( this ).attr( 'data-id' ) ) ){
      return false;
    }
    var id = $( this ).attr( 'data-id' );
    setTimeout( function () {
        $('.reactions-lightbox-comment-container-'+id).fadeOut(50);
    }, 500);
  });

  $('body').delegate('.like-btn-lightbox-comment','click', function() {
    var comment_id = $( this ).attr( 'data-id' );

    $.get(Wo_Ajax_Requests_File(), {f: 'posts', s: 'delete_comment_reaction', comment_id: comment_id}, function (data) {
      if(data.status == 200) {
        <?php if ($wo['config']['node_socket_flow'] == 1) { ?>
    socket.emit("comment_notification", { comment_id: comment_id, user_id: _getCookie("user_id"), type: "removed" });
    <?php } ?>
        $('.reactions-box-comment-replay-container-'+comment_id).toggle();
        $('.lightbox-comment-reactions-icons-'+comment_id).html(data.reactions);
        $('.lightbox-comment-status-reaction-'+comment_id).removeClass("active-like");
      }
    });
  });

});
function ProcessingVideo(id) {
  $.get(Wo_Ajax_Requests_File(), {f: 'posts', s: 'processing_video', post_id: id}, function (data) {
    $('.processing_alert_'+id).remove();
  });
}
function SendSeen(recipient_id) {
  var chat_container = $('.chat-tab').find('.chat_main_'+recipient_id);
  var last_id = chat_container.find('.messages-text:last').attr('data-message-id');
    <?php if ($wo['config']['node_socket_flow'] == "1"){ ?>
      socket.emit("seen_messages", {user_id: _getCookie("user_id"), recipient_id: recipient_id,message_id: last_id}, (data)=>{})
    <?php }else{ ?>
      $.post( Wo_Ajax_Requests_File() + '?f=chat&s=seen&hash=' + $('.main_session').val(), {recipient_id: recipient_id}, function(data, textStatus, xhr) {});
    <?php } ?>
}
function AddProductToCart(self,id,type) {
  // if (type == 'add') {
  //   $(self).text("<?php echo $wo['lang']['remove_from_cart'] ?>");
  //   $(self).attr('onclick', "AddProductToCart(this,'"+id+"','remove')");
  // }
  // else{
  //   $(self).text("<?php echo $wo['lang']['add_to_cart'] ?>");
  //   $(self).attr('onclick', "AddProductToCart(this,'"+id+"','add')");
  // }
  qty = 1;
  if ($('#cart_product_qty').length > 0) {
    qty = $('#cart_product_qty').val();
  }
  $.post(Wo_Ajax_Requests_File() + '?f=products&s=add_cart&hash=' + $('.main_session').val(), {product_id: id,qty:qty}, function(data, textStatus, xhr) {
    if (data.status == 200) {
      $('.count_items_carrito_cou').html(data.totalunidades);
      //LoadCheckout();
    }
  });
}

function AddProductToCart_layshane(self,id,type) {
  qty = 1;
  if ($('#cart_product_qty').length > 0) {
    qty = $('#cart_product_qty').val();
  }
  $.post(Wo_Ajax_Requests_File() + '?f=products&s=add_cart&hash=' + $('.main_session').val(), {product_id: id,qty:qty}, function(data, textStatus, xhr) {
    if (data.status == 200){
      $('.count_items_carrito_cou').html(data.totalunidades);
    }
  });
}

function ChangeQty(self,product_id) {
  qty = $(self).val();
  $.post(Wo_Ajax_Requests_File() + '?f=products&s=change_qty&hash=' + $('.main_session').val(), {product_id: product_id,qty: qty}, function(data, textStatus, xhr) {
    $('.count_items_carrito_cou').html(data.totalunidades);
    LoadCheckout();
  });
}
function LoadCheckout() {
  $('#load_checkout').click();
}
function RemoveProductFromCart(id) {
  // $('#cart_product_'+id).remove();
  // $('#checkout_product_'+id).remove();
  $.post(Wo_Ajax_Requests_File() + '?f=products&s=remove_cart&hash=' + $('.main_session').val(), {product_id: id}, function(data, textStatus, xhr) {
    $('.count_items_carrito_cou').html(data.totalunidades);
    // if (data.status == 200) {
    //   $('.unread_cart_count').html(data.count);
    // }
  });
}
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
function BuyProducts(type = 'show',price) {
  if ($('.payment_address').length < 1) {
    $('.checkout_alert').html("<div class='alert alert-danger bg-danger'><i class='fa fa-info-circle'></i> <?php echo($wo['lang']['please_add_address']); ?></div>");
    return false;
  }
  if ($('input[name=choose-address]:checked').length < 1) {
    $('.checkout_alert').html("<div class='alert alert-danger bg-danger'><i class='fa fa-info-circle'></i> <?php echo($wo['lang']['please_select_address']); ?></div>");
    return false;
  }
  address_id = $('input[name=choose-address]:checked').val();
  if (type == 'hide') {
        $('#buy_product_modal').find('.btn-mat').html("<?php echo $wo['lang']['pay'].' '.$wo['config']['currency_symbol_array'][$wo['config']['currency']]; ?>"+price);
        $('#buy_product_modal').find('.btn-mat').attr('onclick', "BuyProducts('show','"+price+"')");
        $('#buy_product_modal').modal('show');
        return false;
    }
    $('#buy_product_modal').find('.btn-mat').html("<?php echo($wo['lang']['please_wait']) ?>");
    $('#buy_product_modal').find('.btn-mat').attr('disabled', "true");
  $.post(Wo_Ajax_Requests_File() + '?f=products&s=buy&hash=' + $('.main_session').val(),{address_id: address_id}, function(data, textStatus, xhr) {
    $('#buy_product_modal').find('.btn-mat').removeAttr('disabled');
    $('#buy_product_modal').find('.btn-mat').text("<?php echo $wo['lang']['pay'].' '.$wo['config']['classified_currency_s']; ?>"+price);
    if (data.status == 200) {
      <?php if ($wo['config']['node_socket_flow'] == 1) { ?>
        socket.emit("checkout_notification", {user_id: _getCookie("user_id"), type: "added",users: data.users });
      <?php } ?>
      $('#buy_product_modal').find('.modal_product_pay_alert').html("<div class='alert alert-success bg-success'><i class='fa fa-check'></i> "+data.message+"</div>");
      setTimeout(function () {
        $('#buy_product_modal').find('.modal_product_pay_alert').html("");
        location.href = "<?php echo $wo['config']['site_url'];?>/purchased";
      },2000);
    }
    else{
      $('#buy_product_modal').find('.modal_product_pay_alert').html("<div class='alert alert-danger bg-danger'><i class='fa fa-info-circle'></i> "+data.message+"</div>");
    }
  });
}

function BuyProducts_tarjeta(type = 'show',price) {
  if ($('.payment_address').length < 1) {
    $('.checkout_alert').html("<div class='alert alert-danger bg-danger'><i class='fa fa-info-circle'></i> <?php echo($wo['lang']['please_add_address']); ?></div>");
    return false;
  }
  if ($('input[name=choose-address]:checked').length < 1) {
    $('.checkout_alert').html("<div class='alert alert-danger bg-danger'><i class='fa fa-info-circle'></i> <?php echo($wo['lang']['please_select_address']); ?></div>");
    return false;
  }
  address_id = $('input[name=choose-address]:checked').val();
  if (type == 'hide') {
        $('#buy_product_modal_dos').find('.btn-mat').html("<?php echo $wo['lang']['pay'].' '.$wo['config']['currency_symbol_array'][$wo['config']['currency']]; ?>"+price);
        $('#buy_product_modal_dos').find('.btn-mat').attr('onclick', "BuyProducts('show','"+price+"')");
        $('#buy_product_modal_dos').modal('show');
        return false;
    }
    $('#buy_product_modal_dos').find('.btn-mat').html("<?php echo($wo['lang']['please_wait']) ?>");
    $('#buy_product_modal_dos').find('.btn-mat').attr('disabled', "true");
  $.post(Wo_Ajax_Requests_File() + '?f=products&s=buy&hash=' + $('.main_session').val(),{address_id: address_id}, function(data, textStatus, xhr) {
    $('#buy_product_modal_dos').find('.btn-mat').removeAttr('disabled');
    $('#buy_product_modal_dos').find('.btn-mat').text("<?php echo $wo['lang']['pay'].' '.$wo['config']['classified_currency_s']; ?>"+price);
    if (data.status == 200) {
      <?php if ($wo['config']['node_socket_flow'] == 1) { ?>
        socket.emit("checkout_notification", {user_id: _getCookie("user_id"), type: "added",users: data.users });
      <?php } ?>
      $('#buy_product_modal_dos').find('.modal_product_pay_alert').html("<div class='alert alert-success bg-success'><i class='fa fa-check'></i> "+data.message+"</div>");
      setTimeout(function () {
        $('#buy_product_modal_dos').find('.modal_product_pay_alert').html("");
        location.href = "<?php echo $wo['config']['site_url'];?>/purchased";
      },2000);
    }
    else{
      $('#buy_product_modal_dos').find('.modal_product_pay_alert').html("<div class='alert alert-danger bg-danger'><i class='fa fa-info-circle'></i> "+data.message+"</div>");
    }
  });
}

function BuyProducts_efectivo(type = 'show',price) {
  if ($('.payment_address').length < 1) {
    $('.checkout_alert').html("<div class='alert alert-danger bg-danger'><i class='fa fa-info-circle'></i> <?php echo($wo['lang']['please_add_address']); ?></div>");
    return false;
  }
  if ($('input[name=choose-address]:checked').length < 1) {
    $('.checkout_alert').html("<div class='alert alert-danger bg-danger'><i class='fa fa-info-circle'></i> <?php echo($wo['lang']['please_select_address']); ?></div>");
    return false;
  }
  address_id = $('input[name=choose-address]:checked').val();
  if (type == 'hide') {
        $('#buy_product_modal_tres').find('.btn-mat').html("<?php echo $wo['lang']['relizar_pedido']; ?>");
        $('#buy_product_modal_tres').find('.btn-mat').attr('onclick', "BuyProducts_efectivo('show','"+price+"')");
        $('#buy_product_modal_tres').modal('show');
        return false;
    }
    $('#buy_product_modal_tres').find('.btn-mat').html("<?php echo($wo['lang']['please_wait']) ?>");
    $('#buy_product_modal_tres').find('.btn-mat').attr('disabled', "true");
  $.post(Wo_Ajax_Requests_File() + '?f=products&s=buy_efectivo&hash=' + $('.main_session').val(),{address_id: address_id}, function(data, textStatus, xhr) {
    $('#buy_product_modal_tres').find('.btn-mat').removeAttr('disabled');
    $('#buy_product_modal_tres').find('.btn-mat').text("<?php echo $wo['lang']['pay'].' '.$wo['config']['classified_currency_s']; ?>"+price);
    if (data.status == 200) {
      <?php if ($wo['config']['node_socket_flow'] == 1) { ?>
        socket.emit("checkout_notification", {user_id: _getCookie("user_id"), type: "added",users: data.users });
      <?php } ?>
      $('#buy_product_modal_tres').find('.modal_product_pay_alert').html("<div class='alert alert-success bg-success'><i class='fa fa-check'></i> "+data.message+"</div>");
      setTimeout(function () {
        $('#buy_product_modal_tres').find('.modal_product_pay_alert').html("");
        location.href = "<?php echo $wo['config']['site_url'];?>/purchased";
      },2000);
    }
    else{
      $('#buy_product_modal_tres').find('.modal_product_pay_alert').html("<div class='alert alert-danger bg-danger'><i class='fa fa-info-circle'></i> "+data.message+"</div>");
    }
  });
}

function DownloadPurchased(id,type = 'order') {
  if (type == 'order') {
    url = '?f=products&s=download&hash=' + $('.main_session').val();
  }
  $.post(Wo_Ajax_Requests_File() + url,{id,id}, function(data, textStatus, xhr) {
    $('body').append(data.html);
    setTimeout(function () {
      $('.ticket_card_'+id).remove();
    },10000);
  });
}
function ChangeStatus(self,hash_id) {
  status = $(self).val();
  $.post(Wo_Ajax_Requests_File() + '?f=products&s=change_status&hash=' + $('.main_session').val(), {hash_order: hash_id,status: status}, function(data, textStatus, xhr) {
    if (data.status == 200) {
      <?php if ($wo['config']['node_socket_flow'] == 1) { ?>
          socket.emit("main_notification", {user_id: _getCookie("user_id"), type: "added",to_id: data.recipient_id });
      <?php } ?>
    }
    $('#load_order').click();
  });
}
function RefundOrder(hash_id,type = 'show') {
  if (type == 'hide') {
        $('#refund_order').find('.get_refnd').attr('onclick', "RefundOrder('"+hash_id+"')");
        $('#refund_order').modal('show');
        return false;
    }
    $('#refund_order').find('.get_refnd').html("<?php echo($wo['lang']['please_wait']) ?>");
    $('#refund_order').find('.get_refnd').attr('disabled', "true");
    message = $('#refund_order_message').val();
    $.post(Wo_Ajax_Requests_File() + '?f=products&s=refund&hash=' + $('.main_session').val(), {hash_order: hash_id,message: message}, function(data, textStatus, xhr) {
      $('#refund_order').find('.get_refnd').removeAttr('disabled');
    $('#refund_order').find('.get_refnd').text("<?php echo($wo['lang']['request']) ?>");
    if (data.status == 200) {
      $('#refund_order').find('.modal_refund_order_modal_alert').html("<div class='alert alert-success bg-success'><i class='fa fa-check'></i> "+data.message+"</div>");
      setTimeout(function () {
        $('#refund_order').modal('hide');
              $('#refund_order').find('.modal_refund_order_modal_alert').html("");
              $('#load_order').click();
            },2000);
    }
    else{
      $('#refund_order').find('.modal_refund_order_modal_alert').html("<div class='alert alert-danger bg-danger'><i class='fa fa-info-circle'></i> "+data.message+"</div>");
    }
  });
}
function OpenWriteReview(product_id) {
  $('#write_product_review_product_id').val(product_id)
  $('#write_product_review').modal('show');
}
function Wo_LoadPurchase(){
  $.post(Wo_Ajax_Requests_File() + '?f=products&s=load_purchase&hash=' + $('.main_session').val(), {id: $("[data-purchase-id]:last").attr('data-purchase-id')}, function(data, textStatus, xhr) {
    if (data.status == 200) {
      $('.purchased_table').find('tbody').append(data.html);
    }
    else{
      $('.purchased_posts_load').remove();
    }
  });
}
function Wo_LoadOrders(){
  $.post(Wo_Ajax_Requests_File() + '?f=products&s=load_orders&hash=' + $('.main_session').val(), {id: $("[data-orders-id]:last").attr('data-orders-id')}, function(data, textStatus, xhr) {
    if (data.status == 200) {
      $('.orders_table').find('tbody').append(data.html);
    }
    else{
      $('.orders_posts_load').remove();
    }
  });
}
function Wo_LoadReviews(){
  $('#show_product_reviews_load_text').html("<?php echo($wo['lang']['please_wait']) ?>");
  $.post(Wo_Ajax_Requests_File() + '?f=products&s=load_reviews&hash=' + $('.main_session').val(), {id: $(".review_list:last").attr('id'),product_id: $(".review_list:last").attr('product_id')}, function(data, textStatus, xhr) {
    $('#show_product_reviews_load_text').html("<?php echo($wo['lang']['load_more']) ?>");
    if (data.status == 200) {
      $('#show_product_reviews_modal_info').append(data.html);
    }
    else{
      $('#show_product_reviews_modal_info_load').slideUp();
    }
  });
}
function Wo_GetPaymentLink(type,price,type2 = 'pro',type3 = 'show') {
  if (type3 == 'hide') {
    $('.pay_modal_wallet_text').html('');
    $('.pay_modal_wallet_alert').html('');
    if (type2 == 'pro') {
      $('.pay_modal_wallet_text').html("<?php echo $wo['lang']['pay_to_upgrade']; ?>");
    }
    else if(type2 == 'fund'){
      price = $('#fund_donate_amount').val();
      type = $('#fund_donate_id').val();
      $('.pay_modal_wallet_text').html("<?php echo $wo['lang']['pay_to_fund']; ?>");
      $('#dont_modal').modal('hide');
    }
    $('#pay_modal_wallet_btn').attr('onclick', "Wo_GetPaymentLink('"+type+"','"+price+"','"+type2+"')");
    if (parseInt(<?php echo $wo['user']['wallet'] ?>) < parseInt(price) ) {
      $('.pay_modal_wallet_alert').html("<div class='alert alert-danger'><a href='<?php echo $wo['config']['site_url'];?>/wallet'><?php echo $wo["lang"]["please_top_up_wallet"]?></a></div>");
      $('#pay_modal_wallet_btn').html("<?php echo $wo['lang']['pay']; ?> <?php echo lui_GetCurrency($wo['config']['currency']);?>"+price).attr('disabled',true);
      $('.pay_modal_wallet_text').html("");
      $('#pay-go-pro').modal({
              show: true
          });
    }
    else{
      $('#pay_modal_wallet_btn').html("<?php echo $wo['lang']['pay']; ?> <?php echo lui_GetCurrency($wo['config']['currency']);?>"+price).removeAttr('disabled');
      $('#pay-go-pro').modal({
              show: true
          });
    }
  }
  else{
    $('#pay_modal_wallet_btn').html("<?php echo($wo['lang']['please_wait']) ?>");
    $('#pay_modal_wallet_btn').attr('disabled','true');
    link = '';
    if (type2 == 'pro') {
      link = '&pro_type=' + type+'&price='+price+'&type='+type2;
    }
    else if(type2 == 'fund'){
      link = '&fund_id=' + type+'&price='+price+'&type='+type2;
    }
    $.get(Wo_Ajax_Requests_File() + '?f=wallet&s=pay'+link, function (data) {
      $('#pay_modal_wallet_btn').html("<?php echo $wo['lang']['pay']; ?> <?php echo lui_GetCurrency($wo['config']['currency']);?>"+price);
      $('#pay_modal_wallet_btn').removeAttr('disabled');
          if (data.status == 200) {
            $('.pay_modal_wallet_alert').html("<div class='alert alert-success bg-success'><i class='fa fa-check'></i> <?php echo $wo['lang']['payment_successfully_done']; ?></div>");
            setTimeout( function (){
              location.href = data.url;
            } ,3000);
          }
          else{
            $('.pay_modal_wallet_alert').html("<div class='alert alert-danger'>"+data.message+"</div>");
          }
      });
  }
}
// register comment like
function Wo_RegisterCommentLike(comment_id) {
  var comment = $('[id=comment_' + comment_id + ']');
  comment_text = comment.find('div.comment-text').text();
  Wo_progressIconLoader(comment.find('#LikeComment'));
  $.post(Wo_Ajax_Requests_File() + '?f=posts&s=register_comment_like', {
    comment_id: comment_id,
    comment_text: comment_text
  }, function (data) {
    if(data.status == 200) {
      if (node_socket_flow == "1") {
        socket.emit("comment_notification", { comment_id: comment_id, user_id: _getCookie("user_id"), type: "added" });
      }
      <?php if ($wo['config']['website_mode'] != 'twitter' && $wo['config']['website_mode'] != 'instagram' && $wo['config']['website_mode'] != 'askfm') { ?>
      if (data.dislike == 1) {
          comment.find("#comment-wonders").text(data.wonders_c);
          comment.find("#WonderComment").html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-down"><path d="M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 0-2 1.7l-1.38 9a2 2 0 0 0 2 2.3zm7-13h2.67A2.31 2.31 0 0 1 22 4v7a2.31 2.31 0 0 1-2.33 2H17"></path></svg>');
      }
      <?php } ?>
      comment.find("#LikeComment").html("<?php echo GetModeBtn('liked_comment'); ?>").fadeIn(150);
      comment.find("#comment-likes").text(data.likes);
    } else {
      if (node_socket_flow == "1") {
        socket.emit("comment_notification", { comment_id: comment_id, user_id: _getCookie("user_id"), type: "removed" });
      }
      comment.find("#LikeComment").html("<?php echo GetModeBtn('like_comment'); ?>").fadeIn(150);
      comment.find("#comment-likes").text(data.likes);
    }
  });
}

<?php if ($wo['config']['website_mode'] == 'linkedin') { ?>
function OpenToModal(self){
  if ($(self).val() == 'finding_a_job') {
    $('#finding_a_job_modal').modal('show');
  }
  else if($(self).val() == 'providing_services'){
    $('#providing_services_modal').modal('show');
    $('#providing_services_input').tagsinput({});
  }
  else if($(self).val() == 'hiring'){
    $('#create_hiring_modal').modal('show');
  }
  else{
    $('#finding_a_job_modal').modal('hide');
    $('#providing_services_modal').modal('hide');
    $('#create_hiring_modal').modal('hide');
  }
}
<?php } ?>
function SubmitAjaxForm(name){
  $(name).submit();
}
function Wo_LoadMoreApplyJobs(){
    var after_id = ($(".job_apply").length > 0) ? $(".job_apply").last().attr('data-job-apply') : 0;
    var job_id = $('.apply_job_info').attr('data_apply_job');
    if (!after_id) { return false;}
    Wo_progressIconLoader($('#load_more_nearby_users'));
    $.ajax({
      url: Wo_Ajax_Requests_File(),
      type: 'GET',
      dataType: 'json',
      data: {
        f:'job',
        s:'load',
        offset:after_id,
        job_id:job_id
      },
    })
    .done(function(data) {

          if (data['status'] == 200){
            $(".apply_job_container").append(data.html);
            $("[data-toggle]").tooltip();
            $("#load_more_nearby_users").html('<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path></svg></span> <?php echo $wo['lang']['load_more']; ?>');

          }
          else{
            $("#load_more_nearby_users").html('<?php echo $wo['lang']['no_result']; ?>');
          }
    })
    .fail(function() {
      console.log("error");
    })
  }
  var create_bar = $('.create-product-bar');
  var create_percent = $('.create-product-percent');

  $('form.edit-job-form').ajaxForm({
      url: Wo_Ajax_Requests_File() + '?f=job&s=edit_job',
      beforeSend: function() {
       var percentVal = '0%';
       create_bar.width(percentVal);
       create_percent.html(percentVal);


        $('.edit-job-form').find('.last-sett-btn .ball-pulse').fadeIn(100);
      },
      uploadProgress: function (event, position, total, percentComplete) {
         var percentVal = percentComplete + '%';
         create_bar.width(percentVal);
         $('.edit-job-form').find('.create-product-progress').slideDown(200);
         create_percent.html(percentVal);
      },
      success: function(data) {
       if (data.status == 200) {
         $('.edit-job-form').find('.app-general-alert').html("<div class='alert alert-success'><?php echo($wo['lang']['job_successfully_edited']) ?></div>");
           $('.edit-job-form').find('.alert-success').fadeIn(300);
           setTimeout(function (argument) {
            $('.edit-job-form').find('.alert-success').fadeOut(300);
            window.location.reload(true);

           },3000);
       } else {
        $('.edit-job-form').find('#create-job-modal').animate({
          scrollTop: $('html, body').offset().top //#DIV_ID is an example. Use the id of your destination on the page
      });
           $('.edit-job-form').find('.app-general-alert').html('<div class="alert alert-danger">' + data.error + '</div>');
           $('.edit-job-form').find('.alert-danger').fadeIn(300);
           setTimeout(function (argument) {
            $('.edit-job-form').find('.alert-danger').fadeOut(300);

           },3000);
       }
       $('.edit-job-form').find('.last-sett-btn .ball-pulse').fadeOut(100);
      }
  });
  // update post privacy
function Wo_UpdatePostPrivacy(post_id, privacy_type, event) {
  var post = $('#post-' + post_id);
  event.preventDefault();
  var post_privacy_container = post.find('.post-privacy');
  Wo_progressIconLoader(post_privacy_container);
  post.find('.wo_post_privacy_menu .dropdown-toggle').dropdown('toggle');
  $.get(Wo_Ajax_Requests_File(), {
    f: 'posts',
    s: 'update_post_privacy',
    post_id: post_id,
    privacy_type: privacy_type
  }, function (data) {
    if(data.status == 200) {

      if(data.privacy_type == 0) {
        post_privacy_container.html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>');
      } else if(data.privacy_type == 1) {
        post_privacy_container.html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>');
      } else if(data.privacy_type == 2) {
        post_privacy_container.html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>');
      } else if(data.privacy_type == 3) {
        post_privacy_container.html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>');
      } else if(data.privacy_type == 4) {
        post_privacy_container.html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather" data-toggle="tooltip" title="" data-original-title="Anonymous"><path fill="currentColor" d="M12,3C9.31,3 7.41,4.22 7.41,4.22L6,9H18L16.59,4.22C16.59,4.22 14.69,3 12,3M12,11C9.27,11 5.39,11.54 5.13,11.59C4.09,11.87 3.25,12.15 2.59,12.41C1.58,12.75 1,13 1,13H23C23,13 22.42,12.75 21.41,12.41C20.75,12.15 19.89,11.87 18.84,11.59C18.84,11.59 14.82,11 12,11M7.5,14A3.5,3.5 0 0,0 4,17.5A3.5,3.5 0 0,0 7.5,21A3.5,3.5 0 0,0 11,17.5C11,17.34 11,17.18 10.97,17.03C11.29,16.96 11.63,16.9 12,16.91C12.37,16.91 12.71,16.96 13.03,17.03C13,17.18 13,17.34 13,17.5A3.5,3.5 0 0,0 16.5,21A3.5,3.5 0 0,0 20,17.5A3.5,3.5 0 0,0 16.5,14C15.03,14 13.77,14.9 13.25,16.19C12.93,16.09 12.55,16 12,16C11.45,16 11.07,16.09 10.75,16.19C10.23,14.9 8.97,14 7.5,14M7.5,15A2.5,2.5 0 0,1 10,17.5A2.5,2.5 0 0,1 7.5,20A2.5,2.5 0 0,1 5,17.5A2.5,2.5 0 0,1 7.5,15M16.5,15A2.5,2.5 0 0,1 19,17.5A2.5,2.5 0 0,1 16.5,20A2.5,2.5 0 0,1 14,17.5A2.5,2.5 0 0,1 16.5,15Z"></path></svg>');
      } else if(data.privacy_type == 5) {
        <?php if ($wo['config']['website_mode'] == 'linkedin') { ?>
          post_privacy_container.html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="feather"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>');
        <?php } ?>
      } else {
        return false;
      }
    }
  });
}
function SearchSkill(word){
  $.post(Wo_Ajax_Requests_File()+"?f=get_skills", {
    word: word
  }, function (data) {
    if (data.status == 200 && data.html != '') {
      $('.skills_result').html(data.html);
    }
    else{
      $('.skills_result').html('');
    }
  });
}
function AddToSkill(self){
  setTimeout(function(){
    $($('.skills_div .bootstrap-tagsinput .label-info span')[$('.skills_div .bootstrap-tagsinput .label-info span').length - 1]).click();
    $('.skills_result').html('');
    $('#skills').tagsinput('add', $(self).text());
  }, 200);
}
function SearchLanguages(word){
  $.post(Wo_Ajax_Requests_File()+"?f=get_languages", {
    word: word
  }, function (data) {
    if (data.status == 200 && data.html != '') {
      $('.languages_result').html(data.html);
    }
    else{
      $('.languages_result').html('');
    }
  });
}
function AddToLang(self){
  setTimeout(function(){
    $($('.languages_div .bootstrap-tagsinput .label-info span')[$('.languages_div .bootstrap-tagsinput .label-info span').length - 1]).click();
    $('.languages_result').html('');
    $('#languages').tagsinput('add', $(self).text());
  }, 200);
}
function ShowProductReviews(id){
  $('#show_product_reviews_modal').modal('show');
  $.post(Wo_Ajax_Requests_File() + '?f=products&s=get_reviews&hash=' + $('.main_session').val(), {
    id: id
  }, function (data) {
    if (data.status == 200 && data.html != '') {
      $('#show_product_reviews_modal_info_load').slideDown();
      $('#show_product_reviews_modal_info').html(data.html);
    }
    else{
      $('#show_product_reviews_modal_info').html('<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17,9H7V7H17M17,13H7V11H17M14,17H7V15H14M12,3A1,1 0 0,1 13,4A1,1 0 0,1 12,5A1,1 0 0,1 11,4A1,1 0 0,1 12,3M19,3H14.82C14.4,1.84 13.3,1 12,1C10.7,1 9.6,1.84 9.18,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3Z"></path></svg> <?php echo $wo['lang']['no_available_data']; ?></div>');
    }
  });
}
function Wo_LoadMoreUserProducts(user_id){
  id = $('.load_user_products:last').attr('id');
  $('#load_more_users_products').html('<?php echo($wo['lang']['please_wait']) ?>');
  $('#load_more_users_products').attr('disabled', 'true');
  $.post(Wo_Ajax_Requests_File() + '?f=products&s=load_users_products&hash=' + $('.main_session').val(), {
    id: id,
    user_id: user_id,
  }, function (data) {
    $('#load_more_users_products').html('<?php echo($wo['lang']['load_more']) ?>');
    $('#load_more_users_products').removeAttr('disabled');
    if (data.status == 200 && data.html != '') {
      $('#products-list').append(data.html);
    }
    else{
      $('#load_more_users_products').slideUp();
    }
  });
}
function Wo_OpenBannedMenu(type = 'notification'){
  if (type == 'notification') {
    $('.turn-off-sound').remove();
    $('#notification-list').html("<div class='empty_state'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'><path d='M18.586 20H4a.5.5 0 0 1-.4-.8l.4-.533V10c0-1.33.324-2.584.899-3.687L1.393 2.808l1.415-1.415 19.799 19.8-1.415 1.414L18.586 20zM6.408 7.822A5.985 5.985 0 0 0 6 10v8h10.586L6.408 7.822zM20 15.786l-2-2V10a6 6 0 0 0-8.99-5.203L7.56 3.345A8 8 0 0 1 20 10v5.786zM9.5 21h5a2.5 2.5 0 1 1-5 0z' fill='currentColor'/></svg><?php echo($wo['lang']['your_notifications_because_you_were_banned']); ?></div>");
  }
  else if(type == 'message'){
    $('#messages-list').html("<div class='empty_state'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'><path d='M6.455 19L2 22.5V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H6.455zM4 18.385L5.763 17H20V5H4v13.385zM13.414 11l2.475 2.475-1.414 1.414L12 12.414 9.525 14.89l-1.414-1.414L10.586 11 8.11 8.525l1.414-1.414L12 9.586l2.475-2.475 1.414 1.414L13.414 11z' fill='currentColor'/></svg><?php echo($wo['lang']['your_messages_because_you_were_banned']); ?></div>");
  }
  else if(type == 'requests'){
    $('#requests-list').html("<div class='empty_state'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'><path d='M14 14.252v2.09A6 6 0 0 0 6 22l-2-.001a8 8 0 0 1 10-7.748zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm7 6.586l2.121-2.122 1.415 1.415L20.414 19l2.122 2.121-1.415 1.415L19 20.414l-2.121 2.122-1.415-1.415L17.586 19l-2.122-2.121 1.415-1.415L19 17.586z' fill='currentColor'/></svg><?php echo($wo['lang']['your_requests_because_you_were_banned']); ?></div>");
  }
}
function AddYandexResult(target,self,result_co) {
  $(target).val($(self).text());
  $(result_co).html('');
}
</script>