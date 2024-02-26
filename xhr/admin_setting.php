<?php
use Aws\S3\S3Client;
use Google\Cloud\Storage\StorageClient;
if ($f == 'admin_setting' AND (lui_IsAdmin() || lui_IsModerator())) {
    if ($s == 'search_in_pages') {
        $keyword           = lui_Secure($_POST['keyword']);
        $html              = '';
        $files             = scandir('./admin/paginas');
        $not_allowed_files = array(
            'edit-custom-page',
            'edit-lang',
            'edit-movie',
            'edit-profile-field',
            'edit-terms-pages',
            'manage-permissions'
        );
        foreach ($files as $key => $file) {
            if (file_exists('./admin/paginas/' . $file . '/content.php') && !in_array($file, $not_allowed_files)) {
                $string = file_get_contents('./admin/paginas/' . $file . '/content.php');
                preg_match_all("@(?s)<h2([^<]*)>([^<]*)<\/h2>@", $string, $matches1);
                if (!empty($matches1) && !empty($matches1[2])) {
                    foreach ($matches1[2] as $key => $title) {
                        if (strpos(strtolower($title), strtolower($keyword)) !== false) {
                            $page_title = '';
                            preg_match_all("@(?s)<h2([^<]*)>([^<]*)<\/h2>@", $string, $matches3);
                            if (!empty($matches3) && !empty($matches3[2])) {
                                foreach ($matches3[2] as $key => $title2) {
                                    $page_title = $title2;
                                    break;
                                }
                            }
                            $html .= '<a href="' . lui_LoadAdminLinkSettings($file) . '?highlight=' . $keyword . '"><div  style="padding: 5px 2px;">' . $page_title . '</div><div><small style="color: #333;">' . $title . '</small></div></a>';
                            break;
                        }
                    }
                }
                preg_match_all("@(?s)<label([^<]*)>([^<]*)<\/label>@", $string, $matches2);
                if (!empty($matches2) && !empty($matches2[2])) {
                    foreach ($matches2[2] as $key => $lable) {
                        if (strpos(strtolower($lable), strtolower($keyword)) !== false) {
                            $page_title = '';
                            preg_match_all("@(?s)<h2([^<]*)>([^<]*)<\/h2>@", $string, $matches3);
                            if (!empty($matches3) && !empty($matches3[2])) {
                                foreach ($matches3[2] as $key => $title2) {
                                    $page_title = $title2;
                                    break;
                                }
                            }
                            $html .= '<a href="' . lui_LoadAdminLinkSettings($file) . '?highlight=' . $keyword . '"><div  style="padding: 5px 2px;">' . $page_title . '</div><div><small style="color: #333;">' . $lable . '</small></div></a>';
                            break;
                        }
                    }
                }
            }
        }
        $data = array(
            'status' => 200,
            'html' => $html
        );
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'get_supported_coins') {
        $result = coinpayments_api_call(array('key' => $wo['config']['coinpayments_public_key'],
                                              'version' => '1',
                                              'format' => 'json',
                                              'cmd' => 'rates',
                                              'accepted' => '1'));
        $coins = array();
        if (!empty($result) && $result['status'] == 200) {
            foreach ($result['data'] as $key => $value) {
                if ($value['accepted'] == 1 && $value['is_fiat'] == 0) {
                    $coins[$key] = $key;
                }
            }
            $db->where('name', 'coinpayments_coins')->update(T_CONFIG, array('value' => json_encode($coins)));
            header("Content-type: application/json");
            echo json_encode(array('status' => 200));
            exit();
        }
        else{
            header("Content-type: application/json");
            echo json_encode(array('status' => 400,
                                   'message' => $result['message']));
            exit();
        }
    }
    if ($s == 'activate-product') {
        if (!empty($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0) {
            $id      = lui_Secure($_POST['id']);
            $product = lui_GetProduct($id);
            if (empty($product)) {
                $data['message'] = 'Por favor revise los detalles';
            }
            if (!empty($product)) {
                $db->where('id', $id)->update(T_PRODUCTS, array(
                    'active' => '1'
                ));
                $db->where('product_id', $id)->update(T_POSTS, array(
                    'active' => 1
                ));
                $notification_data_array = array(
                    'recipient_id' => $product['user_id'],
                    'type' => 'admin_notification',
                    'url' => 'index.php?link1=my-products',
                    'text' => $wo['lang']['product_approved'],
                    'type2' => 'approve_product'
                );
                lui_RegisterNotification($notification_data_array);
            }
            $data['status'] = 200;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete-review') {
        if (!empty($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0) {
            $id = lui_Secure($_POST['id']);
            $db->where('id', $id)->delete(T_PRODUCT_REVIEW);
            $images = $db->where('review_id', $id)->get(T_MEDIA);
            if (!empty($images)) {
                foreach ($images as $key => $value) {
                    @unlink($value->image);
                    @lui_DeleteFromToS3($value->image);
                }
            }
            $data['status'] = 200;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_multi_review') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $id) {
                if (!empty($id) && is_numeric($id)) {
                    $db->where('id', $id)->delete(T_PRODUCT_REVIEW);
                    $images = $db->where('review_id', $id)->get(T_MEDIA);
                    if (!empty($images)) {
                        foreach ($images as $key => $value) {
                            @unlink($value->image);
                            @lui_DeleteFromToS3($value->image);
                        }
                    }
                }
            }
        }
        $data['status'] = 200;
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete-order') {
        if (!empty($_POST['id'])) {
            $id    = lui_Secure($_POST['id']);
            $order = $db->where('id', $id)->getOne(T_USER_ORDERS);
            if (!empty($order)) {
                $db->where('hash_id', $order->hash_id)->delete(T_USER_ORDERS);
            }
        }
        $data = array(
            'status' => 200
        );
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'change_status') {
        if (!empty($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0 && !empty($_POST['status']) && in_array($_POST['status'], array(
            'placed',
            'accepted',
            'packed',
            'shipped',
            'delivered',
            'canceled'
        ))) {
            $id     = lui_Secure($_POST['id']);
            $status = lui_Secure($_POST['status']);
            $db->where('id', $id)->update(T_USER_ORDERS, array(
                'status' => $status
            ));
            $order                   = $db->where('id', $id)->getOne(T_USER_ORDERS);
            $notification_data_array = array(
                'recipient_id' => $order->user_id,
                'type' => 'admin_notification',
                'type2' => 'admin_status_changed',
                'url' => 'index.php?link1=customer_order&id=' . $order->hash_id,
                'time' => time()
            );
            $db->insert(T_NOTIFICATION, $notification_data_array);
            $notification_data_array = array(
                'recipient_id' => $order->product_owner_id,
                'type' => 'admin_notification',
                'type2' => 'admin_status_changed',
                'url' => 'index.php?link1=order&id=' . $order->hash_id,
                'time' => time()
            );
            $db->insert(T_NOTIFICATION, $notification_data_array);
            $data['status'] = 200;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'order_multi_status') {
        if (!empty($_POST['ids']) && !empty($_POST['action_type']) && in_array($_POST['action_type'], array(
            'placed',
            'accepted',
            'packed',
            'shipped',
            'delivered',
            'canceled',
            'delete'
        ))) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value) && is_numeric($value)) {
                    $id     = lui_Secure($value);
                    $status = lui_Secure($_POST['action_type']);
                    if ($_POST['action_type'] == 'delete') {
                        $order = $db->where('id', $id)->getOne(T_USER_ORDERS);
                        if (!empty($order)) {
                            $db->where('hash_id', $order->hash_id)->delete(T_USER_ORDERS);
                        }
                    } else {
                        $db->where('id', $id)->update(T_USER_ORDERS, array(
                            'status' => $status
                        ));
                        $order                   = $db->where('id', $id)->getOne(T_USER_ORDERS);
                        $notification_data_array = array(
                            'recipient_id' => $order->user_id,
                            'type' => 'admin_notification',
                            'type2' => 'admin_status_changed',
                            'url' => 'index.php?link1=customer_order&id=' . $order->hash_id,
                            'time' => time()
                        );
                        $db->insert(T_NOTIFICATION, $notification_data_array);
                        $notification_data_array = array(
                            'recipient_id' => $order->product_owner_id,
                            'type' => 'admin_notification',
                            'type2' => 'admin_status_changed',
                            'url' => 'index.php?link1=order&id=' . $order->hash_id,
                            'time' => time()
                        );
                        $db->insert(T_NOTIFICATION, $notification_data_array);
                        $data['status'] = 200;
                    }
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'delete_color') {
        if (!empty($_POST['id'])) {
            $id    = lui_Secure($_POST['id']);
            $color = $db->where('id', $id)->getOne(T_COLORS);
            if (!empty($color)) {
                $db->where('id', $id)->delete(T_COLORS);
                $photo_file = $color->image;
                if (file_exists($photo_file)) {
                    @unlink(trim($photo_file));
                } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                    @lui_DeleteFromToS3($photo_file);
                }
            }
        }
        $data = array(
            'status' => 200
        );
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'add_new_image_post') {
        if (!empty($_POST['image_color']) && !empty($_FILES['image'])) {
            $fileInfo = array(
                'file' => $_FILES["image"]["tmp_name"],
                'name' => $_FILES['image']['name'],
                'size' => $_FILES["image"]["size"],
                'type' => $_FILES["image"]["type"],
                'types' => 'jpeg,jpg,png,bmp,gif',
                'compress' => false
            );
            $media    = lui_ShareFile($fileInfo);
            if (!empty($media['filename'])) {
                $db->insert(T_COLORS, array(
                    'text_color' => lui_Secure($_POST['image_color']),
                    'image' => $media['filename'],
                    'time' => time()
                ));
            }
            $data = array(
                'status' => 200
            );
        } else {
            if (!empty($_FILES["image"]["error"]) || !empty($_FILES["image"]["error"])) {
                $error = $error_icon . 'The file is too big, please increase your server upload limit in php.ini';
            } else {
                $error = $error_icon . $wo['lang']['please_check_details'];
            }
            $data = array(
                'status' => 400,
                'error' => $error
            );
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'add_new_color') {
        if (!empty($_POST['color_1']) && !empty($_POST['color_2']) && !empty($_POST['color_text'])) {
            $db->insert(T_COLORS, array(
                'color_1' => lui_Secure($_POST['color_1']),
                'color_2' => lui_Secure($_POST['color_2']),
                'text_color' => lui_Secure($_POST['color_text']),
                'time' => time()
            ));
        }
        $data = array(
            'status' => 200
        );
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'remove_provider') {
        if (!empty($_POST['provider'])) {
            if (in_array($_POST['provider'], $wo['config']['providers_array'])) {
                foreach ($wo['config']['providers_array'] as $key => $provider) {
                    if ($provider == $_POST['provider']) {
                        unset($wo['config']['providers_array'][$key]);
                    }
                }
                $saveSetting = lui_SaveConfig('providers_array', json_encode($wo['config']['providers_array']));
            }
        }
        $data = array(
            'status' => 200
        );
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'add_new_provider') {
        if (!empty($_POST['provider'])) {
            $wo['config']['providers_array'][] = lui_Secure($_POST['provider']);
            $saveSetting                       = lui_SaveConfig('providers_array', json_encode($wo['config']['providers_array']));
        }
        $data = array(
            'status' => 200
        );
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'update_lang_status') {
        $saveSetting = lui_SaveConfig($_POST['name'], $_POST['value']);
        $data        = array(
            'status' => 200
        );
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'select_currency') {
        if (!empty($_POST['currency']) && in_array($_POST['currency'], $wo['config']['currency_array'])) {
            $currency    = lui_Secure($_POST['currency']);
            $saveSetting = lui_SaveConfig('currency', $currency);
            $saveSetting = lui_SaveConfig('ads_currency', $currency);
            if (in_array($_POST['currency'], $wo['stripe_currency'])) {
                $saveSetting = lui_SaveConfig('stripe_currency', $currency);
            }
            if (in_array($_POST['currency'], $wo['paypal_currency'])) {
                $saveSetting = lui_SaveConfig('paypal_currency', $currency);
            }
            if (in_array($_POST['currency'], $wo['2checkout_currency'])) {
                $saveSetting = lui_SaveConfig('2checkout_currency', $currency);
            }
            $request                                                              = fetchDataFromURL("https://api.exchangerate.host/latest?base=" . $currency . "&symbols=" . implode(",", array_values($wo['config']['currency_array'])));
            $exchange                                                             = json_decode($request, true);
            if (!empty($exchange) && $exchange['success'] == true && !empty($exchange['rates'])) {
                lui_SaveConfig('exchange', json_encode($exchange['rates']));
                lui_SaveConfig('exchange_update', (time() + (60 * 60 * 12)));
            }
        }
        $data = array(
            'status' => 200
        );
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'add_new_curreny') {
        if (!empty($_POST['currency']) && !empty($_POST['currency_symbol'])) {
            $wo['config']['currency_array'][]                                     = lui_Secure($_POST['currency']);
            $wo['config']['currency_symbol_array'][lui_Secure($_POST['currency'])] = lui_Secure($_POST['currency_symbol']);
            $saveSetting                                                          = lui_SaveConfig('currency_array', json_encode($wo['config']['currency_array']));
            $saveSetting                                                          = lui_SaveConfig('currency_symbol_array', json_encode($wo['config']['currency_symbol_array']));
            $request                                                              = fetchDataFromURL("https://api.exchangerate.host/latest?base=" . $wo['config']['currency'] . "&symbols=" . implode(",", array_values($wo['config']['currency_array'])));
            $exchange                                                             = json_decode($request, true);
            if (!empty($exchange) && $exchange['success'] == true && !empty($exchange['rates'])) {
                lui_SaveConfig('exchange', json_encode($exchange['rates']));
                lui_SaveConfig('exchange_update', (time() + (60 * 60 * 12)));
            }
        }
        $data = array(
            'status' => 200
        );
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'edit_curreny') {
        if (!empty($_POST['currency']) && !empty($_POST['currency_symbol']) && in_array($_POST['currency_id'], array_keys($wo['config']['currency_array']))) {
            $wo['config']['currency_array'][$_POST['currency_id']]                = lui_Secure($_POST['currency']);
            $wo['config']['currency_symbol_array'][lui_Secure($_POST['currency'])] = lui_Secure($_POST['currency_symbol']);
            $saveSetting                                                          = lui_SaveConfig('currency_array', json_encode($wo['config']['currency_array']));
            $saveSetting                                                          = lui_SaveConfig('currency_symbol_array', json_encode($wo['config']['currency_symbol_array']));
            $request                                                              = fetchDataFromURL("https://api.exchangerate.host/latest?base=" . $wo['config']['currency'] . "&symbols=" . implode(",", array_values($wo['config']['currency_array'])));
            $exchange                                                             = json_decode($request, true);
            if (!empty($exchange) && $exchange['success'] == true && !empty($exchange['rates'])) {
                lui_SaveConfig('exchange', json_encode($exchange['rates']));
                lui_SaveConfig('exchange_update', (time() + (60 * 60 * 12)));
            }
        }
        $data = array(
            'status' => 200
        );
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'remove__curreny') {
        if (!empty($_POST['currency'])) {
            if (in_array($_POST['currency'], $wo['config']['currency_array'])) {
                foreach ($wo['config']['currency_array'] as $key => $currency) {
                    if ($currency == $_POST['currency']) {
                        if (in_array($currency, array_keys($wo['config']['currency_symbol_array']))) {
                            unset($wo['config']['currency_symbol_array'][$currency]);
                        }
                        unset($wo['config']['currency_array'][$key]);
                    }
                }
                if ($wo['config']['currency'] == $_POST['currency']) {
                    if (!empty($wo['config']['currency_array'])) {
                        $saveSetting = lui_SaveConfig('currency', reset($wo['config']['currency_array']));
                        $saveSetting = lui_SaveConfig('ads_currency', reset($wo['config']['currency_array']));
                    }
                }
                $saveSetting = lui_SaveConfig('currency_array', json_encode($wo['config']['currency_array']));
                $saveSetting = lui_SaveConfig('currency_symbol_array', json_encode($wo['config']['currency_symbol_array']));
            }
        }
        $data = array(
            'status' => 200
        );
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'approve_receipt') {
        if (!empty($_GET['receipt_id'])) {
            $id      = lui_Secure($_GET['receipt_id']);
            $receipt = $db->where('id', $id)->getOne('bank_receipts', array(
                '*'
            ));
            if ($receipt) {
                $updated = $db->where('id', $id)->update('bank_receipts', array(
                    'approved' => 1,
                    'approved_at' => time()
                ));
                $updated = true;
                if ($updated === true) {
                    if ($receipt->mode == 'wallet') {
                        $amount = $receipt->price;
                        $result = mysqli_query($sqlConnect, "UPDATE " . T_USERS . " SET `wallet` = `wallet` + " . $amount . " WHERE `user_id` = '" . $receipt->user_id . "'");
                        if ($result) {
                            $create_payment_log = mysqli_query($sqlConnect, "INSERT INTO " . T_PAYMENT_TRANSACTIONS . " (`userid`, `kind`, `amount`, `notes`) VALUES ('" . $receipt->user_id . "', 'WALLET', '" . $amount . "', 'bank receipts')");
                        }
                        $notification_data_array = array(
                            'recipient_id' => $receipt->user_id,
                            'type' => 'admin_notification',
                            'url' => 'index.php?link1=wallet',
                            'text' => $wo['lang']['bank_pro'],
                            'type2' => 'no_name'
                        );
                        lui_RegisterNotification($notification_data_array);
                    } elseif ($receipt->mode == 'donate') {
                        $fund = $db->where('id', $receipt->fund_id)->getOne(T_FUNDING);
                        if (!empty($fund)) {
                            $amount             = $receipt->price;
                            $fund_id            = $receipt->fund_id;
                            //$notes              = "Doanted to " . mb_substr($fund->title, 0, 100, "UTF-8");
                            //$notes = str_replace('{text}', mb_substr($fund->title, 0, 100, "UTF-8"), $wo['lang']['trans_doanted_to']);
                            $notes = mb_substr($fund->title, 0, 100, "UTF-8");
                            $create_payment_log = mysqli_query($sqlConnect, "INSERT INTO " . T_PAYMENT_TRANSACTIONS . " (`userid`, `kind`, `amount`, `notes`) VALUES ({$receipt->user_id}, 'DONATE', {$amount}, '{$notes}')");
                            $admin_com          = 0;
                            if (!empty($wo['config']['donate_percentage']) && is_numeric($wo['config']['donate_percentage']) && $wo['config']['donate_percentage'] > 0) {
                                $admin_com = ($wo['config']['donate_percentage'] * $amount) / 100;
                                $amount    = $amount - $admin_com;
                            }
                            $user_data = lui_UserData($fund->user_id);
                            $db->where('user_id', $fund->user_id)->update(T_USERS, array(
                                'balance' => $user_data['balance'] + $amount
                            ));
                            $fund_raise_id           = $db->insert(T_FUNDING_RAISE, array(
                                'user_id' => $receipt->user_id,
                                'funding_id' => $fund_id,
                                'amount' => $amount,
                                'time' => time()
                            ));
                            $post_data               = array(
                                'user_id' => $receipt->user_id,
                                'fund_raise_id' => $fund_raise_id,
                                'time' => time(),
                                'multi_image_post' => 0
                            );
                            $id                      = lui_RegisterPost($post_data);
                            $notification_data_array = array(
                                'notifier_id' => $receipt->user_id,
                                'recipient_id' => $fund->user_id,
                                'type' => 'fund_donate',
                                'url' => 'index.php?link1=show_fund&id=' . $fund->hashed_id
                            );
                            lui_RegisterNotification($notification_data_array);
                            $notification_data_array = array(
                                'recipient_id' => $receipt->user_id,
                                'type' => 'admin_notification',
                                'url' => 'index.php?link1=show_fund&id=' . $fund->hashed_id,
                                'text' => $wo['lang']['bank_pro'],
                                'type2' => 'no_name'
                            );
                            lui_RegisterNotification($notification_data_array);
                        }
                    } else {
                        $pro_type     = $receipt->mode;
                        $update_array = array(
                            'is_pro' => 1,
                            'pro_time' => time(),
                            'pro_' => 1,
                            'pro_type' => $pro_type
                        );
                        if (in_array($pro_type, array_keys($wo['pro_packages'])) && $wo['pro_packages'][$pro_type]['verified_badge'] == 1) {
                            $update_array['verified'] = 1;
                        }
                        $mysqli    = lui_UpdateUserData($receipt->user_id, $update_array);
                        $user_data = lui_UserData($receipt->user_id);
                        if (!empty($user_data['ref_user_id']) && $wo['config']['affiliate_type'] == 1 && $user_data['referrer'] == 0) {
                            $amount1     = $receipt->price;
                            $ref_user_id = $user_data['ref_user_id'];
                            if ($wo['config']['amount_percent_ref'] > 0) {
                                if (!empty($ref_user_id) && is_numeric($ref_user_id)) {
                                    $update_user    = lui_UpdateUserData($user_data['user_id'], array(
                                        'referrer' => $ref_user_id,
                                        'src' => 'Referrer'
                                    ));
                                    $ref_amount     = ($wo['config']['amount_percent_ref'] * $amount1) / 100;
                                    $update_balance = lui_UpdateBalance($ref_user_id, $ref_amount);
                                    unset($_SESSION['ref']);
                                }
                            } else if ($wo['config']['amount_ref'] > 0) {
                                if (!empty($ref_user_id) && is_numeric($ref_user_id)) {
                                    $update_user    = lui_UpdateUserData($user_data['user_id'], array(
                                        'referrer' => $ref_user_id,
                                        'src' => 'Referrer'
                                    ));
                                    $update_balance = lui_UpdateBalance($ref_user_id, $wo['config']['amount_ref']);
                                    unset($_SESSION['ref']);
                                }
                            }
                        }
                        $amount1                 = $receipt->price;
                        $notes                   = $wo['lang']['upgrade_to_pro'] . " " . $receipt->description . " : Bank";
                        $create_payment_log      = mysqli_query($sqlConnect, "INSERT INTO " . T_PAYMENT_TRANSACTIONS . " (`userid`, `kind`, `amount`, `notes`) VALUES ({$wo['user']['user_id']}, 'PRO', {$amount1}, '{$notes}')");
                        $notification_data_array = array(
                            'recipient_id' => $receipt->user_id,
                            'type' => 'admin_notification',
                            'url' => 'index.php?link1=upgraded',
                            'text' => $wo['lang']['bank_pro'],
                            'type2' => 'no_name'
                        );
                        lui_RegisterNotification($notification_data_array);
                    }
                    $data = array(
                        'status' => 200
                    );
                }
            }
            $data = array(
                'status' => 200,
                'data' => $receipt
            );
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_receipt') {
        if (!empty($_GET['receipt_id'])) {
            $user_id                 = lui_Secure($_GET['user_id']);
            $id                      = lui_Secure($_GET['receipt_id']);
            $photo_file              = lui_Secure($_GET['receipt_file']);
            $receipt                 = $db->where('id', $id)->getOne('bank_receipts', array(
                '*'
            ));
            $notification_data_array = array(
                'recipient_id' => $receipt->user_id,
                'type' => 'admin_notification',
                'url' => 'index.php',
                'text' => $wo['lang']['bank_decline'],
                'type2' => 'no_name'
            );
            lui_RegisterNotification($notification_data_array);
            $db->where('id', $id)->delete('bank_receipts');
            if (file_exists($photo_file)) {
                @unlink(trim($photo_file));
            } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                @lui_DeleteFromToS3($photo_file);
            }
            $data = array(
                'status' => 200
            );
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_user_posts') {
        $data['status'] = 400;
        if (!empty($_GET['user_id'])) {
            ob_end_clean();
            header("Content-Encoding: none");
            header("Connection: close");
            ignore_user_abort();
            ob_start();
            header('Content-Type: application/json');
            echo json_encode(array(
                'status' => 200
            ));
            $size = ob_get_length();
            header("Content-Length: $size");
            ob_end_flush();
            flush();
            session_write_close();
            if (is_callable('fastcgi_finish_request')) {
                fastcgi_finish_request();
            }
            if (is_callable('litespeed_finish_request')) {
                litespeed_finish_request();
            }
            $user_id = lui_Secure($_GET['user_id']);
            lui_DeleteAllUserPosts($user_id);
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_user_articles') {
        $data['status'] = 400;
        if (!empty($_GET['user_id'])) {
            ob_end_clean();
            header("Content-Encoding: none");
            header("Connection: close");
            ignore_user_abort();
            ob_start();
            header('Content-Type: application/json');
            echo json_encode(array(
                'status' => 200
            ));
            $size = ob_get_length();
            header("Content-Length: $size");
            ob_end_flush();
            flush();
            session_write_close();
            if (is_callable('fastcgi_finish_request')) {
                fastcgi_finish_request();
            }
            if (is_callable('litespeed_finish_request')) {
                litespeed_finish_request();
            }
            $user_id = lui_Secure($_GET['user_id']);
            $blogs   = $db->where('user', $user_id)->get(T_BLOG);
            if (!empty($blogs)) {
                foreach ($blogs as $key => $value) {
                    lui_DeleteMyBlog($value->id);
                }
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_user_stories') {
        $data['status'] = 400;
        if (!empty($_GET['user_id'])) {
            ob_end_clean();
            header("Content-Encoding: none");
            header("Connection: close");
            ignore_user_abort();
            ob_start();
            header('Content-Type: application/json');
            echo json_encode(array(
                'status' => 200
            ));
            $size = ob_get_length();
            header("Content-Length: $size");
            ob_end_flush();
            flush();
            session_write_close();
            if (is_callable('fastcgi_finish_request')) {
                fastcgi_finish_request();
            }
            if (is_callable('litespeed_finish_request')) {
                litespeed_finish_request();
            }
            $user_id = lui_Secure($_GET['user_id']);
            $info    = $db->where('user_id', $user_id)->get(T_USER_STORY);
            if (!empty($info)) {
                foreach ($info as $key => $value) {
                    lui_DeleteStatus($value->id);
                }
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_user_messages') {
        $data['status'] = 400;
        if (!empty($_GET['user_id'])) {
            ob_end_clean();
            header("Content-Encoding: none");
            header("Connection: close");
            ignore_user_abort();
            ob_start();
            header('Content-Type: application/json');
            echo json_encode(array(
                'status' => 200
            ));
            $size = ob_get_length();
            header("Content-Length: $size");
            ob_end_flush();
            flush();
            session_write_close();
            if (is_callable('fastcgi_finish_request')) {
                fastcgi_finish_request();
            }
            if (is_callable('litespeed_finish_request')) {
                litespeed_finish_request();
            }
            $my_id         = lui_Secure($_GET['user_id']);
            $query_one     = "SELECT id FROM " . T_MESSAGES . " WHERE (`to_id` = '{$my_id}') OR (`from_id` = {$my_id})";
            $sql_query_one = mysqli_query($sqlConnect, $query_one);
            if (mysqli_num_rows($sql_query_one)) {
                while ($sql_fetch_one = mysqli_fetch_assoc($sql_query_one)) {
                    $deleteMessage = lui_DeleteMessage($sql_fetch_one['id'], '', $my_id);
                }
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_user_notifications') {
        $data['status'] = 400;
        if (!empty($_GET['user_id'])) {
            ob_end_clean();
            header("Content-Encoding: none");
            header("Connection: close");
            ignore_user_abort();
            ob_start();
            header('Content-Type: application/json');
            echo json_encode(array(
                'status' => 200
            ));
            $size = ob_get_length();
            header("Content-Length: $size");
            ob_end_flush();
            flush();
            session_write_close();
            if (is_callable('fastcgi_finish_request')) {
                fastcgi_finish_request();
            }
            if (is_callable('litespeed_finish_request')) {
                litespeed_finish_request();
            }
            $my_id = lui_Secure($_GET['user_id']);
            mysqli_query($sqlConnect, "DELETE FROM " . T_NOTIFICATION . " WHERE `recipient_id` = {$my_id} OR `notifier_id` = {$my_id}");
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'ban_user') {
        $data['status'] = 400;
        if (!empty($_GET['user_id']) && is_numeric($_GET['user_id'])) {
            ob_end_clean();
            header("Content-Encoding: none");
            header("Connection: close");
            ignore_user_abort();
            ob_start();
            header('Content-Type: application/json');
            echo json_encode(array(
                'status' => 200
            ));
            $size = ob_get_length();
            header("Content-Length: $size");
            ob_end_flush();
            flush();
            session_write_close();
            if (is_callable('fastcgi_finish_request')) {
                fastcgi_finish_request();
            }
            if (is_callable('litespeed_finish_request')) {
                litespeed_finish_request();
            }
            $user_id      = lui_Secure($_GET['user_id']);
            $update_array = array(
                'banned' => 1
            );
            if (!empty($_GET['reason'])) {
                $reason                        = lui_Secure($_GET['reason']);
                $update_array['banned_reason'] = $reason;
            }
            $info = $db->where('user_id', $user_id)->update(T_USERS, $update_array);
            $db->where('user_id', $user_id)->update(T_POSTS, array('active' => 0));
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'unban_user') {
        $data['status'] = 400;
        if (!empty($_GET['user_id']) && is_numeric($_GET['user_id'])) {
            $user_id      = lui_Secure($_GET['user_id']);
            $update_array = array(
                'banned' => 0,
                'banned_reason' => ''
            );
            $db->where('user_id', $user_id)->update(T_USERS, $update_array);
            $db->where('user_id', $user_id)->update(T_POSTS, array('active' => 1));
            $data['status'] = 200;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_multi_users') {
        if (!empty($_POST['ids']) && !empty($_POST['type']) && in_array($_POST['type'], array(
            'activate',
            'deactivate',
            'delete',
            'free',
            'star',
            'hot',
            'ultima',
            'vip'
        ))) {
            foreach ($_POST['ids'] as $key => $value) {
                if (is_numeric($value) && $value > 0) {
                    if ($_POST['type'] == 'delete') {
                        $delete = lui_DeleteUser(lui_Secure($value));
                    } elseif ($_POST['type'] == 'activate') {
                        $db->where('user_id', lui_Secure($value));
                        $update_data = array(
                            'active' => '1',
                            'email_code' => ''
                        );
                        $update      = $db->update(T_USERS, $update_data);
                    } elseif ($_POST['type'] == 'deactivate') {
                        $db->where('user_id', lui_Secure($value));
                        $update_data = array(
                            'active' => 0,
                            'email_code' => ''
                        );
                        $update      = $db->update(T_USERS, $update_data);
                    } elseif ($_POST['type'] == 'free') {
                        $member_type = 0;
                        $member_pro  = 0;
                        $down        = lui_DownUpgradeUser(lui_Secure($value));
                        $update_data = array(
                            'pro_type' => $member_type,
                            'is_pro' => $member_pro,
                            'pro_time' => 0
                        );
                        lui_UpdateUserData(lui_Secure($value), $update_data);
                    } elseif ($_POST['type'] == 'star') {
                        $member_type = 1;
                        $member_pro  = 1;
                        $time        = time();
                        $update_data = array(
                            'pro_type' => $member_type,
                            'is_pro' => $member_pro,
                            'pro_time' => $time
                        );
                        lui_UpdateUserData(lui_Secure($value), $update_data);
                    } elseif ($_POST['type'] == 'hot') {
                        $member_type = 2;
                        $member_pro  = 1;
                        $time        = time();
                        $update_data = array(
                            'pro_type' => $member_type,
                            'is_pro' => $member_pro,
                            'pro_time' => $time
                        );
                        lui_UpdateUserData(lui_Secure($value), $update_data);
                    } elseif ($_POST['type'] == 'ultima') {
                        $member_type = 3;
                        $member_pro  = 1;
                        $time        = time();
                        $update_data = array(
                            'pro_type' => $member_type,
                            'is_pro' => $member_pro,
                            'pro_time' => $time
                        );
                        lui_UpdateUserData(lui_Secure($value), $update_data);
                    } elseif ($_POST['type'] == 'vip') {
                        $member_type = 4;
                        $member_pro  = 1;
                        $time        = time();
                        $update_data = array(
                            'pro_type' => $member_type,
                            'is_pro' => $member_pro,
                            'pro_time' => $time
                        );
                        lui_UpdateUserData(lui_Secure($value), $update_data);
                    }
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_verification') {
        if (!empty($_POST['ids']) && !empty($_POST['type']) && in_array($_POST['type'], array(
            'verify',
            'delete'
        ))) {
            foreach ($_POST['ids'] as $key => $value) {
                if (is_numeric($value) && $value > 0) {
                    $verify = $db->where('id', lui_Secure($value))->getOne(T_VERIFICATION_REQUESTS);
                    if ($_POST['type'] == 'delete') {
                        lui_DeleteVerificationRequest(lui_Secure($value));
                    } elseif ($_POST['type'] == 'verify') {
                        $id = $verify->user_id;
                        if (!empty($verify->page_id) && $verify->page_id > 0) {
                            $id = $verify->page_id;
                        }
                        lui_VerifyUser($id, $verify->id, $verify->type);
                    }
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'delete_multi_refund') {
        if (!empty($_POST['ids']) && !empty($_POST['type']) && in_array($_POST['type'], array(
            'approve',
            'delete'
        ))) {
            foreach ($_POST['ids'] as $key => $value) {
                if (is_numeric($value) && $value > 0) {
                    $request = $db->where('id', lui_Secure($value))->getOne(T_REFUND);
                    if ($_POST['type'] == 'delete') {
                        $db->where('id', lui_Secure($value))->delete(T_REFUND);
                        $data = array(
                            'status' => 200
                        );
                        if (empty($request->order_hash_id)) {
                            $notification_data_array = array(
                                'recipient_id' => $request->user_id,
                                'type' => 'admin_notification',
                                'url' => 'index.php?link1=home',
                                'text' => $wo['lang']['refund_decline'],
                                'type2' => 'refund_decline'
                            );
                            lui_RegisterNotification($notification_data_array);
                        } else {
                            $notification_data_array = array(
                                'recipient_id' => $request->user_id,
                                'type' => 'admin_notification',
                                'url' => 'index.php?link1=customer_order&id=' . $request->order_hash_id,
                                'text' => $wo['lang']['refund_decline'],
                                'type2' => 'refund_decline'
                            );
                            lui_RegisterNotification($notification_data_array);
                        }
                    } elseif ($_POST['type'] == 'approve') {
                        if (empty($request->order_hash_id)) {
                            $price = $wo['pro_packages'][$request->pro_type]['price'];
                            $db->where('user_id', $request->user_id)->update(T_USERS, array(
                                'balance' => $db->inc($price),
                                'is_pro' => 0
                            ));
                            $notification_data_array = array(
                                'recipient_id' => $request->user_id,
                                'type' => 'admin_notification',
                                'url' => 'index.php?link1=setting&page=payments',
                                'text' => $wo['lang']['refund_approve'],
                                'type2' => 'refund_approve'
                            );
                            lui_RegisterNotification($notification_data_array);
                        } else {
                            $total_final_price = 0;
                            $price             = 0;
                            $orders            = $db->where('hash_id', $request->order_hash_id)->get(T_USER_ORDERS);
                            foreach ($orders as $key => $order) {
                                $db->where('id', $order->product_id)->update(T_PRODUCTS, array(
                                    'units' => $db->inc($order->units)
                                ));
                                $total_final_price += $order->final_price;
                                $price += $order->price;
                            }
                            $order = $db->where('hash_id', $request->order_hash_id)->getOne(T_USER_ORDERS);
                            $user  = $db->where('user_id', $order->product_owner_id)->update(T_USERS, array(
                                'balance' => $db->dec($total_final_price)
                            ));
                            $user  = $db->where('user_id', $request->user_id)->update(T_USERS, array(
                                'wallet' => $db->inc($price)
                            ));
                            $db->where('hash_id', $request->order_hash_id)->update(T_USER_ORDERS, array(
                                'status' => 'canceled'
                            ));
                            $notification_data_array = array(
                                'recipient_id' => $request->user_id,
                                'type' => 'admin_notification',
                                'url' => 'index.php?link1=customer_order&id=' . $request->order_hash_id,
                                'text' => $wo['lang']['refund_approve'],
                                'type2' => 'refund_approve'
                            );
                            lui_RegisterNotification($notification_data_array);
                        }
                        $db->where('id', lui_Secure($value))->delete(T_REFUND);
                    }
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'delete_multi_blog') {
        if (!empty($_POST['ids']) && !empty($_POST['type']) && in_array($_POST['type'], array(
            'activate',
            'deactivate',
            'delete'
        ))) {
            foreach ($_POST['ids'] as $key => $value) {
                if (is_numeric($value) && $value > 0) {
                    $post = $db->where('id', lui_Secure($value))->getOne(T_BLOG);
                    if ($_POST['type'] == 'delete') {
                        lui_DeleteMyBlog(lui_Secure($value));
                    } elseif ($_POST['type'] == 'activate') {
                        if (!empty($post)) {
                            $db->where('id', lui_Secure($value))->update(T_BLOG, array(
                                'active' => '1'
                            ));
                            $db->where('blog_id', lui_Secure($value))->update(T_POSTS, array(
                                'active' => 1
                            ));
                            $b_post = $db->where('blog_id', lui_Secure($value))->getOne(T_POSTS);
                            if (!empty($b_post)) {
                                lui_RegisterPoint($b_post->id, "createblog", '+', $b_post->user_id);
                            }
                            $notification_data_array = array(
                                'recipient_id' => $post->user,
                                'type' => 'admin_notification',
                                'url' => 'index.php?link1=read-blog&id=' . $post->id,
                                'text' => $wo['lang']['approve_blog'],
                                'type2' => 'approve_blog'
                            );
                            lui_RegisterNotification($notification_data_array);
                        }
                    } elseif ($_POST['type'] == 'deactivate') {
                        if (!empty($post)) {
                            $db->where('id', lui_Secure($value))->update(T_BLOG, array(
                                'active' => '0'
                            ));
                            $db->where('blog_id', lui_Secure($value))->update(T_POSTS, array(
                                'active' => 0
                            ));
                        }
                    }
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'delete_multi_post') {
        if (!empty($_POST['ids']) && !empty($_POST['type']) && in_array($_POST['type'], array(
            'activate',
            'deactivate',
            'delete'
        ))) {
            foreach ($_POST['ids'] as $key => $value) {
                if (is_numeric($value) && $value > 0) {
                    $post = $db->where('id', lui_Secure($value))->getOne(T_POSTS);
                    if ($_POST['type'] == 'delete') {
                        lui_DeletePost(lui_Secure($value));
                    } elseif ($_POST['type'] == 'activate') {
                        if (!empty($post)) {
                            $db->where('id', lui_Secure($value))->update(T_POSTS, array(
                                'active' => 1
                            ));
                            if (!empty($post->blog_id)) {
                                $db->where('id', $post->blog_id)->update(T_BLOG, array(
                                    'active' => '1'
                                ));
                            }
                            $notification_data_array = array(
                                'recipient_id' => $post->user_id,
                                'type' => 'admin_notification',
                                'url' => 'index.php?link1=post&id=' . $post->id,
                                'text' => $wo['lang']['approve_post'],
                                'type2' => 'approve_post'
                            );
                            lui_RegisterNotification($notification_data_array);
                        }
                    } elseif ($_POST['type'] == 'deactivate') {
                        if (!empty($post)) {
                            $db->where('id', lui_Secure($value))->update(T_POSTS, array(
                                'active' => 0
                            ));
                            if (!empty($post->blog_id)) {
                                $db->where('id', $post->blog_id)->update(T_BLOG, array(
                                    'active' => '0'
                                ));
                            }
                        }
                    }
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_gender') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value) && in_array($value, array_keys($wo['genders']))) {
                    $db->where('lang_key', lui_Secure($value))->delete(T_LANGS);
                    $gender = $db->where('gender_id', lui_Secure($value))->getOne(T_GENDER);
                    if (!empty($gender)) {
                        $link = $gender->image;
                        if (file_exists($link)) {
                            @unlink(trim($link));
                        } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                            @lui_DeleteFromToS3($link);
                        }
                        $db->where('gender_id', lui_Secure($value))->delete(T_GENDER);
                    }
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_event') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value) && is_numeric($value) && $value > 0) {
                    lui_DeleteEvent($value);
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_category') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value)) {
                    $types = array(
                        'page' => T_PAGES_CATEGORY,
                        'group' => T_GROUPS_CATEGORY,
                        'blog' => T_BLOGS_CATEGORY,
                        'product' => T_PRODUCTS_CATEGORY,
                        'job' => T_JOB_CATEGORY
                    );
                    if (!empty($_GET['type']) && in_array($_GET['type'], array_keys($types))) {
                        if ($value != 'other' && $value != 'all_') {
                            $lang_key = lui_Secure($value);
                            $category = $db->where('lang_key', $lang_key)->getOne($types[$_GET['type']]);
                            if (!empty($category)) {
                                $db->where('lang_key', $lang_key)->delete(T_LANGS);
                                $db->where('lang_key', $lang_key)->delete($types[$_GET['type']]);
                                if ($_GET['type'] == 'page') {
                                    $db->where('page_category', $category->id)->update(T_PAGES, array(
                                        'page_category' => 1
                                    ));
                                }
                                if ($_GET['type'] == 'group') {
                                    $db->where('category', $category->id)->update(T_GROUPS, array(
                                        'category' => 1
                                    ));
                                }
                                if ($_GET['type'] == 'blog') {
                                    $db->where('category', $category->id)->update(T_BLOG, array(
                                        'category' => 1
                                    ));
                                }
                                if ($_GET['type'] == 'product') {
                                    $db->where('category', $category->id)->update(T_PRODUCTS, array(
                                        'category' => 0
                                    ));
                                }
                            }
                        }
                    }
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_custom_field') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value)) {
                    $placement_array = array(
                        'page',
                        'group',
                        'product'
                    );
                    if (!empty($_GET['type']) && in_array($_GET['type'], $placement_array)) {
                        $delete = lui_DeleteCustomField($value, $_GET['type']);
                    }
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_invitation') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value) && is_numeric($value) && $value > 0) {
                    lui_DeleteUserInvitation('id', $value);
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_ban') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value)) {
                    lui_DeleteBanned(lui_Secure($value));
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_code') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value) && is_numeric($value) && $value > 0) {
                    lui_DeleteAdminInvitation('id', $value);
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_page') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value) && is_numeric($value) && $value > 0) {
                    lui_DeleteCustomPage($value);
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_ads') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value) && is_numeric($value) && $value > 0) {
                    lui_DeleteUserAd($value);
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_sub_category') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value)) {
                    $types = array(
                        'page',
                        'group',
                        'product'
                    );
                    if (!empty($_GET['type']) && in_array($_GET['type'], $types)) {
                        $lang_key = lui_Secure($value);
                        $category = $db->where('lang_key', $lang_key)->where('type', lui_Secure($_GET['type']))->getOne(T_SUB_CATEGORIES);
                        if (!empty($category)) {
                            $db->where('lang_key', $lang_key)->delete(T_LANGS);
                            $db->where('id', $category->id)->delete(T_SUB_CATEGORIES);
                            if ($_GET['type'] == 'page') {
                                $db->where('sub_category', $category->id)->update(T_PAGES, array(
                                    'sub_category' => ''
                                ));
                            }
                            if ($_GET['type'] == 'group') {
                                $db->where('sub_category', $category->id)->update(T_GROUPS, array(
                                    'sub_category' => ''
                                ));
                            }
                            if ($_GET['type'] == 'product') {
                                $db->where('sub_category', $category->id)->update(T_PRODUCTS, array(
                                    'sub_category' => ''
                                ));
                            }
                        }
                    }
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_section') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value) && is_numeric($value) && $value > 0) {
                    lui_DeleteForumSection(lui_Secure($value));
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_game') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value) && is_numeric($value) && $value > 0) {
                    lui_DeleteGame(lui_Secure($value));
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_reply') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value) && is_numeric($value) && $value > 0) {
                    lui_DeleteThreadReply(lui_Secure($value));
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_movies') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value) && is_numeric($value) && $value > 0) {
                    lui_DeleteFilm(lui_Secure($value));
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_thread') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value) && is_numeric($value) && $value > 0) {
                    lui_DeleteForumThread(lui_Secure($value));
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_forum') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value) && is_numeric($value) && $value > 0) {
                    lui_DeleteForum(lui_Secure($value));
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_page') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value) && is_numeric($value) && $value > 0) {
                    lui_DeletePage(lui_Secure($value));
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_fund') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value3) {
                if (!empty($value3) && is_numeric($value3) && $value3 > 0) {
                    $id   = lui_Secure($value3);
                    $fund = $db->where('id', $id)->getOne(T_FUNDING);
                    if (!empty($fund)) {
                        @lui_DeleteFromToS3($fund->image);
                        if (file_exists($fund->image)) {
                            try {
                                unlink($fund->image);
                            }
                            catch (Exception $e) {
                            }
                        }
                        $db->where('id', $id)->delete(T_FUNDING);
                        $raise = $db->where('funding_id', $id)->get(T_FUNDING_RAISE);
                        $db->where('funding_id', $id)->delete(T_FUNDING_RAISE);
                        $posts = $db->where('fund_id', $id)->get(T_POSTS);
                        if (!empty($posts)) {
                            foreach ($posts as $key => $value) {
                                $db->where('parent_id', $value->id)->delete(T_POSTS);
                            }
                        }
                        $db->where('fund_id', $id)->delete(T_POSTS);
                        foreach ($raise as $key => $value) {
                            $raise_posts = $db->where('fund_raise_id', $value->id)->get(T_POSTS);
                            if (!empty($raise_posts)) {
                                foreach ($posts as $key => $value1) {
                                    $db->where('parent_id', $value1->id)->delete(T_POSTS);
                                }
                            }
                            $db->where('fund_raise_id', $value->id)->delete(T_POSTS);
                        }
                    }
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_offer') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value) && is_numeric($value) && $value > 0) {
                    $offer_id = lui_Secure($value);
                    $offer    = $db->where('id', $offer_id)->getOne(T_OFFER);
                    if (!empty($offer)) {
                        if (!empty($offer->image)) {
                            @unlink($offer->image);
                            lui_DeleteFromToS3($offer->image);
                        }
                    }
                    $db->where('id', $offer_id)->delete(T_OFFER);
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_job') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value) && is_numeric($value) && $value > 0) {
                    $job_id = lui_Secure($value);
                    $job    = $db->where('id', $job_id)->getOne(T_JOB);
                    if (!empty($job)) {
                        if ($job->image_type != 'cover') {
                            @unlink($job->image);
                            lui_DeleteFromToS3($job->image);
                        }
                    }
                    $db->where('id', $job_id)->delete(T_JOB);
                    $db->where('job_id', $job_id)->delete(T_JOB_APPLY);
                    $post = $db->where('job_id', $job_id)->getOne(T_POSTS);
                    if (!empty($post)) {
                        lui_DeletePost($post->id);
                    }
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_group') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value) && is_numeric($value) && $value > 0) {
                    lui_DeleteGroup(lui_Secure($value));
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_app') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value) && is_numeric($value) && $value > 0) {
                    lui_DeleteApp($value);
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_gift') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value) && is_numeric($value) && $value > 0) {
                    lui_DeleteGift($value);
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_sticker') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (!empty($value) && is_numeric($value) && $value > 0) {
                    lui_DeleteSticker($value);
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'remove_multi_payment') {
        if (!empty($_POST['ids']) && !empty($_POST['type']) && in_array($_POST['type'], array(
            'paid',
            'decline',
            'delete'
        ))) {
            foreach ($_POST['ids'] as $key => $value) {
                if (is_numeric($value) && $value > 0) {
                    $get_payment_info = lui_GetPaymentHistory(lui_Secure($value));
                    if ($_POST['type'] == 'delete') {
                        if (!empty($get_payment_info)) {
                            $id     = $get_payment_info['id'];
                            $update = mysqli_query($sqlConnect, "UPDATE " . T_A_REQUESTS . " SET status = '2' WHERE id = {$id}");
                            if ($update) {
                                $body                    = lui_LoadPage('emails/payment-declined');
                                $body                    = str_replace('{{name}}', $get_payment_info['user']['name'], $body);
                                $body                    = str_replace('{{amount}}', $get_payment_info['amount'], $body);
                                $body                    = str_replace('{{site_name}}', $config['siteName'], $body);
                                $send_message_data       = array(
                                    'from_email' => $wo['config']['siteEmail'],
                                    'from_name' => $wo['config']['siteName'],
                                    'to_email' => $get_payment_info['user']['email'],
                                    'to_name' => $get_payment_info['user']['name'],
                                    'subject' => 'Payment Declined | ' . $wo['config']['siteName'],
                                    'charSet' => 'utf-8',
                                    'message_body' => $body,
                                    'is_html' => true
                                );
                                $send_message            = lui_SendMessage($send_message_data);
                                $notification_data_array = array(
                                    'recipient_id' => $get_payment_info['user_id'],
                                    'type' => 'admin_notification',
                                    'url' => 'index.php?link1=setting&page=payments',
                                    'text' => $wo['lang']['withdraw_declined'],
                                    'type2' => 'withdraw_declined'
                                );
                                lui_RegisterNotification($notification_data_array);
                            }
                        }
                        $db->where('id', lui_Secure($value))->delete(T_A_REQUESTS);
                    } elseif ($_POST['type'] == 'decline') {
                        if (!empty($get_payment_info)) {
                            $id     = $get_payment_info['id'];
                            $update = mysqli_query($sqlConnect, "UPDATE " . T_A_REQUESTS . " SET status = '2' WHERE id = {$id}");
                            if ($update) {
                                $body                    = lui_LoadPage('emails/payment-declined');
                                $body                    = str_replace('{{name}}', $get_payment_info['user']['name'], $body);
                                $body                    = str_replace('{{amount}}', $get_payment_info['amount'], $body);
                                $body                    = str_replace('{{site_name}}', $config['siteName'], $body);
                                $send_message_data       = array(
                                    'from_email' => $wo['config']['siteEmail'],
                                    'from_name' => $wo['config']['siteName'],
                                    'to_email' => $get_payment_info['user']['email'],
                                    'to_name' => $get_payment_info['user']['name'],
                                    'subject' => 'Payment Declined | ' . $wo['config']['siteName'],
                                    'charSet' => 'utf-8',
                                    'message_body' => $body,
                                    'is_html' => true
                                );
                                $send_message            = lui_SendMessage($send_message_data);
                                $notification_data_array = array(
                                    'recipient_id' => $get_payment_info['user_id'],
                                    'type' => 'admin_notification',
                                    'url' => 'index.php?link1=setting&page=payments',
                                    'text' => $wo['lang']['withdraw_declined'],
                                    'type2' => 'withdraw_declined'
                                );
                                lui_RegisterNotification($notification_data_array);
                            }
                        }
                    } elseif ($_POST['type'] == 'paid') {
                        if (!empty($get_payment_info)) {
                            $id     = $get_payment_info['id'];
                            $update = mysqli_query($sqlConnect, "UPDATE " . T_A_REQUESTS . " SET status = '1' WHERE id = {$id}");
                            if ($update) {
                                $body                    = lui_LoadPage('emails/payment-sent');
                                $body                    = str_replace('{{name}}', $get_payment_info['user']['name'], $body);
                                $body                    = str_replace('{{amount}}', $get_payment_info['amount'], $body);
                                $body                    = str_replace('{{site_name}}', $config['siteName'], $body);
                                $send_message_data       = array(
                                    'from_email' => $wo['config']['siteEmail'],
                                    'from_name' => $wo['config']['siteName'],
                                    'to_email' => $get_payment_info['user']['email'],
                                    'to_name' => $get_payment_info['user']['name'],
                                    'subject' => 'New Payment | ' . $wo['config']['siteName'],
                                    'charSet' => 'utf-8',
                                    'message_body' => $body,
                                    'is_html' => true
                                );
                                $send_message            = lui_SendMessage($send_message_data);
                                $notification_data_array = array(
                                    'recipient_id' => $get_payment_info['user_id'],
                                    'type' => 'admin_notification',
                                    'url' => 'index.php?link1=setting&page=payments',
                                    'text' => $wo['lang']['withdraw_approve'],
                                    'type2' => 'withdraw_approve'
                                );
                                lui_RegisterNotification($notification_data_array);
                                lui_UpdateBalance($get_payment_info['user_id'], $get_payment_info['amount'], '-','withdrawal');
                            }
                        }
                    }
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'delete_multi_report') {
        if (!empty($_POST['ids']) && !empty($_POST['type']) && in_array($_POST['type'], array(
            'safe',
            'delete',
            'ban'
        ))) {
            foreach ($_POST['ids'] as $key => $value) {
                if (is_numeric($value) && $value > 0) {
                    $report = $db->where('id', lui_Secure($value))->getOne(T_REPORTS);
                    if ($_POST['type'] == 'delete') {
                        if ($report->post_id != 0) {
                            lui_DeletePost($report->post_id);
                            lui_DeleteReport($report->id);
                        } else if ($report->profile_id != 0) {
                            lui_DeleteUser($report->profile_id);
                            lui_DeleteReport($report->id);
                        } else if ($report->page_id != 0) {
                            lui_DeletePage($report->page_id);
                            lui_DeleteReport($report->id);
                        } else if ($report->group_id != 0) {
                            lui_DeleteGroup($report->group_id);
                            lui_DeleteReport($report->id);
                        } else if ($report->comment_id != 0) {
                            lui_DeletePostComment($report->comment_id);
                            lui_DeleteReport($report->id);
                        }
                    } elseif ($_POST['type'] == 'safe') {
                        lui_DeleteReport($report->id);
                    } elseif ($_POST['type'] == 'ban') {
                        $update_array = array(
                            'banned' => 1
                        );
                        $info = $db->where('user_id', $report->profile_id)->update(T_USERS, $update_array);
                    }
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }

    

    // category
    if ($s == 'add_new_category') {
        $data['status']  = 400;
        $data['message'] = 'Por favor revisa los detalles';
        $types           = array(
            'page' => T_PAGES_CATEGORY,
            'group' => T_GROUPS_CATEGORY,
            'blog' => T_BLOGS_CATEGORY,
            'color_producto' => T_COLORES_PRODUCTOS,
            'product' => T_PRODUCTS_CATEGORY,
            'job' => T_JOB_CATEGORY
        );
        if (!empty($_GET['type']) && in_array($_GET['type'], array_keys($types))) {
            $add         = false;
            $insert_data = array();
            foreach (lui_LangsNamesFromDB() as $key => $lang) {
                if (!empty($_POST[$lang])) {
                    $insert_data[$lang] = lui_Secure($_POST[$lang]);
                    $add                = true;
                }
            }
            if ($add == true && !empty($insert_data)) {
                $insert_data['type'] = 'category';
                $id                  = $db->insert(T_LANGS, $insert_data);
                if (isset($_POST['colores'])){
                    $db->insert($types[$_GET['type']], array(
                        'lang_key' => $id,
                        'color' => $_POST['colores']
                    ));
                }elseif(isset($_POST['add_categorias_productos'])){
                    if (isset($_FILES['media_file'])) {
                        if(!empty($_FILES['media_file']["tmp_name"])){
                            $filename = "";
                            $themes   = $wo['config']['theme'];
                            if($themes=='layshane_star'){
                                $fileInfo = array(
                                    'file' => $_FILES["media_file"]["tmp_name"],
                                    'name' => $_FILES['media_file']['name'],
                                    'size' => $_FILES["media_file"]["size"],
                                    'type' => $_FILES["media_file"]["type"],
                                    'types' => 'jpg,png,gif,jpeg',
                                    'crop' => array(
                                        'width' => 280,
                                        'height' => 290
                                    )
                                );
                            }elseif($themes=='restaurante-star'){
                                $fileInfo = array(
                                    'file' => $_FILES["media_file"]["tmp_name"],
                                    'name' => $_FILES['media_file']['name'],
                                    'size' => $_FILES["media_file"]["size"],
                                    'type' => $_FILES["media_file"]["type"],
                                    'types' => 'jpg,png,gif,jpeg',
                                    'crop' => array(
                                        'width' => 1080,
                                        'height' => 480
                                    )
                                );
                            }
                            
                            $media    = lui_ShareFile($fileInfo,0,false);
                            if (!empty($media)) {
                                $filename = $media['filename'];
                            }
                            $media_file = lui_Secure($filename);
                            $imagen_de_categoria = $media_file;
                        }else{
                            $data['status']  = 400;
                            $data['message'] = 'Por favor comprueba tus detalles';
                        }
                    }else{
                        $imagen_de_categoria = "upload/photos/n_layshane_peru.png";
                    }
                    $db->insert($types[$_GET['type']], array(
                        'lang_key' => $id,
                        'logo' => $imagen_de_categoria
                    ));
                }else{
                    $db->insert($types[$_GET['type']], array(
                        'lang_key' => $id
                    ));
                }
                

                $db->where('id', $id)->update(T_LANGS, array(
                    'lang_key' => $id
                ));
                $data = array(
                    'status' => 200
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'get_category_langs' && !empty($_POST['lang_key'])) {
        $data['status'] = 400;
        $html           = '';
        $langs          = lui_GetLangDetails($_POST['lang_key']);
        if (count($langs) > 0) {
            foreach ($langs as $key => $wo['langs']) {
                foreach ($wo['langs'] as $wo['key_'] => $wo['lang_vlaue']) {
                    $html .= lui_LoadAdminPage('edit-lang/form-list');
                }
            }
            if (isset($_POST['categoria_id'])) {
                $id_de_categoria = $_POST['categoria_id'];
            }else{
                $id_de_categoria = false;
            }
            if (isset($_POST['id_section'])) {
                $id_de_categoria_section = $_POST['id_section'];
            }else{
                $id_de_categoria_section = false;
            }
            $wo['category_section'] = $id_de_categoria_section;
            $wo['categoria_id'] = $id_de_categoria;
            $html .= lui_LoadAdminPage('products-categories/form');
            $data['status'] = 200;
            $data['html']   = $html;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'update_lang_key_categoria') {
        if (lui_CheckSession($hash_id) === true) {
            $array_langs = array();
            $lang_key    = lui_Secure($_POST['id_of_key']);
            $lang_categoria   = lui_Secure($_POST['categoria_id']);
            $sections_id   = lui_Secure($_POST['seccions']);
        
            $langs       = lui_LangsNamesFromDB();
            foreach ($_POST as $key => $value) {
                if (in_array($key, $langs)) {
                    $key   = lui_Secure($key);
                    $value = mysqli_real_escape_string($sqlConnect, $value);
                    $query = mysqli_query($sqlConnect, "UPDATE " . T_LANGS . " SET `{$key}` = '{$value}' WHERE `lang_key` = '{$lang_key}'");
                    
                    if ($query) {
                        $data['status'] = 200;
                    }
                }
            }
            if (!empty($_POST['seccions'])) {
                $db->where('id', $lang_categoria)->update(T_PRODUCTS_CATEGORY, array(
                    'id_section' => $sections_id
                ));
            }
            $logo = '';
            if (!empty($_FILES['media_file'])) {
                $themes   = $wo['config']['theme'];
                if($themes=='layshane-star'){
                    $fileInfo = array(
                        'file' => $_FILES["media_file"]["tmp_name"],
                        'name' => $_FILES['media_file']['name'],
                        'size' => $_FILES["media_file"]["size"],
                        'type' => $_FILES["media_file"]["type"],
                        'types' => 'jpg,png,gif,jpeg',
                        'crop' => array(
                            'width' => 380,
                            'height' => 390
                        )
                    );
                    $media    = lui_ShareFile($fileInfo);
                }
                if($themes=='restaurante-star'){
                    $fileInfo = array(
                        'file' => $_FILES["media_file"]["tmp_name"],
                        'name' => $_FILES['media_file']['name'],
                        'size' => $_FILES["media_file"]["size"],
                        'type' => $_FILES["media_file"]["type"],
                        'types' => 'jpg,png,gif,jpeg',
                        'crop' => array(
                            'width' => 1080,
                            'height' => 480
                        )
                    );
                    $media    = lui_ShareFile($fileInfo);
                }
                
                if (!empty($media) && !empty($media['filename'])) {
                    $logo = $media['filename'];
                }
                if (!empty($logo)) {
                    $category_caata = $db->where('id', $lang_categoria)->getOne(T_PRODUCTS_CATEGORY);
                    if (!empty($category_caata)) {

                        $link = $category_caata->logo;

                        if($link=="upload/photos/d-avatar.jpg"){
                        }elseif($link=="upload/photos/n_layshane_peru.png") {
                        }else{
                            if (file_exists($link)) {
                                @unlink(trim($link));
                            } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                                @lui_DeleteFromToS3($link);
                            }
                        }

                        $db->where('id', $lang_categoria)->update(T_PRODUCTS_CATEGORY, array(
                            'logo' => $logo
                        ));
                    } else {
                        $db->insert(T_PRODUCTS_CATEGORY, array(
                            'id' => $lang_categoria,
                            'logo' => $logo
                        ));
                    }
                }
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    ///T_SUB_CATEGORIES
    if ($s == 'update_lang_key_sub_categoria') {
        if (lui_CheckSession($hash_id) === true) {
            $array_langs = array();
            $lang_key    = lui_Secure($_POST['id_of_key']);
            $lang_categoria   = lui_Secure($_POST['categoria_id']);
        
            $langs       = lui_LangsNamesFromDB();
            foreach ($_POST as $key => $value) {
                if (in_array($key, $langs)) {
                    $key   = lui_Secure($key);
                    $value = mysqli_real_escape_string($sqlConnect, $value);
                    $query = mysqli_query($sqlConnect, "UPDATE " . T_LANGS . " SET `{$key}` = '{$value}' WHERE `lang_key` = '{$lang_key}'");
                    
                    if ($query) {
                        $data['status'] = 200;
                    }
                }
            }
            
            $logo = '';
            if (!empty($_FILES['media_file'])) {
                $themes   = $wo['config']['theme'];
                if($themes=='layshane_star'){
                    $fileInfo = array(
                        'file' => $_FILES["media_file"]["tmp_name"],
                        'name' => $_FILES['media_file']['name'],
                        'size' => $_FILES["media_file"]["size"],
                        'type' => $_FILES["media_file"]["type"],
                        'types' => 'jpg,png,gif,jpeg',
                        'crop' => array(
                            'width' => 480,
                            'height' => 490
                        )
                    );
                }elseif($themes=='restaurante-star'){
                    $fileInfo = array(
                        'file' => $_FILES["media_file"]["tmp_name"],
                        'name' => $_FILES['media_file']['name'],
                        'size' => $_FILES["media_file"]["size"],
                        'type' => $_FILES["media_file"]["type"],
                        'types' => 'jpg,png,gif,jpeg',
                        'crop' => array(
                            'width' => 1080,
                            'height' => 480
                        )
                    );
                }
                
                $media    = lui_ShareFile($fileInfo);
                if (!empty($media) && !empty($media['filename'])) {
                    $logo = $media['filename'];
                }
                if (!empty($logo)) {
                    $category_caata = $db->where('id', $lang_categoria)->getOne(T_SUB_CATEGORIES);
                    if (!empty($category_caata)) {

                        $link = $category_caata->logo;

                        if($link=="upload/photos/d-avatar.jpg"){
                        }elseif($link=="upload/photos/n_layshane_peru.png"){
                        }else{
                            if (file_exists($link)) {
                                @unlink(trim($link));
                            } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                                @lui_DeleteFromToS3($link);
                            }
                        }

                        $db->where('id', $lang_categoria)->update(T_SUB_CATEGORIES, array(
                            'logo' => $logo
                        ));
                    } else {
                        $db->insert(T_SUB_CATEGORIES, array(
                            'id' => $lang_categoria,
                            'logo' => $logo
                        ));
                    }
                }
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }



    if ($s == 'get_langs_colores_productos' && !empty($_POST['lang_key'])) {
        $data['status'] = 400;
        $html           = '';
        $langs          = lui_GetLangDetails($_POST['lang_key']);
        if (count($langs) > 0) {
            $wo['colors'] = $db->where('lang_key', $_POST['lang_key'])->getOne(T_COLORES_PRODUCTOS);
            $html .= lui_LoadAdminPage('edit-lang/form-list-colores');
            foreach ($langs as $key => $wo['langs']) {
                foreach ($wo['langs'] as $wo['key_'] => $wo['lang_vlaue']) {
                    $html .= lui_LoadAdminPage('edit-lang/form-list');
                }
            }
            


            $data['status'] = 200;
            $data['html']   = $html;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

     if ($s == 'delete_category' && !empty($_POST['lang_key'])) {
        $types = array(
            'page' => T_PAGES_CATEGORY,
            'group' => T_GROUPS_CATEGORY,
            'blog' => T_BLOGS_CATEGORY,
            'color_producto' => T_COLORES_PRODUCTOS,
            'product' => T_PRODUCTS_CATEGORY,
            'job' => T_JOB_CATEGORY
        );
        if (!empty($_GET['type']) && in_array($_GET['type'], array_keys($types))) {
            if ($_POST['lang_key'] != 'other' && $_POST['lang_key'] != 'all_') {
                $lang_key = lui_Secure($_POST['lang_key']);
                $category = $db->where('lang_key', $lang_key)->getOne($types[$_GET['type']]);
                if (!empty($category)) {
                    $db->where('lang_key', $lang_key)->delete(T_LANGS);
                    $db->where('lang_key', $lang_key)->delete($types[$_GET['type']]);
                    if ($_GET['type'] == 'page') {
                        $db->where('page_category', $category->id)->update(T_PAGES, array(
                            'page_category' => 1
                        ));
                    }
                    if ($_GET['type'] == 'group') {
                        $db->where('category', $category->id)->update(T_GROUPS, array(
                            'category' => 1
                        ));
                    }
                    if ($_GET['type'] == 'blog') {
                        $db->where('category', $category->id)->update(T_BLOG, array(
                            'category' => 1
                        ));
                    }
                    if ($_GET['type'] == 'color_producto') {
                        $db->where('category', $category->id)->update(T_COLORES_PRODUCTOS, array(
                            'category' => 1
                        ));
                    }
                    if ($_GET['type'] == 'product') {
                        ////
                            $link = $category->logo;
                            if($category->logo=="upload/photos/d-avatar.jpg") {
                            }elseif($category->logo=="upload/photos/n_layshane_peru.png") {
                            }else{
                                if (file_exists($link)) {
                                    @unlink(trim($link));
                                } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                                    @lui_DeleteFromToS3($link);
                                }
                            }
                            
                        /////

                        $db->where('category', $category->id)->update(T_PRODUCTS, array(
                            'category' => 0
                        ));
                    }
                    $data['status'] = 200;
                }
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    // sections
    if ($s == 'add_new_section') {
        $data['status']  = 400;
        $data['message'] = 'Por favor revisa los detalles';
        $types           = array(
            'product' => 'section_product'
        );
        if (!empty($_GET['type']) && in_array($_GET['type'], array_keys($types))) {
            $add         = false;
            $insert_data = array();
            foreach (lui_LangsNamesFromDB() as $key => $lang) {
                if (!empty($_POST[$lang])) {
                    $insert_data[$lang] = lui_Secure($_POST[$lang]);
                    $add                = true;
                }
            }
            if ($add == true && !empty($insert_data)) {
                $insert_data['type'] = 'sections';
                $id                  = $db->insert(T_LANGS, $insert_data);
                $db->insert($types[$_GET['type']], array(
                    'lang_key' => $id
                ));
                
                

                $db->where('id', $id)->update(T_LANGS, array(
                    'lang_key' => $id
                ));
                $data = array(
                    'status' => 200
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'get_section_langs' && !empty($_POST['lang_key'])) {
        $data['status'] = 400;
        $html           = '';
        $langs          = lui_GetLangDetails($_POST['lang_key']);
        if (count($langs) > 0) {
            foreach ($langs as $key => $wo['langs']) {
                foreach ($wo['langs'] as $wo['key_'] => $wo['lang_vlaue']) {
                    $html .= lui_LoadAdminPage('edit-lang/form-list');
                }
            }
            if (isset($_POST['sections_id'])) {
                $id_de_sections = $_POST['sections_id'];
            }else{
                $id_de_sections = false;
            }
            $wo['sections_id'] = $id_de_sections;
            $data['status'] = 200;
            $data['html']   = $html;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'update_lang_key_sections') {
        if (lui_CheckSession($hash_id) === true) {
            $array_langs = array();
            $lang_key    = lui_Secure($_POST['id_of_key']);
            $lang_categoria   = lui_Secure($_POST['sections_id']);
        
            $langs       = lui_LangsNamesFromDB();
            foreach ($_POST as $key => $value) {
                if (in_array($key, $langs)) {
                    $key   = lui_Secure($key);
                    $value = mysqli_real_escape_string($sqlConnect, $value);
                    $query = mysqli_query($sqlConnect, "UPDATE " . T_LANGS . " SET `{$key}` = '{$value}' WHERE `lang_key` = '{$lang_key}'");
                    
                    if ($query) {
                        $data['status'] = 200;
                    }
                }
            }        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }


    if ($s == 'delete_section' && !empty($_POST['lang_key'])) {
        $types = array(
            'product' => 'section_product'
        );
        if (!empty($_GET['type']) && in_array($_GET['type'], array_keys($types))) {
            if ($_POST['lang_key'] != 'other' && $_POST['lang_key'] != 'all_') {
                $lang_key = lui_Secure($_POST['lang_key']);
                $sections = $db->where('lang_key', $lang_key)->getOne($types[$_GET['type']]);
                if (!empty($sections)) {
                    $db->where('lang_key', $lang_key)->delete(T_LANGS);
                    $db->where('lang_key', $lang_key)->delete($types[$_GET['type']]);
                    if ($_GET['type'] == 'sections'){
                        $db->where('id_section', $sections->id)->update('lui_products_categories', array(
                            'id_section' => 0
                        ));
                    }
                    $data['status'] = 200;
                }
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    // category
    // manage packages
    if ($s == 'add_pro_package') {
        $data['status'] = 400;
        if (!empty($_POST['name']) && !empty($_POST['color']) && !empty($_POST['time']) && in_array($_POST['time'], array('day','week','month','year','unlimited')) && !empty($_FILES['icon']) && !empty($_FILES['night_icon']) && !empty($_POST['max_upload'])) {
            $night_icon = '';
            $icon = '';
            if (!empty($_FILES['icon'])) {
                $fileInfo = array(
                    'file' => $_FILES["icon"]["tmp_name"],
                    'name' => $_FILES['icon']['name'],
                    'size' => $_FILES["icon"]["size"],
                    'type' => $_FILES["icon"]["type"],
                    'types' => 'jpeg,png,jpg,gif,svg',
                    'crop' => array(
                        'width' => 32,
                        'height' => 32
                    )
                );
                $media    = lui_ShareFile($fileInfo);
                if (!empty($media) && !empty($media['filename'])) {
                    $icon = $media['filename'];
                }
                else{
                    $data['message'] = 'please select another icon';
                    header("Content-type: application/json");
                    echo json_encode($data);
                    exit();
                }
            }
            if (!empty($_FILES['night_icon'])) {
                $fileInfo = array(
                    'file' => $_FILES["night_icon"]["tmp_name"],
                    'name' => $_FILES['night_icon']['name'],
                    'size' => $_FILES["night_icon"]["size"],
                    'type' => $_FILES["night_icon"]["type"],
                    'types' => 'jpeg,png,jpg,gif,svg',
                    'crop' => array(
                        'width' => 32,
                        'height' => 32
                    )
                );
                $media    = lui_ShareFile($fileInfo);
                if (!empty($media) && !empty($media['filename'])) {
                    $night_icon = $media['filename'];
                }
                else{
                    $data['message'] = 'please select another night icon';
                    header("Content-type: application/json");
                    echo json_encode($data);
                    exit();
                }
            }
            if ($_POST['time'] != 'unlimited' && (empty($_POST['count']) || !is_numeric($_POST['count']))) {
                $data['message'] = 'Please select paid time';
                header("Content-type: application/json");
                echo json_encode($data);
                exit();
            }

            $insert_data = array('price' => (!empty($_POST['price']) && is_numeric($_POST['price']) ? lui_Secure($_POST['price']) : 0),
                                 'featured_member' => (!empty($_POST['featured_member']) && is_numeric($_POST['featured_member']) ? lui_Secure($_POST['featured_member']) : 0),
                                 'profile_visitors' => (!empty($_POST['profile_visitors']) && is_numeric($_POST['profile_visitors']) ? lui_Secure($_POST['profile_visitors']) : 0),
                                 'last_seen' => (!empty($_POST['last_seen']) && is_numeric($_POST['last_seen']) ? lui_Secure($_POST['last_seen']) : 0),
                                 'verified_badge' => (!empty($_POST['verified_badge']) && is_numeric($_POST['verified_badge']) ? lui_Secure($_POST['verified_badge']) : 0),
                                 'pages_promotion' => (!empty($_POST['pages_promotion']) && is_numeric($_POST['pages_promotion']) ? lui_Secure($_POST['pages_promotion']) : 0),
                                 'posts_promotion' => (!empty($_POST['posts_promotion']) && is_numeric($_POST['posts_promotion']) ? lui_Secure($_POST['posts_promotion']) : 0),
                                 'description' => (!empty($_POST['description']) ? lui_Secure($_POST['description']) : ''),
                                 'status' => (!empty($_POST['status']) && is_numeric($_POST['status']) ? lui_Secure($_POST['status']) : 0),
                                 'discount' => (!empty($_POST['discount']) && is_numeric($_POST['discount']) ? lui_Secure($_POST['discount']) : 0),
                                 'time_count' => (!empty($_POST['count']) && is_numeric($_POST['count']) ? lui_Secure($_POST['count']) : 0),
                                 'type' => lui_Secure($_POST['name']),
                                 'color' => lui_Secure($_POST['color']),
                                 'image' => $icon,
                                 'night_image' => $night_icon,
                                 'time' => lui_Secure($_POST['time']),
                                 'max_upload' => lui_Secure($_POST['max_upload']),
                             );
            $db->insert(T_MANAGE_PRO,$insert_data);
            $data['message'] = 'Pro package added successfully';
            $data['status'] = 200;
        }
        else{
            if (empty($_POST['name'])) {
                $data['message'] = 'name can not be empty';
            }
            elseif (empty($_POST['color'])) {
                $data['message'] = 'color can not be empty';
            }
            elseif (empty($_POST['time'])) {
                $data['message'] = 'Please select paid time';
            }
            elseif (empty($_FILES['icon'])) {
                $data['message'] = 'icon can not be empty';
            }
            elseif (empty($_FILES['night_icon'])) {
                $data['message'] = 'night icon can not be empty';
            }
            elseif (empty($_POST['max_upload'])) {
                $data['message'] = 'max upload size can not be empty';
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'update_pro_member') {
        $data['status'] = 400;
        $html           = '';
        if (in_array($_POST['type'], array_keys($wo["pro_packages"]))) {
            if (!empty($_POST['name']) && !empty($_POST['color']) && !empty($_POST['time']) && in_array($_POST['time'], array('day','week','month','year','unlimited')) && !empty($_POST['max_upload'])) {

                $update_array = array();

                if (!empty($_FILES['icon'])) {
                    $fileInfo = array(
                        'file' => $_FILES["icon"]["tmp_name"],
                        'name' => $_FILES['icon']['name'],
                        'size' => $_FILES["icon"]["size"],
                        'type' => $_FILES["icon"]["type"],
                        'types' => 'jpeg,png,jpg,gif,svg',
                        'crop' => array(
                            'width' => 32,
                            'height' => 32
                        )
                    );
                    $media    = lui_ShareFile($fileInfo);
                    if (!empty($media) && !empty($media['filename'])) {
                        $update_array['image'] = $media['filename'];
                    }
                    else{
                        $data['message'] = 'please select another icon';
                        header("Content-type: application/json");
                        echo json_encode($data);
                        exit();
                    }
                }
                if (!empty($_FILES['night_icon'])) {
                    $fileInfo = array(
                        'file' => $_FILES["night_icon"]["tmp_name"],
                        'name' => $_FILES['night_icon']['name'],
                        'size' => $_FILES["night_icon"]["size"],
                        'type' => $_FILES["night_icon"]["type"],
                        'types' => 'jpeg,png,jpg,gif,svg',
                        'crop' => array(
                            'width' => 32,
                            'height' => 32
                        )
                    );
                    $media    = lui_ShareFile($fileInfo);
                    if (!empty($media) && !empty($media['filename'])) {
                        $update_array['night_image'] = $media['filename'];
                    }
                    else{
                        $data['message'] = 'please select another night icon';
                        header("Content-type: application/json");
                        echo json_encode($data);
                        exit();
                    }
                }
                if ($_POST['time'] != 'unlimited' && (empty($_POST['count']) || !is_numeric($_POST['count']))) {
                    $data['message'] = 'Please select paid time';
                    header("Content-type: application/json");
                    echo json_encode($data);
                    exit();
                }

                if (!empty($_POST['icon_to_use']) && $_POST['icon_to_use'] == 1 && in_array($_POST['type'],array(1,2,3,4))) {
                    $link = substr($wo['pro_packages'][$_POST['type']]['image'], strpos($wo['pro_packages'][$_POST['type']]['image'], 'upload/'));
                    if (file_exists($link)) {
                        @unlink(trim($link));
                    } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                        @lui_DeleteFromToS3($link);
                    }
                    $update_array['image'] = '';
                    $link           = substr($wo['pro_packages'][$_POST['type']]['night_image'], strpos($wo['pro_packages'][$_POST['type']]['night_image'], 'upload/'));
                    if (file_exists($link)) {
                        @unlink(trim($link));
                    } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                        @lui_DeleteFromToS3($link);
                    }
                    $update_array['night_image'] = '';
                }

                $update_array['price'] = (!empty($_POST['price']) && is_numeric($_POST['price']) ? lui_Secure($_POST['price']) : 0);
                $update_array['featured_member'] = (!empty($_POST['featured_member']) && is_numeric($_POST['featured_member']) ? lui_Secure($_POST['featured_member']) : 0);
                $update_array['profile_visitors'] = (!empty($_POST['profile_visitors']) && is_numeric($_POST['profile_visitors']) ? lui_Secure($_POST['profile_visitors']) : 0);
                $update_array['last_seen'] = (!empty($_POST['last_seen']) && is_numeric($_POST['last_seen']) ? lui_Secure($_POST['last_seen']) : 0);
                $update_array['verified_badge'] = (!empty($_POST['verified_badge']) && is_numeric($_POST['verified_badge']) ? lui_Secure($_POST['verified_badge']) : 0);
                $update_array['pages_promotion'] = (!empty($_POST['pages_promotion']) && is_numeric($_POST['pages_promotion']) ? lui_Secure($_POST['pages_promotion']) : 0);
                $update_array['posts_promotion'] = (!empty($_POST['posts_promotion']) && is_numeric($_POST['posts_promotion']) ? lui_Secure($_POST['posts_promotion']) : 0);
                $update_array['description'] = (!empty($_POST['description']) ? lui_Secure($_POST['description']) : '');
                $update_array['status'] = (!empty($_POST['status']) && is_numeric($_POST['status']) ? lui_Secure($_POST['status']) : 0);
                $update_array['time_count'] = (!empty($_POST['count']) && is_numeric($_POST['count']) ? lui_Secure($_POST['count']) : 0);
                $update_array['discount'] = (!empty($_POST['discount']) && is_numeric($_POST['discount']) ? lui_Secure($_POST['discount']) : 0);
                $update_array['type'] = lui_Secure($_POST['name']);
                $update_array['color'] = lui_Secure($_POST['color']);
                $update_array['time'] = lui_Secure($_POST['time']);
                $update_array['max_upload'] = lui_Secure($_POST['max_upload']);


                $db->where('id',lui_Secure($_POST['type']))->update(T_MANAGE_PRO,$update_array);
                $data['status'] = 200;

            }
            else{
                if (empty($_POST['name'])) {
                    $data['message'] = 'name can not be empty';
                }
                elseif (empty($_POST['color'])) {
                    $data['message'] = 'color can not be empty';
                }
                elseif (empty($_POST['time'])) {
                    $data['message'] = 'Please select paid time';
                }
                elseif (empty($_POST['max_upload'])) {
                    $data['message'] = 'max upload size can not be empty';
                }
            }
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_pro_package') {
        if (!empty($_GET['id']) && is_numeric($_GET['id']) && in_array($_GET['id'], array_keys($wo["pro_packages"]))) {
            $link           = substr($wo['pro_packages'][$_GET['id']]['night_image'], strpos($wo['pro_packages'][$_GET['id']]['night_image'], 'upload/'));
            if (file_exists($link)) {
                @unlink(trim($link));
            } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                @lui_DeleteFromToS3($link);
            }
            $link           = substr($wo['pro_packages'][$_GET['id']]['image'], strpos($wo['pro_packages'][$_GET['id']]['image'], 'upload/'));
            if (file_exists($link)) {
                @unlink(trim($link));
            } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                @lui_DeleteFromToS3($link);
            }
            $db->where('id',lui_Secure($_GET['id']))->delete(T_MANAGE_PRO);
        }
        $data['status'] = 200;
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'select_pro_package') {
        $data['status'] = 200;
        if (!empty($_POST['feature_type'])) {
            foreach ($wo["pro_packages"] as $key => $value) {
                if (!empty($value['features']) && in_array('pro_'.$key, array_keys($_POST)) && in_array($_POST['pro_'.$key],array(0,1))) {
                    $js = json_decode($value['features'],true);
                    $js[lui_Secure($_POST['feature_type'])] = lui_Secure($_POST['pro_'.$key]);
                    $db->where('id',$key)->update(T_MANAGE_PRO,array('features' => json_encode($js)));
                }
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'select_pro_model') {
        $wo['feature_type'] = lui_Secure($_GET['type']);
        $data['status'] = 200;
        $data['html']   = lui_LoadAdminPage('pro-settings/pro_model');
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'get_pro') {
        $html  = '';
        if (in_array($_POST['type'], array_keys($wo["pro_packages"]))) {
            $wo['pro'] = $wo["pro_packages"][$_POST['type']];
            $html .= lui_LoadAdminPage('pro-settings/pro_form');
        }
        $data['status'] = 200;
        $data['html']   = $html;
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'approve_post') {
        if (!empty($_POST['post_id'])) {
            $post = $db->where('id', lui_Secure($_POST['post_id']))->getOne(T_POSTS);
            if (!empty($post)) {
                $db->where('id', lui_Secure($_POST['post_id']))->update(T_POSTS, array(
                    'active' => 1
                ));
                if (!empty($post->blog_id)) {
                    $db->where('id', $post->blog_id)->update(T_BLOG, array(
                        'active' => '1'
                    ));
                }
                $notification_data_array = array(
                    'recipient_id' => $post->user_id,
                    'type' => 'admin_notification',
                    'url' => 'index.php?link1=post&id=' . $post->id,
                    'text' => $wo['lang']['approve_post'],
                    'type2' => 'approve_post'
                );
                lui_RegisterNotification($notification_data_array);
            }
        }
        $data['status'] = 200;
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    // manage packages
    if ($s == 'test_vision_api') {
        $data['status'] = 400;
        if (!empty($wo['config']['vision_api_key'])) {
            $image_file = lui_GetMedia('upload/photos/d-avatar.jpg');
            $content    = '{"requests": [{"image": {"source": {"imageUri": "' . $image_file . '"}},"features": [{"type": "SAFE_SEARCH_DETECTION","maxResults": 1},{"type": "WEB_DETECTION","maxResults": 2}]}]}';
            try {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://vision.googleapis.com/v1/images:annotate?key=' . $wo['config']['vision_api_key']);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($content)
                ));
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);
                $new_data = json_decode($response);
                if (!empty($new_data->error)) {
                    $data['message'] = $data->error->message;
                }
                if (!empty($new_data->responses[0]->error)) {
                    $data['message'] = $new_data->responses[0]->error->message;
                } elseif ($new_data->responses[0]->safeSearchAnnotation->adult == 'LIKELY' || $new_data->responses[0]->safeSearchAnnotation->adult == 'VERY_LIKELY' || $new_data->responses[0]->safeSearchAnnotation->adult == 'UNKNOWN' || $new_data->responses[0]->safeSearchAnnotation->adult == 'VERY_UNLIKELY' || $new_data->responses[0]->safeSearchAnnotation->adult == 'UNLIKELY' || $new_data->responses[0]->safeSearchAnnotation->adult == 'POSSIBLE') {
                    $data['status']  = 200;
                    $data['message'] = 'Connection was successfully established!';
                } else {
                    $data['message'] = 'Something went wrong, please try again later.';
                }
            }
            catch (Exception $e) {
                $data['message'] = $e->getMessage();
            }
        } else {
            $data['message'] = 'Vision api key can not be empty.';
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'top_up_wallet') {
        if (!empty($_POST['amount'])) {
            $update = lui_UpdateUserData($wo['user']['user_id'], array(
                'wallet' => $_POST['amount']
            ));
            if ($update) {
                $data = array(
                    'status' => 200
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'add_followers') {
        $data           = array();
        $data['status'] = 200;
        $data['error']  = false;
        if (empty($_POST['followers']) || empty($_POST['user_id'])) {
            $data['status'] = 500;
            $data['error']  = $wo['lang']['please_check_details'];
        }
        if (!is_numeric($_POST['followers']) || !is_numeric($_POST['user_id'])) {
            $data['status'] = 500;
            $data['error']  = 'Numbers only are allowed';
        }
        if ($_POST['followers'] < 0 || $_POST['user_id'] < 0) {
            $data['status'] = 500;
            $data['error']  = 'Integer numbers only are allowed';
        }
        $userData = lui_UserData($_POST['user_id']);
        if (empty($data['error']) && $data['status'] != 500) {
            $followers  = floor($_POST['followers']);
            $usersCount = $db->getValue(T_USERS, 'COUNT(*)');
            if ($followers > $usersCount) {
                $data['status'] = 500;
                $data['error']  = "Followers can't be more than your users: $usersCount";
            }
            if ($db->getValue(T_USERS, "MAX(user_id)") <= $userData['last_follow_id']) {
                $data['status'] = 500;
                $data['error']  = "No more users left to follow, all the users are following {$userData['name']}.";
            }
        }
        if (empty($data['error']) && $data['error'] != 500) {
            $users_id = array();
            $users    = $db->where('user_id', $userData['last_follow_id'], ">")->get(T_USERS, $followers, 'user_id');
            foreach ($users as $key => $i) {
                $users_id[] = $i->user_id;
            }
            if (empty($data['error']) && $data['status'] != 500 && !empty($users_id)) {
                ob_end_clean();
                header("Content-Encoding: none");
                header("Connection: close");
                ignore_user_abort();
                ob_start();
                header('Content-Type: application/json');
                echo json_encode(array(
                    'status' => 200
                ));
                $size = ob_get_length();
                header("Content-Length: $size");
                ob_end_flush();
                flush();
                session_write_close();
                if (is_callable('fastcgi_finish_request')) {
                    fastcgi_finish_request();
                }
                if (is_callable('litespeed_finish_request')) {
                    litespeed_finish_request();
                }
                $followed    = lui_RegisterFollow($_POST['user_id'], $users_id);
                $user_data   = lui_UpdateUserDetails($_POST['user_id'], false, false, true);
                $update_user = $db->where('user_id', $_POST['user_id'])->update(T_USERS, array(
                    "last_follow_id" => lui_Secure(end($users_id))
                ));
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'update_custom_code') {
        $data    = array(
            'status' => 400
        );
        $theme   = $wo['config']['theme'];
        $request = (isset($_POST['cheader']) && isset($_POST['cfooter']) && isset($_POST['css']));
        if ($request === true) {
            if (is_writable("datos/modulos/$theme/custom")) {
                $up_data        = array(
                    $_POST['cheader'],
                    $_POST['cfooter'],
                    $_POST['css']
                );
                $save           = lui_CustomCode('p', $up_data);
                $data['status'] = 200;
            } else {
                $data['status'] = 500;
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'verfiy_apps') {
        $arrContextOptions             = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false
            )
        );
        $data['android_status']        = 0;
        $data['windows_status']        = 0;
        $data['android_native_status'] = 0;
        if (!empty($_POST['android_purchase_code'])) {
            $android_code = lui_Secure($_POST['android_purchase_code']);
            $file         = file_get_contents("http://www.layshane.com/access_token.php?code={$android_code}&type=android", false, stream_context_create($arrContextOptions));
            $check        = json_decode($file, true);
            if (!empty($check['status'])) {
                if ($check['status'] == 'SUCCESS') {
                    $update                 = lui_SaveConfig('footer_background', '#aaa');
                    $data['android_status'] = 200;
                } else {
                    $data['android_status'] = 400;
                    $data['android_text']   = $check['ERROR_NAME'];
                }
            }
        }
        if (!empty($_POST['android_native_purchase_code'])) {
            $android_code = lui_Secure($_POST['android_native_purchase_code']);
            $file         = file_get_contents("http://www.layshane.com/access_token.php?code={$android_code}&type=android", false, stream_context_create($arrContextOptions));
            $check        = json_decode($file, true);
            if (!empty($check['status'])) {
                if ($check['status'] == 'SUCCESS') {
                    $update                        = lui_SaveConfig('footer_background_n', '#aaa');
                    $data['android_native_status'] = 200;
                } else {
                    $data['android_native_status'] = 400;
                    $data['android_text']          = $check['ERROR_NAME'];
                }
            }
        }
        if (!empty($_POST['windows_purchase_code'])) {
            $windows_code = lui_Secure($_POST['windows_purchase_code']);
            $file         = file_get_contents("http://www.layshane.com/access_token.php?code={$windows_code}&type=windows_desktop", false, stream_context_create($arrContextOptions));
            $check        = json_decode($file, true);
            if (!empty($check['status'])) {
                if ($check['status'] == 'SUCCESS') {
                    $update                 = lui_SaveConfig('footer_text_color', '#ddd');
                    $data['windows_status'] = 200;
                } else {
                    $data['windows_status'] = 400;
                    $data['windows_text']   = $check['ERROR_NAME'];
                }
            }
        }
        if (!empty($_POST['ios_purchase_code'])) {
            $windows_code = lui_Secure($_POST['ios_purchase_code']);
            $file         = file_get_contents("http://www.layshane.com/access_token.php?code={$windows_code}&type=ios", false, stream_context_create($arrContextOptions));
            $check        = json_decode($file, true);
            if (!empty($check['status'])) {
                if ($check['status'] == 'SUCCESS') {
                    $update             = lui_SaveConfig('footer_background_2', '#aaa');
                    $data['ios_status'] = 200;
                } else {
                    $data['ios_status'] = 400;
                    $data['ios_text']   = $check['ERROR_NAME'];
                }
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'update_lang_key') {
        if (lui_CheckSession($hash_id) === true) {
            $array_langs = array();
            $lang_key    = lui_Secure($_POST['id_of_key']);
            if(!empty($_POST['colores'])){
               $color_prod_a= lui_Secure($_POST['colores']);
               $db->where('lang_key', $lang_key)->update(T_COLORES_PRODUCTOS, array(
                    "color" => $color_prod_a
                ));
            }
            
            $langs       = lui_LangsNamesFromDB();
            foreach ($_POST as $key => $value) {
                if (in_array($key, $langs)) {
                    $key   = lui_Secure($key);
                    //$value = lui_Secure($value);
                    $value = mysqli_real_escape_string($sqlConnect, $value);
                    $query = mysqli_query($sqlConnect, "UPDATE " . T_LANGS . " SET `{$key}` = '{$value}' WHERE `lang_key` = '{$lang_key}'");
                    
                    if ($query) {
                        $data['status'] = 200;
                    }
                }
            }
            
            $image = '';
            if (!empty($_FILES['icon'])) {
                $fileInfo = array(
                    'file' => $_FILES["icon"]["tmp_name"],
                    'name' => $_FILES['icon']['name'],
                    'size' => $_FILES["icon"]["size"],
                    'type' => $_FILES["icon"]["type"],
                    'types' => 'jpeg,png,jpg,gif,svg',
                    'crop' => array(
                        'width' => 100,
                        'height' => 100
                    )
                );
                $media    = lui_ShareFile($fileInfo);
                if (!empty($media) && !empty($media['filename'])) {
                    $image = $media['filename'];
                }
                if (!empty($image)) {
                    $gender = $db->where('gender_id', $lang_key)->getOne(T_GENDER);
                    if (!empty($gender)) {
                        $link = $gender->image;
                        if (file_exists($link)) {
                            @unlink(trim($link));
                        } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                            @lui_DeleteFromToS3($link);
                        }
                        $db->where('gender_id', $lang_key)->update(T_GENDER, array(
                            'image' => $image
                        ));
                    } else {
                        $db->insert(T_GENDER, array(
                            'gender_id' => $lang_key,
                            'image' => $image
                        ));
                    }
                }
            }
            if (!empty($_POST['icon_to_use']) && $_POST['icon_to_use'] == 1) {
                $gender = $db->where('gender_id', $lang_key)->getOne(T_GENDER);
                if (!empty($gender)) {
                    $link = $gender->image;
                    if (file_exists($link)) {
                        @unlink(trim($link));
                    } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                        @lui_DeleteFromToS3($link);
                    }
                    $db->where('gender_id', $lang_key)->delete(T_GENDER);
                }
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'add_new_gender') {
        $image = '';
        if (!empty($_FILES['icon'])) {
            $fileInfo = array(
                'file' => $_FILES["icon"]["tmp_name"],
                'name' => $_FILES['icon']['name'],
                'size' => $_FILES["icon"]["size"],
                'type' => $_FILES["icon"]["type"],
                'types' => 'jpeg,png,jpg,gif,svg',
                'crop' => array(
                    'width' => 100,
                    'height' => 100
                )
            );
            $media    = lui_ShareFile($fileInfo);
            if (!empty($media) && !empty($media['filename'])) {
                $image = $media['filename'];
            }
        }
        $insert_data         = array();
        $insert_data['type'] = 'gender';
        $add                 = false;
        foreach (lui_LangsNamesFromDB() as $wo['key_']) {
            if (!empty($_POST[$wo['key_']])) {
                $insert_data[$wo['key_']] = lui_Secure($_POST[$wo['key_']]);
                $add                      = true;
            }
        }
        if ($add == true) {
            $id = $db->insert(T_LANGS, $insert_data);
            $db->where('id', $id)->update(T_LANGS, array(
                'lang_key' => $id
            ));
            if (!empty($image)) {
                $db->insert(T_GENDER, array(
                    'gender_id' => $id,
                    'image' => $image
                ));
            }
            $data['status'] = 200;
        } else {
            $data['status']  = 400;
            $data['message'] = $wo['lang']['please_check_details'];
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_gender') {
        if (!empty($_GET['key']) && in_array($_GET['key'], array_keys($wo['genders']))) {
            $db->where('lang_key', lui_Secure($_GET['key']))->delete(T_LANGS);
            $gender = $db->where('gender_id', lui_Secure($_GET['key']))->getOne(T_GENDER);
            if (!empty($gender)) {
                $link = $gender->image;
                if (file_exists($link)) {
                    @unlink(trim($link));
                } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                    @lui_DeleteFromToS3($link);
                }
                $db->where('gender_id', lui_Secure($_GET['key']))->delete(T_GENDER);
            }
        }
        $data['status'] = 200;
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'add_new_lang') {
        if (lui_CheckSession($hash_id) === true) {
            $mysqli = lui_LangsNamesFromDB();
            if (in_array($_POST['lang'], $mysqli)) {
                $data['status']  = 400;
                $data['message'] = 'This lang is already used.';
            } else {
                $lang_name = lui_Secure($_POST['lang']);
                $lang_name = strtolower($lang_name);
                $first = "module.exports = function(sequelize, DataTypes) {
                          return sequelize.define('lui_Langs', {
                            id: {
                              autoIncrement: true,
                              type: DataTypes.INTEGER,
                              allowNull: false,
                              primaryKey: true
                            },
                            lang_key: {
                              type: DataTypes.STRING(160),
                              allowNull: true
                            },
                            type: {
                              type: DataTypes.STRING(100),
                              allowNull: false,
                              defaultValue: \"\"
                            }";
                $last = "}, {
                            sequelize,
                            timestamps: false,
                            tableName: 'lui_Langs'
                          });
                        };";
                $js = '{type: DataTypes.TEXT,
                        allowNull: true
                       }';
                       $tx = '';
                foreach ($mysqli as $key => $value) {
                    $tx .= ','.$value.': '.$js;
                }
                $tx .= ','.$lang_name.': '.$js;
                file_put_contents("nodejs/models/lui_langs.js", $first.$tx.$last);
                $query     = mysqli_query($sqlConnect, "ALTER TABLE " . T_LANGS . " ADD `$lang_name` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;");
                if ($query) {
                    $iso = '';
                    if (!empty($_POST["iso"])) {
                        $iso = lui_Secure($_POST["iso"]);
                    }
                    
                    $db->insert(T_LANG_ISO,array('lang_name' => $lang_name,
                                                 'iso' => $iso));
                    $content = file_get_contents('luisincludes/languages/extra/spanish.php');
                    $fp      = fopen("luisincludes/languages/extra/$lang_name.php", "wb");
                    fwrite($fp, $content);
                    fclose($fp);


                    $spanish = lui_LangsFromDB('spanish');
                    foreach ($spanish as $key => $lang) {
                        $lang  = lui_Secure($lang);
                        $query = mysqli_query($sqlConnect, "UPDATE " . T_LANGS . " SET `{$lang_name}` = '$lang' WHERE `lang_key` = '{$key}'");
                    }
                    $data['status'] = 200;
                }
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == "update_iso" && !empty($_POST["lang_name"]) && !empty($_POST["iso"])) {
        $lang_name = lui_Secure($_POST["lang_name"]);
        $iso = lui_Secure($_POST["iso"]);
        if (empty($db->where('lang_name',$lang_name)->getOne(T_LANG_ISO))) {
            $db->insert(T_LANG_ISO,array('lang_name' => $lang_name));
        }
        $db->where('lang_name',$lang_name)->update(T_LANG_ISO,array('iso' => $iso));
        $data["status"] = 200;
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'add_new_lang_key') {
        if (lui_CheckSession($hash_id) === true) {
            if (!empty($_POST['lang_key'])) {
                $lang_key  = lui_Secure($_POST['lang_key']);
                $mysqli    = mysqli_query($sqlConnect, "SELECT COUNT(id) as count FROM " . T_LANGS . " WHERE `lang_key` = '$lang_key'");
                $sql_fetch = mysqli_fetch_assoc($mysqli);
                if ($sql_fetch['count'] == 0) {
                    $mysqli = mysqli_query($sqlConnect, "INSERT INTO " . T_LANGS . " (`lang_key`) VALUE ('$lang_key')");
                    if ($mysqli) {
                        $data['status'] = 200;
                        $data['url']    = lui_LoadAdminLinkSettings('manage-languages');
                    }
                } else {
                    $data['status']  = 400;
                    $data['message'] = 'This key is already used, please use other one.';
                }
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_lang') {
        if (lui_CheckMainSession($hash_id) === true) {
            $mysqli = lui_LangsNamesFromDB();
            if (in_array($_GET['id'], $mysqli)) {
                $lang_name = lui_Secure($_GET['id']);
                $query     = mysqli_query($sqlConnect, "ALTER TABLE " . T_LANGS . " DROP COLUMN `$lang_name`");
                if ($query) {
                    $mysqli = lui_LangsNamesFromDB();
                    $first = "module.exports = function(sequelize, DataTypes) {
                          return sequelize.define('lui_Langs', {
                            id: {
                              autoIncrement: true,
                              type: DataTypes.INTEGER,
                              allowNull: false,
                              primaryKey: true
                            },
                            lang_key: {
                              type: DataTypes.STRING(160),
                              allowNull: true
                            },
                            type: {
                              type: DataTypes.STRING(100),
                              allowNull: false,
                              defaultValue: \"\"
                            }";
                $last = "}, {
                            sequelize,
                            timestamps: false,
                            tableName: 'lui_Langs'
                          });
                        };";
                $js = '{type: DataTypes.TEXT,
                        allowNull: true
                       }';
                       $tx = '';
                foreach ($mysqli as $key => $value) {
                    $tx .= ','.$value.': '.$js;
                }
                file_put_contents("nodejs/models/lui_langs.js", $first.$tx.$last);
                    $db->where('lang_name',$lang_name)->delete(T_LANG_ISO);
                    unlink("luisincludes/languages/extra/$lang_name.php");
                    $data['status'] = 200;
                }
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'remove_multi_lang') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                if (in_array($value, $langs)) {
                    $lang_name = lui_Secure($value);
                    $t_langs   = T_LANGS;
                    $query     = mysqli_query($sqlConnect, "ALTER TABLE `$t_langs` DROP COLUMN `$lang_name`");
                    if ($query) {
                        if (file_exists("luisincludes/languages/extra/$lang_name.php")) {
                            unlink("luisincludes/languages/extra/$lang_name.php");
                        }
                    }
                }
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'reset_windows_app_keys') {
        $app_key    = sha1(rand(111111111, 999999999)) . '-' . md5(microtime()) . '-' . rand(11111111, 99999999);
        $data_array = array(
            'widnows_app_api_key' => $app_key
        );
        foreach ($data_array as $key => $value) {
            $saveSetting = lui_SaveConfig($key, $value);
        }
        if ($saveSetting === true) {
            $data['status']  = 200;
            $data['app_key'] = $app_key;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'cancel_pro') {
        $cancel = lui_DeleteProMemebership();
        if ($cancel) {
            $data['status'] = 200;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'update_ref_system') {
        $saveSetting = false;
        if (!empty($_POST['affiliate_type'])) {
            $_POST['affiliate_type'] = 1;
        } else {
            $_POST['affiliate_type'] = 0;
        }
        foreach ($_POST as $key => $value) {
            if ($key != 'hash_id') {
                $saveSetting = lui_SaveConfig($key, $value);
            }
        }
        if ($saveSetting === true) {
            $data['status'] = 200;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'mark_as_paid') {
        if (!empty($_GET['id']) && lui_CheckSession($hash_id)) {
            $get_payment_info = lui_GetPaymentHistory($_GET['id']);
            if (!empty($get_payment_info)) {
                $id     = $get_payment_info['id'];
                $update = mysqli_query($sqlConnect, "UPDATE " . T_A_REQUESTS . " SET status = '1' WHERE id = {$id}");
                if ($update) {
                    $body                    = lui_LoadPage('emails/payment-sent');
                    $body                    = str_replace('{{name}}', $get_payment_info['user']['name'], $body);
                    $body                    = str_replace('{{amount}}', $get_payment_info['amount'], $body);
                    $body                    = str_replace('{{site_name}}', $config['siteName'], $body);
                    $send_message_data       = array(
                        'from_email' => $wo['config']['siteEmail'],
                        'from_name' => $wo['config']['siteName'],
                        'to_email' => $get_payment_info['user']['email'],
                        'to_name' => $get_payment_info['user']['name'],
                        'subject' => 'New Payment | ' . $wo['config']['siteName'],
                        'charSet' => 'utf-8',
                        'message_body' => $body,
                        'is_html' => true
                    );
                    $send_message            = lui_SendMessage($send_message_data);
                    $notification_data_array = array(
                        'recipient_id' => $get_payment_info['user_id'],
                        'type' => 'admin_notification',
                        'url' => 'index.php?link1=setting&page=payments',
                        'text' => $wo['lang']['withdraw_approve'],
                        'type2' => 'withdraw_approve'
                    );
                    lui_RegisterNotification($notification_data_array);
                    if ($send_message) {
                        lui_UpdateBalance($get_payment_info['user_id'], $get_payment_info['amount'], '-','withdrawal');
                        $data['status'] = 200;
                    }
                }
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'decline_payment') {
        if (!empty($_GET['id']) && lui_CheckSession($hash_id)) {
            $get_payment_info = lui_GetPaymentHistory($_GET['id']);
            if (!empty($get_payment_info)) {
                $id     = $get_payment_info['id'];
                $update = mysqli_query($sqlConnect, "UPDATE " . T_A_REQUESTS . " SET status = '2' WHERE id = {$id}");
                if ($update) {
                    $body                    = lui_LoadPage('emails/payment-declined');
                    $body                    = str_replace('{{name}}', $get_payment_info['user']['name'], $body);
                    $body                    = str_replace('{{amount}}', $get_payment_info['amount'], $body);
                    $body                    = str_replace('{{site_name}}', $config['siteName'], $body);
                    $send_message_data       = array(
                        'from_email' => $wo['config']['siteEmail'],
                        'from_name' => $wo['config']['siteName'],
                        'to_email' => $get_payment_info['user']['email'],
                        'to_name' => $get_payment_info['user']['name'],
                        'subject' => 'Payment Declined | ' . $wo['config']['siteName'],
                        'charSet' => 'utf-8',
                        'message_body' => $body,
                        'is_html' => true
                    );
                    $send_message            = lui_SendMessage($send_message_data);
                    $notification_data_array = array(
                        'recipient_id' => $get_payment_info['user_id'],
                        'type' => 'admin_notification',
                        'url' => 'index.php?link1=setting&page=payments',
                        'text' => $wo['lang']['withdraw_declined'],
                        'type2' => 'withdraw_declined'
                    );
                    lui_RegisterNotification($notification_data_array);
                    if ($send_message) {
                        $data['status'] = 200;
                    }
                }
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'add_new_page') {
        if (lui_CheckSession($hash_id) === true && !empty($_POST['page_name']) && !empty($_POST['page_content']) && !empty($_POST['page_title'])) {
            $page_name    = lui_Secure($_POST['page_name']);
            $page_content = lui_Secure(str_replace(array(
                "\r",
                "\n"
            ), "", $_POST['page_content']));
            $page_title   = lui_Secure($_POST['page_title']);
            $page_type    = 0;
            if (!empty($_POST['page_type'])) {
                $page_type = 1;
            }
            if (!preg_match('/^[\w]+$/', $page_name)) {
                $data = array(
                    'status' => 400,
                    'message' => 'Invalid page name characters'
                );
                header("Content-type: application/json");
                echo json_encode($data);
                exit();
            }
            $data_ = array(
                'page_name' => $page_name,
                'page_content' => $page_content,
                'page_title' => $page_title,
                'page_type' => $page_type
            );
            $add   = lui_RegisterNewPage($data_);
            if ($add) {
                $data['status'] = 200;
            }
        } else {
            $data = array(
                'status' => 400,
                'message' => 'Please fill all the required fields'
            );
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'edit_page') {
        if (lui_CheckSession($hash_id) === true && !empty($_POST['page_id']) && !empty($_POST['page_name']) && !empty($_POST['page_content']) && !empty($_POST['page_title'])) {
            $page_name    = $_POST['page_name'];
            $page_content = $_POST['page_content'];
            $page_title   = $_POST['page_title'];
            $page_type    = 0;
            if (!empty($_POST['page_type'])) {
                $page_type = 1;
            }
            if (!preg_match('/^[\w]+$/', $page_name)) {
                $data = array(
                    'status' => 400,
                    'message' => 'Invalid page name characters'
                );
                header("Content-type: application/json");
                echo json_encode($data);
                exit();
            }
            $data_ = array(
                'page_name' => $page_name,
                'page_content' => $page_content,
                'page_title' => $page_title,
                'page_type' => $page_type
            );
            $add   = lui_UpdateCustomPageData($_POST['page_id'], $data_);
            if ($add) {
                $data['status'] = 200;
            }
        } else {
            $data = array(
                'status' => 400,
                'message' => 'Please fill all the required fields'
            );
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'add_new_field') {
        if (lui_CheckSession($hash_id) === true && !empty($_POST['name']) && !empty($_POST['type']) && !empty($_POST['description'])) {
            $type              = lui_Secure($_POST['type']);
            $name              = lui_Secure($_POST['name']);
            $description       = lui_Secure($_POST['description']);
            $registration_page = 0;
            if (!empty($_POST['registration_page'])) {
                $registration_page = 1;
            }
            $profile_page = 0;
            if (!empty($_POST['profile_page'])) {
                $profile_page = 1;
            }
            $length = 32;
            if (!empty($_POST['length'])) {
                if (is_numeric($_POST['length']) && $_POST['length'] < 1001) {
                    $length = lui_Secure($_POST['length']);
                }
            }
            $placement_array = array(
                'profile',
                'general',
                'social',
                'none'
            );
            $placement       = 'profile';
            if (!empty($_POST['placement'])) {
                if (in_array($_POST['placement'], $placement_array)) {
                    $placement = lui_Secure($_POST['placement']);
                }
            }
            $data_ = array(
                'name' => $name,
                'description' => $description,
                'length' => $length,
                'placement' => $placement,
                'registration_page' => $registration_page,
                'profile_page' => $profile_page,
                'active' => 1
            );
            if (!empty($_POST['options'])) {
                $options              = @explode("\n", $_POST['options']);
                $type                 = lui_Secure(implode(',', $options));
                $data_['select_type'] = 'yes';
            }
            $data_['type'] = $type;
            $add           = lui_RegisterNewField($data_);
            if ($add) {
                $data['status'] = 200;
            }
        } else {
            $data = array(
                'status' => 400,
                'message' => 'Please fill all the required fields'
            );
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'edit_field') {
        if (lui_CheckSession($hash_id) === true && !empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['id'])) {
            $name              = lui_Secure($_POST['name']);
            $description       = lui_Secure($_POST['description']);
            $registration_page = 0;
            if (!empty($_POST['registration_page'])) {
                $registration_page = 1;
            }
            $profile_page = 0;
            if (!empty($_POST['profile_page'])) {
                $profile_page = 1;
            }
            $active = 0;
            if (!empty($_POST['active'])) {
                $active = 1;
            }
            $length = 32;
            if (!empty($_POST['length'])) {
                if (is_numeric($_POST['length'])) {
                    $length = lui_Secure($_POST['length']);
                }
            }
            $placement_array = array(
                'profile',
                'general',
                'social',
                'none'
            );
            $placement       = 'profile';
            if (!empty($_POST['placement'])) {
                if (in_array($_POST['placement'], $placement_array)) {
                    $placement = lui_Secure($_POST['placement']);
                }
            }
            $data_ = array(
                'name' => $name,
                'description' => $description,
                'length' => $length,
                'placement' => $placement,
                'registration_page' => $registration_page,
                'profile_page' => $profile_page,
                'active' => $active
            );
            if (!empty($_POST['options'])) {
                $options              = @explode("\n", $_POST['options']);
                $data_['type']        = implode(',', $options);
                $data_['select_type'] = 'yes';
            }
            $add = lui_UpdateField($_POST['id'], $data_);
            if ($add) {
                $data['status'] = 200;
            }
        } else {
            $data = array(
                'status' => 400,
                'message' => 'Please fill all the required fields'
            );
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_field') {
        if (lui_CheckMainSession($hash_id) === true && !empty($_GET['id'])) {
            $delete = lui_DeleteField($_GET['id']);
            if ($delete) {
                $data = array(
                    'status' => 200
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'remove_multi_fields') {
        if (!empty($_POST['ids'])) {
            foreach ($_POST['ids'] as $key => $value) {
                lui_DeleteField(lui_Secure($value));
            }
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'delete_page') {
        if (lui_CheckMainSession($hash_id) === true && !empty($_GET['id'])) {
            $delete = lui_DeleteCustomPage($_GET['id']);
            if ($delete) {
                $data = array(
                    'status' => 200
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'new_backup') {
        $b = lui_Backup($sql_db_host, $sql_db_user, $sql_db_pass, $sql_db_name);
        if ($b) {
            $data['status'] = 200;
            $data['date']   = date('d-m-Y');
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'ffmpeg_debug') {
        $ffmpeg_b                   = $wo['config']['ffmpeg_binary_file'];
        if (!isfuncEnabled("shell_exec")) {
            $data['status'] = 200;
            $data['data']   = "The function: shell_exec is not enabled, please contact your hosting provider to enable it, it's required for FFMPEG";
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
        $video_output_full_path_240 = dirname(__DIR__) . "/admin-panel/videos/test_240p_converted.mp4";
        @unlink($video_output_full_path_240);
        $video_file_full_path = dirname(__DIR__) . "/admin-panel/videos/test.mp4";
        $shell                = shell_exec("$ffmpeg_b -y -i $video_file_full_path -vcodec libx264 -preset " . $wo['config']['convert_speed'] . " -filter:v scale=426:-2 -crf 26 $video_output_full_path_240 2>&1");
        if (file_exists($video_output_full_path_240)) {
            $data['video_url'] = $wo['config']['site_url'] . '/admin-panel/videos/test_240p_converted.mp4';
        }
        $data['status'] = 200;
        $data['data']   = $shell;
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'update_general_setting' && lui_CheckSession($hash_id) === true) {
        $saveSetting         = false;
        $delete_follow_table = 0;
        if (!empty($_FILES) && !empty($_FILES["cloud_file"])) {
            $fileInfo = array(
                'file' => $_FILES["cloud_file"]["tmp_name"],
                'name' => $_FILES['cloud_file']['name'],
                'size' => $_FILES["cloud_file"]["size"],
                'type' => $_FILES["cloud_file"]["type"],
                'types' => 'json',
                'local_upload' => 1
            );
            $media    = lui_ShareFile($fileInfo);
            if (!empty($media) && !empty($media['filename'])) {
                lui_SaveConfig('cloud_file_path', $media['filename']);
            }
        }
        foreach ($_POST as $key => $value) {
            if ($key == 'bank' || $key == 'p_paypal' || $key == 'skrill' || $key == 'custom') {
                if (in_array($value, array(0,1))) {
                    $p_key = $key;
                    if ($key == 'p_paypal') {
                        $p_key = 'paypal';
                    }
                    $wo['config']['withdrawal_payment_method'][$p_key] = lui_Secure($value);
                    lui_SaveConfig('withdrawal_payment_method', json_encode($wo['config']['withdrawal_payment_method']));
                }
            }
            if ($key == 'google_map') {
                if ($wo['config']['yandex_map'] == 1) {
                    lui_SaveConfig('yandex_map', 0);
                }
            }
            if ($key == 'yandex_map') {
                if ($wo['config']['google_map'] == 1) {
                    lui_SaveConfig('google_map', 0);
                }
            }
            if ($key == 'website_mode') {
                if (!empty($wo['website_modes_off'][$wo['config']['website_mode']])) {
                    foreach ($wo['website_modes_off'][$wo['config']['website_mode']] as $key5 => $value5) {
                        if ($value5 != 'second_post_button') {
                            lui_SaveConfig($value5, 1);
                        }
                    }
                }
                if ($value == 'linkedin') {
                    lui_SaveConfig('events', 1);
                    lui_SaveConfig('blogs', 1);
                    lui_SaveConfig('job_system', 1);
                    lui_SaveConfig('funding_system', 1);
                    lui_SaveConfig('pages', 1);
                    lui_SaveConfig('groups', 1);
                    lui_SaveConfig('forum', 1);
                    foreach ($wo['website_modes_off']['linkedin'] as $key2 => $value2) {
                        lui_SaveConfig($value2, 0);
                    }
                    lui_SaveConfig('second_post_button', 'reaction');
                } elseif ($value == 'instagram') {
                    lui_SaveConfig('classified', 1);
                    lui_SaveConfig('user_status', 1);
                    lui_SaveConfig('offer_system', 1);
                    foreach ($wo['website_modes_off']['instagram'] as $key2 => $value2) {
                        lui_SaveConfig($value2, 0);
                    }
                    lui_SaveConfig('second_post_button', 'disabled');
                } elseif ($value == 'twitter') {
                    foreach ($wo['website_modes_off']['twitter'] as $key2 => $value2) {
                        lui_SaveConfig($value2, 0);
                    }
                    lui_SaveConfig('second_post_button', 'disabled');
                } elseif ($value == 'askfm') {
                    foreach ($wo['website_modes_off']['askfm'] as $key2 => $value2) {
                        lui_SaveConfig($value2, 0);
                    }
                    lui_SaveConfig('second_post_button', 'disabled');
                } elseif ($value == 'patreon') {
                    foreach ($wo['website_modes_off']['patreon'] as $key2 => $value2) {
                        lui_SaveConfig($value2, 0);
                    }
                    lui_SaveConfig('second_post_button', 'disabled');
                } else {
                    lui_SaveConfig('second_post_button', 'reaction');
                }
            }
            if ($key == 'ffmpeg_binary_file') {
                if (empty($value)) {
                    $value = '';
                } elseif (file_exists($value)) {
                    $value = $value;
                } else {
                    $value = '';
                }
            }
            if (isset($wo['config'][$key]) || $key == 'googleAnalytics_en') {
                if ($key == 'yandex_translate') {
                    if ($value == 1) {
                        $saveSetting = lui_SaveConfig('google_translate', 0);
                    }
                }
                if ($key == 'google_translate') {
                    if ($value == 1) {
                        $saveSetting = lui_SaveConfig('yandex_translate', 0);
                    }
                }
                if ($key == 'agora_chat_video') {
                    if ($config['twilio_video_chat'] == 1) {
                        $saveSetting = lui_SaveConfig('twilio_video_chat', 0);
                    }
                }
                if ($key == 'twilio_video_chat') {
                    if ($config['agora_chat_video'] == 1) {
                        $saveSetting = lui_SaveConfig('agora_chat_video', 0);
                    }
                }
                if ($key == 'googleAnalytics_en') {
                    $key   = 'googleAnalytics';
                    $value = base64_decode($value);
                }

                if ($key == 'googleAnalytics_en') {
                    $key   = 'googleAnalytics';
                    $value = base64_decode($value);
                }

                if ($key == 'connectivitySystem') {
                    if (isset($_POST['connectivitySystem'])) {
                        if ($config['connectivitySystem'] == 1 && $_POST['connectivitySystem'] != 1) {
                            $delete_follow_table = 1;
                        } else if ($config['connectivitySystem'] != 1 && $_POST['connectivitySystem'] == 1) {
                            $delete_follow_table = 1;
                        }
                    }
                }
                if ($key == 'ftp_upload') {
                    if ($value == 1) {
                        if ($wo['config']['amazone_s3'] == 1) {
                            $saveSetting = lui_SaveConfig('amazone_s3', 0);
                        }
                        if ($wo['config']['wasabi_storage'] == 1) {
                            $saveSetting = lui_SaveConfig('wasabi_storage', 0);
                        }
                        if ($wo['config']['spaces'] == 1) {
                            $saveSetting = lui_SaveConfig('spaces', 0);
                        }
                        if ($wo['config']['cloud_upload'] == 1) {
                            $saveSetting = lui_SaveConfig('cloud_upload', 0);
                        }
                        if ($wo['config']['backblaze_storage'] == 1) {
                            $saveSetting = lui_SaveConfig('backblaze_storage', 0);
                        }
                    }
                }
                if ($key == 'amazone_s3') {
                    if ($value == 1) {
                        if ($wo['config']['ftp_upload'] == 1) {
                            $saveSetting = lui_SaveConfig('ftp_upload', 0);
                        }
                        if ($wo['config']['wasabi_storage'] == 1) {
                            $saveSetting = lui_SaveConfig('wasabi_storage', 0);
                        }
                        if ($wo['config']['spaces'] == 1) {
                            $saveSetting = lui_SaveConfig('spaces', 0);
                        }
                        if ($wo['config']['cloud_upload'] == 1) {
                            $saveSetting = lui_SaveConfig('cloud_upload', 0);
                        }
                        if ($wo['config']['backblaze_storage'] == 1) {
                            $saveSetting = lui_SaveConfig('backblaze_storage', 0);
                        }
                    }
                }
                if ($key == 'spaces') {
                    if ($value == 1) {
                        if ($wo['config']['ftp_upload'] == 1) {
                            $saveSetting = lui_SaveConfig('ftp_upload', 0);
                        }
                        if ($wo['config']['wasabi_storage'] == 1) {
                            $saveSetting = lui_SaveConfig('wasabi_storage', 0);
                        }
                        if ($wo['config']['amazone_s3'] == 1) {
                            $saveSetting = lui_SaveConfig('amazone_s3', 0);
                        }
                        if ($wo['config']['cloud_upload'] == 1) {
                            $saveSetting = lui_SaveConfig('cloud_upload', 0);
                        }
                        if ($wo['config']['backblaze_storage'] == 1) {
                            $saveSetting = lui_SaveConfig('backblaze_storage', 0);
                        }
                    }
                }
                if ($key == 'cloud_upload') {
                    if ($value == 1) {
                        if ($wo['config']['ftp_upload'] == 1) {
                            $saveSetting = lui_SaveConfig('ftp_upload', 0);
                        }
                        if ($wo['config']['wasabi_storage'] == 1) {
                            $saveSetting = lui_SaveConfig('wasabi_storage', 0);
                        }
                        if ($wo['config']['amazone_s3'] == 1) {
                            $saveSetting = lui_SaveConfig('amazone_s3', 0);
                        }
                        if ($wo['config']['spaces'] == 1) {
                            $saveSetting = lui_SaveConfig('spaces', 0);
                        }
                        if ($wo['config']['backblaze_storage'] == 1) {
                            $saveSetting = lui_SaveConfig('backblaze_storage', 0);
                        }
                    }
                }
                if ($key == 'wasabi_storage') {
                    if ($value == 1) {
                        if ($wo['config']['ftp_upload'] == 1) {
                            $saveSetting = lui_SaveConfig('ftp_upload', 0);
                        }
                        if ($wo['config']['cloud_upload'] == 1) {
                            $saveSetting = lui_SaveConfig('cloud_upload', 0);
                        }
                        if ($wo['config']['amazone_s3'] == 1) {
                            $saveSetting = lui_SaveConfig('amazone_s3', 0);
                        }
                        if ($wo['config']['spaces'] == 1) {
                            $saveSetting = lui_SaveConfig('spaces', 0);
                        }
                        if ($wo['config']['backblaze_storage'] == 1) {
                            $saveSetting = lui_SaveConfig('backblaze_storage', 0);
                        }
                    }
                }
                if ($key == 'backblaze_storage') {
                    if ($value == 1) {
                        if ($wo['config']['ftp_upload'] == 1) {
                            $saveSetting = lui_SaveConfig('ftp_upload', 0);
                        }
                        if ($wo['config']['cloud_upload'] == 1) {
                            $saveSetting = lui_SaveConfig('cloud_upload', 0);
                        }
                        if ($wo['config']['amazone_s3'] == 1) {
                            $saveSetting = lui_SaveConfig('amazone_s3', 0);
                        }
                        if ($wo['config']['spaces'] == 1) {
                            $saveSetting = lui_SaveConfig('spaces', 0);
                        }
                        if ($wo['config']['wasabi_storage'] == 1) {
                            $saveSetting = lui_SaveConfig('wasabi_storage', 0);
                        }
                    }
                }
                if ($key == 'millicast_live_video') {
                    if ($value == 1) {
                        if ($wo['config']['agora_live_video'] == 1) {
                            $saveSetting = lui_SaveConfig('agora_live_video', 0);
                        }
                        $saveSetting = lui_SaveConfig('live_video', 1);
                    } else {
                        if ($wo['config']['agora_live_video'] != 1) {
                            $saveSetting = lui_SaveConfig('live_video', 0);
                        }
                    }
                }
                if ($key == 'agora_live_video') {
                    if ($value == 1) {
                        if ($wo['config']['millicast_live_video'] == 1) {
                            $saveSetting = lui_SaveConfig('millicast_live_video', 0);
                        }
                        $saveSetting = lui_SaveConfig('live_video', 1);
                    } else {
                        if ($wo['config']['millicast_live_video'] != 1) {
                            $saveSetting = lui_SaveConfig('live_video', 0);
                        }
                    }
                }
                if ($key == 'free_day_limit' && (!is_numeric($value) || $value < 1)) {
                    $value = 1000;
                }
                if ($key == 'pro_day_limit' && (!is_numeric($value) || $value < 1)) {
                    $value = 10000;
                }
                if ($key == 'smtp_password') {
                    $value = openssl_encrypt($value, "AES-128-ECB", 'mysecretkey1234');
                }
                $saveSetting = lui_SaveConfig($key, $value);
            }
        }
        if ($saveSetting === true) {
            if ($delete_follow_table == 1) {
                mysqli_query($sqlConnect, "DELETE FROM " . T_FOLLOWERS);
                mysqli_query($sqlConnect, "DELETE FROM " . T_NOTIFICATION . " WHERE type='following'");
            }
            $data['status'] = 200;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'test_ftp') {
        include_once('luisincludes/librerias/ftp/vendor/autoload.php');
        try {
            $array = array(
                'upload/photos/d-avatar.jpg',
                'upload/photos/f-avatar.jpg',
                'upload/photos/d-cover.jpg',
                'upload/photos/d-group.jpg',
                'upload/photos/d-page.jpg',
                'upload/photos/d-blog.jpg',
                'upload/photos/game-icon.png',
                'upload/photos/d-film.jpg',
                'upload/photos/app-default-icon.png',
                'upload/photos/index.html',
                'upload/photos/incognito.png',
                'upload/.htaccess',
                'upload/files/2022/09/EAufYfaIkYQEsYzwvZha_01_4bafb7db09656e1ecb54d195b26be5c3_file.svg',
                'upload/files/2022/09/2MRRkhb7rDhUNuClfOfc_01_76c3c700064cfaef049d0bb983655cd4_file.svg',
                'upload/files/2022/09/D91CP5YFfv74GVAbYtT7_01_288940ae12acf0198d590acbf11efae0_file.svg',
                'upload/files/2022/09/cFNOXZB1XeWRSdXXEdlx_01_7d9c4adcbe750bfc8e864c69cbed3daf_file.svg',
                'upload/files/2022/09/yKmDaNA7DpA7RkCRdoM6_01_eb391ca40102606b78fef1eb70ce3c0f_file.svg',
                'upload/files/2022/09/iZcVfFlay3gkABhEhtVC_01_771d67d0b8ae8720f7775be3a0cfb51a_file.svg'
            );
            foreach ($array as $key => $value) {
                $upload = lui_UploadToS3($value, array(
                    'delete' => 'no'
                ));
            }
            $data['status'] = 200;
        }
        catch (Exception $e) {
            $data['status']  = 400;
            $data['message'] = $e->getMessage();
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'auto_friend' && lui_CheckMainSession($hash_id) === true) {
        if (!empty($_GET['users'])) {
            $save = lui_SaveConfig('auto_friend_users', $_GET['users']);
            if ($save) {
                $data['status'] = 200;
            }
        } else {
            $save = lui_SaveConfig('auto_friend_users', '');
            if ($save) {
                $data['status'] = 200;
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'auto_page_like' && lui_CheckMainSession($hash_id) === true) {
        if (!empty($_GET['users'])) {
            $save = lui_SaveConfig('auto_page_like', $_GET['users']);
            if ($save) {
                $data['status'] = 200;
            }
        } else {
            $save = lui_SaveConfig('auto_page_like', '');
            if ($save) {
                $data['status'] = 200;
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'auto_group_like' && lui_CheckMainSession($hash_id) === true) {
        if (!empty($_GET['users'])) {
            $save = lui_SaveConfig('auto_group_join', $_GET['users']);
            if ($save) {
                $data['status'] = 200;
            }
        } else {
            $save = lui_SaveConfig('auto_group_join', '');
            if ($save) {
                $data['status'] = 200;
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'generate_fake_users') {
        require "luisincludes/librerias/fake-users/vendor/autoload.php";
        $faker = Faker\Factory::create();
        if (empty($_POST['password'])) {
            $_POST['password'] = '123456789';
        }
        $count_users = $_POST['count_users'];
        $password    = $_POST['password'];
        $avatar      = $_POST['avatar'];
        ob_end_clean();
        header("Content-Encoding: none");
        header("Connection: close");
        ignore_user_abort();
        ob_start();
        header('Content-Type: application/json');
        echo json_encode(array(
            'status' => 200
        ));
        $size = ob_get_length();
        header("Content-Length: $size");
        ob_end_flush();
        flush();
        session_write_close();
        if (is_callable('fastcgi_finish_request')) {
            fastcgi_finish_request();
        }
        if (is_callable('litespeed_finish_request')) {
            litespeed_finish_request();
        }
        for ($i = 0; $i < $count_users; $i++) {
            $genders     = array_keys($wo['genders']);
            $random_keys = array_rand($genders, 1);
            $gender      = array_rand(array(
                "male",
                "female"
            ), 1);
            $gender      = $genders[$random_keys];
            $re_data     = array(
                'email' => lui_Secure(str_replace(".", "_", $faker->userName) . '_' . rand(111, 999) . "@yahoo.com", 0),
                'username' => lui_Secure($faker->userName . '_' . rand(111, 999), 0),
                'password' => lui_Secure($password, 0),
                'email_code' => lui_Secure(md5($faker->userName . '_' . rand(111, 999)), 0),
                'src' => 'Fake',
                'gender' => lui_Secure($gender),
                'lastseen' => time(),
                'active' => 1,
                'first_name' => $faker->firstName($gender),
                'last_name' => $faker->lastName
            );
            if ($avatar == 1) {
                $urls = array(
                    "https://placeimg.com/" . $wo['profile_picture_width_crop'] . "/" . $wo['profile_picture_height_crop'] . "/people",
                    "https://loremflickr.com/" . $wo['profile_picture_width_crop'] . "/" . $wo['profile_picture_height_crop'],
                    "https://picsum.photos/" . $wo['profile_picture_width_crop'] . "/" . $wo['profile_picture_height_crop']
                );
                $rand = rand(0, 2);
                for ($ii = 0; $ii < 5; $ii++) {
                    $url = $urls[$rand];
                    $a   = lui_ImportImageFromFile($url, '_url_image', 'avatar');
                    if (!empty($a)) {
                        $re_data['avatar'] = $a;
                        break;
                    }
                    $rand = rand(0, 2);
                }
            }
            $add_user = lui_RegisterUser($re_data);
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_fake_users' && lui_CheckMainSession($hash_id) === true) {
        ob_end_clean();
        header("Content-Encoding: none");
        header("Connection: close");
        ignore_user_abort();
        ob_start();
        header('Content-Type: application/json');
        echo json_encode(array(
            'status' => 200
        ));
        $size = ob_get_length();
        header("Content-Length: $size");
        ob_end_flush();
        flush();
        session_write_close();
        if (is_callable('fastcgi_finish_request')) {
            fastcgi_finish_request();
        }
        if (is_callable('litespeed_finish_request')) {
                litespeed_finish_request();
            }
        $query = mysqli_query($sqlConnect, "SELECT user_id FROM " . T_USERS . " WHERE src = 'Fake'");
        while ($row = mysqli_fetch_assoc($query)) {
            lui_DeleteUser($row['user_id']);
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'auto_delete' && lui_CheckMainSession($hash_id) === true) {
        if (!empty($_GET['delete'])) {
            ob_end_clean();
            header("Content-Encoding: none");
            header("Connection: close");
            ignore_user_abort();
            ob_start();
            header('Content-Type: application/json');
            echo json_encode(array(
                'status' => 200
            ));
            $size = ob_get_length();
            header("Content-Length: $size");
            ob_end_flush();
            flush();
            session_write_close();
            if (is_callable('fastcgi_finish_request')) {
                fastcgi_finish_request();
            }
            if (is_callable('litespeed_finish_request')) {
                litespeed_finish_request();
            }
            $delete_data = lui_DeleteAllData($_GET['delete']);
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'test_wasabi') {
        include_once('luisincludes/librerias/s3-lib/vendor/autoload.php');
        try {
            $s3Client = S3Client::factory(array(
                'version' => 'latest',
                'endpoint' => 'https://s3.'.$wo['config']['wasabi_bucket_region'].'.wasabisys.com',
                'region' => $wo['config']['wasabi_bucket_region'],
                'credentials' => array(
                    'key' => $wo['config']['wasabi_access_key'],
                    'secret' => $wo['config']['wasabi_secret_key']
                )
            ));
            $buckets  = $s3Client->listBuckets();
            
            if (!empty($buckets)) {
                if ($s3Client->doesBucketExist($wo['config']['wasabi_bucket_name'])) {
                    $data['status'] = 200;
                    $array          = array(
                        'upload/photos/d-avatar.jpg',
                        'upload/photos/f-avatar.jpg',
                        'upload/photos/d-cover.jpg',
                        'upload/photos/d-group.jpg',
                        'upload/photos/d-page.jpg',
                        'upload/photos/d-blog.jpg',
                        'upload/photos/game-icon.png',
                        'upload/photos/d-film.jpg',
                        'upload/photos/incognito.png',
                        'upload/photos/app-default-icon.png',
                        'upload/files/2022/09/EAufYfaIkYQEsYzwvZha_01_4bafb7db09656e1ecb54d195b26be5c3_file.svg',
                        'upload/files/2022/09/2MRRkhb7rDhUNuClfOfc_01_76c3c700064cfaef049d0bb983655cd4_file.svg',
                        'upload/files/2022/09/D91CP5YFfv74GVAbYtT7_01_288940ae12acf0198d590acbf11efae0_file.svg',
                        'upload/files/2022/09/cFNOXZB1XeWRSdXXEdlx_01_7d9c4adcbe750bfc8e864c69cbed3daf_file.svg',
                        'upload/files/2022/09/yKmDaNA7DpA7RkCRdoM6_01_eb391ca40102606b78fef1eb70ce3c0f_file.svg',
                        'upload/files/2022/09/iZcVfFlay3gkABhEhtVC_01_771d67d0b8ae8720f7775be3a0cfb51a_file.svg'
                    );
                    foreach ($array as $key => $value) {
                        $upload = lui_UploadToS3($value, array(
                            'delete' => 'no'
                        ));
                    }
                } else {
                    $data['status'] = 300;
                }
            } else {
                $data['status'] = 500;
            }
        }
        catch (Exception $e) {
            $data['status']  = 400;
            $data['message'] = $e->getMessage();
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'test_s3') {
        include_once('luisincludes/librerias/s3-lib/vendor/autoload.php');
        try {
            $s3Client = S3Client::factory(array(
                'version' => 'latest',
                'region' => $wo['config']['region'],
                'credentials' => array(
                    'key' => $wo['config']['amazone_s3_key'],
                    'secret' => $wo['config']['amazone_s3_s_key']
                )
            ));
            $buckets  = $s3Client->listBuckets();
            $result   = $s3Client->putBucketCors(array(
                'Bucket' => $wo['config']['bucket_name'], // REQUIRED
                'CORSConfiguration' => array( // REQUIRED
                    'CORSRules' => array( // REQUIRED
                        array(
                            'AllowedHeaders' => array(
                                'Authorization'
                            ),
                            'AllowedMethods' => array(
                                'POST',
                                'GET',
                                'PUT'
                            ), // REQUIRED
                            'AllowedOrigins' => array(
                                '*'
                            ), // REQUIRED
                            'ExposeHeaders' => array(),
                            'MaxAgeSeconds' => 3000
                        )
                    )
                )
            ));
            if (!empty($buckets)) {
                if ($s3Client->doesBucketExist($wo['config']['bucket_name'])) {
                    $data['status'] = 200;
                    $array          = array(
                        'upload/photos/d-avatar.jpg',
                        'upload/photos/f-avatar.jpg',
                        'upload/photos/d-cover.jpg',
                        'upload/photos/d-group.jpg',
                        'upload/photos/d-page.jpg',
                        'upload/photos/d-blog.jpg',
                        'upload/photos/game-icon.png',
                        'upload/photos/d-film.jpg',
                        'upload/photos/incognito.png',
                        'upload/photos/app-default-icon.png',
                        'upload/files/2022/09/EAufYfaIkYQEsYzwvZha_01_4bafb7db09656e1ecb54d195b26be5c3_file.svg',
                        'upload/files/2022/09/2MRRkhb7rDhUNuClfOfc_01_76c3c700064cfaef049d0bb983655cd4_file.svg',
                        'upload/files/2022/09/D91CP5YFfv74GVAbYtT7_01_288940ae12acf0198d590acbf11efae0_file.svg',
                        'upload/files/2022/09/cFNOXZB1XeWRSdXXEdlx_01_7d9c4adcbe750bfc8e864c69cbed3daf_file.svg',
                        'upload/files/2022/09/yKmDaNA7DpA7RkCRdoM6_01_eb391ca40102606b78fef1eb70ce3c0f_file.svg',
                        'upload/files/2022/09/iZcVfFlay3gkABhEhtVC_01_771d67d0b8ae8720f7775be3a0cfb51a_file.svg'
                    );
                    foreach ($array as $key => $value) {
                        $upload = lui_UploadToS3($value, array(
                            'delete' => 'no'
                        ));
                    }
                } else {
                    $data['status'] = 300;
                }
            } else {
                $data['status'] = 500;
            }
        }
        catch (Exception $e) {
            $data['status']  = 400;
            $data['message'] = $e->getMessage();
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'test_s3_2') {
        include_once('luisincludes/librerias/s3-lib/vendor/autoload.php');
        try {
            $s3Client = S3Client::factory(array(
                'version' => 'latest',
                'region' => $wo['config']['region_2'],
                'credentials' => array(
                    'key' => $wo['config']['amazone_s3_key_2'],
                    'secret' => $wo['config']['amazone_s3_s_key_2']
                )
            ));
            $buckets  = $s3Client->listBuckets();
            $result   = $s3Client->putBucketCors(array(
                'Bucket' => $wo['config']['bucket_name_2'], // REQUIRED
                'CORSConfiguration' => array( // REQUIRED
                    'CORSRules' => array( // REQUIRED
                        array(
                            'AllowedHeaders' => array(
                                'Authorization'
                            ),
                            'AllowedMethods' => array(
                                'POST',
                                'GET',
                                'PUT'
                            ), // REQUIRED
                            'AllowedOrigins' => array(
                                '*'
                            ), // REQUIRED
                            'ExposeHeaders' => array(),
                            'MaxAgeSeconds' => 3000
                        )
                    )
                )
            ));
            if (!empty($buckets)) {
                if ($s3Client->doesBucketExist($wo['config']['bucket_name_2'])) {
                    $data['status'] = 200;
                } else {
                    $data['status'] = 300;
                }
            } else {
                $data['status'] = 500;
            }
        }
        catch (Exception $e) {
            $data['status']  = 400;
            $data['message'] = $e->getMessage();
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'test_spaces') {
        include_once('luisincludes/librerias/s3-lib/vendor/autoload.php');
        $key        = $wo['config']['spaces_key'];
        $secret     = $wo['config']['spaces_secret'];
        $spaceName = $wo['config']['space_name'];
        $region     = $wo['config']['space_region'];
        $host = "digitaloceanspaces.com";
        try {
            // if(!empty($spaceName)) {
            //   $endpoint = "https://".$spaceName.".".$region.".".$host;
            // }
            // else {
              $endpoint = "https://".$region.".".$host;
            // }
            $s3Client = S3Client::factory(array(
            'region' => $region,
            'version' => 'latest',
            'endpoint' => $endpoint,
            'credentials' => array(
                      'key'    => $key,
                      'secret' => $secret,
                  ),
            'bucket_endpoint' => true,
          ));
            $buckets  = $s3Client->listBuckets();
            if (!empty($buckets)) {
                $exists = 0;
                foreach ($buckets->toArray()['Buckets'] as $key => $value) {
                    if ($value['Name'] == $wo['config']['space_name']) {
                        $exists = 1;
                        break;
                    }
                }
                
                if ($exists) {
                    $data['status'] = 200;
                    $array          = array(
                        'upload/photos/d-avatar.jpg',
                        'upload/photos/f-avatar.jpg',
                        'upload/photos/d-cover.jpg',
                        'upload/photos/d-group.jpg',
                        'upload/photos/d-page.jpg',
                        'upload/photos/d-blog.jpg',
                        'upload/photos/game-icon.png',
                        'upload/photos/d-film.jpg',
                        'upload/photos/incognito.png',
                        'upload/photos/app-default-icon.png',
                        'upload/files/2022/09/EAufYfaIkYQEsYzwvZha_01_4bafb7db09656e1ecb54d195b26be5c3_file.svg',
                        'upload/files/2022/09/2MRRkhb7rDhUNuClfOfc_01_76c3c700064cfaef049d0bb983655cd4_file.svg',
                        'upload/files/2022/09/D91CP5YFfv74GVAbYtT7_01_288940ae12acf0198d590acbf11efae0_file.svg',
                        'upload/files/2022/09/cFNOXZB1XeWRSdXXEdlx_01_7d9c4adcbe750bfc8e864c69cbed3daf_file.svg',
                        'upload/files/2022/09/yKmDaNA7DpA7RkCRdoM6_01_eb391ca40102606b78fef1eb70ce3c0f_file.svg',
                        'upload/files/2022/09/iZcVfFlay3gkABhEhtVC_01_771d67d0b8ae8720f7775be3a0cfb51a_file.svg'
                    );
                    foreach ($array as $key => $value) {
                        $upload = lui_UploadToS3($value, array(
                            'delete' => 'no'
                        ));
                    }
                } else {
                    $data['status'] = 300;
                }
            } else {
                $data['status'] = 500;
            }
        }
        catch (Exception $e) {
            $data['status']  = 400;
            $data['message'] = $e->getMessage();
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'update_terms_setting') {
        if (!empty($_POST['lang_key'])) {
            $lang_key = lui_Secure($_POST['lang_key']);
            $langs    = lui_LangsNamesFromDB();
            foreach ($_POST as $key => $value) {
                if (in_array($key, $langs)) {
                    $key   = lui_Secure($key);
                    $value = base64_decode($value);
                    $value = mysqli_real_escape_string($sqlConnect, $value);
                    $query = mysqli_query($sqlConnect, "UPDATE " . T_LANGS . " SET `{$key}` = '{$value}' WHERE `lang_key` = '{$lang_key}'");
                    if ($query) {
                        $data['status'] = 200;
                    }
                }
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'update_html_emails') {
        $saveSetting = false;
        foreach ($_POST as $key => $value) {
            if ($key != 'hash_id' && in_array($key, array(
                'activate',
                'invite',
                'login_with',
                'notification',
                'payment_declined',
                'payment_approved',
                'recover',
                'unusual_login',
                'account_deleted'
            ))) {
                $saveSetting = lui_SaveHTMLEmails($key, base64_decode($value));
            }
        }
        if ($saveSetting === true) {
            $data['status'] = 200;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'email_debug') {
        $send_message_data = array(
            'from_email' => $wo['config']['siteEmail'],
            'from_name' => $wo['config']['siteName'],
            'to_email' => $wo['user']['email'],
            'to_name' => $wo['user']['name'],
            'subject' => 'Test Message From ' . $wo['config']['siteName'],
            'charSet' => 'utf-8',
            'message_body' => 'If you can see this message, then your SMTP configuration is working fine.',
            'is_html' => false,
            'return' => 'debug',
        );
        $send_message      = lui_SendMessage($send_message_data);
        
        header("Content-type: application/json");
        exit();
    }
    if ($s == 'test_message') {
        $send_message_data = array(
            'from_email' => $wo['config']['siteEmail'],
            'from_name' => $wo['config']['siteName'],
            'to_email' => $wo['user']['email'],
            'to_name' => $wo['user']['name'],
            'subject' => 'Test Message From ' . $wo['config']['siteName'],
            'charSet' => 'utf-8',
            'message_body' => 'If you can see this message, then your SMTP configuration is working fine.',
            'is_html' => false,
            'return' => 'error',
        );
        $send_message      = lui_SendMessage($send_message_data);
        if ($send_message === true) {
            $data['status'] = 200;
        } else {
            $data['status'] = 400;
            if (!empty($send_message)) {
                $data['error']  = $send_message;
            }
            else{
                $data['error']  = "Error found while sending the email, the information you provided are not correct, please test the email settings on your local device and make sure they are correct. ";
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'update_sms_setting') {
        $saveSetting = false;
        foreach ($_POST as $key => $value) {
            if ($key != 'hash_id') {
                $saveSetting = lui_SaveConfig($key, $value);
            }
        }
        if ($saveSetting === true) {
            $data['status'] = 200;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'test_sms_message') {
        $message      = 'This is a test message from ' . $wo['config']['siteName'];
        $send_message = lui_SendSMSMessage($wo['config']['sms_phone_number'], $message);
        if ($send_message === true) {
            $data['status'] = 200;
        } else {
            $data['status'] = 400;
            $data['error']  = $send_message;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'update_design_setting') {
        $saveSetting = false;
        if (isset($_FILES['logo']['name'])) {
            $fileInfo = array(
                'file' => $_FILES["logo"]["tmp_name"],
                'name' => $_FILES['logo']['name'],
                'size' => $_FILES["logo"]["size"]
            );
            $media    = lui_UploadLogo($fileInfo);
        }

        if (isset($_FILES['icono']['name'])) {
            $fileInfo = array(
                'file' => $_FILES["icono"]["tmp_name"],
                'name' => $_FILES['icono']['name'],
                'size' => $_FILES["icono"]["size"]
            );
            $media    = lui_UploadLogo_mobil($fileInfo);
        }

        if (isset($_FILES['portada']['name'])) {
            $fileInfo = array(
                'file' => $_FILES["portada"]["tmp_name"],
                'name' => $_FILES['portada']['name'],
                'size' => $_FILES["portada"]["size"]
            );
            $media    = lui_UploadPortada($fileInfo);
        }
        if (isset($_FILES['imagenpresentacion_d']['name'])) {
            $fileInfo = array(
                'file' => $_FILES["imagenpresentacion_d"]["tmp_name"],
                'name' => $_FILES['imagenpresentacion_d']['name'],
                'size' => $_FILES["imagenpresentacion_d"]["size"]
            );
            $media    = lui_UploadImgPresentacionuno($fileInfo);
        }
        if (isset($_FILES['background']['name'])) {
            $fileInfo = array(
                'file' => $_FILES["background"]["tmp_name"],
                'name' => $_FILES['background']['name'],
                'size' => $_FILES["background"]["size"]
            );
            $media    = lui_UploadBackground($fileInfo);
        }
        if (isset($_FILES['favicon']['name'])) {
            $fileInfo = array(
                'file' => $_FILES["favicon"]["tmp_name"],
                'name' => $_FILES['favicon']['name'],
                'size' => $_FILES["favicon"]["size"]
            );
            $media    = lui_UploadFavicon($fileInfo);
        }
        foreach ($_POST as $key => $value) {
            if ($key != 'hash_id') {
                $saveSetting = lui_SaveConfig($key, $value);
            }
        }
        if ($saveSetting === true) {
            $data['status'] = 200;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }


    if ($s == 'caracteristicas_d') {
        $guardarcaracteristica = false;
        if (isset($_POST['caracteristica'])) {
            $guardarcaracteristica = lui_SaveCaracteristica($_POST['caracteristica']);
        }
        
        if ($guardarcaracteristica['dat'] === true) {
            $data['id'] = $guardarcaracteristica['id'];
            $data['status'] = 200;
        }

        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'caracteristicas_dps') {
        $guardarcaracteristica = false;
        if (isset($_POST['caracteristica'])) {
            $guardarcaracteristica = lui_eliminar_caracteristica($_POST['caracteristica']);
        }
        
        if ($guardarcaracteristica === true) {
            $data['status'] = 200;
        }

        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'beneficios_df') {
        $imah = false;
        $laimagen = false;
        if (isset($_FILES['img']['name'])) {
            $fileInfo = array(
                'file' => $_FILES["img"]["tmp_name"],
                'name' => $_FILES['img']['name'],
                'size' => $_FILES["img"]["size"],
                'name_image' => lui_GenerateKey() . '_' . date('d') . '_' . md5(time()).'_image'
                
            );
            $media    = lui_UploadBeneficio($fileInfo);
            $imah     = $fileInfo['name_image'].'.'.$media['imagen_file'];
        }
        $guardarbeneficio = false;
        if (isset($_POST['beneficio'])){
            $guardarbeneficio = lui_SaveBeneficio($_POST['beneficio'],$imah);
        }
        
        if($imah){
            $dir      = $wo['config']['site_url']."/datos/modulos/" . $wo['config']['theme'] . "/img/beneficios/";
            $laimagen = $dir.$imah;
        }
        

        if ($guardarbeneficio['dat'] === true) {
            $data['id'] = $guardarbeneficio['id'];
            $data['img'] = $laimagen;
            $data['status'] = 200;
        }

        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    
    if ($s == 'beneficio_dps') {
        $beneficiodell = false;
        if (isset($_POST['beneficio'])) {
            $beneficiodell = lui_eliminar_beneficio($_POST['beneficio']);
        }
        
        if ($beneficiodell === true) {
            $data['status'] = 200;
        }

        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'add_new_publications_res') {
        $imah = false;
        $laimagen = false;
        if($_POST['titulo']=="") {
            $data['mensaje'] = "Escribe un titulo";
        }elseif($_POST['detalles']==""){
            $data['mensaje'] = "Escribe los detalles";
        }else{
            if($_POST['editar_publicacion']==""){
                if (isset($_FILES['imagen']['name'])) {
                    $fileInfo = array(
                        'file' => $_FILES["imagen"]["tmp_name"],
                        'name' => $_FILES['imagen']['name'],
                        'size' => $_FILES["imagen"]["size"],
                        'name_image' => lui_GenerateKey() . '_' . date('d') . '_' . md5(time()).'_image'
                        
                    );
                    $media    = lui_UploadPublicacion_image($fileInfo);
                    $imah     = $fileInfo['name_image'].'.'.$media['imagen_file'];
                }
                $guardarbeneficio = false;
                
                $guardarbeneficio = lui_SavePublicationData($_POST['titulo'],$_POST['detalles'],$imah);
                
                
                if($imah){
                    $dir      = $wo['config']['site_url']."/upload/publicacion/".date('Y')."/".date('m')."/";
                    $laimagen = $dir.$imah;
                }
                

                if ($guardarbeneficio['dat'] === true) {
                    $data['id'] = $guardarbeneficio['id'];
                    $data['img'] = $laimagen;
                    $data['typed'] = false;
                    $data['nombre'] = $_POST['titulo'];
                    $data['detalle'] = $_POST['detalles'];
                    $data['status'] = 200;
                    $data['mensaje'] = "Agregado";
                }

            }else{
                $publica = $db->where('id', $_POST['editar_publicacion'])->getOne('publicacion');
       
                if (isset($_FILES['imagen']['name'])) {
                    $fileInfo = array(
                        'file' => $_FILES["imagen"]["tmp_name"],
                        'name' => $_FILES['imagen']['name'],
                        'size' => $_FILES["imagen"]["size"],
                        'name_image' => lui_GenerateKey() . '_' . date('d') . '_' . md5(time()).'_image'
                        
                    );
                    $dirupdate      = $publica->url.$publica->imagen;
                    if (file_exists($dirupdate)) {
                        unlink($dirupdate);
                    }
                    $media    = lui_UploadPublicacion_image($fileInfo);
                    $imah     = $fileInfo['name_image'].'.'.$media['imagen_file'];
                }else{
                    $imah = $publica->imagen;
                }
                $guardarbeneficio = false;
                $guardarbeneficio = lui_SavePublicationDataEditar($_POST['editar_publicacion'],$_POST['titulo'],$_POST['detalles'],$imah);
                
                if($imah){
                    $dir      = $wo['config']['site_url'].'/'.$publica->url;
                    $laimagen = '<img src="'.$dir.$imah.'">';
                }
                

                if ($guardarbeneficio === true) {
                    $data['id'] = $publica->id;
                    $data['img'] = $laimagen;
                    $data['typed'] = 'update';
                    $data['nombre'] = $_POST['titulo'];
                    $data['detalle'] = $_POST['detalles'];
                    $data['status'] = 200;
                    $data['mensaje'] = "Guardado";
                }
            }
        }

        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if($s == 'publicaciondat_buscar') {
        $data['status'] = 400;
        if($_POST['publicv']) {
            $publica = $db->where('id', $_POST['publicv'])->getOne('publicacion');
            $data['nombre'] = $publica->nombre;
            $data['detalle'] = $publica->descripcion;
            $data['status'] = 200;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'publicaciondat') {
        $beneficiodell = false;
        if (isset($_POST['publication'])) {
            $beneficiodell = lui_eliminar_b_publicacionsg($_POST['publication']);
        }
        
        if ($beneficiodell === true) {
            $data['status'] = 200;
        }

        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'updateTheme' && isset($_POST['theme'])) {
        $_SESSION['theme'] = '';
        $saveSetting       = false;
        foreach ($_POST as $key => $value) {
            if ($key != 'hash_id') {
                $saveSetting = lui_SaveConfig($key, $value);
            }
        }
        if ($saveSetting === true) {
            $data['status'] = 200;
        }
        $files = glob('cache/*'); // get all file names
        foreach ($files as $file) { // iterate files
            if (is_file($file))
                unlink($file); // delete file
        }
        if (!file_exists('cache/index.html')) {
            $f = @fopen("cache/index.html", "a+");
            @fclose($f);
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_user' && isset($_GET['user_id']) && lui_CheckMainSession($hash_id) === true) {
        if (lui_DeleteUser($_GET['user_id']) === true) {
            $data['status'] = 200;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_job' && isset($_POST['job_id'])) {
        $job_id = lui_Secure($_POST['job_id']);
        $job    = $db->where('id', $job_id)->getOne(T_JOB);
        if (!empty($job)) {
            if ($job->image_type != 'cover') {
                @unlink($job->image);
                lui_DeleteFromToS3($job->image);
            }
        }
        $db->where('id', $job_id)->delete(T_JOB);
        $db->where('job_id', $job_id)->delete(T_JOB_APPLY);
        $post = $db->where('job_id', $job_id)->getOne(T_POSTS);
        if (!empty($post)) {
            lui_DeletePost($post->id);
        }
        $data['status'] = 200;
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_offer' && isset($_POST['offer_id'])) {
        $offer_id = lui_Secure($_POST['offer_id']);
        $offer    = $db->where('id', $offer_id)->getOne(T_OFFER);
        if (!empty($offer)) {
            if (!empty($offer->image)) {
                @unlink($offer->image);
                lui_DeleteFromToS3($offer->image);
            }
        }
        $db->where('id', $offer_id)->delete(T_OFFER);
        $data['status'] = 200;
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_user_page' && isset($_GET['page_id'])) {
        if (lui_DeletePage($_GET['page_id']) === true) {
            $data['status'] = 200;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_group' && isset($_GET['group_id'])) {
        if (lui_DeleteGroup($_GET['group_id']) === true) {
            $data['status'] = 200;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'filter_all_users') {
        $html  = '';
        $after = (isset($_GET['after_user_id']) && is_numeric($_GET['after_user_id']) && $_GET['after_user_id'] > 0) ? $_GET['after_user_id'] : 0;
        foreach (lui_GetAllUsers(20, 'ManageUsers', $_POST, $after) as $wo['userlist']) {
            $html .= lui_LoadAdminPage('manage-users/list');
        }
        $data = array(
            'status' => 200,
            'html' => $html
        );
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'get_more_pages') {
        $html  = '';
        $after = (isset($_GET['after_page_id']) && is_numeric($_GET['after_page_id']) && $_GET['after_page_id'] > 0) ? $_GET['after_page_id'] : 0;
        foreach (lui_GetAllPages(20, $after) as $wo['pagelist']) {
            $html .= lui_LoadAdminPage('manage-pages/list');
            ;
        }
        $data = array(
            'status' => 200,
            'html' => $html
        );
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'get_more_groups') {
        $html  = '';
        $after = (isset($_GET['after_group_id']) && is_numeric($_GET['after_group_id']) && $_GET['after_group_id'] > 0) ? $_GET['after_group_id'] : 0;
        foreach (lui_GetAllGroups(20, $after) as $wo['grouplist']) {
            $html .= lui_LoadAdminPage('manage-groups/list');
            ;
        }
        $data = array(
            'status' => 200,
            'html' => $html
        );
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'update_users_setting' && isset($_POST['user_lastseen'])) {
        $delete_follow_table = 0;
        $saveSetting         = false;
        foreach ($_POST as $key => $value) {
            $saveSetting = lui_SaveConfig($key, $value);
        }
        if ($saveSetting === true) {
            $data['status'] = 200;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'get_more_posts') {
        $html      = '';
        $postsData = array(
            'limit' => 10,
            'after_post_id' => lui_Secure($_GET['after_post_id'])
        );
        foreach (lui_GetAllPosts($postsData) as $wo['story']) {
            $html .= lui_LoadAdminPage('manage-posts/list');
        }
        $data = array(
            'status' => 200,
            'html' => $html
        );
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_fund' && lui_CheckSession($hash_id) === true) {
        if (!empty($_POST['fund_id'])) {
            $id   = lui_Secure($_POST['fund_id']);
            $fund = $db->where('id', $id)->getOne(T_FUNDING);
            if (!empty($fund)) {
                @lui_DeleteFromToS3($fund->image);
                if (file_exists($fund->image)) {
                    try {
                        unlink($fund->image);
                    }
                    catch (Exception $e) {
                    }
                }
                $db->where('id', $id)->delete(T_FUNDING);
                $raise = $db->where('funding_id', $id)->get(T_FUNDING_RAISE);
                $db->where('funding_id', $id)->delete(T_FUNDING_RAISE);
                $posts = $db->where('fund_id', $id)->get(T_POSTS);
                if (!empty($posts)) {
                    foreach ($posts as $key => $value) {
                        $db->where('parent_id', $value->id)->delete(T_POSTS);
                    }
                }
                $db->where('fund_id', $id)->delete(T_POSTS);
                foreach ($raise as $key => $value) {
                    $raise_posts = $db->where('fund_raise_id', $value->id)->get(T_POSTS);
                    if (!empty($raise_posts)) {
                        foreach ($posts as $key => $value1) {
                            $db->where('parent_id', $value1->id)->delete(T_POSTS);
                        }
                    }
                    $db->where('fund_raise_id', $value->id)->delete(T_POSTS);
                }
                $data['status'] = 200;
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_post' && lui_CheckSession($hash_id) === true) {
        if (!empty($_POST['post_id'])) {
            if (lui_DeletePost($_POST['post_id'])) {
                $data = array(
                    'status' => 200
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_reported_content' && (lui_IsAdmin() || lui_IsModerator())) {
        if (!empty($_GET['id']) && !empty($_GET['type']) && !empty($_GET['report_id'])) {
            $type   = lui_Secure($_GET['type']);
            $id     = lui_Secure($_GET['id']);
            $report = lui_Secure($_GET['report_id']);
            if ($type == 'post' && lui_DeletePost($id) === true) {
                $deleteReport = lui_DeleteReport($report);
                if ($deleteReport === true) {
                    $data = array(
                        'status' => 200,
                        'html' => lui_CountUnseenReports()
                    );
                }
            }
            if ($type == 'user' && lui_DeleteUser($id) === true) {
                $deleteReport = lui_DeleteReport($report);
                if ($deleteReport === true) {
                    $data = array(
                        'status' => 200,
                        'html' => lui_CountUnseenReports()
                    );
                }
            }
            if ($type == 'page' && lui_DeletePage($id) === true) {
                $deleteReport = lui_DeleteReport($report);
                if ($deleteReport === true) {
                    $data = array(
                        'status' => 200,
                        'html' => lui_CountUnseenReports()
                    );
                }
            }
            if ($type == 'group' && lui_DeleteGroup($id) === true) {
                $deleteReport = lui_DeleteReport($report);
                if ($deleteReport === true) {
                    $data = array(
                        'status' => 200,
                        'html' => lui_CountUnseenReports()
                    );
                }
            }
            if ($type == 'comment' && lui_DeletePostComment($id) === true) {
                $deleteReport = lui_DeleteReport($report);
                if ($deleteReport === true) {
                    $data = array(
                        'status' => 200,
                        'html' => lui_CountUnseenReports()
                    );
                }
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'mark_as_safe') {
        if (!empty($_GET['report_id'])) {
            $deleteReport = lui_DeleteReport($_GET['report_id']);
            if ($deleteReport === true) {
                $data = array(
                    'status' => 200,
                    'html' => lui_CountUnseenReports()
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_verification') {
        if (!empty($_GET['id'])) {
            if (lui_DeleteVerificationRequest($_GET['id']) === true) {
                $data = array(
                    'status' => 200
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_game') {
        if (!empty($_GET['game_id'])) {
            if (lui_DeleteGame($_GET['game_id']) === true) {
                $data = array(
                    'status' => 200
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_gift') {
        if (!empty($_GET['gift_id'])) {
            if (lui_DeleteGift($_GET['gift_id']) === true) {
                $data = array(
                    'status' => 200
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_sticker') {
        if (!empty($_GET['sticker_id'])) {
            if (lui_DeleteSticker($_GET['sticker_id']) === true) {
                $data = array(
                    'status' => 200
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'verify_user' && lui_CheckMainSession($hash_id) === true) {
        if (!empty($_GET['id'])) {
            $type = '';
            if (!empty($_GET['type'])) {
                $type = $_GET['type'];
            }
            if (lui_VerifyUser($_GET['id'], $_GET['verification_id'], $type) === true) {
                $data = array(
                    'status' => 200
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'send_mail_to_all_users') {
        $isset_test = 'off';
        if (empty($_POST['message']) || empty($_POST['subject'])) {
            $send_errors = $error_icon . $wo['lang']['please_check_details'];
        } else {
            if (!empty($_POST['test_message'])) {
                if ($_POST['test_message'] == 'on') {
                    $isset_test = 'on';
                }
            }
            if ($isset_test == 'on') {
                $send_message_data = array(
                    'from_email' => $wo['config']['siteEmail'],
                    'from_name' => $wo['config']['siteName'],
                    'to_email' => $wo['user']['email'],
                    'to_name' => $wo['user']['name'],
                    'subject' => $_POST['subject'],
                    'charSet' => 'utf-8',
                    'message_body' => $_POST['message'],
                    'is_html' => true
                );
                $send              = lui_SendMessage($send_message_data);
            } else {
                $users_type = 'all';
                $users      = array();
                if (isset($_POST['selected_emails']) && strlen($_POST['selected_emails']) > 0) {
                    $user_ids = explode(',', $_POST['selected_emails']);
                    if (is_array($user_ids) && count($user_ids) > 0) {
                        foreach ($user_ids as $user_id) {
                            $users[] = lui_UserData($user_id);
                        }
                    }
                } else if ($_POST['send_to'] == 'active') {
                    $users = lui_GetAllUsersByType('active');
                } else if ($_POST['send_to'] == 'inactive') {
                    $users = lui_GetAllUsersByType('inactive');
                }
                ob_end_clean();
                header("Content-Encoding: none");
                header("Connection: close");
                ignore_user_abort();
                ob_start();
                header('Content-Type: application/json');
                echo json_encode(array(
                    'status' => 300
                ));
                $size = ob_get_length();
                header("Content-Length: $size");
                ob_end_flush();
                flush();
                session_write_close();
                if (is_callable('fastcgi_finish_request')) {
                    fastcgi_finish_request();
                }
                if (is_callable('litespeed_finish_request')) {
                litespeed_finish_request();
            }
                foreach ($users as $user) {
                    $send_message_data = array(
                        'from_email' => $wo['config']['siteEmail'],
                        'from_name' => $wo['config']['siteName'],
                        'to_email' => $user['email'],
                        'to_name' => $user['name'],
                        'subject' => $_POST['subject'],
                        'charSet' => 'utf-8',
                        'message_body' => $_POST['message'],
                        'is_html' => true
                    );
                    $send              = lui_SendMessage($send_message_data);
                    $mail->ClearAddresses();
                }
            }
        }
        header("Content-type: application/json");
        if (!empty($send_errors)) {
            $send_errors_data = array(
                'status' => 400,
                'message' => $send_errors
            );
            echo json_encode($send_errors_data);
        } else {
            $data = array(
                'status' => 200
            );
            echo json_encode($data);
        }
        exit();
    }
    if ($s == 'send_mail_to_mock_users') {
        $isset_test = 'off';
        $types      = array(
            'week',
            'month',
            '3month',
            '6month',
            '9month',
            'year',
            'all',
            'active',
            'inactive',
        );
        if (empty($_POST['message']) || empty($_POST['subject']) || empty($_POST['send_to']) || !in_array($_POST['send_to'], $types)) {
            $send_errors = $error_icon . $wo['lang']['please_check_details'];
        } else {
            if (!empty($_POST['test_message'])) {
                if ($_POST['test_message'] == 'on') {
                    $isset_test = 'on';
                }
            }
            if ($isset_test == 'on') {
                $send_message_data = array(
                    'from_email' => $wo['config']['siteEmail'],
                    'from_name' => $wo['config']['siteName'],
                    'to_email' => $wo['user']['email'],
                    'to_name' => $wo['user']['name'],
                    'subject' => $_POST['subject'],
                    'charSet' => 'utf-8',
                    'message_body' => $_POST['message'],
                    'is_html' => true
                );
                $send              = lui_SendMessage($send_message_data);
            } else {
                $users = array();
                if (isset($_POST['selected_emails']) && strlen($_POST['selected_emails']) > 0) {
                    $user_ids = explode(',', $_POST['selected_emails']);
                    if (is_array($user_ids) && count($user_ids) > 0) {
                        foreach ($user_ids as $user_id) {
                            $users[] = lui_UserData($user_id);
                        }
                    }
                }
                 else if ($_POST['send_to'] == 'active') {
                    $users = lui_GetAllUsersByType('active');
                } else if ($_POST['send_to'] == 'inactive') {
                    $users = lui_GetAllUsersByType('inactive');
                } else if ($_POST['send_to'] == 'all') {
                    $users = lui_GetAllUsersByType('all');
                } else {
                    $users = lui_GetUsersByTime($_POST['send_to']);
                }
                ob_end_clean();
                header("Content-Encoding: none");
                header("Connection: close");
                ignore_user_abort();
                ob_start();
                header('Content-Type: application/json');
                echo json_encode(array(
                    'status' => 300
                ));
                $size = ob_get_length();
                header("Content-Length: $size");
                ob_end_flush();
                flush();
                session_write_close();
                if (is_callable('fastcgi_finish_request')) {
                    fastcgi_finish_request();
                }
                if (is_callable('litespeed_finish_request')) {
                    litespeed_finish_request();
                }
                foreach ($users as $user) {
                    $send_message_data = array(
                        'from_email' => $wo['config']['siteEmail'],
                        'from_name' => $wo['config']['siteName'],
                        'to_email' => $user['email'],
                        'to_name' => $user['name'],
                        'subject' => $_POST['subject'],
                        'charSet' => 'utf-8',
                        'message_body' => $_POST['message'],
                        'is_html' => true
                    );
                    $send              = lui_SendMessage($send_message_data);
                    $mail->ClearAddresses();
                }
            }
        }
        header("Content-type: application/json");
        if (!empty($send_errors)) {
            $send_errors_data = array(
                'status' => 400,
                'message' => $send_errors
            );
            echo json_encode($send_errors_data);
        } else {
            $data = array(
                'status' => 200
            );
            echo json_encode($data);
        }
        exit();
    }
    if ($s == 'get_users_emails' && isset($_GET['name'])) {
        $html  = '';
        $data  = array(
            'status' => 404
        );
        if (!empty($_GET['name'])) {
            $name  = lui_Secure($_GET['name']);
            $users = lui_GetUsersByName($name, false, 20);
            if (count($users) > 0) {
                foreach ($users as $user) {
                    $html .= "<p data-user='" . $user['user_id'] . "'>" . $user['username'] . "</p>";
                }
                $data['status'] = 200;
                $data['html']   = $html;
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'add_new_announcement') {
        if (!empty($_POST['announcement_text'])) {
            $html = '';
            $id   = lui_AddNewAnnouncement(base64_decode($_POST['announcement_text']));
            if ($id > 0) {
                $wo['activeAnnouncement'] = lui_GetAnnouncement($id);
                $html .= lui_LoadAdminPage('manage-announcements/active-list');
                $data = array(
                    'status' => 200,
                    'text' => $html
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_announcement') {
        if (!empty($_GET['id'])) {
            $DeleteAnnouncement = lui_DeleteAnnouncement($_GET['id']);
            if ($DeleteAnnouncement === true) {
                $data = array(
                    'status' => 200
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'disable_announcement') {
        if (!empty($_GET['id'])) {
            $html                = '';
            $DisableAnnouncement = lui_DisableAnnouncement($_GET['id']);
            if ($DisableAnnouncement === true) {
                $wo['inactiveAnnouncement'] = lui_GetAnnouncement($_GET['id']);
                $html .= lui_LoadAdminPage('manage-announcements/inactive-list');
                $data = array(
                    'status' => 200,
                    'html' => $html
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'activate_announcement') {
        if (!empty($_GET['id'])) {
            $html                 = '';
            $ActivateAnnouncement = lui_ActivateAnnouncement($_GET['id']);
            if ($ActivateAnnouncement === true) {
                $wo['activeAnnouncement'] = lui_GetAnnouncement($_GET['id']);
                $html .= lui_LoadAdminPage('manage-announcements/active-list');
                $data = array(
                    'status' => 200,
                    'html' => $html
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'update_ads') {
        $updated = false;
        foreach ($_POST as $key => $ads) {
            if ($key != 'hash_id') {
                $ad_data = array(
                    'type' => $key,
                    'code' => base64_decode($ads),
                    'active' => (empty($ads)) ? 0 : 1
                );
                $update  = lui_UpdateAdsCode($ad_data);
                if ($update) {
                    $updated = true;
                }
            }
        }
        if ($updated == true) {
            $data = array(
                'status' => 200
            );
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'update_ads_status') {
        if (!empty($_GET['type'])) {
            if (lui_UpdateAdActivation($_GET['type']) == 'active') {
                $data = array(
                    'status' => 200
                );
            } else {
                $data = array(
                    'status' => 300
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'agregar_sucursal') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (isset($_FILES['media_file'])) {
            if(!empty($_FILES['media_file']["tmp_name"])){
                $filename = "";
                $fileInfo = array(
                    'file' => $_FILES["media_file"]["tmp_name"],
                    'name' => $_FILES['media_file']['name'],
                    'size' => $_FILES["media_file"]["size"],
                    'type' => $_FILES["media_file"]["type"],
                    'types' => 'jpg,png,gif,jpeg'
                );
                $media    = lui_ShareFile($fileInfo,0,false);
                if (!empty($media)) {
                    $filename = $media['filename'];
                }

                $name = lui_Secure($_POST['nombre']);
                $pais = lui_Secure($_POST['pais']);
                $ciudad = lui_Secure($_POST['ciudad']);
                $direccion = lui_Secure($_POST['direccion']);
                $referencia = lui_Secure($_POST['referencia']);
                $phone = lui_Secure($_POST['phone']);
                $media_file = lui_Secure($filename);

                $query  = mysqli_query($sqlConnect, "INSERT INTO lui_sucursales (`nombre`,`pais`, `ciudad`, `direccion`, `referencia`, `phone`, `foto`, `time`) VALUES ('".$name."','".$pais."','".$ciudad."','".$direccion."','".$referencia."','".$phone."','".$media_file."','".time()."')");
                if ($query) {
                    $data = array(
                        'status' => 200
                    );
                } else {
                    $data['status']  = 400;
                    $data['message'] = 'Por favor comprueba tus detalles';
                }
            }else{
                $data['status']  = 400;
                $data['message'] = 'Por favor comprueba tus detalles';
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'get_sucursales_form') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (!empty($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0) {
            $id       = lui_Secure($_POST['id']);
            $sucursal = $db->where('id', $id)->getOne('lui_sucursales');
            $html     = '';
            if (!empty($sucursal)) {
                $wo['id']   = $sucursal->id;
                $wo['nombre'] = $sucursal->nombre;
                $wo['ciudad'] = $sucursal->ciudad;
                $wo['direccion'] = $sucursal->direccion;
                $wo['referencia'] = $sucursal->referencia;
                $wo['phone'] = $sucursal->phone;
                $wo['foto'] = $sucursal->foto;
                $html                = lui_LoadAdminPage('administrar-sucursales/form');
                $data                = array(
                    'status' => 200,
                    'html' => $html
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'edit_sucursal') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (!empty($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0) {
            $id       = lui_Secure($_POST['id']);
            $nombre       = lui_Secure($_POST['nombre']);
            $pais       = lui_Secure($_POST['pais']);
            $ciudad       = lui_Secure($_POST['ciudad']);
            $direccion       = lui_Secure($_POST['direccion']);
            $referencia       = lui_Secure($_POST['referencia']);
            $phone       = lui_Secure($_POST['phone']);

            $sucursales = $db->where('id', $id)->getOne('lui_sucursales');
            if (!empty($sucursales)) {
                $update_data = array();

                $update_data['nombre'] = $nombre;
                $update_data['pais'] = $pais;
                $update_data['ciudad'] = $ciudad;
                $update_data['direccion'] = $direccion;
                $update_data['referencia'] = $referencia;
                $update_data['phone'] = $phone;

                if (!empty($_FILES['media_file'])) {
                    $cover = getimagesize($_FILES["media_file"]["tmp_name"]);
                    if ($cover[0] > 720 || $cover[1] > 720) {
                        $data['status']  = 400;
                        $data['message'] = $error_icon . " El tamaño de la imagen de layshane no debe ser superior a 720x720 ";
                        header("Content-type: application/json");
                        echo json_encode($data);
                        exit();
                    }
                    $fileInfo = array(
                        'file' => $_FILES["media_file"]["tmp_name"],
                        'name' => $_FILES['media_file']['name'],
                        'size' => $_FILES["media_file"]["size"],
                        'type' => $_FILES["media_file"]["type"],
                        'types' => 'jpeg,png,jpg,gif,svg'
                    );
                    $media    = lui_ShareFile($fileInfo, true);
                    if (!empty($media) && !empty($media['filename'])) {
                        $update_data['foto'] = $media['filename'];
                    } else {
                        $data['status']  = 400;
                        $data['message'] = $error_icon . " El tipo de imagen de layshane debe ser png ";
                        header("Content-type: application/json");
                        echo json_encode($data);
                        exit();
                    }
                }
         
                if (!empty($update_data)) {
                    $db->where('id', $id)->update('lui_sucursales', $update_data);
                }
                $data = array(
                    'status' => 200
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'delete_sucursal') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (!empty($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0) {
            $id       = lui_Secure($_POST['id']);
            $sucursal = $db->where('id', $id)->getOne('lui_sucursales');
        
                $explode2       = @end(explode('.', $sucursal->foto));
                $explode3       = @explode('.', $sucursal->foto);
                $foto_small = $explode3[0] . '_small.' . $explode2;
            
                if (file_exists($foto_small)) {
                    @unlink(trim($foto_small));
                } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                    @lui_DeleteFromToS3($foto_small);
                }
        
                if (file_exists($sucursal->foto)) {
                    @unlink(trim($sucursal->foto));
                } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                    @lui_DeleteFromToS3($sucursal->foto);
                }
                
                $db->where('id', $id)->delete('lui_sucursales');
                $data = array(
                    'status' => 200
                );
            
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'agregar_proveedores') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (isset($_FILES['media_file'])) {
            if(!empty($_FILES['media_file']["tmp_name"])){
                $filename = "";
                $fileInfo = array(
                    'file' => $_FILES["media_file"]["tmp_name"],
                    'name' => $_FILES['media_file']['name'],
                    'size' => $_FILES["media_file"]["size"],
                    'type' => $_FILES["media_file"]["type"],
                    'types' => 'jpg,png,gif,jpeg'
                );
                $media    = lui_ShareFile($fileInfo,0,false);
                if (!empty($media)) {
                    $filename = $media['filename'];
                }

                $razon_social = lui_Secure($_POST['nombre']);
                $ruc = lui_Secure($_POST['ruc']);
                $phone = lui_Secure($_POST['phone']);
                $media_file = lui_Secure($filename);

                $query  = mysqli_query($sqlConnect, "INSERT INTO lui_proveedores (`razon_social`, `ruc`, `phone`, `logo`, `time`) VALUES ('".$razon_social."','".$ruc."','".$phone."','".$media_file."','".time()."')");
                if ($query) {
                    $data = array(
                        'status' => 200
                    );
                } else {
                    $data['status']  = 400;
                    $data['message'] = 'Por favor comprueba tus detalles';
                }
            }else{
                $data['status']  = 400;
                $data['message'] = 'Por favor comprueba tus detalles';
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'get_proveedores_form') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (!empty($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0) {
            $id       = lui_Secure($_POST['id']);
            $proveedorss = $db->where('id', $id)->getOne('lui_proveedores');
            $html     = '';
            if (!empty($proveedorss)) {
                $wo['id']   = $proveedorss->id;
                $wo['nombre'] = $proveedorss->razon_social;
                $wo['ruc'] = $proveedorss->ruc;
                $wo['phone'] = $proveedorss->phone;
                $wo['logo'] = $proveedorss->logo;
                $html                = lui_LoadAdminPage('proveedores/form');
                $data                = array(
                    'status' => 200,
                    'html' => $html
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'get_sucursalesproveedores_form') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (!empty($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0) {
            $id       = lui_Secure($_POST['id']);
            $proveedorss = $db->where('id', $id)->getOne('lui_proveedores');
            $html     = '';
            if (!empty($proveedorss)) {
                $wo['id']   = $proveedorss->id;
                $wo['sucursalproveedoreslista'] = lui_GetProveedoresSucursal($proveedorss->id);
                $html                = lui_LoadAdminPage('proveedores/sucursaleslista');
                $data                = array(
                    'status' => 200,
                    'html' => $html
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    

    if ($s == 'get_sucursalproveedores_form') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (!empty($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0) {
            $id       = lui_Secure($_POST['id']);
            $proveedorss = $db->where('id', $id)->getOne('lui_proveedores');
            $html     = '';
            if (!empty($proveedorss)) {
                $wo['id']   = $proveedorss->id;
                $html                = lui_LoadAdminPage('proveedores/sucursalform');
                $data                = array(
                    'status' => 200,
                    'html' => $html
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'get_sucursal_proveedores_form_lista') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (!empty($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0) {
            $id       = lui_Secure($_POST['id']);
            $proveedorss = $db->where('id', $id)->getOne('sucursal_proveedor');
            $html     = '';
            if (!empty($proveedorss)) {
                $wo['datos_para_editar_sucursal'] = $db->where('id', $id)->getOne('sucursal_proveedor');
                
                $html                = lui_LoadAdminPage('proveedores/get_sucursal_proveedores_form');
                $data                = array(
                    'status' => 200,
                    'html' => $html
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'edit_proveedores_sucursales') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (!empty($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0) {
            $id       = lui_Secure($_POST['id']);
            $pais       = lui_Secure($_POST['pais_u']);
            $departamento       = lui_Secure($_POST['departamento_u']);
            $provincia       = lui_Secure($_POST['provincia_u']);
            $distrito       = lui_Secure($_POST['distrito_u']);
            $direccion       = lui_Secure($_POST['direccion_u']);
            $contacto       = lui_Secure($_POST['contacto_u']);
            $correo       = lui_Secure($_POST['correo_u']);

            $proveedorss = $db->where('id', $id)->getOne('sucursal_proveedor');
            $html     = '';
            if (!empty($proveedorss)) {
                $update_sucursal_proveedor = array();
                $update_sucursal_proveedor['pais'] = $pais;
                $update_sucursal_proveedor['departamento'] = $departamento;
                $update_sucursal_proveedor['provincia'] = $provincia;
                $update_sucursal_proveedor['distrito'] = $distrito;
                $update_sucursal_proveedor['direccion'] = $direccion;
                $update_sucursal_proveedor['contacto'] = $contacto;
                $update_sucursal_proveedor['correo'] = $correo;

                
                if (!empty($update_sucursal_proveedor)) {
                    $db->where('id', $id)->update('sucursal_proveedor', $update_sucursal_proveedor);
                }

                $data                = array(
                    'status' => 200,
                    'html' => $html
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'agregar_proveedores_sucursal'){
            $id_proveedor = lui_Secure($_POST['id']);
            $pais = lui_Secure($_POST['pais']);
            $departamento = lui_Secure($_POST['departamento']);
            $provincia = lui_Secure($_POST['provincia']);
            $distrito = lui_Secure($_POST['distrito']);
            $direccion = lui_Secure($_POST['direccion']);
            $contacto = lui_Secure($_POST['contacto']);
            $correo = lui_Secure($_POST['correo']);

            $query  = mysqli_query($sqlConnect, "INSERT INTO sucursal_proveedor (`id_proveedor`, `pais`, `departamento`, `provincia`, `distrito`, `direccion`, `contacto`, `correo`) VALUES ('".$id_proveedor."','".$pais."','".$departamento."','".$provincia."','".$distrito."','".$direccion."','".$contacto."','".$correo."')");
            if ($query) {
                $data = array(
                    'status' => 200
                );
            } else{
                $data['status']  = 400;
                $data['message'] = 'Por favor comprueba tus detalles';
            }
                 
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'edit_proveedores') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (!empty($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0) {
            $id       = lui_Secure($_POST['id']);
            $razon_social       = lui_Secure($_POST['nombre']);
            $ruc       = lui_Secure($_POST['ruc']);
            $phone       = lui_Secure($_POST['phone']);

            $sucursales = $db->where('id', $id)->getOne('lui_proveedores');
            if (!empty($sucursales)) {
                $update_data = array();

                $update_data['razon_social'] = $razon_social;
                $update_data['ruc'] = $ruc;
                $update_data['phone'] = $phone;

                if (!empty($_FILES['media_file'])) {
                    $cover = getimagesize($_FILES["media_file"]["tmp_name"]);
                    if ($cover[0] > 720 || $cover[1] > 720) {
                        $data['status']  = 400;
                        $data['message'] = $error_icon . " El tamaño de la imagen de layshane no debe ser superior a 720x720 ";
                        header("Content-type: application/json");
                        echo json_encode($data);
                        exit();
                    }
                    $fileInfo = array(
                        'file' => $_FILES["media_file"]["tmp_name"],
                        'name' => $_FILES['media_file']['name'],
                        'size' => $_FILES["media_file"]["size"],
                        'type' => $_FILES["media_file"]["type"],
                        'types' => 'jpeg,png,jpg,gif,svg'
                    );
                    $media    = lui_ShareFile($fileInfo, true);
                    if (!empty($media) && !empty($media['filename'])) {
                        $update_data['logo'] = $media['filename'];
                    } else {
                        $data['status']  = 400;
                        $data['message'] = $error_icon . " El tipo de imagen de layshane debe ser png ";
                        header("Content-type: application/json");
                        echo json_encode($data);
                        exit();
                    }
                }
         
                if (!empty($update_data)) {
                    $db->where('id', $id)->update('lui_proveedores', $update_data);
                }
                $data = array(
                    'status' => 200
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'delete_proveedores') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (!empty($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0) {
            $id       = lui_Secure($_POST['id']);
            $proveedorss = $db->where('id', $id)->getOne('lui_proveedores');
        
                $explode2       = @end(explode('.', $proveedorss->logo));
                $explode3       = @explode('.', $proveedorss->logo);
                $logo_small = $explode3[0] . '_small.' . $explode2;
            
                if (file_exists($logo_small)) {
                    @unlink(trim($logo_small));
                } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                    @lui_DeleteFromToS3($logo_small);
                }
        
                if (file_exists($proveedorss->logo)) {
                    @unlink(trim($proveedorss->logo));
                } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                    @lui_DeleteFromToS3($proveedorss->logo);
                }
                
                $db->where('id', $id)->delete('lui_proveedores');
                $data = array(
                    'status' => 200
                );
            
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'eliminar_sucursal_proveedor') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (!empty($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0) {
            $id       = lui_Secure($_POST['id']);
            $proveedorss = $db->where('id', $id)->getOne('sucursal_proveedor');
            $db->where('id', $id)->delete('sucursal_proveedor');
            $data = array(
                'status' => 200
            );
            
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    
    if ($s == 'seleccionar_el_color_producto') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (!empty($_POST['colorid']) && is_numeric($_POST['colorid']) && $_POST['colorid'] > 0) {
            $id       = lui_Secure($_POST['colorid']);
            $producto       = lui_Secure($_POST['producto']);
            $colores_pruducto = $db->where('id_color', $id)->where('id_producto', $producto)->getOne('lui_opcion_de_colores_productos');
            if (!empty($colores_pruducto)) {
                $wo['precio_adicional'] = $colores_pruducto->precio_adicional;
                $data = array(
                    'precio' => $wo['precio_adicional'],
                    'status' => 200,
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'buscar_colores_de_producto') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (!empty($_POST['producto']) && is_numeric($_POST['producto']) && $_POST['producto'] > 0) {
            $id       = lui_Secure($_POST['producto']);
            $colores_pruducto = $db->where('id_producto', $id)->getOne('lui_opcion_de_colores_productos');
            if (!empty($colores_pruducto)) {
                $data                = array(
                    'status' => 200,
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }


    if ($s == 'get_editar_producto_form') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (!empty($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0) {
            $product = $wo['product'] = lui_GetProduct($_POST['id']);
            $html     = 'ww';
            if (!empty($wo['product']['id'])) {
                $wo['id']   = $wo['product']['id'];
                $html                = lui_LoadAdminPage('manage-products/editar_producto');
                $data                = array(
                    'status' => 200,
                    'html' => $html
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'get_custom_producto_info') {
        $placement_array = array(
            'page',
            'group',
            'product'
        );
        if (lui_CheckMainSession($hash_id) === true && !empty($_POST['id']) && !empty($_POST['type']) && in_array($_POST['type'], $placement_array)) {
            $producto = $db->where('id', lui_Secure($_POST['id']))->getOne(T_PRODUCTS);
            $product = $wo['product'] = lui_GetProduct($_POST['id']);
            $html  = '';
            if (!empty($producto) and !empty($wo['product']['id'])) {
                $wo['id']   = $wo['product']['id'];
                $wo['producto'] = $producto;
                $html        = lui_LoadAdminPage('manage-products/form');
            }
            $data = array(
                'status' => 200,
                'html' => $html
            );
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'agregar_unidadmedida') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        $name = lui_Secure($_POST['nombre']);
               
        $query  = mysqli_query($sqlConnect, "INSERT INTO lui_unidad_medida (`nombre`, `time`) VALUES ('".$name."','".time()."')");
        if ($query) {
            $data = array(
                'status' => 200
            );
        } else {
            $data['status']  = 400;
            $data['message'] = 'Por favor comprueba tus detalles';
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'get_unidadmedida_form') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (!empty($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0) {
            $id       = lui_Secure($_POST['id']);
            $sucursal = $db->where('id', $id)->getOne('lui_unidad_medida');
            $html     = '';
            if (!empty($sucursal)) {
                $wo['id']   = $sucursal->id;
                $wo['nombre'] = $sucursal->nombre;
                $html                = lui_LoadAdminPage('unidad-medidad/form');
                $data                = array(
                    'status' => 200,
                    'html' => $html
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }


    if ($s == 'edit_unidadmedida') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (!empty($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0) {
            $id       = lui_Secure($_POST['id']);
            $nombre       = lui_Secure($_POST['nombre']);

            $unodadmedida = $db->where('id', $id)->getOne('lui_unidad_medida');
            if (!empty($unodadmedida)) {
                $update_data = array();

                $update_data['nombre'] = $nombre;

                if (!empty($update_data)) {
                    $db->where('id', $id)->update('lui_unidad_medida', $update_data);
                }
                $data = array(
                    'status' => 200
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'delete_unidadmedida') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (!empty($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0) {
            $id       = lui_Secure($_POST['id']);
            $db->where('id', $id)->delete('lui_unidad_medida');
            $data = array(
                'status' => 200
            );
        }

        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }

    if ($s == 'add_reaction') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (!empty($_FILES['layshane'])) {
            $layshane_image = '';
            $sunshine_image = '';
            $add            = false;
            $insert_data    = array();
            foreach (lui_LangsNamesFromDB() as $key => $lang) {
                if (!empty($_POST[$lang])) {
                    $insert_data[$lang] = lui_Secure($_POST[$lang]);
                    $add                = true;
                }
            }
            if ($add == true && !empty($insert_data)) {
                $id = $db->insert(T_LANGS, $insert_data);
                $db->where('id', $id)->update(T_LANGS, array(
                    'lang_key' => $id
                ));
                $data = array(
                    'status' => 200
                );
            }
            if ($add == true) {
                if (!empty($_FILES['layshane'])) {
                    $cover = getimagesize($_FILES["layshane"]["tmp_name"]);
                    if ($cover[0] > 48 || $cover[1] > 48) {
                        $data['status']  = 400;
                        $data['message'] = $error_icon . " el tamaño de la imagen de layshane no debe ser superior a 48x48";
                        header("Content-type: application/json");
                        echo json_encode($data);
                        exit();
                    }
                    $fileInfo = array(
                        'file' => $_FILES["layshane"]["tmp_name"],
                        'name' => $_FILES['layshane']['name'],
                        'size' => $_FILES["layshane"]["size"],
                        'type' => $_FILES["layshane"]["type"],
                        'types' => 'png'
                    );
                    $media    = lui_ShareFile($fileInfo, true);
                    if (!empty($media) && !empty($media['filename'])) {
                        $layshane_image = $media['filename'];
                    } else {
                        $data['status']  = 400;
                        $data['message'] = $error_icon . " layshane el tipo de imagen debe ser png ";
                        header("Content-type: application/json");
                        echo json_encode($data);
                        exit();
                    }
                }
                if (!empty($layshane_image)) {
                    $db->insert(T_REACTIONS_TYPES, array(
                        'name' => $id,
                        'layshane_star' => $layshane_image,
                    ));
                    $data = array(
                        'status' => 200
                    );
                } else {
                    $data['message'] = 'Tipo de imagen no valido';
                }
            } else {
                $data['status']  = 400;
                $data['message'] = 'Por favor comprueba tus detalles';
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'reaction_status') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (!empty($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0) {
            $active_reactions = $db->where('status', 1)->getValue(T_REACTIONS_TYPES, 'COUNT(*)');
            if ($active_reactions > 0) {
                $id       = lui_Secure($_POST['id']);
                $reaction = $db->where('id', $id)->getOne(T_REACTIONS_TYPES);
                if (!empty($reaction)) {
                    $status = 1;
                    if ($reaction->status == 1) {
                        $status = 0;
                    }
                    if ($active_reactions == 1 && $status == 0) {
                        $data['message'] = 'No puedes deshabilitar todas las reacciones.';
                    } else {
                        $db->where('id', $id)->update(T_REACTIONS_TYPES, array(
                            'status' => $status
                        ));
                        $data = array(
                            'status' => 200
                        );
                    }
                }
            } else {
                $data['message'] = 'No puedes deshabilitar todas las reacciones.';
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_reaction') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (!empty($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0) {
            $id       = lui_Secure($_POST['id']);
            $reaction = $db->where('id', $id)->getOne(T_REACTIONS_TYPES);
            if ($id > 6 && !empty($reaction)) {
                $explode2       = @end(explode('.', $reaction->layshane_star));
                $explode3       = @explode('.', $reaction->layshane_star);
                $wowonder_small = $explode3[0] . '_small.' . $explode2;
                $explode2       = @end(explode('.', $reaction->sunshine_icon));
                $explode3       = @explode('.', $reaction->sunshine_icon);
                $sunshine_small = $explode3[0] . '_small.' . $explode2;
                if (file_exists($wowonder_small)) {
                    @unlink(trim($wowonder_small));
                } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                    @lui_DeleteFromToS3($wowonder_small);
                }
                if (file_exists($sunshine_small)) {
                    @unlink(trim($sunshine_small));
                } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                    @lui_DeleteFromToS3($sunshine_small);
                }
                if (file_exists($reaction->layshane_star)) {
                    @unlink(trim($reaction->layshane_star));
                } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                    @lui_DeleteFromToS3($reaction->layshane_star);
                }
                if (file_exists($reaction->sunshine_icon)) {
                    @unlink(trim($reaction->sunshine_icon));
                } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                    @lui_DeleteFromToS3($reaction->sunshine_icon);
                }
                $db->where('lang_key', $reaction->name)->delete(T_LANGS);
                $db->where('reaction', $id)->delete(T_REACTIONS);
                $db->where('reaction', $id)->delete(T_BLOG_REACTION);
                $db->where('id', $id)->delete(T_REACTIONS_TYPES);
                $data = array(
                    'status' => 200
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'get_reaction_form') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (!empty($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0) {
            $id       = lui_Secure($_POST['id']);
            $reaction = $db->where('id', $id)->getOne(T_REACTIONS_TYPES);
            $html     = '';
            if (!empty($reaction)) {
                $lang_html = '';
                $langs     = lui_GetLangDetails($reaction->name);
                if (count($langs) > 0) {
                    foreach ($langs as $key => $wo['langs']) {
                        foreach ($wo['langs'] as $wo['key_'] => $wo['lang_vlaue']) {
                            $lang_html .= lui_LoadAdminPage('edit-lang/form-list');
                        }
                    }
                }
                $wo['reaction_name'] = $lang_html;
                $wo['reaction_id']   = $reaction->id;
                $wo['layshane_star'] = $reaction->layshane_star;
                $wo['sunshine_icon'] = $reaction->sunshine_icon;
                $html                = lui_LoadAdminPage('administrar-reacciones/form');
                $data                = array(
                    'status' => 200,
                    'html' => $html
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'edit_reaction') {
        $data['status']  = 400;
        $data['message'] = 'Por favor comprueba tus detalles';
        if (!empty($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0) {
            $id       = lui_Secure($_POST['id']);
            $reaction = $db->where('id', $id)->getOne(T_REACTIONS_TYPES);
            if (!empty($reaction)) {
                $lang_key = $reaction->name;
                $langs    = lui_LangsNamesFromDB();
                foreach ($_POST as $key => $value) {
                    if (in_array($key, $langs)) {
                        $key   = lui_Secure($key);
                        $value = lui_Secure($value);
                        $query = mysqli_query($sqlConnect, "UPDATE " . T_LANGS . " SET `{$key}` = '{$value}' WHERE `lang_key` = '{$lang_key}'");
                    }
                }
                $update_data = array();
                if (!empty($_FILES['layshane'])) {
                    $cover = getimagesize($_FILES["layshane"]["tmp_name"]);
                    if ($cover[0] > 48 || $cover[1] > 48) {
                        $data['status']  = 400;
                        $data['message'] = $error_icon . " El tamaño de la imagen de layshane no debe ser superior a 48x48 ";
                        header("Content-type: application/json");
                        echo json_encode($data);
                        exit();
                    }
                    $fileInfo = array(
                        'file' => $_FILES["layshane"]["tmp_name"],
                        'name' => $_FILES['layshane']['name'],
                        'size' => $_FILES["layshane"]["size"],
                        'type' => $_FILES["layshane"]["type"],
                        'types' => 'jpeg,png,jpg,gif,svg'
                    );
                    $media    = lui_ShareFile($fileInfo, true);
                    if (!empty($media) && !empty($media['filename'])) {
                        $update_data['layshane_star'] = $media['filename'];
                    } else {
                        $data['status']  = 400;
                        $data['message'] = $error_icon . " El tipo de imagen de layshane debe ser png ";
                        header("Content-type: application/json");
                        echo json_encode($data);
                        exit();
                    }
                }
                if (!empty($_POST['wowonder_to_use']) && $_POST['wowonder_to_use'] == 1) {
                    $explode2       = @end(explode('.', $reaction->layshane_star));
                    $explode3       = @explode('.', $reaction->layshane_star);
                    $wowonder_small = $explode3[0] . '_small.' . $explode2;
                    if (file_exists($reaction->layshane_star)) {
                        @unlink(trim($reaction->layshane_star));
                    } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                        @lui_DeleteFromToS3($reaction->layshane_star);
                    }
                    if (file_exists($wowonder_small)) {
                        @unlink(trim($wowonder_small));
                    } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                        @lui_DeleteFromToS3($wowonder_small);
                    }
                    $update_data['layshane_star'] = '';
                }
                if (!empty($update_data)) {
                    $db->where('id', $id)->update(T_REACTIONS_TYPES, $update_data);
                }
                $data = array(
                    'status' => 200
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'add_new_sub_category') {
        $data['status']  = 400;
        $data['message'] = 'Por favor revisa los detalles. ';
        $types           = array(
            'page',
            'group',
            'product'
        );
        $all_categories  = array(
            'page' => $wo['page_categories'],
            'group' => $wo['group_categories'],
            'product' => $wo['products_categories']
        );
        if (!empty($_GET['type']) && in_array($_GET['type'], $types) && in_array($_GET['type'], array_keys($all_categories)) && !empty($_POST['category_id']) && in_array($_POST['category_id'], array_keys($all_categories[$_GET['type']]))) {
            $type        = lui_Secure($_GET['type']);
            $add         = false;
            $insert_data = array();
            foreach (lui_LangsNamesFromDB() as $key => $lang) {
                if (!empty($_POST[$lang])) {
                    $insert_data[$lang] = lui_Secure($_POST[$lang]);
                    $add                = true;
                }
            }
            if ($add == true && !empty($insert_data)) {
                $id = $db->insert(T_LANGS, $insert_data);

                if (isset($_FILES['media_file'])) {
                        if(!empty($_FILES['media_file']["tmp_name"])){
                            $filename = "";
                            $fileInfo = array(
                                'file' => $_FILES["media_file"]["tmp_name"],
                                'name' => $_FILES['media_file']['name'],
                                'size' => $_FILES["media_file"]["size"],
                                'type' => $_FILES["media_file"]["type"],
                                'types' => 'jpg,png,gif,jpeg',
                                'crop' => array(
                                    'width' => 280,
                                    'height' => 290
                                )
                            );
                            $media    = lui_ShareFile($fileInfo,0,false);
                            if (!empty($media)) {
                                $filename = $media['filename'];
                            }
                            $media_file = lui_Secure($filename);
                            $imagen_de_categoria = $media_file;
                        }else{
                            $data['status']  = 400;
                            $data['message'] = 'Por favor comprueba tus detalles';
                        }
                    }else{
                        $imagen_de_categoria = "upload/photos/n_layshane_peru.png";
                    }


                $db->insert(T_SUB_CATEGORIES, array(
                    'lang_key' => $id,
                    'category_id' => lui_Secure($_POST['category_id']),
                    'type' => $type,
                    'logo' => $imagen_de_categoria
                ));
                $db->where('id', $id)->update(T_LANGS, array(
                    'lang_key' => $id
                ));
                $data = array(
                    'status' => 200
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_sub_category' && !empty($_POST['lang_key'])) {
        $types = array(
            'page',
            'group',
            'product'
        );
        if (!empty($_GET['type']) && in_array($_GET['type'], $types)) {
            $lang_key = lui_Secure($_POST['lang_key']);
            $category = $db->where('lang_key', $lang_key)->where('type', lui_Secure($_GET['type']))->getOne(T_SUB_CATEGORIES);
            if (!empty($category)) {
                $db->where('lang_key', $lang_key)->delete(T_LANGS);
                $db->where('id', $category->id)->delete(T_SUB_CATEGORIES);
                if ($_GET['type'] == 'page') {
                    $db->where('sub_category', $category->id)->update(T_PAGES, array(
                        'sub_category' => ''
                    ));
                }
                if ($_GET['type'] == 'group') {
                    $db->where('sub_category', $category->id)->update(T_GROUPS, array(
                        'sub_category' => ''
                    ));
                }
                if ($_GET['type'] == 'product') {
                        ////
                            $link = $category->logo;
                            if($category->logo=="upload/photos/d-avatar.jpg") {
                            }elseif($category->logo=="upload/photos/n_layshane_peru.png") {
                            }else{
                                if (file_exists($link)) {
                                    @unlink(trim($link));
                                } else if ($wo['config']['amazone_s3'] == 1 || $wo['config']['wasabi_storage'] == 1 || $wo['config']['ftp_upload'] == 1 || $wo['config']['backblaze_storage'] == 1) {
                                    @lui_DeleteFromToS3($link);
                                }
                            }
                            
                        /////

                    $db->where('sub_category', $category->id)->update(T_PRODUCTS, array(
                        'sub_category' => ''
                    ));
                }
                $data['status'] = 200;
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'add_custom_field_form') {
        $placement_array = array(
            'page',
            'group',
            'product'
        );
        $types_array     = array(
            'textbox',
            'textarea',
            'selectbox'
        );
        if (lui_CheckSession($hash_id) === true && !empty($_POST['name']) && !empty($_POST['type']) && !empty($_POST['description']) && !empty($_POST['placement']) && in_array($_POST['type'], $types_array)) {
            $type        = lui_Secure($_POST['type']);
            $name        = lui_Secure($_POST['name']);
            $description = lui_Secure($_POST['description']);
            $placement   = lui_Secure($_POST['placement']);
            $length      = 32;
            if (!empty($_POST['length'])) {
                if (is_numeric($_POST['length']) && $_POST['length'] < 1001) {
                    $length = lui_Secure($_POST['length']);
                }
            }
            $required = 'on';
            if (!empty($_POST['required']) && in_array($_POST['required'], array(
                'on',
                'off'
            ))) {
                $required = lui_Secure($_POST['required']);
            }
            $data_ = array(
                'name' => $name,
                'description' => $description,
                'length' => $length,
                'placement' => $placement,
                'required' => $required,
                'type' => $type,
                'active' => 1
            );
            if (!empty($_POST['options'])) {
                $options          = @explode("\n", $_POST['options']);
                $data_['options'] = lui_Secure(implode(',', $options));
            }
            $add = lui_RegisterNewCustomField($data_);
            if ($add) {
                $data['status'] = 200;
            }
        } else {
            $data = array(
                'status' => 400,
                'message' => 'Please fill all the required fields'
            );
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_custom_field') {
        $placement_array = array(
            'page',
            'group',
            'product'
        );
        if (lui_CheckMainSession($hash_id) === true && !empty($_GET['id']) && !empty($_GET['type']) && in_array($_GET['type'], $placement_array)) {
            $delete = lui_DeleteCustomField($_GET['id'], $_GET['type']);
            if ($delete) {
                $data = array(
                    'status' => 200
                );
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'get_custom_field_info') {
        $placement_array = array(
            'page',
            'group',
            'product'
        );
        if (lui_CheckMainSession($hash_id) === true && !empty($_POST['id']) && !empty($_POST['type']) && in_array($_POST['type'], $placement_array)) {
            $field = $db->where('id', lui_Secure($_POST['id']))->where('placement', lui_Secure($_POST['type']))->getOne(T_CUSTOM_FIELDS);
            $html  = '';
            if (!empty($field)) {
                $wo['field'] = $field;
                $html        = lui_LoadAdminPage('pages-fields/form');
            }
            $data = array(
                'status' => 200,
                'html' => $html
            );
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'edit_custom_field_form') {
        $placement_array = array(
            'page',
            'group',
            'product'
        );
        $types_array     = array(
            'textbox',
            'textarea',
            'selectbox'
        );
        if (lui_CheckSession($hash_id) === true && !empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['id']) && !empty($_POST['type']) && !empty($_POST['placement']) && in_array($_POST['type'], $types_array)) {
            $field = $db->where('id', lui_Secure($_POST['id']))->where('placement', lui_Secure($_POST['placement']))->getOne(T_CUSTOM_FIELDS);
            if (!empty($field)) {
                $name        = lui_Secure($_POST['name']);
                $description = lui_Secure($_POST['description']);
                $type        = lui_Secure($_POST['type']);
                $placement   = lui_Secure($_POST['placement']);
                $length      = 32;
                if (!empty($_POST['length'])) {
                    if (is_numeric($_POST['length']) && $_POST['length'] < 1001) {
                        $length = lui_Secure($_POST['length']);
                    }
                }
                $required = 'on';
                if (!empty($_POST['required']) && in_array($_POST['required'], array(
                    'on',
                    'off'
                ))) {
                    $required = lui_Secure($_POST['required']);
                }
                $data_ = array(
                    'name' => $name,
                    'description' => $description,
                    'length' => $length,
                    'placement' => $placement,
                    'required' => $required,
                    'type' => $type,
                    'active' => 1
                );
                if (!empty($_POST['options'])) {
                    $options          = @explode("\n", $_POST['options']);
                    $data_['options'] = lui_Secure(implode(',', $options));
                }
                $add = lui_UpdateCustomField(lui_Secure($_POST['id']), $data_);
                if ($add) {
                    $data['status'] = 200;
                } else {
                    $data = array(
                        'status' => 400,
                        'message' => 'Please fill all the required fields'
                    );
                }
            } else {
                $data = array(
                    'status' => 400,
                    'message' => 'Please fill all the required fields'
                );
            }
        } else {
            $data = array(
                'status' => 400,
                'message' => 'Please fill all the required fields'
            );
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'approve_blog') {
        if (!empty($_POST['blog_id'])) {
            $post = $db->where('id', lui_Secure($_POST['blog_id']))->getOne(T_BLOG);
            if (!empty($post)) {
                $db->where('id', lui_Secure($_POST['blog_id']))->update(T_BLOG, array(
                    'active' => '1'
                ));
                $db->where('blog_id', lui_Secure($_POST['blog_id']))->update(T_POSTS, array(
                    'active' => 1
                ));
                $b_post = $db->where('blog_id', lui_Secure($_POST['blog_id']))->getOne(T_POSTS);
                if (!empty($b_post)) {
                    lui_RegisterPoint($b_post->id, "createblog", '+', $b_post->user_id);
                }
                $notification_data_array = array(
                    'recipient_id' => $post->user,
                    'type' => 'admin_notification',
                    'url' => 'index.php?link1=read-blog&id=' . $post->id,
                    'text' => $wo['lang']['approve_blog'],
                    'type2' => 'approve_blog'
                );
                lui_RegisterNotification($notification_data_array);
            }
        }
        $data['status'] = 200;
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_refund') {
        if (!empty($_GET['id'])) {
            $request = $db->where('id', lui_Secure($_GET['id']))->getOne(T_REFUND);
            $db->where('id', lui_Secure($_GET['id']))->delete(T_REFUND);
            $data = array(
                'status' => 200
            );
            if (empty($request->order_hash_id)) {
                $notification_data_array = array(
                    'recipient_id' => $request->user_id,
                    'type' => 'admin_notification',
                    'url' => 'index.php?link1=home',
                    'text' => $wo['lang']['refund_decline'],
                    'type2' => 'refund_decline'
                );
                lui_RegisterNotification($notification_data_array);
            } else {
                $notification_data_array = array(
                    'recipient_id' => $request->user_id,
                    'type' => 'admin_notification',
                    'url' => 'index.php?link1=customer_order&id=' . $request->order_hash_id,
                    'text' => $wo['lang']['refund_decline'],
                    'type2' => 'refund_decline'
                );
                lui_RegisterNotification($notification_data_array);
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'approve_refund') {
        if (!empty($_GET['id'])) {
            $request = $db->where('id', lui_Secure($_GET['id']))->getOne(T_REFUND);
            if (!empty($request)) {
                if (empty($request->order_hash_id)) {
                    $price = $wo['pro_packages'][$request->pro_type]['price'];
                    $db->where('user_id', $request->user_id)->update(T_USERS, array(
                        'balance' => $db->inc($price),
                        'is_pro' => 0
                    ));
                    $db->where('id', lui_Secure($_GET['id']))->delete(T_REFUND);
                    $notification_data_array = array(
                        'recipient_id' => $request->user_id,
                        'type' => 'admin_notification',
                        'url' => 'index.php?link1=setting&page=payments',
                        'text' => $wo['lang']['refund_approve'],
                        'type2' => 'refund_approve'
                    );
                    lui_RegisterNotification($notification_data_array);
                } else {
                    $total_final_price = 0;
                    $price             = 0;
                    $orders            = $db->where('hash_id', $request->order_hash_id)->get(T_USER_ORDERS);
                    foreach ($orders as $key => $order) {
                        $db->where('id', $order->product_id)->update(T_PRODUCTS, array(
                            'units' => $db->inc($order->units)
                        ));
                        $total_final_price += $order->final_price;
                        $price += $order->price;
                    }
                    $order = $db->where('hash_id', $request->order_hash_id)->getOne(T_USER_ORDERS);
                    $user  = $db->where('user_id', $order->product_owner_id)->update(T_USERS, array(
                        'balance' => $db->dec($total_final_price)
                    ));
                    $user  = $db->where('user_id', $request->user_id)->update(T_USERS, array(
                        'wallet' => $db->inc($price)
                    ));
                    $db->where('hash_id', $request->order_hash_id)->update(T_USER_ORDERS, array(
                        'status' => 'canceled'
                    ));
                    $notification_data_array = array(
                        'recipient_id' => $request->user_id,
                        'type' => 'admin_notification',
                        'url' => 'index.php?link1=customer_order&id=' . $request->order_hash_id,
                        'text' => $wo['lang']['refund_approve'],
                        'type2' => 'refund_approve'
                    );
                    lui_RegisterNotification($notification_data_array);
                    $db->where('id', lui_Secure($_GET['id']))->delete(T_REFUND);
                }
            }
            $data = array(
                'status' => 200
            );
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'test_cloud') {
        if ($wo['config']['cloud_upload'] == 0 || empty($wo['config']['cloud_file_path']) || empty($wo['config']['cloud_bucket_name'])) {
            $data['message'] = 'Please enable Google Cloud Storage and fill all fields.';
        } elseif (!file_exists($wo['config']['cloud_file_path'])) {
            $data['message'] = 'Google Cloud File not found on your server Please upload it to your server.';
        } else {
            require_once 'luisincludes/librerias/google-lib/vendor/autoload.php';
            try {
                $storage = new StorageClient(array(
                    'keyFilePath' => $wo['config']['cloud_file_path']
                ));
                // set which bucket to work in
                $bucket  = $storage->bucket($wo['config']['cloud_bucket_name']);
                if ($bucket) {
                    $array = array(
                        'upload/photos/d-avatar.jpg',
                        'upload/photos/f-avatar.jpg',
                        'upload/photos/d-cover.jpg',
                        'upload/photos/d-group.jpg',
                        'upload/photos/d-page.jpg',
                        'upload/photos/d-blog.jpg',
                        'upload/photos/game-icon.png',
                        'upload/photos/d-film.jpg',
                        'upload/photos/incognito.png',
                        'upload/photos/app-default-icon.png'
                    );
                    foreach ($array as $key => $value) {
                        $fileContent   = file_get_contents($value);
                        // upload/replace file
                        $storageObject = $bucket->upload($fileContent, array(
                            'name' => $value
                        ));
                    }
                    $data['status'] = 200;
                } else {
                    $data['message'] = 'Error in connection';
                }
            }
            catch (Exception $e) {
                $data['message'] = "" . $e;
                // maybe invalid private key ?
                // print $e;
                // exit();
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'delete_ban') {
        if (!empty($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0) {
            if (lui_DeleteBanned(lui_Secure($_POST['id'])) === true) {
                $data = array(
                    'status' => 200
                );
                header("Content-type: application/json");
                echo json_encode($data);
                exit();
            }
        }
    }
    if ($s == 'new_ban') {
        if (!empty($_POST['id'])) {
            if (lui_BanNewIp(lui_Secure($_POST['id']))) {
                $data = array(
                    'status' => 200
                );
                header("Content-type: application/json");
                echo json_encode($data);
                exit();
            }
        }
    }
    if ($s == 'ReadNotify') {
        $db->where('recipient_id', 0)->where('admin', 1)->where('seen', 0)->update(T_NOTIFICATION, array(
            'seen' => time()
        ));
    }
    if ($s == 'change_mode') {
        if (!empty($_COOKIE['mode'])) {
            if ($_COOKIE['mode'] == 'night') {
                setcookie("mode", 'day', time() + (10 * 365 * 24 * 60 * 60), '/');
                $_COOKIE['mode'] = 'day';
            } else {
                setcookie("mode", 'night', time() + (10 * 365 * 24 * 60 * 60), '/');
                $_COOKIE['mode'] = 'night';
            }
        } else {
            setcookie("mode", 'night', time() + (10 * 365 * 24 * 60 * 60), '/');
            $_COOKIE['mode'] = 'night';
        }
    }
    if ($s == 'permission') {
        if (!empty($_GET['user_id']) && is_numeric($_GET['user_id']) && $_GET['user_id'] > 0 && !empty($_GET['type']) && in_array($_GET['type'], array(
            'normal',
            'moderator',
            'admin'
        ))) {
            $update = array(
                'admin' => '0'
            );
            if ($_GET['type'] == 'admin') {
                $update = array(
                    'admin' => '1'
                );
            }
            if ($_GET['type'] == 'moderator') {
                $update = array(
                    'admin' => '2'
                );
            }
            $db->where('user_id', lui_Secure($_GET['user_id']))->update(T_USERS, $update);
            $data = array(
                'status' => 200
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }
    if ($s == 'update_moderator_permission') {
        if (!empty($_GET['permission']) && !empty($_GET['user_id']) && is_numeric($_GET['user_id']) && $_GET['user_id'] > 0 && in_array($_GET['permission_val'], array(
            0,
            1
        ))) {
            $wo['mod_pages'] = array(
                'dashboard',
                'post-settings',
                'manage-stickers',
                'manage-gifts',
                'manage-users',
                'online-users',
                'manage-stories',
                'manage-pages',
                'manage-groups',
                'manage-posts',
                'manage-articles',
                'manage-events',
                'manage-forum-threads',
                'manage-forum-messages',
                'manage-movies',
                'manage-games',
                'add-new-game',
                'manage-user-ads',
                'manage-reports',
                'manage-third-psites',
                'edit-movie',
                'bank-receipts',
                'job-categories',
            );

            $wo['nopag_pages'] = array('proveedores');
            $user            = $db->where('user_id', lui_Secure($_GET['user_id']))->where('admin', '2')->getOne(T_USERS);
            if (!empty($user)) {
                $wo['all_pages'] = scandir('admin-panel/pages');
                unset($wo['all_pages'][0]);
                unset($wo['all_pages'][1]);
                unset($wo['all_pages'][2]);
                if (!empty($user->permission)) {
                    $permission                                 = json_decode($user->permission, true);
                    $permission[lui_Secure($_GET['permission'])] = lui_Secure($_GET['permission_val']);
                } else {
                    $permission = array();
                    if (!empty($wo['all_pages'])) {
                        foreach ($wo['all_pages'] as $key => $value) {
                            if(in_array($value,$wo['nopag_pages'])){
                                $permission[$value] = 0;
                            }elseif (in_array($value,$wo['mod_pages'])) {
                                $permission[$value] = 1;
                            }else{
                                $permission[$value] = 0;
                            }
                        }
                    }
                    $permission[lui_Secure($_GET['permission'])] = lui_Secure($_GET['permission_val']);
                }
                $permission = json_encode($permission);
                $db->where('user_id', lui_Secure($_GET['user_id']))->update(T_USERS, array(
                    'permission' => $permission
                ));
            }
        }
        $data = array(
            'status' => 200
        );
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'exchange') {
        if ($wo['config']['exchange_update'] < time()) {
            $request  = fetchDataFromURL("https://api.exchangerate.host/latest?base=" . $wo['config']['currency'] . "&symbols=" . implode(",", array_values($wo['config']['currency_array'])));
            $exchange = json_decode($request, true);
            if (!empty($exchange) && $exchange['success'] == true && !empty($exchange['rates'])) {
                lui_SaveConfig('exchange', json_encode($exchange['rates']));
                lui_SaveConfig('exchange_update', (time() + (60 * 60 * 12)));
            }
        }
        $data = array(
            'status' => 200
        );
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'edit-forum') {
        if (empty($_POST['name']) || empty($_POST['description']) || empty($_POST['section']) || empty($_POST['id']) || !is_numeric($_POST['id'])) {
            $error = $error_icon . $wo['lang']['please_check_details'];
        } else {
            if (strlen($_POST['name']) < 5) {
                $error = $error_icon . $wo['lang']['title_more_than10'];
            }
            if (strlen($_POST['name']) > 100) {
                $error = $error_icon . $wo['lang']['please_check_details'];
            }
            if (strlen($_POST['description']) < 5) {
                $error = $error_icon . $wo['lang']['desc_more_than32'];
            }
            if (strlen($_POST['description']) > 190) {
                $error = $error_icon . $wo['lang']['please_check_details'];
            }
        }
        if (empty($error)) {
            $forum = $db->where('id',lui_Secure($_POST['id']))->getOne(T_FORUMS);
            if (!empty($forum)) {
               $registration_data = array(
                    'name' => lui_Secure($_POST['name']),
                    'description' => lui_Secure($_POST['description']),
                    'sections' => lui_Secure($_POST['section'])
                );
               $db->where('id',lui_Secure($_POST['id']))->update(T_FORUMS,$registration_data);
               $data = array(
                    'status' => 200
                );
            } else {
                $data = array(
                    'status' => 500,
                    'message' => $wo['lang']['please_check_details']
                );
            }
        } else {
            $data = array(
                'status' => 500,
                'message' => $error
            );
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'edit-forum-section') {
        if (empty($_POST['name']) || empty($_POST['description'])) {
            $error = $error_icon . $wo['lang']['please_check_details'];
        } else {
            if (strlen($_POST['name']) < 5) {
                $error = $error_icon . $wo['lang']['title_more_than10'];
            }
            if (strlen($_POST['name']) > 145) {
                $error = $error_icon . $wo['lang']['please_check_details'];
            }
            if (strlen($_POST['description']) < 5) {
                $error = $error_icon . $wo['lang']['desc_more_than32'];
            }
        }
        if (empty($error)) {
            $forum = $db->where('id',lui_Secure($_POST['id']))->getOne(T_FORUM_SEC);
            if (!empty($forum)) {
                $registration_data = array(
                    'section_name' => lui_Secure($_POST['name']),
                    'description' => lui_Secure($_POST['description'])
                );
                $db->where('id',lui_Secure($_POST['id']))->update(T_FORUM_SEC,$registration_data);
                $data = array(
                    'status' => 200
                );

            }else {
                $data = array(
                    'status' => 500,
                    'message' => $wo['lang']['please_check_details']
                );
            }
        } else {
            $data = array(
                'status' => 500,
                'message' => $error
            );
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'insert-invitation') {
        $data             = array(
            'status' => 200,
            'html' => ''
        );
        $wo['invitation'] = lui_InsertAdminInvitation();
        if ($wo['invitation'] && is_array($wo['invitation'])) {
            $data['html']   = lui_LoadAdminPage('manage-invitation-keys/list');
            $data['status'] = 200;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'rm-invitation' && isset($_GET['id']) && is_numeric($_GET['id'])) {
        $data = array(
            'status' => 304
        );
        if (lui_DeleteAdminInvitation('id', $_GET['id'])) {
            $data['status'] = 200;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'update-sitemap') {
        $rate = (isset($_POST['rate']) && strlen($_POST['rate']) > 0) ? $_POST['rate'] : false;
        $data = array(
            'status' => 304
        );
        if (lui_GenirateSiteMap($rate)) {
            $data['status'] = 200;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'rm-user-invitation' && isset($_GET['id']) && is_numeric($_GET['id'])) {
        $data = array(
            'status' => 304
        );
        if (lui_DeleteUserInvitation('id', $_GET['id'])) {
            $data['status'] = 200;
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'test_backblaze') {
        $server_output = BackblazeConnect(array('apiUrl' => 'https://api.backblazeb2.com',
                                               'uri' => '/b2api/v2/b2_authorize_account',
                                            ));
        $data['status'] = 404;
        if (!empty($server_output)) {
            $result = json_decode($server_output,true);
            if (!empty($result['authorizationToken']) && !empty($result['apiUrl']) && !empty($result['accountId'])) {

                $info = BackblazeConnect(array('apiUrl' => $result['apiUrl'],
                                               'uri' => '/b2api/v2/b2_list_buckets',
                                               'accountId' => $result['accountId'],
                                               'authorizationToken' => $result['authorizationToken'],
                                        ));
                if (!empty($info)) {
                    $info = json_decode($info,true);
                    if (!empty($info) && !empty($info['buckets'])) {
                        $bucketId = '';
                        foreach ($info['buckets'] as $key => $value) {
                            if ($value['bucketId'] == $wo['config']['backblaze_bucket_id']) {
                                $db->where('name', 'backblaze_bucket_name')->update(T_CONFIG, array('value' => $value['bucketName']));
                                $bucketId = $value['bucketId'];
                                break;
                            }
                        }

                        if (!empty($bucketId)) {
                            $data['status'] = 200;
                            $array = array(
                                'upload/photos/d-avatar.jpg',
                                'upload/photos/f-avatar.jpg',
                                'upload/photos/d-cover.jpg',
                                'upload/photos/d-group.jpg',
                                'upload/photos/d-page.jpg',
                                'upload/photos/d-blog.jpg',
                                'upload/photos/game-icon.png',
                                'upload/photos/d-film.jpg',
                                'upload/photos/app-default-icon.png',
                                'upload/photos/incognito.png',
                                'upload/.htaccess',
                                'upload/files/2022/09/EAufYfaIkYQEsYzwvZha_01_4bafb7db09656e1ecb54d195b26be5c3_file.svg',
                                'upload/files/2022/09/2MRRkhb7rDhUNuClfOfc_01_76c3c700064cfaef049d0bb983655cd4_file.svg',
                                'upload/files/2022/09/D91CP5YFfv74GVAbYtT7_01_288940ae12acf0198d590acbf11efae0_file.svg',
                                'upload/files/2022/09/cFNOXZB1XeWRSdXXEdlx_01_7d9c4adcbe750bfc8e864c69cbed3daf_file.svg',
                                'upload/files/2022/09/yKmDaNA7DpA7RkCRdoM6_01_eb391ca40102606b78fef1eb70ce3c0f_file.svg',
                                'upload/files/2022/09/iZcVfFlay3gkABhEhtVC_01_771d67d0b8ae8720f7775be3a0cfb51a_file.svg'
                            );
                            foreach ($array as $key => $value) {
                                $upload = lui_UploadToS3($value, array(
                                    'delete' => 'no'
                                ));
                            }
                        }
                    }
                    else{
                        $data['status'] = 300;
                    }
                }
            }
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'uploadFiles') {
        if (!empty($_GET['file']) && !empty($_GET['path'])) {
            $file = lui_Secure(base64_decode($_GET['path']));
            $storage = lui_Secure($_GET['file']);
            $checkIfFileExistsInUpload = $db->where('filename', lui_Secure($file))->where('storage', $storage)->getOne(T_UPLOADED_MEDIA);
            if (empty($checkIfFileExistsInUpload)) {
               try {
                    $uploadToS3 = lui_UploadToS3($file, ["delete" => "no"]);
                    if ($uploadToS3) {
                        $insert = $db->insert(T_UPLOADED_MEDIA, ['filename' => lui_Secure($file), 'storage' => $storage, 'time' => time()]);
                        $data = ['status' => 200, 'fullPath' => lui_GetMedia(str_replace("\\", "/", $file))];
                    } else {
                        $data = ['status' => 400, 'message' => "Error found while uploading, please check settings."];
                    }
               } catch (Exception $e) {
                   $data = ['status' => 400, 'message' => $e->getMessage()];
               }
            } else {
                $data = ['status' => 400, 'message' => "File already uploaded."];
            }
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
        exit();
    }
    if($s == 'seleccionar_tienda'){
        $usuario = $wo['user']['user_id'];
        $tienda = lui_Secure($_POST['tienda']);
        $db->where('user_id', $usuario)->where('admin', '1')->update(T_USERS, array(
            'sucursal' => $tienda
        ));
    }
}
