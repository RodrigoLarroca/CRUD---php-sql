<?php
if (!isset($_POST["ubicacion"])) {
    exit();
}
include_once "base_de_datos.php";
$ubicacion = $_POST["ubicacion"];

$sentencia = $base_de_datos->prepare("INSERT INTO pertenencia(ubicacion) VALUES (?);");
$resultado = $sentencia->execute([$ubicacion]); 

if ($resultado === true) {
	header("Location: ubicacion.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista";
}
?>