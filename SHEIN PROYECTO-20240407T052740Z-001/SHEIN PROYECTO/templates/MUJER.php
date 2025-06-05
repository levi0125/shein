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
            
            <h2>FALDA CARGO CORTA</h2>
            <img src="../static/imgs/a.jpg" alt="Corrector 1">
            <p>Precio: $500.00</p>
            <button onclick="agregarAlCarrito('VESTIDO CELESTE', 'S', '$500.00')">Comprar</button>
        </article>


        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
        </article>

        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            
            <h2>VESTIDO CORSE</h2>
            <img src="../static/imgs/B.jpg" alt="Corrector 1">
            <p>Precio: $500.00</p>
            <button onclick="agregarAlCarrito('VESTIDO CORSE', 'S', '$500.00')">Comprar</button>
        </article>   
        

        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            
            <h2>FALDA CARGO CORTA</h2>
            <img src="../static/imgs/o.jpg" alt="Corrector 1">
            <p>Precio: $500.00</p>
            <button onclick="agregarAlCarrito('FALDA CARGO CORTA', 'S', '$500.00')">Comprar</button>
        </article>


        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            <h2> PIJAMA NEGRA</h2>
            <img src="../static/imgs/p.jpg" alt="Labial 1">
            <p>Precio: $200.00</p>
            <button onclick="agregarAlCarrito('PIJAMA NEGRA', 'S', '$200.00')">Comprar</button>
        </article>

        <!-- Aquí añade tres artículos más con imágenes y precios -->
        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            <h2>CONJUNTO ROSA</h2>
            <img src="../static/imgs/c.jpg" alt="Producto 4">
            <p>Precio: $300.00</p>
            <button onclick="agregarAlCarrito('CONJUNTO ROSA', 'S', '$300.00')">Comprar</button>
        </article>

        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            <h2>TOP CUERO </h2>
            <img src="../static/imgs/top.jpg" alt="Rubor 1">
            <p>Precio: $100.00</p>
            <button onclick="agregarAlCarrito('TOP CUERO', 'S', '$100.00')">Comprar</button>
        </article>

        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            <h2>VESTIDO NEGRO LARGO</h2>
            <img src="../static/imgs/pa.jpg" alt="Rubor 1">
            <p>Precio: $350.00</p>
            <button onclick="agregarAlCarrito('VESTIDO NEGRO LARGO', 'S', '$150.00')">Comprar</button>
        </article>



        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            <h2>VESTIDO ROSA</h2>
            <img src="../static/imgs/r.jpg" alt="Rubor 1">
            <p>Precio: $190.00</p>
            <button onclick="agregarAlCarrito('VESTIDO ROSA', 'S', '$150.00')">Comprar</button>
        </article>


        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            <h2>PATALON BRILLOS</h2>
            <img src="../static/imgs/m.jpg" alt="Rubor 1">
            <p>Precio: $300.00</p>
            <button onclick="agregarAlCarrito('PATALON BRILLOS', 'S', '$150.00')">Comprar</button>
        </article>

        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            <h2>PANTAON MEZQUILLA</h2>
            <img src="../static/imgs/over.jpg" alt="Rubor 1">
            <p>Precio: $800.00</p>
            <button onclick="agregarAlCarrito('PANTAON MEZQUILLA', 'S', '$150.00')">Comprar</button>
        </article>

        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            <h2>MAYON GRIS</h2>
            <img src="../static/imgs/pantalon.jpg" alt="Rubor 1">
            <p>Precio: $250.00</p>
            <button onclick="agregarAlCarrito('MAYON GRIS', 'S', '$150.00')">Comprar</button>
        </article>

        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            <h2>PANTALON MEZQUILLA BEIG</h2>
            <img src="../static/imgs/be.jpg" alt="Rubor 1">
            <p>Los rubores en crema de Rare Beauty ofrecen una experiencia de maquillaje única y versátil. Formulados con una textura suave y cremosa, estos rubores se deslizan fácilmente sobre la piel, brindando un acabado natural y radiante.</p>
            <p>Precio: $750.00</p>
            <button onclick="agregarAlCarrito('PANTALON MEZQUILLA BEIG', 'S', '$150.00')">Comprar</button>
        </article>

        <article onmouseover="resaltarArticulo(this)" onmouseout="quitarResaltado(this)">
            <h2>PANTALON CARGO BEIG</h2>
            <img src="../static/imgs/vee.jpg" alt="Rubor 1">
            <p>Precio: $700.00</p>
            <button onclick="agregarAlCarrito('PANTALON CARGO BEIG', 'S', '$150.00')">Comprar</button>
        </article>


    </section>
   
</section>

<!-- <script>
    function agregarAlCarrito() {
        var urlImagen = document.getElementById('imagenVestido').src;
        localStorage.setItem('imagenCarrito', urlImagen);
        window.location.href = 'carrito.html'; // Redirige a la página del carrito
    }
</script> -->

</body>
</html>