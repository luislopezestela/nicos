<?php
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'home';
$wo['title']       = $wo['config']['siteTitle'];


if($wo['config']['theme']=="layshane-star") {
    $wo['content']     = lui_LoadPage('home/page');
}elseif($wo['config']['theme']=="restaurante-star") {
    $wo['content']     = lui_LoadPage('home/content');
}

