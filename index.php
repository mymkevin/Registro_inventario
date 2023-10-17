<?php
// Conexión a la base de datos
$mysqli = new mysqli("localhost", "usuario", "contraseña", "inventario");

if ($mysqli->connect_error) {
    die("Error en la conexión a la base de datos: " . $mysqli->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST["nombre"];
$Modelo = $_POST["Modelo"];
$Color = $_POST["Color"];
$Serie = $_post["Serie"];

// Insertar el nuevo producto en la base de datos
$query = "INSERT INTO productos (nombre, Modelo, Color, Serie) VALUES (?, ?, ?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("sid", $nombre, $Modelo, $Color, $Serie);
if ($stmt->execute()) {
    header("Location: index.html"); // Redirige a la página principal
} else {
    echo "Error al guardar el producto.";
}

$stmt->close();
$mysqli->close();
?>
