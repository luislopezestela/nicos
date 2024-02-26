<?php
if ($wo['loggedin'] == false || $wo['config']['games'] == 0) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
if (!$wo['config']['can_use_games']) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
$wo['setting']['admin'] = false;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    if (lui_GameExists($_GET['id']) === false) {
        header("Location: " . lui_SeoLink('index.php?link1=404'));
        exit();
    }
    $game_id = lui_Secure($_GET['id']);
    if (empty($game_id)) {
        header("Location: " . lui_SeoLink('index.php?link1=welcome'));
        exit();
    }
    $wo['game'] = lui_GameData($game_id);
}
$add_game          = lui_AddPlayGame($game_id);
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'game';
$wo['title']       = $wo['game']['game_name'] . ' | ' . $wo['config']['siteTitle'];
$wo['content']     = lui_LoadPage('games/game-page');
