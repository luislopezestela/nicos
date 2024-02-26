<?php 
if ($f == 'get_prodects_by_filter') {
    $data['status'] = 400;
    $cat_id = !empty($_POST['cat_id']) ? lui_Secure($_POST['cat_id']) : '';
    $distance = !empty($_POST['distance']) ? lui_Secure($_POST['distance']) : '';
    $price_sort = !empty($_POST['price_sort']) ? lui_Secure($_POST['price_sort']) : '';
    $sub_id = !empty($_POST['sub_id']) ? lui_Secure($_POST['sub_id']) : '';
    $products = lui_GetProducts(array('c_id' => $cat_id,
                                     'length' => $distance,
                                     'order_by' => $price_sort,
                                     'sub_id' => $sub_id));
    $html = '';
    if (!empty($products)){
        foreach ($products as $key => $wo['product']) {
            $html .= lui_LoadPage('products/products-list'); 
        }
    }
    if (!empty($html)) {
        $data['status'] = 200;
        $data['html'] = $html;
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}

// NEW STORY 
