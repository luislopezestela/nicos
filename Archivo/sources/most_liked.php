<?php
if ($wo['loggedin'] == false || $wo['config']['popular_posts'] != 1) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
$posts = lui_GetPosts(array('filter_by' => 'most_liked','publisher_id' => 0 , 'dt' => 0, 'lasttotal' => 0 )); 

$wo['most_liked'] = $posts;

$wo['description'] = '';
$wo['keywords']    = '';
$wo['page']        = 'most_liked';
$wo['title']       = 'Most Liked';
$wo['content']     = lui_LoadPage('most_liked/content');