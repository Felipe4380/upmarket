<?php
// Incluir el header
include 'layouts/header.php';

// Obtener la vista de la URL (por defecto, "home")
$view = isset($_GET['view']) ? $_GET['view'] : 'home';

// Estructura de rutas con switch()
switch ($view) {
    case 'clientes':
        include 'views/clientes.php';
        break;
    case 'paquetes':
        include 'views/paquetes.php';
        break;
    case 'servicios':
        include 'views/servicios.php';
        break;
    case 'tareas':
        include 'views/tareas.php';
        break;
    default:
        include 'views/home.php'; // Vista por defecto
        break;
}

// Incluir el footer
include 'layouts/footer.php';
?>
