<?php
require_once("conexion.php"); // Incluye el archivo de conexión

// Consulta para obtener productos con id_producto entre 3 y 9
$query = "SELECT * FROM produ WHERE id_producto IN (3, 4, 5, 6, 7, 8, 9)";
$resultado = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desayunos y Sorpresas Mary</title>
    <link rel="stylesheet" href="Desayunos1.css">
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
            <li><a href="Sorpresas1.php">Sorpresas</a></li>
            <li><a href="Regalos.php">Regalos</a></li>
            <li><a href="Charolas.php">Charolas</a></li>
            <li><a href="https://wa.link/6o494a">2491316315</a></li>
        </ul>
       </nav>
      </div>

       <div class="header-content container">
        <h1>Desayunos</h1>
        <p>
            Diseñados para hacer de cada momento
            una deliciosa celebración.
        </p>
       </div>
    </header>
    
    <section class="Desayunos">
    <?php while ($producto = mysqli_fetch_assoc($resultado)): ?>
        <div class="product">
        <?php if ($producto['imagen']): ?>
            <img src="<?php echo htmlspecialchars($producto['imagen'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($producto['nomproducto'], ENT_QUOTES, 'UTF-8'); ?>" > 
            <?php endif; ?>
            <div class="product-info">
                <h1><?php echo htmlspecialchars($producto['nomproducto'], ENT_QUOTES, 'UTF-8'); ?></h1>
                <p><?php echo htmlspecialchars($producto['descripcion'], ENT_QUOTES, 'UTF-8'); ?></p>
                <p>Precio: $<?php echo htmlspecialchars($producto['precio'], ENT_QUOTES, 'UTF-8'); ?></p>
                <a href="FormularioDesayunos.php?id=<?php echo htmlspecialchars($producto['id_producto'], ENT_QUOTES, 'UTF-8'); ?>" class="button">Realizar pedido</a>
            </div>
        </div>
    <?php endwhile; ?>
     </section>

     <main class="Servicios">
          <div class="Servicios-content container">
            <h2>Contáctanos</h2>
            <div class="Servicios-group">
             <div class="Servicios-1">
              <a href=""><img src="Images_index/facebook.svg" alt=""></a> 
               <h3>Jasmy solutions</h3>
             </div>
             <div class="Servicios-2">
                <img src="Images_index/logojasmy.jpeg" alt="">
                <h3></h3>
              </div>
              <div class="Servicios-3">
                <a href="https://www.instagram.com/jasmy_solutions?igsh=MWRkbmdhMzB3MjdkdQ=="><img src="Images_index/ig.svg" alt=""></a>
                <h3>Jasmy solutions</h3>
               </div>       
            </div>
         <p></p>
       </main>

     <footer>
      <p>&copy; 2024 Desayunos y Sorpresas Mary</p>
    </footer>
</body>
</html>
