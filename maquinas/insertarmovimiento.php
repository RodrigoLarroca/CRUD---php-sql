<?php

?>
<?php
#Salir si alguno de los datos no está presente
if (!isset($_POST["fecha"]) || !isset($_POST["codigo"]) || !isset($_POST["estado"]) || !isset($_POST["ubicacion"]) || !isset($_POST["observacion"])) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$fecha = $_POST["fecha"];
$codigo = $_POST["codigo"];
$estado = $_POST["estado"];
$ubicacion = $_POST["ubicacion"];
$observacion = $_POST["observacion"];

/*
Al incluir el archivo "base_de_datos.php", todas sus variables están
a nuestra disposición. Por lo que podemos acceder a ellas tal como si hubiéramos
copiado y pegado el código
 */
$sentencia = $base_de_datos->prepare("INSERT INTO movimientos(fecha, codigo, estado, ubicacion, observacion) VALUES (?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$fecha, $codigo, $estado, $ubicacion, $observacion]); # Pasar en el mismo orden de los ?

#execute regresa un booleano. True en caso de que todo vaya bien, falso en caso contrario.
#Con eso podemos evaluar

if ($resultado === true) {
    # Redireccionar a la lista
	header("Location: movimientos.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista";
}
