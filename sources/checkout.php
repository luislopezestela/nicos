<?php
if ($wo['config']['store_system'] != 'on') {
    header("Location: " . lui_SeoLink('index.php?link1=home'));
    exit();
}
$wo['html']  = '';
$wo['total'] = 0;
$wo['igv'] = 0;
$wo['subtotal'] = 0;


if ($wo['loggedin'] == true){
    $wo['items'] = $db->where('user_id', $wo['user']['id'])->get(T_USERCARD);
    if (!empty($wo['items'])) {
        foreach ($wo['items'] as $key => $wo['item']) {
            $wo['product'] = lui_GetProduct($wo['item']->product_id);
            if (!empty($wo['currencies']) && !empty($wo['currencies'][$wo['product']['currency']]) && $wo['currencies'][$wo['product']['currency']]['text'] != $wo['config']['currency'] && !empty($wo['config']['exchange']) && !empty($wo['config']['exchange'][$wo['currencies'][$wo['product']['currency']]['text']])) {
                $wo['total'] += (($wo['product']['price'] / $wo['config']['exchange'][$wo['currencies'][$wo['product']['currency']]['text']]) * $wo['item']->units);
            } else {
                $wo['total'] += ($wo['product']['price'] * $wo['item']->units);
            }
            $wo['html'] .= lui_LoadPage('checkout/item');
        }
    }
    $wo['addresses']   = $db->where('user_id', $wo['user']['user_id'])->get(T_USER_ADDRESS);
    $wo['sucursales']   = $db->get('lui_sucursales');
    $wo['topup']       = ($wo['user']['wallet'] < $wo['total'] ? 'show' : 'hide');
}


$wo['subtotal']       = number_format($wo['total'] / (1.18), '2','.','');
$wo['igv']         = number_format($wo['subtotal'] * 0.18, '2','.','');
$wo['total']       = number_format($wo['total'], '2','.','');
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'checkout';
$wo['title']       = $wo['lang']['checkout'];
$wo['content']     = lui_LoadPage('checkout/content');
