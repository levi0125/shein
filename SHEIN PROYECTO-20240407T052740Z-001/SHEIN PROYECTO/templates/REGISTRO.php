<?php
    include("session.php");
    if (isset($_SESSION["user_id"])) {
        include("direccion.php");
        // si ha iniciado sesión, redirigir a la página de inicio
        // Obtener el nombre del usuario desde la sesión
        header( "Location:/$direccion/templates/INICIO.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Formulario de registro">
    <meta name="keywords" content="registro, formulario, nombre, teléfono, correo, edad">
    <meta name="author" content="Tu nombre o nombre de tu empresa">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        /* Estilos adicionales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="tel"],
        input[type="email"],
        input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #fa9fd1;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #020001;
        }
        nav {
            background-color: #fa9fd1;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
        nav ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }
    </style>
</head>
<body>
    
<nav>
    <?php
        include("nav.php")
    ?>
</nav>

<div class="container">
    <h2>Formulario de Registro</h2>
    <form action="procesar_registro.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" required>

        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>

        <label for="edad">Edad (13-105):</label>
        <input type="number" id="edad" name="edad" min="13" max="105" required>

        <label for="edad">Contraseña:</label>
        <input type="password" id="password" name="password" min="8" max="10" required>

        <input type="submit" value="Registrarse">
    </form>
</div>
</body>
</html>


  
