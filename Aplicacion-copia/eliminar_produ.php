<?php
require_once("conexion.php"); // Incluye el archivo de conexión

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_producto = $_POST['id_producto']; // Obtener el ID del producto a eliminar

    // Validar el ID del producto
    if (isset($id_producto) && is_numeric($id_producto)) {
        // Preparar la consulta de eliminación
        $query = "DELETE FROM produ WHERE id_producto = ?";
        $stmt = mysqli_prepare($conexion, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id_producto);

        // Ejecutar la consulta
        if (mysqli_stmt_execute($stmt)) {
            header("Location: indexprodu.php"); // Redirigir a la lista de productos
        } else {
            echo "Error al eliminar el producto.";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "ID del producto inválido.";
    }
    mysqli_close($conexion);
} else {
    echo "Solicitud no válida.";
}
?>
