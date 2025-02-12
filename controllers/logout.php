<?php
session_start(); // Inicia la sesión si no está iniciada

// Destruir todas las variables de sesión
$_SESSION = array();

// Destruir la sesión completamente
session_destroy();

// Redirigir al usuario a la página de inicio
header("Location: ../index.php");
exit();
?>
