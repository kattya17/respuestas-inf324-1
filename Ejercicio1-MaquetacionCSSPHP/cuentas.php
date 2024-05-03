<?php
$tipo = $_GET['tipo'];

$cuentas = array(
    "ahorros" => array("nombre" => "Cuenta de Ahorros", "saldo" => 1000),
    "corriente" => array("nombre" => "Cuenta Corriente", "saldo" => 5000),
    "inversion" => array("nombre" => "Cuenta DPF", "saldo" => 10000)
);
$cuenta = $cuentas[$tipo];
?>

<h1><?php echo $cuenta['nombre']; ?></h1>
<p>Saldo: <?php echo number_format($cuenta['saldo'], 2); ?></p>
