<?php
if (empty($_GET['app_id'])) {
    $errors = array(
    	'status' => 400,
        'errors' => array(
            'error_code' => 1,
            'message' => 'Empty app ID'
        )
    );
    header("Content-type: application/json");
    echo json_encode($errors, JSON_PRETTY_PRINT);
    exit();
}
if (empty($_GET['app_secret'])) {
    $errors = array(
    	'status' => 400,
        'errors' => array(
            'error_code' => 2,
            'message' => 'Empty app secret'
        )
    );
    header("Content-type: application/json");
    echo json_encode($errors, JSON_PRETTY_PRINT);
    exit();
}
if (empty($_GET['code'])) {
    $errors = array(
    	'status' => 400,
        'errors' => array(
            'error_code' => 3,
            'message' => 'Empty code'
        )
    );
    header("Content-type: application/json");
    echo json_encode($errors, JSON_PRETTY_PRINT);
    exit();
}
if (lui_VerifyAPIApii($_GET['app_id'], $_GET['app_secret']) === false) {
	$errors = array(
    	'status' => 400,
        'errors' => array(
            'error_code' => 4,
            'message' => 'App id not found or secret id is wrong'
        )
    );
    header("Content-type: application/json");
    echo json_encode($errors, JSON_PRETTY_PRINT);
    exit();
}
if (empty($_GET['code'])) {
    $errors = array(
    	'status' => 400,
        'errors' => array(
            'error_code' => 5,
            'message' => 'Empty code'
        )
    );
    header("Content-type: application/json");
    echo json_encode($errors, JSON_PRETTY_PRINT);
    exit();
}
$code = lui_GetCode($_GET['code']);
if (empty($code)) {
	$errors = array(
    	'status' => 400,
        'errors' => array(
            'error_code' => 6,
            'message' => 'Code is invalid'
        )
    );
    header("Content-type: application/json");
    echo json_encode($errors, JSON_PRETTY_PRINT);
    exit();
}
if (lui_AppHasPermission($code['user_id'], $code['app_id']) === false) {
	$errors = array(
    	'status' => 400,
        'errors' => array(
            'error_code' => 7,
            'message' => 'No permission givin'
        )
    );
    header("Content-type: application/json");
    echo json_encode($errors, JSON_PRETTY_PRINT);
    exit();
}
$import = lui_GenrateToken($code['user_id'], $code['app_id']);
$data = array("status" => 200, "access_token" => $import);

$code = lui_Secure($code['code']);
$query = mysqli_query($sqlConnect, "DELETE FROM " . T_CODES . " WHERE `code` = '$code'");

header("Content-type: application/json");
echo json_encode($data, JSON_PRETTY_PRINT);
exit();
?>