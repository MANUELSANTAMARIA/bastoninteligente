<?php
// iniciar la sesion y la conexion a bd
include_once 'includes/conexion.php';

// verifica si una variable está definida y tiene un valor distinto de null
if(isset($_POST)){

    // Borrar error antiguo
	if(isset($_SESSION['error_login'])){
		unset($_SESSION['error_login']);
	}

    $email = trim($_POST['email']);
    $password = $_POST['password'];

  

    // consulto para comprobar si el email existe
    $sql = "SELECT * FROM usuario WHERE email_us = '$email' ";
    $login = mysqli_query($db, $sql);

   //var_dump(mysqli_fetch_assoc($login));


   if($login && mysqli_num_rows($login) == 1){
        $usuario = mysqli_fetch_assoc($login);
        // Comprobar la contraseña
       $verify = password_verify($password, $usuario['contrasena']);

       if($verify){
        // Utilizar una sesión para guardar los datos del usuario logueado
        $_SESSION['usuario'] = $usuario;
        header('Location: inicio.php');
            
       }else{
        // Si algo falla enviar una sesión con el fallo
        $_SESSION['error_login'] = "Login incorrecto!Contraseña no valida!";
        // Redirigir al index.php
        header('Location: index.php');
        
       }

    }else{
        $_SESSION['error_login'] = "Login incorrecto!Email no existe!";
        // Redirigir al index.php
        header('Location: index.php');
        
        

    }

}




