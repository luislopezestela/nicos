<?php
if ($wo['loggedin'] == false) {
  header("Location: " . lui_SeoLink('index.php?link1=welcome'));
  exit();
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'get_news_feed';
$wo['title']       = $wo['config']['siteTitle'];
$wo['content']     = lui_LoadPage('api/phone/get_news_feed/content');