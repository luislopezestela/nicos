<!DOCTYPE html>
<html lang="<?=($wo['lang_attr']); ?>">
<head>
  <title><?=$wo['title'];?></title>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  <meta name="application-name" content="<?=$wo['config']['siteName'];?>">
  <meta name="title" content="<?=$wo['title'];?>">
  <meta name="description" content="<?=$wo['description'];?>">
  <meta name="keywords" content="<?=$wo['keywords'];?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
  <meta name="pinterest-rich-pin" content="false" />
  <?php if ($_COOKIE['mode'] == 'night') { ?>
    <meta name="color-scheme" content="dark">
    <meta name="theme-color" content="#212121" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#212121">
    <meta name="msapplication-navbutton-color" content="#212121">
  <?php } else { ?>
    <meta name="color-scheme" content="light">
    <meta name="theme-color" content="<?=$wo['config']['header_background'];?>" />
    <meta name="apple-mobile-web-app-status-bar-style" content="<?=$wo['config']['header_background'];?>">
    <meta name="msapplication-navbutton-color" content="<?=$wo['config']['header_background'];?>">
  <?php } ?>
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
if(!empty($wo['story']['postSticker'])){echo lui_LoadPage('header/og-meta-5');}
if(!empty($wo['story']['postLink'])){echo lui_LoadPage('header/og-meta-2');}
if(!empty($wo['itemsdata']['product_id'])){echo lui_LoadPage('header/og-meta-4');}
if(!empty($_SERVER) && !empty($_SERVER['REQUEST_URI'])){
  $link_text = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>
  <link rel="canonical" href="<?=($link_text)?>"/>
<?php } ?>

<link rel="preload" href="<?php echo $wo['config']['theme_url'];?>/javascript/jquery-3.7.0.min.js?version=<?php echo $wo['config']['version']; ?>" as="script">
<link rel="preload" href="<?php echo $wo['config']['theme_url'];?>/javascript/boots.js?version=<?php echo $wo['config']['version']; ?>" as="script">
<link rel="preload" href="<?php echo $wo['config']['theme_url'];?>/javascript/scripts.min.js?version=<?php echo $wo['config']['version']; ?>" as="script">
<link rel="preload" href="<?=$wo['config']['theme_url'].'/stylesheet/layshane.css';?><?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>" as="style">
<link rel="preload" href="<?=$wo['config']['theme_url'].'/stylesheet/layshane_b.css';?>?version=<?php echo $wo['config']['version']; ?>" as="style">
<?php echo (!empty($wo['config']['tagManager_head'])) ? $wo['config']['tagManager_head'] : ''; ?>
<link rel="shortcut icon" type="image/png" href="<?php echo $wo['config']['theme_url'];?>/img/icon.png"/>
<link rel="stylesheet" href="<?=$wo['config']['theme_url'].'/stylesheet/layshane.css';?><?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>">
<?php if($wo['page'] == 'messages') { ?>
  <link href="<?php echo $wo['config']['theme_url'];?>/stylesheet/Krub.css?version=<?php echo $wo['config']['version']; ?>" rel="stylesheet">
<?php } ?>
<script data="scripsjquer" src="<?php echo $wo['config']['theme_url'];?>/javascript/jquery-3.7.0.min.js?version=<?php echo $wo['config']['version']; ?>"></script>
<?php if($wo['page'] == 'start_up'): ?>
  <script src="<?php echo $wo['config']['theme_url'];?>/javascript/jquery.ui.touch-punch.min.js?version=<?php echo $wo['config']['version']; ?>"></script>
<?php endif ?>

<?php if($wo['page'] == 'create_blog' || $wo['page'] == 'edit-blog' || $wo['page'] == 'edit_product' || $wo['page'] == 'create_product') { ?>
  <link rel="preload" href="<?php echo $wo['config']['theme_url'];?>/javascript/tinymce/tinymce.min.js?version=<?php echo $wo['config']['version']; ?>" as="script">
  <script src="<?php echo $wo['config']['theme_url'];?>/javascript/tinymce/tinymce.min.js?version=<?php echo $wo['config']['version']; ?>"></script>
<?php } ?>
<?php if ($wo['loggedin'] == true): ?>
  <link rel="preload" href="<?php echo $wo['config']['theme_url'];?>/javascript/jqueryform.js?version=<?php echo $wo['config']['version']; ?>" as="script">
<?php endif ?>
<link rel="manifest" href="<?php echo $wo['config']['theme_url'];?>/manifiesto/manifest.php?version=<?php echo $wo['config']['version']; ?>">
<?php if($wo['page'] == 'movies' || $wo['page'] == 'watch_movie') { ?>
  <link rel="stylesheet" href="<?php echo $wo['config']['theme_url'];?>/stylesheet/movies/style.movies.css<?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>" />
<?php } ?>
<?php if($wo['page'] == 'cuentas' || $wo['page'] == 'publicacion'): ?>
  <link id="scripts_page_load" rel="preload" href="<?php echo $wo['config']['theme_url'];?>/javascript/flickity.pkgd.min.js?version=<?php echo $wo['config']['version']; ?>" as="script">
