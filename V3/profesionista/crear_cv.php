<?php
    include '../php/conexion_be.php';
    session_start();

    $i=1;

    if (isset($_SESSION['usuario'])) {
        $id_usuario = $_SESSION['id_usuario'];

        $consulta_portafolio = mysqli_query($conexion, "SELECT * FROM portafolio WHERE id_profesionista='$id_usuario'");
        $consulta_datosmedicos = mysqli_query($conexion, "SELECT * FROM datosmedicos WHERE id_profesionista='$id_usuario'");
        $consulta_alergias = mysqli_query($conexion, "SELECT * FROM alergias WHERE id_datosmedicos='$id_usuario'");
        $consulta_contactos = mysqli_query($conexion,"SELECT * FROM contacto WHERE id_profesionista='$id_usuario'");

        //echo 'Filas:'.(mysqli_num_rows($consulta_portafolio));
        if((mysqli_num_rows($consulta_portafolio) > 0) && (mysqli_num_rows($consulta_datosmedicos) > 0)){
            //Significa que ya existe un portafolio de un profesionista
            //Se extrae el id_portafolio para usarlo en las consultas con las otras tablas.
            $portafolio = mysqli_fetch_assoc($consulta_portafolio);
            $datosmedicos = mysqli_fetch_assoc($consulta_datosmedicos);

            $_SESSION['id_portafolio'] = $portafolio['id_portafolio'];
            $profesion = $portafolio['profesion'];
            $tipo_sangre = $datosmedicos['tipo_sangre'];
            $peso = $datosmedicos['peso'];
            $altura = $datosmedicos['altura'];
            $CE_nombre = $datosmedicos['CE_nombre'];
            $CE_telefono = $datosmedicos['CE_telefono'];
            $disabled = "disabled";
        }else{
            $profesion = "";
            $tipo_sangre = "";
            $peso = "";
            $altura = "";
            $CE_nombre = "";
            $CE_telefono = "";
            $disabled = "";
        }
    }
        
    
?>
<script>
    function activar(formulario){
        var x = document.getElementById(formulario);
        var i;
        var y;
        for(i=0; i<x.length;i++){
            if(x.elements[i].disabled){
                x.elements[i].disabled = false;
            }else{
                if(!(x.elements[i].value == "Editar" || x.elements[i].value == "Eliminar"))
                x.elements[i].disabled = true;
            }
        }
    }
    function desactivar(formulario){
        var x = document.getElementById(formulario);
        var i;
        for(i=0; i<x.length;i++){
            x.elements[i].disabled = true;
        }
    }
</script>

