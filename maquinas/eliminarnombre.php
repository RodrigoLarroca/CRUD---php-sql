<?php

if (!isset($_GET["id"])) {
    exit();
}

$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM clasificacion WHERE id = ?;");
$resultado = $sentencia->execute([$id]);
if ($resultado === true) {
    header("Location: nombre.php");
} else {
    echo "Algo salió mal";
}
