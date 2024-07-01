<?php include '../../../php/conexion_be.php';
    
    session_start();

    $id_profesionista = $_SESSION['id_usuario'];
    $consulta_portafolio = mysqli_query($conexion, "SELECT * FROM portafolio WHERE id_profesionista='$id_profesionista'");

    $dato_contacto = $_POST['dato_contacto'];
    $tipo_contacto = $_POST['tipo_contacto'];

    if(mysqli_num_rows($consulta_portafolio) > 0){

        if(isset($_POST['id_contacto'])){
            $id_contacto = $_POST['id_contacto'];

            //Ya existe ese id_contacto, entonces se esta editando el nombre de la alergia.

            $query_editar = "UPDATE contacto SET contacto='$dato_contacto', tipo='$tipo_contacto' 
                            WHERE id_profesionista='$id_profesionista' and id_contacto='$id_contacto'";

            $ejecutar_editar = mysqli_query($conexion, $query_editar);

            if($ejecutar_editar){
                echo '
                    <script>
                        alert("Se edito exitosamente el medio de contacto.");
                        window.location = "../../crear_cv.php";
                    </script>
                ';

            }else{
                echo '
                    <script>
                        alert("Intentalo de nuevo, medio de contacto no editado.");
                        //window.location = "../../../login.php";
                    </script>
                ';
            }
        }
        else{

        //Busca si hay un contacto del profesionista con el mismo dato.
        $consulta_contactos = mysqli_query($conexion, "SELECT * FROM contacto WHERE 
        id_profesionista='$id_profesionista' and (contacto='$dato_contacto' and tipo='$tipo_contacto')");

        if(mysqli_num_rows($consulta_contactos) == 0){
            //Nuevo dato de contacto
            $query_contacto = "INSERT INTO contacto(tipo,contacto,id_profesionista) 
                                VALUES ('$tipo_contacto','$dato_contacto','$id_profesionista');";
            
            $ejecutar_contacto = mysqli_query($conexion, $query_contacto);

            if($ejecutar_contacto){
                echo '
                    <script>
                        alert("Se guardo exitosamente el medio de contacto.");
                        window.location = "../../crear_cv.php";
                    </script>
                ';
            }else{
                echo '
                    <script>
                        alert("Intentalo de nuevo, medio de contacto no almacenada.");
                        //window.location = "../../../login.php";
                    </script>
                ';
            }
        }else{
            echo '<script>alert("Ya existe ese contacto.")</script>';
            header('location: ../../crear_cv.php');
        }
    }
    }else{
        echo '<script> alert("Por favor, primero llene los datos personales.") </script>';
        header('location: ../../crear_cv.php');
    };
