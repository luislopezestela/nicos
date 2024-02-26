<?php
require_once('luisincludes/init.php');
$getStatus = getStatus(['curl' => true, "nodejsport" => true, "htaccess" => true]);
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Estado del sistema.</title>
	<link rel="stylesheet" href="<?php echo $wo['config']['theme_url'];?>/stylesheet/style.css<?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>">
	<link rel="stylesheet" href="<?php echo $wo['config']['theme_url'];?>/stylesheet/general-style-plugins.css<?php echo $wo['update_cache']; ?>?version=<?php echo $wo['config']['version']; ?>">

</head>
<body>
	<div class="container content-container">
		<ul style="list-style: circle;">
	<?php if (!empty($getStatus)) { ?> 
        <?php
        foreach ($getStatus as $key => $value) {?>
            <li style="margin-bottom: 20px;"><?php echo ($value["type"] == "error") ? '<strong style="color: red">Importante!</strong>' : '<strong style="color: #f98f1d">Advertencia:</strong>';?> <?php echo $value["message"];?></li>
    <?php }} else { ?>
        <li>Todo bien, no se encontraron problemas.</li>
    <?php } ?>
    </ul>
	</div>
</body>
</html>