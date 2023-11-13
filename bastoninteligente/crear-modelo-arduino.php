<?php
include_once 'includes/redirection.php'; 
require_once 'includes/helpers.php'; 
include_once 'includes/header.php'; 
?>

<h1>CREAR MODELO DE ARDUINO</h1>

<?php if(isset($_SESSION['completado'])): ?>
    <div class="alerta alerta-exito">
        <?= $_SESSION['completado']?>
    </div>
<?php elseif(isset($_SESSION['errores']['general'])): ?>    
    <div class="alerta alerta-error">
		<?=$_SESSION['errores']['general']?>
	</div>
<?php endif; ?>
<form action="guardar-modelo-arduino.php" method="POST">
    <label for="nombre">Nombre:<span style="color:red;">&ast;</span></label>
    <input type="text" name="nombre" required/>
    <?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

    <label for="descripcion">Descripcion: <span style="color:red;">&ast;</span></label>
    <textarea name="descripcion" required></textarea>
    <?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'descripcion') : ''; ?>


    <input type="submit" value="Agregar">
</form>



<?php include_once 'includes/footer.php'; ?>