<!DOCTYPE html>
<html lang="<?=($wo['lang_attr']); ?>">
<head>
  <title><?=$wo['title'];?></title>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  <meta name="application-name" content="<?=$wo['config']['siteName'];?>">
  <meta name="color-scheme" content="light">
  <meta name="theme-color" content="<?=$wo['config']['header_background'];?>">
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
<?php } if($wo['page']=='watch_movie') {?>
  <meta property="og:title" content="<?php echo $wo['movie']['name']; ?>" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="<?php echo $wo['movie']['url']; ?>" />
  <meta property="og:image" content="<?php echo $wo['movie']['cover']; ?>" />
  <meta property="og:image:secure_url" content="<?php echo $wo['movie']['cover']; ?>" />
  <meta property="og:description" content="<?php echo $wo['movie']['description']; ?>" />
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="<?php echo $wo['movie']['name']; ?>" />
  <meta name="twitter:description" content="<?php echo $wo['movie']['description']; ?>" />
  <meta name="twitter:image" content="<?php echo $wo['movie']['cover']; ?>" />
<?php } if($wo['page'] == 'page' && !empty($wo['page_profile'])) { ?>
  <meta property="og:title" content="<?php echo $wo['page_profile']['page_name']; ?>" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="<?php echo $wo['page_profile']['url']; ?>" />
  <meta property="og:image" content="<?php echo $wo['page_profile']['avatar']; ?>" />
  <meta property="og:image:secure_url" content="<?php echo $wo['page_profile']['avatar']; ?>" />
  <meta property="og:description" content="<?php echo $wo['page_profile']['page_description']; ?>" />
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="<?php echo $wo['page_profile']['page_name']; ?>" />
  <meta name="twitter:description" content="<?php echo $wo['page_profile']['page_description']; ?>" />
  <meta name="twitter:image" content="<?php echo $wo['page_profile']['avatar']; ?>" />
<?php } if($wo['page'] == 'group' && !empty($wo['group_profile'])) { ?>
  <meta property="og:title" content="<?php echo $wo['group_profile']['group_name']; ?>" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="<?php echo $wo['group_profile']['url']; ?>" />
  <meta property="og:image" content="<?php echo $wo['group_profile']['avatar']; ?>" />
  <meta property="og:image:secure_url" content="<?php echo $wo['group_profile']['avatar']; ?>" />
  <meta property="og:description" content="<?php echo $wo['group_profile']['about']; ?>" />
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="<?php echo $wo['group_profile']['group_name']; ?>" />
  <meta name="twitter:description" content="<?php echo $wo['group_profile']['about']; ?>" />
  <meta name="twitter:image" content="<?php echo $wo['group_profile']['avatar']; ?>" />
<?php } if($wo['page'] == 'game' && !empty($wo['game'])) { ?>
  <meta property="og:title" content="<?php echo $wo['game']['game_name']; ?>" />
  <meta property="og:type" content="game" />
  <meta property="og:url" content="<?php echo $wo['game']['game_link']; ?>" />
  <meta property="og:image" content="<?php echo $wo['game']['game_avatar']; ?>" />
  <meta property="og:image:secure_url" content="<?php echo $wo['game']['game_avatar']; ?>" />
  <meta property="og:description" content="<?php echo $wo['game']['game_name']; ?>" />
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="<?php echo $wo['game']['game_name']; ?>" />
  <meta name="twitter:description" content="<?php echo $wo['game']['game_name']; ?>" />
  <meta name="twitter:image" content="<?php echo $wo['game']['game_avatar']; ?>" />
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
<?php } } if(!empty($wo['story']['fund'])) {?>
  <meta property="og:title" content="<?php echo $wo['story']['fund']['fund']['title'];?>" />
  <meta property="og:type" content="funding" />
  <meta property="og:image" content="<?php echo $wo['story']['fund']['fund']['image'];?>" />
  <meta property="og:description" content="<?php echo $wo['story']['fund']['fund']['description'];?>" />
  <meta name="twitter:title" content="<?php echo $wo['story']['fund']['fund']['title'];?>" />
  <meta name="twitter:description" content="<?php echo $wo['story']['fund']['fund']['description'];?>" />
  <meta name="twitter:image" content="<?php echo $wo['story']['fund']['fund']['image'];?>" />
<?php } if(!empty($wo['story']['fund_data'])){?>
  <meta property="og:title" content="<?php echo $wo['story']['fund_data']['title'];?>" />
  <meta property="og:type" content="funding" />
  <meta property="og:image" content="<?php echo $wo['story']['fund_data']['image'];?>" />
  <meta property="og:description" content="<?php echo $wo['story']['fund_data']['description'];?>" />
  <meta name="twitter:title" content="<?php echo $wo['story']['fund_data']['title'];?>" />
  <meta name="twitter:description" content="<?php echo $wo['story']['fund_data']['description'];?>" />
  <meta name="twitter:image" content="<?php echo $wo['story']['fund_data']['image'];?>" />
<?php } if(!empty($wo['story']) && !empty($wo['story']['photo_album'])) {  ?>
  <meta property="og:type" content="album" />
  <meta property="og:image" content="<?php echo $wo['story']['photo_album'][0]['image'];?>" />
  <meta name="twitter:image" content="<?php echo $wo['story']['photo_album'][0]['image'];?>" />
<?php } if(!empty($wo['fund'])) {  ?>
  <meta property="og:title" content="<?php echo $wo['fund']['title'];?>" />
  <meta property="og:type" content="funding" />
  <meta property="og:image" content="<?php echo $wo['fund']['image'];?>" />
  <meta property="og:description" content="<?php echo $wo['fund']['description'];?>" />
  <meta name="twitter:title" content="<?php echo $wo['fund']['title'];?>" />
  <meta name="twitter:description" content="<?php echo $wo['fund']['description'];?>" />
  <meta name="twitter:image" content="<?php echo $wo['fund']['image'];?>" />
<?php } if(!empty($wo['story']['job'])) {  ?>
  <meta property="og:title" content="<?php echo $wo['story']['job']['title'];?>" />
  <meta property="og:type" content="job" />
  <meta property="og:image" content="<?php echo lui_GetMedia($wo['story']['job']['image']);?>" />
  <meta property="og:description" content="<?php echo $wo['story']['job']['description'];?>" />
  <meta name="twitter:title" content="<?php echo $wo['story']['job']['title'];?>" />
  <meta name="twitter:description" content="<?php echo $wo['story']['job']['description'];?>" />
  <meta name="twitter:image" content="<?php echo lui_GetMedia($wo['story']['job']['image']);?>" />
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
if(!empty($wo['story']['postSticker'])){echo lui_LoadPage('header/og-meta-5');}
if(!empty($wo['story']['postLink'])){echo lui_LoadPage('header/og-meta-2');}
if(!empty($wo['itemsdata']['product_id'])){echo lui_LoadPage('header/og-meta-4');}
if(!empty($_SERVER) && !empty($_SERVER['REQUEST_URI'])){
  $link_text = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>
  <link rel="canonical" href="<?=($link_text)?>"/>
<?php } ?>
<?php echo (!empty($wo['config']['tagManager_head'])) ? $wo['config']['tagManager_head'] : ''; ?>
  <link rel="shortcut icon" type="image/png" href="<?php echo $wo['config']['theme_url'];?>/img/icon.png"/>
<?php if($wo['language_type']=='rtl' && $wo['page']!='welcome'){?>
  <link rel="stylesheet" href="<?=$wo['config']['theme_url'].'/stylesheet/bootsrap-rtl.min.css'.$wo['update_cache'].'?version='.$wo['config']['version'];?>">
  <link rel="stylesheet" href="<?php echo $wo['config']['theme_url'];?>/stylesheet/style_rtl.css<?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>">
<?php }
if($wo['page'] == 'create_blog' || $wo['page'] == 'edit-blog' || $wo['page'] == 'edit_product') { ?>
  <script src="<?php echo $wo['config']['theme_url'];?>/javascript/tinymce2/js/tinymce/tinymce.min.js?version=<?php echo $wo['config']['version']; ?>"></script>
<?php } ?>
<link rel="stylesheet" href="<?=$wo['config']['theme_url'].'/stylesheet/layshane.css';?><?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>">
<?php if($wo['page'] == 'messages') { ?>
  <link href="<?php echo $wo['config']['theme_url'];?>/stylesheet/Krub.css?version=<?php echo $wo['config']['version']; ?>" rel="stylesheet">
<?php } ?>
<?php if ($wo['page'] == 'welcome' && $wo['language_type'] == 'rtl') { ?>
  <link rel="stylesheet" href="<?php echo $wo['config']['theme_url'];?>/stylesheet/welcome_rtl.css<?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>">
<?php } ?>

<script rel="preload" data="scripsjquer" src="<?php echo $wo['config']['theme_url'];?>/javascript/jquery-3.7.0.min.js?version=<?php echo $wo['config']['version']; ?>"></script>
<?php if ($wo['loggedin'] == true): ?>
  <script src="<?php echo $wo['config']['theme_url'];?>/javascript/jqueryform.js?version=<?php echo $wo['config']['version']; ?>"></script>
<?php endif ?>

<link rel="manifest" href="<?php echo $wo['config']['theme_url'];?>/manifiesto/manifest.php">
<?php if ($wo['page'] == 'friends_nearby'): ?>
  <link rel="stylesheet" href="<?php echo $wo['config']['theme_url'];?>/stylesheet/leaflet.css?version=<?php echo $wo['config']['version']; ?>">
  <script src="<?php echo $wo['config']['theme_url'];?>/javascript/leaflet.js?version=<?php echo $wo['config']['version'];?>"></script>
<?php endif; ?>
<?php if($wo['page'] == 'movies' || $wo['page'] == 'watch_movie') { ?>
  <link rel="stylesheet" href="<?php echo $wo['config']['theme_url'];?>/stylesheet/movies/style.movies.css<?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>" />
<?php } ?>
<?php if($wo['page'] == 'publicacion') { ?>
  <script id="flikit" src="<?php echo $wo['config']['theme_url'];?>/javascript/flickity.pkgd.min.js?version=<?php echo $wo['config']['version']; ?>"></script>
<?php } ?>
  <style><?php echo $wo['config']['styles_cc']; ?></style>
  <style type="text/css">
    .count_items_carrito{position:absolute;top:0px;right:0px;display:flex;flex-wrap:wrap;font-size:10px;background:var(--header-color);color:var(--header-fondo);border-radius:15px;text-align:center;justify-content:center;align-items:center;line-height:10px;height:16px;letter-spacing:0;}
    .count_items_carrito span{padding:3px;}
    .header_no_ap_go_lie{bottom:-6px;background-size:1px 7px;background-repeat:repeat-x;right:0;box-sizing:border-box;pointer-events:none;z-index:0;left:0;height:7px;position:absolute;background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAIAAAAOBAMAAAD3WtBsAAAAFVBMVEUAAAAAAAAAAAAAAAAAAAAAAAD29va1cB7UAAAAB3RSTlMCCwQHGBAaZf6MKAAAABpJREFUCNdjSGNIY3BhCGUQBEJjIFQCQigAACyJAjLNW4w5AAAAAElFTkSuQmCC);}
  </style>
