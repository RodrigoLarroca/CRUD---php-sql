<?php
include_once "base_de_datos.php";

if (isset($_POST['buscar'])) {
    $codigoBusqueda = $_POST['codigo'];

    $consulta = "SELECT id, codigo, nombre, informacion FROM maquinas WHERE codigo LIKE :codigoBusqueda";
    $parametros = array(':codigoBusqueda' => '%' . $codigoBusqueda . '%');
} else {
    $consulta = "SELECT id, codigo, nombre, informacion FROM maquinas";
    $parametros = array();
}

$sentencia = $base_de_datos->prepare($consulta, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
$sentencia->execute($parametros);
?>