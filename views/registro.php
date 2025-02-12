<?php
// Iniciar sesión si aún no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Si el usuario ya está logueado, redirigir a la página principal
if (isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    
    <!-- Bootstrap -->
    <link href="../bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Estilos personalizados -->
    <link href="../styles/register.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Barra superior (Navbar) con solo el logo -->
    <nav class="navbar navbar-dark bg-dark p-0">
        <div class="container-fluid d-flex justify-content-center">
            <a class="navbar-brand" href="../index.php">
                <img src="../recursos/img/logo/logo.png" alt="Logo" class="logo-register">
            </a>
        </div>
    </nav>

    <!-- Contenedor del formulario (llamando a registro_usuario.php) -->
    <div class="container flex-grow-1 d-flex align-items-center justify-content-center">
        <?php include '../formularios/registro_usuario.php'; ?>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <p class="mb-0">&copy; <?php echo date("Y"); ?> Up Market - Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="../bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
