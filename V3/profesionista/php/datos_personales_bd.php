<?php
    include '../../php/conexion_be.php';
    session_start();

    $id_profesionista = $_SESSION['id_usuario'];
    $consulta_portafolio = mysqli_query($conexion, "SELECT * FROM portafolio WHERE id_profesionista='$id_profesionista'");


    /** ---- DATOS PERSONALES ----- */

    if(!empty($_POST['profesion']) && !empty($_POST['tipo_sangre']) && !empty($_POST['peso']) && !empty($_POST['altura']) &&
        !empty($_POST['CE_nombre']) && !empty($_POST['CE_telefono'])){
            
            $profesion = $_POST['profesion'];
            $tipo_sangre = $_POST['tipo_sangre'];
            $peso = $_POST['peso'];
            $altura = $_POST['altura'];
            $CE_nombre = $_POST['CE_nombre'];
            $CE_telefono = $_POST['CE_telefono'];

            if(mysqli_num_rows($consulta_portafolio) > 0){

                //Ya existe un portafolio y por ende datos medicos, entonces se edita.
        
                $editar_portafolio = "UPDATE portafolio SET profesion='$profesion' WHERE id_profesionista='$id_profesionista'";
                
                $ejecutar_portafolio = mysqli_query($conexion, $editar_portafolio);
        
                /*if($ejecutar_portafolio){
                    echo '
                        <script>
                            alert("Se actualizo exitosamente el portafolio.");
                            //window.location = "../crear_cv.php";
                        </script>
                    ';
                }else{
                    echo '
                        <script>
                            alert("Intentalo de nuevo, portafolio no actualizado.");
                            //window.location = "../login.php";
                        </script>
                    ';
                }*/
        
                $editar_datosmedicos = "UPDATE datosmedicos SET tipo_sangre='$tipo_sangre', peso='$peso', altura='$altura', 
                CE_nombre='$CE_nombre', CE_telefono='$CE_telefono'  WHERE id_profesionista='$id_profesionista'";
                
                $ejecutar_datosmedicos = mysqli_query($conexion, $editar_datosmedicos);
        
                if($ejecutar_datosmedicos && $ejecutar_portafolio){
                    echo '
                        <script>
                            alert("Se actualizo exitosamente los datos.");
                            window.location = "../crear_cv.php";
                        </script>
                    ';
                }else if(!$ejecutar_portafolio){
                    echo '
                        <script>
                            alert("Intentalo de nuevo, portafolio no actualizado.");
                            //window.location = "../login.php";
                        </script>
                    ';
                }else{
                    echo '
                        <script>
                            alert("Intentalo de nuevo, datos médicos no actualizados.");
                            //window.location = "../../../login.php";
                        </script>
                    ';
                }
                
        
            }else{ 
        
                $query_portafolio = "INSERT INTO portafolio(id_profesionista, profesion) 
                       VALUES('$id_profesionista', '$profesion')";
                
                $ejecutar_portafolio = mysqli_query($conexion, $query_portafolio);
        
                /*if($ejecutar_portafolio){
                    echo '
                        <script>
                            alert("Se guardo exitosamente el portafolio.");
                            window.location = "../crear_cv.php";
                        </script>
                    ';
                }else{
                    echo '
                        <script>
                            alert("Intentalo de nuevo, portafolio no almacenado");
                            //window.location = "../login.php";
                        </script>
                    ';
                }*/
                
                $query_datosmedicos = "INSERT INTO datosmedicos(id_profesionista, tipo_sangre, peso, altura, CE_nombre, CE_telefono) 
                       VALUES('$id_profesionista', '$tipo_sangre', '$peso', '$altura', '$CE_nombre', '$CE_telefono')";
        
                    $ejecutar = mysqli_query($conexion, $query_datosmedicos);
        
                    /*if($ejecutar_datosmedicos){
                        echo '
                            <script>
                                alert("Se guardo exitosamente los datos médicos.");
                                window.location = "../crear_cv.php";
                            </script>
                        ';
                    }else{
                        echo '
                            <script>
                                alert("Intentalo de nuevo, datos médicos no almacenados.");
                                //window.location = "../../../login.php";
                            </script>
                        ';
                    }*/ 
                }
    }else{

        $profesion = "";
        $tipo_sangre = "";
        $peso = "";
        $altura = "";
        $CE_nombre = "";
        $CE_telefono = "";
        $disabled = "";

        echo '<script>
                alert("Llena todos los campos de datos personales, por favor.");
                window.location = "../crear_cv.php";
                </script>';
    } 
    
    
    
    mysqli_close($conexion); 
?>