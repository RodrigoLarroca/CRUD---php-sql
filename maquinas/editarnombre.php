<?php

if (!isset($_GET["id"])) {
    exit();
}

$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id, nombre FROM clasificacion WHERE id = ?;");
$sentencia->execute([$id]);
$nombre = $sentencia->fetchObject();
if (!$nombre) {
    echo "¡No existe alguna maquina con ese ID!";
    exit();
}

?>
<?php include_once "encabezado.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="guardarDatosEditadosNombre.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $nombre->id; ?>">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input value="<?php echo $nombre->nombre; ?>" required name="nombre" type="text" id="nombre" placeholder="Nombre" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./nombre.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>