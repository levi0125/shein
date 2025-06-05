<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Descripción de tu página web">
    <meta name="keywords" content="palabra clave 1, palabra clave 2, palabra clave 3">
    <meta name="author" content="Tu nombre o nombre de tu empresa">
    <title>Título de tu Página Web</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        /* Estilos adicionales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #f8f8f8;
            padding: 20px;
            text-align: center;
        }
        nav {
            background-color: #020001;
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
        section.main {
            padding: 20px;
            text-align: center;
        }
        section.images {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        .image {
            flex: 1;
            margin: 0 10px;
        }
        .image img {
            width: 100%;
            border-radius: 5px;
        }
        aside {
            background-color: #f8f8f8;
            padding: 20px;
            margin-top: 20px;
            text-align: center;
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
    </style>

    <?php
        include("session.php");
        if (isset($_SESSION["user_id"])) {
            // include("direccion.php");
            // // Si no hay sesión iniciada, redirigir al usuario a la página de inicio de sesión
            // // Puedes cambiar 'login.html' por la ruta de tu página de inicio de sesión
            // header( "Location:/$direccion/templates/login.php");
            // exit();

            
            // Mostrar contenido solo para usuarios autenticados
            echo "<meta name='nombre_usuario' content='{$_SESSION["nombre"]}'>";
        }

    ?>
</head>
<body>
    <header>
    <img src="../static/imgs/I_1.jpg" alt="Logo" width="200px">
    </header>

    <nav>
        <?php
            include("nav.php")
        ?>
    </nav>
    <section class="main">
        <h1>SHEIN MX</h1>
        <p>ENVIOS A TODO EL MUNDO</p>
    </section>

    <section class="images">
        <div class="image">
            <img src="../static/imgs/SHEE.jpg" alt="Imagen 1">
            <p>Descripción de la imagen 1</p>

    </section>

    <script>
        window.addEventListener('load', function() {
            // Aquí puedes agregar cualquier código que necesites ejecutar al cargar la página
            console.log("Página cargada correctamente.");
            nombre_usuario = document.querySelector('meta[name="nombre_usuario"]')?.getAttribute('content');
            if (nombre_usuario) {
                console.log("Usuario autenticado: " + nombre_usuario);
                alert("Bienvenido, " + nombre_usuario + "!");
            } else {
                console.log("No hay usuario autenticado.");
            }
        });

        function agregarAlCarrito(nombre, precio) {
            // Creamos un objeto para representar el artículo
            var articulo = {
                nombre: nombre,
                precio: precio
            };

            // Verificamos si ya hay artículos en el carrito
            var carrito = localStorage.getItem('carrito');
            if (!carrito) {
                carrito = [];
            } else {
                carrito = JSON.parse(carrito);
            }

            // Agregamos el nuevo artículo al carrito
            carrito.push(articulo);

            // Guardamos el carrito actualizado en el almacenamiento local
            localStorage.setItem('carrito', JSON.stringify(carrito));

            // Redirigimos al usuario a la página del carrito
            window.location.href = 'CARRITO.php';
        }
    </script>
</body>
</html>