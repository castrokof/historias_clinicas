
<script>
    
</script>


// Scripts se ejecutan cuando el dom este cargado completamente
$(document).ready(function () {

    //Select para consultar los servicios
    $("#fact_servicio").select2({
        theme: "bootstrap",
        ajax: {
            url: "{{ route('servicios_factura')}}",
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(data) {

                        return {

                            text: data.cod_servicio + ' - ' + data.nombre,
                            id: data.id_servicio

                        }
                    })
                };
            },
            cache: true
        }
    });

    //Select para consultar los servicios
    $("#fact_servicio2").select2({
        theme: "bootstrap",
        ajax: {
            url: "{{ route('servicios_factura')}}",
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(data) {

                        return {

                            text: data.cod_servicio + ' - ' + data.nombre,
                            id: data.id_servicio

                        }
                    })
                };
            },
            cache: true
        }
    });

});


