<?php
include_once 'includes/redirection.php'; 
include_once 'includes/conexion.php';
require_once 'includes/helpers.php'; 
include_once 'includes/header.php'; 
?>
<h1>CREAR USUARIO</h1>

<?php if(isset($_SESSION['completado'])): ?>
    <div class="alerta alerta-exito">
        <?= $_SESSION['completado']?>
    </div>
<?php elseif(isset($_SESSION['errores']['general'])): ?>    
    <div class="alerta alerta-error">
		<?=$_SESSION['errores']['general']?>
	</div>
<?php endif; ?>
<form action="guardar-usuario.php" method="POST">

    <?php $cod_arduino = conseguirCodigoArduino($db)?>
    <label for="cod_arduino">CODIGO ARDUINO: <span style="color:red;">&ast;</span></label>
	<input type="text" name="cod_arduino" value="<?=$cod_arduino; ?>" readonly/>
    
    <label for="modelo_arduinos">MODELO DE ARDUINO: <span style="color:red;">&ast;</span></label>
    <select name="modelo_arduinos" id="modelo_arduino">
       <?php 
         $modelo_arduinos = conseguirModeloArduino($db); 
         if(!empty($modelo_arduinos)):
            while($modelo_arduino = mysqli_fetch_assoc($modelo_arduinos)):
        ?>
        <option value="<?=$modelo_arduino['id']; ?>"><?=$modelo_arduino['nombre']; ?></option>
        <?php
         endwhile;
         endif;
        ?>
    </select>
    

    <label for="nombre">Nombre: <span style="color:red;">&ast;</span></label>
	<input type="text" name="nombre" required/>
    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

    <label for="apellidos">Apellido: <span style="color:red;">&ast;</span></label>
	<input type="text" name="apellidos" required/>
    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?> 

    <label for="fecha">Fecha de nacimiento: <span style="color:red;">&ast;</span></label>
	<input type="date" name="fecha" required/>
    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'fechas') : ''; ?>

    <label for="sexos">Sexo: <span style="color:red;">&ast;</span></label>
    <select name="sexos" id="sexo">
        <option value="HOMBRE">Hombre</option>
        <option value="MUJER">Mujer</option>
    </select>
	
    <label for="email">Email: <span style="color:red;">&ast;</span></label>
	<input type="email" name="email" required/>
    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

    <label for="password">Contraseña: <span style="color:red;">&ast;</span></label>
	<input type="password" name="password" required/>
    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>


    <!-- <label for="tipo-usuarios">Tipo de usuario: <span style="color:red;">&ast;</span></label>
    <select name="tipo-usuarios" id="tipo-usuario">
        <option value="1">Administrador</option>
        <option value="2">usuario</option>
    </select> -->

    <input type="submit" name="submit" value="Registrar">

</form>

<?php include_once 'includes/footer.php'; ?>