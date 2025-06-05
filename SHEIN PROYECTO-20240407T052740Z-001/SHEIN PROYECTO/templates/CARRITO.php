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
        <h2>Artículos en el carrito</h2>
        <img id="imagenCarrito" src="" alt="Imagen en el carrito">
        <!-- Otros elementos del carrito -->
    </section>
    <section class="main">
        <h2>Carrito de Compras</h2>
        <ul id="listaCarrito">
            <!-- Los artículos seleccionados se agregarán aquí -->
        </ul>
        <button onclick="realizarCompra()">Comprar todo</button>
    </section>

<script>
    // document.addEventListener('DOMContentLoaded', function() {
    //     mostrarProductosEnCarrito();
    // });

    // function mostrarProductosEnCarrito() {
    //     var carrito = localStorage.getItem('carrito');
        
    //     if (carrito) {
    //         carrito = JSON.parse(carrito);
    //         var listaCarrito = document.getElementById('listaCarrito');
    //         listaCarrito.innerHTML = '';
    //         carrito.forEach(function(producto) {
    //             var item = document.createElement('li');
    //             item.textContent = producto.nombre + ' - ' + producto.precio;
    //             listaCarrito.appendChild(item);
    //         });
    //     }
    // }

    function realizarCompra() {
        // Lógica para realizar la compra
    }
</script>
<script>
    // Función para resaltar el artículo al pasar el mouse sobre él
    function resaltarArticulo(articulo) {
        articulo.style.backgroundColor = "#f0f0";
    }
    // Función para eliminar un artículo del carrito
    function eliminarDelCarrito(index) {
        var carrito = JSON.parse(localStorage.getItem('carrito'));
        carrito.splice(index, 1); // Elimina el elemento del array
        localStorage.setItem('carrito', JSON.stringify(carrito));
        mostrarCarrito(); // Vuelve a mostrar el carrito actualizado
    }

    // Función para mostrar el carrito en la página
    // function mostrarCarrito() {
    //     var carrito = JSON.parse(localStorage.getItem('carrito'));
    //     var carritoHTML = '';
    //     for (var i = 0; i < carrito.length; i++) {
    //         carritoHTML += '<div>';
    //         carritoHTML += '<p>' + carrito[i].nombre + ' - ' + carrito[i].precio + '</p>';
    //         carritoHTML += '<button onclick="eliminarDelCarrito(' + i + ')">Eliminar</button>';
    //         carritoHTML += '</div>';
    //     }
    //     document.getElementById('carrito').innerHTML = carritoHTML;
    // }

    // Llama a la función para mostrar el carrito cuando se cargue la página
    // window.onload = function() {
    //     mostrarCarrito();
    // };

    document.addEventListener('DOMContentLoaded', function () {
            // Realizar una solicitud para obtener los datos del carrito
            fetch('obtener_carrito.php')
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Error al obtener el carrito: " + response.statusText);
                    }
                    return response.json(); // Convertir la respuesta a JSON
                })
                .then(data => {
                    console.log("Datos del carrito:", data);
                    const listaCarrito = document.getElementById('listaCarrito');
                    const carrito= document.getElementById('carrito');
    
                    if (data.status === "success") {
                        // Renderizar los artículos en el carrito
                        data.carrito.forEach(producto => {
                            try {
                                const li = document.createElement('li');
                                li.textContent = `${producto.nombre} - Talla: ${producto.talla} - Precio: $${producto.precio}`;
                                listaCarrito.appendChild(li);
                                // ========================================================================                                
                                const div=document.createElement('div')
                                // console.log("Producto:", producto);
                                div.innerHTML = `<p>${producto.nombre} - Talla: ${producto.talla} - Precio: $${producto.precio}</p>
                                                <button onclick="eliminarDelCarrito(${producto.id})">Eliminar</button>
                                                <button onclick="comprarElemento(${producto.id})">Comprar</button>`;
                                carrito.appendChild(div);
                            // ========================================================================
                            } catch (error) {
                                console.error("Error al crear el elemento del carrito:", error);
                            }
                        });
                    } else {
                        // Mostrar mensaje si el carrito está vacío
                        listaCarrito.innerHTML = `<li>${data.mensaje}</li>`;
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("Hubo un error al cargar el carrito.");
            });
        });
</script>

<!-- Contenedor para mostrar el carrito -->
<div id="carrito"></div>

</body>
</html>

  