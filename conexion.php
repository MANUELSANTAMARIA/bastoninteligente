<?php
$data = json_decode(file_get_contents("php://input"), true);

// Procesar los datos
$latitud = $data['latitud'];
$longitud = $data['longitud'];
$cod_ard = $data['cod_ard'];

$servidor = 'samperza.com';
$usuario = 'manuel';
$password = 'joker1234';
$basededatos = 'bastonInteligente';
$db = mysqli_connect($servidor, $usuario, $password, $basededatos);





if(mysqli_connect_errno()){
    // echo"la conexion a la base de datos mysql fallo".mysqli_connect_errno();
}else{
    // echo "conexion exitosa ";
}

// $sql = "SELECT * FROM usuario; ";
// $resultado = mysqli_query($db, $sql);

$sql = "SELECT * FROM usuario WHERE cod_arduino = $cod_ard ";
$query = mysqli_query($db, $sql);



$usuario = mysqli_fetch_assoc($query);
$id_usuario = $usuario['id'];




// Insertar datos en la base de datos
$sql = "INSERT INTO usuario VALUES (null, '$latitud', '$longitud', '$id_usuario')";
mysqli_query($db, $sql);






// Cerrar la conexión a la base de datos

?>
