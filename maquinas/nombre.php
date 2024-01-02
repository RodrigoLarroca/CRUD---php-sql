<?php
include_once "base_de_datos.php";
$consulta = "select id, nombre from clasificacion";
$sentencia = $base_de_datos->prepare($consulta, [
    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
$sentencia->execute();
?>

<?php include_once "encabezado.php" ?>
<div class="row">
	<div class="col-12">
		<h1>Nombre</h1>
		<div class="row">
            <div class="col-12 text-right">
                <a class="btn btn-primary" href="./formularionombre.php">+ Agregar nombre</a>
            </div>
        </div>
		<br>
		<table class="table table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($clasificacion = $sentencia->fetchObject()){ ?>
					<tr>
						<td><?php echo $clasificacion->id ?></td>
						<td><?php echo $clasificacion->nombre ?></td>
						<td><a class="btn btn-warning" href="<?php echo "editarnombre.php?id=" . $clasificacion->id?>">Editar 📝</a></td>
						<td><a class="btn btn-danger" href="<?php echo "eliminarnombre.php?id=" . $clasificacion->id?>">Eliminar 🗑️</a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<?php include_once "pie.php" ?>