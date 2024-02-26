<?php
$dat = new DatosAdmin();
$dat->id = $_POST["data_action"];
$dat->delete_client_in_pages();
echo json_encode(array('estado' => 1, 'mensaje' => "Se elimino con exito"));