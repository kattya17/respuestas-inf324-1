<?php
session_start();

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexion.php';

    $nombre = $_POST['nombre'];
    $carnet = $_POST['carnet'];

    $sql = "SELECT * FROM personas WHERE nombre = '$nombre' AND ci = $carnet";
    $result = $conexion->query($sql);

    if ($result && $result->num_rows == 1) {
        $usuario = $result->fetch_assoc();

        $id_persona = $usuario['id_persona'];
        $rol_sql = "SELECT rol FROM roles WHERE id_persona = $id_persona";
        $rol_result = $conexion->query($rol_sql);

        if ($rol_result && $rol_result->num_rows == 1) {
            $rol = $rol_result->fetch_assoc()['rol'];
            $_SESSION['nombre'] = $nombre;
            $_SESSION['rol'] = $rol;
            header("Location: index.php");
            exit(); 
        } else {
            $error_message = "No se pudo obtener el rol del usuario";
        }
    } else {
        $error_message = "Credenciales incorrectas";
    }

    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br>
        <label for="carnet">Carnet:</label>
        <input type="number" name="carnet" id="carnet" required>
        <br>
        <input type="submit" value="Iniciar Sesión">
    </form>
    <?php if(isset($error_message)) { echo "<p>$error_message</p>"; } ?>
</body>
</html>
