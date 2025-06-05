<?php
    header('Content-Type: application/json');
    $respuesta= [
        "status" => "error",
        "mensaje" => "",
        "carrito" => []
    ];
    include('session.php');
    if(!isset($_SESSION['user_id'])) {
        $respuesta['mensaje'] = "Usuario no autenticado";
        echo json_encode($respuesta);
         // Terminamos la ejecución
    }
    include('conexion.php');
    $user_id = $_SESSION['user_id'];
    $consulta = "SELECT * FROM compras WHERE id_comprador = ? and concretado = 0";
    $stmt = $conexion->prepare($consulta);
    if (!$stmt) {
        $respuesta['mensaje'] = "Error al preparar la consulta: " . $conexion->error;
        echo json_encode($respuesta);
         // Terminamos la ejecución
    }
    $stmt->bind_param("i", $user_id);
    if (!$stmt->execute()) {
        $respuesta['mensaje'] = "Error al ejecutar la consulta: " . $stmt->error;
        echo json_encode($respuesta);
         // Terminamos la ejecución
    }
    $resultado = $stmt->get_result();
    if ($resultado->num_rows > 0) {
        $respuesta['status'] = "success";
        $respuesta['mensaje'] = "Carrito obtenido correctamente";
        while ($fila = $resultado->fetch_assoc()) {
            $respuesta['carrito'][] = [
                'id' => $fila['id_compra'],
                'nombre' => $fila['nombre'],
                'talla' => $fila['talla'],
                'precio' => $fila['precio']
            ];
        }
    } else {
        $respuesta['mensaje'] = "El carrito está vacío";
    }
    $stmt->close();
    $conexion->close();
    echo json_encode($respuesta);
     // Terminamos la ejecución
    ?>