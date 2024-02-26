<?php 
if ($f == "search-art") {
    $category = (isset($_GET['cat'])) ? $_GET['cat'] : false;
    $keyword  = (isset($_GET['keyword'])) ? lui_Secure($_GET['keyword']) : false;
    $result   = lui_SearchBlogs(array(
        "keyword" => $keyword,
        "category" => $category
    ));
    $status   = 404;
    $html     = "";
    if ($result && count($result) > 0) {
        foreach ($result as $wo['blog']) {
            $html .= lui_LoadPage('blog/includes/card-horiz-list');
        }
        $data = array(
            'status' => 200,
            'html' => $html
        );
    } else {
        $data = array(
            'status' => 200,
            "warning" => $wo['lang']['no_blogs_found']
        );
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
