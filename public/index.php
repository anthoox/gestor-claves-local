<?php include_once 'C:\wamp64\www\gestor-claves-local\app\views\components\head.php'; ?>

    <div class="container-fluid  d-flex align-items-center flex-column mt-5 p-3">
        <div class="text-center mb-4 mt-5">
            <img src="/images/logo.png" alt="Logo" class="img-fluid" style="max-width: 200px;">
        </div>
        <div class="text-center mb-4">
            <h1>Bienvenido al Gestor de Claves Local</h1>
            <p>Por favor, inicia sesión para continuar.</p>
        </div>
        <form id="loginForm" method="post" action="/login" class="col-10">
            <div class="mb-3">
                <label for="username" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
        </form>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="..//public/js/bootstrap.bundle.min.js"></script>

    <!-- Tu JS personalizado -->
    <!-- <script src="js/script.js"></script> -->
</body>

</html>