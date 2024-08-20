<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Formulario de captura</title>
<link rel="stylesheet" href="estilo.css">
</head>
<body>
<a href="index.php">Inicio</a> 
<h1>Formulario de Registro de pedidos</h1>
<form action="InsertarUser.php" method="POST" class="form-register">
  <h2 class="form_titulo"> Ingresa tus datos</h2>
  <div class="contenedor-inputs">
    <input type="text" name="nombre" placeholder="nombre:" class="input-100" required />
    <input type="text" name="domicilio" placeholder="domicilio:" class="input-100" required />
    <input type="text" name="numcel" placeholder="numcel:" class="input-100" required />
    <input type="text" name="producto" placeholder="producto:" class="input-100" required />
    <input type="text" name="cantidad" placeholder="cantidad:" class="input-100" required />
    <input type="text" name="comentarios" placeholder="comentarios:" class="input-100" required />
    <input type="submit" value="enviar" class="btn-enviar"/>
  </div>
  <a href="MuestraUser.php">Visualizar Registros</a>
</form>
</body>
</html>
