<?php

?>
<?php

include_once "base_de_datos.php";
$consulta = "select id, ubicacion from pertenencia";
# Preparar sentencia e indicar que vamos a usar un cursor
$sentencia = $base_de_datos->prepare($consulta, [
    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
# Ejecutar sin parámetros
$sentencia->execute();
# Abajo iteramos
?>

<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<?php include_once "encabezado.php" ?>
<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Ubicacion</h1>
		<div class="row">
            <div class="col-12 text-right">
                <a class="btn btn-primary" href="./formularioubicacion.php">+ Agregar ubicacion</a>
            </div>
        </div>
		<br>
		<table class="table table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>ID</th>
					<th>Ubicacion</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($pertenencia = $sentencia->fetchObject()){ ?>
					<tr>
						<td><?php echo $pertenencia->id ?></td>
						<td><?php echo $pertenencia->ubicacion ?></td>
						<td><a class="btn btn-warning" href="<?php echo "editarubicacion.php?id=" . $pertenencia->id?>">Editar 📝</a></td>
						<td><a class="btn btn-danger" href="<?php echo "eliminarubicacion.php?id=" . $pertenencia->id?>">Eliminar 🗑️</a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<?php include_once "pie.php" ?>