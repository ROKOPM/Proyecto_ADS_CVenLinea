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
        body {
            background-color: #F4F6F6;
            font-family: Arial, sans-serif;
        }
        .navbar-nav .nav-link {
            color: white;
            padding: 0.5rem 1rem;
            font-size: 1rem;
        }
        .navbar-nav .nav-link:hover {
            color: #f8f9fa;
        }
        header {
            background-color: #1E3A8A;
        }
        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
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
            border-collapse: collapse;
            background-color: #ffffff;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 1rem;
        }
        th {
            background-color: #1E3A8A;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table-title {
            background-color: #1E3A8A;
            color: white;
            padding: 10px;
            font-size: 1.2rem;
            margin-bottom: 0;
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
                    <a href="#" class="btn btn-outline-light me-2">Iniciar Sesión</a>
                    <a href="#" class="btn btn-light">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </header>
    <!-- Contenido principal -->
    <main>
        <section>
            <div class="accordion" id="dataAccordion">
                <!-- Alergias -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingAlergias">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAlergias" aria-expanded="true" aria-controls="collapseAlergias">
                            Alergias
                        </button>
                    </h2>
                    <div id="collapseAlergias" class="accordion-collapse collapse show" aria-labelledby="headingAlergias" data-bs-parent="#dataAccordion">
                        <div class="accordion-body">
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

                            $data = fetch_data($conex, 'alergias');
                            $headers = ['Numero', 'Alergias', 'TiposdeAlergia'];
                            display_table($data, $headers);
                            ?>
                        </div>
                    </div>
                </div>
                <!-- Contactos -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingContactos">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseContactos" aria-expanded="false" aria-controls="collapseContactos">
                            Contactos
                        </button>
                    </h2>
                    <div id="collapseContactos" class="accordion-collapse collapse" aria-labelledby="headingContactos" data-bs-parent="#dataAccordion">
                        <div class="accordion-body">
                            <?php 
                            $data = fetch_data($conex, 'contacto');
                            $headers = ['ID', 'contacto', 'tipo', 'fecha'];
                            display_table($data, $headers);
                            ?>
                        </div>
                    </div>
                </div>
                <!-- Datos Médicos -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingDatosMedicos">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDatosMedicos" aria-expanded="false" aria-controls="collapseDatosMedicos">
                            Datos Médicos
                        </button>
                    </h2>
                    <div id="collapseDatosMedicos" class="accordion-collapse collapse" aria-labelledby="headingDatosMedicos" data-bs-parent="#dataAccordion">
                        <div class="accordion-body">
                            <?php 
                            $data = fetch_data($conex, 'datosmedicos');
                            $headers = ['id', 'tipos', 'peso', 'altura', 'name', 'telefono'];
                            display_table($data, $headers);
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Datos Experiencia Profesional -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingExpProfesional">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExpProfesional" aria-expanded="false" aria-controls="collapseExpProfesional">
                            Experiencia Profecional
                        </button>
                    </h2>
                    <div id="collapseExpProfesional" class="accordion-collapse collapse" aria-labelledby="headingExpProfesional" data-bs-parent="#dataAccordion">
                        <div class="accordion-body">
                            <?php 
                            $data = fetch_data($conex, 'exp_profesional');
                            $headers = ['id', 'cargo', 'descripcion', 'inicio', 'fin', 'empresa'];
                            display_table($data, $headers);
                            ?>
                        </div>
                    </div>
                </div>
                 <!-- Formación Académica -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFormaciónAcadémica">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFormaciónAcadémica" aria-expanded="false" aria-controls="collapseFormaciónAcadémica">
                        Formación Académica
                        </button>
                    </h2>
                    <div id="collapseFormaciónAcadémica" class="accordion-collapse collapse" aria-labelledby="headingFormaciónAcadémica" data-bs-parent="#dataAccordion">
                        <div class="accordion-body">
                            <?php 
                            $data = fetch_data($conex, 'formacademica');
                            $headers = ['id', 'carrera', 'inicioc', 'finc', 'descr'];
                            display_table($data, $headers);
                            ?>
                        </div>
                    </div>
                </div>
                <!-- Habilidades -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingHabilidades">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHabilidades" aria-expanded="false" aria-controls="collapseHabilidades">
                        Habilidades
                        </button>
                    </h2>
                    <div id="collapseHabilidades" class="accordion-collapse collapse" aria-labelledby="headingHabilidades" data-bs-parent="#dataAccordion">
                        <div class="accordion-body">
                            <?php 
                            $data = fetch_data($conex, 'habilidades');
                            $headers = ['id', 'habilidad', 'nivel', 'descripcion'];
                            display_table($data, $headers);
                            ?>
                        </div>
                    </div>
                </div>
                <!-- Logros -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingLogros">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLogros" aria-expanded="false" aria-controls="collapseLogros">
                        Logros
                        </button>
                    </h2>
                    <div id="collapseLogros" class="accordion-collapse collapse" aria-labelledby="headingLogros" data-bs-parent="#dataAccordion">
                        <div class="accordion-body">
                            <?php 
                           $data = fetch_data($conex, 'logros');
                           $headers = ['id', 'titulo', 'año'];
                            display_table($data, $headers);
                            ?>
                        </div>
                    </div>
                </div>
 <!-- PasaTiempos -->
 <div class="accordion-item">
                    <h2 class="accordion-header" id="headingPasaTiempos">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePasaTiempos" aria-expanded="false" aria-controls="collapsePasaTiempos">
                        Pasa Tiempos
                        </button>
                    </h2>
                    <div id="collapsePasaTiempos" class="accordion-collapse collapse" aria-labelledby="headingPasaTiempos" data-bs-parent="#dataAccordion">
                        <div class="accordion-body">
                            <?php 
                           $data = fetch_data($conex, 'pasatiempos');
                           $headers = ['id', 'nombre', 'descripcion'];
                            display_table($data, $headers);
                            ?>
                        </div>
                    </div>
                </div>
 <!-- Portafolio -->
 <div class="accordion-item">
                    <h2 class="accordion-header" id="headingPortafolio">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePortafolio" aria-expanded="false" aria-controls="collapsePortafolio">
                        Portafolio
                        </button>
                    </h2>
                    <div id="collapsePortafolio" class="accordion-collapse collapse" aria-labelledby="headingPortafolio" data-bs-parent="#dataAccordion">
                        <div class="accordion-body">
                            <?php 
                           $data = fetch_data($conex, 'portafolio');
                           $headers = ['id', 'profesion'];
                            display_table($data, $headers);
                            ?>
                        </div>
                    </div>
                </div>
 <!-- Reclutador -->
 <div class="accordion-item">
                    <h2 class="accordion-header" id="headingReclutador">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReclutador" aria-expanded="false" aria-controls="collapseReclutador">
                        Reclutador
                        </button>
                    </h2>
                    <div id="collapseReclutador" class="accordion-collapse collapse" aria-labelledby="headingReclutador" data-bs-parent="#dataAccordion">
                        <div class="accordion-body">
                            <?php 
                           $data = fetch_data($conex, 'reclutador');
                           $headers = ['id', 'cargo', 'empresa'];
                            display_table($data, $headers);
                            ?>
                        </div>
                    </div>
                </div>
  <!-- Imagenes -->
 <div class="accordion-item">
                    <h2 class="accordion-header" id="headingImágenes">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseImágenes" aria-expanded="false" aria-controls="collapseImágenes">
                        Imágenes
                        </button>
                    </h2>
                    <div id="collapseImágenes" class="accordion-collapse collapse" aria-labelledby="headingImágenes" data-bs-parent="#dataAccordion">
                        <div class="accordion-body">
                            <?php 
                           $data = fetch_data($conex, 'imagenes');
                           $headers = ['id'];  
                           display_table_with_images($data, $headers);
                            function display_table_with_images($data, $headers) {
    if (!empty($data)) {
        echo "<table class='table'>";
        echo "<thead><tr>";
        foreach ($headers as $header) {
            echo "<th>{$header}</th>";
        }
        echo "<th>Imagen</th>";  // Agregamos una columna para la imagen
        echo "</tr></thead><tbody>";
        
        foreach ($data as $row) {
            echo "<tr>";
            foreach ($headers as $header) {
                echo "<td>{$row[$header]}</td>";
            }
            
            $image_path =  '/uploadImagen/' . $row['nombre_imagen'];
            echo "<td><img src='$image_path' alt='Imagen' style='max-width: 60%; height: auto;'></td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<h2>No hay imágenes subidas aún</h2>";
    }
}
                            ?>
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
