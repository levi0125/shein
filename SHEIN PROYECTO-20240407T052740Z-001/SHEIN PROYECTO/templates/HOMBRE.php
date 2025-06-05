<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="description" content=" ROPA NUEVA ">
    <meta name="keywords" content="LA MEJOR CALIDAD Y PRECIOS">
    <meta name="author" content="SHEIN">
    <title>TODO TIPO DE ESTILOS - Inicio</title>
    <link rel="stylesheet" href="../static/styles/basic.css">
</head>
<body>

    <script src="../static/js/articulos.js"></script>
    
<header>
   <img src="../static/imgs/I_1.jpg" alt="Logo" width="200px">
</header>

<nav>
    <?php
        include("nav.php")
    ?>
</nav>
    
<section class="main">
    <section class="articles">
        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            
                <h2> OVERSIDE BLANCA </h2>
                <img src="../static/imgs/12.jpg" alt="Rubor 1">
                <p>Precio: $300.00</p>
                <button onclick="agregarAlCarrito(' OVERSIDE BLANCA', 'S', '$300.00')">Comprar</button>
            </div>
        </article>
        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            
            <h2>PLAYERA LISA</h2>
            <img src="../static/imgs/1.jpg" alt="Corrector 1">
            <p>Precio: $200.00</p>
            <button onclick="agregarAlCarrito('PLAYERA LISA', 'S', '$200.00')">Comprar</button>
        </article>
        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            <h2> CONJUNTO NEGRO/h2>
            <img src="../static/imgs/2.jpg" alt="Labial 1">
            <p>Precio: $200.00</p>
            <button onclick="agregarAlCarrito(' CONJUNTO NEGRO', 'S', '$200.00')">Comprar</button>
        </article>
        <!-- Aquí añade tres artículos más con imágenes y precios -->
        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            <h2>PLAYERA NASA</h2>
            <img src="../static/imgs/3.jpg" alt="Producto 4">
            <p>Precio: $400.00</p>
            <button onclick="agregarAlCarrito('PLAYERA NASA', 'S', '$400.00')">Comprar</button>
        </article>
        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            <h2>OVERSIDE CLANCA </h2>
            <img src="../static/imgs/4.jpg" alt="Rubor 1">
            <p>Precio: $100.00</p>
            <button onclick="agregarAlCarrito('OVERSIDE CLANCA', 'S', '$100.00')">Comprar</button>
        </article>
        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            <h2>OVERSIDE BEIG</h2>
            <img src="../static/imgs/5.jpg" alt="Rubor 1">
            <p>Precio: $350.00</p>
            <button onclick="agregarAlCarrito('OVERSIDE BEIG', 'S', '$350.00')">Comprar</button>
        </article>
        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            <h2>VESTIDO ROSA</h2>
            <img src="../static/imgs/6.jpg" alt="Rubor 1">
            <p>Precio: $190.00</p>
            <button onclick="agregarAlCarrito('VESTIDO ROSA', 'S', '$190.00')">Comprar</button>
        </article>
        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            <h2>CAMISA VERDE MILITAR</h2>
            <img src="../static/imgs/7.jpg" alt="Rubor 1">
            <p>Precio: $300.00</p>
            <button onclick="agregarAlCarrito('CAMISA VERDE', 'S', '$300.00')">Comprar</button>
        </article>
        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            <h2>CONJUNTO BLANCO</h2>
            <img src="../static/imgs/8.jpg" alt="Rubor 1">
            <p>Precio: $800.00</p>
            <button onclick="agregarAlCarrito('CONJUNTO BLANCO', 'S', '$800.00')">Comprar</button>
        </article>
        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            <h2>PLAYERA HOMBRE ARAÑA</h2>
            <img src="../static/imgs/9.jpg" alt="Rubor 1">
            <p>Precio: $250.00</p>
            <button onclick="agregarAlCarrito('PLAYERA HOMBRE', 'S', '$250.00')">Comprar</button>
        </article>
        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            <h2>PLAYERA POLO</h2>
            <img src="../static/imgs/10.jpg" alt="Rubor 1">
            <p>Precio: $750.00</p>
            <button onclick="agregarAlCarrito('PLAYERA POLO', 'S', '$750.00')">Comprar</button>
        </article>
        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            <h2>PANTALON CARGO BEIG</h2>
            <img src="../static/imgs/11.jpg" alt="Rubor 1">
            <p>Precio: $700.00</p>
            <button onclick="agregarAlCarrito('PANTALON CARGO', 'S', '$700.00')">Comprar</button>
        </article>

    </section>
   
</section>


<!-- <script>
    function agregarAlCarrito() {
        var urlImagen = document.getElementById('imagenVestido').src;
        localStorage.setItem('imagenCarrito', urlImagen);
        window.location.href = 'CARRITO.php'; // Redirige a la página del carrito
    }
</script> -->
</body>
</html>