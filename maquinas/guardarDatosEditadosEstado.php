<?php
if (
    !isset($_POST["estado"])
) {
    exit();
}

include_once "base_de_datos.php";
$id = $_POST["id"];
$estado = $_POST["estado"];

$sentencia = $base_de_datos->prepare("UPDATE situacion SET estado = ? WHERE id = ?;");
$resultado = $sentencia->execute([$estado,  $id]); # Pasar en el mismo orden de los ?
if ($resultado === true) {
    header("Location: estado.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del estado";
}
?>