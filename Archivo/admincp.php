<?php
// You can access the admin panel by using the following url: http://yoursite.com/admincp 

require_once('luisincludes/init.php');
$is_admin = lui_IsAdmin();
$is_moderoter = lui_IsModerator();

if ($wo['config']['maintenance_mode'] == 1) {
    if ($wo['loggedin'] == false) {
        header("Location: " . lui_SeoLink('index.php?link1=welcome') . $wo['marker'] . 'm=true');
        exit();
    } else {
        if ($is_admin === false) {
            header("Location: " . lui_SeoLink('index.php?link1=welcome') . $wo['marker'] . 'm=true');
            exit();
        }
    } 
}
if ($is_admin == false && $is_moderoter == false) {
	header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
if (!empty($_GET)) {
    foreach ($_GET as $key => $value) {
        $value = preg_replace('/on[^<>=]+=[^<>]*/m', '', $value);
        $_GET[$key] = strip_tags($value);
    }
}
if (!empty($_REQUEST)) {
    foreach ($_REQUEST as $key => $value) {
        $value = preg_replace('/on[^<>=]+=[^<>]*/m', '', $value);
        $_REQUEST[$key] = strip_tags($value);
    }
}
if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        $value = preg_replace('/on[^<>=]+=[^<>]*/m', '', $value);
        $_POST[$key] = strip_tags($value);
    }
}
$wo['script_root'] = dirname(__FILE__);
// autoload admin panel files
require 'admin/autoload.php';