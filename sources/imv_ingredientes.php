<?php
if ($wo['loggedin'] == false) {
    header("Location: " . lui_SeoLink('index.php?link1=home'));
    exit();
}
if (lui_IsAdmin() || lui_IsModerator()) {
} else{
    header("Location: " . $wo['config']['site_url']);
    exit();
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'imventario';
$wo['title']       = "Imventario ingredientes";
$wo['content']     = lui_LoadPage('imventario/imventario_ingredientes');

 ?>