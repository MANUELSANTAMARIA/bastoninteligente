<?php
$servidor = 'samperza.com';
$usuario = 'Martin';
$password = 'Martin123$';
$basededatos = 'bastonInteligente';
$db = mysqli_connect($servidor, $usuario, $password, $basededatos);

mysqli_query($db, "SET NAMES 'utf8'");



// Iniciar la sesión
if(!isset($_SESSION)){
	session_name("bastoninteligente");
	session_start();
	
}