<?php if($wo['config']['classified'] == 13){ ?>
  <script src="<?php echo $wo['config']['theme_url'];?>/javascript/html2pdf.bundle.js?version=<?php echo $wo['config']['version']; ?>"></script>
  <script src="<?php echo $wo['config']['theme_url'];?>/javascript/qrcode.js?version=<?php echo $wo['config']['version']; ?>"></script>
<?php } ?>
  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
      var link = document.createElement('link');
      link.rel = 'stylesheet';
      link.href = "<?=$wo['config']['theme_url'].'/stylesheet/layshane_b.css';?><?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>";
      document.head.appendChild(link);
    });

    <?php echo $wo['config']['header_cc']."\n"; ?>
      function Wo_Ajax_Requests_File(){
        return "<?php echo $wo['config']['site_url'].'/requests.php';?>"
      }
      function Wo_Ajax_Requests_Filee(){
        return "<?php echo $wo['config']['site_url'].'/ajax_loading.php';?>"
      }
     
      var websiteUrl = "<?php echo $wo['config']['site_url'];?>";
      document.addEventListener('DOMContentLoaded', function(){
        <?php if ($wo['loggedin'] == true): ?>
        <?php if ($wo['user']['last_location_update'] < time()): ?>
          if (navigator.geolocation) {
            var location = navigator.geolocation.getCurrentPosition(Wo_UpdateLocation);
          }
        <?php endif; ?>
        <?php endif; ?>
        var box = $('#contnet');
        var ISAPI = $('#ISAPI').val();
        $(document).on('click', 'a[data-ajax]', function(e) {
          if(typeof(check_wallet)!='undefined') {
            clearInterval(check_wallet);
          }
          if ($('#live_post_id').length > 0) {
            DeleteLive();
            window.location = $(this).attr('href');
            return false;
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
                  document.getElementById('posts').innerHTML = '<div class="posts_load"><div class="wo_loading_post"><div class="lightui1-shimmer"><div class="_2iwr"></div> <div class="_2iws"></div> <div class="_2iwt"></div> <div class="_2iwu"></div> <div class="_2iwv"></div> <div class="_2iww"></div> <div class="_2iwx"></div> <div class="_2iwy"></div> <div class="_2iwz"></div> <div class="_2iw-"></div> <div class="_2iw_"></div> <div class="_2ix0"></div> </div></div><div class="wo_loading_post"><div class="lightui1-shimmer"> <div class="_2iwr"></div> <div class="_2iws"></div> <div class="_2iwt"></div> <div class="_2iwu"></div> <div class="_2iwv"></div> <div class="_2iww"></div> <div class="_2iwx"></div> <div class="_2iwy"></div> <div class="_2iwz"></div> <div class="_2iw-"></div> <div class="_2iw_"></div> <div class="_2ix0"></div> </div></div></div>';
                  loadposts();
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
                window.history.pushState({state:'new'},'', websiteUrl);
              }else{
                window.history.pushState({state:'new'},'', json_data.url);
              }
              $('.postText').autogrow({vertical: true, horizontal: false, height: 200});
              window.onpopstate = function(event) {
                $(window).unbind('popstate');
                window.location.href = document.location;
              };
              if(json_data.page == 'timeline' || json_data.page == 'page' || json_data.page == 'group') {
                $('.content-container').css('margin-top', '90px');
                $('.ad-placement-header-footer').find('.contnet').css('margin-top', '20px');
              }else if(json_data.page == 'products'){
                $('.content-container').css('margin-top', '90px');
                $('.ad-placement-header-footer').find('.contnet').css('margin-top', '0');
              }else if(json_data.page == 'publicacion'){
                $('#flikit').remove();
                var script = document.createElement("script");
                script.id = "flikit";
                script.src = "<?php echo $wo['config']['theme_url'];?>/javascript/flickity.pkgd.min.js?version=<?php echo $wo['config']['version']; ?>";
                document.head.appendChild(script);
              }else{
                $('.content-container').css('margin-top', '90px');
                $('.ad-placement-header-footer').find('.contnet').css('margin-top', '0');
              }
              if(json_data.is_footer == 1 && $('.second-footer').css('display') == 'none') {
                $('footer .footer-wrapper').show();
              }else if(json_data.is_footer == 1 && $('.second-footer').css('display') != 'none'){
              }else{
                if($(window).width() < 720) {
                  $('footer .footer-wrapper').show();
                }else{
                  $('footer .footer-wrapper, .second-footer').hide();
                }
              }
              document.title = decodeHtml(json_data.title);
              document_title = decodeHtml(json_data.title);
              $("html, body").animate({ scrollTop: 0 }, 90);
              Wo_FinishBar();
              $('#hidden-content').empty();
              $(document).ready(function(){
                $('div.leftcol').theiaStickySidebar({additionalMarginTop: 90});
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
  </script>
  <?php echo (!empty($wo['config']['googleAnalytics'])) ? $wo['config']['googleAnalytics'] : ''; ?>
  <?php echo lui_LoadPage('style') ?>
  <?php if ($_COOKIE['mode'] == 'night') { ?>
    <link rel="stylesheet" href="<?php echo $wo['config']['theme_url'];?>/stylesheet/dark.css<?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>" id="night-mode-css">
  <?php } ?>
  <?php if($wo['config']['googleLogin'] != 0): ?>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <?php endif; ?>

    <script src="<?php echo $wo['config']['theme_url'];?>/javascript/socket.io.js?version=<?php echo $wo['config']['version']; ?>" async defer></script>
      <script>
      let nodejs_system = "<?php echo $wo['config']['node_socket_flow']; ?>";
      let socket = null
      let groupChatListener = {}
      document.addEventListener("DOMContentLoaded", function() {
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
  <?php foreach ($wo["products_categories"] as $key => $categorys): ?>
    <?php $cat_logo_producs = $categorys['logo']; ?>
    <?php $cat_nombre_producss = $wo["lang"][$categorys["lang_key"]] ?>
    <?php if ($categorys['id']==0): ?>
    <?php else: ?>
      <link rel="preload" href="<?php echo $cat_logo_producs;?>" as="image">
    <?php endif ?>
  <?php endforeach ?>
</head>

<body <?php if ($wo['config']['chatSystem'] == 0) { ?> chat-off="true" <?php } ?>>
  <?php echo (!empty($wo['config']['tagManager_body'])) ? $wo['config']['tagManager_body'] : ''; ?>
  <input type="hidden" id="get_no_posts_name" value="<?php echo($wo['lang']['no_more_posts']); ?>" autocomplete="off">
  <div id="focus-overlay"></div>
  <input type="hidden" class="seen_stories_users_ids" value="" autocomplete="off">
  <input type="hidden" class="main_session" value="<?php echo lui_CreateMainSession();?>" autocomplete="off">
  <?php if($wo['page'] != 'get_news_feed' && $wo['page'] != 'maintenance' && $wo['page'] != 'video-api'): ?>
    <header class="header-container">
      <?php echo lui_LoadPage( 'header/content'); ?>
    </header>
  <?php endif; ?>
  <div class="content-container">
    <main id="contnet" class="effect-load"><?php echo $wo['content'];?></main>
    <?php
    $footer_ad = lui_GetAd('footer', false);
    if($wo['page'] != 'admin' && $wo['page'] != 'welcome' && $wo['page'] != 'messages' && $wo['page'] != '404' && !empty($footer_ad)) {
      echo '<div class="contnet">' . $footer_ad . '</div>';
    }
    ?>
    <footer>
      <?php
      if($wo['page'] != 'welcome' && $wo['page'] != 'register' && $wo['page'] != 'get_news_feed' && $wo['page'] != 'forum' && $wo['page'] != 'messages' && $wo['page'] != 'jobs') {
        echo lui_LoadPage('footer/content');
      }
      ?>
      <nav class="xmcv_conten_menu">
        <div class="header_no_ap_go_lie_footer"></div>
        <ul style="width:100%;">
        <li>
          <?php if ($wo['loggedin'] == true): ?>
            <a class="sixteen-font-size home_display <?php echo ($wo['page'] == 'home') ? 'active': '';?>" href="<?php echo $wo['config']['site_url']; ?>" data="home_display" data-ajax="?index.php?link1=home" title="Inicio">
              <svg viewBox="0 0 28 28" class="x1lliihq x1k90msu x2h7rmj x1qfuztq x5e5rjt" fill="currentColor" height="28" width="28"><path d="M25.825 12.29C25.824 12.289 25.823 12.288 25.821 12.286L15.027 2.937C14.752 2.675 14.392 2.527 13.989 2.521 13.608 2.527 13.248 2.675 13.001 2.912L2.175 12.29C1.756 12.658 1.629 13.245 1.868 13.759 2.079 14.215 2.567 14.479 3.069 14.479L5 14.479 5 23.729C5 24.695 5.784 25.479 6.75 25.479L11 25.479C11.552 25.479 12 25.031 12 24.479L12 18.309C12 18.126 12.148 17.979 12.33 17.979L15.67 17.979C15.852 17.979 16 18.126 16 18.309L16 24.479C16 25.031 16.448 25.479 17 25.479L21.25 25.479C22.217 25.479 23 24.695 23 23.729L23 14.479 24.931 14.479C25.433 14.479 25.921 14.215 26.132 13.759 26.371 13.245 26.244 12.658 25.825 12.29"></path></svg><span>&nbsp;<?php echo $wo['lang']['home'] ?></span>
            </a>
          <?php else: ?>
            <a class="sixteen-font-size welcome_page_display <?php echo ($wo['page'] == 'welcome_page') ? 'active': '';?>" href="<?php echo $wo['config']['site_url']; ?>" data="welcome_page_display" data-ajax="?index.php?link1=welcome_page" title="Inicio">
              <svg viewBox="0 0 28 28" class="x1lliihq x1k90msu x2h7rmj x1qfuztq x5e5rjt" fill="currentColor" height="28" width="28"><path d="M25.825 12.29C25.824 12.289 25.823 12.288 25.821 12.286L15.027 2.937C14.752 2.675 14.392 2.527 13.989 2.521 13.608 2.527 13.248 2.675 13.001 2.912L2.175 12.29C1.756 12.658 1.629 13.245 1.868 13.759 2.079 14.215 2.567 14.479 3.069 14.479L5 14.479 5 23.729C5 24.695 5.784 25.479 6.75 25.479L11 25.479C11.552 25.479 12 25.031 12 24.479L12 18.309C12 18.126 12.148 17.979 12.33 17.979L15.67 17.979C15.852 17.979 16 18.126 16 18.309L16 24.479C16 25.031 16.448 25.479 17 25.479L21.25 25.479C22.217 25.479 23 24.695 23 23.729L23 14.479 24.931 14.479C25.433 14.479 25.921 14.215 26.132 13.759 26.371 13.245 26.244 12.658 25.825 12.29"></path></svg><span>&nbsp;<?php echo $wo['lang']['home'] ?></span>
            </a>
          <?php endif ?>
        </li>
        <?php if ($wo['loggedin'] == true) { ?>
          <li>
            <a class="sixteen-font-size products_display <?php echo ($wo['page'] == 'products') ? 'active': '';?>" href="<?php echo lui_SeoLink('index.php?link1=products'); ?>" data="products_display" data-ajax="?link1=products" title="<?php echo $wo['lang']['tienda'];?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="3" y1="21" x2="21" y2="21"></line><path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4"></path><line x1="5" y1="21" x2="5" y2="10.85"></line><line x1="19" y1="21" x2="19" y2="10.85"></line><path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path></svg><span>&nbsp;<?php echo $wo['lang']['tienda'] ?></span>
            </a>
          </li>
        <?php } ?>
        <?php if ($wo['loggedin'] == true) { ?>
          <?php  $totalcarrito = 0;
          $items = $db->where('user_id',$wo['user']['user_id'])->get(T_USERCARD);
          if(!empty($items)){
            foreach($items as $key => $item) {
              $totalcarrito += $item->units;
            }
          }
          $totalcomprasencarrito = $totalcarrito; ?>
          <li>
            <a href="<?php echo lui_SeoLink('index.php?link1=checkout'); ?>" class="sixteen-font-size checkout_display <?php echo ($wo['page'] == 'checkout') ? 'active': '';?>" data="checkout_display" data-ajax="?link1=checkout" title="<?php echo $wo['lang']['carrito'];?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
              <div class="count_items_carrito"><p class="count_items_carrito_cou"><?=$totalcomprasencarrito;?></p></div>
              <span>&nbsp;<?php echo $wo['lang']['carrito'] ?></span>
            </a>
          </li>
        <?php } ?>
        </ul>
      </nav>
    </footer>
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
  </div>
  <!-- Load modal alerts -->
  <?php echo lui_LoadPage('modals/site-alerts'); ?>
    <?php if ($wo['loggedin'] == true){ ?>
      <div class="lb-preloader"><svg width='50px' height='50px' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div>
    <?php } ?>

      <!-- JS FILES -->
      <?php if ($wo['config']['reCaptcha'] == 1) { ?>
      <script type="text/javascript" src='https://www.google.com/recaptcha/api.js'></script>
      <?php } ?>

      <?php if ($wo['loggedin'] == false) { ?>
      <script type="text/javascript" src="<?php echo $wo['config']['theme_url'];?>/javascript/welcome.js<?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>"></script>
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
      <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
          var script = document.createElement('script');
          script.src = "<?php echo $wo['config']['theme_url'];?>/javascript/scripts.min.js<?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>";
          script.defer = true;
          var targetElement = document.getElementById('var_data_script');
          targetElement.parentNode.insertBefore(script, targetElement.nextSibling);
        });

      </script>
      <div id="var_data_script"></div>
      <script defer type="text/javascript" src="<?php echo $wo['config']['theme_url'];?>/javascript/styck.js<?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>"></script>
      <script defer type="text/javascript" src="<?php echo $wo['config']['theme_url'];?>/javascript/jqueryform.js<?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>"></script>
      <script defer type="text/javascript" src="<?php echo $wo['config']['theme_url'];?>/javascript/autogrow.js<?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>"></script>
      <script defer type="text/javascript" src="<?php echo $wo['config']['theme_url'];?>/javascript/boots.js<?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>"></script>
   
      <?php if ($wo['loggedin'] == true) {?>
      <?php if ($wo['config']['google_map'] == 1) { ?>
      <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $wo['config']['google_map_api'];?>&libraries=places"></script>
      <?php } ?>
      <?php } ?>
      <script src="<?php echo $wo['config']['theme_url'];?>/javascript/audioRecord/record.js?version=<?php echo $wo['config']['version']; ?>"></script>
      <?php if ($wo['page'] == 'timeline' && $wo['loggedin'] == true && $wo['config']['css_upload'] == 1) { ?>
      <?php if (!empty($wo['user_profile']['css_file']) && file_exists($wo['user_profile']['css_file'])) {?>
      <link class="styled-profile" rel="stylesheet" href="<?php echo lui_GetMedia($wo['user_profile']['css_file']);?>">
      <?php echo $wo['css_file_header'];?>
      <?php } } ?>
      <div class="extra-css"></div>
      <?php if ($wo['page'] != 'welcome') { ?>
      <script>document.addEventListener('DOMContentLoaded', function(){
        var leftcol = document.querySelector('div.leftcol');if(leftcol){
        leftcol.classList.add('theiaStickySidebar');
        leftcol.classList.add('additionalMarginTop');
        leftcol.style.additionalMarginTop = '90px';}});
      </script>
      <script type="text/javascript">document.addEventListener('DOMContentLoaded', function(){
        var customFixedElement = document.querySelectorAll('.custom-fixed-element');
        if(customFixedElement.length > 0){
        customFixedElement.forEach(function(element) {
            element.classList.add('theiaStickySidebar');
            element.style.additionalMarginTop = '90px';
        });}});
      </script>
      <?php }?>

      <!-- End 'JS FILES' -->
      <?php echo lui_LoadPage('timeago/content'); ?>
      <?php if($wo['loggedin'] == true) { echo lui_LoadPage('extra_js/content'); }?>
      <!-- Audio FILES -->
      <?php if ($wo['loggedin'] == true) { ?>
      <audio id="notification-sound" class="sound-controls" preload="auto">
         <source src="<?php echo $wo['config']['theme_url']; ?>/mp3/New-notification.mp3" type="audio/mpeg">
      </audio>
      <audio id="message-sound" class="sound-controls" preload="auto">
         <source src="<?php echo $wo['config']['theme_url']; ?>/mp3/New-message.mp3" type="audio/mpeg">
      </audio>
      <audio id="calling-sound" class="sound-controls" preload="auto">
         <source src="<?php echo $wo['config']['theme_url']; ?>/mp3/calling.mp3" type="audio/mpeg">
      </audio>
      <audio id="video-calling-sound" class="sound-controls" preload="auto">
         <source src="<?php echo $wo['config']['theme_url']; ?>/mp3/video_call.mp3" type="audio/mpeg">
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
         <?php if ($wo['loggedin'] == true) {
            $havevideo = $db->where('user_id',$wo['user']['id'])->where('processing',1)->getValue(T_POSTS,'COUNT(*)');
            if ($havevideo > 0) { ?>
                  intervalUpdates = setTimeout(function(){ Wo_intervalUpdates(1); }, 6000);
      <?php   } } ?>
         let f = navigator.userAgent.search("Firefox");
          if (f > -1) {
                $('.header-brand').attr('href', "<?php echo $wo['config']['site_url']."/?cache=".time(); ?>");
          }
         function ShowCommentGif(id,type) {
            $( ".gif_post_comment" ).each(function( index ) {
               if ($( this ).attr('id') != 'gif-form-'+id) {
                  $( this ).slideUp();
               }
            });
            $('#gif-form-'+id).slideToggle(200);
            $('.gif_post_comment_gif').html('');
         }
         function GifScrolledC(self) {
            if ((($(self).prop("scrollHeight") - $(self).height()) - $(self).scrollTop()) < 300) {
              id = $(self).attr('GId');
              type = $(self).attr('GType');
              word = $(self).attr('GWord');
              offset = $(self).attr('GOffset');
              SearchForGif(word,id,type,offset);
            }
         }
         function SearchForGif(keyword,id = 0,type = '',offset = 0) {

            if ($('#publisher-box-stickers-cont-'+id).attr('GWord') != keyword) {
              $('#publisher-box-stickers-cont-'+id).empty();
              $('#publisher-box-stickers-cont-'+id).attr('GOffset', 0);
              $('#publisher-box-stickers-cont-'+id).attr('GWord', keyword);
            }
            else{
              $('#publisher-box-stickers-cont-'+id).attr('GOffset', parseInt($('#publisher-box-stickers-cont-'+id).attr('GOffset')) + 20);
            }
            Wo_Delay(function(){
                $.ajax({
                  url: 'https://api.giphy.com/v1/gifs/search?',
                  type: 'GET',
                  dataType: 'json',
                  data: {q:keyword,api_key:'<?php echo $wo['config']['giphy_api'];?>', limit: 20,offset: offset},
                })
                .done(function(data) {
                  if (data.meta.status == 200 && data.data.length > 0) {
                    var appended = false;
                    for (var i = 0; i < data.data.length; i++) {
                        appended = true;
                        if (appended == true) {
                          appended = false;
                          if (type == 'story') {
                             $('#publisher-box-stickers-cont-'+id).append($('<img alt="gif" src="'+data.data[i].images.fixed_height_small.url+'" data-gif="' + data.data[i].images.fixed_height.url + '" onclick="Wo_PostCommentGif_'+id+'(this,'+id+')" autoplay loop>'));
                         }
                         else{
                           $('#publisher-box-stickers-cont-'+id).append($('<img alt="gif" src="'+data.data[i].images.fixed_height_small.url+'" data-gif="' + data.data[i].images.fixed_height.url + '" onclick="Wo_PostReplyCommentGif_'+id+'(this,'+id+')" autoplay loop>'));
                         }
                          appended = true;
                        }
                    }
                    var images = 0;
                    Wo_ElementLoad($('img[alt=gif]'), function(){
                      images++;
                    });
                    if (data.data.length == images || images >= 5) {

                    }
                  }
                  else{
                     $('#publisher-box-stickers-cont-'+id).html('<p class="no_gifs_found"><i class="fa fa-frown-o"></i> <?php echo $wo['lang']['no_result']; ?></p>');
                  }
                })
                .fail(function() {
                  //console.log("error");
                })
              },100);
         }
         function ShowCommentStickers(id,type) {
            $('.gif_post_comment').slideUp(200);
            $('.gif_post_comment_gif').html('');
           $('#sticker-form-'+id).slideToggle(200);
           $('.chat-box-stickers-cont').empty();
           functionName = "Wo_PostReplyCommentSticker_"+id+"(this,"+id+");";
           if (type == 'story') {
            functionName = "Wo_PostCommentSticker_"+id+"(this,"+id+");";
           }

           <?php
           $html = "";
              $stickers_system = lui_GetAllStickers(50000);
              if( count( $stickers_system ) > 0 ){
                 foreach ($stickers_system as $wo['stickerlist']) {
                    $html .= '<img alt="gif" src="'. lui_GetMedia( $wo['stickerlist']['media_file'] ).'" data-gif="'.lui_GetMedia( $wo['stickerlist']['media_file'] ).'" onclick="\'+functionName+\'" autoplay loop>';
                 }
              } else {
                 $html .= '<div class="empty_state" style="margin: 15px 0 0;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M5.5,2C3.56,2 2,3.56 2,5.5V18.5C2,20.44 3.56,22 5.5,22H16L22,16V5.5C22,3.56 20.44,2 18.5,2H5.5M5.75,4H18.25A1.75,1.75 0 0,1 20,5.75V15H18.5C16.56,15 15,16.56 15,18.5V20H5.75A1.75,1.75 0 0,1 4,18.25V5.75A1.75,1.75 0 0,1 5.75,4M14.44,6.77C14.28,6.77 14.12,6.79 13.97,6.83C13.03,7.09 12.5,8.05 12.74,9C12.79,9.15 12.86,9.3 12.95,9.44L16.18,8.56C16.18,8.39 16.16,8.22 16.12,8.05C15.91,7.3 15.22,6.77 14.44,6.77M8.17,8.5C8,8.5 7.85,8.5 7.7,8.55C6.77,8.81 6.22,9.77 6.47,10.7C6.5,10.86 6.59,11 6.68,11.16L9.91,10.28C9.91,10.11 9.89,9.94 9.85,9.78C9.64,9 8.95,8.5 8.17,8.5M16.72,11.26L7.59,13.77C8.91,15.3 11,15.94 12.95,15.41C14.9,14.87 16.36,13.25 16.72,11.26Z"></path></svg> '. $wo['lang']['no_result'] .'</div>';
              }
           ?>
           sticker = '<?php echo($html); ?>';
           $('#publisher-box-sticker-cont-'+id).html(sticker);

         }
        window.addEventListener("popstate", function (e){
          location.reload();
        });

       /*Language Select*/
        document.addEventListener("DOMContentLoaded", function(){
          function appendImageToElement(elementSelector, imagePath, altText){
            var element = document.querySelector(elementSelector);
            if(element){
              var newSpan = document.createElement("span");
              newSpan.classList.add("language_initial");
              newSpan.setAttribute("rel", "nofollow");
              var newImg = document.createElement("img");
              newImg.setAttribute("src", imagePath);
              newImg.setAttribute("alt", altText);
              newSpan.appendChild(newImg);
              element.appendChild(newSpan);
            } else {
              console.error("No se encontró el elemento con el selector:", elementSelector);
            }
          }
          appendImageToElement(".language_select .English", "<?php echo $wo['config']['theme_url']; ?>/img/flags/united-states.svg", "layshane");
          appendImageToElement(".language_select .Italian", "<?php echo $wo['config']['theme_url']; ?>/img/flags/italy.svg", "layshane");
          appendImageToElement(".language_select .Portuguese", "<?php echo $wo['config']['theme_url']; ?>/img/flags/portugal.svg", "layshane");
          appendImageToElement(".language_select .Spanish", "<?php echo $wo['config']['theme_url']; ?>/img/flags/peru.svg", "layshane");
          appendImageToElement(".language_select .Quechua", "<?php echo $wo['config']['theme_url']; ?>/img/flags/peru.svg", "layshane");
        });
        <?php echo $wo['config']['footer_cc']; ?>
      </script>
      <?php if ($wo['page'] != 'get_news_feed') { ?>
        <style type="text/css">
          .cc-color-override--1246177171 .cc-btn{border:none!important;}
          .cc-color-override--1246177171 .cc-link{color:initial!important;}
        </style>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          window.addEventListener("load", function(){
          window.cookieconsent.initialise({
            "palette": {
              "popup": {
                "background": "<?=$wo['config']['header_background'];?>",
                "text": "#000"
              },
              "button": {
                "background": "#000",
                "text": "#fff"
              }
            },
            "theme": "edgeless",
            "position": "bottom-right",
            "content": {
              "message": "<?=$wo['lang']['cookie_message']?>",
              "dismiss": "<?=$wo['lang']['cookie_dismiss']?>",
              "link": "<?=$wo['lang']['cookie_link']?>",
              "href": "<?=lui_SeoLink('index.php?link1=terms&type=privacy-policy');?>"
            }
          })});
        });
      </script>
      <?php } ?>
      <?php if ($wo['page'] == 'welcome') {?>
    <style>.cc-bottom{bottom: 2.5em;}</style>
      <?php } ?>

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
    <?php
    if ($wo['loggedin'] == true) {
    $wo['user']['notification_settings'] = (Array) json_decode(html_entity_decode($wo['user']['notification_settings']));
     if ($wo['loggedin'] == true && $wo['config']['memories_system'] != 0 && $wo['user']['notification_settings']['e_memory'] == 1 && empty($_COOKIE['memory'])) { ?>
      <script type="text/javascript">
        $.post(Wo_Ajax_Requests_File() + '?f=notify_memories', function(data, textStatus, xhr) {});
      </script>
    <?php } } ?>
    <div id="pay_modal_wallet">
      <div class="modal fade wow_mat_pops" id="pay-go-pro" role="dialog" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="wow_pops_head">
              <svg height="100px" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" xmlns="http://www.w3.org/2000/svg"><path d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729 c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="currentColor" opacity="0.6"></path> <path d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729 c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="currentColor" opacity="0.6"></path> <path d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428 c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="currentColor"></path></svg>
              <h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20,8H4V6H20M20,18H4V12H20M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z"></path></svg> <?php echo $wo['lang']['pay_from_wallet'] ?></h4>
            </div>
            <div class="modal-body">
              <div class="pay_modal_wallet_alert"></div>
              <h4 class="pay_modal_wallet_text"></h4>
            </div>
            <div class="clear"></div>
            <div class="modal-footer">
              <div class="ball-pulse"><div></div><div></div><div></div></div>
              <button type="button" class="btn btn-main" id="pay_modal_wallet_btn"><?php echo $wo['lang']['pay']; ?></button>
            </div>
          </div>
        </div>
      </div>
    </div>
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

    <div class="modal fade ch_payment_box" id="buy_product_modal" tabindex="-1" role="dialog" aria-labelledby="buy_product" aria-hidden="true" data-id="0">
    <div class="modal-dialog modal-md mat_box" role="document">
      <div class="modal-content">
        <div class="ch_payment_head">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z"></path></svg>
          <h4><?php echo $wo['lang']['payment_alert']; ?></h4>
        </div>
        <div class="modal-body">
          <div class="modal_product_pay_alert"></div>
          <?php echo $wo['lang']['purchase_the_items']; ?>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="product_id" autocomplete="off">
          <input type="hidden" id="product_price" autocomplete="off">
          <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $wo['lang']['cancel']; ?></button>
          <button type="button" class="btn btn-main btn-mat"><?php echo $wo['lang']['pay']; ?></button>
        </div>
      </div>
    </div>
    </div>


    <div class="modal fade ch_payment_box" id="buy_product_modal_dos" tabindex="-1" role="dialog" aria-labelledby="buy_product" aria-hidden="true" data-id="0">
    <div class="modal-dialog modal-md mat_box" role="document">
      <div class="modal-content">
        <div class="ch_payment_head">
          <svg width="24" height="24" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M512 512m-480 0a480 480 0 1 0 960 0 480 480 0 1 0-960 0Z" fill="#FFE8CD" /><path d="M224 364.8c0-25.6 19.2-44.8 51.2-44.8h480c25.6 0 51.2 19.2 51.2 44.8v288c0 25.6-19.2 44.8-51.2 44.8H275.2c-25.6 0-51.2-19.2-51.2-44.8V364.8z" fill="#FF9D1C" /><path d="M224 390.4h576v70.4h-576z" fill="#FFCA83" /><path d="M633.6 608c0-12.8 12.8-25.6 25.6-25.6h70.4c12.8 0 25.6 12.8 25.6 25.6v25.6c0 12.8-12.8 25.6-25.6 25.6h-70.4c-12.8 0-25.6-12.8-25.6-25.6v-25.6z" fill="#FFFFFF" /></svg>
          <h4><?php echo $wo['lang']['payment_alert']; ?></h4>
        </div>
        <div class="modal-body">
          <form>
            <div>
              <label>
                <span>Correo Electrónico</span>
                <input type="text" size="50" data-culqi="card[email]" id="card[email]" autocomplete="off">
              </label>
            </div>
            <div>
              <label>
                <span>Número de tarjeta</span>
                <input type="text" size="20" data-culqi="card[number]" id="card[number]" autocomplete="off">
              </label>
            </div>
            <div>
              <label>
                <span>CVV</span>
                <input type="text" size="4" data-culqi="card[cvv]" id="card[cvv]" autocomplete="off">
              </label>
            </div>
            <div>
              <label>
                <span>Fecha expiración (MM/YYYY)</span>
                <input size="2" data-culqi="card[exp_month]" id="card[exp_month]" autocomplete="off">
                <span>/</span>
                <input size="4" data-culqi="card[exp_year]" id="card[exp_year]" autocomplete="off">
              </label>
            </div>
          </form>
          <div class="modal_product_pay_alert"></div>
          <?php echo $wo['lang']['purchase_the_items']; ?>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="product_id" autocomplete="off">
          <input type="hidden" id="product_price" autocomplete="off">
          <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $wo['lang']['cancel']; ?></button>
          <button type="button" id="btn_pagar" class="btn btn-main btn-mat"><?php echo $wo['lang']['pay']; ?></button>
        </div>
      </div>
    </div>
    </div>

    <div class="modal fade ch_payment_box" id="buy_product_modal_tres" tabindex="-1" role="dialog" aria-labelledby="buy_product" aria-hidden="true" data-id="0">
    <div class="modal-dialog modal-md mat_box" role="document">
      <div class="modal-content">
        <div class="ch_payment_head">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z"></path></svg>
          <h4><?php echo $wo['lang']['payment_alert']; ?></h4>
        </div>
        <div class="modal-body">
          <div class="modal_product_pay_alert"></div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="product_id" autocomplete="off">
          <input type="hidden" id="product_price" autocomplete="off">
          <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $wo['lang']['cancel']; ?></button>
          <button type="button" class="btn btn-main btn-mat"><?php echo $wo['lang']['pay']; ?></button>
        </div>
      </div>
    </div>
    </div>



  <div class="modal fade" id="refund_order" tabindex="-1" role="dialog" aria-labelledby="refund_order" aria-hidden="true" data-id="0">
    <div class="modal-dialog mat_box wow_mat_mdl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?php echo $wo['lang']['request_refund']; ?></h5>
        </div>
        <form class="refund_order_form" method="post">
          <div class="modal-body">
            <div class="modal_refund_order_modal_alert"></div>
            <div class="wow_form_fields">
              <label class="form-label" for="refund_order_message"><?php echo $wo['lang']['please_explain_the_reason']; ?></label>
              <textarea placeholder="<?php echo $wo['lang']['please_explain_the_reason']; ?>" rows="5" name="message" id="refund_order_message" autocomplete="off"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-mat" data-dismiss="modal"><?php echo $wo['lang']['cancel']; ?></button>
            <button type="submit" class="btn btn-main btn-mat get_refnd"><?php echo $wo['lang']['request']; ?></button>
          </div>
        </form>
      </div>
    </div>
    </div>

  <a href="<?php echo $wo['config']['site_url'].'/checkout';?>" data-ajax="?link1=checkout" id="load_checkout" style="display: none;"></a>
  
  <div id="select-language" class="modal fade" data-keyboard="false">
    <div class="lang_select_modal">
      <div class="modal-body">
        <span class="titulo_modal"><?=$wo['lang']['language'];?></span>
        <?php $langs = lui_LangsNamesFromDB();
          $idioma = $db->where('iso',$wo['lang_attr'])->getOne(T_LANG_ISO);
          if(count($langs) > 0) {
            foreach ($langs as $key => $wo['langs']) {
              if ($wo['config'][$wo['langs']] == 1) {
                $language = $wo['langs'];
                $languages_name = ucfirst($wo['langs']);
                $link = ($wo['config']['seoLink'] == 1) ? '?lang=' . $language: '?&lang=' . $language;?>
                <?php if($idioma->lang_name == $wo['langs']): ?>
                  <?php else: ?>
                    <span class="language_select"><a href="<?=$link;?>" rel="nofollow" class="<?=$languages_name;?>"><?=$languages_name;?></a></span>
                <?php endif ?>
        <?php } } } ?>
      </div>
    </div>
  </div>
   </body>
</html>