<?php
if ($f == 'g_s_pr') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar si se recibieron los datos necesarios
        if (isset($_POST['producto_id']) && isset($_POST['selecciones']) && !empty($_POST['selecciones'])) {
            // Guardar las selecciones en la sesión
            $producto_id = $_POST['producto_id'];
            $_SESSION['seleccion_atributos'][$producto_id] = $_POST['selecciones'];

            // Calcular la cantidad de productos basada en las selecciones y construir la consulta SQL
            $cantidad_productos = 0;
            if (!empty($_SESSION['seleccion_atributos'][$producto_id])) {
                $selecciones = $_SESSION['seleccion_atributos'][$producto_id];
                $sql = "SELECT SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = 'ingreso' THEN cantidad WHEN modo = 'salida' THEN -cantidad ELSE 0 END ELSE 0 END) AS cantidad 
                        FROM imventario 
                        WHERE producto = {$producto_id} 
                        AND (estado = 1 OR estado = 2)";

                foreach ($selecciones as $atributoId => $opcionId) {
                    $sql .= " AND id IN (SELECT id_imventario FROM imventario_atributos WHERE id_atributo = $atributoId AND id_atributo_opciones = $opcionId)";
                }

                $cantidad_prod = $db->rawQueryOne($sql)->cantidad;
                $cantidad_productos = ($cantidad_prod !== null) ? $cantidad_prod : 0;
            }

            // Construir la respuesta JSON
            $response = array(
                'status' => 200,
                'message' => 'Selecciones guardadas correctamente para el producto ' . $producto_id . '.',
                'cantidad_productos' => $cantidad_productos
            );
        } else {
            $response = array('status' => 400, 'message' => 'Datos incompletos.');
        }
    } else {
        $response = array('status' => 400, 'message' => 'Solicitud no válida.');
    }

    // Devolver la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
