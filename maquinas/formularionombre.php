<?php 
include_once "encabezado.php";
include_once "select.php";
?>

<div class="row">
	<div class="col-12">
		<h1>Agregar</h1>
		<form action="insertarnombre.php" method="POST">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input required name="nombre" type="text" id="nombre" placeholder="Nombre" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./nombre.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>
</div>
<?php include_once "pie.php" ?>