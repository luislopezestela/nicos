<?php
$dt = new Luis();
$dt->id = $_SESSION['admin_id'];
$dt->idioma = $_POST['idioma'];
$dt->actualizar_idioma_usuario();
?>