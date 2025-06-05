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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        nav {
            background-color: #444;
            color: white;
            padding: 10px;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
        }
        .main {
            padding: 20px;
        }
        .main h2 {
            color: #333;
        }
        * {
            box-sizing: border-box;
            max-width:95vw;
        }
        #carrito{
            width:max(40vw, 600px);
            div{
                display:grid;
                grid-template-columns: 5fr 2fr 2fr;
            }
        }
        .center{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 20px;
        }
        #carrito {
            margin-top: 20px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        #carrito div {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        #carrito div p {
            margin: 0;
        }
        #carrito div button {
            margin-right: 10px;
            padding: 5px 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        #carrito div button:hover {
            background-color: #218838;
        }
        #carrito div button:last-child {
            background-color: #007bff;
        }
        #carrito div button:last-child:hover {
            background-color: #0056b3;
        }
        #carrito div button:first-child {
            background-color: #dc3545;
        }
        #carrito div button:first-child:hover {
            background-color: #c82333;
        }
        #carrito div:hover {
            background-color: #f0f0f0;
        }
        #carrito div:hover p {
            color: #333;
        }

        </style>
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
        <h2>Historial</h2>
        <ul id="listaCompras">
            <!-- <div>
                <p>${producto.nombre} - Talla: ${producto.talla} - Precio: $${producto.precio}</p>
                <button onclick="eliminarDelCarrito(${producto.id})">Eliminar</button>
                <button onclick="comprarElemento(${producto.id})">Comprar</button>
            </div> -->
            <!-- Los artículos seleccionados se agregarán aquí -->
        </ul>
        <!-- <button onclick="realizarCompra()">Comprar todo</button> -->
    </section>

    <!-- Contenedor para mostrar el carrito -->
    <div class="center">
        <div id="carrito"></div>
    </div>
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
    // interface dataProcessCallback {
    //     (data: any): void;
    // }
    function obtenerCarrito(quieresHistorial=false, callback = (data) => {}) {
        fetch('obtener_carrito.php?Historial=' + (quieresHistorial ? '1' : '0'))
                .then(response => {
                    if (!response.ok) {
                        console.error("RESPONSE NO ESTA OK")
                        console.log(response)
                        throw new Error("Error al obtener el carrito: " + response.statusText);
                    }
                    return response.json(); // Convertir la respuesta a JSON
                })
                .then(data => {
                    console.log("Datos del carrito:", data);
                    callback(data); // Llamar al callback con los datos obtenidos
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("Hubo un error al cargar el carrito.");
            });
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Realizar una solicitud para obtener los datos del carrito
        obtenerCarrito(false,(data)=>{
            const carrito= document.getElementById('carrito');

            if (data.status != "success") {
                // Mostrar mensaje si el carrito está vacío
                listaCarrito.innerHTML = `<li>${data.mensaje}</li>`;
                return ;
            }
            // Renderizar los artículos en el carrito
            data.carrito.forEach(producto => {
                try {
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
        });
        obtenerCarrito(true,(data)=>{
            const historial = document.getElementById('listaCompras');
            const carrito= document.getElementById('carrito');

            if (data.status != "success") {
                // Mostrar mensaje si el carrito está vacío
                historial.innerHTML = `<li>${data.mensaje}</li>`;
                return ;
            }
            // Renderizar los artículos en el carrito
            data.carrito.forEach(producto => {
                try {
                    const li = document.createElement('li');
                    li.textContent = `${producto.nombre} - Talla: ${producto.talla} - Precio: $${producto.precio}`;
                    historial.appendChild(li);
                    
                    // ========================================================================
                } catch (error) {
                    console.error("Error al crear el elemento del carrito:", error);
                }
            });
            
            // Aquí puedes procesar los datos del carrito si es necesario    
        });	
    });	
</script>

</body>
</html>

  