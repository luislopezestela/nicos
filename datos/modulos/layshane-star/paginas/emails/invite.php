<?php 
$data = $db->where('name','invite')->getOne(T_HTML_EMAILS);
$html = $data->value;
$replaces = array('USERNAME' => $wo['user']['username'],
                 'SITE_URL' => $wo['config']['site_url'],
                 'NAME' => $wo['user']['name'],
                 'URL' => $wo['user']['url'],
                 'SITE_NAME' => $wo['config']['siteName'],
                 'BACKGOUND_COLOR' => $wo['config']['btn_background_color']);
$html = lui_ReplaceText($html,$replaces);
echo $html;
 ?>