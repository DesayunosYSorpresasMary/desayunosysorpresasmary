<?php
include 'db.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepara y ejecuta la consulta SQL para obtener el usuario
    if ($stmt = $conn->prepare("SELECT * FROM sesion WHERE username = ?")) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verifica si el usuario existe
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Depuración
            // var_dump($password); // Contraseña ingresada
            // var_dump($user['password']); // Hash almacenado en la base de datos

            // Verifica la contraseña
            if (password_verify($password, $user['password'])) {
                // Inicio de sesión exitoso
                header("Location: indexadmin.html");
                exit();
            } else {
                // Contraseña incorrecta
                $error = 'Contraseña incorrecta.';
            }
        } else {
            // Usuario no encontrado
            $error = 'Nombre de usuario no encontrado.';
        }

        $stmt->close();
    } else {
        $error = 'Error en la preparación de la consulta.';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <!-- Franja superior con color y título -->
    <div class="Franja-color">
        <h1>Inicio de Sesión</h1>
    </div>

    <!-- Encabezado con imagen de fondo -->
    <div class="header">
        <div class="header-content">
            <h1>Acceso al modo admin</h1>
        </div>
    </div>

    <!-- Contenedor principal para el formulario de inicio de sesión -->
    <div class="container">
        <form method="post" class="login-form">
            <p>
                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" required>
            </p>
            <p>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </p>
            <?php if ($error): ?>
                <div class="error"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            <p>
                <button type="submit" class="btn">Iniciar Sesión</button>
            </p>
            <!-- Se elimina el enlace de registro -->
            <div class="regresar">
                <a href="index2.html" class="btn-regresar">Regresar al Inicio</a>
            </div>
        </form>
    </div>

    <!-- Pie de página -->
    <footer>
        <p>&copy; 2024 Tu Empresa. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
