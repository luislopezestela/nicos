<?php 
if ($f == 'load_publicacion') {
    $wo['page'] = 'publicacion';
    $load = sanitize_output(lui_LoadPage('publicacion/datos_items'));
    echo $load;
    exit();
}
 