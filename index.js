document.addEventListener("DOMContentLoaded", function() {
    const filtroForm = document.getElementById("filtro-form");
    const tablaProductos = document.querySelector("table");

    filtroForm.addEventListener("change", function() {
        const tipoProducto = filtroForm.querySelector("#tipo-producto").value;
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "./index.php?tipo=" + tipoProducto, true);

        xhr.onload = function() {
            if (xhr.status == 200) {
                tablaProductos.innerHTML = "<tr><th>Nombre</th><th>Modelo</th><th>Color</th><th>Serie</th></tr>";
                const productos = JSON.parse(xhr.responseText);

                productos.forEach(function(producto) {
                    const fila = document.createElement("tr");
                    fila.innerHTML = `<td>${producto.nombre}</td><td>${producto.tipo_producto}</td><td>${producto.cantidad}</td><td>${producto.precio}</td>`;
                    tablaProductos.appendChild(fila);
                });
            }
        };

        xhr.send();
    });

    filtroForm.querySelector("#tipo-producto").value = "todos";
    filtroForm.dispatchEvent(new Event("change"));
});
