<?php
session_name("bastoninteligente");
session_start();
if(isset($_SESSION['usuario'])){
    session_destroy();
}

header("Location: index.php");