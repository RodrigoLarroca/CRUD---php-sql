<?php


if (!isset($_GET["id"])) {
    exit();
}

$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id, codigo ,nombre, informacion FROM maquinas WHERE id = ?;");
$sentencia->execute([$id]);
$maquinas = $sentencia->fetchObject();
if (!$maquinas) {
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
		<form action="guardarDatosEditados.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $maquinas->id; ?>">
			<div class="form-group">
				<label for="codigo">Codigo</label>
				<input value="<?php echo $maquinas->codigo; ?>" required name="codigo" type="text" id="codigo" placeholder="Codigo de maquina" class="form-control">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input value="<?php echo $maquinas->nombre; ?>" required name="nombre" type="text" id="nombre" placeholder="Nombre de maquina" class="form-control">
			</div>
			<div class="form-group">
				<label for="informacion">Informacion</label>
				<input value="<?php echo $maquinas->informacion; ?>" required name="informacion" type="text" id="informacion" placeholder="Informacion de maquina" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./maquinas.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>