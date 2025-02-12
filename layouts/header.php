<?php
// Iniciar sesión si aún no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Up Market</title>
    
    <!-- Bootstrap -->
    <link href="bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Estilos personalizados -->
    <link href="styles/header.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="recursos/img/logo/logo.png" alt="Up Market" height="50">
        </a>
        <button class="navbar-toggler" type="button" id="navbarToggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="index.php?view=clientes">Clientes</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?view=paquetes">Paquetes</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?view=servicios">Servicios</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?view=tareas">Tareas</a></li>

                <!-- Mostrar opciones solo si el usuario es Admin -->
                <?php if (isset($_SESSION['usuario_id']) && isset($_SESSION['idtipousuario']) && $_SESSION['idtipousuario'] == 1): ?>
                    <li class="nav-item"><a class="nav-link" href="index.php?view=admin">Administración</a></li>
                <?php endif; ?>
            </ul>

            <!-- Botón de inicio/cierre de sesión alineado -->
            <div class="d-flex align-items-center">
                <?php if (!isset($_SESSION['usuario_id'])): ?>
                    <a href="views/login.php" class="btn btn-light">Iniciar sesión</a>
                <?php else: ?>
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i> <?= ucfirst($_SESSION['usuario_nombre']); ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" id="userDropdown">
                            <li><a class="dropdown-item text-danger" href="controllers/logout.php"><i class="bi bi-box-arrow-right"></i> Cerrar sesión</a></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<!-- Bootstrap JS -->
<script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>

<!-- Script para hacer que el navbar colapse correctamente cuando se presiona el botón nuevamente -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const navbarToggler = document.getElementById("navbarToggler");
        const navbarCollapse = document.getElementById("navbarNav");

        if (navbarToggler && navbarCollapse) {
            navbarToggler.addEventListener("click", function () {
                if (navbarCollapse.classList.contains("show")) {
                    navbarToggler.setAttribute("aria-expanded", "false");
                    bootstrap.Collapse.getInstance(navbarCollapse).hide();
                } else {
                    navbarToggler.setAttribute("aria-expanded", "true");
                    new bootstrap.Collapse(navbarCollapse).show();
                }
            });
        }
    });
</script>

<!-- Scripts -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const userMenu = document.getElementById('userMenu');
        const userDropdown = document.getElementById('userDropdown');

        if (userMenu && userDropdown) {
            userMenu.addEventListener('click', function() {
                userDropdown.classList.toggle('show');
            });

            document.addEventListener('click', function(event) {
                if (!userMenu.contains(event.target) && !userDropdown.contains(event.target)) {
                    userDropdown.classList.remove('show');
                }
            });
        }
    });
</script>

</body>
</html>
