<?php 
$data = $db->where('name','login_with')->getOne(T_HTML_EMAILS);
$html = $data->value;
$replaces = array('FIRST_NAME' => $wo['user']['first_name'],
                  'SITE_NAME' => $wo['config']['siteName'],
                  'USERNAME' => $wo['user']['username'],
                  'EMAIL' => $wo['user']['email']);
$html = lui_ReplaceText($html,$replaces);
echo $html;
 ?>