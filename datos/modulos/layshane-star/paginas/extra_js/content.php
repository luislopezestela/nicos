<script>
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
    switch (reaction){
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
      var tex_nigtday = document.getElementsByClassName('night-mode-text');
      var tex_nigtdaymode = document.getElementsByClassName('night_mode_layshane');
      if (tex_nigtdaymode.length > 0) {
        $('.night_mode_layshane').attr('data-mode', 'day');
      }
      if (tex_nigtday.length > 0) {
        $(tex_nigtday).text('<?php echo $wo['lang']['day_mode']?>');
      }
  } else {
      $('#night-mode-css').remove();
      $('#night_mode_toggle').attr('data-mode', 'night');
      $('#night-mode-text').text('<?php echo $wo['lang']['night_mode']?>');
      var tex_nigtday = document.getElementsByClassName('night-mode-text');
      var tex_nigtdaymode = document.getElementsByClassName('night_mode_layshane');
      if (tex_nigtdaymode.length > 0) {
        $('.night_mode_layshane').attr('data-mode', 'night');
      }
      if (tex_nigtday.length > 0) {
        $(tex_nigtday).text('<?php echo $wo['lang']['night_mode']?>');
      }
  }
  $.post(Wo_Ajax_Requests_File() + '?mode=' + mode);
});


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

$(document).on('change', '#i_currently_work', function(event) {
  if ($('#i_currently_work').is(":checked")) {
    $('#experience_end_date').css('display', 'none');
  }
  else{
    $('#experience_end_date').css('display', 'block');
  }
});

