const historial = document.getElementById('listaCompras');
const carrito= document.getElementById('carrito');

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
        carrito.innerHTML = ''; // Limpiar el carrito antes de mostrar los nuevos datos
        if (data.status != "success") {
            // Mostrar mensaje si el carrito está vacío
            carrito.innerHTML = `<li>${data.mensaje}</li>`;
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