<?php
    header('Content-Type: application/json');
    $respuesta= [
        "status" => "error",
        "mensaje" => ""
    ];
    // ============================================================
    // verificamos que este logueado
    include('session.php');
    if (!isset($_SESSION['user_id'])) {
        $respuesta["mensaje"]= "Debes iniciar sesión para realizar una compra.";
        echo json_encode($respuesta);
        exit; // Terminamos la ejecución
    }
    $client_id=$_SESSION['user_id'];

    // ============================================================
    // Verificar si se recibieron datos POST
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        $respuesta["mensaje"]= "Método no permitido. Por favor, utiliza POST para enviar datos.";
        echo json_encode($respuesta);
        exit; // Terminamos la ejecución
    }
    // Leer los datos JSON enviados
    $input = file_get_contents('php://input');
    $datos = json_decode($input, true); // Convertir JSON a un array asociativo
    if (json_last_error() !== JSON_ERROR_NONE) {
        $respuesta["mensaje"]= "Error al decodificar los datos JSON: " . json_last_error_msg();
        echo json_encode($respuesta);
        exit; // Terminamos la ejecución
    }
    $nombre = $datos['nombre'];
    $talla = $datos['talla'];
    $precio = floatval($datos['precio']);
    
    // Validamos que los campos no estén vacíos
    if (empty($nombre) || empty($talla) || $precio <= 0) {
        //debe retornar un mensaje de error en repsuesta a la petición, como API
        $respuesta["mensaje"]= "Todos los campos son obligatorios.";
        echo json_encode($respuesta);
        exit; // Terminamos la ejecución
    }

    // ===========================================================
    // Aquí podrías insertar la compra en la base de datos
    // Por ejemplo:
    include('conexion.php');
    $query = "INSERT INTO compras (nombre, talla, precio,id_comprador) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ssdi", $nombre, $talla, $precio, $client_id);
    // Ejecutamos la consulta
    if ($stmt->execute()) {
        $respuesta["status"] = "success"; // Cambiamos el estado a éxito
        $respuesta["mensaje"]= "Compra Realizada con Exito"; // Retornamos 1 si la compra se procesó correctamente
    } else {
        $respuesta["mensaje"]= "Error al procesar la compra: " . $conexion->error;
    }
    
    // Cerramos la conexión
    $stmt->close();
    $conexion->close();
    echo json_encode($respuesta);
    exit; // Terminamos la ejecución
?>