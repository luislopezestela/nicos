<?php
if ($wo['loggedin'] == true) {
    header("Location: " . $wo['config']['site_url']);
    exit();
}
if (empty($_GET['code'])) {
    header("Location: " . $wo['config']['site_url']);
    exit();
}
$file     = 'reset-password';
$validate = lui_isValidPasswordResetToken($_GET['code']);
if ($validate === false) {
    $validate = lui_isValidPasswordResetToken2($_GET['code']);
    if ($validate === false) {
        $file = 'invalid-markup';
    }
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'welcome';
$wo['title']       = $wo['config']['siteTitle'];
$wo['content']     = lui_LoadPage('welcome/' . $file);
