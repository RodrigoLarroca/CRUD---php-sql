<?php
/*
CRUD con SQL Server y PHP
@author parzibyte [parzibyte.me/blog]
@date 2019-06-03

================================
Este archivo guarda los datos del formulario
en donde se editan
================================
*/
?>

<?php

#Salir si alguno de los datos no está presente
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

#Si todo va bien, se ejecuta esta parte del código...

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
