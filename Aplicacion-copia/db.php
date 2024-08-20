<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root"; // Cambia según tu configuración
$password = "";     // Cambia según tu configuración
$dbname = "bd_mary"; // Cambia según tu configuración

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
