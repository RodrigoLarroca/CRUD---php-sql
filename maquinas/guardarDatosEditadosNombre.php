<?php
if (
    !isset($_POST["nombre"])
) {
    exit();
}

include_once "base_de_datos.php";
$id = $_POST["id"];
$nombre = $_POST["nombre"];

$sentencia = $base_de_datos->prepare("UPDATE clasificacion SET nombre = ? WHERE id = ?;");
$resultado = $sentencia->execute([$nombre,  $id]); # Pasar en el mismo orden de los ?
if ($resultado === true) {
    header("Location: nombre.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del nombre";
}
?>