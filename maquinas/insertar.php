<?php
# Salir si alguno de los datos no está presente
if (!isset($_POST["codigo"]) || !isset($_POST["nombre"]) || !isset($_POST["informacion"])) {
    exit();
}

# Incluir el archivo de la base de datos
include_once "base_de_datos.php";

# Obtener los datos del formulario
$codigo = $_POST["codigo"];
$nombre = $_POST["nombre"];
$informacion = $_POST["informacion"];

# Verificar si el código ya existe en la base de datos
$sentencia_verificar = $base_de_datos->prepare("SELECT * FROM maquinas WHERE codigo = ?");
$sentencia_verificar->execute([$codigo]);

if ($sentencia_verificar->rowCount() == 0) {
    # Si el código no existe, insertar el nuevo registro
    $sentencia_insertar = $base_de_datos->prepare("INSERT INTO maquinas(codigo, nombre, informacion) VALUES (?, ?, ?);");
    $resultado = $sentencia_insertar->execute([$codigo, $nombre, $informacion]);

    # execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
    # Con eso podemos evaluar
    if ($resultado === true) {
        echo "<script>alert('Registro insertado correctamente.');";
        echo "window.location.href = 'maquinas.php';</script>";
    } else {
        echo "<script>alert('Algo salió mal. Por favor verifica que la tabla exista.');</script>";
    }
} else {
    # Mostrar un mensaje de error en la misma página y mantenerse en formulario.php
    echo "<script>alert('El código ya existe. Por favor, elige uno diferente.');";
    echo "window.location.href = 'formulario.php';</script>";
}
?>
