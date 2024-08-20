<?php
// Inicializar variables
$error = '';
$success = '';

// Incluir archivo de conexión a la base de datos
include 'db.php';

// Procesar el formulario si se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST['new_username'];
    $new_password = $_POST['new_password'];

    // Validar los datos
    if (empty($new_username) || empty($new_password)) {
        $error = 'Por favor, complete todos los campos.';
    } else {
        // Preparar y ejecutar la consulta de actualización
        if ($stmt = $conn->prepare("UPDATE sesion SET username = ?, password = ? WHERE id = 1")) {
            // Hash de la nueva contraseña
            $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);

            // Asociar parámetros y ejecutar la consulta
            $stmt->bind_param("ss", $new_username, $new_password_hashed);

            if ($stmt->execute()) {
                // Verificar si se actualizó alguna fila
                if ($stmt->affected_rows > 0) {
                    $success = 'Datos actualizados con éxito.';
                } else {
                    $error = 'No se realizó ningún cambio.';
                }
            } else {
                $error = 'Hubo un problema al actualizar los datos.';
            }

            $stmt->close();
        } else {
            $error = 'Error en la preparación de la consulta.';
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Usuario y Contraseña</title>
    <link rel="stylesheet" href="cambiar_cuenta.css">
</head>
<body>
    <header class="header">
        <div class="header-content container">
            <h1>Cambiar Usuario y Contraseña</h1>
        </div>
    </header>

    <div class="container">
        <form method="post" class="login-form">
            <p>
                <label for="new_username">Nuevo Nombre de Usuario:</label>
                <input type="text" id="new_username" name="new_username" required>
            </p>
            <p>
                <label for="new_password">Nueva Contraseña:</label>
                <input type="password" id="new_password" name="new_password" required>
            </p>
            <?php if ($error): ?>
                <div class="error"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            <?php if ($success): ?>
                <div class="success"><?php echo htmlspecialchars($success); ?></div>
            <?php endif; ?>
            <p>
                <button type="submit" class="btn">Actualizar Datos</button>
            </p>
            <p>
                <a href="indexadmin.html" class="btn-regresar">Regresar a la Página de Administración</a>
            </p>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Desayunos y Sorpresas Mary</p>
    </footer>
</body>
</html>
