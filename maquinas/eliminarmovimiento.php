<?php

if (!isset($_GET["id"])) {
    exit();
}

$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM movimientos WHERE id = ?;");
$resultado = $sentencia->execute([$id]);
if ($resultado === true) {
    header("Location: movimientos.php");
} else {
    echo "Algo salió mal";
}