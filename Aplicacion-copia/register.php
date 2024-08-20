<?php
include 'db.php';

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar si el nombre de usuario ya existe
    $stmt = $conn->prepare("SELECT id FROM sesion WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error = 'Nombre de usuario ya existe.';
    } else {
        // Hash de la contraseña
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insertar nuevo usuario en la base de datos
        $stmt = $conn->prepare("INSERT INTO sesion (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashed_password);

        if ($stmt->execute()) {
            $success = 'Registro exitoso. Puedes iniciar sesión ahora.';
        } else {
            $error = 'Error al registrar. Por favor, intenta de nuevo.';
        }

        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="styleiniciosesion.css">
</head>
<body>
    <div class="formulario">
        <h1>Registro</h1>
        <form method="post">
            <div class="username">
                <input type="text" name="username" required>
                <label>Nombre de usuario</label>
            </div>
            <div class="contrasena">
                <input type="password" name="password" required>
                <label>Contraseña</label>
            </div>
            <?php if ($error): ?>
                <div class="error"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            <?php if ($success): ?>
                <div class="success"><?php echo htmlspecialchars($success); ?></div>
            <?php endif; ?>
            <input type="submit" value="Registrarse">
            <div class="registrarse">
                Ya tengo una cuenta. <a href="login.php">Iniciar sesión</a>
            </div>
        </form>
    </div>
</body>
</html>
