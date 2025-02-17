<?php
require_once '../conexion.php';

try {
    $stmt = $pdo->query("SELECT id_paquete, nombre, descripcion, precio_total FROM paquetes WHERE estado = 1");
    $paquetes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $paquetes = [];
    $error = "Error al obtener paquetes: " . $e->getMessage();
}
