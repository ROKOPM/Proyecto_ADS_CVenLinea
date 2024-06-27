<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca de nosotros | CVenlinea</title>
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
            min-height: 100vh;
            padding: 20px;
        }

        section {
            width: 100%;
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
            text-align: center;
        }

        .gallery img {
            margin: 0 10px;
        }

        .team-member {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0;
        }

        .team-member img {
            width: 50px;
            height: 50px;
        }

        .team-member div {
            flex: 1;
            margin-left: 20px;
        }

        .team-member div span {
            display: block;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Encabezado -->
    <header class="bg-dark text-white py-4 px-6 shadow-sm sticky-top">
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
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
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
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Buscar</button>
                </form>
                <div>
                    <?php
                    if (!isset($_SESSION['usuario'])) 
                        echo '<a href="login.php" class="btn btn-outline-light me-2">Iniciar Sesión</a>';
                    else 
                        echo '<a href="./php/cerrar_sesion.php" class="btn btn-light">Cerrar Sesión</a>';
                    ?>
                </div>
            </div>
        </div>
    </header>

    <!-- Contenido Principal -->
    <main>
        <section>
            <h2>Conócenos</h2>
            <div class="gallery">
                <div class="team-member">
                    <img src="assets/images/adm.png" alt="Ricardo Antonio">
                    <div><span>Ricardo Antonio Pimentel González</span></div>
                </div>
                <div class="team-member">
                    <img src="assets/images/adm.png" alt="Adriana">
                    <div><span>Adriana Rocha García</span></div>
                </div>
                <div class="team-member">
                    <img src="assets/images/adm.png" alt="Luis">
                    <div><span>Luis Alberto Mendoza Chávez</span></div>
                </div>
                <div class="team-member">
                    <img src="assets/images/adm.png" alt="Ricardo">
                    <div><span>Ricardo San Agustín Alcivar</span></div>
                </div>
            </div>
            <p>En CVenlinea nuestra misión es ayudar a todos aquellos que desean destacarse y darse a conocer en el mundo digital a través de la creación de un CV.</p>
            <h3>¿Quiénes somos?</h3>
            <p>Somos un equipo apasionado por la tecnología y el desarrollo profesional, comprometidos con proporcionar una plataforma accesible y fácil de usar para crear y gestionar currículums vitae.</p>
            <h3>¿Qué hacemos?</h3>
            <p>Ofrecemos una herramienta en línea que permite a los usuarios diseñar, personalizar y compartir su CV de forma sencilla y rápida. CVenlinea te brinda las herramientas necesarias para destacar tus logros y habilidades de la mejor manera posible.</p>
            <h3>Nuestro propósito</h3>
            <p>Nuestro objetivo principal es empoderar a nuestros usuarios para que puedan presentarse de manera efectiva en el competitivo mercado laboral. En CVenlinea, nos apasiona ver cómo nuestros usuarios alcanzan sus metas profesionales. Únete a nosotros y descubre cómo podemos ayudarte a brillar en el mundo digital.</p>
        </section>
    </main>

    <!-- Pie de página -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            &copy; <?php echo date("Y"); ?> CVenlinea. Todos los derechos reservados.
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
