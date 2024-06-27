<?php 
include("conexion.php");

if(isset($_POST['register'])){
    if(
        strlen($_POST['ale'])>= 1 &&
        strlen($_POST['tale'])>= 1 
        
    ){
            $ale = trim($_POST['ale']);
            $tale = trim($_POST['tale']);
            $consulta = "INSERT INTO alergias(ale, tale)
               VALUES('$ale', '$tale')";
            $resultado = mysqli_query($conex, $consulta);
            if($resultado){
                ?>
                <h3 class="success">Tu registro se a completado</h3>
                <?php
            }else {
                ?>
                <h3 class="error">Ocurrio un error</h3>
                <?php
            } 
            }else {
                ?>
                <h3 class="error">Ocurrio un error</h3>
                <?php
            } 
            

    }
if(isset($_POST['register'])){
    if(
        strlen($_POST['contacto'])>= 1 &&
        strlen($_POST['tipo'])>= 1
        
    ){
            $contacto = trim($_POST['contacto']);
            $tipo = trim($_POST['tipo']);
          
            $fecha = date("d/m/y");
            $consulta = "INSERT INTO contacto(contacto, tipo, fecha)
               VALUES('$contacto', '$tipo', '$fecha')";
            $resultado = mysqli_query($conex, $consulta);
            if($resultado){
                ?>
                <h3 class="success">Tu registro se a completado</h3>
                <?php
            }else {
                ?>
                <h3 class="error">Ocurrio un error</h3>
                <?php
            } 
            }
            

    }
if(isset($_POST['register'])){
    if(
        strlen($_POST['name'])>= 1 &&
        strlen($_POST['tipos'])>= 1 &&
        strlen($_POST['peso'])>= 1 &&
        strlen($_POST['altura'])>= 1 &&
        strlen($_POST['telefono'])>= 1 
        
    ){
            $name = trim($_POST['name']);
            $tipos = trim($_POST['tipos']);
            $peso = trim($_POST['peso']);
            $altura = trim($_POST['altura']);
            $telefono = trim($_POST['telefono']);
          
         
            $consulta = "INSERT INTO datosmedicos(name, tipos, peso, altura, telefono )
               VALUES('$name', '$tipos', '$peso', '$altura', '$telefono')";
            $resultado = mysqli_query($conex, $consulta);
            if($resultado){
                ?>
                <h3 class="success">Tu registro se a completado</h3>
                <?php
            }else {
                ?>
                <h3 class="error">Ocurrio un error</h3>
                <?php
            } 
            }
            

    }
if(isset($_POST['register'])){
    if(
        strlen($_POST['empresa'])>= 1 &&
        strlen($_POST['cargo'])>= 1 &&
        strlen($_POST['des'])>= 1 &&
        strlen($_POST['inicio'])>= 1 &&
        strlen($_POST['fin'])>= 1 
    ){
            $empresa = trim($_POST['empresa']);
            $cargo = trim($_POST['cargo']);
            $des = trim($_POST['des']);
            $inicio = trim($_POST['inicio']);
            $fin = trim($_POST['fin']);          
            $consulta = "INSERT INTO exp_profesional(empresa, cargo, descripcion, inicio, fin)
               VALUES('$empresa', '$cargo','$des', '$inicio', '$fin' )";
            $resultado = mysqli_query($conex, $consulta);
            if($resultado){
                ?>
                <h3 class="success">Tu registro se a completado</h3>
                <?php
            }else {
                ?>
                <h3 class="error">Ocurrio un error</h3>
                <?php
            } 
            }
            

    }
    if(isset($_POST['register'])){
        if(
            strlen($_POST['carrera'])>= 1 &&
            strlen($_POST['inicioc'])>= 1 &&
            strlen($_POST['finc'])>= 1 &&
            strlen($_POST['desc'])>= 1 
            
        ){
                $carrera = trim($_POST['carrera']);
                $inicioc = trim($_POST['inicioc']);
                $finc = trim($_POST['finc']);
                $desc = trim($_POST['desc']);
                $consulta = "INSERT INTO formacademica(carrera, inicioc, finc, descr)
                   VALUES('$carrera', '$inicioc','$finc', '$desc')";
                $resultado = mysqli_query($conex, $consulta);
                if($resultado){
                    ?>
                    <h3 class="success">Tu registro se a completado</h3>
                    <?php
                }else {
                    ?>
                    <h3 class="error">Ocurrio un error</h3>
                    <?php
                } 
                }
                
    
        }
