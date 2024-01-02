<?php 
include_once "encabezado.php";
include_once "select.php";
?>

<div class="row">
	<div class="col-12">
		<h1>Agregar</h1>
		<form action="insertarestado.php" method="POST">
			<div class="form-group">
				<label for="estado">Estado</label>
				<input required name="estado" type="text" id="estado" placeholder="Estado" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./estado.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>
</div>
<?php include_once "pie.php" ?>