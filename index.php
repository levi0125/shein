<?php

    include("SHEIN PROYECTO-20240407T052740Z-001/SHEIN PROYECTO/templates/session.php");
    include("SHEIN PROYECTO-20240407T052740Z-001/SHEIN PROYECTO/templates/direccion.php");
    if (!isset($_SESSION["user_id"])) {
        // Si no hay sesión iniciada, redirigir al usuario a la página de inicio de sesión
        // Puedes cambiar 'login.html' por la ruta de tu página de inicio de sesión
        header( "Location:/$direccion/templates/login.php");
    }else {
        // Si hay sesión iniciada, redirigir al usuario a la página de inicio
        header( "Location:/$direccion/templates/INICIO.php");
    }
    // header("Location:SHEIN PROYECTO-20240407T052740Z-001/SHEIN PROYECTO/templates/REGISTRO.php")

?>