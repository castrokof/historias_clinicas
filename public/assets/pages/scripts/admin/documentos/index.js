// Scripts se ejecutan cuando el dom este cargado completamente
$(document).ready(function () {

    //Función para convertir minuscula en mayuscula en el form
    $(".UpperCase").on("keypress", function () {
        $input = $(this);
        setTimeout(function () {
            $input.val($input.val().toUpperCase());
        }, 50);
    });

    //------------------------------------------------------Funciones de Listas-----------------------------------------//

    //Función para abrir modal y prevenir el cierre de creación de documentos
    $(document).on('click', '.crear_documento', function () {

        $('#modal-documentos').modal({ backdrop: 'static', keyboard: false });
        $('#modal-documentos').modal('show');

    });
    

    //Recuperar el valor del radio button de documentos

    function customSwitch1() {

        if ($('#customSwitch1').prop('checked')) {
            $('#estado').val('1');
            console.log($('#estado').val());

        } else {

            $('#estado').val('0');
            console.log($('#estado').val());

        }
    }

    $("#customSwitch1").change(customSwitch1);



    // Función para cambio de check y obtener el cambio del dom

    $(document).on('click', '.check_99', function () {

        if ($(this).is(':checked')) {
            var data = {
                id: $(this).val(),
                _token: $('input[name=_token]').val()
            };

        }
        //Si se ha desmarcado se ejecuta el siguiente mensaje.
        else {
            var data = {
                id: $(this).val(),
                _token: $('input[name=_token]').val()
            }
        }

        ajaxRequest('/detalle-estado', data);
    });

    // Función envío de datos para activar o desactivar

    function ajaxRequest(url, data) {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (respuesta) {

                $('#listasGeneralDetalle').DataTable().ajax.reload();
                Manteliviano.notificaciones(respuesta.respuesta, respuesta.titulo, respuesta.icon);
            }
        });
    }

});


