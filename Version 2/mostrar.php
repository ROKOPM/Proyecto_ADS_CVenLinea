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
            max-width: 1000px;
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
        table {
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
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
                                    <a class="nav-link" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Encontrar CV's</a>
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
        <?php 
include("conexion.php");

function fetch_data($conex, $table) {
    $query = "SELECT * FROM $table";
    $result = mysqli_query($conex, $query);
    return $result;
}

function display_table($data, $headers) {
    echo "<table border='1'>";
    echo "<tr>";
    foreach ($headers as $header) {
        echo "<th>$header</th>";
    }
    echo "</tr>";
    
    while ($row = mysqli_fetch_assoc($data)) {
        echo "<tr>";
        foreach ($headers as $header) {
            if (isset($row[$header])) {
                echo "<td>{$row[$header]}</td>";
            } else {
                echo "<td> - </td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}

// Mostrar datos de la tabla 'alergias'
$data = fetch_data($conex, 'alergias');
$headers = ['id', 'ale', 'tale'];
echo "<h2>Alergias</h2>";
display_table($data, $headers);

// Mostrar datos de la tabla 'contacto'
$data = fetch_data($conex, 'contacto');
$headers = ['ID', 'contacto', 'tipo', 'fecha'];
echo "<h2>Contactos</h2>";
display_table($data, $headers);

// Mostrar datos de la tabla 'datosmedicos'
$data = fetch_data($conex, 'datosmedicos');
$headers = ['id', 'tipos', 'peso', 'altura', 'name', 'telefono'];
echo "<h2>Datos Médicos</h2>";
display_table($data, $headers);

// Mostrar datos de la tabla 'exp_profesional'
$data = fetch_data($conex, 'exp_profesional');
$headers = ['id', 'cargo', 'descripcion', 'inicio', 'fin', 'empresa'];
echo "<h2>Experiencia Profesional</h2>";
display_table($data, $headers);

// Mostrar datos de la tabla 'formacademica'
$data = fetch_data($conex, 'formacademica');
$headers = ['id', 'carrera', 'inicioc', 'finc', 'descr'];
echo "<h2>Formación Académica</h2>";
display_table($data, $headers);

// Mostrar datos de la tabla 'habilidades'
$data = fetch_data($conex, 'habilidades');
$headers = ['id', 'habilidad', 'nivel', 'descripcion'];
echo "<h2>Habilidades</h2>";
display_table($data, $headers);

// Mostrar datos de la tabla 'logros'
$data = fetch_data($conex, 'logros');
$headers = ['id', 'titulo', 'año'];
echo "<h2>Logros</h2>";
display_table($data, $headers);

// Mostrar datos de la tabla 'pasatiempos'
$data = fetch_data($conex, 'pasatiempos');
$headers = ['id', 'nombre', 'descripcion'];
echo "<h2>Pasatiempos</h2>";
display_table($data, $headers);

// Mostrar datos de la tabla 'portafolio'
$data = fetch_data($conex, 'portafolio');
$headers = ['id', 'profesion'];
echo "<h2>Portafolio</h2>";
display_table($data, $headers);

// Mostrar datos de la tabla 'reclutador'
$data = fetch_data($conex, 'reclutador');
$headers = ['id', 'cargo', 'empresa'];
echo "<h2>Reclutadores</h2>";
display_table($data, $headers);

// Mostrar datos de la tabla 'imagenes'
$data = fetch_data($conex, 'imagenes');
$headers = ['id', 'nombre_imagen'];
echo "<h2>Imágenes</h2>";
display_table($data, $headers);

?>
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
