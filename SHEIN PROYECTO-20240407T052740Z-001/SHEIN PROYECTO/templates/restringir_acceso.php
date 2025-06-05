<?php
    include('session.php');
    include('direccion.php');
    // Verificamos que el usuario esté logueado
    if (!isset($_SESSION['user_id'])) {
        header( "Location:/$direccion/templates/REGISTRO.php"); // Redirigimos al usuario a la página de inicio de sesión
        exit; // Terminamos la ejecución
    }
?>