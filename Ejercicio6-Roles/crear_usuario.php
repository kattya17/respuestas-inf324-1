<?php
include 'conexion.php';
include 'usuarios.php';

    $nombre = $_POST['nombreEditar'];
    $apellidoPaterno = $_POST['apellidoPaternoEditar'];
    $apellidoMaterno = $_POST['apellidoMaternoEditar'];
    $carnet = $_POST['carnetEditar'];
    $celular = $_POST['celularEditar'];
    $tipoCuenta = $_POST['tipoCuenta'];
    $saldo = $_POST['saldo'];

    if (crearUsuario($conexion, $nombre, $carnet, $apellidoPaterno, $apellidoMaterno, $celular, $tipoCuenta,$saldo)) {
        echo "ingreso";
        header("Location: index.php");
        exit(); 
    } else {
        echo "Error al intentar actualizar el usuario.";
    }


?>
