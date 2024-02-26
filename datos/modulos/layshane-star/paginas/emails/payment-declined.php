<?php 
$data = $db->where('name','payment_declined')->getOne(T_HTML_EMAILS);
$html = $data->value;
$html = lui_ReplaceText($html);
echo $html;
 ?>