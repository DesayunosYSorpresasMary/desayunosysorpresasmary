<?php
include("conexion.php");

$id_pedido = $_REQUEST['User'];
$nombre = $_POST['nombre'];
$domicilio = $_POST['domicilio'];
$numcel = $_POST['numcel'];
$producto =$_POST['producto'];
$cantidad = (int)$_POST['cantidad'];
$comentarios = $_POST['comentarios'];
$precio = 120;
$total = $precio * $cantidad;


$query = "UPDATE pedidos SET nombre='$nombre', domicilio='$domicilio', numcel='$numcel', producto='$producto', cantidad='$cantidad', total='$total', comentarios='$comentarios' WHERE id_pedido='$id_pedido'";
$resultado = mysqli_query($conexion,$query);

if ($resultado) {
    header("Location:MuestraUser.php");
} else {
    echo "Actualización Fallida";
}
?>
