<?php
if ($wo['loggedin'] == false) {
  header("Location: " . lui_SeoLink('index.php?link1=welcome'));
  exit();
}
if ($wo['config']['groups'] == 0) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
if (!$wo['config']['can_use_groups']) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'my_groups';
$wo['title']       = $wo['lang']['my_groups'];
$wo['content']     = lui_LoadPage('group/my-groups');