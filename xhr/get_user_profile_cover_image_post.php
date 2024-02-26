<?php 
if ($f == 'get_user_profile_cover_image_post') {
    if (!empty($_POST['image'])) {
        $getUserImage = lui_GetUserProfilePicture(lui_Secure($_POST['image'], 0));
        if (!empty($getUserImage)) {
            $data = array(
                'status' => 200,
                'post_id' => $getUserImage
            );
        }
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
