<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Clientes</h1><br>

<button class="btn" style="background-color: #4c71dd; color: white; border-radius: 5px;" data-toggle="modal" data-target="#crearClienteModal">
    <i class="fas fa-user-plus me-2"></i> Crear Cliente
</button>
<br>
<br>
<!-- Tabla de Clientes -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Identificación</th>
                        <th>Teléfono</th>
                        <th>Procedencia</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (isset($clients) && !empty($clients)): ?>
                        <?php foreach ($clients as $client): ?>
                            <tr>
                                <td><?= $client->id_cliente ?></td>
                                <td><?= ucfirst($client->nombre) ?></td>
                                <td><?= ucfirst($client->apellido) ?></td>
                                <td><?= $client->identificacion ?></td>
                                <td><?= $client->telefono ?></td>
                                <td><?= ucfirst($client->procedencia) ?></td>
                                <td class="text-center">
                                    <div class="crud-buttons d-flex justify-content-center">
                                        <!-- Ver -->
                                        <button class="btn btn-info btn-sm mx-1 ver-cliente" data-id="<?= $client->id_cliente ?>" title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </button>

                                        <!-- Editar -->
                                        <button class="btn btn-warning btn-sm mx-1 editar-cliente" data-id="<?= $client->id_cliente ?>" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <!-- Eliminar -->
                                        <button class="btn btn-danger btn-sm mx-1 eliminar-cliente" data-id="<?= $client->id_cliente ?>" title="Eliminar">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">No hay clientes disponibles.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL -->

<div class="modal fade" id="verClienteModal" tabindex="-1" role="dialog" aria-labelledby="verClienteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verClienteLabel">Información del Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Identificación:</strong> <span id="verIdentificacion"></span></p>
                <p><strong>Nombre:</strong> <span id="verNombre"></span></p>
                <p><strong>Apellido:</strong> <span id="verApellido"></span></p>
                <p><strong>Teléfono:</strong> <span id="verTelefono"></span></p>
                <p><strong>Email:</strong> <span id="verEmail"></span></p>
                <p><strong>Procedencia:</strong> <span id="verProcedencia"></span></p>
                <p><strong>Fecha de Nacimiento:</strong> <span id="verFechaNacimiento"></span></p>
                <p><strong>Ocupación:</strong> <span id="verOcupacion"></span></p>
                <p><strong>Sexo:</strong> <span id="verSexo"></span></p>
                <p><strong>Estado:</strong> <span id="verEstado"></span></p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editarClienteModal" tabindex="-1" role="dialog" aria-labelledby="editarClienteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarClienteLabel">Editar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editarClienteForm">
                    <input type="hidden" id="id_cliente" name="id_cliente">
                    <div class="form-group">
                        <label for="editarNombre">Nombre</label>
                        <input type="text" class="form-control" id="editarNombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="editarApellido">Apellido</label>
                        <input type="text" class="form-control" id="editarApellido" name="apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="editarIdentificacion">Identificación</label>
                        <input type="text" class="form-control" id="editarIdentificacion" name="identificacion" required>
                    </div>
                    <div class="form-group">
                        <label for="editarTelefono">Teléfono</label>
                        <input type="text" class="form-control" id="editarTelefono" name="telefono">
                    </div>
                    <div class="form-group">
                        <label for="editarEmail">Email</label>
                        <input type="email" class="form-control" id="editarEmail" name="email">
                    </div>
                    <div class="form-group">
                        <label for="editarProcedencia">Procedencia</label>
                        <input type="text" class="form-control" id="editarProcedencia" name="procedencia">
                    </div>
                    <div class="form-group">
                        <label for="editarFechaNacimiento">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="editarFechaNacimiento" name="fecha_nacimiento">
                    </div>
                    <div class="form-group">
                        <label for="editarOcupacion">Ocupación</label>
                        <input type="text" class="form-control" id="editarOcupacion" name="ocupacion">
                    </div>
                    <div class="form-group">
                        <label for="editarSexo">Sexo</label>
                        <select class="form-control" id="editarSexo" name="sexo">
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editarEstado">Estado</label>
                        <select class="form-control" id="editarEstado" name="estado">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Crear Cliente -->
<div class="modal fade" id="crearClienteModal" tabindex="-1" role="dialog" aria-labelledby="crearClienteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearClienteLabel">Crear Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="crearClienteForm">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="identificacion">Identificación</label>
                        <input type="text" class="form-control" id="identificacion" name="identificacion" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="procedencia">Procedencia</label>
                        <input type="text" class="form-control" id="procedencia" name="procedencia">
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                    </div>
                    <div class="form-group">
                        <label for="ocupacion">Ocupación</label>
                        <input type="text" class="form-control" id="ocupacion" name="ocupacion">
                    </div>
                    <div class="form-group">
                        <label for="sexo">Sexo</label>
                        <select class="form-control" id="sexo" name="sexo">
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" id="estado" name="estado">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cliente</button>
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
