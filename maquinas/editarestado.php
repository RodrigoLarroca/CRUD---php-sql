<?php

if (!isset($_GET["id"])) {
    exit();
}

$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id, estado FROM situacion WHERE id = ?;");
$sentencia->execute([$id]);
$estado = $sentencia->fetchObject();
if (!$estado) {
    echo "¡No existe alguna maquina con ese ID!";
    exit();
}

?>
<?php include_once "encabezado.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="guardarDatosEditadosEstado.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $estado->id; ?>">
			<div class="form-group">
				<label for="estado">Estado</label>
				<input value="<?php echo $estado->estado; ?>" required name="estado" type="text" id="estado" placeholder="Estado" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./estado.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>