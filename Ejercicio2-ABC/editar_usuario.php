<?php
include 'conexion.php';
include 'usuarios.php';
echo ($_SERVER["REQUEST_METHOD"] == "POST");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUsuario = $_POST['idUsuarioEditar']; 
    $nombre = $_POST['nombreEditar'];
    $apellidoPaterno = $_POST['apellidoPaternoEditar'];
    $apellidoMaterno = $_POST['apellidoMaternoEditar'];
    $carnet = $_POST['carnetEditar'];
    $celular = $_POST['celularEditar'];
    $tipoCuenta = $_POST['tipoCuenta'];
    $saldo = $_POST['saldo'];

    if (actualizarUsuario($conexion, $idUsuario, $nombre, $carnet, $apellidoPaterno, $apellidoMaterno, $celular,$tipoCuenta,$saldo)) {
        header("Location: index.php");
        exit(); 
    } else {
        echo "Error al intentar actualizar el usuario";
    }
} else {
    if(isset($_GET['id'])) {
        $idUsuario = $_GET['id'];
        $usuario = obtenerUsuarioPorId($conexion, $idUsuario);
        if ($usuario) {
        } else {
            echo "No se encontró el usuario especificado.";
        }
    } else {
        echo "No se especificó un ID de usuario para editar.";
    }
}
?>
