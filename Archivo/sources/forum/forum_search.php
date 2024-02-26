<?php
if ($wo['config']['forum_visibility'] == 1) {
    if ($wo['loggedin'] == false) {
      header("Location: " . lui_SeoLink('index.php?link1=welcome'));
      exit();
    }
}
if ($wo['config']['forum'] == 0) {
    header("Location: " . $wo['config']['site_url']);
    exit();
}


if (isset($_GET['mode']) && isset($_GET['mode']) == 'search') {

    $search_in       = (isset($_GET['search-in']))      ? lui_Secure($_GET['search-in'])      : false;
    $search_terms    = (isset($_GET['search-terms']))   ? lui_Secure($_GET['search-terms'])   : false;
    $section         = (isset($_GET['section']))        ? lui_Secure($_GET['section'])        : false;
    $search_post     = (isset($_GET['search-only']))    ? lui_Secure($_GET['search-only'])    : false;
    $search_method   = (isset($_GET['match']))          ? lui_Secure($_GET['match'])          : false;
    $search_only     = ($search_post)                   ? $search_terms                      : false;

    if (strlen($search_terms) < 4) {
        header("Location: " . lui_SeoLink('index.php?link1=forum-search'));
        exit();
    }

    //Search  forums
    if ($search_in && $search_in == "forums") {

    $search_result   = lui_GetForumSec(array(
    "search"         => true,
    "id"             => $section,
    "keyword"        => $search_terms,
    "forums"         => true,

        ));
    
    if (is_array($search_result)) {

    	$wo['description'] = $wo['config']['siteDesc'];
		$wo['keywords']    = $wo['config']['siteKeywords'];
		$wo['page']        = 'forum';
		$wo['active']      = 'forums';
		$wo['sections']    = $search_result;
		$wo['title']       = $wo['lang']['forum'] . ' | ' . $wo['config']['siteTitle'];
		$wo['content']     = lui_LoadPage('forum/forum');
 
    	}
    }   

    //Search  threads 
    if ($search_in && $search_in == "threads") {

    $search_result   = lui_GetForumThreads(array(
    "search"         => true,
    "limit"          => false,
    "subject"        => $search_terms,
    "post"           => $search_only,

        ));
    
    if (is_array($search_result)) {

    	$wo['description'] = $wo['config']['siteDesc'];
		$wo['keywords']    = $wo['config']['siteKeywords'];
		$wo['page']        = 'forum';
		$wo['active']      = 'forums';
		$wo['threads']     = $search_result;
		$wo['search-qry']  = $search_terms;
		$wo['title']       =  $wo['lang']['forum'] . ' | ' . $wo['config']['siteTitle'];
		$wo['content']     =  lui_LoadPage('forum/includes/search/thread-list');
 
    	}
    }    

    //Search  messages 
    if ($search_in && $search_in == "messages") {
    $search_result   = lui_SearchThreadReplies(array(

    "subject"        => $search_terms,
    "reply"          => $search_only,

        ));
    
    if ($search_result && count($search_result) > 0) {

		header("Location: " . lui_SeoLink("index.php?link1=showthread&tid=".$search_result[0]['thread_id']));
		exit();
 
    	}
    
    else{
    	$wo['description'] = '';
		$wo['keywords']    = '';
		$wo['page']        = 'forum';
		$wo['active']      = null;
		$wo['title']       = 'Sorry! | ' . $wo['config']['siteTitle'];
		$wo['content']     = lui_LoadPage('forum/includes/search/no-results');
    	}	
    }

}



//Load search page
else{
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'forum';
$wo['active']      = 'search';
$wo['sections']    = lui_GetForumSec(array("forums" => false));
$wo['title']       = 'Forum Search' ;
$wo['content']     = lui_LoadPage('forum/search');
}



