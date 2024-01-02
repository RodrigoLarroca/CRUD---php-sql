<?php
include_once "encabezado.php";
include_once "select.php";


?>

<div class="row">
	<div class="col-12">
		<h1>Agregar</h1>
		<form action="insertar.php" method="POST">
			<div class="form-group">
				<label for="codigo">Codigo</label>
				<input required name="codigo" type="text" id="codigo" placeholder="Codigo de maquina" class="form-control">
			</div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <select required name="nombre" id="nombre" class="form-control">
                    <?php foreach ($resultado_nombres as $nombreItem) { ?>
                        <option value="<?php echo $nombreItem; ?>"><?php echo $nombreItem; ?></option>
                    <?php } ?>
                </select>
            </div>
			<div class="form-group">
				<label for="informacion">Informacion</label>
				<input required name="informacion" type="text" id="informacion" placeholder="Informacion de maquina" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./maquinas.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>
</div>
<?php include_once "pie.php" ?>
