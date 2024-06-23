<?php

    include 'conexion_be.php';

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    //$contrasena = $_POST['contrasena'];
    
    //encriptamiento de contrseña
    //la contrasena requiere 129 caracteres en la base de datos
    $contrasena = hash('sha512', $_POST['contrasena']); 

    $query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena) 
               VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena')";
    
    //Verificar que el correo no se repita en la base de datos
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' ");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("Este correo ya esta registrado, intenta con otro diferente.");
                window.location = "../login.php";
            </script>
        ';
        exit();
    }

    //Verificar que el nombre de usuario no se repita en la base de datos
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$usuario' ");

    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '
            <script>
                alert("Este usuario ya esta regristrado, intenta con otro diferente");
                window.location = "../login.php";
            </script>
        ';
        exit();
    }
    //almacenar usuarios en la base de datos
    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
                alert("Usuario almacenado exitosamente");
                window.location = "../login.php";
            </script>
        ';
    }else{
        echo '
            <script>
                alert("Intentalo de nuevo, usuario no almacenado");
                window.location = "../login.php";
            </script>
        ';
    }

    mysqli_close($conexion);
?>
