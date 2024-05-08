<?php
session_start();

if(!isset($_SESSION['nombre']) || !isset($_SESSION['rol'])) {
    header("Location: login.php");
    exit(); 
}

$rol = $_SESSION['rol'];

if ($rol == 'director') {
    echo "<h1>Bienvenido Director</h1>";
    include 'landing.php'; 
    echo "<a href='montos_dpto.php'><button>Ver Montos por Departamento</button></a>";
} elseif ($rol == 'usuario') {
    echo "<h1>Bienvenido Usuario</h1>";
    include 'landing.php'; 

} elseif($rol == 'supervisor'){
    echo "<h1>Bienvenido Supervisor</h1>";
    include 'landing.php'; 

} else {
    echo "<p>Error: Rol no reconocido</p>";
} 
?>
