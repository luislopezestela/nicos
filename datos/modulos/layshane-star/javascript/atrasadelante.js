  
function supports_history_api() {
  return !!(window.history && history.pushState);
}
$(function() {

    if(!supports_history_api()){ return; }
    window.addEventListener("popstate", function(e) {
        if (typeof(check_wallet) != 'undefined') {
            clearInterval(check_wallet);
        }
        Wo_CloseLightbox();
        $('body').removeAttr('no-more-posts');

        if ($('.postText').length && $('.postText').val().length > 0) {
          if (!confirm("<?php echo html_entity_decode($wo['lang']['havent_finished_post'], ENT_QUOTES) ?>")) {
              return false;
          } else {
              $('.postText').val("");
          }
        }
        var segments = window.location.pathname.split('/').filter(Boolean);
        var link1 = "home";
        var items = null;
        var opcion = null;
        var c_id = null;
        var sub_id = null;
        if (segments.length > 0) {
          link1 = segments[0];
          if (segments.length > 1) {
            if(segments[0]=='item'){
              items = segments[1];
              if (segments.length > 2) {
                opcion = segments[2];
              }
            }else if(segments[0]=='tienda'){
              c_id = segments[1];
              if (segments.length > 2) {
                sub_id = segments[2];
              }
            }
          }
        }

        var params = {};
        if (link1) params.link1 = link1;
        if (items) params.items = items;
        if (opcion) params.opcion = opcion;
        if (c_id) params.c_id = c_id;
        if (sub_id) params.sub_id = sub_id;
        var url = '?' + $.param(params);
        Wo_StartBar();
        window.post = 0;
        var box = $('#contnet');
        var ISAPI = $('#ISAPI').val();
        e.preventDefault();
        if (!ISAPI) {
          if(segments[0] == 'home'){
            $('#load-more-posts').hide();
              window.location.reload();
              return false;
            }
            function removePreviousStylesheet() {
              var currentClass = 'style_pag_css_' + segments[0];
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
            };

            function ensureUniqueStylesheet() {
              var currentPage = segments[0];
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
          
           
            if (segments[0] == 'cuentas'){
              if ($('#scripts_page').length) {
                    $('#scripts_page').remove();
              }
              var sucjs  = document.createElement('script');
              sucjs.id   = 'scripts_page';
              sucjs.src = "<?php echo $wo['config']['theme_url'];?>/javascript/flickity.pkgd.min.js?version=<?php echo $wo['config']['version']; ?>";
              document.head.appendChild(sucjs);
            }
            $.post(Wo_Ajax_Requests_Filee() + url, { url: url }, function(data) {
                if ($('.user-details').length > 0) {
                    $('.user-details').remove();
                }
                json_data = JSON.parse($(data).filter('#json-data').val());
                box.html(data);
                if (json_data.is_css_file == 1) {
                    $('.styled-profile').remove();
                    $('footer').append(json_data.css_file);
                    $('.extra-css').html(json_data.css_file_header);
                } else {
                    $('.styled-profile').attr('href', '');
                    $('.extra-css').empty();
                }
                Wo_clearPRecording();
                Wo_CleanRecordNodes();
                Wo_stopRecording();
                Wo_StopLocalStream();
                if ($('.postText').length) {
                    $('.postText').autogrow({ vertical: true, horizontal: false, height: 200 });
                }

                if (json_data.page == 'products') {
                    $('.content-container').css('margin-top', '55px');
                    $('.ad-placement-header-footer').find('.contnet').css('margin-top', '0');
                } else{
                    if ($('.content-container').length) {
                        $('.content-container').css('margin-top', '55px');
                    }
                }

                if(json_data.page == 'tienda') {
                  layshane_carousel_views();
                }

                document.title = decodeHtml(json_data.title);
                document_title = decodeHtml(json_data.title);
                $("html, body").animate({ scrollTop: 0 }, 55);
                Wo_FinishBar();
                if ($('#hidden-content').length) {
                    $('#hidden-content').empty();
                }

                $(document).ready(function() {
                  removePreviousStylesheet()
                    if ($('div.leftcol').length) {
                        $('div.leftcol').theiaStickySidebar({ additionalMarginTop: 55 });
                    }
                    var corousel_Datas = document.getElementById('carousel__content');
                    if (corousel_Datas) {
                        if (document.body.contains(corousel_Datas)) {
                            restaurarPosicionHorizontal();
                        }
                    }
                });

                $('#users-reacted-modal').modal("hide");
            }).fail(function() {}).always(function() {
                Wo_FinishBar();
            });
            $('.user-details, .pac-container, .lightbox-container').remove();
        }
    });
});