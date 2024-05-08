<?php
include 'conexion.php';
include 'usuarios.php';
echo "eliminando";
echo (isset($_GET['id']));
if(isset($_GET['id'])) {
    $idUsuario = $_GET['id'];
    echo "id";
    echo $idUsuario;
    if(eliminarUsuario($conexion, $idUsuario)) {
        echo "eliminando";
        header("Location: index.php");
        exit(); 
    } else {
        echo "Error al intentar eliminar el usuario.";
    }
} else {
    echo "No se especificó un ID de usuario para eliminar.";
}
?>
