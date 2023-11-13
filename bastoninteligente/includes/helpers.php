<?php

function mostrarError($errores, $campo){
    $alerta = "";
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alerta alerta-error'>".$errores[$campo]."</div>";
    }
    return $alerta;
}

function borrarErrores(){
	$borrado = false;
	
	if(isset($_SESSION['errores'])){
		$_SESSION['errores'] = null;
		$borrado = true;
	}
	
	

	if(isset($_SESSION['completado'])){
		$_SESSION['completado'] = null;
		$borrado = true;
	}

    return $borrado;
}


function conseguirCodigoArduino($conexion){
    $sql = "SELECT COUNT(cod_arduino) AS total_arduino FROM usuario ";
    $resultado = mysqli_query($conexion, $sql);
    if($resultado){
     $row = mysqli_fetch_assoc($resultado);
     $tota_arduino = $row['total_arduino'];
     $sumaarduino = $tota_arduino+1;
     $total_arduino_cod = sprintf('%03d', $sumaarduino);
     $formatocodigoarduino = "AR-".$total_arduino_cod;
     return $formatocodigoarduino;
    }else{
     return false;
    }

}

function conseguirModeloArduino($conexion){
    $sql = "SELECT * FROM modelo_arduino ORDER BY id ASC; ";
    $modelo_arduinos = mysqli_query($conexion, $sql);
    
    $resultado = array();

    if($modelo_arduinos && mysqli_num_rows($modelo_arduinos) >= 1){
        $resultado = $modelo_arduinos;
    }

    return $resultado;


}



function conseguirUsuarioModelo($conexion){
    $sql = "SELECT u.cod_arduino, u.nombre as nombre_us, u.apellido, u.email_us, m.nombre as nombre_modelo
    FROM `usuario` u 
    INNER JOIN modelo_arduino m on u.mod_ar_id = m.id; ";
    
    $consulta = mysqli_query($conexion, $sql);

    $resultado = array();

    if($consulta && mysqli_num_rows($consulta) >= 1){
        $resultado = $consulta;
    }

    return $resultado;

}



