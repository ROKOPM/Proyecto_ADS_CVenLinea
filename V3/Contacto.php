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
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>

        .mi-div {
                  background-color: #333; /* Color de fondo del div */
                  color:#fff;
                  padding: 20px; /* Espacio interno del contenido dentro del div */
                  margin: 0px; /* Margen exterior del div */
                  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra ligera alrededor del margen del div */
                  display: flex; /* Utiliza flexbox para controlar el diseño */
                  gap: 320px; /* Espacio entre los elementos hijos del div */
                  border-bottom: 5px solid #4CAF50; /* Borde superior resaltado */
                  }
        ul.breadcrumb {
                    padding: 8px 16px; /* Espaciado interno (arriba y abajo, izquierda y derecha) de los elementos de la lista */
                    list-style: none; /* Elimina los estilos de lista predeterminados (viñetas, números) */
                    }

                     ul.breadcrumb li {display: inline;}/* Hace que los elementos de la lista se muestren en línea */
        ul.breadcrumb li+li:before {
                     padding: 2px;/* Espacio interno alrededor del separador */
                     color:#FDFEFE;/* Color del separador (en este caso, una barra "/") */
                content: "/\00a0";/* Caracter y espacio (código Unicode) que actúa como separador */
                                 }
        ul.breadcrumb a:link, ul.breadcrumb a:visited {
                                               text-decoration:none;/* Elimina la decoración predeterminada del enlace (subrayado) */
                                               color: #FDFEFE;/* Color del texto de los enlaces */
                                               }

        ul.breadcrumb li a.active {
                                color: #4CAF50;/* Color del texto del enlace activo */
                                font-weight: bold;/* Establece el texto en negrita para el enlace activo */
                                }
        ul.breadcrumb li a.active:hover {
                                 color: #397f3b;/* Cambia el color del texto del enlace activo al pasar el cursor */
                                 font-weight: bold;/* Mantiene el texto en negrita */
                                 }
      /* .btn {
             border: none; 
             color: white; 
             padding: 14px 28px; 
             cursor: pointer; 
             border-radius: 5px; 
             display: inline-block;
             margin: 5px;
            }*/

            .primary {background-image: linear-gradient(to right, #007bff, #4ab2e2);} 
            .primary:hover {background-image: linear-gradient(to right, #0b7dda, #4ab2e2);}
            .secondary {background-image: linear-gradient(to right, #6c757d, #adb5bd);} 
            .secondary:hover {background-image: linear-gradient(to right, #848b92, #adb5bd);}
            .success {background-image: linear-gradient(to right, #28a745, #56c150);} 
            .success:hover {background-image: linear-gradient(to right, #34b556, #56c150);}
            .warning {background-image: linear-gradient(to right, #ffc107, #ffda4e);} 
            .warning:hover {background-image: linear-gradient(to right, #ffb200, #ffda4e);}
            .danger {background-image: linear-gradient(to right, #dc3545, #e0666e);} 
            .danger:hover {background-image: linear-gradient(to right, #d32838, #e0666e);}

        body {
            font-family: Arial, sans-serif; /* Fuente para la página */
            margin: 0; /* Elimina márgenes predeterminados del cuerpo */
            padding: 0; /* Elimina relleno predeterminado del cuerpo */
            background-color: #F4F6F6 ; /* Color de fondo para toda la página */

        }
        main {
            display: flex; /* Usa flexbox para centrar las secciones */
            flex-direction: column; /* Apila las secciones verticalmente */
            align-items: center; /* Centra horizontalmente las secciones */
            min-height: 100vh; /* Asegura que el contenido ocupe al menos toda la altura de la ventana */
        }
        section {
            width: 80%; /* Ancho del contenido de la sección */
            max-width: 800px; /* Ancho máximo de la sección */
            background-color: #ffffff; /* Color de fondo de la sección (blanco en este caso) */
            padding: 20px; /* Espacio interno de la sección */
            margin-bottom: 20px; /* Margen inferior entre secciones */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra ligera para efecto de elevación */
            text-align: center; /* Alinea el contenido al centro dentro de cada sección */
            margin: 20px auto; /* Margen exterior para centrar horizontalmente cada sección */
            max-width: 800px; /* Ancho máximo de cada sección */            
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra ligera para efecto de elevación */
        }
        /* Estilos adicionales según sea necesario */
        section:nth-child(even) {
            background-color: #f2f2f2; /* Cambia el color de fondo de las secciones pares */
        }
        section:nth-child(odd) {
            background-color: #e9e9e9; /* Cambia el color de fondo de las secciones impares */
        }


    </style>
</head>
<!--
 <style>
         .mi-div {
                  background-color: #333; /* Color de fondo del div */
                  color:#fff;
                  padding: 20px; /* Espacio interno del contenido dentro del div */
                  margin: 0px; /* Margen exterior del div */
                  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra ligera alrededor del margen del div */
                  display: flex; /* Utiliza flexbox para controlar el diseño */
                  gap: 320px; /* Espacio entre los elementos hijos del div */
                  border-bottom: 5px solid #4CAF50; /* Borde superior resaltado */
                  }
     ul.breadcrumb {
                    padding: 8px 16px; /* Espaciado interno (arriba y abajo, izquierda y derecha) de los elementos de la lista */
                    list-style: none; /* Elimina los estilos de lista predeterminados (viñetas, números) */
                    }

                     ul.breadcrumb li {display: inline;}/* Hace que los elementos de la lista se muestren en línea */
      ul.breadcrumb li+li:before {
                     padding: 2px;/* Espacio interno alrededor del separador */
                     color:#FDFEFE;/* Color del separador (en este caso, una barra "/") */
                content: "/\00a0";/* Caracter y espacio (código Unicode) que actúa como separador */
                                 }
ul.breadcrumb a:link, ul.breadcrumb a:visited {
                                               text-decoration:none;/* Elimina la decoración predeterminada del enlace (subrayado) */
                                               color: #FDFEFE;/* Color del texto de los enlaces */
                                               }

     ul.breadcrumb li a.active {
                                color: #4CAF50;/* Color del texto del enlace activo */
                                font-weight: bold;/* Establece el texto en negrita para el enlace activo */
                                }
ul.breadcrumb li a.active:hover {
                                 color: #397f3b;/* Cambia el color del texto del enlace activo al pasar el cursor */
                                 font-weight: bold;/* Mantiene el texto en negrita */
                                 }
       .btn {
             border: none; 
             color: white; 
             padding: 14px 28px; 
             cursor: pointer; 
             border-radius: 5px; 
             display: inline-block;
             margin: 5px;
            }

            .primary {background-image: linear-gradient(to right, #007bff, #4ab2e2);} 
            .primary:hover {background-image: linear-gradient(to right, #0b7dda, #4ab2e2);}
            .secondary {background-image: linear-gradient(to right, #6c757d, #adb5bd);} 
            .secondary:hover {background-image: linear-gradient(to right, #848b92, #adb5bd);}
            .success {background-image: linear-gradient(to right, #28a745, #56c150);} 
            .success:hover {background-image: linear-gradient(to right, #34b556, #56c150);}
            .warning {background-image: linear-gradient(to right, #ffc107, #ffda4e);} 
            .warning:hover {background-image: linear-gradient(to right, #ffb200, #ffda4e);}
            .danger {background-image: linear-gradient(to right, #dc3545, #e0666e);} 
            .danger:hover {background-image: linear-gradient(to right, #d32838, #e0666e);}

        body {
            font-family: Arial, sans-serif; /* Fuente para la página */
            margin: 0; /* Elimina márgenes predeterminados del cuerpo */
            padding: 0; /* Elimina relleno predeterminado del cuerpo */
            background-color: #F4F6F6 ; /* Color de fondo para toda la página */

        }
        main {
            display: flex; /* Usa flexbox para centrar las secciones */
            flex-direction: column; /* Apila las secciones verticalmente */
            align-items: center; /* Centra horizontalmente las secciones */
            min-height: 100vh; /* Asegura que el contenido ocupe al menos toda la altura de la ventana */
        }
        section {
            width: 80%; /* Ancho del contenido de la sección */
            max-width: 800px; /* Ancho máximo de la sección */
            background-color: #ffffff; /* Color de fondo de la sección (blanco en este caso) */
            padding: 20px; /* Espacio interno de la sección */
            margin-bottom: 20px; /* Margen inferior entre secciones */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra ligera para efecto de elevación */
            text-align: center; /* Alinea el contenido al centro dentro de cada sección */
            margin: 20px auto; /* Margen exterior para centrar horizontalmente cada sección */
            max-width: 800px; /* Ancho máximo de cada sección */            
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra ligera para efecto de elevación */
        }
        /* Estilos adicionales según sea necesario */
        section:nth-child(even) {
            background-color: #f2f2f2; /* Cambia el color de fondo de las secciones pares */
        }
        section:nth-child(odd) {
            background-color: #e9e9e9; /* Cambia el color de fondo de las secciones impares */
        }
       footer {
               background-color: #333; /* Color de fondo del footer */
               color: #fff; /* Color del texto dentro del footer */
               padding: 20px; /* Espacio interno dentro del footer */
               margin-top: 20px; /* Margen superior del footer */
               border-top: 5px solid #4CAF50; /* Borde superior resaltado */
             }
    </style>
    -->
<body>
    <!-- Encabezado -->
    <header class="bg-dark text-white py-4 px-6 shadow-sm sticky-top">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Logo o Nombre del sitio -->
                    <a href="index.php" class="d-flex align-items-center gap-2 text-decoration-none">
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
                                        <a class="nav-link" href="index.php" style="color:white">Inicio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="nuevo_perfil.php" style="color:white">Ultimos CVs</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="Acercade.php" style="color:white">Acerca de nosotros</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="Contacto.php" style="color:white">Contacto</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- Barra de búsqueda -->
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
                        <button class="btn btn-outline-light" type="submit" style="color:white">Buscar</button>
                    </form>
                    <!-- Inicio de sesión y cierre de sesión -->
                    <div>
                        <?php

                        if(!isset($_SESSION['usuario'])) 
                            echo '<a href="login.php" class="btn btn-outline-light me-2">Iniciar Sesión</a>';
                        else echo '<a href="./profesionista/crear_cv.php" class="btn btn-light">Cuenta</a>
                                   <a href="./php/cerrar_sesion.php" class="btn btn-light">Cerrar Sesión</a>';
                        ?>
                    </div>
                </div>
            </div>
    </header>
    
    <main>
        <section>
            <h2>Contáctanos</h2>
            <div><p>En caso de cualquier problema, queja, duda o sugerencia.</p></div>
            <div class="gallery">
            <div class="gallery-individual-container">
                <pre><img src="assets/images/Telefono.png" alt="Telefono" width="50" height="50">                              <img src="assets/images/Correo.png" alt="Correo" width="50" height="50"></pre>
                <div style="display: flex;justify-content: center;">
                <span style="margin-right:150px; margin-left:50px;">55 99999999</span>
	            <span>CVenlinea@gmail.com</span>
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
</body>
</html>

