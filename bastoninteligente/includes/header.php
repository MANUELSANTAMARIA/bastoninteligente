<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baston Inteligente</title>
    <link rel="stylesheet" type="text/css" href="assets/css/layouts.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- fontawesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
</head>
<body>
    <header >
        <!-- CABECERA REDES SOCIALES-->
        <div id="redessociales">
         <ul>
            <li><a href=""><i class="fa-brands fa-facebook"></i></a></li>
            <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
         </ul>
        </div>
        <!-- FIN DE REDES SOCIALES -->
        <!-- CABECERA MENU DESPLEGABLE -->
        <div id="logo">
            <a href="inicio.php">
				BASTON INTELIGENTE
			</a>
        </div>
        <?php if(isset($_SESSION['usuario'])): ?>
        <div id="menu__ajustes">
          <i class="fa-regular fa-user"> </i>
           <p><?= "BIENVENIDO " . $_SESSION['usuario']['nombre'] ." ". $_SESSION['usuario']['apellido']?> </p>
           <i class="fa-solid fa-caret-down open-menu-ajustes"></i>
           <div class="dropdown-content" id="dropdown-menu">
            <a href="inicio.php" class="boton">Inicio</a>
		    <a href="crear-usuario.php" class="boton">Crear usuario</a>
            <a href="crear-modelo-arduino.php" class="boton">Crear modelo arduino</a>
            <a href="cerrar.php" class="boton">Cerrar</a>
           </div>
        </div>
        <?php endif; ?>
        <!-- FIND CABECERA MENU DESPLEGABLE -->
    </header>
    <div class="clearfix"></div>
    <hr>
    <div id="contenedor">

       