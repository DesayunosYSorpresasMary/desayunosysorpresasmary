<?php
$conexion = new mysqli("localhost", "root", "", "bd_mary");

if ($conexion->connect_errno) {
    die("Conexion Fallida: " . $conexion->connect_errno);
} else {
    //echo "Conectado";
}
?>