<?php endif ?>
<?php if($wo['page'] == 'publicacion'): ?>
  <link id="s_pag_loop" rel="preload" href="<?php echo $wo['config']['theme_url'];?>/stylesheet/publications_style.css?version=<?php echo $wo['config']['version']; ?>" as="style">
  <link id="style_pag_css" rel="stylesheet" href="<?php echo $wo['config']['theme_url'];?>/stylesheet/publications_style.css?version=<?php echo $wo['config']['version']; ?>">
<?php endif ?>

<?php if($wo['page'] == 'tienda'): ?>
  <link id="s_pag_loop" rel="preload" href="<?php echo $wo['config']['theme_url'];?>/stylesheet/layshane_t.css?version=<?php echo $wo['config']['version']; ?>" as="style">
  <link class="style_pag_css" rel="stylesheet" href="<?php echo $wo['config']['theme_url'];?>/stylesheet/layshane_t.css?version=<?php echo $wo['config']['version']; ?>">
<?php endif ?>
<style><?php echo $wo['config']['styles_cc']; ?></style>
<style type="text/css">
.count_items_carrito{position:absolute;top:0px;right:25px;display:flex;flex-wrap:wrap;font-size:10px;background:var(--header-color);color:var(--header-fondo);border-radius:15px;text-align:center;justify-content:center;align-items:center;line-height:10px;height:16px;letter-spacing:0;}
.count_items_carrito span{padding:3px;}
.header_no_ap_go_lie{bottom:-6px;background-size:1px 7px;background-repeat:repeat-x;right:0;box-sizing:border-box;pointer-events:none;z-index:0;left:0;height:7px;position:absolute;background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAIAAAAOBAMAAAD3WtBsAAAAFVBMVEUAAAAAAAAAAAAAAAAAAAAAAAD29va1cB7UAAAAB3RSTlMCCwQHGBAaZf6MKAAAABpJREFUCNdjSGNIY3BhCGUQBEJjIFQCQigAACyJAjLNW4w5AAAAAElFTkSuQmCC);}
</style>
<?php if($wo['config']['classified'] == 13){ ?>
  <script src="<?php echo $wo['config']['theme_url'];?>/javascript/html2pdf.bundle.js?version=<?php echo $wo['config']['version']; ?>"></script>
  <script src="<?php echo $wo['config']['theme_url'];?>/javascript/qrcode.js?version=<?php echo $wo['config']['version']; ?>"></script>
<?php } ?>
  <script type="text/javascript">
    function Wo_CloseLightbox(){$('.lightbox-container').remove();document.body.style.overflow = 'auto';}
    var link = document.createElement('link');
    link.rel = 'stylesheet';
    link.href = "<?=$wo['config']['theme_url'].'/stylesheet/layshane_b.css';?>?version=<?php echo $wo['config']['version']; ?>";
    document.head.appendChild(link);
    <?php echo $wo['config']['header_cc']."\n"; ?>
    function Wo_Ajax_Requests_File(){return "<?php echo $wo['config']['site_url'].'/requests.php';?>"}
    function Wo_Ajax_Requests_Filee(){return "<?php echo $wo['config']['site_url'].'/ajax_loading.php';?>"}
    function guardarPosicionHorizontal(){
      var miDiv = document.getElementById('carousel__content');
      if (miDiv){
        sessionStorage.setItem('scrollLeft', miDiv.scrollLeft);
      }
      
    }
    function restaurarPosicionHorizontal(){
      var miDiv = document.getElementById('carousel__content');
      if (miDiv) {
        var scrollLeft = sessionStorage.getItem('scrollLeft') || 0;
        miDiv.scrollLeft = scrollLeft;
      }
    }
    function Wo_UpdateLocation(position) {
      if(!position){return false;}
      $.post(Wo_Ajax_Requests_File() + '?f=save_user_location', {lat: position.coords.latitude, lng:position.coords.longitude}, function(data, textStatus, xhr) {
        if(data.status == 200){return true;}
      });
      return false;
    }

    var websiteUrl = "<?php echo $wo['config']['site_url'];?>";
    $(function(){
      var urlss = window.location.href;
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
        var carritoAbierto = false;
        var productoItemAbierto = false;
          var corousel_Data = document.getElementById('carousel__content');
          if (corousel_Data){
            if(document.body.contains(corousel_Data)){
              guardarPosicionHorizontal();
            }
          }
          if(typeof(check_wallet) != 'undefined'){
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
            if(url == '?link1=home') {
              $get_value = $('#json-data').val();
              if($get_value) {
                $('#load-more-posts').hide();
                json_data = JSON.parse($('#json-data').val());
                if(json_data.page=='home') {
                  document.getElementById('posts').innerHTML = '<div class="paage_loader_s"><div class="titulo_loader_w loader_layshane"></div></div><div class="loading_poruductos_cont"><div class="loading_poruductos"><div class="loader_layshane"></div></div><div class="loading_poruductos"><div class="loader_layshane"></div></div><div class="loading_poruductos"><div class="loader_layshane"></div></div><div class="loading_poruductos"><div class="loader_layshane"></div></div></div>';
                  loadposts();
                  window.history.pushState({state:'new'},'', websiteUrl);
                  $("html, body").animate({ scrollTop: 0 }, 55);
                  $('.user-details, .pac-container, .lightbox-container').remove();
                  Wo_clearPRecording();
                  Wo_CleanRecordNodes();
                  Wo_stopRecording();
                  Wo_StopLocalStream();
                  return false;
                }
              }
            }
            var urlsssss = $(this).attr('href');
            var segments = urlsssss.split('/').filter(Boolean);
            function removePreviousStylesheet() {
              var currentClass = 'style_pag_css_' + segments[2];
              var previousStylesheets = document.querySelectorAll('link[class^="style_pag_css_"]');
              previousStylesheets.forEach(function(stylesheet) {
                if (!stylesheet.classList.contains(currentClass)) {
                    stylesheet.parentNode.removeChild(stylesheet);
                }
              });
            }

            var styles = {
              'tienda': 'layshane_t.css',
              'checkout': 'carrito_estilos.css',
              'item': 'publications_style.css',
            };

            function ensureUniqueStylesheet() {
              var currentPage = segments[2];
              if (currentPage in styles) {
                var styleName = styles[currentPage];
                var currentClass = 'style_pag_css_' + currentPage;
                var existingStylesheet = document.querySelector('link.' + currentClass);

                if (!existingStylesheet) {
                  var newStylesheet = document.createElement('link');
                  newStylesheet.rel = 'stylesheet';
                  newStylesheet.className = currentClass;
                  newStylesheet.href = "<?php echo $wo['config']['theme_url'];?>/stylesheet/" + styleName + "<?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>";
                  document.head.appendChild(newStylesheet);
                }
              }
            }
            ensureUniqueStylesheet();

            function removePreviousScripts() {
              var currentClass = 'script_pag_js_' + segments[2];
              var previousScripts = document.querySelectorAll('script[class^="script_pag_js_"]');
              previousScripts.forEach(function(escripts) {
                if (!escripts.classList.contains(currentClass)) {
                    escripts.parentNode.removeChild(escripts);
                }
              });
            }
            var scripts = {
              'item': 'flickity.pkgd.min.js',
            };

            function ensureUniqueScripitss() {
              var currentPage = segments[2];
              if (currentPage in scripts) {
                var scriptName = scripts[currentPage];
                var currentClass = 'script_pag_js_' + currentPage;
                var existingStylesheet = document.querySelector('script.' + currentClass);

                if (!existingStylesheet) {
                  var newScriptsdata = document.createElement('script');
                  newScriptsdata.className = currentClass;
                  newScriptsdata.src = "<?php echo $wo['config']['theme_url'];?>/javascript/" + scriptName + "?version=<?php echo $wo['config']['version']; ?>";
                  //document.head.appendChild(newScriptsdata);
                  var targetElement = document.getElementById('var_data_script_a');
                  targetElement.parentNode.insertBefore(newScriptsdata, targetElement.nextSibling);
                }
              }
            }
            if(segments[2] == 'item') {
                ensureUniqueScripitss();
              }

            if (segments[2] == 'cuentas'){
                var sucjs  = document.createElement('script');
                sucjs.id   = 'scripts_page';
                sucjs.src = "<?php echo $wo['config']['theme_url'];?>/javascript/flickity.pkgd.min.js?version=<?php echo $wo['config']['version']; ?>";
                document.head.appendChild(sucjs);
                sucjs.onload = function() {
                var currentScriptsje = document.getElementById('scripts_page');
                  if (currentScriptsje) {
                      currentScriptsje.parentNode.removeChild(currentScriptsje);
                  }
                };

            }else{
              if ($('#scripts_page').length) {
                $('#scripts_page').remove();
              }
              if ($('#scripts_page_load').length) {
                $('#scripts_page_load').remove();
              }
            }
         

            // URL que deseas comparar (puede ser obtenida dinámicamente)
            var urlDeseada = urlsssss; // Esta función debe ser implementada por ti
            var paginaActual = window.location.href
            // Función para verificar si la URL deseada es igual a la URL actual
            function esIgual(url1, url2) {
                return url1 === url2;
            }

            // Verificar si la URL actual coincide con la URL deseada
            if (paginaActual.includes('checkout')) {
                carritoAbierto = true;
            } else if (paginaActual.includes('item') && esIgual(window.location.href, urlDeseada)) {
                productoItemAbierto = true;
            }



            $.post(Wo_Ajax_Requests_Filee() + url, {url:url}, function (data) {
              if($('.user-details').length >0){
                $('.user-details').remove();
              }
              
              json_data = JSON.parse($(data).filter('#json-data').val());
              if(json_data.welcome_page == 1 || json_data.redirect == 1) {
                window.location.href = websiteUrl;
                return false;
              }
              if($('.message-option-btns').length > 0) {
                if(json_data.url == 'index.php?index.php?link1=home') {
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
                if (json_data.page === 'checkout') {
                  if (carritoAbierto===false) {
                    window.history.pushState({state:'new'}, '', json_data.url);
                  }
                }else if (json_data.page === 'publicacion') {
                  if (productoItemAbierto===false) {
                    window.history.pushState({state:'new'}, '', json_data.url);
                  }
                }else{
                  window.history.pushState({state:'new'}, '', json_data.url);
                }
              }
              if(json_data.page == 'tienda') {
                layshane_carousel_views();
              }

              $('.postText').autogrow({vertical: true, horizontal: false, height: 200});

              window.onpopstate = function(event) {
                $(window).unbind('popstate');
                window.location.href = document.location;
              };

              
              document.title = decodeHtml(json_data.title);
              document_title = decodeHtml(json_data.title);
              $("html, body").animate({ scrollTop: 0 }, 55);
              Wo_FinishBar();
              if ($('#hidden-content').length) {
                $('#hidden-content').empty();
              }
              
              $(document).ready(function(){
                if(json_data.page == 'publicacion') {
                  view_images_prod()
                }
                removePreviousStylesheet();
                removePreviousScripts()

                if ($('div.leftcol').length) {
                  $('div.leftcol').theiaStickySidebar({additionalMarginTop: 55});
                }
                var corousel_Datas = document.getElementById('carousel__content');
                if (corousel_Datas) {
                  if(document.body.contains(corousel_Datas)){
                    restaurarPosicionHorizontal();
                  }
                }
              });
              $('#users-reacted-modal').modal("hide");
              contnet
            }).fail(function() {
            })
            .always(function() {
              Wo_FinishBar();
            });
            $('.user-details, .pac-container, .lightbox-container').remove();
          }
        });
    });
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
  }
}
  </script>
  <?php echo (!empty($wo['config']['googleAnalytics'])) ? $wo['config']['googleAnalytics'] : ''; ?>
  <?php echo lui_LoadPage('style') ?>
  <?php if ($_COOKIE['mode'] == 'night') { ?>
    <link rel="stylesheet" href="<?php echo $wo['config']['theme_url'];?>/stylesheet/dark.css<?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>" id="night-mode-css">
  <?php } ?>
  <?php if($wo['config']['googleLogin'] != 0): ?>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <?php endif; ?>

    <script src="<?php echo $wo['config']['theme_url'];?>/javascript/socket.io.js?version=<?php echo $wo['config']['version']; ?>" defer></script>
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
  
  <link rel="preload" href="<?php echo $wo['config']['theme_url']; ?>/img/flags/united-states.svg" as="image">
  <link rel="preload" href="<?php echo $wo['config']['theme_url']; ?>/img/flags/italy.svg" as="image">
  <link rel="preload" href="<?php echo $wo['config']['theme_url']; ?>/img/flags/portugal.svg" as="image">
  <link rel="preload" href="<?php echo $wo['config']['theme_url']; ?>/img/flags/peru.svg" as="image">
  <style type="text/css">
