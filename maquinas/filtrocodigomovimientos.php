<?php
include_once "base_de_datos.php";

if (isset($_POST['buscar'])) {
    $codigoBusqueda = $_POST['codigo'];
    $estadoBusqueda = $_POST['estado'];
    $ubicacionBusqueda = $_POST['ubicacion'];

    $consulta = "SELECT id, fecha, codigo, estado, ubicacion, observacion FROM movimientos WHERE codigo LIKE :codigoBusqueda AND estado LIKE :estadoBusqueda AND ubicacion LIKE :ubicacionBusqueda";
    $parametros = array(':codigoBusqueda' => '%' . $codigoBusqueda . '%', ':estadoBusqueda' => '%' . $estadoBusqueda . '%', ':ubicacionBusqueda' => '%' . $ubicacionBusqueda . '%');
} else {
    $consulta = "SELECT id, fecha, codigo, estado, ubicacion, observacion FROM movimientos";
    $parametros = array();
}

$sentencia = $base_de_datos->prepare($consulta, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
$sentencia->execute($parametros);
?>