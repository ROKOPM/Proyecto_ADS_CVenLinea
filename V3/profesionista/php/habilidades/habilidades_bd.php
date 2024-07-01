<?php include '../../../php/conexion_be.php';
    
    session_start();

    $id_profesionista = $_SESSION['id_usuario'];
    $id_portafolio = $_SESSION['id_portafolio'];
    $consulta_portafolio = mysqli_query($conexion, "SELECT * FROM portafolio WHERE id_profesionista='$id_profesionista'");

    $id_habilidad = $_POST['id_habilidad'];
    $nombre_habilidad = $_POST['habilidad'];
    $nivel = $_POST['nivel'];

    if(isset($id_portafolio)){
        if(isset($id_habilidad)){
            //Editar habilidad

        }else{
            //Crear habilidad
            //Busca si hay un contacto del profesionista con el mismo dato.
            $consulta_contactos = mysqli_query($conexion, "SELECT * FROM habilidad WHERE 
                id_profesionista='$id_profesionista' and (contacto='$dato_contacto' and tipo='$tipo_contacto')");
        }
        
    }else{
        echo '<script>alert("Primero, llene los datos personales.");</script>';
    }