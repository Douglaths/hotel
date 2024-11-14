<div class="container mt-4">
    <h1 class="mb-3">Administración de Habitaciones</h1>
    <p class="text-muted">Visualización rápida del estado de todas las habitaciones</p>

    <div class="row">
        <?php if (isset($rooms) && !empty($rooms)): ?>
            <?php foreach ($rooms as $room): ?>
                <div class="col-6 col-md-3 mb-4 d-flex justify-content-center">
                    <div class="card room-card text-center shadow-sm">
                        <div class="card-body p-3">
                            <h5 class="card-title">Habitación - <?= $room->nombre ?></h5>
                            <p class="card-text"><?= ucfirst($room->nombre) ?></p>
                            <p class="card-text">
                                <?php 
                                    // Mostrar el estado con diferentes colores
                                    switch ($room->estado) {
                                        case 1: // Disponible
                                            echo '<span class="badge bg-success">Disponible</span>';
                                            break;
                                        case 2: // Ocupada
                                            echo '<span class="badge bg-danger">Ocupada</span>';
                                            break;
                                        case 3: // Mantenimiento
                                            echo '<span class="badge bg-warning">Mantenimiento</span>';
                                            break;
                                        case 4: // Limpieza
                                            echo '<span class="badge bg-info">Limpieza</span>';
                                            break;
                                        default:
                                            echo '<span class="badge bg-secondary">Desconocido</span>';
                                    }
                                ?>
                            </p>
                            <!-- Información adicional que aparece en hover -->
                            <div class="additional-info">
                                <p><strong>Número de camas:</strong> <?= $room->numero_camas ?></p>
                                <p><strong>Tipo de habitación:</strong> <?= $room->tipo_habitacion ?></p>
                                <p><strong>Valor:</strong> $<?= number_format($room->valor, 2) ?></p>
                                
                                <!-- Botones CRUD centrados -->
                                <div class="crud-buttons d-flex justify-content-center mt-2">
                                    <button class="btn btn-info btn-sm mx-1" title="Leer">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm mx-1" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-success btn-sm mx-1" title="Cambiar Estado">
                                        <i class="fas fa-check"></i>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">No hay habitaciones disponibles.</p>
        <?php endif; ?>
    </div>
</div>

<style>
    /* Ajustes para centrar la última fila si está incompleta */
    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    /* Estilo de la tarjeta */
    .room-card {
        border-radius: 12px;
        background: linear-gradient(to top, #ffffff, #f2f2f2);
        box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        width: 220px;
    }

    .room-card:hover {
        transform: scale(1.05); /* Efecto de agrandamiento */
        box-shadow: 0px 12px 24px rgba(0, 0, 0, 0.2);
    }

    /* Título de la tarjeta */
    .room-card .card-title {
        font-size: 1.1em;
        font-weight: bold;
        color: #333;
    }

    /* Badges */
    .badge {
        font-size: 0.85em;
        padding: 5px 10px;
        border-radius: 12px;
    }

    /* Información adicional oculta al principio */
    .additional-info {
        display: none;
        font-size: 0.9em;
        color: #666;
        margin-top: 10px;
    }

    /* Mostrar la información adicional y botones en hover */
    .room-card:hover .additional-info {
        display: block;
    }

    /* Ocultar el nombre en hover para que solo se muestre la información adicional */
    .room-card:hover .card-text {
        display: none;
    }

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

    /* Estilo de los botones en hover */
    .crud-buttons .btn:hover {
        opacity: 0.9;
    }
</style>
