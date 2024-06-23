<?php
/*
    session_start();

    if (!isset($_SESSION['usuario'])) {
        echo '
            <script>
                alert("Por favor debes iniciar sesión");
                window.location = "login.php";
            </script>
        ';
        session_destroy();
        die();
    }
*/
?>  

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CVenlinea - Tu CV en línea</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        .navbar-nav .nav-link {
            color: white; /* Color de texto */
            padding: 0.5rem 1rem; /* Espaciado interior */
            font-size: 1rem; /* Tamaño de fuente */
        }

        .navbar-nav .nav-link:hover {
            color: #f8f9fa; /* Color de texto al pasar el ratón */
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Encabezado -->
        <header class="bg-dark text-white py-4 px-6 shadow-sm sticky-top">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Logo o Nombre del sitio -->
                    <a href="#" class="d-flex align-items-center gap-2 text-decoration-none">
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
                                        <a class="nav-link" href="#">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Acerca de nosotros</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Contacto</a>
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
                        <a href="#" class="btn btn-outline-light me-2">Iniciar Sesión</a>
                        <a href="#" class="btn btn-light">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </header>


        <!-- Descripción del sitio -->
        <section class="bg-light py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto text-center">
                        <h1 class="display-4 fw-bold text-custom-primary mb-4">Tu CV en línea</h1>
                        <p class="lead text-muted">CVenlinea te ofrece la plataforma ideal para crear y gestionar tu currículum vitae en línea de manera sencilla y efectiva.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección "Nuestros Clientes" con carrusel -->
        <section class="py-5">
            <div class="container">
                <h2 class="fw-bold mb-4 text-custom-primary">Nuestros Clientes</h2>
                <div id="clientCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets\images\bg3.jpg" class="d-block w-100" alt="Cliente 1">
                        </div>
                        <div class="carousel-item">
                            <img src="assets\images\bg1.jpg" class="d-block w-100" alt="Cliente 2">
                        </div>
                        <div class="carousel-item">
                            <img src="assets\images\bg2.jpg" class="d-block w-100" alt="Cliente 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#clientCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#clientCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
            </div>
        </section>

        <!-- Pie de página -->
        <footer class="bg-dark text-white py-4">
            <div class="container text-center">
                &copy; <?php echo date("Y"); ?> CVenlinea. Todos los derechos reservados.
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
