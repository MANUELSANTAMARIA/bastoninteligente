<?php
if(isset($_POST)){
    // var_dump($_POST);
    // die();

    //Conexion a la base 
    require_once 'includes/conexion.php';

    // Iniciar sesión
	if(!isset($_SESSION)){
		session_start();
	}


    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false; 
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;

    // echo $nombre . $descripcion;

    $errores = array();

    if(!empty($nombre)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es válido";

    }

    if(!empty($descripcion)){
        $descripcion_validado = true;
    }else{
        $descripcion_validado = false;
        $errores['descripcion'] = "La descripcion no es válido";
    }

    $guardar_modelo_arduino = false;

    
    if(count($errores) == 0){
        $guardar_modelo_arduino = true;
        $sql = "INSERT INTO modelo_arduino VALUES(null, '$nombre', '$descripcion')";
		$guardar = mysqli_query($db, $sql);

        if($guardar){
            $_SESSION['completado'] = "El registro se ha completado con éxito";

        }else{
            $_SESSION['errores']['general'] = "Fallo al guardar el modelo arduino!!";
        }



    }else{
        $_SESSION['errores'] = $errores;
    }

    header("Location: crear-modelo-arduino.php");
}