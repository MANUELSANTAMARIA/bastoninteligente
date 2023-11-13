<?php
if(!isset($_SESSION)){
    session_name("bastoninteligente");
    session_start();
}

if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
}