if(isset($_POST['register'])){
    if(
        strlen($_POST['habilidad'])>= 1 &&
        strlen($_POST['nivel'])>= 1 &&
        strlen($_POST['desh'])>= 1 
        
    ){
            $habilidad = trim($_POST['habilidad']);
            $nivel = trim($_POST['nivel']);
            $desh = trim($_POST['desh']);
            $consulta = "INSERT INTO  habilidades(habilidad, nivel, descripcion)
               VALUES('$habilidad', '$nivel', '$desh')";
            $resultado = mysqli_query($conex, $consulta);
            if($resultado){
                ?>
                <h3 class="success">Tu registro se a completado</h3>
                <?php
            }else {
                ?>
                <h3 class="error">Ocurrio un error</h3>
                <?php
            } 
            }
            

    }
if(isset($_POST['register'])){
    if(
        strlen($_POST['titulo'])>= 1 &&
        strlen($_POST['tituloa'])>= 1
        
    ){
            $titulo = trim($_POST['titulo']);
            $tituloa = trim($_POST['tituloa']);
            $consulta = "INSERT INTO logros(titulo, año)
               VALUES('$titulo', '$tituloa')";
            $resultado = mysqli_query($conex, $consulta);
            if($resultado){
                ?>
                <h3 class="success">Tu registro se a completado</h3>
                <?php
            }else {
                ?>
                <h3 class="error">Ocurrio un error</h3>
                <?php
            } 
            }
            

    }
if(isset($_POST['register'])){
    if(
        strlen($_POST['nombrep'])>= 1 &&
        strlen($_POST['desp'])>= 1 
        
    ){
            $nombrep = trim($_POST['nombrep']);
            $desp = trim($_POST['desp']);
            $consulta = "INSERT INTO pasatiempos(nombre, descripcion)
               VALUES('$nombrep', '$desp')";
            $resultado = mysqli_query($conex, $consulta);
            if($resultado){
                ?>
                <h3 class="success">Tu registro se a completado</h3>
                <?php
            }else {
                ?>
                <h3 class="error">Ocurrio un error</h3>
                <?php
            } 
            }
            

    }
if(isset($_POST['register'])){
    if(
        strlen($_POST['profesion'])>= 1 
        
    ){
            $profesion = trim($_POST['profesion']);
            $consulta = "INSERT INTO portafolio(profesion)
               VALUES('$profesion')";
            $resultado = mysqli_query($conex, $consulta);
            if($resultado){
                ?>
                <h3 class="success">Tu registro se a completado</h3>
                <?php
            }else {
                ?>
                <h3 class="error">Ocurrio un error</h3>
                <?php
            } 
            }
            

    }
if(isset($_POST['register'])){
    if(
        strlen($_POST['cargor'])>= 1 &&
        strlen($_POST['name'])>= 1 
        
    ){
            $cargor = trim($_POST['cargor']);
            $empresar = trim($_POST['empresar']);
            $consulta = "INSERT INTO reclutador(cargo, empresa)
               VALUES('$cargor', '$empresar')";
            $resultado = mysqli_query($conex, $consulta);
            if($resultado){
                ?>
                <h3 class="success">Tu registro se a completado</h3>
                <?php
            }else {
                ?>
                <h3 class="error">Ocurrio un error</h3>
                <?php
            } 
            }
            

    }
    


    function get_next_image_number($conex) {
        $query = "SELECT MAX(id) AS max_id FROM imagenes";
        $result = mysqli_query($conex, $query);
        $row = mysqli_fetch_assoc($result);
        $max_id = $row['max_id'];
        return $max_id ? $max_id + 1 : 1;
    }
    
    if (isset($_POST['register'])) {
        $next_image_number = get_next_image_number($conex);
        $nombre_imagen = "imagen" . $next_image_number . "." . pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
        $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/uploadImagen';
        
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino . "/" . $nombre_imagen)) {
            // Guardar el nombre de la imagen en la base de datos
            $consulta = "INSERT INTO imagenes (nombre_imagen) VALUES ('$nombre_imagen')";
            $resultado = mysqli_query($conex, $consulta);
            
            if ($resultado) {
                echo "<h3 class='success'>Tu registro se ha completado</h3>";
            } else {
                echo "<h3 class='error'>Ocurrió un error al guardar el nombre de la imagen en la base de datos</h3>";
            }
        } else {
            echo "<h3 class='error'>Ocurrió un error al subir la imagen</h3>";
        }
    }





?>