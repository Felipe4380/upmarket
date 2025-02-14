<?php
require_once __DIR__ . '/../conexion.php'; // Esto sube un nivel y busca tu conexion.php

try {
    $stmt = $pdo->query("SELECT id_usuario, nombre, email, telefono FROM usuarios WHERE id_rol = 3");
    $clientes = $stmt->fetchAll();
} catch (PDOException $e) {
    $clientes = [];
    $error = "Error al obtener clientes: " . $e->getMessage();
}
?>
