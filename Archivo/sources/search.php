<?php
$wo['description'] = '';
$wo['keywords']    = '';
$wo['page']        = 'search';
$wo['title']       = $wo['lang']['search'] . ' | ' . $wo['config']['siteTitle'];
if ($wo['config']['website_mode'] == 'linkedin') {
    $wo['content'] = lui_LoadPage('search/linkedin');
} else {
    $wo['content'] = lui_LoadPage('search/content');
}
