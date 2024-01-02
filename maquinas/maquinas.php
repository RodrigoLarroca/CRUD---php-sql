
<?php
include_once "base_de_datos.php";
$consulta = "select id, codigo, nombre, informacion from maquinas";
$sentencia = $base_de_datos->prepare($consulta, [
    PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,
]);
$sentencia->execute();
?>

<?php include_once "filtrocodigomaquinas.php" ?>
<?php include_once "encabezado.php" ?>

<div class="row">
<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
	<div class="col-12">
		<h1>Maquinas</h1>
		<div class="row">
            <div class="col-12 text-right">
                <a class="btn btn-primary" href="./formulario.php">+ Agregar maquina</a>
            </div>
        </div>
		<form method="post" action="">
            <label for="codigo">Código:</label>
            <input type="text" name="codigo" required>
            <button type="submit" name="buscar" class="btn btn-success">Buscar</button>
        </form>
        <br>
		<table class="table table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>ID</th>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Informacion</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<!--
					Y aquí usamos el ciclo while y fecthObject, el cuerpo
					del ciclo queda intacto pero ahora estamos usando
					cursores :)
				-->
				<?php while ($maquinas = $sentencia->fetchObject()){ ?>
					<tr>
						<td><?php echo $maquinas->id ?></td>
						<td><?php echo $maquinas->codigo ?></td>
						<td><?php echo $maquinas->nombre ?></td>
						<td><?php echo $maquinas->informacion ?></td>
						<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $maquinas->id?>">Editar 📝</a></td>
							<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $maquinas->id?>">Eliminar 🗑️</a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<?php include_once "pie.php" ?>