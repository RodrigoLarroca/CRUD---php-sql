<?php

if (
    !isset($_POST["fecha"]) ||
    !isset($_POST["codigo"]) ||
    !isset($_POST["estado"]) ||
    !isset($_POST["ubicacion"]) ||
    !isset($_POST["observacion"]) ||
    !isset($_POST["id"])
) {
    exit();
}

include_once "base_de_datos.php";
$id = $_POST["id"];
$fecha = $_POST["fecha"];
$codigo = $_POST["codigo"];
$estado = $_POST["estado"];
$ubicacion = $_POST["ubicacion"];
$observacion = $_POST["observacion"];

$sentencia = $base_de_datos->prepare("UPDATE movimientos SET fecha = ?, codigo = ?, estado = ?, ubicacion = ?, observacion = ? WHERE id = ?;");
$resultado = $sentencia->execute([$fecha, $codigo, $estado, $ubicacion, $observacion, $id]); # Pasar en el mismo orden de los ?
if ($resultado === true) {
    header("Location: movimientos.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
}
?>