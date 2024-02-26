<?php
if ($wo['loggedin'] == false) {
   header("Location: " . lui_SeoLink('index.php?link1=welcome'));
   exit();
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'saved_posts';
$wo['title']       = $wo['lang']['saved_posts'] . ' | ' . $wo['config']['siteTitle'];
$wo['content']     = lui_LoadPage('saved-posts/content');