@keyframes placeHolderShimmer{0%{opacity:.5;}100%{opacity:1;}}
.loader_layshane{
  animation-duration:1s;
  animation-fill-mode:forwards;
  animation-iteration-count:infinite;
  animation-name:placeHolderShimmer;
  animation-timing-function:linear;
  background:#e6e6e6;
  height:100%;
  position:relative;
}
.loader_layshane div {
  background: #ffffff;
  position: absolute;
}
.titulo_loader_w{width:100%;max-width:200px;display:block;height:30.42px;border-radius:20px;margin:10px 0;}
  </style>
  <style type="text/css">
    /*Footer*/
.footer_page_list_l hr{width:100%;border-color:#e9e9e9;}
footer{display:block;position:relative;align-self:flex-end;align-items:flex-end;width:100%;background:#fff;-webkit-background:#fff;-moz-background:#fff;font-family:sans-serif;}
.footer_page_list_l{width:100%;position:relative;font-size:14px;display:flex;flex-wrap:wrap;justify-content:center;}
.footer_page_list_l .footer-powered{display:flex;align-items:center;justify-content:center;color:#333;-webkit-color:#333;-moz-color:#333;user-select:none;padding:5px;flex-wrap:wrap;width:100%;}
.footer_page_list_l .footer-powered .list-inline{margin:0;padding-left:0;color:#333;-webkit-color:#333;-moz-color:#333;display:flex;flex-wrap:wrap;justify-content:center;width:100%;}
.footer_page_list_l .footer-powered .list-inline>li{display:inline-flex;padding-right:8px;padding-left:8px;justify-content:center;align-items:center;}
.footer_page_list_l .footer-powered .list-inline li .language_select,
.footer_page_list_l .footer-powered .list-inline li a{color:#333;-webkit-color:#333;-moz-color:#333;padding:15px;display:block;font-size:18px;cursor:pointer;}
.footer_page_list_l span{ margin:0;font-size:18px;width:100%;padding:4px;text-align:center;}
.footer-wrapper-sidebar {font-size: 14.5px;}
.footer-wrapper-sidebar .footer-powered{display:flex;align-items: center;justify-content:space-between;color:#858585;-webkit-color:#858585;-moz-color:#858585;font-size:13px;}
.footer-wrapper-sidebar .footer-powered span, .footer-wrapper .footer-powered span{margin:0;}
.posts-count{z-index:99;padding:10px 15px;text-align:center;position:fixed;transition:all .2s ease;top:115px;left:50%;transform:translate(-50%,-50%);border-radius:20px;box-shadow:0 2px 2px rgba(0,0,0,.2)!important;background:#008aff;color:#fff;}
.posts-count:empty{padding:0;border:0;box-shadow:none!important}
.posts-count:hover{background-color:#0062b6;}
  </style>
<?php if($wo['page'] == 'checkout'): ?>
  <link id="s_pag_loop" rel="preload" href="<?php echo $wo['config']['theme_url'];?>/stylesheet/carrito_estilos.css?version=<?php echo $wo['config']['version']; ?>" as="style">
  <link class="style_pag_css" rel="stylesheet" href="<?php echo $wo['config']['theme_url'];?>/stylesheet/carrito_estilos.css?version=<?php echo $wo['config']['version']; ?>">
<?php endif ?>
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
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
                <path d="M8.99944 22L8.74881 18.4911C8.61406 16.6046 10.1082 15 11.9994 15C13.8907 15 15.3848 16.6046 15.2501 18.4911L14.9994 22" stroke="currentColor" stroke-width="1.5" />
                <path d="M2.35151 13.2135C1.99849 10.9162 1.82198 9.76763 2.25629 8.74938C2.69059 7.73112 3.65415 7.03443 5.58126 5.64106L7.02111 4.6C9.41841 2.86667 10.6171 2 12.0001 2C13.3832 2 14.5818 2.86667 16.9791 4.6L18.419 5.64106C20.3461 7.03443 21.3097 7.73112 21.744 8.74938C22.1783 9.76763 22.0018 10.9162 21.6487 13.2135L21.3477 15.1724C20.8473 18.4289 20.597 20.0572 19.4291 21.0286C18.2612 22 16.5538 22 13.1389 22H10.8613C7.44646 22 5.73903 22 4.57112 21.0286C3.40321 20.0572 3.15299 18.4289 2.65255 15.1724L2.35151 13.2135Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
              </svg><span>&nbsp;<?php echo $wo['lang']['home'] ?></span>
            </a>
          <?php else: ?>
            <a class="sixteen-font-size welcome_page_display <?php echo ($wo['page'] == 'welcome_page') ? 'active': '';?>" href="<?php echo $wo['config']['site_url']; ?>" data="welcome_page_display" data-ajax="?index.php?link1=welcome_page" title="Inicio">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
                <path d="M8.99944 22L8.74881 18.4911C8.61406 16.6046 10.1082 15 11.9994 15C13.8907 15 15.3848 16.6046 15.2501 18.4911L14.9994 22" stroke="currentColor" stroke-width="1.5" />
                <path d="M2.35151 13.2135C1.99849 10.9162 1.82198 9.76763 2.25629 8.74938C2.69059 7.73112 3.65415 7.03443 5.58126 5.64106L7.02111 4.6C9.41841 2.86667 10.6171 2 12.0001 2C13.3832 2 14.5818 2.86667 16.9791 4.6L18.419 5.64106C20.3461 7.03443 21.3097 7.73112 21.744 8.74938C22.1783 9.76763 22.0018 10.9162 21.6487 13.2135L21.3477 15.1724C20.8473 18.4289 20.597 20.0572 19.4291 21.0286C18.2612 22 16.5538 22 13.1389 22H10.8613C7.44646 22 5.73903 22 4.57112 21.0286C3.40321 20.0572 3.15299 18.4289 2.65255 15.1724L2.35151 13.2135Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
              </svg><span>&nbsp;<?php echo $wo['lang']['home'] ?></span>
            </a>
          <?php endif ?>
        </li>
        <li>
          <a class="sixteen-font-size products_display <?php echo ($wo['page'] == 'tienda') ? 'active': '';?>" href="<?php echo lui_SeoLink('index.php?link1=tienda'); ?>" data="products_display" data-ajax="?link1=tienda" title="<?php echo $wo['lang']['tienda'];?>">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
              <path d="M2.9668 10.4961V15.4979C2.9668 18.3273 2.9668 19.742 3.84548 20.621C4.72416 21.5001 6.13837 21.5001 8.9668 21.5001H14.9668C17.7952 21.5001 19.2094 21.5001 20.0881 20.621C20.9668 19.742 20.9668 18.3273 20.9668 15.4979V10.4961" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
              <path d="M14.9668 16.9932C14.2827 17.6004 13.1936 17.9932 11.9668 17.9932C10.74 17.9932 9.65089 17.6004 8.9668 16.9932" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
              <path d="M10.1038 8.41848C9.82182 9.43688 8.79628 11.1936 6.84777 11.4482C5.12733 11.673 3.82246 10.922 3.48916 10.608C3.12168 10.3534 2.28416 9.53872 2.07906 9.02952C1.87395 8.52032 2.11324 7.41706 2.28416 6.96726L2.96743 4.98888C3.13423 4.49196 3.5247 3.31666 3.92501 2.91913C4.32533 2.5216 5.13581 2.5043 5.4694 2.5043H12.4749C14.2781 2.52978 18.2209 2.48822 19.0003 2.50431C19.7797 2.52039 20.2481 3.17373 20.3848 3.45379C21.5477 6.27061 22 7.88382 22 8.57124C21.8482 9.30456 21.22 10.6873 19.0003 11.2955C16.6933 11.9275 15.3854 10.6981 14.9751 10.2261M9.15522 10.2261C9.47997 10.625 10.4987 11.4279 11.9754 11.4482C13.4522 11.4686 14.7273 10.4383 15.1802 9.92062C15.3084 9.76786 15.5853 9.31467 15.8725 8.41848" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg><span>&nbsp;<?php echo $wo['lang']['tienda'] ?></span>
          </a>
        </li>
        <?php $totalcarrito = 0; ?>
          <?php if ($wo['loggedin'] == true) {
            $comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->getOne(T_VENTAS);
            if (!empty($comprapendiente)) {
              $totalcarrito = $db->where('estado','0')->where('id_comprobante_v',$comprapendiente->id)->getValue('imventario','COUNT(*)');
            }
            //$items = $db->where('user_id',$wo['user']['user_id'])->get(T_USERCARD);
            //if(!empty($items)){
              //foreach($items as $key => $item) {
                //$totalcarrito += $item->units;
              //}
            //}
          }
        $totalcomprasencarrito = $totalcarrito; ?>
        <li>
          <a href="<?php echo lui_SeoLink('index.php?link1=checkout'); ?>" class="sixteen-font-size checkout_display <?php echo ($wo['page'] == 'checkout') ? 'active': '';?>" data="checkout_display" data-ajax="?link1=checkout" title="<?php echo $wo['lang']['carrito'];?>">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
              <path d="M3.87289 17.0194L2.66933 9.83981C2.48735 8.75428 2.39637 8.21152 2.68773 7.85576C2.9791 7.5 3.51461 7.5 4.58564 7.5H19.4144C20.4854 7.5 21.0209 7.5 21.3123 7.85576C21.6036 8.21152 21.5126 8.75428 21.3307 9.83981L20.1271 17.0194C19.7282 19.3991 19.5287 20.5889 18.7143 21.2945C17.9 22 16.726 22 14.3782 22H9.62182C7.27396 22 6.10003 22 5.28565 21.2945C4.47127 20.5889 4.27181 19.3991 3.87289 17.0194Z" stroke="currentColor" stroke-width="1.5" />
              <path d="M17.5 7.5C17.5 4.46243 15.0376 2 12 2C8.96243 2 6.5 4.46243 6.5 7.5" stroke="currentColor" stroke-width="1.5" />
            </svg>
            <div class="count_items_carrito">
              <?php if ($totalcomprasencarrito > 0): ?>
                <span class="count_items_carrito_cou"><?=$totalcomprasencarrito;?></span>
              <?php endif ?>
            </div>
            <span>&nbsp;<?php echo $wo['lang']['carrito'] ?></span>
          </a>
        </li>
        <li>
          <?php if ($wo['loggedin'] == true): ?>
            <a href="<?php echo lui_SeoLink('index.php?link1=menu'); ?>" title="Usuario" data-ajax="?link1=menu" role="button" style="outline:none;">
              <div class="user-avatar">
                <svg aria-label="Tu perfil" class="x3ajldb" data-visualcompletion="ignore-dynamic" role="img" style="height:40px;width:40px;display:block!important;border-radius:50%;"><mask id=":Rqir3aj9emhpapd5aq:"><circle cx="20" cy="20" fill="white" r="20"></circle></mask><g mask="url(#:Rqir3aj9emhpapd5aq:)"><image id="updateImage-<?php echo $wo['user']['user_id']?>" style="height:40px;width:40px" x="0" y="0" height="100%" preserveAspectRatio="xMidYMid slice" width="100%" xlink:href="<?php echo $wo['user']['avatar'];?>" alt="<?php echo $wo['user']['name'];?> Foto de perfil" title="<?php echo $wo['user']['name'];?>?stp=cp0_dst-jpg_p80x80&amp;_nc_cat=106&amp;ccb=1-7&amp;_nc_sid=5740b7&amp;_nc_eui2=AeHUyvGqD28DTV6dFGiOhORyO6rJUO4xvbs7qslQ7jG9u3HR9C1nni0qwp0btEgtV1o7JwMo4kTgIbsHvzqd_A-L&amp;_nc_ohc=DA2_ucFDv0YAX9ojMSS&amp;_nc_ht=scontent.flim2-2.fna&amp;oh=00_AfDSY02NmaaCrFBDtDsQgANdwf8YXSBfTUkfhYRdAhX7fw&amp;oe=65E0FA2A"></image><circle class="xbh8q5q x1pwv2dq xvlca1e" cx="20" cy="20" r="20"></circle></g></svg>
              </div>
            </a>
          <?php else: ?>
            <a class="sixteen-font-size products_display <?php echo ($wo['page'] == 'menu') ? 'active': '';?>" href="<?php echo lui_SeoLink('index.php?link1=menu'); ?>" data="products_display" data-ajax="?link1=menu" title="<?php echo $wo['lang']['login'];?>">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
                <path d="M2 18C2 16.4596 2 15.6893 2.34673 15.1235C2.54074 14.8069 2.80693 14.5407 3.12353 14.3467C3.68934 14 4.45956 14 6 14C7.54044 14 8.31066 14 8.87647 14.3467C9.19307 14.5407 9.45926 14.8069 9.65327 15.1235C10 15.6893 10 16.4596 10 18C10 19.5404 10 20.3107 9.65327 20.8765C9.45926 21.1931 9.19307 21.4593 8.87647 21.6533C8.31066 22 7.54044 22 6 22C4.45956 22 3.68934 22 3.12353 21.6533C2.80693 21.4593 2.54074 21.1931 2.34673 20.8765C2 20.3107 2 19.5404 2 18Z" stroke="currentColor" stroke-width="1.5" />
                <path d="M14 18C14 16.4596 14 15.6893 14.3467 15.1235C14.5407 14.8069 14.8069 14.5407 15.1235 14.3467C15.6893 14 16.4596 14 18 14C19.5404 14 20.3107 14 20.8765 14.3467C21.1931 14.5407 21.4593 14.8069 21.6533 15.1235C22 15.6893 22 16.4596 22 18C22 19.5404 22 20.3107 21.6533 20.8765C21.4593 21.1931 21.1931 21.4593 20.8765 21.6533C20.3107 22 19.5404 22 18 22C16.4596 22 15.6893 22 15.1235 21.6533C14.8069 21.4593 14.5407 21.1931 14.3467 20.8765C14 20.3107 14 19.5404 14 18Z" stroke="currentColor" stroke-width="1.5" />
                <path d="M2 6C2 4.45956 2 3.68934 2.34673 3.12353C2.54074 2.80693 2.80693 2.54074 3.12353 2.34673C3.68934 2 4.45956 2 6 2C7.54044 2 8.31066 2 8.87647 2.34673C9.19307 2.54074 9.45926 2.80693 9.65327 3.12353C10 3.68934 10 4.45956 10 6C10 7.54044 10 8.31066 9.65327 8.87647C9.45926 9.19307 9.19307 9.45926 8.87647 9.65327C8.31066 10 7.54044 10 6 10C4.45956 10 3.68934 10 3.12353 9.65327C2.80693 9.45926 2.54074 9.19307 2.34673 8.87647C2 8.31066 2 7.54044 2 6Z" stroke="currentColor" stroke-width="1.5" />
                <path d="M14 6C14 4.45956 14 3.68934 14.3467 3.12353C14.5407 2.80693 14.8069 2.54074 15.1235 2.34673C15.6893 2 16.4596 2 18 2C19.5404 2 20.3107 2 20.8765 2.34673C21.1931 2.54074 21.4593 2.80693 21.6533 3.12353C22 3.68934 22 4.45956 22 6C22 7.54044 22 8.31066 21.6533 8.87647C21.4593 9.19307 21.1931 9.45926 20.8765 9.65327C20.3107 10 19.5404 10 18 10C16.4596 10 15.6893 10 15.1235 9.65327C14.8069 9.45926 14.5407 9.19307 14.3467 8.87647C14 8.31066 14 7.54044 14 6Z" stroke="currentColor" stroke-width="1.5" />
              </svg><span>&nbsp;Menú</span>
            </a>
          <?php endif ?>
        </li>
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
      <?php if($wo['page'] == 'cuentas'): ?>
        <script id="scripts_page" src="<?php echo $wo['config']['theme_url'];?>/javascript/flickity.pkgd.min.js?version=<?php echo $wo['config']['version']; ?>"></script>
      <?php endif ?>
      <div id="var_data_script_a"></div>
      <?php if($wo['page'] == 'publicacion'): ?>
        <script id="scripts_page" src="<?php echo $wo['config']['theme_url'];?>/javascript/flickity.pkgd.min.js?version=<?php echo $wo['config']['version']; ?>"></script>
        <script type="text/javascript">
          document.addEventListener("DOMContentLoaded", function() {
            view_images_prod()
          });
        </script>
      <?php endif ?>
      <?php if($wo['page'] == 'tienda'): ?>
        <script type="text/javascript">
          document.addEventListener("DOMContentLoaded", function() {
          layshane_carousel_views();
          });
        </script>
      <?php endif ?>

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
      <?php if($wo['page'] == 'start_up'): ?>
        <script src="<?php echo $wo['config']['theme_url'];?>/javascript/jquery-ui.min.js?version=<?php echo $wo['config']['version']; ?>"></script>
      <?php endif ?>
      <script defer type="text/javascript" src="<?php echo $wo['config']['theme_url'];?>/javascript/boots.js<?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>"></script>
      <?php if($wo['page'] == 'create_blog' || $wo['page'] == 'edit-blog' || $wo['page'] == 'edit_product') { ?>
        <script src="<?php echo $wo['config']['theme_url'];?>/javascript/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js?version=<?php echo $wo['config']['version']; ?>"></script>
      <?php } ?>
      <?php if ($wo['loggedin'] == true) {?>
      <?php if ($wo['config']['google_map'] == 1) { ?>
      <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $wo['config']['google_map_api'];?>&libraries=places"></script>
      <?php } ?>
      <?php } ?>
      <link rel="preload" href="<?php echo $wo['config']['theme_url'];?>/javascript/audioRecord/record.js?version=<?php echo $wo['config']['version']; ?>" as="script">
      <script src="<?php echo $wo['config']['theme_url'];?>/javascript/audioRecord/record.js?version=<?php echo $wo['config']['version']; ?>"></script>
      <?php if ($wo['page'] == 'timeline' && $wo['loggedin'] == true && $wo['config']['css_upload'] == 1) { ?>
      <?php if (!empty($wo['user_profile']['css_file']) && file_exists($wo['user_profile']['css_file'])) {?>
      <link class="styled-profile" rel="stylesheet" href="<?php echo lui_GetMedia($wo['user_profile']['css_file']);?>">
      <?php echo $wo['css_file_header'];?>
      <?php } } ?>
      <div class="extra-css"></div>
      <?php if ($wo['page'] != 'welcome') { ?>
        <script>$(function() {$('div.leftcol').theiaStickySidebar({additionalMarginTop:55});});</script>
        <script type="text/javascript">$(function() {jQuery('.custom-fixed-element').theiaStickySidebar({additionalMarginTop:55});});</script>
      <?php }?>
  

      <!-- End 'JS FILES' -->
      <?php echo lui_LoadPage('timeago/content'); ?>
      <?php if($wo['loggedin'] == true) { echo lui_LoadPage('extra_js/content'); }?>
      <?php echo lui_LoadPage('extra_js/inline');?>
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
    <!-- HTML NOTIFICATION POPUP -->
    <div id="notification-popup"></div>
    <!-- HTML NOTIFICATION POPUP -->
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
    <script type="text/javascript">
      $(window).on("popstate", function (e) {
          location.reload();
        });
      /*Language Select*/
      document.addEventListener("DOMContentLoaded", function(){
        appendImageToElement(".language_select .English", "<?php echo $wo['config']['theme_url']; ?>/img/flags/united-states.svg", "layshane");
        appendImageToElement(".language_select .Italian", "<?php echo $wo['config']['theme_url']; ?>/img/flags/italy.svg", "layshane");
        appendImageToElement(".language_select .Portuguese", "<?php echo $wo['config']['theme_url']; ?>/img/flags/portugal.svg", "layshane");
        appendImageToElement(".language_select .Spanish", "<?php echo $wo['config']['theme_url']; ?>/img/flags/peru.svg", "layshane");
        appendImageToElement(".language_select .Quechua", "<?php echo $wo['config']['theme_url']; ?>/img/flags/peru.svg", "layshane");
      });
    </script>
   </body>
</html>