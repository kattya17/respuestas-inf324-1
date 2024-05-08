<?php
include 'conexion.php'; 

function obtenerUsuarios($conexion) {
    $sql = "SELECT cuentas_bancarias.*, personas.*
    FROM cuentas_bancarias
    INNER JOIN personas ON cuentas_bancarias.id_persona = personas.id_persona";
    $resultado = $conexion->query($sql);
    return $resultado->fetch_all(MYSQLI_ASSOC);
}

function crearUsuario($conexion, $nombre, $carnet, $apellidoPaterno, $apellidoMaterno, $celular,$departamento, $tipoCuenta,$saldo) {
    $sql = "INSERT INTO personas (nombre, ci, apellidoPaterno, apellidoMaterno, celular, departamento) VALUES ('$nombre', $carnet, '$apellidoPaterno', '$apellidoMaterno', $celular,'$departamento')";
    $conexion->query($sql);
    $idPersona = $conexion->insert_id;
    $sqlCuenta = "INSERT INTO cuentas_bancarias (id_persona, tipo, saldo) VALUES ($idPersona, '$tipoCuenta', $saldo)";
    return $conexion->query($sqlCuenta);

}

function eliminarUsuario($conexion, $id) {
    $sql = "DELETE FROM cuentas_bancarias WHERE id_persona = $id";
    $conexion->query($sql);
    $sql2 ="DELETE FROM personas WHERE id_persona=$id";
    return $conexion->query($sql2);
}

function actualizarUsuario($conexion, $idUsuario, $nombre, $carnet, $apellidoPaterno, $apellidoMaterno, $celular, $departamento, $tipoCuenta,$saldo) {
    $sql = "UPDATE personas SET nombre='$nombre', ci=$carnet, apellidoPaterno='$apellidoPaterno', apellidoMaterno='$apellidoMaterno', celular=$celular, departamento='$departamento' WHERE id_persona=$idUsuario";
    $conexion->query($sql);
    $sqlCuenta = "UPDATE cuentas_bancarias SET tipo='$tipoCuenta', saldo=$saldo WHERE id_persona=$idUsuario";
    return $conexion->query($sqlCuenta);
}
?>
