<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Inventarios</h1>
<p class="mb-4">Se encuentran guardados cada producto que se ha ingresado en el sistema. Después de eliminar un producto, después de 30 días, se eliminarán permanentemente.</p>

<button class="btn" style="background-color: #4c71dd; color: white; border-radius: 5px;" data-toggle="modal" data-target="#crearInventarioModal">
    <i class="fas fa-box-open me-2"></i> Agregar Inventario
</button><br><br>


<!-- Tabla de Inventarios -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Entradas</th>
                        <th>Salidas</th>
                        <th>Ubicación</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (isset($inventory) && !empty($inventory)): ?>
                        <?php foreach ($inventory as $item): ?>
                            <tr>
                                <td><?= $item->id_inventario ?></td>
                                <td><?= $item->producto_nombre ?></td> <!-- Mostrar el nombre del producto -->
                                <td><?= $item->entradas ?></td>
                                <td><?= $item->salidas ?></td>
                                <td><?= $item->id_habitacion ?></td>
                                <td><?= date('d/m/Y', strtotime($item->fecha)) ?></td>
                                <td>
                                    <?php 
                                        if ($item->estado == '1') {
                                            echo '<span class="badge bg-success">Activo</span>';
                                        } else {
                                            echo '<span class="badge bg-danger">Inactivo</span>';
                                        }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <div class="crud-buttons d-flex justify-content-center">
                                        <!-- Leer -->
                                        <button class="btn btn-info btn-sm mx-1 leer-inventario" data-id="<?= $item->id_inventario ?>" title="Leer">
                                            <i class="fas fa-eye"></i>
                                        </button>

                                        <!-- Actualizar -->
                                        <button class="btn btn-warning btn-sm mx-1 editar-inventario" data-id="<?= $item->id_inventario ?>" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <!-- Eliminar -->
                                        <button class="btn btn-danger btn-sm mx-1 eliminar-inventario" data-id="<?= $item->id_inventario ?>" title="Eliminar">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">No hay productos en el inventario.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Ver Producto -->
<div class="modal fade" id="verProductoModal" tabindex="-1" role="dialog" aria-labelledby="verProductoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verProductoLabel">Información del Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>ID Producto:</label>
                    <p id="verIdProducto"></p>
                </div>
                <div class="form-group">
                    <label>Nombre del Producto:</label>
                    <p id="verNombreProducto"></p>
                </div>
                <div class="form-group">
                    <label>Entradas:</label>
                    <p id="verEntradasProducto"></p>
                </div>
                <div class="form-group">
                    <label>Salidas:</label>
                    <p id="verSalidasProducto"></p>
                </div>
                <div class="form-group">
                    <label>Ubicación:</label>
                    <p id="verUbicacionProducto"></p>
                </div>
                <div class="form-group">
                    <label>Fecha:</label>
                    <p id="verFechaProducto"></p>
                </div>
                <div class="form-group">
                    <label>Estado:</label>
                    <p id="verEstadoProducto"></p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Crear Inventario -->
<div class="modal fade" id="crearInventarioModal" tabindex="-1" role="dialog" aria-labelledby="crearInventarioLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearInventarioLabel">Crear Inventario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="crearInventarioForm">
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="datetime-local" class="form-control" id="fecha" name="fecha" required>
                    </div>
                    <div class="form-group">
                        <label for="id_usuario">ID Usuario</label>
                        <input type="number" class="form-control" id="id_usuario" name="id_usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="id_producto">ID Producto</label>
                        <input type="number" class="form-control" id="id_producto" name="id_producto" required>
                    </div>
                    <div class="form-group">
                        <label for="id_habitacion">ID Habitación</label>
                        <input type="number" class="form-control" id="id_habitacion" name="id_habitacion" required>
                    </div>
                    <div class="form-group">
                        <label for="entradas">Entradas</label>
                        <input type="text" class="form-control" id="entradas" name="entradas" required>
                    </div>
                    <div class="form-group">
                        <label for="salidas">Salidas</label>
                        <input type="text" class="form-control" id="salidas" name="salidas" required>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" id="estado" name="estado">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Inventario</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Editar Inventario -->
<div class="modal fade" id="editarInventarioModal" tabindex="-1" role="dialog" aria-labelledby="editarInventarioLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarInventarioLabel">Editar Inventario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editarInventarioForm">
                    <input type="hidden" id="id_inventario" name="id_inventario">
                    <!-- Los campos de entrada son iguales al modal de creación -->
                    <div class="form-group">
                        <label for="editarFecha">Fecha</label>
                        <input type="datetime-local" class="form-control" id="editarFecha" name="fecha" required>
                    </div>
                    <div class="form-group">
                        <label for="editarIdUsuario">ID Usuario</label>
                        <input type="number" class="form-control" id="editarIdUsuario" name="id_usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="editarIdProducto">ID Producto</label>
                        <input type="number" class="form-control" id="editarIdProducto" name="id_producto" required>
                    </div>
                    <div class="form-group">
                        <label for="editarIdHabitacion">ID Habitación</label>
                        <input type="number" class="form-control" id="editarIdHabitacion" name="id_habitacion" required>
                    </div>
                    <div class="form-group">
                        <label for="editarEntradas">Entradas</label>
                        <input type="text" class="form-control" id="editarEntradas" name="entradas" required>
                    </div>
                    <div class="form-group">
                        <label for="editarSalidas">Salidas</label>
                        <input type="text" class="form-control" id="editarSalidas" name="salidas" required>
                    </div>
                    <div class="form-group">
                        <label for="editarEstado">Estado</label>
                        <select class="form-control" id="editarEstado" name="estado">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar Inventario</button>
                </form>
            </div>
        </div>
    </div>
</div>

 
<!-- Estilos adicionales -->
<style>
    /* Botones CRUD centrados */
    .crud-buttons .btn {
        font-size: 0.9em;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s ease;
    }

    /* Espaciado entre botones */
    .crud-buttons .btn + .btn {
        margin-left: 8px;
    }

    /* Efecto hover en botones */
    .crud-buttons .btn:hover {
        opacity: 0.9;
    }
</style>
