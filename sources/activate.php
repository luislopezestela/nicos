<?php
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'activate';
$wo['title']       = $wo['lang']['home'] . ' | ' . $wo['config']['siteTitle'];
$wo['content']     = lui_LoadPage('activate/content');
