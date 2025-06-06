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
        /* body {
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
        } */
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

        #carrito,#historial{
            text-align: center;
            width:max(40vw, 600px);
        }
        #carrito div{
            display:grid;
            grid-template-columns: 5fr 2fr 2fr;
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
        .content{
            display:grid;
            grid-template-columns: 7fr 1fr;
        }


        #historial{
            background: #fa9fd1;
            .content{
                /* background: #f8cce0; */
                background: #ffeaf6;
            }
            #total{
                padding-top: 10px;
                font-weight: bold;
                font-size: 1.2em;
                /* color: #d1006b; */
                background: #f8cce0;
                /* background:#ffeaf6; */
                /* background: #eac8ff; */
                /* font-weight: bold;
                font-size: 1.2em;
                color: #d1006b; */
            }
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

    <!-- <section class="main">
        <h2>Artículos en el carrito</h2>
        <img id="imagenCarrito" src="" alt="Imagen en el carrito">
    </section> -->
    
    <!-- Contenedor para mostrar el carrito -->
    <div class="center">
        <section id="historial">
            <h2>Historial</h2>
            <div class="content" bis_skin_checked="1">
                <ul id="listaCompras"><li id="historialItem1" class="historialItem">FALDA CARGO CORTA - Talla: S - Precio: $500</li><li id="historialItem2" class="historialItem">PLAYERA LISA - Talla: S - Precio: $200</li><li id="historialItem3" class="historialItem"> CONJUNTO NEGRO - Talla: S - Precio: $200</li><li id="historialItem4" class="historialItem"> CONJUNTO NEGRO - Talla: S - Precio: $200</li><li id="historialItem5" class="historialItem"> OVERSIDE BLANCA - Talla: S - Precio: $300</li><li id="historialItem7" class="historialItem">PLAYERA HOMBRE - Talla: S - Precio: $250</li><li id="historialItem9" class="historialItem">CONJUNTO ROSA - Talla: S - Precio: $300</li></ul>
                <div id="total" bis_skin_checked="1">TOTAL: $1950.00</div>
            </div>
            <!-- <button onclick="realizarCompra()">Comprar todo</button> -->
        </section>

        <h2>Carrito de Compras</h2>
        <div id="carrito"></div>
    </div>
    
    <script>
        const total=document.getElementById('total');
        // Función para resaltar el artículo al pasar el mouse sobre él
        function resaltarArticulo(articulo) {
            articulo.style.backgroundColor = "#f0f0";
        }
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
        function mostrarCarrito(){
            obtenerCarrito(false,(data)=>{
                const carrito= document.getElementById('carrito');
                carrito.innerHTML = ''; // Limpiar el carrito antes de mostrar los nuevos datos
                if (data.status != "success") {
                    // Mostrar mensaje si el carrito está vacío
                    listaCarrito.innerHTML = `<li>${data.mensaje}</li>`;
                    return ;
                }
                // Renderizar los artículos en el carrito
                data.carrito.forEach(producto => {
                    try {
                        const div=document.createElement('div')
                        div.id="carritoItem" + producto.id;
                        div.className="carritoItem";
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
        }
        function mostrarHistorial(){
            obtenerCarrito(true,(data)=>{
                let totalCompra = 0; // Variable para almacenar el total de la compra
                const historial = document.getElementById('listaCompras');

                // Limpiar el historial antes de mostrar los nuevos datos
                historial.innerHTML = '';
                
                if (data.status != "success") {
                    // Mostrar mensaje si el carrito está vacío
                    historial.innerHTML = `<li>${data.mensaje}</li>`;
                    return ;
                }
                // Renderizar los artículos en el carrito
                data.carrito.forEach(producto => {
                    try {
                        const li = document.createElement('li');
                        li.id = "historialItem" + producto.id;
                        li.className = "historialItem";
                        li.textContent = `${producto.nombre} - Talla: ${producto.talla} - Precio: $${producto.precio}`;
                        historial.appendChild(li);
                        totalCompra += parseFloat(producto.precio); // Sumar el precio del producto al total
                        // ========================================================================
                    } catch (error) {
                        console.error("Error al crear el elemento del carrito:", error);
                    }
                });
                total.textContent = "TOTAL: $" + totalCompra.toFixed(2); // Mostrar el total de la compra
                // Aquí puedes procesar los datos del carrito si es necesario    
            });	
        }
        function askForProductUpdate(url,id,callback = (data) => {}) {
            // Lógica para actualizar el producto
            console.log("Actualizar producto con ID:", id);
            // Aquí puedes agregar la lógica para actualizar el producto
            fetch(url + '?id=' + id)
                .then(response => {
                    if (!response.ok) {
                        console.error("RESPONSE NO ESTA OK")
                        console.log(response)
                        throw new Error("Error al Actualizar el Producto: " + response.statusText);
                    }
                    return response.text(); // Convertir la respuesta a JSON
                })
                .then(data => {
                    callback(data); // Llamar al callback con los datos obtenidos
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("Hubo un error al modificar el producto.");
            });
        }
        // Función para eliminar un artículo del carrito
        function eliminarDelCarrito(index) {
            // var carrito = JSON.parse(localStorage.getItem('carrito'));
            // carrito.splice(index, 1); // Elimina el elemento del array
            // localStorage.setItem('carrito', JSON.stringify(carrito));
            // mostrarCarrito(); // Vuelve a mostrar el carrito actualizado
            askForProductUpdate('eliminar_producto.php', index,(data)=>{
                if(data== "success") {
                    alert("Producto eliminado del carrito");
                    document.getElementById("carritoItem" + index).remove(); // Eliminar el elemento del carrito
                    // Aquí puedes agregar la lógica para actualizar el carrito visualmente
                } else {
                    alert("Error al eliminar el producto: " + data);
                }
            });
        }
        function comprarElemento(id) {
            // Lógica para comprar el elemento
            console.log("Comprar elemento con ID:", id);
            askForProductUpdate('comprar_producto.php', id,(data)=>{
                if(data== "success") {
                    alert("Compra realizada con éxito");
                    document.getElementById("carritoItem" + id).remove(); // Eliminar el elemento del carrito
                    mostrarHistorial(); // Actualizar el historial de compras
                    // Aquí puedes agregar la lógica para actualizar el carrito visualmente
                } else {
                    alert("Error al realizar la compra: " + data);
                }
            });
            // Aquí puedes agregar la lógica para procesar la compra
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Realizar una solicitud para obtener los datos del carrito
            
            mostrarCarrito();
            mostrarHistorial();
        });	
    </script>

</body>
</html>

  