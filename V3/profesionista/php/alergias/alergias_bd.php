<?php 

    include '../../../php/conexion_be.php';
    session_start();

    $id_profesionista = $_SESSION['id_usuario'];
    $consulta_portafolio = mysqli_query($conexion, "SELECT * FROM portafolio WHERE id_profesionista='$id_profesionista'");

 /** ---- ALERGIAS ----- */
 
 if(!empty($_POST['alergia'])){
    
    $alergia = $_POST['alergia'];
    $nombre_alergia = strtolower($alergia);

    if(mysqli_num_rows($consulta_portafolio) > 0){
        
        if(isset(($_POST['id_alergia']))){

            $id_alergia = $_POST['id_alergia'];
            
            //Ya existe ese id_alergia, entonces se esta editando el nombre de la alergia.

            $query_editar = "UPDATE alergias SET nombre='$nombre_alergia' WHERE id_datosmedicos='$id_profesionista' and id_alergia='$id_alergia'";

            $ejecutar_editar = mysqli_query($conexion, $query_editar);

            if($ejecutar_editar){
                echo '
                    <script>
                        alert("Se edito exitosamente la alergia.");
                        window.location = "../../crear_cv.php";
                    </script>
                ';

            }else{
                echo '
                    <script>
                        alert("Intentalo de nuevo, alergia no editada.");
                        //window.location = "../../../login.php";
                    </script>
                ';
            }
        }else{

           
        //Busca si hay una alergia del profesionista con el mismo nombre.
        $consulta_alergias = mysqli_query($conexion, "SELECT * FROM alergias WHERE id_datosmedicos='$id_profesionista' and nombre='$nombre_alergia'");
        if(mysqli_num_rows($consulta_alergias) == 0){
            $query_alergias = "INSERT INTO alergias(nombre,id_datosmedicos) VALUES ('$nombre_alergia','$id_profesionista')";

            $ejecutar_alergias = mysqli_query($conexion, $query_alergias);

            if($ejecutar_alergias){
                    echo '
                        <script>
                            alert("Se guardo exitosamente la alergia.");
                            window.location = "../../crear_cv.php";
                        </script>
                    ';

                }else{
                    echo '
                        <script>
                            alert("Intentalo de nuevo, alergia no almacenada.");
                            //window.location = "../../../login.php";
                        </script>
                    ';
                }
            
        }else{
            echo '
                <script>
                    alert("Ya esta registrada esa alergia.");
                    window.location = "../../crear_cv.php";
                </script>
            ';
        }
        
    }
    }else{
        echo '
            <script>
                alert("Primero, llene los datos personales.");
                window.location = "../../crear_cv.php";
            </script>
            ';
    }
 }else{
    echo '
        <script>
            alert("Por favor, no ingrese un dato vacío en alergia. ");
            window.location = "../../crear_cv.php";
        </script>
        ';
}

?>