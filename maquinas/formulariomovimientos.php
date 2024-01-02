<?php 
include_once "encabezado.php";
include_once "select.php";
?>

<div class="row">
	<div class="col-12">
		<h1>Agregar movimiento</h1>
		<form action="insertarmovimiento.php" method="POST">
			<div class="form-group">
				<label for="fecha">Fecha</label>
				<input required name="fecha" type="date" id="fecha" placeholder="Fecha de movimiento" class="form-control">
			</div>
            <div class="form-group">
                <label for="codigo">Codigo</label>
                <select required name="codigo" id="codigo" class="form-control">
                    <?php foreach ($resultado_codigos as $codigo) { ?>
                        <option value="<?php echo $codigo; ?>"><?php echo $codigo; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <select required name="estado" id="estado" class="form-control">
                    <?php foreach ($resultado_estados as $estado) { ?>
                        <option value="<?php echo $estado; ?>"><?php echo $estado; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="ubicacion">Ubicacion</label>
                <select required name="ubicacion" id="ubicacion" class="form-control">
                    <?php foreach ($resultado_ubicaciones as $ubicacion) { ?>
                        <option value="<?php echo $ubicacion; ?>"><?php echo $ubicacion; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
				<label for="observacion">Observacion</label>
				<input required name="observacion" type="text" id="observacion" placeholder="Observacion de maquina" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./movimientos.php" class="btn btn-warning">Ver todas</a>
		</form>
	</div>
</div>
<?php include_once "pie.php" ?>