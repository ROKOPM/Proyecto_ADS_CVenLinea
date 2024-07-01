<?php 
	require_once("../../../php/conexion_be.php");
	
	$sql = $conexion ->prepare("DELETE FROM contacto WHERE id_contacto=?");  
	$sql->bind_param("i", $_GET["id"]); 
	$sql->execute();
	$sql->close(); 
	$conexion ->close();
	header('location: ../../crear_cv.php');		
?>