$(function() {
  var numeroDeEntradas = window.history.length;
  console.log(numeroDeEntradas)
    window.addEventListener("popstate", function(e) {
        if (typeof(check_wallet) != 'undefined') {
            clearInterval(check_wallet);
        }
        Wo_CloseLightbox();
        $('body').removeAttr('no-more-posts');
        if ($('.postText').length) {
            if ($('.postText').val().length > 0) {
                if (!confirm("<?php echo html_entity_decode($wo['lang']['havent_finished_post'], ENT_QUOTES) ?>")) {
                    return false;
                } else {
                    $('.postText').val("");
                }
            }
        }

        var segments = window.location.pathname.split('/').filter(Boolean);

        // Definir valores predeterminados para link1, c_id y sub_id
        var link1 = "home"; // Establecer por defecto como "home" 
        var c_id = null;
        var sub_id = null;

        // Verificar si hay segmentos en la URL
        if (segments.length > 0) {
            // Si hay segmentos, establecer link1 como el primer segmento de la URL
            link1 = segments[0];
            // Verificar si hay más segmentos para c_id
            if (segments.length > 1) {
                // Convertir el segundo segmento a un número si es posible (para c_id)
                c_id = segments[1] || null;
                // Verificar si hay más segmentos para sub_id
                if (segments.length > 2) {
                    // Convertir el tercer segmento a un número si es posible (para sub_id)
                    sub_id = segments[2] || null;
                }
            }
        }

        // Construir la URL con los valores obtenidos
        var params = {};
        if (link1) params.link1 = link1;
        if (c_id !== null) params.c_id = c_id;
        if (sub_id !== null) params.sub_id = sub_id;

        var url = '?'+$.param(params);
        Wo_StartBar();
        window.post = 0;
        var box = $('#contnet');
        var ISAPI = $('#ISAPI').val();
        e.preventDefault();
        if (!ISAPI) {
            if (url == '?index.php?link1=home') {
                $get_value = $('#json-data').val();
                if ($get_value) {
                    $('#load-more-posts').hide();
                    json_data = JSON.parse(url);
                    if (json_data.page == 'home') {
                        document.getElementById('posts').innerHTML = '<div class="paage_loader_s"><div class="titulo_loader_w loader_layshane"></div></div><div class="loading_poruductos_cont"><div class="loading_poruductos"><div class="loader_layshane"></div></div><div class="loading_poruductos"><div class="loader_layshane"></div></div><div class="loading_poruductos"><div class="loader_layshane"></div></div><div class="loading_poruductos"><div class="loader_layshane"></div></div>';
                        loadposts();
                        window.history.pushState(null, '', websiteUrl);
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
            $.post(Wo_Ajax_Requests_Filee() + url, { url: url }, function(data) {
                if ($('.user-details').length > 0) {
                    $('.user-details').remove();
                }
                json_data = JSON.parse($(data).filter('#json-data').val());

                if (json_data.welcome_page == 1 || json_data.redirect == 1) {
                    window.location.href = websiteUrl;
                    return false;
                }
                if ($('.message-option-btns').length > 0) {
                    if (json_data.url == 'index.php?index.php?link1=home') {
                        window.location.href = websiteUrl;
                    } else {
                        window.location.href = json_data.url;
                    }
                    return false;
                }
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
                if (json_data.page == 'home') {
                    window.history.pushState(null, '', websiteUrl);
                } else {
                    window.history.pushState(null, '', json_data.url);
                }
                if ($('.postText').length) {
                    $('.postText').autogrow({ vertical: true, horizontal: false, height: 200 });
                }

                if (json_data.page == 'products') {
                    $('.content-container').css('margin-top', '90px');
                    $('.ad-placement-header-footer').find('.contnet').css('margin-top', '0');
                } else if (json_data.page == 'tienda') {
                    if ($('#store_cs').length) {
                        $('#store_cs').remove();
                    }
                    var link = document.createElement('link');
                    link.rel = 'stylesheet';
                    link.id = "store_cs";
                    link.href = "<?=$wo['config']['theme_url'].'/stylesheet/layshane_t.css';?><?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>";
                    document.head.appendChild(link);
                } else {
                    if ($('.content-container').length) {
                        $('.content-container').css('margin-top', '90px');
                    }
                }
                document.title = decodeHtml(json_data.title);
                document_title = decodeHtml(json_data.title);
                $("html, body").animate({ scrollTop: 0 }, 90);
                Wo_FinishBar();
                if ($('#hidden-content').length) {
                    $('#hidden-content').empty();
                }

                $(document).ready(function() {
                    if ($('div.leftcol').length) {
                        $('div.leftcol').theiaStickySidebar({ additionalMarginTop: 90 });
                    }
                    var corousel_Datas = document.getElementById('carousel__content');
                    if (corousel_Datas){
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