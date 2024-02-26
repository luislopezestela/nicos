<?php
if ($f == 'update_user_cover_picture') {
    if (isset($_FILES['cover']['name'])) {
        $upload = lui_UploadImage($_FILES["cover"]["tmp_name"], $_FILES['cover']['name'], 'cover', $_FILES['cover']['type'], $_POST['user_id']);
        if ($upload === true) {
            $img              = lui_UserData($_POST['user_id']);
            $_SESSION['file'] = $img['cover_org'];
            $data             = array(
                'status' => 200,
                'img' => $img['cover'],
                'cover_or' => $img['cover_org'],
                'cover_full' => lui_GetMedia($img['cover_full']),
                'session' => $_SESSION['file']
            );
        } else {
            $data = $upload;
        }
    }
    lui_CleanCache();
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
