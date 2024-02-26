<?php 
if (lui_CanBlog() == false) {
	header("Location: " . $wo['config']['site_url']);
    exit();
}
if ($wo['loggedin'] == false) {
	  header("Location: " . $wo['config']['site_url']);
	  exit();
}
if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
	  header("Location: " . $wo['config']['site_url']);
	  exit();
}
if (lui_IsBlogOwner($_GET['id']) === false) {
	  header("Location: " . $wo['config']['site_url']);
	  exit();
}
$data = lui_GetArticle($_GET['id']);
if (empty($data)) {
	header("Location: " . $wo['config']['site_url']);
    exit();
}
$wo['description'] = '';
$wo['keywords']    = '';
$wo['page']        = 'edit-blog';
$wo['title']       = $wo['lang']['edit'];
$wo['article']     = $data;
$wo['content']     = lui_LoadPage('blog/edit-blog');