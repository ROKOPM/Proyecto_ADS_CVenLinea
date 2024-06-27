<?php
    session_start();

    if (isset($_SESSION['usuario'])) {
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión | CVenLinea</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body>
    <header class="bg-dark text-white py-4 px-6 shadow-sm sticky-top">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Logo o Nombre del sitio -->
                <a href="index.php" class="d-flex align-items-center gap-2 text-decoration-none text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <span class="fs-4 fw-bold">CVenlinea</span>
                </a>
                <!-- Navegación principal -->
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="index.php">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="cv.php">Crea tu CV</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="Acercade.php">Acerca de nosotros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="Contacto.php">Contacto</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Barra de búsqueda -->
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Buscar</button>
                </form>
                <!-- Inicio de sesión y cierre de sesión -->
                <div>
                    <?php
                    if(!isset($_SESSION['usuario'])) {
                        echo '<a href="login.php" class="btn btn-outline-light me-2">Iniciar Sesión</a>';
                    } else {
                        echo '<a href="./php/cerrar_sesion.php" class="btn btn-light">Cerrar Sesión</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </header>

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Iniciar Sesión</h2>
                        <form id="loginForm" action="php/login_usuario_be.php" method="POST">
                            <div class="form-group">
                                <label for="correo">Correo Electrónico</label>
                                <input type="email" class="form-control" id="correo" name="correo" required>
                            </div>
                            <div class="form-group">
                                <label for="contrasena">Contraseña</label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card shadow-sm mb-4" id="registerCard" style="display: none;">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Registrarse</h2>
                        <form id="registerForm" action="php/registro_usuario_be.php" method="POST">
                            <div class="form-group">
                                <label for="nombre_completo">Nombre Completo</label>
                                <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required>
                            </div>
                            <div class="form-group">
                                <label for="correo_registro">Correo Electrónico</label>
                                <input type="email" class="form-control" id="correo_registro" name="correo" required>
                            </div>
                            <div class="form-group">
                                <label for="usuario">Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" required>
                            </div>
                            <div class="form-group">
                                <label for="contrasena_registro">Contraseña</label>
                                <input type="password" class="form-control" id="contrasena_registro" name="contrasena" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="text-center">
                    <button id="toggleRegisterBtn" class="btn btn-link">¿No tienes cuenta? Regístrate aquí</button>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            &copy; <?php echo date("Y"); ?> CVenlinea. Todos los derechos reservados.
        </div>
    </footer>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('toggleRegisterBtn').addEventListener('click', function() {
            var loginForm = document.getElementById('loginForm');
            var registerCard = document.getElementById('registerCard');

            if (registerCard.style.display === 'none') {
                loginForm.style.display = 'none';
                registerCard.style.display = 'block';
                this.textContent = '¿Ya tienes cuenta? Inicia sesión aquí';
            } else {
                registerCard.style.display = 'none';
                loginForm.style.display = 'block';
                this.textContent = '¿No tienes cuenta? Regístrate aquí';
            }
        });
    </script>
</body>
</html>
