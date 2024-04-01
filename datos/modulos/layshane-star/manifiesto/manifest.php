<?php
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $currentUrl = 'https://'.$_SERVER["HTTP_HOST"];
} else {
    $currentUrl = 'http://'.$_SERVER["HTTP_HOST"];
}

?>
{
  "name": "Layshane Perú",
  "short_name": "Layshane",
  "description": "Tienda en linea",
  "start_url": "<?=$currentUrl;?>",
  "display_override": ["fullscreen", "minimal-ui"],
  "display": "standalone",
  "background_color": "#ffffff",
  "theme_color": "#000000",
  "icons": [
    {
      "src": "<?=$currentUrl.'/datos/modulos/layshane-star/img/layshane_icon.png' ?>",
      "type": "image/png",
      "sizes": "682x682",
      "purpose": "any"
    },
    {
      "src": "<?=$currentUrl.'/datos/modulos/layshane-star/img/layshaneperu144.png' ?>",
      "type": "image/png",
      "sizes": "144x144",
      "purpose": "any"
    },
    {
      "src": "<?=$currentUrl.'/datos/modulos/layshane-star/img/layshane_icon_x128.png' ?>",
      "sizes": "128x128",
      "type": "image/png",
      "purpose": "maskable"
    },
    {
      "src": "<?=$currentUrl.'/datos/modulos/layshane-star/img/layshane_icon_x192.png' ?>",
      "sizes": "192x192",
      "type": "image/png",
      "purpose": "maskable"
    },
    {
      "src": "<?=$currentUrl.'/datos/modulos/layshane-star/img/layshane_icon_x384.png' ?>",
      "sizes": "384x384",
      "type": "image/png",
      "purpose": "maskable"
    },
    {
      "src": "<?=$currentUrl.'/datos/modulos/layshane-star/img/layshane_icon_x48.png' ?>",
      "sizes": "48x48",
      "type": "image/png",
      "purpose": "maskable"
    },
    {
      "src": "<?=$currentUrl.'/datos/modulos/layshane-star/img/layshane_icon_x72.png' ?>",
      "sizes": "72x72",
      "type": "image/png",
      "purpose": "maskable"
    },
    {
      "src": "<?=$currentUrl.'/datos/modulos/layshane-star/img/layshane_icon_x96.png' ?>",
      "sizes": "96x96",
      "type": "image/png",
      "purpose": "maskable"
    },
    {
      "src": "<?=$currentUrl.'/datos/modulos/layshane-star/img/layshane_icon_x512.png' ?>",
      "sizes": "512x512",
      "type": "image/png",
      "purpose": "maskable"
    }
  ]
}
