<!DOCTYPE html>
<html lang="<?=($wo['lang_attr']); ?>">
<head>
  <title><?=$wo['title'];?></title>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  <meta name="application-name" content="<?=$wo['config']['siteName'];?>">
  <meta name="color-scheme" content="light">
  <meta name="theme-color" content="<?=$wo['config']['header_background'];?>"/>
  <meta name="apple-mobile-web-app-status-bar-style" content="<?=$wo['config']['header_background'];?>">
  <meta name="msapplication-navbutton-color" content="<?=$wo['config']['header_background'];?>">
  <meta name="title" content="<?=$wo['title'];?>">
  <meta name="description" content="<?=$wo['description'];?>">
  <meta name="keywords" content="<?=$wo['keywords'];?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
  <meta name="pinterest-rich-pin" content="false" />
  <?=$wo['lang_og_meta'];
if($wo['page']=='maintenance'){ ?>
  <meta name="robots" content="noindex">
  <meta name="googlebot" content="noindex">
<?php } if($wo['page'] == 'welcome') { ?>
  <meta property="og:title" content="<?php echo $wo['title'];?>" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="<?php echo $wo['config']['site_url'];?>" />
  <meta property="og:image" content="<?php echo $wo['config']['theme_url'];?>/img/og.jpg" />
  <meta property="og:image:secure_url" content="<?php echo $wo['config']['theme_url'];?>/img/og.jpg" />
  <meta property="og:description" content="<?php echo $wo['description'];?>" />
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="<?php echo $wo['title'];?>" />
  <meta name="twitter:description" content="<?php echo $wo['description'];?>" />
  <meta name="twitter:image" content="<?php echo $wo['config']['theme_url'];?>/img/og.jpg" />
<?php } if($wo['page'] == 'timeline') { ?>
  <meta property="og:type" content="article" />
  <meta property="og:image" content="<?php echo $wo['user_profile']['avatar']?>" />
  <meta property="og:image:secure_url" content="<?php echo $wo['user_profile']['avatar'];?>" />
  <meta property="og:description" content="<?php echo $wo['description'];?>" />
  <meta property="og:title" content="<?php echo $wo['title'];?>" />
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="<?php echo $wo['title'];?>" />
  <meta name="twitter:description" content="<?php echo $wo['description'];?>" />
  <meta name="twitter:image" content="<?php echo $wo['user_profile']['avatar']; ?>" />
<?php if($wo['user_profile']['share_my_data'] == 0) { ?>
  <meta name="robots" content="noindex,nofollow">
  <meta name="googlebot" content="noindex">
<?php } } if(!empty($wo['story']) && !empty($wo['story']['photo_album'])) {  ?>
  <meta property="og:type" content="album" />
  <meta property="og:image" content="<?php echo $wo['story']['photo_album'][0]['image'];?>" />
  <meta name="twitter:image" content="<?php echo $wo['story']['photo_album'][0]['image'];?>" />
<?php } if($wo['page'] == 'read-blog'){?>
  <meta property="og:type" content="article" />
  <meta property="og:image" content="<?php echo $wo['article']['thumbnail']?>" />
  <meta property="og:image:secure_url" content="<?php echo $wo['article']['thumbnail']?>" />
  <meta property="og:description" content="<?php echo $wo['article']['description'];?>" />
  <meta property="og:title" content="<?php echo $wo['article']['title'];?>" />
  <meta property="og:url" content="<?php echo $wo['article']['url'];?>" />
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="<?php echo $wo['article']['title'];?>" />
  <meta name="twitter:description" content="<?php echo $wo['article']['description'];?>"/>
  <meta name="twitter:image" content="<?php echo $wo['article']['thumbnail']; ?>"/>
<?php }
if(!empty($wo['story']['postFile'])){echo lui_LoadPage('header/og-meta');}
if(!empty($wo['story']['product_id'])){echo lui_LoadPage('header/og-meta-4');}
if(!empty($_SERVER) && !empty($_SERVER['REQUEST_URI'])){
  $link_text = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>
  <link rel="canonical" href="<?=($link_text)?>"/>
<?php } ?>
<?php echo (!empty($wo['config']['tagManager_head'])) ? $wo['config']['tagManager_head'] : ''; ?>
  <link rel="shortcut icon" type="image/png" href="<?php echo $wo['config']['theme_url'];?>/img/icon.png"/>
<?php if($wo['page'] == 'create_blog' || $wo['page'] == 'edit-blog' || $wo['page'] == 'edit_product' || $wo['page'] == 'create_product') { ?>
  <script preload src="<?php echo $wo['config']['theme_url'];?>/javascript/tinymce2/js/tinymce/tinymce.min.js?version=<?php echo $wo['config']['version']; ?>"></script>
<?php }?>
 <style type="text/css">
   .luis_header_present{background-repeat:no-repeat;background-position:top;background-size:cover;position:absolute;bottom:0;left:0;top:0;width:100%;height:100%;display:block;}
