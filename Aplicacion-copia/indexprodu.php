<?php
require_once("conexion.php"); // Incluye el archivo de conexión

// Consulta para obtener todos los productos
$query = "SELECT * FROM produ";
$resultado = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="indexprodu.css">
</head>
<body>
    <!-- Franja superior con color -->
    <div class="Franja-color">
        <h1>Lista de Productos</h1>
    </div>

    <!-- Encabezado con imagen de fondo -->
    <div class="header">
        <div class="header-content">
            <h1>Administración de Productos</h1>
        </div>
    </div>

    <!-- Contenedor principal para la lista de productos -->
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($producto = mysqli_fetch_assoc($resultado)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($producto['id_producto'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($producto['nomproducto'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <?php if ($producto['imagen']): ?>
                                <img src="<?php echo htmlspecialchars($producto['imagen'], ENT_QUOTES, 'UTF-8'); ?>" alt="Imagen del Producto">
                            <?php endif; ?>
                        </td>
                        <td><?php echo htmlspecialchars($producto['descripcion'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($producto['precio'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td class="actions">
                            <a href="formulario_produ.php?id=<?php echo htmlspecialchars($producto['id_producto'], ENT_QUOTES, 'UTF-8'); ?>" class="btn">Editar</a>
                            <form action="eliminar_produ.php" method="post" class="delete-form">
                                <input type="hidden" name="id_producto" value="<?php echo htmlspecialchars($producto['id_producto'], ENT_QUOTES, 'UTF-8'); ?>">
                                <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?');" class="btn">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <div class="add-product">
            <a href="formulario_produ.php" class="btn">Añadir Nuevo Producto</a>
        </div>
        <!-- Botón "Regresar al Inicio" -->
        <div class="btn-regresar-container">
            <a href="indexadmin.html" class="btn-regresar">Regresar</a>
        </div>
    </div>
</body>
</html>
