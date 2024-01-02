<?php

?>
<?php
if (!isset($_POST["estado"])) {
    exit();
}
include_once "base_de_datos.php";
$estado = $_POST["estado"];

$sentencia = $base_de_datos->prepare("INSERT INTO situacion(estado) VALUES (?);");
$resultado = $sentencia->execute([$estado]); 

if ($resultado === true) {
	header("Location: estado.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista";
}
