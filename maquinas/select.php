<?php
include_once "base_de_datos.php";
$consulta_codigos = "SELECT codigo FROM maquinas";
$sentencia_codigos = $base_de_datos->prepare($consulta_codigos);
$sentencia_codigos->execute();
$resultado_codigos = $sentencia_codigos->fetchAll(PDO::FETCH_COLUMN);

$consulta_estados = "SELECT estado FROM situacion";
$sentencia_estados = $base_de_datos->prepare($consulta_estados);
$sentencia_estados->execute();
$resultado_estados = $sentencia_estados->fetchAll(PDO::FETCH_COLUMN);

$consulta_ubicaciones = "SELECT ubicacion FROM pertenencia";
$sentencia_ubicaciones = $base_de_datos->prepare($consulta_ubicaciones);
$sentencia_ubicaciones->execute();
$resultado_ubicaciones = $sentencia_ubicaciones->fetchAll(PDO::FETCH_COLUMN);

$consulta_nombres = "SELECT nombre FROM clasificacion";
$sentencia_nombres = $base_de_datos->prepare($consulta_nombres);
$sentencia_nombres->execute();
$resultado_nombres = $sentencia_nombres->fetchAll(PDO::FETCH_COLUMN);
?>