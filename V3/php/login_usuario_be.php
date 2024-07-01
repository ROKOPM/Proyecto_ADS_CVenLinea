<?php
    
    session_start();

    include 'conexion_be.php';

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena); 

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo ='$correo'
    and contrasena='$contrasena'");

    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['usuario'] = $correo;
        $usuario = mysqli_fetch_assoc($validar_login);
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['nombre'] = $usuario['nombre_completo'];
        //$_SESSION['nombre'] = 'HolaXD';
        echo '
            <script>
                //alert("ID_usuario"' .$_SESSION['id_usuario']. ');
                window.location = "../nuevo_perfil.php";
            </script>
        ';
        exit;
    }else {
        echo'
            <script>
                alert("Usuario no existe en la base de datos, por favor verifique los datos introducidos");
                window.location = "../index.php";
            </script>
        ';
        exit;
    }

?>
