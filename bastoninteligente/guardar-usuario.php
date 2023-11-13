<?php
if(isset($_POST)){
    
    //Conexion a la base 
    require_once 'includes/conexion.php';

    // Iniciar sesión
	if(!isset($_SESSION)){
		session_start();
	}


// Recorger los valores del formulario de registro
    //operardor ternario
    $modelo_arduinos = isset($_POST['modelo_arduinos']) ? (int)$_POST['modelo_arduinos'] : false;
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
	$apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $fecha = isset($_POST['fecha']) ? mysqli_real_escape_string($db, $_POST['fecha']) : false;
    $sexo = isset($_POST['sexos']) ? mysqli_real_escape_string($db, $_POST['sexos']) : false;
	$email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
	$password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;
    // $rol = isset($_POST['tipo-usuarios']) ? (int)$_POST['tipo-usuarios'] : false;
    
    
    // Array de errores
	$errores = array();

    // Validar los datos antes de guardarlos en la base de datos
	// Validar campo nombre
	if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
		$nombre_validado = true;
        
	}else{
		$nombre_validado = false;
		$errores['nombre'] = "El nombre no es válido";
        
	}
	
	// Validar apellidos
	if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
		$apellidos_validado = true;
	}else{
		$apellidos_validado = false;
		$errores['apellidos'] = "Los apellidos no son válido";
	}
	
    // $fechaActual = date('Y-m-d H:i:s');
    $fechaActual = date('Y-m-d');
    if(!empty($fecha) &&  $fecha <= $fechaActual ){
        $fecha_validado = true;
    }else{
        $fecha_validado = false;
        $errores['fechas'] = "La fecha no es valida"; 
    }

    

	// Validar el email
	if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
		$email_validado = true;
	}else{
		$email_validado = false;
		$errores['email'] = "El email no es válido";
	}
	
	// Validar la contraseña
	if(!empty($password)){
		$password_validado = true;
	}else{
		$password_validado = false;
		$errores['password'] = "La contraseña está vacía";
	}


    $guardar_usuario = false;
    
    if(count($errores) == 0){
        $guardar_usuario = true;
        // Cifrar la contraseña
		$password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
        // codigo de arduino para el usuario
        $sql = "SELECT COUNT(cod_arduino) AS total_arduino FROM usuario ";
        $resultado = mysqli_query($db, $sql);
         $row = mysqli_fetch_assoc($resultado);
         $tota_arduino = $row['total_arduino'];
         $sumaarduino = $tota_arduino+1;
         $total_arduino_cod = sprintf('%03d', $sumaarduino);
         $formatocodigoarduino = "AR-".$total_arduino_cod;

        // INSERTAR USUARIO EN LA TABLA USUARIOS DE LA BD
		$sql = "INSERT INTO usuario VALUES(null, '$formatocodigoarduino', '$nombre', '$apellidos', '$fecha', '$sexo', '$email', '$password_segura', $modelo_arduinos)";
		$guardar = mysqli_query($db, $sql);

        // var_dump(mysqli_error($db));
        // die();
        

        if($guardar && $resultado){
			$_SESSION['completado'] = "El registro se ha completado con éxito";
		}else{
			$_SESSION['errores']['general'] = "Fallo al guardar el usuario!!";
		}
    }else{
        $_SESSION['errores'] = $errores;
    }
       
    header("Location: crear-usuario.php");
}


