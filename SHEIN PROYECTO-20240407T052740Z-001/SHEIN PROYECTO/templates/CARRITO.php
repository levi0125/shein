<?php
    include('restringir_acceso.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="description" content=" ROPA NUEVA ">
    <meta name="keywords" content="LA MEJOR CALIDAD Y PRECIOS">
    <meta name="author" content="SHEIN">
    <title>TODO TIPO DE ESTILOS - Inicio</title>
    <!-- <link rel="stylesheet" href="../static/styles/estilos.css"> -->
    <link rel="stylesheet" href="../static/styles/basic.css">
    <link rel="stylesheet" href="../static/styles/carrito.css">
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

    <!-- <section class="main">
        <h2>Artículos en el carrito</h2>
        <img id="imagenCarrito" src="" alt="Imagen en el carrito">
    </section> -->
    
    <!-- Contenedor para mostrar el carrito -->
    <div class="center">
        <section id="historial">
            <h2>Historial</h2>
            <div class="content" bis_skin_checked="1">
                <ul id="listaCompras"></ul>
                <div id="total" bis_skin_checked="1">TOTAL: $0</div>
            </div>
            <!-- <button onclick="realizarCompra()">Comprar todo</button> -->
        </section>

        <h2>Carrito de Compras</h2>
        <div id="carrito"></div>
    </div>
    
    <script src="../static/js/carrito.js"></script>

</body>
</html>

  