<?php
require_once '../conexion.php';

try {
    $stmt = $conexion->query("SELECT id_cliente, nombre, email, telefono FROM clientes");
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $clientes = [];
    $error = "Error al obtener clientes: " . $e->getMessage();
}
?>
