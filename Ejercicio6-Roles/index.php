<?php
session_start();

if(!isset($_SESSION['nombre']) || !isset($_SESSION['rol'])) {
    header("Location: login.php");
    exit(); 
}

$rol = $_SESSION['rol'];

if ($rol == 'director') {
    echo "<h1>Bienvenido Administrador</h1>";
} elseif ($rol == 'usuario') {
    echo "<h1>Bienvenido Usuario</h1>";
} elseif($rol == 'supervisor'){
    echo "<h1>Bienvenido Supervisor</h1>";
} else {
    echo "<p>Error: Rol no reconocido</p>";
}
include 'landing.php'; 

?>
