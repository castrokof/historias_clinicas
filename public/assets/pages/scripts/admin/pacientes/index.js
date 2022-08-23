


// Scripts se ejecutan cuando el dom este cargado completamente
$(document).ready(function () {

    //Función para convertir minuscula en mayuscula en el form
    $(".UpperCase").on("keypress", function () {
        $input = $(this);
        setTimeout(function () {
            $input.val($input.val().toUpperCase());
        }, 50);
    });

    //------------------------------------------------------Funciones de Pacientes-----------------------------------------//

     //Select para consultar las Ocupaciones
     $("#paciente_ocupacion").select2({
        theme: "bootstrap",
        ajax: {
          url: "{{ route('ocupacion')}}",
          dataType: 'json',
          delay: 250,
          processResults: function(data) {
            return {
              results: $.map(data, function(data) {
  
                return {
  
                  text: data.nombre,
                  id: data.id_ocupacion
  
                }
              })
            };
          },
          cache: true
        }
      });

      //Select para consultar los Paises
    $("#paciente_pais").select2({
        theme: "bootstrap",
        ajax: {
          url: "{{ route('pais')}}",
          dataType: 'json',
          delay: 250,
          processResults: function(data) {
            return {
              results: $.map(data, function(data) {
  
                return {
  
                  text: data.nombre,
                  id: data.id_pais
  
                }
              })
            };
          },
          cache: true
        }
      });
  
      //Select para consultar la EPS, Niveles
      $("#eps").select2({
        language: "es",
        theme: "bootstrap",
        ajax: {
          url: "{{ route('eps')}}",
          dataType: 'json',
          delay: 250,
          processResults: function(data) {
            return {
              results: $.map(data, function(data) {
  
                return {
  
                  //text: data.codigo,
                  text: data.codigo + " - " + data.nombre,
                  id: data.id_eps_empresas
  
                }
              })
            };
          },
          cache: true
        }
      });
  
      //Select para consultar el Departamento
      $("#paciente_departamento").select2({
        theme: "bootstrap",
        ajax: {
          url: "{{ route('departamento')}}",
          dataType: 'json',
          delay: 250,
          processResults: function(data) {
            return {
              results: $.map(data, function(data) {
  
                return {
  
                  text: data.nombre,
                  id: data.id_departamento
  
                }
              })
            };
          },
          cache: true
        }
      });
  
      //Select para consultar la Ciudad
      $("#paciente_ciudad").select2({
        theme: "bootstrap",
        ajax: {
          url: "{{ route('ciudad')}}",
          dataType: 'json',
          delay: 250,
          processResults: function(data) {
            return {
              results: $.map(data, function(data) {
  
                return {
  
                  text: data.nombre,
                  id: data.id_ciudad
  
                }
              })
            };
          },
          cache: true
        }
      });
  
      //Select para consultar el Barrio
      $("#paciente_barrio").select2({
        theme: "bootstrap",
        ajax: {
          url: "{{ route('barrio')}}",
          dataType: 'json',
          delay: 250,
          processResults: function(data) {
            return {
              results: $.map(data, function(data) {
  
                return {
  
                  text: data.nombre,
                  id: data.id_barrio
  
                }
              })
            };
          },
          cache: true
        }
      });

   

});


