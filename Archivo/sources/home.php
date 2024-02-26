<?php
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'home';
$wo['title']       = $wo['config']['siteTitle'];


if($wo['config']['theme']=="layshane-star"){
    $pg = 'home/page';;
}elseif($wo['config']['theme']=="restaurante-star") {
    $pg = 'home/content';
}

$wo['content']     = lui_LoadPage($pg);

