<?php
require_once('luisincludes/init.php');
$is_admin     = lui_IsAdmin();
$is_moderoter = lui_IsModerator();
if ($wo['config']['maintenance_mode'] == 1) {
    if ($wo['loggedin'] == false) {
        header("Location: " . lui_SeoLink('index.php?link1=home') . $wo['marker'] . 'm=true');
        exit();
    } else {
        if ($is_admin === false) {
            header("Location: " . lui_SeoLink('index.php?link1=home') . $wo['marker'] . 'm=true');
            exit();
        }
    }
}
if ($is_admin == false && $is_moderoter == false) {
    header("Location: " . lui_SeoLink('index.php?link1=home'));
    exit();
}
if (!empty($_GET)) {
    foreach ($_GET as $key => $value) {
        $value      = preg_replace('/on[^<>=]+=[^<>]*/m', '', $value);
        $_GET[$key] = strip_tags($value);
    }
}
if (!empty($_REQUEST)) {
    foreach ($_REQUEST as $key => $value) {
        $value          = preg_replace('/on[^<>=]+=[^<>]*/m', '', $value);
        $_REQUEST[$key] = strip_tags($value);
    }
}
if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        $value       = preg_replace('/on[^<>=]+=[^<>]*/m', '', $value);
        $_POST[$key] = strip_tags($value);
    }
}
$path  = (!empty($_GET['path'])) ? getPageFromPath($_GET['path']) : null;
$files = scandir('admin/paginas');
unset($files[0]);
unset($files[1]);
unset($files[2]);
$page = 'dashboard';
if (!empty($path['page']) && in_array($path['page'], $files) && file_exists('admin/paginas/' . $path['page'] . '/content.php')) {
    $page = $path['page'];
}
$wo['user']['permission'] = json_decode($wo['user']['permission'] ??'' , true);
if (!empty($wo['user']['permission'][$page])) {
  if (!empty($wo['user']['permission']) && $wo['user']['permission'][$page] == 0) {
      header("Location: " . lui_SeoLink('index.php?link1=home'));
      exit();
  }
}
$wo['decode_android_v']  = $wo['config']['footer_background'];
$wo['decode_android_value']  = base64_decode('I2FhYQ==');

$wo['decode_android_n_v']  = $wo['config']['footer_background_n'];
$wo['decode_android_n_value']  = base64_decode('I2FhYQ==');

$wo['decode_ios_v']  = $wo['config']['footer_background_2'];
$wo['decode_ios_value']  = base64_decode('I2FhYQ==');

$wo['decode_windwos_v']  = $wo['config']['footer_text_color'];
$wo['decode_windwos_value']  = base64_decode('I2RkZA==');
$data = array();
$wo['script_root'] = dirname(__FILE__);
$text = lui_LoadAdminPage($page.'/content');
?>
<input type="hidden" id="json-data" value='<?php
echo htmlspecialchars(json_encode($data));
?>'>
<?php
echo $text;
?>
