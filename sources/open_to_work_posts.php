<?php
$posts = lui_GetOpenToWorkPosts(); 

$wo['open_posts'] = $posts;

$wo['description'] = '';
$wo['keywords']    = '';
$wo['page']        = 'open_to_work_posts';
$wo['title']       = $wo['lang']['open_to_work_posts'];
$wo['content']     = lui_LoadPage('open_to_work_posts/content');