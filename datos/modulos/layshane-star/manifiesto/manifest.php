<?php
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $currentUrl = 'https://'.$_SERVER["HTTP_HOST"];
} else {
    $currentUrl = 'http://'.$_SERVER["HTTP_HOST"];
}

?>
{
  "name": "Layshane",
  "short_name": "Layshane",
  "description": "Tienda en linea",
  "start_url": "<?=$currentUrl;?>",
  "display": "standalone",
  "background_color": "#ffffff",
  "theme_color": "#000000",
  "icons": [
    {
      "src": "<?=$currentUrl.'/datos/modulos/layshane-star/img/icon.png' ?>",
      "sizes": "192x192",
      "type": "image/png"
    },
    {
      "src": "<?=$currentUrl.'/datos/modulos/layshane-star/img/icon.png' ?>",
      "sizes": "512x512",
      "type": "image/png",
      "purpose": "maskable"
    }
  ]
}
