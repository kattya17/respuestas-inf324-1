<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuentas Bancarias</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h1>Cuentas Bancarias</h1>
    <div class="menu">
        <button><a href="?tipo=ahorros">Cuenta de Ahorros</a></button>
        <button><a href="?tipo=corriente">Cuenta Corriente</a></button>
        <button><a href="?tipo=inversion">Cuenta DPF</a></button>
    </div>
    <div class="imagen">
    <img src='tarjeta.png'>
    </div>
    
    <div class="contenido-cuenta">
        <?php 
        if(isset($_GET['tipo'])) {
            $tipo = $_GET['tipo'];
            include 'cuentas.php';
        }
        ?>
    </div>
</div>

</body>
</html>
