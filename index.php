<?php
// Conexión a la base de datos
$mysqli = new mysqli("localhost", "usuario", "contraseña", "inventario");

if ($mysqli->connect_error) {
    die("Error en la conexión a la base de datos: " . $mysqli->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST["nombre"];
$cantidad = $_POST["cantidad"];
$precio = $_POST["precio"];

// Insertar el nuevo producto en la base de datos
$query = "INSERT INTO productos (nombre, cantidad, precio) VALUES (?, ?, ?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("sid", $nombre, $cantidad, $precio);
if ($stmt->execute()) {
    header("Location: index.html"); // Redirige a la página principal
} else {
    echo "Error al guardar el producto.";
}

$stmt->close();
$mysqli->close();
?>
