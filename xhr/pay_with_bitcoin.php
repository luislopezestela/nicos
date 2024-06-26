<?php 
if ($f == 'pay_with_bitcoin') {
    if ($s == 'pay') {
        if (!empty($_GET['amount']) && is_numeric($_GET['amount']) && $_GET['amount'] > 0) {
            $amount   = (int)lui_Secure($_GET[ 'amount' ]);
            if (empty($wo['config']['coinpayments_coin'])) {
                $wo['config']['coinpayments_coin'] = 'BTC';
            }
            $result = coinpayments_api_call(array('key' => $wo['config']['coinpayments_public_key'],
                                                  'version' => '1',
                                                  'format' => 'json',
                                                  'cmd' => 'create_transaction',
                                                  'amount' => $amount,
                                                  'currency1' => $wo['config']['currency'],
                                                  'currency2' => $wo['config']['coinpayments_coin'],
                                                  'custom' => $amount,
                                                  'success_url' => $wo['config']['site_url'] . '/wallet',
                                                  'cancel_url' => $wo['config']['site_url'] . '/requests.php?f=pay_with_bitcoin&s=cancel_coinpayments',
                                                  'buyer_email' => $wo['user']['email']));

            
            if (!empty($result) && $result['status'] == 200) {
                $db->insert(T_PENDING_PAYMENTS,array('user_id' => $wo['user']['user_id'],
                                                     'payment_data' => $result['data']['txn_id'],
                                                     'method_name' => 'coinpayments',
                                                     'time' => time()));
                $data = array(
                    'status' => 200,
                    'url' => $result['data']['checkout_url']
                );
            }
            else{
                $data = array(
                    'status' => 400,
                    'message' => $result['message']
                );
            }
        }
        else{
            $data = array(
                'status' => 400,
                'message' => $wo['lang']['empty_amount']
            );
        }
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
    }
    if ($s == 'cancel_coinpayments') {
        $db->where('user_id', $wo['user']['user_id'])->where('method_name', 'coinpayments')->delete(T_PENDING_PAYMENTS);
        header('Location: ' . lui_SeoLink('index.php?link1=wallet'));
        exit();
    }
}
