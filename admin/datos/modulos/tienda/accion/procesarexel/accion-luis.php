<?php
use PhpOffice\PhpSpreadsheet\IOFactory;
$rutaArchivo = $_FILES["exelpage"]["tmp_name"];
$documento = IOFactory::load($rutaArchivo);
$hojaDeProductos = $documento->getSheet(0);
$numeroMayorDeFila = $hojaDeProductos->getHighestRow();
$letraMayorDeColumna = $hojaDeProductos->getHighestColumn();
$numeroMayorDeColumna = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($letraMayorDeColumna);
$archo_exel = new DatosAdmin();
$itemviewer = DatosAdmin::porID_producto($_POST["conf"]);
$type_items_view = DatosAdmin::Ver_tipo_deproducto_por_item($itemviewer->tipo);

for ($indiceFila = 2; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
    $archo_exel->proveedor=$_POST['proveedor'];
    $archo_exel->documento=$_POST['documento'];

    if($itemviewer->tipo==1){
        $archo_exel->barcode = $hojaDeProductos->getCellByColumnAndRow(1, $indiceFila);
        $archo_exel->num_documento=$hojaDeProductos->getCellByColumnAndRow(2, $indiceFila);
        $archo_exel->make = $hojaDeProductos->getCellByColumnAndRow(3, $indiceFila);
        $archo_exel->model = $hojaDeProductos->getCellByColumnAndRow(4, $indiceFila);
        $archo_exel->series = $hojaDeProductos->getCellByColumnAndRow(5, $indiceFila);
        $archo_exel->coa = $hojaDeProductos->getCellByColumnAndRow(6, $indiceFila);
        $archo_exel->cpu = $hojaDeProductos->getCellByColumnAndRow(7, $indiceFila);
        $archo_exel->cpu_speed = $hojaDeProductos->getCellByColumnAndRow(8, $indiceFila);
        $archo_exel->ram = $hojaDeProductos->getCellByColumnAndRow(9, $indiceFila);
        $archo_exel->hard_drive = $hojaDeProductos->getCellByColumnAndRow(10, $indiceFila);
        $archo_exel->drivetype = $hojaDeProductos->getCellByColumnAndRow(11, $indiceFila);
        $archo_exel->aditional_information = $hojaDeProductos->getCellByColumnAndRow(12, $indiceFila);
        $archo_exel->other_information = $hojaDeProductos->getCellByColumnAndRow(13, $indiceFila);
        $archo_exel->screen_size = $hojaDeProductos->getCellByColumnAndRow(14, $indiceFila);
        $archo_exel->battery = $hojaDeProductos->getCellByColumnAndRow(15, $indiceFila);
        $archo_exel->battery_test = $hojaDeProductos->getCellByColumnAndRow(16, $indiceFila);
        $archo_exel->web_cam = $hojaDeProductos->getCellByColumnAndRow(17, $indiceFila);
        $archo_exel->stock = $hojaDeProductos->getCellByColumnAndRow(18, $indiceFila);
        $archo_exel->id_producto = $_POST["conf"];
        $archo_exel->id_sucursal = $_POST['sucursal'];
        $archo_exel->id_usuario = $_SESSION['admin_id'];
        $archo_exel->fecha = date("Y-m-d");
        $archo_exel->importar_exel_database_laptop();
        echo "exito";
    }elseif($itemviewer->tipo==2){
        $archo_exel->barcode = $hojaDeProductos->getCellByColumnAndRow(1, $indiceFila);
        $archo_exel->num_documento=$hojaDeProductos->getCellByColumnAndRow(2, $indiceFila);
        $archo_exel->make = $hojaDeProductos->getCellByColumnAndRow(3, $indiceFila);
        $archo_exel->model = $hojaDeProductos->getCellByColumnAndRow(4, $indiceFila);
        $archo_exel->series = $hojaDeProductos->getCellByColumnAndRow(5, $indiceFila);
        $archo_exel->form_factor = $hojaDeProductos->getCellByColumnAndRow(6, $indiceFila);
        $archo_exel->coa = $hojaDeProductos->getCellByColumnAndRow(7, $indiceFila);
        $archo_exel->cpu = $hojaDeProductos->getCellByColumnAndRow(8, $indiceFila);
        $archo_exel->cpu_speed = $hojaDeProductos->getCellByColumnAndRow(9, $indiceFila);
        $archo_exel->ram = $hojaDeProductos->getCellByColumnAndRow(10, $indiceFila);
        $archo_exel->hard_drive = $hojaDeProductos->getCellByColumnAndRow(11, $indiceFila);
        $archo_exel->drivetype = $hojaDeProductos->getCellByColumnAndRow(12, $indiceFila);
        $archo_exel->aditional_information = $hojaDeProductos->getCellByColumnAndRow(13, $indiceFila);
        $archo_exel->other_information = $hojaDeProductos->getCellByColumnAndRow(14, $indiceFila);
        $archo_exel->stock = $hojaDeProductos->getCellByColumnAndRow(15, $indiceFila);
        $archo_exel->id_producto = $_POST["conf"];
        $archo_exel->id_sucursal = $_POST['sucursal'];
        $archo_exel->id_usuario = $_SESSION['admin_id'];
        $archo_exel->fecha = date("Y-m-d");
        $archo_exel->importar_exel_database_cpu();
        echo "exito";
    }elseif($itemviewer->tipo==3){
        $archo_exel->barcode = $hojaDeProductos->getCellByColumnAndRow(1, $indiceFila);
        $archo_exel->num_documento=$hojaDeProductos->getCellByColumnAndRow(2, $indiceFila);
        $archo_exel->make = $hojaDeProductos->getCellByColumnAndRow(3, $indiceFila);
        $archo_exel->model = $hojaDeProductos->getCellByColumnAndRow(4, $indiceFila);
        $archo_exel->series = $hojaDeProductos->getCellByColumnAndRow(5, $indiceFila);
        $archo_exel->coa = $hojaDeProductos->getCellByColumnAndRow(6, $indiceFila);
        $archo_exel->cpu = $hojaDeProductos->getCellByColumnAndRow(7, $indiceFila);
        $archo_exel->cpu_speed = $hojaDeProductos->getCellByColumnAndRow(8, $indiceFila);
        $archo_exel->ram = $hojaDeProductos->getCellByColumnAndRow(9, $indiceFila);
        $archo_exel->hard_drive = $hojaDeProductos->getCellByColumnAndRow(10, $indiceFila);
        $archo_exel->drivetype = $hojaDeProductos->getCellByColumnAndRow(11, $indiceFila);
        $archo_exel->aditional_information = $hojaDeProductos->getCellByColumnAndRow(12, $indiceFila);
        $archo_exel->other_information = $hojaDeProductos->getCellByColumnAndRow(13, $indiceFila);
        $archo_exel->screen_size = $hojaDeProductos->getCellByColumnAndRow(14, $indiceFila);
        $archo_exel->web_cam = $hojaDeProductos->getCellByColumnAndRow(15, $indiceFila);
        $archo_exel->ac_adapter = $hojaDeProductos->getCellByColumnAndRow(16, $indiceFila);
        $archo_exel->stock = $hojaDeProductos->getCellByColumnAndRow(17, $indiceFila);
        $archo_exel->id_producto = $_POST["conf"];
        $archo_exel->id_sucursal = $_POST['sucursal'];
        $archo_exel->id_usuario = $_SESSION['admin_id'];
        $archo_exel->fecha = date("Y-m-d");
        $archo_exel->importar_exel_database_aio();
        echo "exito";
    }elseif($itemviewer->tipo==4){
        $archo_exel->importar_exel_database_procesador();
        echo json_encode(array('estado' => "exito"));
    }else{
        echo "error";
    }
}
