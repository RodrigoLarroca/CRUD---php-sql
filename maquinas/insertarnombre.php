<?php
if (!isset($_POST["nombre"])) {
    exit();
}
include_once "base_de_datos.php";
$nombre = $_POST["nombre"];

$sentencia = $base_de_datos->prepare("INSERT INTO clasificacion(nombre) VALUES (?);");
$resultado = $sentencia->execute([$nombre]); 

if ($resultado === true) {
	header("Location: nombre.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista";
}
?>