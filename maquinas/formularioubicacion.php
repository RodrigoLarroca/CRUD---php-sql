<?php

?>
<?php include_once "encabezado.php" ?>
<?php include_once "select.php" ?>

<div class="row">
	<div class="col-12">
		<h1>Agregar</h1>
		<form action="insertarubicacion.php" method="POST">
			<div class="form-group">
				<label for="ubicacion">Ubicacion</label>
				<input required name="ubicacion" type="text" id="ubicacion" placeholder="Ubicacion" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./ubicacion.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>
</div>
<?php include_once "pie.php" ?>