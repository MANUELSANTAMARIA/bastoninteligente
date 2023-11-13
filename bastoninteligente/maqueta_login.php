<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://kit.fontawesome.com/49cfec982f.js"></script>
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <div class="logo">
        <img src="assets/img/s.jpg" alt="mi fondo" class="avatar">
        <h1>Login</h1>
        <!-- include  cuantas veces seas -->
        <form action="login.php" method="POST">
            
            <!-- user name -->
            <label for="username"><i class="fa-solid fa-user"></i> Email</label>
            <input type="text" placeholder="Ingresar Usuario" name="email">
            <!-- pasword -->
            <label for="pasword"><i class="fa-solid fa-key"></i> Contraseña</label>
            <input type="password" placeholder="Ingresar Contraseña" name="password">

            <!-- boton -->
            <input type="submit" value="Inicio" name="btningresar">
            
        </form>

    </div>
</body>