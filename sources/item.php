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

        $buscarelidcolor = '';
        if(!empty($wo['itemsdata']['product_id'])){
            $color_productos_vcol = mysqli_query($sqlConnect, "SELECT `id`,`id_producto`, `id_color` FROM `lui_opcion_de_colores_productos` WHERE `id_producto` = '{$wo['itemsdata']['product']['id']}'");

            if (mysqli_num_rows($color_productos_vcol) >= 1) {
                while ($fet_data = mysqli_fetch_assoc($color_productos_vcol)) {
                    $color_query = mysqli_query($sqlConnect, "SELECT `id`,`lang_key` FROM `lui_products_colores` WHERE `id` = '{$fet_data['id_color']}'");
                    $color_data = mysqli_fetch_assoc($color_query);
                    if ($wo['atributo_items']!=0) {
                        $elcolor_disponible_view = lui_SlugPost($wo['lang'][$color_data['lang_key']]);
                        if($wo['atributo_items']==$elcolor_disponible_view){
                            $imagen_color_query = mysqli_query($sqlConnect, "SELECT `id`,`image` FROM `lui_products_media` WHERE `id_color` = '{$fet_data['id']}'");
                            $imagen_color_data = mysqli_fetch_assoc($imagen_color_query);
                            $wo['itemsdata']['product']['elcolorseleccionadourl'] = $color_data['id'];
                            $wo['itemsdata']['product']['coloreds'] = '/'. lui_SlugPost($wo['lang'][$color_data['lang_key']]);
                            $wo['itemsdata']['product']['coloreds_b'] = '&opcion='. lui_SlugPost($wo['lang'][$color_data['lang_key']]);
                            $buscarelidcolor = $imagen_color_data['image'];
                        }
                    }else{
                        $wo['itemsdata']['product']['elcolorseleccionadourl'] = '';
                        $wo['itemsdata']['product']['coloreds'] = '';
                    }
                    
                }
            } else {
                $wo['itemsdata']['product']['elcolorseleccionadourl'] = '';
                $wo['itemsdata']['product']['coloreds'] = '';
                $wo['itemsdata']['product']['coloreds_b'] = '';
            }

            if ($buscarelidcolor=='') {
                $wo['itemsdata']['product']['imagen_portada'] = $wo['itemsdata']['product']['images'][0]['image'];
            }else{
                $wo['itemsdata']['product']['imagen_portada'] = lui_GetMedia($buscarelidcolor);
            }


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









