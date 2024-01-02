<?php

if (!isset($_GET["id"])) {
    exit();
}

$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id, fecha, codigo ,estado, ubicacion, observacion FROM movimientos WHERE id = ?;");
$sentencia->execute([$id]);
$movimientos = $sentencia->fetchObject();
if (!$movimientos) {
    echo "¡No existe alguna maquina con ese ID!";
    exit();
}

?>
<?php include_once "encabezado.php"?>
<?php include_once "select.php" ?>

<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="guardarDatosEditadosMovimientos.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $movimientos->id; ?>">
            <div class="form-group">
    <label for="fecha">Fecha</label>
    <input required name="fecha" type="date" id="fecha" placeholder="Fecha de movimiento" class="form-control" value="<?php echo $movimientos->fecha; ?>">
</div>
            <div class="form-group">
                <label for="codigo">Codigo</label>
                <select required name="codigo" id="codigo" class="form-control">
                <?php foreach ($resultado_codigos as $codigo) { ?>
            <option value="<?php echo $codigo; ?>" <?php echo ($codigo == $movimientos->codigo) ? 'selected' : ''; ?>><?php echo $codigo; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <select required name="estado" id="estado" class="form-control">
                <?php foreach ($resultado_estados as $estado) { ?>
            <option value="<?php echo $estado; ?>" <?php echo ($estado == $movimientos->estado) ? 'selected' : ''; ?>><?php echo $estado; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="ubicacion">Ubicacion</label>
                <select required name="ubicacion" id="ubicacion" class="form-control">
                <?php foreach ($resultado_ubicaciones as $ubicacion) { ?>
            <option value="<?php echo $ubicacion; ?>" <?php echo ($ubicacion == $movimientos->ubicacion) ? 'selected' : ''; ?>><?php echo $ubicacion; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
    <label for="observacion">Observacion</label>
    <input required name="observacion" type="text" id="observacion" placeholder="Observacion de maquina" class="form-control" value="<?php echo $movimientos->observacion; ?>">
</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./movimientos.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>