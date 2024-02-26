<?php
if ($wo['config']['blogs'] == 0) {
    header("Location: " . $wo['config']['site_url']);
    exit();
}
if (empty($_GET['id'])) {
    header("Location: " . $wo['config']['site_url']);
    exit();
}

$_GET['id'] = str_replace("/", "", $_GET['id']);
$_GET['id'] = lui_GetBlogIdFromUrl($_GET['id']);
if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: " . $wo['config']['site_url']);
    exit();
}
$article = lui_GetArticle($_GET['id']);
$id      = lui_Secure($_GET['id']);
if (empty($article)) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
$sql_query         = mysqli_query($sqlConnect, "UPDATE `lui_blog` SET `view` = `view` + 1 WHERE `id` = '$id'");
$wo['description'] = $article['description'];
$wo['keywords']    = $article['tags'];
$wo['page']        = 'read-blog';
$wo['article']     = $article;
$wo['author']      = $article['author'];
$wo['title']       = $article['title'];
$wo['content']     = lui_LoadPage('blog/read-blog');
