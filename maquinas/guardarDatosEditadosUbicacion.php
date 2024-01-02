<?php
if (
    !isset($_POST["ubicacion"])
) {
    exit();
}

include_once "base_de_datos.php";
$id = $_POST["id"];
$ubicacion = $_POST["ubicacion"];

$sentencia = $base_de_datos->prepare("UPDATE pertenencia SET ubicacion = ? WHERE id = ?;");
$resultado = $sentencia->execute([$ubicacion,  $id]); # Pasar en el mismo orden de los ?
if ($resultado === true) {
    header("Location: ubicacion.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID de la ubicacion";
}
?>