<?php
session_start();
require '../conexion.php'; // Conectamos a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $telefono = trim($_POST['telefono']);
    $password = trim($_POST['password']);
    $password_confirm = trim($_POST['password_confirm']);

    // Validar que los campos no estén vacíos
    if (empty($nombre) || empty($email) || empty($telefono) || empty($password) || empty($password_confirm)) {
        $_SESSION['error'] = "Todos los campos son obligatorios.";
        header("Location: ../views/registro.php");
        exit();
    }

    // Validar que el email sea válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Correo electrónico no válido.";
        header("Location: ../views/registro.php");
        exit();
    }

    // Validar que las contraseñas coincidan
    if ($password !== $password_confirm) {
        $_SESSION['error'] = "Las contraseñas no coinciden.";
        header("Location: ../views/registro.php");
        exit();
    }

    // Hash de la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Verificar si el correo o el teléfono ya están registrados
        $stmt = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :email OR telefono = :telefono");
        $stmt->execute(['email' => $email, 'telefono' => $telefono]);
        
        if ($stmt->fetch()) {
            $_SESSION['error'] = "El correo electrónico o el teléfono ya están en uso.";
            header("Location: ../views/registro.php");
            exit();
        }

        // Insertar el usuario en la base de datos
        $sql = "INSERT INTO usuarios (nombre, email, telefono, contraseña, id_rol, estado) 
                VALUES (:nombre, :email, :telefono, :password, 2, 1)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nombre' => $nombre,
            'email' => $email,
            'telefono' => $telefono,
            'password' => $hashed_password
        ]);

        $_SESSION['success'] = "Registro exitoso. Ahora puedes iniciar sesión.";
        header("Location: ../views/login.php");
        exit();

    } catch (PDOException $e) {
        $_SESSION['error'] = "Error en el registro: " . $e->getMessage();
        header("Location: ../views/registro.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Acceso no permitido.";
    header("Location: ../views/registro.php");
    exit();
}
