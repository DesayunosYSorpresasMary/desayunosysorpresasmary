<?php
require_once("conexion.php"); // Incluye el archivo de conexión

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_producto = $_POST['id_producto'] ?? null;
    $nomproducto = $_POST['nomproducto'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    // Manejo de la imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagenTmp = $_FILES['imagen']['tmp_name'];
        $imagenNombre = $_FILES['imagen']['name'];
        $imagenRuta = "uploads/" . basename($imagenNombre);

        // Mover el archivo de imagen a la carpeta deseada
        if (!move_uploaded_file($imagenTmp, $imagenRuta)) {
            echo "Error al subir la imagen.";
            exit;
        }
    } elseif (isset($id_producto)) {
        // Usar la imagen existente si no se ha subido una nueva
        $query = "SELECT imagen FROM produ WHERE id_producto = ?";
        $stmt = mysqli_prepare($conexion, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id_producto);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        $producto = mysqli_fetch_assoc($resultado);
        $imagenRuta = $producto['imagen'];
        mysqli_stmt_close($stmt);
    } else {
        echo "No se ha cargado ninguna imagen y no se especificó una existente.";
        exit;
    }

    // Verificar si se debe actualizar o insertar
    if ($id_producto) {
        // Actualizar producto existente
        $query = "UPDATE produ SET nomproducto = ?, imagen = ?, descripcion = ?, precio = ? WHERE id_producto = ?";
        $stmt = mysqli_prepare($conexion, $query);
        mysqli_stmt_bind_param($stmt, 'ssssi', $nomproducto, $imagenRuta, $descripcion, $precio, $id_producto);
    } else {
        // Insertar nuevo producto
        $query = "INSERT INTO produ (nomproducto, imagen, descripcion, precio) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conexion, $query);
        mysqli_stmt_bind_param($stmt, 'ssss', $nomproducto, $imagenRuta, $descripcion, $precio);
    }

    // Ejecutar la consulta
    if (mysqli_stmt_execute($stmt)) {
        header("Location: indexprodu.php"); // Redirigir a la lista de productos
    } else {
        echo "Error al guardar el producto.";
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
} else {
    echo "Solicitud no válida.";
}
?>
