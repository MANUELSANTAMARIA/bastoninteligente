<?php
include_once 'includes/redirection.php'; 
include_once 'includes/conexion.php';
include_once 'includes/helpers.php';
include_once 'includes/header.php'; 
?>

<h1>USUARIOS</h1>

<div class="tabla-datos">
<table>

    <tr>
        <th>CODIGO ARDUINO</th>
        <th>NOMBRE</th>
        <th>APELLIDO</th>
        <th>EMAIL</th>
        <th>MODELO DE ARDUINO</th>
    </tr>
    <?php 
    $usuario_modelos = conseguirUsuarioModelo($db); 
    if(!empty($usuario_modelos)):
        while($usuario_modelo = mysqli_fetch_assoc($usuario_modelos)):
    ?>
    <tr>
        <td><?= $usuario_modelo['cod_arduino'] ?></td>
        <td><?= $usuario_modelo['nombre_us'] ?></td>
        <td><?= $usuario_modelo['apellido'] ?></td>
        <td><?= $usuario_modelo['email_us'] ?></td>
        <td><?= $usuario_modelo['nombre_modelo'] ?></td>
    </tr>
    <?php  
     endwhile; 
    endif;
    ?>

</table>
</div>
<?php include_once 'includes/footer.php'; ?>

