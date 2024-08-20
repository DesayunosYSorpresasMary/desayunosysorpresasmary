<?php
require_once("conexion.php"); // Incluye el archivo de conexión

// Consulta para obtener productos con id_producto entre 28 y 32
$query = "SELECT * FROM produ WHERE id_producto IN (28, 29, 30, 31, 32)";
$resultado = mysqli_query($conexion, $query);

// Organizar los productos en un array por ID
$productos = [];
while ($producto = mysqli_fetch_assoc($resultado)) {
    $productos[$producto['id_producto']] = $producto;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desayunos y Sorpresas Mary</title>
    <link rel="stylesheet" href="Diadelasmadres.css">
</head>                
<body>
  <div class="Franja-color"></div>
    <header class="header">
        <div class="menu container">
            <a href="#" class="logo">
                <img src="Images_index/logo.jpg" alt="Desayunos y sorpresas mary logo" id="logo">
            </a> 
            <a href="#" class="whatsapp">
                <img src="Images_index/icons8-whatsapp.svg" alt="Desayunos y sorpresas Mary Logo" id="whatsapp">
            </a> 
            <input type="checkbox" id="menu" />
            <label for="menu">
                <img src="Images/menu.png" class="menu-icono" alt=""> 
            </label>
            <nav class="navbar">
                <ul>
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="Diadelamorylaamistad.php">Día del amor y la amistad</a></li>
                    <li><a href="Diadelpadre.php">Día del padre</a></li>
                    <li><a href="https://wa.link/6o494a">2491316315</a></li>
                </ul>
            </nav>
        </div>

        <div class="header-content container">
            <h1>Día de las Madres</h1>
            <p>Este Día de las Madres, regálale amor con cada detalle.</p>
        </div>
    </header>

    <section class="Desayunos">
        <?php foreach ([28, 29, 30, 31, 32] as $id): ?>
            <?php if (isset($productos[$id])): ?>
                <div class="product">
                    <?php if ($productos[$id]['imagen']): ?>
                        <img src="<?php echo htmlspecialchars($productos[$id]['imagen'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($productos[$id]['nomproducto'], ENT_QUOTES, 'UTF-8'); ?>"> 
                    <?php endif; ?>
                    <div class="product-info">
                        <h1><?php echo htmlspecialchars($productos[$id]['nomproducto'], ENT_QUOTES, 'UTF-8'); ?></h1>
                        <p><?php echo htmlspecialchars($productos[$id]['descripcion'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <p>Precio: $<?php echo htmlspecialchars($productos[$id]['precio'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <a href="FormularioDesayunos.php?id=<?php echo htmlspecialchars($productos[$id]['id_producto'], ENT_QUOTES, 'UTF-8'); ?>" class="button">Realizar pedido</a>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </section>

    <main class="Servicios">
        <div class="Servicios-content container">
            <h2>Contacto</h2>
            <div class="Servicios-group">
                <div class="Servicios-1">
                    <a href="#"><img src="Images_index/facebook.svg" alt="Facebook"></a> 
                    <h3>Facebook</h3>
                </div>
                <div class="Servicios-2">
                    <img src="images/i2.svg" alt="Otro Servicio">
                    <h3>Otro Servicio</h3>
                </div>
                <div class="Servicios-3">
                    <a href="https://www.instagram.com/jasmy_solutions?igsh=MWRkbmdhMzB3MjdkdQ=="><img src="Images_index/ig.svg" alt="Instagram"></a>
                    <h3>Instagram</h3>
                </div>       
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Desayunos y Sorpresas Mary</p>
    </footer>
</body>
</html>
