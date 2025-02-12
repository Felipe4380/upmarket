<?php
session_start();
require '../conexion.php'; // Conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validar que los campos no estén vacíos
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Todos los campos son obligatorios.";
        header("Location: ../views/login.php");
        exit();
    }

    try {
        // Buscar al usuario por su correo electrónico
        $stmt = $pdo->prepare("SELECT id_usuario, nombre, email, contraseña, id_rol, estado FROM usuarios WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $usuario = $stmt->fetch();

        // Verificar si el usuario existe y si su estado es activo
        if ($usuario && password_verify($password, $usuario['contraseña'])) {
            if ($usuario['estado'] == 0) {
                $_SESSION['error'] = "Tu cuenta está inactiva. Contacta al administrador.";
                header("Location: ../views/login.php");
                exit();
            }

            // Guardar datos en sesión
            $_SESSION['usuario_id'] = $usuario['id_usuario'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];
            $_SESSION['usuario_email'] = $usuario['email'];
            $_SESSION['usuario_rol'] = $usuario['id_rol'];

            // Redirigir según el rol del usuario
            if ($usuario['id_rol'] == 1) {
                header("Location: ../views/admin.php"); // Vista de administrador
            } else {
                header("Location: ../index.php"); // Vista normal
            }
            exit();
        } else {
            $_SESSION['error'] = "Correo o contraseña incorrectos.";
            header("Location: ../views/login.php");
            exit();
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error al iniciar sesión: " . $e->getMessage();
        header("Location: ../views/login.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Acceso no permitido.";
    header("Location: ../views/login.php");
    exit();
}
