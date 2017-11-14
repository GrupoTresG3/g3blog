// mostrar y ocultar formulario de inicio de sesion
$(document).ready(function(){
    $("#iniciarsesion").click(function(){
        $("#formulogin").show(1000);
    });  

    $("#cerrar").click(function(){
        $("#formulogin").hide(1000);
    });  

	
});


// mostrar y ocultar redes sociales
$(document).ready(function(){
    $("#btnmostrar").click(function(){
        $(".redes_sociales").show("slow");
        $("#btnmostrar").hide();
        $("#btnocultar").show();

    });

    $("#btnocultar").click(function(){
        $(".redes_sociales").hide("slow");
        $("#btnocultar").hide();
        $("#btnmostrar").show();

    });
});




// funcion que selecciona en la lista y carrusel a que entrada acceder
$(document).ready(function(){
  $('#listaul').on('click', 'li', function(){
    var valor = ($(this).text());
    document.getElementById("inpuhid").value = valor;
    document.forms["formentr"].submit();

  });

  $('#enlacecarruselc').on('click', function(){
      var valor = ($('#tecomentada').text());
      document.getElementById("inpuhid").value = valor;
      document.forms["formentr"].submit();
  });

    $('#enlacecarruselv').on('click', function(){
      var valor = ($('#tevisitada').text());
      document.getElementById("inpuhid").value = valor;
      document.forms["formentr"].submit();
  });  
   
});


      






// funcion que controla que el textarea del comentario tenga contenido
      $(document).ready(function(){
        //Si escribes algo en el textarea, puedes darle a comentar
        $('#areacoment').keyup(function(){
            $('#botonenv').prop("disabled", false);
        //Si borras todo lo que has escrito, no puedes darle
        if ($('#areacoment').val().length < 1) {
          $('#botonenv').prop("disabled", true);
        }
      });
        //Al recargar la pagina, no podras darle
        $('#botonenv').prop("disabled", true);
        // Al clicar en algun elemento de la lista, se le dara un valor a un input hidden y se ejecutara un formulario
        $('#listaul').on('click', 'li', function(){
          var valor = ($(this).text());
          document.getElementById("inpuhid").value = valor;
          document.forms["formentr"].submit();
        });
  });