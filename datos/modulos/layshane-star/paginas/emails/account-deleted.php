<?php 
$data = $db->where('name','account_deleted')->getOne(T_HTML_EMAILS);
$html = $data->value;
$replaces = array('name' => $wo['deletedUserData']['username'],
                 'SITE_URL' => $wo['config']['site_url'],
                 'SITE_NAME' => $wo['config']['siteName']);
$html = lui_ReplaceText($html,$replaces);
echo $html;
?>