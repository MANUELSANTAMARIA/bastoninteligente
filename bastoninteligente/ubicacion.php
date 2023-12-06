<?php
include_once 'includes/conexion.php';
// $data = json_decode(file_get_contents("php://input"), true);
// Procesar los datos
// $latitud = $data['latitud'];
// $longitud = $data['longitud'];
// $cod_ard = $data['cod_ard'];

// $latitud = -2.041346;
// $longitud = -79.995596;
// $cod_ard = "AR-001";



// $sql = "SELECT * FROM usuario; ";
// $resultado = mysqli_query($db, $sql);
// var_dump($resultado)



// $sql = "SELECT * FROM usuario WHERE cod_arduino = '$cod_ard' ";
// $query = mysqli_query($db, $sql);

// $usuario = mysqli_fetch_assoc($query);
// $id_usuario = $usuario['id'];




// Insertar datos en la base de datos
// $sql = "INSERT INTO recorrido VALUES (null, $latitud, $longitud, CURDATE(), $id_usuario) ";
// mysqli_query($db, $sql);

if (isset($_GET)) {
    $latitud = $_GET['latitud'];
    $longitud = $_GET['longitud'];
    $cod_ard = $_GET['cod_ard'];


 $sql = "SELECT * FROM usuario WHERE cod_arduino = '$cod_ard' ";
$query = mysqli_query($db, $sql);

$usuario = mysqli_fetch_assoc($query);
$id_usuario = $usuario['id'];



// Insertar datos en la base de datos
$sql = "INSERT INTO recorrido VALUES (null, $latitud, $longitud, CURDATE(), $id_usuario) ";
mysqli_query($db, $sql);
    


    
}










// Cerrar la conexión a la base de datos

?>
