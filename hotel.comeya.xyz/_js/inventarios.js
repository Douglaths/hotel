$(document).ready(function() {
    // Crear inventario (ya está configurado)
    $('#crearInventarioForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/inventarios/crear_inventario',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#crearInventarioModal').modal('hide');
                alert('Inventario creado exitosamente');
                location.reload();
            },
            error: function(error) {
                alert('Hubo un error al crear el inventario');
            }
        });
    });

    // Editar inventario
    $(document).on('click', '.editar-inventario', function() {
        let id = $(this).data('id');
        $.ajax({
            url: '/inventarios/obtener_inventario/' + id,
            type: 'GET',
            success: function(data) {
                let inventario = JSON.parse(data);
                // Rellena el formulario de edición con los datos del inventario
                $('#id_inventario').val(inventario.id_inventario);
                $('#editarFecha').val(inventario.fecha);
                $('#editarIdUsuario').val(inventario.id_usuario);
                $('#editarIdProducto').val(inventario.id_producto);
                $('#editarIdHabitacion').val(inventario.id_habitacion);
                $('#editarEntradas').val(inventario.entradas);
                $('#editarSalidas').val(inventario.salidas);
                $('#editarEstado').val(inventario.estado);
                $('#editarInventarioModal').modal('show');
            },
            error: function() {
                alert('Error al obtener el inventario para edición');
            }
        });
    });

    // Actualizar inventario
    $('#editarInventarioForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/inventarios/actualizar_inventario',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#editarInventarioModal').modal('hide');
                alert('Inventario actualizado exitosamente');
                location.reload();
            },
            error: function(error) {
                alert('Hubo un error al actualizar el inventario');
            }
        });
    });

    // Eliminar inventario
    $(document).on('click', '.eliminar-inventario', function() {
        let id = $(this).data('id');
        if (confirm('¿Estás seguro de que deseas eliminar este inventario?')) {
            $.ajax({
                url: '/inventarios/eliminar_inventario/' + id,
                type: 'DELETE',
                success: function(response) {
                    alert('Inventario eliminado exitosamente');
                    location.reload();
                },
                error: function(error) {
                    alert('Hubo un error al eliminar el inventario');
                }
            });
        }
    });

    // Ver producto
    $(document).on('click', '.leer-inventario', function() {
        let id = $(this).data('id');
        $.ajax({
            url: '/inventarios/obtener_inventario/' + id,
            type: 'GET',
            success: function(data) {
                let inventario = JSON.parse(data);

                // Rellenar los datos en el modal
                $('#verIdProducto').text(inventario.id_inventario);
                $('#verNombreProducto').text(inventario.producto_nombre);
                $('#verEntradasProducto').text(inventario.entradas);
                $('#verSalidasProducto').text(inventario.salidas);
                $('#verUbicacionProducto').text(inventario.id_habitacion);
                $('#verFechaProducto').text(new Date(inventario.fecha).toLocaleDateString());
                $('#verEstadoProducto').text(inventario.estado === '1' ? 'Activo' : 'Inactivo');

                // Mostrar el modal
                $('#verProductoModal').modal('show');
            },
            error: function() {
                alert('Error al obtener los detalles del producto');
            }
        });
    });

});
