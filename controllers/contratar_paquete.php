<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    $_SESSION['error'] = "Debes iniciar sesión para contratar un paquete.";
    header("Location: ../views/login.php");
    exit();
}

if (isset($_GET['id_paquete'])) {
    $id_paquete = intval($_GET['id_paquete']);

    // Aquí puedes agregar lógica para guardar el paquete contratado en la BD
    $_SESSION['mensaje'] = "Has contratado el paquete con ID: " . $id_paquete;
    header("Location: ../index.php?view=paquetes");
    exit();
} else {
    $_SESSION['error'] = "Paquete no válido.";
    header("Location: ../index.php?view=paquetes");
    exit();
}
