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
    <title>Formulario CVenlinea</title>
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
        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            background-color: #F4F6F6;
            padding: 20px 0;
        }
        section {
            width: 80%;
            max-width: 800px;
            background-color: #ffffff;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            border-top: 5px solid #4CAF50;
        }
    </style>
</head>
<body>
    <!-- Encabezado -->
    <header class="bg-dark text-white py-4 px-6 shadow-sm sticky-top">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <a href="#" class="d-flex align-items-center gap-2 text-decoration-none">
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
                                    <a class="nav-link" href="index.php">Home</a>
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
                    <a href="#" class="btn btn-outline-light me-2">Iniciar Sesión</a>
                    <a href="#" class="btn btn-light">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Contenido principal -->
    <main>
        <section>
            <h2>Ingrese la información solicitada</h2>
            <form method="POST" enctype="multipart/form-data">
                <input type="text" name="name" class="form-control mb-2" placeholder="Nombre">
                <input type="text" name="ale" class="form-control mb-2" placeholder="¿Tiene alergias?">
                <input type="text" name="tale" class="form-control mb-2" placeholder="¿Qué alergias?">
                <input type="text" name="contacto" class="form-control mb-2" placeholder="Contacto">
                <input type="text" name="tipo" class="form-control mb-2" placeholder="Tipo de contacto">
                <input type="text" name="tipos" class="form-control mb-2" placeholder="Tipo de Sangre">
                <input type="number" name="peso" class="form-control mb-2" placeholder="Peso">
                <input type="number" name="altura" class="form-control mb-2" placeholder="Altura">
                <input type="text" name="telefono" class="form-control mb-2" placeholder="Teléfono">
                <input type="text" name="empresa" class="form-control mb-2" placeholder="Nombre de la Empresa">
                <input type="text" name="cargo" class="form-control mb-2" placeholder="Cargo que tenía">
                <input type="text" name="des" class="form-control mb-2" placeholder="Describa brevemente lo que hacía">
                <input type="number" name="inicio" class="form-control mb-2" placeholder="Año en el que inició">
                <input type="number" name="fin" class="form-control mb-2" placeholder="Año en el que finalizó">
                <input type="text" name="carrera" class="form-control mb-2" placeholder="Nombre de su carrera">
                <input type="number" name="inicioc" class="form-control mb-2" placeholder="Cuándo inició su carrera">
                <input type="number" name="finc" class="form-control mb-2" placeholder="Cuándo finalizó su carrera">
                <input type="text" name="desc" class="form-control mb-2" placeholder="Describa su carrera">
                <input type="text" name="habilidad" class="form-control mb-2" placeholder="¿Qué habilidades tiene?">
                <input type="text" name="nivel" class="form-control mb-2" placeholder="Nivel de sus habilidades">
                <input type="text" name="desh" class="form-control mb-2" placeholder="Describa sus habilidades">
                <input type="text" name="titulo" class="form-control mb-2" placeholder="Título alcanzado">
                <input type="number" name="tituloa" class="form-control mb-2" placeholder="Año del título">
                <input type="text" name="nombrep" class="form-control mb-2" placeholder="Nombre de sus pasatiempos">
                <input type="text" name="desp" class="form-control mb-2" placeholder="Describa su pasatiempo">
                <input type="text" name="profesion" class="form-control mb-2" placeholder="Diga su profesión">
                <input type="text" name="cargor" class="form-control mb-2" placeholder="Cargo para el cual se postula">
                <input type="text" name="empresar" class="form-control mb-2" placeholder="Empresa para la cual se postula">
                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen" id="imagen" class="form-control mb-3">
                <input type="submit" name="register" class="btn btn-primary" value="Enviar">
            </form>
            <?php include("registro.php"); ?>
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
