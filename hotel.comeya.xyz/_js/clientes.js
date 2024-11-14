$(document).ready(function() {
    // Crear Cliente
    $('#crearClienteForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: '/clientes/crear_cliente',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                // Cierra el modal
                $('#crearClienteModal').modal('hide');
                
                // Refresca la tabla o muestra un mensaje de éxito
                alert('Cliente creado exitosamente');
                location.reload(); // Esto recarga la página para ver el nuevo cliente
            },
            error: function(error) {
                alert('Hubo un error al crear el cliente');
            }
        });
    });

    // Ver Cliente
    $(document).on('click', '.ver-cliente', function() {
        let id = $(this).data('id');
        $.ajax({
            url: '/clientes/obtener_cliente/' + id,
            type: 'GET',
            success: function(data) {
                let cliente = JSON.parse(data);
                $('#verIdentificacion').text(cliente.identificacion);
                $('#verNombre').text(cliente.nombre);
                $('#verApellido').text(cliente.apellido);
                $('#verTelefono').text(cliente.telefono);
                $('#verEmail').text(cliente.email);
                $('#verProcedencia').text(cliente.procedencia);
                $('#verFechaNacimiento').text(cliente.fecha_nacimiento);
                $('#verOcupacion').text(cliente.ocupacion);
                $('#verSexo').text(cliente.sexo === 'M' ? 'Masculino' : 'Femenino');
                $('#verEstado').text(cliente.estado === '1' ? 'Activo' : 'Inactivo');
                $('#verClienteModal').modal('show');
            },
            error: function() {
                alert('Error al obtener los detalles del cliente');
            }
        });
    });

    // Editar Cliente
    $(document).on('click', '.editar-cliente', function() {
        let id = $(this).data('id');
        $.ajax({
            url: '/clientes/obtener_cliente/' + id,
            type: 'GET',
            success: function(data) {
                let cliente = JSON.parse(data);
                $('#id_cliente').val(cliente.id_cliente);
                $('#editarNombre').val(cliente.nombre);
                $('#editarApellido').val(cliente.apellido);
                $('#editarIdentificacion').val(cliente.identificacion);
                $('#editarTelefono').val(cliente.telefono);
                $('#editarEmail').val(cliente.email);
                $('#editarProcedencia').val(cliente.procedencia);
                $('#editarFechaNacimiento').val(cliente.fecha_nacimiento);
                $('#editarOcupacion').val(cliente.ocupacion);
                $('#editarSexo').val(cliente.sexo);
                $('#editarEstado').val(cliente.estado);
                $('#editarClienteModal').modal('show');
            },
            error: function() {
                alert('Error al obtener el cliente para edición');
            }
        });
    });

    // Actualizar Cliente
    $('#editarClienteForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '/clientes/actualizar_cliente',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#editarClienteModal').modal('hide');
                alert('Cliente actualizado exitosamente');
                location.reload();
            },
            error: function(error) {
                alert('Hubo un error al actualizar el cliente');
            }
        });
    });

    // Eliminar Cliente
    $(document).on('click', '.eliminar-cliente', function() {
        let id = $(this).data('id');
        if (confirm('¿Estás seguro de que deseas eliminar este cliente?')) {
            $.ajax({
                url: '/clientes/eliminar_cliente/' + id,
                type: 'DELETE',
                success: function(response) {
                    alert('Cliente eliminado exitosamente');
                    location.reload();
                },
                error: function(error) {
                    alert('Hubo un error al eliminar el cliente');
                }
            });
        }
    });
});
