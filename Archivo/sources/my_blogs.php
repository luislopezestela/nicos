<?php
if ($wo['loggedin'] == false) {
    header("Location: " . $wo['config']['site_url']);
    exit();
}
if (lui_CanBlog() == false) {
    header("Location: " . $wo['config']['site_url']);
    exit();
}
$wo['description'] = '';
$wo['keywords']    = '';
$wo['page']        = 'My-Blogs';
$wo['title']       = $wo['lang']['my_articles'];
$wo['content']     = lui_LoadPage('blog/my-blogs');
