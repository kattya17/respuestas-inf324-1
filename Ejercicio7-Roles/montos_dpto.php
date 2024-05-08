<?php
// Verificar si el usuario ha iniciado sesión
session_start();
if(!isset($_SESSION['nombre']) || !isset($_SESSION['rol'])) {
    // Si no ha iniciado sesión, redirigir al formulario de inicio de sesión
    header("Location: login.php");
    exit(); // Asegúrate de salir después de enviar la redirección
}

// Verificar el rol del usuario
$rol = $_SESSION['rol'];

// Si el usuario no tiene el rol de "director bancario", redirigir a otra página
if ($rol !== 'director') {
    header("Location: index.php");
    exit();
}

// Incluir archivo de conexión a la base de datos
include 'conexion.php';

// Consulta SQL para obtener los montos existentes por departamento
$sql = "SELECT
SUM(CASE WHEN p.departamento = 'LA PAZ' THEN t.monto ELSE 0 END) + SUM(CASE WHEN p.departamento = 'LA PAZ' THEN cb.saldo ELSE 0 END) AS La_Paz,
SUM(CASE WHEN p.departamento = 'ORURO' THEN t.monto ELSE 0 END) + SUM(CASE WHEN p.departamento = 'ORURO' THEN cb.saldo ELSE 0 END) AS Oruro,
SUM(CASE WHEN p.departamento = 'COCHABAMBA' THEN t.monto ELSE 0 END) + SUM(CASE WHEN p.departamento = 'COCHABAMBA' THEN cb.saldo ELSE 0 END) AS Cochabamba,
SUM(CASE WHEN p.departamento = 'SANTA CRUZ' THEN t.monto ELSE 0 END) + SUM(CASE WHEN p.departamento = 'SANTA CRUZ' THEN cb.saldo ELSE 0 END) AS Santa_Cruz,
SUM(CASE WHEN p.departamento = 'BENI' THEN t.monto ELSE 0 END) + SUM(CASE WHEN p.departamento = 'BENI' THEN cb.saldo ELSE 0 END) AS Beni,
SUM(CASE WHEN p.departamento = 'PANDO' THEN t.monto ELSE 0 END) + SUM(CASE WHEN p.departamento = 'PANDO' THEN cb.saldo ELSE 0 END) AS Pando,
SUM(CASE WHEN p.departamento = 'TARIJA' THEN t.monto ELSE 0 END) + SUM(CASE WHEN p.departamento = 'TARIJA' THEN cb.saldo ELSE 0 END) AS Tarija,
SUM(CASE WHEN p.departamento = 'SUCRE' THEN t.monto ELSE 0 END) + SUM(CASE WHEN p.departamento = 'SUCRE' THEN cb.saldo ELSE 0 END) AS Sucre,
SUM(CASE WHEN p.departamento = 'POTOSI' THEN t.monto ELSE 0 END) + SUM(CASE WHEN p.departamento = 'POTOSI' THEN cb.saldo ELSE 0 END) AS Potosi
FROM
personas p
INNER JOIN cuentas_bancarias cb ON p.id_persona = cb.id_persona
INNER JOIN transacciones t ON cb.id_cuenta = t.cuenta_id;";

// Ejecutar consulta
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Montos por Departamento</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Montos por Departamento</h2>
    <table>
        <tr>
            <th>Departamento</th>
            <th>Monto Total</th>
        </tr>
        <?php
        // Verificar si se obtuvieron resultados
        if ($resultado && $resultado->num_rows > 0) {
            // Obtener la fila de resultados
            $fila = $resultado->fetch_assoc();
            // Iterar sobre las columnas de la fila
            foreach ($fila as $departamento => $monto_total) {
                // Imprimir cada fila de la tabla
                echo "<tr>";
                echo "<td>$departamento</td>";
                echo "<td>$monto_total</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No se encontraron resultados.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Cerrar conexión a la base de datos
$conexion->close();
?>
