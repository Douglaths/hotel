$(function () {

    $('#btn_ingresar').on('click', function(e) {
        let texto = '';
        let bandera = true;

        if( $('#usuario').val() == '' ) {
            texto += "\n" + 'Por favor ingrese el usuario.';
            bandera = false;
        }

        if( $('#contrasena').val() == '' ) {
            texto += "\n" + 'Por favor ingrese la contraseña.';
            bandera = false;
        }

        if(!bandera) {
            alert(texto);
        } else {
            $.post('/login/verificar_usuario', {usuario: ""+$('#usuario').val()+"", clave:""+$('#contrasena').val()+""}, function(respuesta){ 
                console.log(respuesta);
                let datos = respuesta.split("=");
                if(datos[0] == "OK") {
                    window.open('/home/index','_parent');
                } else {
                    alert(datos[1]);
                }
            });
        }
    });
});