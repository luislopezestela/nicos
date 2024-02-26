<?php 
if ($f == "load-my-blogs" && $wo['loggedin'] === true) {
    $html  = '';
    $blogs = lui_GetMyBlogs($wo['user']['id'], $_GET['offset']);
    if (count($blogs) > 0) {
        foreach ($blogs as $key => $wo['blog']) {
            $html .= lui_LoadPage('blog/includes/card-lg-list');
        }
        $data = array(
            'status' => 200,
            'html' => $html
        );
    } else {
        $data = array(
            'status' => 404
        );
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}

