<?php
include("conexion.php");

$id_pedido = $_REQUEST['User'];
$query = "DELETE FROM pedidos WHERE id_pedido=$id_pedido";
$resultado = mysqli_query($conexion, $query);

if ($resultado) {
    header("Location:MuestraUser.php");
} else {
    echo "Eliminación Fallida";
}
?>
