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
    <title>Iniciar sesión</title>
    
    <!-- Bootstrap -->
    <link href="../bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Estilos personalizados -->
    <link href="../styles/login.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Barra superior (Navbar) con solo el logo -->
    <nav class="navbar navbar-dark bg-dark p-0">
        <div class="container-fluid d-flex justify-content-center">
            <a class="navbar-brand" href="../index.php">
                <img src="../recursos/img/logo/logo.png" alt="Logo" class="logo-login">
            </a>
        </div>
    </nav>

    <!-- Formulario de inicio de sesión (centrado) -->
    <div class="container flex-grow-1 d-flex align-items-center justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Iniciar sesión</h2>

                        <!-- Mensaje de error si las credenciales son incorrectas -->
                        <?php if (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger text-center"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
                        <?php endif; ?>

                        <!-- Formulario -->
                        <form action="../controllers/login_controller.php" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-dark w-100">Iniciar sesión</button>
                        </form>

                        <div class="mt-3 text-center">
                            <p>¿Aún no tienes cuenta? <a href="registro.php" class="text-decoration-none">Regístrate aquí</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <p class="mb-0">&copy; <?php echo date("Y"); ?> Up Market - Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="../bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
