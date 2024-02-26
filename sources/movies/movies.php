<?php 
if ($wo['loggedin'] == false || $wo['config']['movies'] == 0 || !$wo['config']['can_use_movies']) {
	  header("Location: " . lui_SeoLink('index.php?link1=welcome'));
	  exit();
}

$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'movies';
$wo['movies']      = lui_GetMovies();
$wo['title']       = $wo['lang']['movies'];
$wo['content']     = lui_LoadPage('movies/movies');