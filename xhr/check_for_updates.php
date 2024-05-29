<?php 
if ($f == 'buscar_actualizaciones') {
    $false = false;
    if (!is_dir('datos/modulos/layshane-star')) {
        $false = true;
    }
    if (!is_dir('datos/modulos/layshane') && $false == true) {
        $false = true;
    } else {
        $false = false;
    }
    if ($false == true) {
        $data['status']     = 400;
        $data['ERROR_NAME'] = 'Parece que ha cambiado el nombre de sus temas, cámbielos de nuevo a "layshane", "layshane" para usar el sistema de actualización automática; de lo contrario, actualice su sitio manualmente.';
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if (lui_CheckMainSession($hash_id) === true) {
        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false
            )
        );
        if (!empty($_GET['purchase_code'])) {
            $purchase_code = lui_Secure($_GET['purchase_code']);
            $version       = lui_Secure($wo['script_version']);
            $siteurl       = urlencode($_SERVER['SERVER_NAME']);
            $file          = file_get_contents("https://layshane.com/buscar_actualizaciones.php?code={$purchase_code}&version=$version&url=$siteurl", false, stream_context_create($arrContextOptions));
            $check         = json_decode($file, true);
            if (!empty($check['status'])) {
                if ($check['status'] == 'SUCCESS') {
                    if (!empty($check['versions'])) {
                        $data['status']         = 200;
                        $data['script_version'] = $wo['script_version'];
                        $data['versions']       = $check['versions'];
                    } else {
                        $data['status'] = 300;
                    }
                } else {
                    $data['status']     = 400;
                    $data['ERROR_NAME'] = $check['ERROR_NAME'];
                }
            }
        }
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
