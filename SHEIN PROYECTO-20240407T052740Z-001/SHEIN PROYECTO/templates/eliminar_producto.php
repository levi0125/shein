<?php
    try{

        include("session.php");
        if (!isset($_SESSION['user_id'])) {
            die ("Acceso denegado. Por favor, inicie sesión.");
        }
        include("conexion.php");
        $id = $_GET['id'];
        $user_id = $_SESSION['user_id'];
        if (!isset($id) || !isset($user_id) || empty($id) || empty($user_id)) {
            die("Faltan datos");
        }
        $query = "DELETE FROM compras WHERE id_compra = ?;";

        $stmt = $conexion->prepare($query);
        if (!$stmt) {
            die("Error al preparar la consulta: " . $conexion->error);
        }
        $stmt->bind_param("i", $id);
        // echo "ID de compra: $id, ID de usuario: $user_id\n"; // For debugging purposes
        // Ejecutar la consulta
        // Si la consulta se ejecuta correctamente, se actualiza el estado de la compra a concretado
        // y se devuelve un mensaje de éxito
        // Si ocurre un error, se captura la excepción y se muestra un mensaje de error
        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "Error al realizar la compra: " . $stmt->error;
        }
        $stmt->close();
        $conexion->close();
    }catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
?>