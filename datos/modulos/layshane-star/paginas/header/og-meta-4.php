<?php $textsprce =  (!empty($wo['currencies'][$wo['itemsdata']['product']['currency']]['text'])) ? $wo['currencies'][$wo['itemsdata']['product']['currency']]['text'] : $wo['config']['classified_currency']; ?>
<meta name="robots" content="INDEX,FOLLOW">
<meta name="currency" content="<?=$textsprce;?>" />
<meta name="price" content="<?php echo $wo['itemsdata']['product']['price'];?>" />
<meta property="og:type" content="product" />
<meta property="og:title" content="<?php echo $wo['itemsdata']['product']['name'];?>" />
<meta property="og:image" content="<?php echo $wo['itemsdata']['product']['imagen_portada']; ?>" />
<meta property="og:description" content="<?php echo strip_tags($wo['itemsdata']['product']['description']);?>" />
<meta property="og:url" content="<?php echo $wo['itemsdata']['product']['url'].$wo['itemsdata']['product']['coloreds'];?>" /> 
<meta property="product:price:amount" content="<?php echo $wo['itemsdata']['product']['price'];?>">
<meta property="product:price:currency" content="<?=$textsprce;?>">
<meta property="og:price:amount" content="<?php echo $wo['itemsdata']['product']['price'];?>" />
<meta property="og:price:currency" content="<?=$textsprce;?>" />
<meta name="twitter:title" content="<?php echo $wo['itemsdata']['product']['name'];?>" />
<meta name="twitter:description" content="<?php echo strip_tags($wo['itemsdata']['product']['description']);?>" />
<meta name="twitter:image" content="<?php echo $wo['itemsdata']['product']['imagen_portada']; ?>" />
<meta name="twitter:label1" content="Precio" />
<meta name="twitter:data1" content="<?php echo $wo['itemsdata']['product']['price'];?> <?=$textsprce;?>" />