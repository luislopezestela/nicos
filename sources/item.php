<?php
$check_item = lui_IsNameExist_productos($_GET['items'], 1);
if(in_array(true, $check_item)){
    if ($check_item['type'] == 'producto'){
        if(isset($_GET['opcion'])) {
            $datos_atributo_uno = $_GET['opcion'];
        }else{
            $datos_atributo_uno = 0;
        }
        $wo['atributo_items'] = $datos_atributo_uno;
        $placement = '';
        if($wo['loggedin'] == true){
            if(lui_IsAdmin()){
                $placement = 'admin';
            }
        }
        $id = $_GET['items'];
        $wo['itemsdata'] = lui_PublicacionData($id, $placement, 'not_limited');
        $wo['itemsdata']['page'] = 1;
        $wo['itemsdata']['id_publicacion'] = $id;
        if(!empty($wo['itemsdata']['product_id'])){
            $name = $wo['title']        = FilterStripTags(lui_Secure($wo['itemsdata']['product']['name'])). ' - ' . $wo['config']['siteName'];
            $keyword = $wo['keywords']  = FilterStripTags(lui_Secure($wo['itemsdata']['product']['name']));
            $about = $wo['description'] = FilterStripTags(strip_tags(lui_Secure($wo['itemsdata']['product']['description'])));
        }
    }
}else{
    header("Location: " .lui_SeoLink('index.php?link1=404'));
    exit();
}

if(isset($keyword)) {
    $keywordrr = $keyword;
}else{
    $keywordrr = "";
}
if(isset($about)) {
    $abouts = $about;
}else{
    $abouts = "";
}
if(isset($name)) {
    $names = $name;
}else{
    $names = "";
}
$wo['description'] = $abouts;
$wo['keywords']    = $keywordrr;
$wo['page']        = 'publicacion';
$wo['title']       = str_replace('&#039;', "'", $names);
$wo['content'] =lui_LoadPage("publicacion/content");









