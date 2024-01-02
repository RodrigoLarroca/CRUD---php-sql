<?php
if (
    !isset($_POST["codigo"]) ||
    !isset($_POST["nombre"]) ||
    !isset($_POST["informacion"]) ||
    !isset($_POST["id"])
) {
    exit();
}

include_once "base_de_datos.php";
$id = $_POST["id"];
$codigo = $_POST["codigo"];
$nombre = $_POST["nombre"];
$informacion = $_POST["informacion"];

$sentencia = $base_de_datos->prepare("UPDATE maquinas SET nombre = ?, codigo = ?, informacion = ? WHERE id = ?;");
$resultado = $sentencia->execute([$codigo, $nombre, $informacion, $id]); # Pasar en el mismo orden de los ?
if ($resultado === true) {
    header("Location: listar.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
}
?>