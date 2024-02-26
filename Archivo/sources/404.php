<?php
//header($_SERVER["SERVER_PROTOCOL"]." 404 No encontrado");
$wo['description'] = '';
$wo['keywords']    = '';
$wo['page']        = '404';
$wo['title']       = $wo['lang']['sorry_page_not_found'];
$wo['content']     = lui_LoadPage('404/content');