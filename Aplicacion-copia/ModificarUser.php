<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Actualización de Datos</title>
</head>
<body>
    <?php
    $id_pedido = $_REQUEST['User'];
    include("conexion.php");
    $query = "SELECT * FROM pedidos WHERE id_pedido='$id_pedido'";
    $resultado = $conexion->query($query);
    $row = $resultado->fetch_assoc();
    ?>
    <form action="OperacionmodifiUser.php?User=<?php echo $row['id_pedido']; ?>" method="POST" class="form-register">
        <link rel="stylesheet" href="estilos.css">
        <h1>Modificar registro</h1>
        <div class="contenedor-inputs">
            <input type="text" name="nombre" placeholder="Nombre" class="input-100" value="<?php echo $row['nombre'];?>" required />
            <input type="text" name="domicilio" placeholder="Domicilio" class="input-100" value="<?php echo $row['domicilio'];?>" required />
            <input type="text" name="numcel" placeholder="NumCel" class="input-100" value="<?php echo $row['numcel'];?>" required />
            <input type="text" name="producto" placeholder="Producto" class="input-100" value="<?php echo $row['producto'];?>" required />
            <input type="number" name="cantidad" placeholder="Cantidad" class="input-100" value="<?php echo $row['cantidad'];?>" required />
            <input type="text" name="comentarios" placeholder="Comentarios" class="input-100" value="<?php echo $row['comentarios'];?>" required />
            <input type="submit" value="Guardar" class="btn-enviar"/>
        </div>
    </form>
</body>
</html>