.luis_header_seccion .luis_header_present_wrap, .luis_header_seccion:hover .luis_header_present_wrap{border-radius:0 0 0 16vw;}
.luis_header_present_wrap {overflow:hidden;position:absolute;top:0;right:0;bottom:0;left:0;}
div.luis_header_seccion_b.luis_header_seccion{background-image: linear-gradient(200deg,rgba(0,0,0,0) 62%,rgba(22,29,67,0.3) 100%)!important;}
.luis_header_seccion.luis_header_seccion_b{display:flex;flex-wrap:wrap;flex-direction:column;padding-bottom:0px;padding-left:0px;height:100vh;}
.luis_header_seccion{border-radius:0 0 0 16vw;overflow:hidden;}
.luis_header_content{position:relative;z-index:1;}
.luis_content_rows{width:80%;max-width:1080px;margin:auto;position:relative;padding-right:10vw}
.luis_content_rows .luis_content_column.luis_column_child,.luis_content_rows .luis_content_column:last-child,.luis_content_column.luis_column_child,.luis_content_column:last-child{margin-right:0!important;}
.luis_content_column{float:left;background-size:cover;background-position:50%;position:relative;z-index:2;min-height:1px;}
.luis_col_child_text h6{user-select:none;font-family:'Open Sans',Helvetica,Arial,Lucida,sans-serif;font-weight:700;text-transform:uppercase;letter-spacing:5px;line-height:1.6em;}
.luis_col_child_text{text-shadow:0em 0em 3em rgba(22,29,67,0.24);}
.luis_text_lay,.luis_text_lay h1,.luis_text_lay span{color:#fff!important;text-shadow: 0em 0em 3em rgba(22,29,67,0.24);}
.luis_col_child_text h1{text-shadow: 0em 0em 3em rgba(22,29,67,0.24);user-select:none;transition:all .5s;font-family:'Prata',serif;font-size:140px;font-weight:500;line-height:1.4em;padding-bottom:10px;}
.animation_zoom_one{animation: zoom-in-zoom-out 1s linear;}
@keyframes zoom-in-zoom-out{0%{transform:scale(30%, 10%);}100%{transform:none;}}
.contenido_sevicios{display:flex;align-self:flex-end;margin-top:0;margin-bottom:130px;padding:27px 0;}
.sevicios_columnas{display:flex;width:calc(100% / 4);}
.sevicios_columnas span{text-decoration:none;color:#fff;border-width:0px!important;letter-spacing:5px;font-size:14px;font-family:'Open Sans',Helvetica,Arial,Lucida,sans-serif!important;font-weight:700!important;text-transform:uppercase!important;background-color:rgba(0,0,0,0);}
 </style>
  <link async rel="stylesheet" href="<?=$wo['config']['theme_url'].'/stylesheet/style.css';?><?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>">
  <link async rel="stylesheet" href="<?=$wo['config']['theme_url'].'/stylesheet/tooltip.css';?><?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>">
  <link async rel="stylesheet" href="<?=$wo['config']['theme_url'].'/stylesheet/lopzcss.css';?><?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>">
  <link async rel="stylesheet" href="<?=$wo['config']['theme_url'].'/stylesheet/luislopezes.css';?><?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>">
  <script preload src="<?php echo $wo['config']['theme_url'];?>/javascript/jquery-3.7.1.min.js?version=<?php echo $wo['config']['version']; ?>"></script>
 <script type="text/javascript">
    function Wo_Ajax_Requests_File(){
      return "<?php echo $wo['config']['site_url'].'/requests.php';?>"
    }
    <?php if ($wo['config']['smooth_loading'] == 1) { ?>
      function Wo_Ajax_Requests_Filee(){
        return "<?php echo $wo['config']['site_url'].'/ajax_loading.php';?>"
      }
      var websiteUrl = "<?php echo $wo['config']['site_url'];?>";
      $(function(){
        <?php if ($wo['loggedin'] == true && $wo['config']['find_friends'] == 1) {?>
          <?php if ($wo['loggedin'] == true): ?>
            <?php if ($wo['user']['last_location_update'] < time()): ?>
              if (navigator.geolocation) {
                var location = navigator.geolocation.getCurrentPosition(Wo_UpdateLocation);
              }
            <?php endif; ?>
          <?php endif; ?>
        <?php } ?>

        var box = $('#contnet');
        var ISAPI = $('#ISAPI').val();
        $(document).on('click', 'a[data-ajax]', function(e) {
          var corousel_Data = document.getElementById('carousel__content');
          if(document.body.contains(corousel_Data)){
            guardarPosicionHorizontal();
          }
          
          $('.nav li a').removeClass('current');
          $(this).addClass('current');
          if($(this).attr('data')=="home"){
            $('.nav').removeClass('active');
            $('body').css({'margin-top': 0+'px'});
          }else{
            $('.nav').addClass('active');
            $('body').css({'margin-top': 70+'px'});
          }
          if(typeof(check_wallet)!='undefined') {
            clearInterval(check_wallet);
          }
          Wo_CloseLightbox();
          $('body').removeAttr('no-more-posts');
          if ($('.postText').length) {
            if ($('.postText').val().length > 0) {
              if (!confirm("<?php echo html_entity_decode($wo['lang']['havent_finished_post'], ENT_QUOTES)?>")) {
                return false;
              }else{
                $('.postText').val("");
              }
            }
          }
          Wo_StartBar();
          window.post = 0;
          var url = $(this).attr('data-ajax');
          e.preventDefault();
          if(!ISAPI){
            if(url == '?index.php?link1=home') {
              $get_value = $('#json-data').val();
              if($get_value) {
                $('#load-more-posts').hide();
                json_data = JSON.parse($('#json-data').val());
                if(json_data.page=='home') {
                  window.history.pushState({state:'new'},'', websiteUrl);
                  $("html, body").animate({ scrollTop: 0 }, 100);
                  $('.user-details, .pac-container, .lightbox-container').remove();
                  Wo_clearPRecording();
                  Wo_CleanRecordNodes();
                  Wo_stopRecording();
                  Wo_StopLocalStream();
                  return false;
                }
              }
            }
            $.post(Wo_Ajax_Requests_Filee() + url, {url:url}, function (data) {
              $('.user-details').remove();
              json_data = JSON.parse($(data).filter('#json-data').val());
              if(json_data.welcome_page == 1 || json_data.redirect == 1) {
                window.location.href = websiteUrl;
                return false;
              }
              if($('.message-option-btns').length > 0) {
                if(json_data.url == 'index.php?link1=home') {
                  window.location.href = websiteUrl;
                }else{
                  window.location.href = json_data.url;
                }
                return false;
              }
              box.html(data);
              if(json_data.is_css_file == 1){
                $('.styled-profile').remove();
                $('footer').append(json_data.css_file);
                $('.extra-css').html(json_data.css_file_header);
              }else{
                $('.styled-profile').attr('href', '');
                $('.extra-css').empty();
              }
              Wo_clearPRecording();
              Wo_CleanRecordNodes();
              Wo_stopRecording();
              Wo_StopLocalStream();
              if(json_data.page == 'home') {
                $('.filterby li.filter-by-li').on('click', function (e) {
                  $('.filterby li.filter-by-li').each(function(){
                    $(this).removeClass('avtive');
                    $(this).find('i').addClass('hidden');
                  });
                  $(this).find('i').removeClass('hidden');
                  $(this).addClass('avtive');
                });
                window.history.pushState({state:'new'},'', websiteUrl);
              }else{
                $('.nav').addClass('active');
                window.history.pushState({state:'new'},'', json_data.url);
              }
              $('.postText').autogrow({vertical: true, horizontal: false, height: 200});
              window.onpopstate = function(event) {
                $(window).unbind('popstate');
                window.location.href = document.location;
              };
              document.title = decodeHtml(json_data.title);
              document_title = decodeHtml(json_data.title);
              $("html, body").animate({ scrollTop: 0 }, 150);
              var bodyalto = $(window).height();
              $('.luis_header_present').css({'height': bodyalto+350+'px'});
              Wo_FinishBar();
              $('#hidden-content').empty();
              $(document).ready(function(){
                $('div.leftcol').theiaStickySidebar({additionalMarginTop: 70});
                var corousel_Datas = document.getElementById('carousel__content');
                if(document.body.contains(corousel_Datas)){
                  restaurarPosicionHorizontal();
                }
                
              });
              
              $('#users-reacted-modal').modal("hide");
            }).fail(function() {
              <?php if ($wo['config']['membership_system'] == 1) { ?>
                window.location.href = "<?php echo lui_SeoLink('index.php?link1=go-pro'); ?>";
              <?php } ?>
            })
            .always(function() {
              Wo_FinishBar();
            });
            $('.user-details, .pac-container, .lightbox-container').remove();
          }
        });
      });
    <?php } ?>
  </script>
  <?php echo (!empty($wo['config']['googleAnalytics'])) ? $wo['config']['googleAnalytics'] : ''; ?>
  <?php echo lui_LoadPage('style') ?>
  <?php if ($_COOKIE['mode'] == 'night') { ?>
    <link rel="stylesheet" href="<?php echo $wo['config']['theme_url'];?>/stylesheet/dark.css<?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>" id="night-mode-css">
  <?php } ?>
  <?php if($wo['config']['googleLogin'] != 0): ?>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
  <?php endif; ?>
  <script preload src="<?php echo $wo['config']['theme_url'];?>/javascript/socket.io.js?version=<?php echo $wo['config']['version']; ?>"></script>
      <script>
      let nodejs_system = "<?php echo $wo['config']['node_socket_flow']; ?>";
      let socket = null
      let groupChatListener = {}
      $(()=>{
        <?php if ($wo['config']['node_socket_flow'] == "1"){ $parse = parse_url($wo['config']['site_url']);?>
        var main_hash_id = $('.main_session').val();
        <?php if ($wo['config']['nodejs_ssl'] == "1") {?>
          socket = io("<?='https://'.$parse['host'].':'.$wo['config']['nodejs_ssl_port'];?>/?hash=" + main_hash_id)
        <?php } else {?>
         socket = io("<?='http://'.$parse['host'].':'.$wo['config']['nodejs_port'];?>/?hash=" + main_hash_id)
        <?php } ?>
        let recipient_ids = []
        let recipient_group_ids = []
        setTimeout(function(){
          var inputs = $("input.chat-user-id");
          $(".chat-wrapper").each(function(){
            let id = $(this).attr("class").substr("chat-wrapper".length);
            let isGroup = $(this).attr("class").substr("chat-wrapper".length).split("_").includes("group")
            if(isGroup) {
              id = id.substr(' chat_group_'.length)
              recipient_group_ids.push(id)
            } else{
              id = id.substr(' chat_'.length)
              recipient_ids.push(id)
            }
          });
          socket.emit('join', {username: "<?php echo ($wo['loggedin'] ? $wo['user']['username'] : '');?>", user_id: _getCookie('user_id'), recipient_ids, recipient_group_ids }, ()=>{
              setInterval(() => {
                socket.emit("ping_for_lastseen", {user_id: _getCookie("user_id")})
              }, 2000);
          });
         }, 2500);

        socket.on("reconnect", ()=>{
          let recipient_ids = []
          let recipient_group_ids = []
          setTimeout(function(){
            var inputs = $("input.chat-user-id");
            $(".chat-wrapper").each(function(){
              let id = $(this).attr("class").substr("chat-wrapper".length);
              let isGroup = $(this).attr("class").substr("chat-wrapper".length).split("_").includes("group")
              if(isGroup) {
                id = id.substr(' chat_group_'.length)
                recipient_group_ids.push(id)
              } else{
                id = id.substr(' chat_'.length)
                recipient_ids.push(id)
              }
            });
            socket.emit('join', {username: "<?php echo ($wo['loggedin'] ? $wo['user']['username'] : '');?>", user_id: _getCookie('user_id'), recipient_ids, recipient_group_ids }, ()=>{
                setInterval(() => {
                  socket.emit("ping_for_lastseen", {user_id: _getCookie("user_id")})
                }, 2000);
            });
          }, 3000);
        })
        socket.on("decline_call", (data) => {
          $('#re-calling-modal').addClass('calling');
          document.title = document_title;
          setTimeout(function () {
            $( '#re-calling-modal' ).remove();
            $( '.modal-backdrop' ).remove();
            $( 'body' ).removeClass( "modal-open" );
          }, 3000);
          $( '#re-calling-modal' ).remove();
          $('.modal-backdrop.in').hide();
          Wo_CloseModels();
          Wo_PlayAudioCall('stop');
          Wo_PlayVideoCall('stop');
        })
        socket.on("lastseen", (data) => {
            if (data.message_id && data.user_id) {
                  var chat_container = $('.chat-tab').find('#chat_' + data.user_id);
                  if ($('#messageId_'+data.message_id).length > 0) {
                        if (chat_container.length > 0) {
                              chat_container.find('.message-seen').hide();
                        }else{
                              $('.message-seen').hide();
                        }
                        $('#messageId_'+data.message_id).find('.message-seen').hide().html('<i class="fa fa-check"></i> <?php echo $wo["lang"]["seen"];?> (<span class="ajax-time" title="' + data.time + '">' + data.seen + '</span>)').fadeIn(300);
                        if (chat_container.length > 0) {
                              setTimeout(function(){
                                 chat_container.find('.chat-messages-wrapper').scrollTop(chat_container.find('.chat-messages-wrapper')[0].scrollHeight);
                              }, 100);
                        }else{
                           $(".messages-container").animate({
                               scrollTop: $('.messages-container')[0].scrollHeight
                           }, 200);
                        }
                  }

            }
          })
         socket.on("register_reaction", (data) => {
              if(data.status == 200) {
                  $('.post-reactions-icons-m-'+data.id).html(data.reactions);
              }
          });
          socket.on("on_user_loggedin", (data) => {
            $('#chat_' + data.user_id).find('.chat-tab-status').addClass('active');
            $("#online_" + data.user_id).find('svg path').attr('fill', '#60d465');
            $("#messages-recipient-" + data.user_id).find('.dot').css({"background-color": "#63c666"});
          });
          socket.on("on_user_loggedoff", (data) => {
            $('#chat_' + data.user_id).find('.chat-tab-status').removeClass('active');
            $("#online_" + data.user_id).find('svg path').attr('fill', '#dddddd');
            $("#messages-recipient-" + data.user_id).find('.dot').css({"background-color": "lightgray"});
          });
          socket.on("update_new_posts", (data) => {
            Wo_intervalUpdates(1);
          });
          socket.on("on_avatar_changed", (data) => {
            $("#online_" + data.user_id).find('img').attr('src', data.name);
            $("#messages-recipient-" + data.user_id).find('img').attr('src', data.name);
          });
          socket.on("on_name_changed", (data) => {
            $("#online_" + data.user_id).find('#chat-tab-id').html(data.name);
            $("#messages-recipient-" + data.user_id).find('.messages-user-name').html(data.name);
          });
          socket.on("new_notification", (data) => {
             <?php if ($wo['config']['nodejs_live_notification'] == "1") {?>
            Wo_GetLastNotification();
             <?php } ?>
            current_notifications = $('.notification-container').find('.new-update-alert').text();
            $('.notification-container').find('.new-update-alert').removeClass('hidden');
            $('.notification-container').find('.sixteen-font-size').addClass('unread-update');
            $('.notification-container').find('.new-update-alert').text(Number(current_notifications) + 1).show();
            document.getElementById('notification-sound').play();
          });
          socket.on("new_notification_removed", (data) => {
            current_notifications = $('.notification-container').find('.new-update-alert').text();
            $('.notification-container').find('.new-update-alert').removeClass('hidden');
            if (Number(current_notifications) > 0) {
               if ((Number(current_notifications) - 1) == 0) {
                  $('.notification-container').find('.new-update-alert').addClass('hidden');
                  $('.notification-container').find('.new-update-alert').addClass('hidden').text('0').hide();
               } else {
                  $('.notification-container').find('.sixteen-font-size').addClass('unread-update');
                  $('.notification-container').find('.new-update-alert').text(Number(current_notifications) - 1).show();
               }
            } else if (Number(current_notifications) == 0) {
               $('.notification-container').find('.new-update-alert').addClass('hidden');
               $('.notification-container').find('.new-update-alert').addClass('hidden').text('0').hide();
            }
          });

          socket.on("new_request", (data) => {
            current_requests= $('.requests-container').find('.new-update-alert').text();
            $('.requests-container').find('.new-update-alert').removeClass('hidden');
            $('.requests-container').find('.sixteen-font-size').addClass('unread-update');
            $('.requests-container').find('.new-update-alert').text(Number(current_requests) + 1).show();
            document.getElementById('notification-sound').play();
          });
          socket.on("new_request_removed", (data) => {
            current_requests = $('.requests-container').find('.new-update-alert').text();
            $('.requests-container').find('.new-update-alert').removeClass('hidden');
            if (Number(current_requests) > 0) {
               if ((Number(current_requests) - 1) == 0) {
                  $('.requests-container').find('.new-update-alert').addClass('hidden');
                  $('.requests-container').find('.new-update-alert').addClass('hidden').text('0').hide();
               } else {
                  $('.requests-container').find('.sixteen-font-size').addClass('unread-update');
                  $('.requests-container').find('.new-update-alert').text(Number(current_requests) - 1).show();
               }
            } else if (Number(current_requests) == 0) {
               $('.requests-container').find('.new-update-alert').addClass('hidden');
               $('.requests-container').find('.new-update-alert').addClass('hidden').text('0').hide();
            }
          });

          socket.on("messages_count", (data) => {
             current_messages_number = data.count;
             if (current_messages_number > 0) {
               $("[data_messsages_count]").text(current_messages_number).removeClass("hidden");
               $("[data_messsages_count]").attr('data_messsages_count', current_messages_number);
             } else {
               $("[data_messsages_count]").text(current_messages_number).addClass("hidden");
               $("[data_messsages_count]").attr('data_messsages_count', "0");
             }
          });
          socket.on("new_video_call", (data) => {
             Wo_intervalUpdates(1);
          });
          socket.on("load_comment_replies", (data) => {
             Wo_ViewMoreReplies(data.comment_id);
          });


        socket.on("color-change", (data)=>{
          if (data.sender == <?php echo ($wo['loggedin'] && !empty($wo['user']) ? $wo['user']['user_id'] : 0);?>) {
            $(".chat_" + data.id).find('.outgoing .message-text, .outgoing .message-media').css('background', data.color);
            $(".chat_" + data.id).find('.outgoing .message-text').css('color', '#fff');
            $(".chat_" + data.id).find('.select-color path').css('fill', data.color);
            $(".chat_" + data.id).find('#color').val(data.color);
            $(".chat_" + data.id).find('.close-chat a, .close-chat svg').css('color', data.color);
          }
          let user_id = $('#user-id').val();
          if(""+user_id === ""+data.id) {
            if(data.sender == <?php echo ($wo['loggedin'] && !empty($wo['user']) ? $wo['user']['user_id'] : 0);?>){
                  $('.send-button').css('background-color', data.color);
                  $('.send-button').css('border-color', data.color);
                  $('#wo_msg_right_prt .message-option-btns .btn svg').css('color', data.color);
                  $(".messages-container").find(".pull-right").find(".message").css('background-color', data.color);
                  $(".messages-container").find(".pull-right").find(".message-text").css('background-color', data.color)
              }
          }
        })
        var new_current_messages = 0;
        socket.on("private_message", (data)=>{
          $('#chat_' + data.sender).find('.online-toggle-hdr').addClass('white_online');;
          var chat_container = $('.chat-tab').find('.chat_main_' + data.id);
          if (chat_container.length > 0) {
             chat_container.find('.chat-messages-wrapper').find("div[class*='message-seen']").empty();
             chat_container.find('.chat-messages-wrapper').find("div[class*='message-typing']").empty();
             chat_container.find('.chat-messages-wrapper').append(data.messages_html);
             setTimeout(function(){
                  chat_container.find('.chat-messages-wrapper').scrollTop(chat_container.find('.chat-messages-wrapper')[0].scrollHeight);
               }, 100);
             if (data.sender == <?php echo ($wo['loggedin'] && !empty($wo['user']) ? $wo['user']['user_id'] : 0);?>) {
               $(".chat_" + data.id).find('.outgoing .message-text, .outgoing .message-media').css('background', data.color);
               $(".chat_" + data.id).find('.outgoing .message-text').css('color', '#fff');
               $(".chat_" + data.id).find('.select-color path').css('fill', data.color);
               $(".chat_" + data.id).find('#color').val(data.color);
               $(".text-sender-container .red-list").css('background', data.color);
               $(".text-sender-container .btn-file").css('background', data.color);
               $(".text-sender-container .btn-file").css('border-color', data.color);
             }
          } else {
            current_number = $('#online_' + data.id).find('.new-message-alert').text();
            $('#online_' + data.id).find('.new-message-alert').html(Number(current_number) + 1).show();

          }
          if (!chat_container.find("#sendMessage").is(":focus")) {
            if(data.sender != <?php echo ($wo['loggedin'] && !empty($wo['user']) ? $wo['user']['user_id'] : 0);?>){
              var promise = document.getElementById('message-sound').play();
              if (promise !== undefined) {
                promise.then(_ => {
                  document.getElementById('message-sound').play();
                }).catch(error => {
                });
              }
                
            }
          }
          if (!chat_container.find('#sendMessage').is(':focus') && chat_container.length == 0) {
             new_current_messages = new_current_messages + 1;
             current_messages_number = Number($("[data_messsages_count]").attr('data_messsages_count')) + 1;
             $("[data_messsages_count]").text(current_messages_number).removeClass("hidden");
             $("[data_messsages_count]").attr('data_messsages_count', current_messages_number);
             document.title = 'Nuevo mensaje | ' + document_title;
          }

        })

        socket.on("group_message", (data)=>{
              var chat_messages_wrapper = $('.group-messages-wrapper-'+data.id);
              if (data.status == 200) {
              if ($(".group-messages-wrapper-"+data.id).find('.no_message').length > 0) {
                $(".group-messages-wrapper-"+data.id).find('.chat-messages').html(data.html);
              }else{
                $(".group-messages-wrapper-"+data.id).find('.chat-messages').append(data.html);
              }
              if ($('.chat_group_'+data.id).length == 0) {
              current_messages_number = Number($("[data_messsages_count]").attr('data_messsages_count')) + 1;
              $("[data_messsages_count]").text(current_messages_number).removeClass("hidden");
              $("[data_messsages_count]").attr('data_messsages_count', current_messages_number);
              document.title = 'Nuevo mensaje | ' + document_title;
              document.getElementById('message-sound').play();
            }

              chat_messages_wrapper.scrollTop(chat_messages_wrapper[0].scrollHeight);
            }
          })

        <?php
        }
        ?>
      });

  </script>
  <?php if ($wo['config']['job_system'] == 1 || $wo['config']['blogs'] == 1 || $wo['config']['website_mode'] == 'linkedin') { ?>
    <?php if($wo['page'] == 'create_blog' || $wo['page'] == 'edit-blog' || $wo['page'] == 'edit_product') { ?>
    <script src="<?php echo $wo['config']['theme_url'];?>/javascript/bootstrap-tagsinput-latest/src/bootstrap-tagsinput.js?version=<?php echo $wo['config']['version']; ?>"></script>
    <?php } ?>
  <?php } ?>
  <script src="<?php echo $wo['config']['theme_url'];?>/javascript/flickity.pkgd.min.js?version=<?php echo $wo['config']['version']; ?>"></script>
  <link rel="stylesheet" href="<?php echo $wo['config']['theme_url'];?>/stylesheet/flatpickr.min.css?version=<?php echo $wo['config']['version']; ?>">
  <script src="<?php echo $wo['config']['theme_url'];?>/javascript/flatpickr.js?version=<?php echo $wo['config']['version']; ?>"></script>
</head>

<body <?php if ($wo['config']['chatSystem'] == 0) { ?> chat-off="true" <?php } ?>>
  <?php echo (!empty($wo['config']['tagManager_body'])) ? $wo['config']['tagManager_body'] : ''; ?>
  <input type="hidden" id="get_no_posts_name" value="<?php echo($wo['lang']['no_more_posts']); ?>" autocomplete="off">
  <div id="focus-overlay"></div>
  <input type="hidden" class="seen_stories_users_ids" value="" autocomplete="off">
  <input type="hidden" class="main_session" value="<?php echo lui_CreateMainSession();?>" autocomplete="off">
  <?php if($wo['page'] != 'get_news_feed' && $wo['page'] != 'maintenance' && $wo['page'] != 'video-api'): ?>
    <header>
      <?=lui_LoadPage('header/content'); ?>
    </header>
  <?php endif; ?>
  <main class="luis_contenedor">
    <div id="contnet" class="effect-load"><?=$wo['content'];?></div>
    <div class="extra">
      <?php
      if($wo['loggedin'] == true && $wo['page'] != 'maintenance') {
        if ($wo['config']['chatSystem'] == 1 && $wo['page'] != 'get_news_feed' && $wo['page'] != 'sharer' && $wo['page'] != 'video-api' && $wo['page'] != 'messages'){
          echo lui_LoadPage('chat/content');
        }
        echo lui_LoadPage('modals/logged-out');
        ?>
        <?php
      } ?>
    </div>
  </main>
  <footer>
    <?php
    if($wo['page'] != 'welcome' && $wo['page'] != 'register' && $wo['page'] != 'messages') {
      echo lui_LoadPage('footer/content');
    }
    ?>
  </footer>
  <!-- Load modal alerts -->
  <?php echo lui_LoadPage('modals/site-alerts'); ?>
      <!-- JS FILES -->
      <?php if ($wo['config']['reCaptcha'] == 1) { ?>
      <script preload type="text/javascript" src='https://www.google.com/recaptcha/api.js'></script>
      <?php } ?>

      <?php if ($wo['config']['node_socket_flow'] == "1"){ ?>
         <script type="text/javascript">
          const node_socket_flow = "1"
          </script>
      <?php }
       if ($wo['config']['node_socket_flow'] == "0"){ ?>
         <script type="text/javascript">
          const node_socket_flow = "0"
          </script>
      <?php } ?>
      <script preload type="text/javascript" src="<?php echo $wo['config']['theme_url'];?>/javascript/script.js<?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>"></script>
      <?php if ($wo['loggedin'] == true) {?>
      <?php if ($wo['config']['google_map'] == 1) { ?>
      <script preload src="https://maps.googleapis.com/maps/api/js?key=<?php echo $wo['config']['google_map_api'];?>&libraries=places"></script>
      <?php } ?>
      <script preload src="<?php echo $wo['config']['theme_url'];?>/javascript/audioRecord/recorder.js?version=<?php echo $wo['config']['version']; ?>"></script>
      <?php } ?>
      <script preload src="<?php echo $wo['config']['theme_url'];?>/javascript/audioRecord/record.js?version=<?php echo $wo['config']['version']; ?>"></script>
      <div class="extra-css"></div>
      <?php if ($wo['page'] != 'welcome') { ?>
      <script>$(document).ready(function() {$('div.leftcol').theiaStickySidebar({additionalMarginTop:70});});</script>
      <script type="text/javascript">jQuery(document).ready(function() {jQuery('.custom-fixed-element').theiaStickySidebar({additionalMarginTop:70});});</script>
      <?php }?>

      <!-- End 'JS FILES' -->
      <?php echo lui_LoadPage('timeago/content'); ?>
      <?php if($wo['loggedin'] == true) { echo lui_LoadPage('extra_js/content');}?>
      <!-- Audio FILES -->
      <?php if ($wo['loggedin'] == true) { ?>
      <audio id="notification-sound" class="sound-controls" preload="auto">
         <source src="<?php echo $wo['config']['theme_url']; ?>/mp3/New-notification.mp3" type="audio/mpeg">
      </audio>
      <audio id="message-sound" class="sound-controls" preload="auto">
         <source src="<?php echo $wo['config']['theme_url']; ?>/mp3/New-message.mp3" type="audio/mpeg">
      </audio>
      <?php } ?>

      <!-- End 'Audio FILES' -->
      <script>
        function _getSession(cname) {
          <?php if (!empty($_SESSION['user_id'])) { ?>
            return "<?php echo($_SESSION['user_id']); ?>";
          <?php } ?>
          return '';
        }
        function ReadMoreText(selector) {
          let text = "<?php echo($wo['lang']['read_more_text']); ?>";
          if (typeof selector == 'object') {
            selector = $(selector).attr('class');
          }
          for (var i = 0; i < $(selector).length; i++) {
            var t = $(selector)[i];
            if (!$(t).hasClass('ReadMoreAdded') && $(t).text().trim().length > 0 && $(t).height() > 190) {
              var c = new Date().getUTCMilliseconds() + (Math.floor(Math.random() * 9999)) + 100 + "_" + i;
              $(t).addClass(c);
              $(t).addClass('ReadMoreAdded');
              $(t).css({ maxHeight: "160px" })
              $(t).after('<a href="javascript:void(0)" onclick="ShowReadMoreText(\'.'+c+'\',this)">'+text+'</a>');
            }
          }
        }
        function ShowReadMoreText(selector,self) {
          let text = "<?php echo($wo['lang']['read_less_text']); ?>";
          $(selector).css({ maxHeight: "" })
          $(self).replaceWith('<a href="javascript:void(0)" onclick="HideReadMoreText(\''+selector+'\',this)">'+text+'</a>')
        }
        function HideReadMoreText(selector,self) {
          let text = "<?php echo($wo['lang']['read_more_text']); ?>";
          $(selector).css({ maxHeight: "160px" })
          $(self).replaceWith('<a href="javascript:void(0)" onclick="ShowReadMoreText(\''+selector+'\',this)">'+text+'</a>')
        }
  
      
      let f = navigator.userAgent.search("Firefox");
      if (f > -1) {
            $('.header-brand').attr('href', "<?php echo $wo['config']['site_url']."/?cache=".time(); ?>");
      }
        $(window).on("popstate", function (e) {
          location.reload();
        });
       /*Language Select*/
        $(document).ready(function(){
          $("#select-language .language_select .English").append('<span class="language_initial"><img src="<?php echo $wo['config']['theme_url']; ?>/img/flags/united-states.svg"/></span> ');
          $("#select-language .language_select .Italian").append('<span class="language_initial"><img src="<?php echo $wo['config']['theme_url']; ?>/img/flags/italy.svg"/></span> ');
          $("#select-language .language_select .Portuguese").append('<span class="language_initial"><img src="<?php echo $wo['config']['theme_url']; ?>/img/flags/portugal.svg"/></span> ');
          $("#select-language .language_select .Spanish").append('<span class="language_initial"><img src="<?php echo $wo['config']['theme_url']; ?>/img/flags/spain.svg"/></span> ');
          $("#select-language .language_select .Quechua").append('<span class="language_initial"><img src="<?php echo $wo['config']['theme_url']; ?>/img/flags/peru.svg"/></span> ');
        });
        <?php echo $wo['config']['footer_cc']; ?>
      </script>
    <?php
    if ($wo['loggedin'] == true) {
    $wo['user']['notification_settings'] = (Array) json_decode(html_entity_decode($wo['user']['notification_settings']));
     if ($wo['loggedin'] == true && $wo['config']['memories_system'] != 0 && $wo['user']['notification_settings']['e_memory'] == 1 && empty($_COOKIE['memory'])) { ?>
      <script type="text/javascript">
        $.post(Wo_Ajax_Requests_File() + '?f=notify_memories', function(data, textStatus, xhr) {});
      </script>
    <?php } } ?>
   
    <!-- HTML NOTIFICATION POPUP -->
    <div id="notification-popup"></div>
    <!-- HTML NOTIFICATION POPUP -->
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
                <div class="columna-12">
                  <div class="wow_form_fields">
                    <label for="name"><?php echo $wo['lang']['name']; ?></label>
                    <input id="name" name="name" type="text" autocomplete="off" placeholder="<?php echo $wo['lang']['name']; ?>" value="<?php echo($wo['user']['name']) ?>">
                  </div>
                </div>
                <div class="columna-6">
                  <div class="wow_form_fields">
                    <label for="phone"><?php echo $wo['lang']['phone_number']; ?></label>
                    <input id="phone" name="phone" type="text" autocomplete="off" placeholder="<?php echo $wo['lang']['phone_number']; ?>" value="<?php echo($wo['user']['phone_number']) ?>">
                  </div>
                </div>
                <div class="columna-6" hidden>
                  <div class="wow_form_fields" hidden>
                    <label for="country"><?php echo $wo['lang']['country']; ?></label>
                    <input style="display:none;" id="country" name="country" type="text" autocomplete="off" placeholder="<?php echo $wo['lang']['country']; ?>" value="PERU">
                  </div>
                </div>

                <div class="columna-6">
                  <div class="wow_form_fields">
                    <label for="city"><?php echo $wo['lang']['city']; ?></label>
                    <input id="city" name="city" type="text" autocomplete="off" placeholder="<?php echo $wo['lang']['city']; ?>">
                  </div>
                </div>

                <div class="columna-12">
                  <div class="wow_form_fields">
                    <label for="address"><?php echo $wo['lang']['address']; ?></label>
                    <textarea id="address" placeholder="<?php echo $wo['lang']['address']; ?>" name="address" rows="3" autocomplete="off"></textarea>
                  </div>
                </div>

                <div class="columna-12">
                  <div class="wow_form_fields">
                    <label for="referencia"><?php echo $wo['lang']['referrals']; ?></label>
                    <textarea id="referencia" placeholder="<?php echo $wo['lang']['referrals']; ?>" name="referencia" rows="3" autocomplete="off"></textarea>
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
   
    <div class="modal fade" id="delete-address" tabindex="-1" role="dialog" aria-labelledby="delete-address" aria-hidden="true" data-id="0">
      <div class="modal-dialog modal-md mat_box wow_mat_mdl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
            <h4 class="modal-title"><?php echo $wo['lang']['delete_your_address'] ?></h4>
          </div>
          <div class="modal-body">
            <?php echo $wo['lang']['are_you_delete_your_address']; ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-mat" data-dismiss="modal"><?php echo $wo['lang']['delete']; ?></button>
          </div>
        </div>
      </div>
    </div>
   <?php } ?>
  <!--<div id="select-language" class="modal fade" data-keyboard="false">
    <div class="modal-dialog modal-lg wow_mat_mdl lang_select_modal">
            <div class="modal-content">
        <div class="modal-body">
          <div class="row">
            <div class="columna-12">
              <h3><?=$wo['lang']['language'];?></h3>
              <ul class="lang_modal">
                <?php $langs = lui_LangsNamesFromDB();
                if (count($langs) > 0) {
                  foreach ($langs as $key => $wo['langs']) {
                    if ($wo['config'][$wo['langs']] == 1) {
                    $language = $wo['langs'];
                    $languages_name = ucfirst($wo['langs']);
                    $link = ($wo['config']['seoLink'] == 1) ? '?lang=' . $language: '?&lang=' . $language;?>
                  <li class="language_select"><a href="<?=$link;?>" rel="nofollow" class="<?=$languages_name;?>"><?=$languages_name;?></a></li>
                <?php } } } ?>
              </ul>
            </div>
          </div>
        </div>
            </div>
    </div>
  </div>-->
    
   </body>
</html>