<!DOCTYPE html>
<html lang="es-mx">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Creando CV | CVenLinea</title>
        
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/estilos.css">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    </head>
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
                                        <a class="nav-link" href="../index.php" style="color:white">Inicio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../nuevo_perfil.php" style="color:white">Encontrar CV's</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../Acercade.php" style="color:white">Acerca de nosotros</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../Contacto.php" style="color:white">Contacto</a>
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
                            echo '<a href="../login.php" class="btn btn-outline-light me-2">Iniciar Sesión</a>';
                        else echo '<a href="crear_cv.php" class="btn btn-light">Cuenta</a>
                                   <a href="../php/cerrar_sesion.php" class="btn btn-light">Cerrar Sesión</a>';
                        ?>
                    </div>
                </div>
            </div>
        </header>
    <div class="container-fluid">
        <div class="row">
        <div id="Form-DatosPersonales" class="col container container-sm p-4 rounded-4 border border-3 ms-2 my-2" >
            <h2 class="h2">Datos Personales</h2>
            <form id="DatosPersonales" action="./php/datos_personales_bd.php" method="post">
                <div class="row">
                    <div class="col mb-3 mt-3">
                        <label for="profesionista-name" class="form-label">Nombre completo</label>
                        <input readonly type="text" class="form-control" name="nombre" id="profesionista-name"
                        value="<?php echo $_SESSION['nombre'];?>">
                    </div>
                    <div class="col mb-3 mt-3">
                        <label for="profesionista-profesion" class="form-label">Profesion</label>
                        <input required type="text" class="form-control" name="profesion" id="profesionista-profesion"
                        placeholder="Puesto que postulas" 
                        maxlength="50" value="<?php echo $profesion?>" <?php echo $disabled ?>>
                    </div>
                </div>
                <div class="row" >
                    <div class="col mb-3 mt-3">
                        <label for="profesionista-tiposangre" class="form-label">Tipo de sangre</label>
                        <input required type="text" class="form-control" name="tipo_sangre" id="profesionista-tiposangre"
                        placeholder="Ejemplo: O positivo" maxlength="11" value="<?php echo $tipo_sangre?>"
                        <?php echo $disabled ?>>
                    </div>
                    <div class="col mb-3 mt-3">
                        <label for="profesionista-peso" class="form-label">Peso (kg)</label>
                        <input required type="number" min="40" max="200" class="form-control" name="peso" id="profesionista-peso"
                        placeholder="Ejemplo: 60" maxlength="3" value="<?php echo $peso?>"
                        <?php echo $disabled ?>>
                    </div>
                    <div class="col mb-3 mt-3">
                        <label for="profesionista-altura" class="form-label">Altura (cm)</label>
                        <input required type="number" min="100" max="200" class="form-control" name="altura" id="profesionista-altura"
                        placeholder="Ejemplo: 170" maxlength="3" value="<?php echo $altura?>"
                        <?php echo $disabled ?>>
                    </div>
                </div>
                <br>
                <h4 class="h4">Contacto de emergencia</h4>
                <br>
                <div class="row">
                    <div class="col mb-3 mt-3">
                        <label for="CE_nombre" class="form-label">Nombre del contacto</label>
                        <input required type="text" class="form-control" name="CE_nombre" id="CE_nombre"
                        placeholder="Nombre de tu contacto de emergencia" maxlength="100" 
                        value="<?php echo $CE_nombre?>" <?php echo $disabled ?>>
                    </div>
                    <div class="col mb-3 mt-3">
                        <label for="CE_telefono" class="form-label">Telefono</label>
                        <input required type="tel" class="form-control" name="CE_telefono" id="CE_telefono"
                        placeholder="Ejemplo: 55-5555-5555" 
                        pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" maxlength="13" value="<?php echo $CE_telefono?>"
                        <?php echo $disabled ?>>
                    </div>
                </div>
                <input type="button" onclick="activar('DatosPersonales')" value="Editar" class="btn btn-primary btn_editar">
                <button type="submit" class="btn btn-success" <?php echo $disabled ?>>Enviar</button>
            </form>
        </div>
        <div class="col">
        <div id="Form-Alergias" class="container container-sm p-5 rounded-5 border border-3 me-2 my-2">
            <h2 class="h2">Alergias</h2>
            <br><label class="form-label">¿A qué tiene alergia?</label>
            <input type="button" onclick="agregar_alergia()" value="Agregar" class="btn btn-primary" id="btn_add_Alergias">
            
            <?php 
                if(mysqli_num_rows($consulta_alergias) > 0){
                    $i = 0;
                    while($alergia = mysqli_fetch_assoc($consulta_alergias)){
                        echo '<form action="./php/alergias/alergias_bd.php" method="post" name="alergia" id="form-alergia-'.$i.'">
                                <div class="mb-3 mt-3">
                                    <input required type="text" class="form-control" name="alergia" 
                                    placeholder="Alergia" maxlength="100" value="'.$alergia['nombre'].'" disabled>
                                </div>
                                <input type="button" onclick="activar(\'form-alergia-'.$i.'\')" value="Editar" class="btn btn-primary btn_editar">
                                <input type="button" class="btn btn-danger m-1 btn_eliminar" name="Eliminar_Alergias" value="Eliminar" 
                                onclick="if((confirm(\'¿Estás seguro de eliminar '.$alergia['nombre'].' de tu lista de alergias?\'))) location=\'./php/alergias/eliminar_alergias.php?id='.$alergia['id_alergia'].'\';">
                                <input name="id_alergia" type="hidden"  value="'.$alergia['id_alergia'].'" disabled>
                                <button type="submit" class="btn btn-success" name="Enviar_Alergias" disabled>Enviar</button>     
                            </form>';
                        $i++;
                    }
                }
            ?> 
        </div>
        <div id="Form-Contacto" class="container p-5 rounded-5 border border-3 me-2 my-2">
            <h2 class="h2">Medios de Contacto</h2>
            <select class="form-select-sm" id="sel_tipo_contacto" value="Tipo de contacto">
                <option>Tipo de contacto</option>
                <option>Correo</option>
                <option>Telefono</option>
                <option>Facebook</option>
                <option>Twitter</option>
                <option>Instagram</option>
            </select>
            <input type="button" onclick="agregar_contacto()" value="Agregar" class="btn btn-primary" id="btn_add_contacto">
            
            <?php
                if(mysqli_num_rows($consulta_contactos) > 0){
                    $i = 0;
                    while($contacto = mysqli_fetch_assoc($consulta_contactos)){

                        switch($contacto['tipo']){
                            case 'Correo': $inputDC_type='email'; break;
                            case 'Telefono': $inputDC_type='tel'; break;
                            case 'Facebook': case 'Twitter' : case 'Instagram' : $inputDC_type='text'; break;
                        }

                        echo '<form action="./php/contactos/contactos_bd.php" method="post" name="contacto" id="form-contacto-'.$i.'">
                                <div class="input-group m-2">
                                    <span class="input-group-text">'.$contacto['tipo'].'</span>
                                    <input name="dato_contacto" type="'.$inputDC_type.'" class="form-control" required="true" 
                                        value="'.$contacto['contacto'].'" disabled>
                                    <input type="button" onclick="activar(\'form-contacto-'.$i.'\')" value="Editar" class="btn btn-primary btn_editar">
                                    <input type="button" class="btn btn-danger btn_eliminar_contacto" name="Eliminar_Contacto" 
                                        onclick="if((confirm(\'¿Estás seguro de eliminar '.$contacto['contacto'].'('.$contacto['tipo'].') de tu lista de medios de contacto?\'))) location=\'./php/contactos/eliminar_contacto.php?id='.$contacto['id_contacto'].'\';" 
                                        value="Eliminar">
                                    <input type="submit" class="btn btn-success" name="Enviar_Contacto" disabled>
                                </div>
                                <input name="id_contacto" type="hidden" value="'.$contacto['id_contacto'].'" disabled>
                                <input name="tipo_contacto" type="hidden" value="'.$contacto['tipo'].'" disabled>
                            </form>';

                        $i++;
                        
                    }
                }
            ?>
            
            <!--<form>
            <div class="input-group m-2">
                <span class="input-group-text">Correo</span>
                <input type="email" class="form-control" placeholder="ejemplo@correo.com">
                <input type="button" value="Editar" class="btn btn-primary" >
                <input type="button" value="Eliminar" class="btn btn-danger">
                <input type="submit" class="btn btn-success">
            </div>
            
            </form> 
            <div class="input-group m-2">
                <span class="input-group-text">Telefono</span>
                <input type="tel" class="form-control" placeholder="55-5555-5555" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}">
            </div>

            <div class="input-group m-2">
                <span class="input-group-text">Facebook</span>
                <input type="text" class="form-control" placeholder="@usuario">
            </div>-->
        </div>
        </div>
        </div>
        <div class="row">
        <div id="Form-Habilidades" class="container p-5 rounded-5 border border-3 w-75 m-3">
            <h2 class="h2">Habilidades</h2>
            <input type="button" onclick="agregar_habilidad()" value="Agregar" class="btn btn-primary" id="btn_add_habilidad">
            <form  action="./php/habilidades/habilidades_bd.php" method="post" id="form-habilidad-'.$i.'">
                <div class="input-group m-2">
                    <span class="input-group-text">Habilidad</span>
                    <input name="habilidad" type="text" class="form-control" placeholder="Ejemplo: Ingles" required>
                    <span class="input-group-text">Nivel</span>
                    <input name="nivel" type="text" class="form-control" placeholder="Ejemplo: Intermedio B1" required>
                    <input type="button" value="Editar" class="btn btn-primary" >
                    <input type="button" value="Eliminar" class="btn btn-danger">
                    <input type="submit" class="btn btn-success">
                    <input name="id_habilidad" type="hidden" value="" disabled>
                </div>
            </form>
        </div>
        </div>
        </div>

        <script>
            var btn_eliminar_funcion = document.getElementsByClassName("btn_eliminar");
            var i;

            var btns_eliminar_contacto = document.getElementsByClassName("btn_eliminar_contacto");
            var num_contactos;
            var btns_eliminar_habilidades = document.getElementsByClassName("btn_eliminar_contacto");
            var num_habilidades;

         function agregar_alergia(){
            //alert("N " + btn_eliminar_funcion.length);
            i = btn_eliminar_funcion.length;

            /*Se crea el formulario */

                const form = document.createElement("form");
                const action = document.createAttribute("action");
                action.value = "./php/alergias/alergias_bd.php";

                const method = document.createAttribute("method");
                method.value = "post";

                const form_name = document.createAttribute("name");
                form_name.value = "alergia";

                const form_id = document.createAttribute("id");
                form_id.value = "form-alergia-"+i;

                form.setAttributeNode(action);
                form.setAttributeNode(method);
                form.setAttributeNode(form_name);
                form.setAttributeNode(form_id)

                document.getElementById("Form-Alergias").appendChild(form);
            /** Se crea el div*/
                const div1 = document.createElement("div");
                const div1_class = document.createAttribute("class");
                div1_class.value = "mb-3 mt-3";

                div1.setAttributeNode(div1_class);
                
                form.appendChild(div1);
        
            /**Se crea el input */

                const input1 = document.createElement("input");

                const input1_type = document.createAttribute("type");
                input1_type.value = "text";

                const input1_class = document.createAttribute("class");
                input1_class.value = "form-control";

                const input1_name = document.createAttribute("name");
                input1_name.value = "alergia";

                const input1_required = document.createAttribute("required");
                input1_required.value = "true";

                const input1_placeholder = document.createAttribute("placeholder");
                input1_placeholder.value = "Alergia <?php //echo $i;?>";

                input1.setAttributeNode(input1_type);
                input1.setAttributeNode(input1_class);
                input1.setAttributeNode(input1_name);
                input1.setAttributeNode(input1_placeholder);
                input1.setAttributeNode(input1_required);

                div1.appendChild(input1);
            
            /**Se crea el boton ELIMINAR */    
                const btn_eliminar = document.createElement("input");

                const btn_eliminar_type = document.createAttribute("type");
                btn_eliminar_type.value = "button";

                const btn_eliminar_class = document.createAttribute("class");
                btn_eliminar_class.value = "btn btn-danger m-1 btn_eliminar";

                const btn_eliminar_name = document.createAttribute("name");
                btn_eliminar_name.value = "Eliminar_Alergias";

                const btn_eliminar_onclick = document.createAttribute("onclick");
                btn_eliminar_onclick.value = "eliminar("+"\"form-alergia-"+i+"\")";

                const btn_eliminar_value = document.createAttribute("value");
                btn_eliminar_value.value = "Eliminar";

                btn_eliminar.setAttributeNode(btn_eliminar_type);
                btn_eliminar.setAttributeNode(btn_eliminar_class);
                btn_eliminar.setAttributeNode(btn_eliminar_name);
                btn_eliminar.setAttributeNode(btn_eliminar_onclick);
                btn_eliminar.setAttributeNode(btn_eliminar_value);

                const btn_eliminar_textnode = document.createTextNode("Eliminar");

                btn_eliminar.appendChild(btn_eliminar_textnode);

                form.appendChild(btn_eliminar);

            /**Se crea el boton ENVIAR */
                const btn_enviar = document.createElement("input");

                const btn_enviar_type = document.createAttribute("type");
                btn_enviar_type.value = "submit";

                const btn_enviar_class = document.createAttribute("class");
                btn_enviar_class.value = "btn btn-success";

                const btn_enviar_name = document.createAttribute("name");
                btn_enviar_name.value = "Enviar_Alergias";

                btn_enviar.setAttributeNode(btn_enviar_type);
                btn_enviar.setAttributeNode(btn_enviar_class);
                btn_enviar.setAttributeNode(btn_enviar_name);

                const btn_enviar_textnode = document.createTextNode("Enviar");

                btn_enviar.appendChild(btn_enviar_textnode);

                form.appendChild(btn_enviar);

        }

        function agregar_contacto(){
            /*Se crea el formulario */
                num_contactos =btns_eliminar_contacto.length;
                const form = document.createElement("form");
                const action = document.createAttribute("action");
                action.value = "./php/contactos/contactos_bd.php";

                const method = document.createAttribute("method");
                method.value = "post";

                const form_name = document.createAttribute("name");
                form_name.value = "contacto";

                const form_id = document.createAttribute("id");
                form_id.value = "form-contacto-"+num_contactos;

                form.setAttributeNode(action);
                form.setAttributeNode(method);
                form.setAttributeNode(form_name);
                form.setAttributeNode(form_id);

                

                /**
                 * <form>
            <div class="input-group m-2">
                <span class="input-group-text">Correo</span>
                <input type="email" class="form-control" placeholder="ejemplo@correo.com">
                <input type="button" value="Editar" class="btn btn-primary" >
                <input type="button" value="Eliminar" class="btn btn-danger">
                <input type="submit" class="btn btn-success">
            </div>
            
            </form>
                 */
            /*Se crea el div1*/
                const div1 = document.createElement("div");
                const div1_class = document.createAttribute("class");
                div1_class.value = "input-group m-2";

                div1.setAttributeNode(div1_class);

                
            /**Se crea el span */

                tipo_contacto = document.getElementById("sel_tipo_contacto");
                const span1 = document.createElement("span");

                const span1_class = document.createAttribute("class");
                span1_class.value = "input-group-text";

                const span1_text = document.createTextNode(tipo_contacto.value);

                span1.setAttributeNode(span1_class);
                span1.appendChild(span1_text);

            /**Se crea input tipo hidden para guardar el tipo de contacto */
                const input2 = document.createElement("input");

                const input2_name = document.createAttribute("name");
                input2_name.value = "tipo_contacto";

                const input2_type = document.createAttribute("type");
                input2_type.value = "hidden";

                const input2_value = document.createAttribute("value");
                input2_value.value = tipo_contacto.value;

                input2.setAttributeNode(input2_name);
                input2.setAttributeNode(input2_type);
                input2.setAttributeNode(input2_value);

            /**Se crea el input dependiendo del select tipo_contacto*/
                
                const input1 = document.createElement("input");
                

                const input1_name = document.createAttribute("name");
                input1_name.value = "dato_contacto";

                const input1_type = document.createAttribute("type");

                const input1_class = document.createAttribute("class");
                input1_class.value = "form-control";

                const input1_required = document.createAttribute("required");
                input1_required.value = "true";

                const input1_placeholder = document.createAttribute("placeholder");

                /**
                 * <option>Correo</option>
                <option>Telefono</option>
                <option>Facebook</option>
                <option>Twitter</option>
                <option>Instagram</option>
                 */


                switch (tipo_contacto.value) {
                    case "Correo":
                        input1_type.value = "email";
                        input1_placeholder.value = "ejemplo@correo.com";
                        break;
                    case "Telefono":
                        input1_type.value = "tel";
                        input1_placeholder.value = "55-5555-5555";
                        const input1_pattern = document.createAttribute("pattern");
                        input1_pattern.value = "[0-9]{2}-[0-9]{4}-[0-9]{4}";
                        input1.setAttributeNode(input1_pattern);
                        break;
                    case "Facebook":
                    case "Twitter":
                    case "Instagram":
                        input1_type.value = "text";
                        input1_placeholder.value = "@nombre_usuario";
                        break;
                    default:
                        alert("Escoje un tipo de contacto, por favor.");
                        break;
                }

                input1.setAttributeNode(input1_name);
                input1.setAttributeNode(input1_type);
                input1.setAttributeNode(input1_class);
                input1.setAttributeNode(input1_placeholder);
                input1.setAttributeNode(input1_required);
                

            /**Se crea el boton ELIMINAR */    
                const btn_eliminar = document.createElement("input");

                const btn_eliminar_type = document.createAttribute("type");
                btn_eliminar_type.value = "button";

                const btn_eliminar_class = document.createAttribute("class");
                btn_eliminar_class.value = "btn btn-danger btn_eliminar_contacto";

                const btn_eliminar_name = document.createAttribute("name");
                btn_eliminar_name.value = "Eliminar_Contacto";

                const btn_eliminar_onclick = document.createAttribute("onclick");
                btn_eliminar_onclick.value = "eliminar("+"\"form-contacto-"+num_contactos+"\")";

                const btn_eliminar_value = document.createAttribute("value");
                btn_eliminar_value.value = "Eliminar";

                btn_eliminar.setAttributeNode(btn_eliminar_type);
                btn_eliminar.setAttributeNode(btn_eliminar_class);
                btn_eliminar.setAttributeNode(btn_eliminar_name);
                btn_eliminar.setAttributeNode(btn_eliminar_onclick);
                btn_eliminar.setAttributeNode(btn_eliminar_value);

                const btn_eliminar_textnode = document.createTextNode("Eliminar");

                btn_eliminar.appendChild(btn_eliminar_textnode);

                

            /**Se crea el boton ENVIAR */

                const btn_enviar = document.createElement("input");

                const btn_enviar_type = document.createAttribute("type");
                btn_enviar_type.value = "submit";

                const btn_enviar_class = document.createAttribute("class");
                btn_enviar_class.value = "btn btn-success";

                const btn_enviar_name = document.createAttribute("name");
                btn_enviar_name.value = "Enviar_Alergias";

                btn_enviar.setAttributeNode(btn_enviar_type);
                btn_enviar.setAttributeNode(btn_enviar_class);
                btn_enviar.setAttributeNode(btn_enviar_name);

                const btn_enviar_textnode = document.createTextNode("Enviar");

                btn_enviar.appendChild(btn_enviar_textnode);

                

            /**APPEND_CHILD */
                if(tipo_contacto.value != "Tipo de contacto"){
                    document.getElementById("Form-Contacto").appendChild(form);
                    form.appendChild(div1);
                    div1.appendChild(span1);
                    div1.appendChild(input1);
                    form.appendChild(input2);
                    div1.appendChild(btn_eliminar);
                    div1.appendChild(btn_enviar);
                }
        }

        function agregar_habilidad(){
            num_habilidades =btns_eliminar_contacto.length;
            /**
             * <form  action="./php/habilidades/habilidades_bd.php" method="post" id="form-habilidad-'.$i.'">
                <div class="input-group m-2">
                    <span class="input-group-text">Habilidad</span>
                    <input name="habilidad" 
                        type="text" class="form-control" 
                        placeholder="Ejemplo: Ingles" required>
                    <span class="input-group-text">Nivel</span>
                    <input name="nivel" type="text" class="form-control" 
                    placeholder="Ejemplo: Intermedio B1" required>
                    <input type="button" value="Editar" class="btn btn-primary" >
                    <input type="button" value="Eliminar" class="btn btn-danger">
                    <input type="submit" class="btn btn-success">
                    <input name="id_habilidad" type="hidden" value="" disabled>
                </div>
            </form>
             */

            /**Se crea el formulario */
                const form = document.createElement("form");

                const action = document.createAttribute("action");
                action.value = "./php/habilidades/habilidades_bd.php";

                const method = document.createAttribute("method");
                method.value = "post";

                const form_name = document.createAttribute("name");
                form_name.value = "habilidad";

                const form_id = document.createAttribute("id");
                form_id.value = "form-habilidad-"+num_habilidades;

                form.setAttributeNode(action);
                form.setAttributeNode(method);
                form.setAttributeNode(form_name);
                form.setAttributeNode(form_id);

                document.getElementById("Form-Habilidades").appendChild(form);
            /**Se crea el div*/
                const div = document.createElement("div");
                const div_class = document.createAttribute("class");
                div_class.value = "input-group m-2";
                div.setAttributeNode(div_class);
                form.appendChild(div);
            /**Se crea el span de habilidad */
                const span_hab = document.createElement("span");
                const span_class = document.createAttribute("class");
                span_class.value = "input-group-text";
                span_hab.setAttributeNode(span_class);
                const span_hab_text = document.createTextNode("Habilidad");
                span_hab.appendChild(span_hab_text); 
                div.appendChild(span_hab);
            /**Se crea el input habilidad */
                const in_hab = document.createElement("input");
                const in_hab_name = document.createAttribute("name");
                in_hab_name.value = "habilidad";
                const in_hab_type = document.createAttribute("type");
                in_hab_type.value = "text";
                const in_hab_class = document.createAttribute("class");
                in_hab_class.value = "form-control";
                const in_hab_placeholder = document.createAttribute("placeholder");
                in_hab_placeholder.value = "Ejemplo: Ingles";
                in_hab.setAttributeNode(in_hab_name);
                in_hab.setAttributeNode(in_hab_type);
                in_hab.setAttributeNode(in_hab_class);
                in_hab.setAttributeNode(in_hab_placeholder);
                div.appendChild(in_hab);
            /**Se crea el span de nivel*/    
                const span_niv = document.createElement("span");
                const span_niv_class = document.createAttribute("class");
                span_niv_class.value = "input-group-text";
                span_niv.setAttributeNode(span_niv_class);
                const span_niv_text = document.createTextNode("Nivel");
                span_niv.appendChild(span_niv_text);
                div.appendChild(span_niv);
            /**Se crea el input de nivel */
                const in_niv = document.createElement("input");
                const in_niv_name = document.createAttribute("name");
                in_niv_name.value = "nivel";
                const in_niv_type = document.createAttribute("type");
                in_niv_type.value = "text";
                const in_niv_class = document.createAttribute("class");
                in_niv_class.value = "form-control";
                const in_niv_placeholder = document.createAttribute("placeholder");
                in_niv_placeholder.value = "Ejemplo: Intermedio B1";
                in_niv.setAttributeNode(in_niv_name);
                in_niv.setAttributeNode(in_niv_type);
                in_niv.setAttributeNode(in_niv_class);
                in_niv.setAttributeNode(in_niv_placeholder);
                div.appendChild(in_niv);
            /**Se crea el boton ELIMINAR */
                const btn_eliminar = document.createElement("input");

                const btn_eliminar_type = document.createAttribute("type");
                btn_eliminar_type.value = "button";

                const btn_eliminar_class = document.createAttribute("class");
                btn_eliminar_class.value = "btn btn-danger btn_eliminar_habilidad";

                const btn_eliminar_name = document.createAttribute("name");
                btn_eliminar_name.value = "Eliminar_Habilidad";

                const btn_eliminar_onclick = document.createAttribute("onclick");
                btn_eliminar_onclick.value = "eliminar("+"\"form-habilidad-"+num_habilidades+"\")";

                const btn_eliminar_value = document.createAttribute("value");
                btn_eliminar_value.value = "Eliminar";

                btn_eliminar.setAttributeNode(btn_eliminar_type);
                btn_eliminar.setAttributeNode(btn_eliminar_class);
                btn_eliminar.setAttributeNode(btn_eliminar_name);
                btn_eliminar.setAttributeNode(btn_eliminar_onclick);
                btn_eliminar.setAttributeNode(btn_eliminar_value);

                const btn_eliminar_textnode = document.createTextNode("Eliminar");

                btn_eliminar.appendChild(btn_eliminar_textnode);
                div.appendChild(btn_eliminar);
            /**Se crea el boton ENVIAR */
                const btn_enviar = document.createElement("input");

                const btn_enviar_type = document.createAttribute("type");
                btn_enviar_type.value = "submit";

                const btn_enviar_class = document.createAttribute("class");
                btn_enviar_class.value = "btn btn-success";

                const btn_enviar_name = document.createAttribute("name");
                btn_enviar_name.value = "Enviar_Alergias";

                btn_enviar.setAttributeNode(btn_enviar_type);
                btn_enviar.setAttributeNode(btn_enviar_class);
                btn_enviar.setAttributeNode(btn_enviar_name);

                const btn_enviar_textnode = document.createTextNode("Enviar");

                btn_enviar.appendChild(btn_enviar_textnode);
                div.appendChild(btn_enviar);
            /**Se crea el input HIDDEN DE id_habilidad */
                const in_id = document.createElement("input");
                const in_id_name = document.createAttribute("name");
                const in_id_type = document.createAttribute("type");

                in_id_name.value = "id_habilidad";
                in_id_type.value = "hidden";

                in_id.setAttributeNode(in_id_name);
                in_id.setAttributeNode(in_id_type);

                div.appendChild(in_id);
        }

        function eliminar(id_elemento){
            var element = document.getElementById(id_elemento);
            element.style.display = "none";
        }
        
        

       
        </script>
    
    <!-- Pie de página -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            &copy; <?php echo date("Y"); ?> CVenlinea. Todos los derechos reservados.
        </div>
    </footer>
</body>
</html>