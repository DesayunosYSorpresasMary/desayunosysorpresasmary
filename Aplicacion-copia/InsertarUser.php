<?php
require_once("conexion.php"); // Requerir el archivo de conexión

$nombre = $_POST['nombre']; // Obtener los datos del formulario
$domicilio = $_POST['domicilio'];
$numcel = $_POST['numcel'];
$producto = $_POST['desayuno']; // Puedes cambiar esto si hay múltiples productos
$cantidad = (int)$_POST['cantidad'];
$precio = $_POST['precio'];
$total = $precio * $cantidad;
$comentarios = $_POST['comentarios'];

// Preparar la consulta de inserción
$query = "INSERT INTO pedidos (nombre, domicilio, numcel, producto, cantidad, total, comentarios) VALUES ('$nombre', '$domicilio', '$numcel', '$producto', $cantidad, $total, '$comentarios')";
$resultado = mysqli_query($conexion, $query); // Ejecutar la consulta

if ($resultado) { // Verificar si la inserción fue exitosa
    header("Location: avisoenvio.html"); // Redirigir a avisoenvio.html después de la inserción exitosa
    exit(); // Asegurarse de que el script se detenga después de la redirección
} else {
    echo "Inserción Fallida: " . mysqli_error($conexion); // Mostrar mensaje de error con detalles
}

// Cerrar la conexión
mysqli_close($conexion);
?>
