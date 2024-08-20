<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Pedidos</title>
    <link rel="stylesheet" href="MuestraUserPHP.css"> <!-- Enlazar el archivo CSS -->
</head>
<body>
    <div class="Franja-color"></div> <!-- Franja color rosa en la parte superior -->
    <div class="header">
        <div class="header-content">
            <h1>Mostrar Pedidos</h1>
        </div>
    </div>
    
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th colspan="10">Pedidos Registrados</th>
                </tr>
                <tr>
                    <th>id_pedido</th>
                    <th>nombre</th>
                    <th>domicilio</th>
                    <th>numcel</th>
                    <th>producto</th>
                    <th>cantidad</th>
                    <th>total</th>
                    <th>comentarios</th>
                    <th colspan="2">Operaciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("conexion.php");
                $query = "SELECT * FROM pedidos";
                $resultado = $conexion->query($query);
                while ($row = $resultado->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['id_pedido']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['domicilio']; ?></td>
                        <td><?php echo $row['numcel']; ?></td>
                        <td><?php echo $row['producto']; ?></td>
                        <td><?php echo $row['cantidad']; ?></td>
                        <td><?php echo $row['total']; ?></td>
                        <td><?php echo $row['comentarios']; ?></td>
                        <td><a href="ModificarUser.php?User=<?php echo $row['id_pedido']; ?>">Modificar</a></td>
                        <td><a href="EliminarUser.php?User=<?php echo $row['id_pedido']; ?>" onclick="return confirm('¿Estás seguro de que quieres eliminar este pedido?');">Eliminar</a></td>

                <?php
                }
                ?>
                <tr>
                    <td colspan="11" class="center"><a href="formulario.html">Nuevo Registro</a></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Botón adicional para redirigir a indexadmin.html -->
    <div class="button-container">
        <a href="indexadmin.html" class="btn">Volver al Modo Administrador</a>
    </div>

    <footer>
        <p>&copy; 2024 Desayunos y Sorpresas Mary</p>
    </footer>
</body>
</html>
