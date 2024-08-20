<?php
require_once("conexion.php"); // Incluye el archivo de conexión

// Inicializar la variable producto
$producto = null;

// Verificar si hay un ID en la URL para editar un producto existente
if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];

    // Validar el ID del producto
    if (is_numeric($id_producto)) {
        // Preparar la consulta para obtener los datos del producto
        $query = "SELECT * FROM produ WHERE id_producto = ?";
        $stmt = mysqli_prepare($conexion, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id_producto);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        // Obtener el producto si existe
        if ($producto = mysqli_fetch_assoc($resultado)) {
            // Producto encontrado
        } else {
            echo "Producto no encontrado.";
            exit;
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "ID de producto no válido.";
        exit;
    }
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($producto) ? 'Editar Producto' : 'Añadir Nuevo Producto'; ?></title>
    <style>
        /* Los estilos van aquí */
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo isset($producto) ? 'Editar Producto' : 'Añadir Nuevo Producto'; ?></h1>
        <form action="procesar_produ.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_producto" value="<?php echo isset($producto) ? htmlspecialchars($producto['id_producto'], ENT_QUOTES, 'UTF-8') : ''; ?>">
            
            <label for="nomproducto">Nombre del Producto:</label>
            <input type="text" name="nomproducto" id="nomproducto" value="<?php echo isset($producto) ? htmlspecialchars($producto['nomproducto'], ENT_QUOTES, 'UTF-8') : ''; ?>" required>
            
            <label for="imagen">Imagen:</label>
            <div class="image-preview">
                <?php if (isset($producto) && $producto['imagen']): ?>
                    <img src="<?php echo htmlspecialchars($producto['imagen'], ENT_QUOTES, 'UTF-8'); ?>" alt="Imagen del Producto" style="max-width: 100px;">
                <?php endif; ?>
            </div>
            <input type="file" name="imagen" id="imagen" <?php echo isset($producto) ? '' : 'required'; ?>>
            
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" rows="5" required><?php echo isset($producto) ? htmlspecialchars($producto['descripcion'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
            
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" step="0.01" value="<?php echo isset($producto) ? htmlspecialchars($producto['precio'], ENT_QUOTES, 'UTF-8') : ''; ?>" required>
            
            <input type="submit" value="<?php echo isset($producto) ? 'Actualizar Producto' : 'Añadir Producto'; ?>">
        </form>
        <div class="back-link">
            <a href="indexprodu.php">Volver a la lista de productos</a>
        </div>
    </div>
</body>
</html>
