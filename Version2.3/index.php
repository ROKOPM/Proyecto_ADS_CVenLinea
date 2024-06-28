<?php
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

//include("conexion.php");

// Función para obtener las imágenes de los CVs subidos
/*
function fetch_all_images($conex) {
    $query = "SELECT nombre_imagen FROM imagenes ORDER BY id DESC";
    $result = mysqli_query($conex, $query);
    $images = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $images[] = $row['nombre_imagen'];
        }
    }
    return $images;
}

$images = fetch_all_images($conex);
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
            color: white;
            padding: 0.5rem 1rem;
            font-size: 1rem;
        }
        .navbar-nav .nav-link:hover {
            color: #f8f9fa;
        }
        .text-custom-primary {
            color: #007bff;
        }
        .carousel-item img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            filter: invert(1);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Encabezado -->
        <header class="bg-dark text-white py-4 shadow-sm sticky-top">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="index.php" class="d-flex align-items-center gap-2 text-decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span class="fs-4 fw-bold">CVenlinea</span>
                    </a>
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">Inicio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="cv.php">Crea tu CV</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="Acercade.php">Acerca de nosotros</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="Contacto.php">Contacto</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Buscar">
                        <button class="btn btn-outline-light" type="submit">Buscar</button>
                    </form>
                    <div class="mt-3 mt-lg-0">
                    <?php
                        if(!isset($_SESSION['usuario'])) 
                            echo '<a href="login.php" class="btn btn-outline-light">Iniciar Sesión</a>';
                        else echo '<a href="./php/cerrar_sesion.php" class="btn btn-light">Cerrar Sesión</a>';
                    ?>
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
                <h2 class="fw-bold mb-4 text-custom-primary">Últimos CV Subidos</h2>
                <div id="clientCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <!-- Comentando la parte PHP del carrusel dinámico -->
                        <!--
                        <?php if (!empty($images)): ?>
                            <?php foreach ($images as $index => $image): ?>
                                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                    <img src="uploadImagen/<?php echo $image; ?>" class="d-block w-100" alt="CV <?php echo $index + 1; ?>">
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="carousel-item active">
                                <img src="assets/images/no-image-available.jpg" class="d-block w-100" alt="No hay imágenes disponibles">
                            </div>
                        <?php endif; ?>
                        -->
                        <!-- Placeholder static images for now -->
                        <div class="carousel-item active">
                            <img src="assets/images/bg3.jpg" class="d-block w-100" alt="Cliente 1">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/bg1.jpg" class="d-block w-100" alt="Cliente 2">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/bg2.jpg" class="d-block w-100" alt="Cliente 3">
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
