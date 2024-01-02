<?php
if (!isset($_POST["codigo"]) || !isset($_POST["nombre"]) || !isset($_POST["informacion"])) {
    exit();
}

include_once "base_de_datos.php";

$codigo = $_POST["codigo"];
$nombre = $_POST["nombre"];
$informacion = $_POST["informacion"];

$sentencia_verificar = $base_de_datos->prepare("SELECT * FROM maquinas WHERE codigo = ?");
$sentencia_verificar->execute([$codigo]);

if ($sentencia_verificar->rowCount() == 0) {
    $sentencia_insertar = $base_de_datos->prepare("INSERT INTO maquinas(codigo, nombre, informacion) VALUES (?, ?, ?);");
    $resultado = $sentencia_insertar->execute([$codigo, $nombre, $informacion]);

    if ($resultado === true) {
        echo "<script>alert('Registro insertado correctamente.');";
        echo "window.location.href = 'maquinas.php';</script>";
    } else {
        echo "<script>alert('Algo salió mal. Por favor verifica que la tabla exista.');</script>";
    }
} else {
    echo "<script>alert('El código ya existe. Por favor, elige uno diferente.');";
    echo "window.location.href = 'formulario.php';</script>";
}
?>
