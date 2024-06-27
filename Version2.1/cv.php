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

    <!-- Contenido principal -->
    <main>
        <section>
            <h2>Listo para subir tu CV</h2>
            <button class="btn secondary" onclick="location.href='Registros.html'">Comenzar</button>
        </section>
        <section>
            <h2>Últimos CV Subidos</h2>
            <p>Los CV se actualizan con el último subido pero puedes ver todos si le das en ver más</p>
            <div class="gallery">
                <div class="gallery-individual-container">
                    <?php
                    include("conexion.php");

                    function fetch_latest_image($conex)
                    {
                        $query = "SELECT nombre_imagen FROM imagenes ORDER BY id DESC LIMIT 1";
                        $result = mysqli_query($conex, $query);
                        if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            return $row['nombre_imagen'];
                        }
                        return null;
                    }

                    // Obtener el nombre de la última imagen subida
                    $latest_image = fetch_latest_image($conex);

                    if ($latest_image) {
                        $image_path = '/uploadImagen/' . $latest_image;
                        echo "<h2>Última imagen subida</h2>";
                        echo "<img src='$image_path' alt='Última imagen' style='max-width: 100%; height: auto;'>";
                    } else {
                        echo "<h2>No hay imágenes subidas aún</h2>";
                    }
                    // Mostrar la tabla de pasatiempos
                    $query = "SELECT * FROM pasatiempos";
                    $result = mysqli_query($conex, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        echo "<h2>Lista de Pasatiempos</h2>";
                        echo "<table border='1'>";
                        echo "<tr><th>ID</th><th>Nombre</th><th>Descripción</th></tr>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['nombre']}</td>";
                            echo "<td>{$row['descripcion']}</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<h2>No hay pasatiempos registrados aún</h2>";
                    }
                    ?>
                    <div style="margin-right: 10px;">Texto con margen a la derecha</div>
                    <pre></pre>
                    <div style="display: flex; gap: 150px;">
                        <div><a href="#">Ver más</a></div>
                    </div>
                </div>
            </div>
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
