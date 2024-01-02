<?php
if (!isset($_POST["fecha"]) || !isset($_POST["codigo"]) || !isset($_POST["estado"]) || !isset($_POST["ubicacion"]) || !isset($_POST["observacion"])) {
    exit();
}

include_once "base_de_datos.php";
$fecha = $_POST["fecha"];
$codigo = $_POST["codigo"];
$estado = $_POST["estado"];
$ubicacion = $_POST["ubicacion"];
$observacion = $_POST["observacion"];

$sentencia = $base_de_datos->prepare("INSERT INTO movimientos(fecha, codigo, estado, ubicacion, observacion) VALUES (?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$fecha, $codigo, $estado, $ubicacion, $observacion]); # Pasar en el mismo orden de los ?

if ($resultado === true) {
	header("Location: movimientos.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista";
}
?>