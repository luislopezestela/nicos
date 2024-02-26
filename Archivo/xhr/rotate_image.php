<?php 
if ($f == 'rotate_image') {
    $data = array(
        "status" => 400
    );
    if (isset($_GET['image']) && isset($_GET['angle'])) {
        lui_RunInBackground();
        $degrees  = lui_Secure($_GET['angle']);
        $id       = lui_Secure($_GET['image']);
        $wo_story = lui_PostData($id);
        $image    = lui_GetMedia($wo_story['postFile']);
        $fileType = strtolower(substr($image, strrpos($image, '.') + 1));
        if ($wo['user']['user_id'] == $wo_story['publisher']['user_id']) {
            $put_file = file_put_contents($wo_story['postFile'], file_get_contents($image));
            if ($put_file) {
                if ($fileType == 'png') {
                    header('Content-type: image/png');
                    $source  = imagecreatefrompng($wo_story['postFile']);
                    $bgColor = imagecolorallocatealpha($source, 255, 255, 255, 127);
                    $rotate  = imagerotate($source, $degrees, $bgColor);
                    imagesavealpha($rotate, true);
                    imagepng($rotate, $wo_story['postFile']);
                }
                if ($fileType == 'jpg' || $fileType == 'jpeg') {
                    header('Content-type: image/jpeg');
                    $source = imagecreatefromjpeg($wo_story['postFile']);
                    $rotate = imagerotate($source, $degrees, 0);
                    imagejpeg($rotate, $wo_story['postFile']);
                }
                imagedestroy($source);
                imagedestroy($rotate);
                lui_UploadToS3($wo_story['postFile']);
                $update = $db->where('id', $id)->update(T_POSTS, array(
                    'cache' => time()
                ));
                $data   = array(
                    "status" => 200
                );
            }
        }
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
