<?php


if (!isset($_GET["id"])) {
    exit();
}

$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id, ubicacion FROM pertenencia WHERE id = ?;");
$sentencia->execute([$id]);
$ubicacion = $sentencia->fetchObject();
if (!$ubicacion) {
    #No existe
    echo "¡No existe alguna maquina con ese ID!";
    exit();
}

#Si la maquina existe, se ejecuta esta parte del código
?>
<?php include_once "encabezado.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="guardarDatosEditadosUbicacion.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $ubicacion->id; ?>">
			<div class="form-group">
				<label for="ubicacion">Ubicacion</label>
				<input value="<?php echo $ubicacion->ubicacion; ?>" required name="ubicacion" type="text" id="ubicacion" placeholder="Ubicacion" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./ubicacion.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>