<?php
include "./luisincludes/librerias/PhpSpreadsheet-master/vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
 // Asegúrate de cargar la biblioteca PhpSpreadsheet

// Simula datos de productos por categorías y detalles de productos
$productos = [
    'Electrónica' => [
        ['Producto A', 'Descripción A', 'Precio A'],
        ['Producto B', 'Descripción B', 'Precio B'],
        ['Producto C', 'Descripción C', 'Precio C'],
    ],
    'Ropa' => [
        ['Camiseta', 'Descripción Camiseta', 'Precio Camiseta'],
        ['Pantalón', 'Descripción Pantalón', 'Precio Pantalón'],
        ['Zapatos', 'Descripción Zapatos', 'Precio Zapatos'],
    ],
    // Agrega más categorías y productos según sea necesario
];

// Crear un nuevo objeto PhpSpreadsheet
$spreadsheet = new Spreadsheet();




// Hoja de Categorías
$sheetCategorias = $spreadsheet->getActiveSheet();
$sheetCategorias->setTitle('Categorías');
$sheetCategorias->setCellValue('A1', 'Stock de productos');
// Ajustar el estilo del título (opcional)
$styleTitulo = [
    'font' => [
        'bold' => true,
        'size' => 28,
        'color' => ['rgb' => 'FFFFFF'], // Color del texto en blanco
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
        'startColor' => ['rgb' => '3498db'], // Color de fondo en azul
    ],
];
$sheetCategorias->getStyle('A1')->applyFromArray($styleTitulo);
$sheetCategorias->getStyle('B1')->applyFromArray($styleTitulo);
// Ajustar automáticamente el ancho de las columnas A y B
foreach (range('A', 'C') as $columna) {
    $sheetCategorias->getColumnDimension($columna)->setAutoSize(true);

}
// Ajustar la altura de la fila para mostrar todo el contenido
$sheetCategorias->getRowDimension(1)->setRowHeight(-1);

// Hoja de Detalles de Productos
foreach ($productos as $categoria => $productosCategoria) {
    // Agregar un hipervínculo en la celda de categoría
    // Ajustar el estilo de categorias
	$styleCategoria = [
	    'font' => [
	        'bold' => true,
	        'size' => 18,
	        'color' => ['rgb' => '3498db'], // Color del texto en blanco
	    ],
	];
    $celdaCategoria = 'A' . ($sheetCategorias->getHighestRow() + 1);
    $sheetCategorias->setCellValue($celdaCategoria, $categoria);
	$sheetCategorias->getStyle($celdaCategoria)->applyFromArray($styleCategoria);
    $sheetCategorias->getCell($celdaCategoria)->getHyperlink()->setUrl("sheet://'$categoria'!A1");

    // Hoja de Detalles de Productos
    
    
    $sheetDetallescategoria = $spreadsheet->createSheet();
	$sheetDetallescategoria->setTitle($categoria);
	$filaDetalles = 2;
    foreach ($productosCategoria as $producto) {
    	$styleCategoriadetalletitulo = [
		    'font' => [
		        'bold' => true,
		        'size' => 20,
		        'color' => ['rgb' => 'FFFFFF'],
		    ],
		    'fill' => [
		        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
		        'startColor' => ['rgb' => '3498db'], // Color de fondo en azul
		    ],
		];
		$styleCategoriadetalle = [
		    'font' => [
		        'bold' => true,
		        'size' => 14,
		        'color' => ['rgb' => '000000'],
		    ],
		];
		$sheetDetallescategoria->getStyle('A1')->applyFromArray($styleCategoriadetalletitulo);
		$sheetDetallescategoria->getStyle('B1')->applyFromArray($styleCategoriadetalletitulo);
		$sheetDetallescategoria->getStyle('C1')->applyFromArray($styleCategoriadetalletitulo);

		$sheetDetallescategoria->getStyle($filaDetalles)->applyFromArray($styleCategoriadetalle);
    	$sheetDetallescategoria->setCellValue('A1', 'Detalles de ' . $categoria);
        // Agregar detalles de productos
        $sheetDetallescategoria->setCellValue('A' . $filaDetalles, $producto[0]);
        $sheetDetallescategoria->setCellValue('B' . $filaDetalles, $producto[1]);
        $sheetDetallescategoria->setCellValue('C' . $filaDetalles, $producto[2]);
        $filaDetalles++;
    }
    // Ajustar automáticamente el ancho de las columnas
	foreach (range('A', 'C') as $columna) {
	    $sheetDetallescategoria->getColumnDimension($columna)->setAutoSize(true);
	}
}

// Agregar instrucciones en la hoja de categorías
$celdaInstrucciones = 'D1';
$sheetCategorias->setCellValue($celdaInstrucciones, 'Haz clic en la celda de la categoría para ver más detalles en otra hoja.');



// Aplicar estilo a las instrucciones
$styleInstrucciones = [
    'font' => [
        'color' => ['rgb' => 'FF0000'], // Color rojo
        'bold' => true,
    ],
];
$sheetCategorias->getStyle($celdaInstrucciones)->applyFromArray($styleInstrucciones);



// Crear el archivo Excel
$writer = new Xlsx($spreadsheet);
$urldata = './luisincludes/';
$archivoExcel =  'productos.xlsx';
// Descargar el archivo Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $archivoExcel . '"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit();
