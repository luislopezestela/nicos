<?php
if($_SESSION["admin_id"]){
    $lan = new DatosLang();
    $lan->nombre = Luis::poner_subguion(html_entity_decode($_POST["lang"]));
     $lan->add_languages();
    if($lan){
        $content = file_get_contents('datos/language/es_spanish.php');
        $fp      = fopen("datos/language/$lan->nombre.php", "wb");
        fwrite($fp, $content);
        fclose($fp);
        $spanish = DatosLang::luis_lang_bd('es_spanish');
        foreach ($spanish as $es){
            $molp = new DatosLang();
            $molp->keyname = $lan->nombre;
            $molp->keylangid = $es->lang_key;
            $molp->langdefault = $es->spanish;
            $molp->add_language_name();
        }
        $data = array('estado' => 200);
    }else{
        $data = array('estado' => 400, 'error');
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}