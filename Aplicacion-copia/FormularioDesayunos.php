<?php
require_once("conexion.php"); // Incluye el archivo de conexión

$id_producto=$_REQUEST['id'];

// Consulta para obtener todos los productos
$query = "SELECT * FROM produ WHERE id_producto = '$id_producto' ";
$resultado = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>


<html lang="en">
<head>   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desayunos y Sorpresas Mary</title>
    <link rel="stylesheet" href="formulario.css">
</head>                
<body>
  <div class="Franja-color"></div>
    <header class="header">
     


    <div class="menu container">
       <a href="#" class="logo" >
        <img src="Images_index/logo.jpg" alt="Desayunos y sorpresas mary logo" id="logo">
       </a> 
       <a href="#" class="whatsapp" >
        <img src="Images_index/icons8-whatsapp.svg" alt="Desayunos y sorpresas Mary Logo" id="whatsapp">
      </a> 
       <input type="checkbox" id="menu" />
       <label for="menu">
        <img src="Images/menu.png" class="menu-icono" alt=""> 
       </label>
       <nav class="navbar">
        <ul>
            <li><a  href="index.html">Inicio</a></li>
            <li><a href="Sorpresas1.php">Sorpresas</a></li>
            <li><a href="Regalos.php">Regalos</a></li>
            <li><a href="Charolas.php">Charolas</a></li>
            <li><a href="https://wa.link/6o494a">2491316315</a></li>
            
            
        </ul>
       </nav>
      </div>

       <div class="header-content container">

        <h1>Hacer Pedido</h1>
        <p>
            Reserva tu pedido ahora y preparate para
            Disfrutar de momentos memorables.
        </p>
        
       </div>
    </header>
    <section class="Desayunos">
        
      
       
      <p id="p">Requisita los siguientes datos</p>
      <form id="form" action="InsertarUser.php" method="POST">
        <p>
          <label for="nombre">Escribe tu nombre completo:<abbr title="Este campo es obligatorio" aria-label="required">*</abbr></label>
          <input type="text" id="nombre" name="nombre" required>
        </p>
        <p>
          <label for="domicilio">Domicilio:<abbr title="Este campo es obligatorio" aria-label="required">*</abbr></label>
          <input type="text" id="domicilio" name="domicilio" required>
        </p>
        <p>
          <label for="numcel">Numero telefonico de contacto:<abbr title="Este campo es obligatorio" aria-label="required">*</abbr></label>
          <input type="text" id="numcel" name="numcel" required>
        </p>
        <p>
          <label for="cantidad">¿Cuantas unidades requiere? <abbr title="Este campo es obligatorio" aria-label="required">*</abbr></label>
          <input type="number" min="1" max="50" step="1" id="cantidad" name="cantidad" required>
        </p>
        <p>
          <label for="comentarios">¿Desea dejar algun mensaje adicional? <abbr title="Este campo es obligatorio" aria-label="required">*</abbr></label>
          <textarea id="comentarios" name="comentarios" maxlength="140" rows="5"></textarea>
        </p>
        <?php while ($producto = mysqli_fetch_assoc($resultado)): ?>
        <input type="hidden" name="desayuno" value="<?php echo htmlspecialchars($producto['nomproducto'], ENT_QUOTES, 'UTF-8'); ?>" >
        <input type="hidden" name="precio" value="<?php echo htmlspecialchars($producto['precio'], ENT_QUOTES, 'UTF-8'); ?>" >
        <?php endwhile; ?>
        <p>
            <button>Enviar</button>
           
        </p>
        </form>
      
      

     </section>

     <main class="Servicios">
          <div class="Servicios-content container">
            <h2>Contactános</h2>
           
            <div class="Servicios-group">

             <div class="Servicios-1">
              <a href="https://www.facebook.com/jasmy.solutions?mibextid=ZbWKwL"><img src="Images_index/facebook.svg" alt=""></a> 
               <h3></h3>
             </div>
             <div class="Servicios-2">
                <img src="Images_index/logojasmy.jpeg" alt="">
                <h3></h3>
              </div>
              <div class="Servicios-3">
                <a href="https://www.instagram.com/jasmy_solutions?igsh=MWRkbmdhMzB3MjdkdQ=="><img src="Images_index/ig.svg" alt=""></a>
                <h3></h3>
               </div>       
           
            </div>
         <p>
           
         </p>
       
   
    </main>


   

 
</section> 
<footer>
  <p>&copy; 2024 Desayunos y Sorpresas Mary</p>
</footer>


</body>
</html>