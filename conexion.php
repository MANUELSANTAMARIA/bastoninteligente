<?php
$data = json_decode(file_get_contents("php://input"), true);

// Procesar los datos
$latitud = $data['latitud'];
$longitud = $data['longitud'];
$cod_ard = $data['cod_ard'];


// $latitud = -2.041346;
// $longitud = -79.995596;
// $cod_ard = "AR-001";

$servidor = 'samperza.com';
$usuario = 'Martin';
$password = 'Martin123$';
$basededatos = 'bastonInteligente';
$db = mysqli_connect($servidor, $usuario, $password, $basededatos);



// Obtiene la fecha actual
// $fechaActual = date("Y-m-d");

if(mysqli_connect_errno()){
    // echo"la conexion a la base de datos mysql fallo".mysqli_connect_errno();
}else{
    // echo "conexion exitosa ";
}

// $sql = "SELECT * FROM usuario; ";
// $resultado = mysqli_query($db, $sql);

$sql = "SELECT * FROM usuario WHERE cod_arduino = '$cod_ard' ";
$query = mysqli_query($db, $sql);



$usuario = mysqli_fetch_assoc($query);
$id_usuario = $usuario['id'];




// Insertar datos en la base de datos
$sql = "INSERT INTO recorrido VALUES (null, $latitud, $longitud, CURDATE(), $id_usuario) ";
mysqli_query($db, $sql);






// Cerrar la conexión a la base de datos

?>
