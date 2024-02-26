<?php
if (lui_CanBlog() == false) {
    header("Location: " . $wo['config']['site_url']);
    exit();
}
if ($wo['loggedin'] == false) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'create_blog';
$wo['title']       = $wo['lang']['create_new_article'];
$wo['content']     = lui_LoadPage('blog/create-blog');
