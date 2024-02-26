<?php
$check_item = lui_IsNameExist_productos($_GET['items'], 1);
if (in_array(true, $check_item)) {
    if ($check_item['type'] == 'producto') {
            $type                         = 'publicacion';
            if (isset($_GET['type'])) {
                $datos_atributo_uno = $_GET['type'];
            }else{
                $datos_atributo_uno = 0;
            }
            $wo['atributo_items']    = $datos_atributo_uno;
            $placement = '';
            if ($wo['loggedin'] == true) {
                if (lui_IsAdmin()) {
                    $placement = 'admin';
                }
            }
            $id = $_GET['items'];
            if (!empty($_GET['ref']) && is_numeric($_GET['ref']) && $_GET['ref'] > 0) {
                $wo['itemsdata'] = lui_PublicacionData($id, $placement, 'not_limited', lui_Secure($_GET['ref']));
            } else {
                $wo['itemsdata'] = lui_PublicacionData($id, $placement, 50);
            }
            if (lui_PostExists($wo['itemsdata']['post_id']) === false) {
                header("Location: " . $wo['config']['site_url']);
                exit();
            }
            $wo['itemsdata']['page'] = 1;
            $wo['itemsdata']['id_publicacion'] = $id;
            if (!empty($wo['itemsdata']['product_id'])) {
                $name = $wo['title']       = FilterStripTags(lui_Secure($wo['itemsdata']['product']['name'])). ' - ' . $wo['config']['siteName'];
                $keyword = $wo['keywords']      = FilterStripTags(lui_Secure($wo['itemsdata']['product']['name']));
                $about = $wo['description'] = FilterStripTags(strip_tags(lui_Secure($wo['itemsdata']['product']['description'])));
            }
        }
    } else {
        //header("Location: " .lui_SeoLink('index.php?link1=404'));
        //exit();
    }




if(isset($keyword)) {
    $keywordrr = $keyword;
}else{
    $keywordrr = "";
}
$wo['description'] = $about;
$wo['keywords']    = $keywordrr;
$wo['page']        = $type;
$wo['title']       = str_replace('&#039;', "'", $name);
$wo['content'] =lui_LoadPage("publicacion/content");









