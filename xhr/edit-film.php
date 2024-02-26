<?php 
if ($f == "edit-film") {
    if (lui_IsAdmin() || lui_IsModerator()) {
        if (empty($_POST['name']) || empty($_POST['description']) || empty($_POST['id']) || !is_numeric($_POST['id'])) {
            $error = $error_icon . $wo['lang']['please_check_details'];
        } else {
            if (strlen($_POST['name']) < 3) {
                $error = $error_icon . " Por favor ingrese un nombre valido";
            }
            if (empty($_POST['genre'])) {
                $error = $error_icon . " Por favor elige un género";
            }
            if (empty($_POST['stars'])) {
                $error = $error_icon . "Por favor ingrese los nombres de las estrellas";
            }
            if (empty($_POST['producer'])) {
                $error = $error_icon . "Por favor ingrese el nombre del productor";
            }
            if (empty($_POST['country'])) {
                $error = $error_icon . $wo['lang']['please_check_details'];
            }
            if (empty($_POST['quanlity'])) {
                $error = $error_icon . $wo['lang']['please_check_details'];
            }
            if (empty($_POST['release']) || !is_numeric($_POST['release'])) {
                $error = $error_icon . "Seleccione el lanzamiento de la pelicula";
            }
            if (empty($_POST['duration']) || !is_numeric($_POST['duration'])) {
                $error = $error_icon . "Selecciona la duracion de la pelicula.";
            }
            if (strlen($_POST['description']) < 32) {
                $error = $error_icon . $wo['lang']['desc_more_than32'];
            }
            if (empty($_POST['rating']) || !is_numeric($_POST['rating']) || $_POST['rating'] < 1 || $_POST['rating'] > 10) {
                $error = $error_icon . "La calificacion debe estar entre 1 -> 10";
            }
        }
        if (!empty($_FILES["cover"]["tmp_name"])) {
            if (file_exists($_FILES["cover"]["tmp_name"])) {
                $cover = getimagesize($_FILES["cover"]["tmp_name"]);
                if ($cover[0] > 400 || $cover[1] > 570) {
                    $error = $error_icon . " El tamaño de la portada no debe ser superior a 400x570 ";
                }
            }
        }
        if (empty($error)) {
            $registration_data = array(
                'name' => $_POST['name'],
                'genre' => $_POST['genre'],
                'stars' => $_POST['stars'],
                'producer' => $_POST['producer'],
                'country' => $_POST['country'],
                'release' => $_POST['release'],
                'quality' => $_POST['quanlity'],
                'duration' => $_POST['duration'],
                'description' => $_POST['description'],
                'rating' => lui_Secure($_POST['rating'])
            );
            $film_id           = lui_Secure($_POST['id']);
            $film              = lui_UpdateFilm($film_id, $registration_data);
            if ($film) {
                $update_film = array();
                if (!empty($_FILES["cover"]["tmp_name"])) {
                    $fileInfo             = array(
                        'file' => $_FILES["cover"]["tmp_name"],
                        'name' => $_FILES['cover']['name'],
                        'size' => $_FILES["cover"]["size"],
                        'type' => $_FILES["cover"]["type"],
                        'types' => 'jpeg,jpg,png,bmp,gif',
                        'compress' => false
                    );
                    $media                = lui_ShareFile($fileInfo);
                    $update_film['cover'] = $media['filename'];
                }
                if (count($update_film) > 0) {
                    lui_UpdateFilm($film_id, $update_film);
                }
                $data = array(
                    'status' => 200,
                    'message' => $success_icon . ' La pelicula se actualizo con exito.'
                );
            }
        } else {
            $data = array(
                'status' => 500,
                'message' => $error
            );
        }
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
