<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contáctanos | CVenlinea</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F4F6F6;
        }
        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: calc(100vh - 100px); /* Ajuste para footer */
        }
        section {
            width: 80%;
            max-width: 800px;
            background-color: #ffffff;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 20px auto;
        }
        section:nth-child(even) {
            background-color: #f2f2f2;
        }
        section:nth-child(odd) {
            background-color: #e9e9e9;
        }
        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            margin-top: auto;
            border-top: 5px solid #4CAF50;
            text-align: center;
        }
        .gallery-individual-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 50px;
            flex-wrap: wrap; /* Permite que los elementos se envuelvan en pantallas pequeñas */
        }
        .contact-info {
            text-align: center;
            flex: 1; /* Permite flexibilidad de tamaño */
        }
        .contact-info span {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <!-- Encabezado -->
    <header class="bg-dark text-white py-3 sticky-top">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <!-- Logo o Nombre del sitio -->
                <a href="index.php" class="d-flex align-items-center text-white text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <span class="fs-4 fw-bold ms-2">CVenlinea</span>
                </a>
                <!-- Navegación principal -->
                <nav class="navbar navbar-expand-lg navbar-dark flex-grow-1">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Encontrar CV's</a>
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
                <!-- Barra de búsqueda -->
                <form class="d-flex mt-3 mt-lg-0">
                    <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Buscar</button>
                </form>
                <!-- Inicio de sesión y cierre de sesión -->
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
    
    <main>
        <section>
            <h2>Contáctanos</h2>
            <p>En caso de cualquier problema, queja, duda o sugerencia.</p>
            <p>Contactenos a</p>

            <div class="gallery-individual-container">
                <div class="contact-info">
                <a href="#telefono"><img src="assets/images/Telefono.png" alt="Telefono" width="50" height="50"></a>
                    <span>55 99999999</span>
                </div>
                <div class="contact-info">
                <a href="#correo"><img src="assets/images/Correo.png" alt="Correo" width="50" height="50"></a>
                    <span>CVenlinea@gmail.com</span>
                </div>
            </div>
        </section>
    </main>
    <!-- Pie de página -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            &copy; <?php echo date("Y"); ?> CVenlinea. Todos los derechos reservados.
        </div>
    </footer>
    <!-- Bootstrap JS y Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
