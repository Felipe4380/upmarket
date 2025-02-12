<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg border-0">
            <div class="card-body">
                <h2 class="text-center mb-4">Crear una cuenta</h2>

                <!-- Mensaje de error si hay problemas en el registro -->
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger text-center"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
                <?php endif; ?>

                <!-- Formulario de registro -->
                <form action="../controllers/register_controller.php" method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre completo</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirm" class="form-label">Confirmar contraseña</label>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
                    </div>
                    <button type="submit" class="btn btn-dark w-100">Registrarse</button>
                </form>

                <div class="mt-3 text-center">
                    <p>¿Ya tienes cuenta? <a href="login.php" class="text-decoration-none">Inicia sesión aquí</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

