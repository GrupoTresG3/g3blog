
<!DOCTYPE html>
<html lang="es">
  <head>

    <meta charset="utf-8">

  <!-- Link del bootstrap INTERNO-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Link de jquery EXTERNO -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Link de Jquery de bootstrap INTERNO-->
    <script src="js/bootstrap.min.js"></script>

  <!-- Link del css PERSONALIZADO -->
  <link rel="stylesheet" type="text/css" href="css/personalizado.css">
  
  <!-- Link iconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Link del js personalizado -->
    <script src="funciones_js/funciones.js" type="text/javascript"></script>

  <!-- Para que se adapte correctamente a moviles y puedas hacer zoom -->
  <meta name="viewport" content="width=device-width, initial-scale=1">


    <script>
        $(document).ready(function(){
       $("#Formulario").submit(function( event ){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: '../php/contacto2.php',
            data: $(this).serialize(),
            success: function(data){
                $("#respuesta").slideDown();
                $("#respuesta").html(data);
                $('#respuesta2').modal('show');
                document.getElementById('Formulario').reset();
            }
        });

        return false;
    });
});
    </script>


	<!-- Link del css PERSONALIZADO -->
	<link rel="stylesheet" type="text/css" href="css/personalizado.css">
	
	<!-- Link iconos -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



	<!-- Para que se adapte correctamente a moviles y puedas hacer zoom -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

  </head>


<body>

<!---------------------------------------------------------------------------------------------------------->

<!-- INICIO NAVEGADOR -->
<?php 
  //INICIO DE SESIÓN.
    session_name("usuariologueado");
    session_start();
    if (isset($_SESSION['usuario'])) {
        if ($_SESSION['usuario']=='admin'){
            require_once('cabeceraadmin.php');
        }

        else{
            require_once('cabecerausuario.php');
        }
    }

    else{
        require_once('cabecerainvitado.php');
    }

?>

<!-- FIN NAVEGADOR -->


<!-- Content -->
<section>
    <div class="container">
        <div class="container">
            <div class="container">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2905.699182976039!2d-2.9049711487381917!3d43.257725985828316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4e4fac895299f7%3A0x328cb72d75d5411c!2sCIFP+Txurdinaga+LHII!5e0!3m2!1ses!2ses!4v1508398980861" style="border:0" allowfullscreen="" frameborder="0" height="250" width="100%"></iframe>

            </div>
            <hr>
        </div>
        <div class="container">
            <form role="form" id="Formulario" action="../php/contacto2.php" method="POST">
                <div class="form-group">
                    <label class="control-label" for="Nombre">Nombre</label>
                    <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Introduzca su nombre" required autofocus />
                </div>            
                <div class="form-group">
                    <label class="control-label" for="Motivo">Motivo de Contacto</label>
                    <select name="Motivo" class="form-control">
                        <option value="Consulta General">Consulta General</option>
                        <option value="Sugerencias">Sugerencias</option>
                        <option value="Informe un problema">Informar de un problema</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="Empresa">Empresa</label>
                    <input type="text" class="form-control" id="Empresa" name="Empresa" placeholder="Introduzca el nombre de su empresa" required />
                </div>
                <div class="form-group">
                    <label class="control-label" for="Correo">Dirección de Correo Electrónico</label>
                    <input type="email" class="form-control" id="Correo" name="Correo" placeholder="Introduzca su correo electrónico" required />
                </div>
                <div class="form-group">
                    <label class="control-label" for="Mensaje">Mensaje</label>
                    <textarea rows="5" cols="30" class="form-control" id="Mensaje" name="Mensaje" placeholder="Introduzca su mensaje" required ></textarea>
                </div>
                <div class="form-group">                
                    <input type="submit" class="btn btn-primary" value="Enviar">
                    <input type="reset" class="btn btn-default" value="Limpiar">                
                </div>
                <div id="respuesta" style="display: none;"></div>
            </form>
        </div>       
    </div>
</section>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/jquery.min.js"><\/script>')</script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
































<!-- INICIO FOOTER -->

<?php require_once('footer.html'); ?>


<!-- FIN FOOTER -->

</body>
</html>
