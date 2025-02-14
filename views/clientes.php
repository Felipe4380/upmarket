<?php
require_once 'controllers/clientes_controller.php';
?>

<link href="styles/clientes.css" rel="stylesheet">

<div class="container mt-4">
    <h2 class="text-center mb-4">Listado de Clientes</h2>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger text-center"><?= $error; ?></div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-striped table-hover clientes-table">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($clientes)): ?>
                    <?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><?= htmlspecialchars($cliente['id_usuario']); ?></td>
                            <td><?= htmlspecialchars($cliente['nombre']); ?></td>
                            <td><?= htmlspecialchars($cliente['email']); ?></td>
                            <td><?= htmlspecialchars($cliente['telefono']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No hay clientes registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
