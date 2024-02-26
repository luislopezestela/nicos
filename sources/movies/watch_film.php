<?php 
if (!isset($_GET['film-id']) || $wo['config']['movies'] == 0 || !$wo['config']['can_use_movies']) {
  header("Location: " . lui_SeoLink('index.php?link1=welcome'));
  exit();
}
$id = lui_Secure($_GET['film-id']);
$id = lui_GetPostIdFromUrl($id);
if (empty($id) || !is_numeric($id)) {
    header("Location: " . $wo['config']['site_url']);
    exit();
}
$source = lui_GetMovies(array('id' => $id));
if (count($source) > 0) {
	$query = mysqli_query($sqlConnect, "UPDATE " . T_MOVIES . " SET views = views + 1 WHERE id = '$id'");
	$wo['description']   = $source[0]['description'];
	$wo['keywords']      = $wo['config']['siteKeywords'];
	$wo['page']          = 'watch_movie';
	$wo['movie']         = $source[0];
	$wo['related-films'] = lui_SearchFilms($wo['movie']['name']);
	$wo['title']         = $source[0]['name'];
	$wo['content']       = lui_LoadPage('movies/watch');
}
