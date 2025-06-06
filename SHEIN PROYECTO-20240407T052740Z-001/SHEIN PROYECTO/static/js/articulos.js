function resaltarArticulo(articulo) {
    articulo.style.backgroundColor = "#f0f0"
}
function obtenerVAlores(button){
    nombre=button.parentNode.children[1]?.innerText
    precio=button.parentNode.children[3]?.innerText

    return nombre,precio
}
// function agregarAlCarrito(nombre, talla, precio) {
    
    
//     var carrito = localStorage.getItem('carrito');
//     if (!carrito) {
//         carrito = [];
//     } else {
//         carrito = JSON.parse(carrito);
//     }
//     carrito.push({nombre: nombre, talla: talla, precio: precio});
//     localStorage.setItem('carrito', JSON.stringify(carrito));

//     alert("¡Se añadió al carrito!"); 
//     window.location.href = 'CARRITO.php';
// }

function agregarAlCarrito(nombre,talla, precio) {
    // Datos que deseas enviar al archivo PHP
    const datos = {
        nombre: nombre,
        talla: talla,
        precio: parseFloat(precio.replace(/[^0-9.-]+/g,"")) // Convertir el precio a número
    };
    console.log("Datos a enviar:", datos);
    // Enviar los datos al archivo PHP
    fetch('procesar_compra.php', {
        method: 'POST', // Método HTTP
        headers: {
            'Content-Type': 'application/json' // Tipo de contenido
        },
        body: JSON.stringify(datos) // Convertir los datos a JSON
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Error en la solicitud: " + response.statusText);
        }
        return response.json(); // Leer la respuesta como texto
    })
    .then(data => {
        console.log("Respuesta del servidor:", data);
        if(data.status==="success"){
            // Aquí puedes manejar la respuesta del servidor si es necesario
            // Por ejemplo, actualizar el carrito en la interfaz de usuario
            alert("Se añadio el producto al carrito!");
        }else{
            alert("Error al procesar la compra: " + data.mensaje);
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("Hubo un error al procesar la compra.");
    });
}