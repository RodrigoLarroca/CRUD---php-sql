<?php include_once "encabezado.php" ?>
<?php include_once "filtrocodigomovimientos.php" ?>

<div class="row">
    <div class="col-12">
        <h1>Movimientos</h1>
        <div class="row">
            <div class="col-12 text-right">
                <a class="btn btn-primary" href="./formulariomovimientos.php">+ Agregar movimiento</a>
            </div>
        </div>
        <form method="post" action="">
            <label for="codigo">Código:</label>
            <input type="text" name="codigo">

            <label for="estado">Estado:</label>
            <input type="text" name="estado">
            
            <label for="ubicacion">Ubicacion:</label>
            <input type="text" name="ubicacion">

            <button type="submit" name="buscar" class="btn btn-success">Buscar</button>
        </form>
        <br>

        <table class="table table-bordered">
            <!-- Encabezados de la tabla -->
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Codigo</th>
                    <th>Estado</th>
                    <th>Ubicacion</th>
                    <th>Observacion</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <!-- Iterar sobre los resultados de la consulta -->
                <?php while ($movimientos = $sentencia->fetchObject()) { ?>
                    <tr>
                        <td><?php echo $movimientos->id ?></td>
                        <td><?php echo $movimientos->fecha ?></td>
                        <td><?php echo $movimientos->codigo ?></td>
                        <td><?php echo $movimientos->estado ?></td>
                        <td><?php echo $movimientos->ubicacion ?></td>
                        <td><?php echo $movimientos->observacion ?></td>
                        <td><a class="btn btn-warning" href="<?php echo "editarmovimiento.php?id=" . $movimientos->id ?>">Editar 📝</a></td>
                        <td><a class="btn btn-danger" href="<?php echo "eliminarmovimiento.php?id=" . $movimientos->id ?>">Eliminar 🗑️</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once "pie.php" ?>