function openInNewTab(url, id) {
   var myWindow = window.open(url, "", "width=600,height=700");
   return false;
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

function SendSeen(recipient_id) {
  var chat_container = $('.chat-tab').find('.chat_main_'+recipient_id);
  var last_id = chat_container.find('.messages-text:last').attr('data-message-id');
    <?php if ($wo['config']['node_socket_flow'] == "1"){ ?>
      socket.emit("seen_messages", {user_id: _getCookie("user_id"), recipient_id: recipient_id,message_id: last_id}, (data)=>{})
    <?php }else{ ?>
      $.post( Wo_Ajax_Requests_File() + '?f=chat&s=seen&hash=' + $('.main_session').val(), {recipient_id: recipient_id}, function(data, textStatus, xhr) {});
    <?php } ?>
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
function ChangeQtya(self,product_id,prod_co) {
  if (product_id){
      $.post(Wo_Ajax_Requests_File() + '?f=product_compra_list_bdd', {value: product_id,color:prod_co}, function (data) {
        if (data.status==200) {
          if (data.total_lista>0) {
            $('.count_items_carrito').html('<span class="count_items_carrito_cou">'+data.total_lista+'</span>');
          }else{
            $('.count_items_carrito').html('');
          }
          $('.total_items_order').html(data.total_lista);
        }
        if (data.sin_stock==1) {
          $('.add_product_compra_list').attr('disabled', "disabled");
        }
      });
  }
  LoadCheckout();
}
function ChangeQtyb(self,product_id,prod_co) {
  if (product_id){
      $.post(Wo_Ajax_Requests_File() + '?f=product_compra_list_bdd_del', {value: product_id,color:prod_co}, function (data) {
        if (data.status==200) {
          if (data.total_lista>0) {
            $('.count_items_carrito').html('<span class="count_items_carrito_cou">'+data.total_lista+'</span>');
          }else{
            $('.count_items_carrito').html('');
          }
          $('.total_items_order').html(data.total_lista);
        }
        if (data.sin_stock==1) {
          $('.add_product_compra_list').attr('disabled', "disabled");
        }else{
          $('.add_product_compra_list').attr('disabled', "");
        }
      });
  }
  LoadCheckout();
}
function ChangeQtyc(self,product_id,prod_co) {
  qty = $(self).val();
  if (product_id){
      $.post(Wo_Ajax_Requests_File() + '?f=product_compra_list_bdd_num', {cantidad:qty, value: product_id,color:prod_co}, function (data) {
        if (data.status==200) {
          if (data.total_lista>0) {
            $('.count_items_carrito').html('<span class="count_items_carrito_cou">'+data.total_lista+'</span>');
          }else{
            $('.count_items_carrito').html('');
          }
          $('.total_items_order').html(data.total_lista);
        }
        if (data.sin_stock==1) {
          $('.add_product_compra_list').attr('disabled', "disabled");
        }else{
          $('.add_product_compra_list').attr('disabled', "");
        }
      });
  }
  LoadCheckout();
}

//ChangeQtya_col 
function ChangeQtya_col(self,product_id,prod_co,atributo) {
  if (product_id){
    var atribut = atributo;
    var data = atribut;
      data['producto'] = product_id;
      data['color'] = prod_co;

      $.post(Wo_Ajax_Requests_File() + '?f=product_compra_list_bddc', data, function (data) {
        if (data.status==200) {
          if (data.total_lista>0) {
            $('.count_items_carrito').html('<span class="count_items_carrito_cou">'+data.total_lista+'</span>');
          }else{
            $('.count_items_carrito').html('');
          }
          $('.total_items_order').html(data.total_lista);
        }
        if (data.sin_stock==1) {
          $('.add_product_compra_list').attr('disabled', "disabled");
        }
      });
  }
  LoadCheckout();
}
function ChangeQtyb_col(self,product_id,prod_co,atributo) {
  if (product_id){
    var atribut = atributo;
    var data = atribut;
      data['producto'] = product_id;
      data['color'] = prod_co;
      $.post(Wo_Ajax_Requests_File() + '?f=product_compra_list_bddc_del', data, function (data) {
        if (data.status==200) {
          if (data.total_lista>0) {
            $('.count_items_carrito').html('<span class="count_items_carrito_cou">'+data.total_lista+'</span>');
          }else{
            $('.count_items_carrito').html('');
          }
          $('.total_items_order').html(data.total_lista);
        }
        if (data.sin_stock==1) {
          $('.add_product_compra_list').attr('disabled', "disabled");
        }else{
          $('.add_product_compra_list').attr('disabled', "");
        }
      });
  }
  LoadCheckout();
}
function ChangeQtyc_col(self,product_id,prod_co,atributo) {
  qty = $(self).val();
  if (product_id){
    var atribut = atributo;
    var data = atribut;
      data['producto'] = product_id;
      data['color'] = prod_co;
      data['cantidad'] = qty;

      $.post(Wo_Ajax_Requests_File() + '?f=product_compra_list_bddc_num', data, function (data) {
        if (data.status==200) {
          if (data.total_lista>0) {
            $('.count_items_carrito').html('<span class="count_items_carrito_cou">'+data.total_lista+'</span>');
          }else{
            $('.count_items_carrito').html('');
          }
          $('.total_items_order').html(data.total_lista);
        }
        if (data.sin_stock==1) {
          $('.add_product_compra_list').attr('disabled', "disabled");
        }else{
          $('.add_product_compra_list').attr('disabled', "");
        }
      });
  }
  LoadCheckout();
}
function ChangeQty(self,product_id) {
  qty = $(self).val();
  $.post(Wo_Ajax_Requests_File() + '?f=products&s=change_qty&hash=' + $('.main_session').val(), {product_id: product_id,qty: qty}, function(data, textStatus, xhr) {
    $('.count_items_carrito_cou').html(data.totalunidades);
    LoadCheckout();
  });
}

function order_pl(current,lista) {
  $.ajax({
    url: Wo_Ajax_Requests_File() + '?f=comprar_producto_b&s='+current+'&hash=' + $('.main_session').val(), 
    data: {lista: lista},
    type: 'POST',
    success: function (data) {
      console.log(data)
    }
  })
}
function order_pl_add(current) {
  $.ajax({
    url: Wo_Ajax_Requests_File() + '?f=comprar_producto_b&s='+current+'&hash=' + $('.main_session').val(), 
    type: 'POST',
    success: function (data) {
      console.log(data)
    }
  })
}
function order_pl_addres_type(current) {
  var docs = $(current).val();
  $.ajax({
    url: Wo_Ajax_Requests_File() + '?f=order_opcion&s=opcion_compra&hash=' + $('.main_session').val(),
    data: {modo_compra:docs},
    type: 'POST',
    success: function (data) {
      console.log(data)
    }
  })
  LoadCheckout();
}

function LoadCheckout() {
  $('#load_checkout').click();
}
function RemoveProductFromCart(id) {
  $.post(Wo_Ajax_Requests_File() + '?f=products&s=remove_cart&hash=' + $('.main_session').val(), {product_id: id}, function(data, textStatus, xhr) {
    $('.count_items_carrito_cou').html(data.totalunidades);
  });
}
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

function SubmitAjaxForm(name){
  $(name).submit();
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

</script>