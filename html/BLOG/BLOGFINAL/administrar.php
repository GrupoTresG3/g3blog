<!-------------------------------------------------------ACCIONES DEL PRINCIPIO DE PHP ------------------------------------------------------------>

<?php
  
  //INICIO DE SESIÓN.
    session_name("usuariologueado");
    session_start();
    if ($_SESSION['usuario']!='admin') {
      header('Location:index.php');
    }

  //SI SE HA CLICADO EN EL BOTÓN "Añadir nuevo" DEL FORMULARIO DE USUARIOS VA A  "registro.php".
  if(isset($_POST['nuevoU'])){
    header("Location:registro.php");
  }

  //SI SE HA CLICADO EN EL BOTÓN "Añadir nueva" DEL FORMULARIO DE ENTRADAS VA A "editorentrada.php".
  if(isset($_POST['nuevaE'])){
    header("Location:editorentrada.php");
  }
?>


<!DOCTYPE html>
<html lang="es">

  <head>
    
    <!-----------------------------------------------------------METAS ------------------------------------------------------------------>

    <meta charset="utf-8">

    <!-- PARA QUE SE ADAPTE CORRECTAMENTE Y PUEDAS HACER ZOOM -->
    <meta name="viewport" content="width=device-width, initial-scale=1">




    <!-----------------------------------------------------------LINKS ------------------------------------------------------------------>

	  <!-- BOOTSTRAP INTERNO-->
   	<link rel="stylesheet" href="css/bootstrap.css">

   	<!-- JQUERY EXTERNO -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  	<!-- JQUERY DE BOOTSTRAP INTERNO-->
  	<script src="js/bootstrap.min.js"></script>

	  <!-- PERSONALIZADO -->
	  <link rel="stylesheet" type="text/css" href="css/personalizado.css">
	
	  <!-- ICONOS -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <!-- FUNCIONES PERSONALIZADAS -->
    <script src="funciones_js/funciones.js" type="text/javascript" charset="utf-8" async defer></script>




    <!-----------------------------------------------------------SCRIPTS ------------------------------------------------------------------>

    <script src="js/tinymce.min.js"></script>
    
    <!-- SCRIPT DEL EDITOR DE TEXTO DE LA SECCIÓN ENTRADAS -->
    <script>
      tinymce.init({
        mode : "specific_textareas",
        editor_selector : "mceEditor",
        selector: 'textarea',
        height: 550,
        theme: 'modern',
        mobile: {
          theme: 'beta-mobile',
          plugins: [ 'autosave' ]
        },

        // powerpaste  advcode tinymcespellchecker a11ychecker linkchecker mediaembed print
        plugins: 'preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount  imagetools  contextmenu colorpicker textpattern help',

        toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',

        image_advtab: true,

        templates: [
          { title: 'Test template 1', content: 'Test 1' },
          { title: 'Test template 2', content: 'Test 2' }
        ],

        content_css: [
          '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
          '//www.tinymce.com/css/codepen.min.css'
        ],

        content_style: [
          'body{max-width:900px; padding:30px; margin:auto;font-size:16px;font-family:Lato,"Helvetica Neue",Helvetica,Arial,sans-serif; line-height:1.3; letter-spacing: -0.03em;color:#222} h1,h2,h3,h4,h5,h6 {font-weight:400;margin-top:1.2em} h1 {} h2{} .tiny-table {width:100%; border-collapse: collapse;} .tiny-table td, th {border: 1px solid #555D66; padding:10px; text-align:left;font-size:16px;font-family:Lato,"Helvetica Neue",Helvetica,Arial,sans-serif; line-height:1.6;} .tiny-table th {background-color:#E2E4E7}'
        ],

        visual_table_class: 'tiny-table'
      });
    </script>

  </head>

<body>




  <!-----------------------------------------------------------NAVEGADOR ------------------------------------------------------------------>

  <!-- INICIO NAVEGADOR -->
  <nav class="navbar navbar-default">

    <!-- CONTENEDOR QUE HACE QUE TODO VAYA HACIA LA IZQUIERDA -->
    <div class="container-fluid">
      

      <!---------------------------------------------------------------------------------------------->

      <!-- CONTENEDOR DE LOGO Y RAYAS AL HACERSE TAMAÑO TABLET Y MOVIL -->
      <div class="navbar-header">

        <!-- BOTÓN DE LAS TRES RAYAS AL HACERSE TAMAÑO TABLET O MOVIL -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">

          <!-- RAYAS -->
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>   

        </button>

        <!-- LOGO QUE SI CLICAS EN EL TE LLEVA A "index.php" -->
        <a class="navbar-brand" href="logueado.php">G3Blog</a>

      </div>
      <!-- FIN CONTENEDOR DE LOGO Y RAYAS AL HACERSE TAMAÑO TABLET Y MOVIL -->


      <!---------------------------------------------------------------------------------------------->

      <!-- CONTENEDOR DE ENTRADAS, REGISTRO, INICIO DE SESIÓN, ETC. -->
      <div class="collapse navbar-collapse" id="myNavbar">


        <!-- INICIO QUE TE REDIRIGE A "index.php" -->
        <ul class="nav navbar-nav">

          <li class="active"><a href="index.php"><span class="fa fa-home"></span> Inicio</a></li>  

        </ul>
        <!-- FIN INICIO QUE TE REDIRIGE A "index.php" -->
  	


        <!-- SALUDO Y CIERRE DE SESIÓN -->
        <ul class="nav navbar-nav navbar-right">
          
          <!-- SALUDO AL USUARIO DE LA SESIÓN -->
          <li><a>Hola <?php echo $_SESSION['usuario'];?>!</a></li>

          <!-- CIERRE DE SESIÓN QUE TE LLEVA A "index.php" -->
          <li>
            <form method="POST" action="funciones_php/funcionesphp.php">
              <button id="cerrarsesion" name="cerrarsesion"><span class="glyphicon glyphicon-remove"></span> Cerrar sesión
              </button>
            </form>
          </li>

        </ul>
        <!-- FIN SALUDO Y CIERRE DE SESIÓN -->



      </div>
      <!-- FIN CONTENEDOR DE ENTRADAS, REGISTRO, INICIO DE SESIÓN, ETC. -->

    </div>
    <!-- FIN CONTENEDOR QUE HACE QUE TODO VAYA HACIA LA IZQUIERDA -->

  </nav>	
  <!-- FIN NAVEGADOR -->




<!----------------------------------------------- SELECT QUE RELLENA EL BADGET DEL ASIDE ---------------------------------------------------->



<!-- SELECT PARA RELLENAR EL BADGE -->
<?php

  //Conectar con la base de datos.
  @ $basedatos = new mysqli('localhost', 'id3287809_admin', 'adming3', 'id3287809_g3blog'); 


  /*-------------------------SELECCIÓN NÚMERO DE USUARIOS-------------------------------*/

  /*NÚMERO DE USUARIOS*/

  //Preparar consulta sql.
  $sql = ("SELECT * FROM usuario");

  //Realizar la consulta.
  $basedatos -> query($sql);

  //Meter las filas afectadas en una variable.
  $numeroUsuarios = $basedatos -> affected_rows;




  /*-------------------------SELECCIÓN NÚMERO DE ENTRADAS-------------------------------*/

  /*NÚMERO DE ENTRADAS*/

  //Preparar consulta sql.
  $sql2 = ("SELECT * FROM entrada");

  //Realizar la consulta.
  $basedatos -> query($sql2);

  //Meter las filas afectadas en una variable.
  $numeroEntradas = $basedatos -> affected_rows;




  /*-------------------------SELECCIÓN NÚMERO DE COMENTARIOS-------------------------------*/

  /*NÚMERO DE COMENTARIOS*/

  //Preparar consulta sql.
  $sql3 = ("SELECT * FROM comentario");

  //Realizar la consulta.
  $basedatos -> query($sql3);

  //Meter las filas afectadas en una variable.
  $numeroComentarios = $basedatos -> affected_rows;

?>
<!-- FIN SELECT PARA RELLENAR EL BADGE -->




<!------------------------------------------------------------------ ASIDE -------------------------------------------------------------->


<!-- INICIO SECTION -->
<section class="container text-justify row">  

  <!-- INICIO ASIDE -->
  <aside id="administrarAside" class="col-xs-12 col-sm-12 col-md-2 col-lg-2">

    <ul class="list-group nav nav-tabs">

      <!-- USUARIOS -->
      <a data-toggle="tab" href="#"><li id="administrarU" class="list-group-item">Usuarios<span class="badge"><?php echo $numeroUsuarios; ?></span></li></a>

      <!-- ENTRADAS -->
      <a href="#"><li class="list-group-item" id="administrarE">Entradas<span class="badge"><?php echo $numeroEntradas; ?></span></li></a>

      <!-- COMENTARIOS -->
      <a href="#"><li class="list-group-item" id="administrarC">Comentarios<span class="badge"><?php echo $numeroComentarios; ?></span></li></a>
    </ul>

  </aside>
  <!-- FIN ASIDE -->
  



<!---------------------------------------------------------------- ADMINISTRAR USUARIOS ----------------------------------------------------------->
  

  <!-- INICIO ARTICLE CONTENIDO USUARIOS -->
  <article id="ContenidoUsuario" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
    
    <!-- TÍTULO USUARIOS -->
    <h1 class='page-header'>USUARIOS</h1>
    
    <!-- FORMULARIO USUARIOS -->
    <form method="POST" action="administrar.php">


      <!------------------------------------------ DESPLEGABLE DE USUARIOS Y BOTÓN MOSTRAR ---------------------------------------------------->
      
      <!-- NOMBRE FORMULARIO -->
      <div class="form-group">

        <label>Nombre:</label>
      
        <select id="selectUsuarios" name="selectUsuarios">  

          <?php 
            //Conectar con la base de datos.
            @ $basedatos = new mysqli('localhost', 'id3287809_admin', 'adming3', 'id3287809_g3blog'); 

            //Preparar consulta sql.
            $sql = ("SELECT * FROM usuario");

            //Realizar la consulta.
            $consulta = $basedatos -> query($sql);

            //Guardar el array en la variable.
            $usuario = $consulta->fetch_object();


            //Mientras seleccione datos.
            while($usuario != null){

              //Muestra por pantalla.
              echo "<option>$usuario->nombre</option>";

              //Vuelve a guardar el array en la variable.
              $usuario = $consulta->fetch_object();
            }
          ?>
        </select>


        <!-- BOTÓN MOSTRAR -->
        <button id="mostrarU" name="mostrarU" class="btn btn-info">Mostrar</button>
      
      </div>
      <!-- FIN NOMBRE USUARIO -->


      

      <!------------------------------------------ AL CLICAR EN BOTÓN MOSTRAR ---------------------------------------------------->

      <!-- CONSULTA PARA SACAR DATOS DE CADA USUARIO -->
      <?php

        //Si se ha pulsado el botón mostrar.
        if(isset($_POST['mostrarU'])){

          //Meter el usuario seleccionado en una variable
          $usuarioModificar = $_POST['selectUsuarios'];

          //Preparar la consulta.
          $sql = ("SELECT * FROM usuario WHERE nombre = '".$_POST['selectUsuarios']."'");

            //Realizar la consulta.
            $consulta = $basedatos -> query($sql);

            //Guardar el array en la variable.
            $usuario = $consulta->fetch_object();


            //Mientras seleccione datos.
            while($usuario != null){

              //Guardar el correo y la contraseña en variables.
              $correoU = $usuario->correo;
              $contraseñaU = $usuario->pass;

              //Vuelve a guardar el array en la variable.
              $usuario = $consulta->fetch_object();
            }

            //Hacer que el ContenidoUsuario sea visible porque si no al recargar la página se cierra.
            echo "<script>  document.getElementById('ContenidoUsuario').style='display:block;';</script>";


            /*Cambiar el color y el color de fondo*/
            echo "<script> document.getElementById('administrarU').style='background: #333333; color: white;';</script>";

      ?>
      <!-- FIN CONSULTA -->




      <!------------------------------------------ DATOS DEL USUARIO ---------------------------------------------------->

      <!-- USUARIO -->
      <div class="form-group">

        <label>Usuario: </label>
          <?php
          echo "<input type='text' name='usu' value='$usuarioModificar'>";        

          ?>
        
      </div>
      <!-- FIN USUARIO -->


      <!---------------------------------------------------------------------------->


      <!-- CORREO USUARIO -->
      <div class="form-group">

        <label>Correo electrónico: </label>
          <?php
          echo "<input type='text' name='correoNuevo' value='$correoU'>";        

          ?>
        
      </div>
      <!-- FIN CORREO USUARIO -->


      <!---------------------------------------------------------------------------->


      <!-- CONTRASEÑA USUARIO -->
      <div class="form-group">

        <label>Contraseña: </label>
          <?php
          echo "<input type='text' name='lblContraseña'/>";

          //Label trampa para poder modificar el usuario seleccionado en el desplegable.
          echo "<input type='text' name='lbltrampa' id='lbltrampa' value='$usuarioModificar'/>";

        } /*Aquí se cierra el if de mostrar para que los datos aparezcan solo al clicar en el botón*/       

          ?>

      </div>
      <!-- FIN CONTRASEÑA USUARIO -->




      <!------------------------------------------ BOTONES ---------------------------------------------------->


      <!-- BOTONES -->
      <div class="form-group" id="botonesUsuario">
        
        <!-- BOTÓN AÑADIR NUEVO USUARIO -->
        <button name="nuevoU" class="btn btn-primary">Añadir nuevo</button>


        <!---------------------------------------------------------------------------->


        <!-- BOTÓN CANCELAR -->
        <button name="cancelarU" class="btn">Cancelar</button>


        <!---------------------------------------------------------------------------->


        <!-- BOTÓN GUARDAR -->
        <button name="guardarU" class="btn btn-success">Guardar</button>
        



        <!------------------------------------------ AL CLICAR EN BOTÓN GUARDAR ---------------------------------------------------->

        <?php

          //Si se ha pulsado el botón guardar.
          if(isset($_POST['guardarU'])){

            //Encriptar contraseña.
            $contraseñaEncriptada = md5($_POST['lblContraseña']);

            //Coger el nombre de usuario que hay en el input.
            $usuarioActual = $_POST['usu'];

            //Preparar consulta.
            $sql = ("UPDATE usuario SET nombre = '".$usuarioActual."', correo = '".$_POST['correoNuevo']."', verificado = '1', pass = '".$contraseñaEncriptada."' WHERE nombre='".$_POST['lbltrampa']."'");

            //Realizar la consulta.
            $consulta = $basedatos -> query($sql);

            //Mensaje de confirmación.
            echo "<h4>¡Usuario actualizado correctamente!</h4>";

            //Hacer que el ContenidoUsuario sea visible porque si no al recargar la página se cierra.
            echo "<script>  document.getElementById('ContenidoUsuario').style='display:block;';</script>";


            /*Cambiar el color y el color de fondo*/
            echo "<script> document.getElementById('administrarU').style='background: #333333; color: white;';</script>";
          }

        ?>


        <!-------------------------------------------------------->


        <button id="eliminarU" name="eliminarU" class="btn btn-danger">Eliminar</button>
      
        <!--Si se ha pulsado eliminarU-->

        <?php

          if(isset($_POST['eliminarU'])){
            if($_POST['lbltrampa']=="admin"){
              echo "Este usuario no se puede eliminar";
            }
            else{
            //Preparar la consulta.          
            $sql = ("DELETE FROM usuario WHERE nombre='".$_POST['lbltrampa']."'");


            //Realizar la consulta.
            $consulta = $basedatos->query($sql);


            //Mensaje de confirmación.
            echo "<h4>¡Usuario eliminado correctamente!</h4>";


            //Hacer que el ContenidoEntrada sea visible porque si no al recargar la página se cierra.
            echo "<script>  document.getElementById('ContenidoEntradas').style='display:block;';</script>";
          

            /*Cambiar el color y el color de fondo*/
            echo "<script> document.getElementById('administrarE').style='background: #333333; color: white;';</script>";
          }
        }

        ?>

      <!--Fin si se ha pulsado eliminarC-->

      </div>
      <!-- FIN BOTONES -->

    </form>
          
  </article>
  <!-- FIN ARTICLE CONTENIDO USUARIOS -->




<!---------------------------------------------------------------- ADMINISTRAR ENTRADAS ----------------------------------------------------------->


  <!-- INICIO ARTICLE CONTENIDO ENTRADAS -->
  <article id="ContenidoEntrada" class="col-xs-9 col-sm-9 col-md-7 col-lg-7">

    <h1 class='page-header'>ENTRADAS</h1>
    <!-- Formulario subir archivos -->
    <hr>
    <form id="formusubir" method="post" enctype="multipart/form-data">
         <h3>Subir imágenes</h3><input type="file" name="foto" />
          <button type="submit" class="btn btn-primary" name="subir" >Subir archivo</button>
          <button  id="imagenessubidas" type="submit" class="btn btn-primary" name="imagenes" >Mis imágenes</button>
    </form>
    <hr>
    <script>
     // funcion que controla el boton de ver imagenes
      document.getElementById('imagenessubidas').addEventListener("click",function(formu){
      formu.preventDefault();
      $('#imagenesart').css("display","block");
      });

    </script>
    <?php
    if (isset($_POST['subir'])) {

    $control = getimagesize($_FILES["foto"]["tmp_name"]);
    if($control !== false) {
      // codigo PHP subir archivo "nombre temporal--donde se sube--nombre final"
      move_uploaded_file($_FILES['foto']['tmp_name'],'uploads/entrada_imagenes/'.$_FILES['foto']['name']);

    } else {
      echo "No es una imagen!";

    }
    }
    ?>


    
    <!-- FORMULARIO ENTRADAS -->
    <form method="POST" action="administrar.php">


      <!------------------------------------------ DESPLEGABLE DE ENTRADAS Y BOTÓN MOSTRAR ---------------------------------------------------->
      

      <!-- TÍTULO FORMULARIO -->
      <div class="form-group">

        <label>Título:</label>

        <select id="selectEntradas" name="selectEntradas">  

          <?php 
            //Conectar con la base de datos.
            @ $basedatos = new mysqli('localhost', 'id3287809_admin', 'adming3', 'id3287809_g3blog'); 

            //Preparar consulta sql.
            $sql = ("SELECT * FROM entrada");

            //Realizar la consulta.
            $consulta = $basedatos -> query($sql);

            //Guardar el array en la variable.
            $entrada = $consulta->fetch_object();


            //Mientras seleccione datos.
            while($entrada != null){

              //Muestra por pantalla.
              echo "<option>$entrada->titulo</option>";

              //Vuelve a guardar el array en la variable.
              $entrada = $consulta->fetch_object();
            }
          ?>
        </select>

        <button id="mostrarE" name="mostrarE" class="btn btn-info">Mostrar</button>
      
      </div>
      <!-- FIN TÍTULO -->




      <!------------------------------------------ AL CLICAR EN BOTÓN MOSTRAR ---------------------------------------------------->


      <!-- CONSULTA PARA SACAR DATOS DE CADA ENTRADA -->
      <?php

        if(isset($_POST['mostrarE'])){

          //Meter la entrada seleccionada en una variable.
          $entradaModificar = $_POST['selectEntradas'];

          $sentencia="SELECT * FROM `entrada` WHERE titulo LIKE '".$entradaModificar."'";

          
          $resultado = $basedatos->query($sentencia);

          /* obtener el array asociativo */
          $obj = mysqli_fetch_object($resultado); 

          //Hacer que el ContenidoEntrada sea visible porque si no al recargar la página se cierra.
          echo "<script>  document.getElementById('ContenidoEntrada').style='display:block;';</script>";   

          /*Cambiar el color y el color de fondo*/
          echo "<script> document.getElementById('administrarE').style='background: #333333; color: white;';</script>";             
    
      ?> 




      <!------------------------------------------ DATOS DE LA ENTRADA ---------------------------------------------------->

      <!-- TÍTULO ENTRADA -->
      <div class="form-group">

        <label>Título: </label>
          <?php
          echo "<input type='text' name='titu' value='$entradaModificar'>";

          //Label trampa para poder modificar la entrada seleccionado en el desplegable.
          echo "<input type='text' name='lbltrampaE' id='lbltrampaE' value='$entradaModificar'/>";    

          ?>
        
      </div>
      <!-- FIN TÍTULO ENTRADA -->


      <!-------------------------------------------------------------------------------------------->


      <textarea id='texto' name='texto'>
        <?php 

          //Mostrar la entrada.
          echo "$obj->contenido";

          //Guardar la entrada en una variable.
          $textoEntrada = $obj->contenido;


        }  /*Aquí se cierra el if de mostrar para que los datos aparezcan solo al clicar en el botón*/
        ?>
      </textarea>
    

      <!------------------------------------------ BOTONES ---------------------------------------------------->

      <!-- BOTONES -->
      <div class="form-group" id="botonesEntrada">
        

        <!-- BOTÓN AÑADIR NUEVA ENTRADA -->
        <button name="nuevaE" class="btn btn-primary">Añadir nueva</button>


        <!-------------------------------------------------------------------------------------------->


        <!-- BOTÓN CANCELAR -->
        <button name="cancelarE" class="btn">Cancelar</button>


        <!-------------------------------------------------------------------------------------------->


        <!-- BOTÓN GUARDAR -->
        <button name="guardarE" id="guardarE" class="btn btn-success">Guardar</button>


        <!------------------------------------------ AL CLICAR EN BOTÓN GUARDAR ---------------------------------------------------->

        <!--Si se ha pulsado guardarE-->
        <?php
          if(isset($_POST['guardarE'])){

            $entradaCortada = substr($_POST['texto'],48,-18);


            //Preparar la consulta.
            $sentencia2= ("UPDATE entrada SET titulo = '".$_POST['titu']."', contenido = '".$entradaCortada."' WHERE titulo = '".$_POST['lbltrampaE']."'");

            //Realizar la consulta.
            $resultado2 = $basedatos->query($sentencia2);

            //Mensaje de confirmación.
            echo "<h4>¡Entrada actualizada correctamente!</h4>";


            //Hacer que el ContenidoEntrada sea visible porque si no al recargar la página se cierra.
            echo "<script>  document.getElementById('ContenidoEntrada').style='display:block;';</script>";


            /*Cambiar el color y el color de fondo*/
            echo "<script> document.getElementById('administrarE').style='background: #333333; color: white;';</script>";
          }
        ?>
        <!--Fin si se ha pulsado guardarE-->


      <!-------------------------------------------------------->


      <button id="eliminarE" name="eliminarE" class="btn btn-danger">Eliminar</button>
      
      <!--Si se ha pulsado eliminarC-->

        <?php

          if(isset($_POST['eliminarE'])){
            if($_POST['lbltrampaE']=="Dificultades"){
              echo "Esta entrada no se puede eliminar.";
            }
            else{
            //Preparar la consulta.          
            $sql = ("DELETE FROM entrada WHERE titulo = '".$_POST['lbltrampaE']."'");


            //Realizar la consulta.
            $consulta = $basedatos->query($sql);


            //Mensaje de confirmación.
            echo "<h4>¡Entrada eliminada correctamente!</h4>";


            //Hacer que el ContenidoEntrada sea visible porque si no al recargar la página se cierra.
            echo "<script>  document.getElementById('ContenidoEntradas').style='display:block;';</script>";
          

            /*Cambiar el color y el color de fondo*/
            echo "<script> document.getElementById('administrarE').style='background: #333333; color: white;';</script>";
          }
          }

        ?>

      <!--Fin si se ha pulsado eliminarC-->

      </div>
      <!-- FIN BOTONES -->

    </form>

  </article>
  <!-- FIN ARTICLE CONTENIDO ENTRADAS -->




<!-------------------------------------------------------------- ADMINISTRAR COMENTARIOS ---------------------------------------------------------->


  <!-- INICIO ARTICLE CONTENIDO COMENTARIOS -->
  <article id="ContenidoComentario" class="col-xs-12 col-sm-12 col-md-10 col-lg-10">

    <h1 class='page-header'>COMENTARIOS</h1>

    
    <!------------ TABLA QUE SE RELLENA CON LOS COMENTARIOS QUE HAY GUARDADOS EN LA BASE DE DATOS ------------>
    <form method="POST" action="administrar.php" id="formuComent" name="formuComent">
      
      <div class="table-responsive">
        <table class = "table table-striped" id="administrarTabla">
          <thead>
            <tr>
              <th>Usuario</th>
              <th>Entrada</th>
              <th>Fecha</th>
              <th>Contenido</th>
              <th>Eliminar</th>
              <th>Número</th>
            </tr>
          </thead>
          <tbody>

            <?php

              //Conectar con la base de datos.
              @ $basedatos = new mysqli('localhost', 'id3287809_admin', 'adming3', 'id3287809_g3blog'); 

              //Preparar consulta sql.
              $sql = ("SELECT * FROM comentario");

              //Realizar la consulta.
              $consulta = $basedatos -> query($sql);

              //Guardar el array en la variable.
              $comentario = $consulta->fetch_object();


              //Mientras seleccione datos.
              while($comentario != null){              
                  
                echo 
                "<tr id='seleccionTabla'>
                  <td>$comentario->usuario_comentario</td>
                  <td>$comentario->titulo_entrada</td>
                  <td>$comentario->fecha</td>
                  <td>$comentario->contenido</td>                
                  <td><input type='checkbox' id='eliminarChk' name='eliminarChk[]' value='$comentario->numero_comentario'></td>   
                  <td>$comentario->numero_comentario</td>
             
                </tr>";

                $numeroComentario = $comentario->numero_comentario;

                //Vuelve a guardar el array en la variable.
                $comentario = $consulta->fetch_object();
              }

            ?>

          </tbody>
        </table>
      </div>

      <!------------------------------------------ BOTONES ---------------------------------------------------->

      <!-- BOTONES -->
      <div class="form-group" id="botonesComentario">


        <button id="cancelarC" name="cancelarC"  class="btn">Cancelar</button>


        <!-------------------------------------------------------->


        <button id="eliminarC" name="eliminarC" class="btn btn-danger">Eliminar</button>
        
        <!--Si se ha pulsado eliminarC-->

          <?php

            if(isset($_POST['eliminarC'])){

              foreach ($_POST['eliminarChk'] as $numeroComentario){
                
                //Preparar la consulta.          
                $sql = ("DELETE FROM comentario WHERE numero_comentario = '".$numeroComentario."' ");

                //Realizar la consulta.
                $consulta = $basedatos->query($sql);

                //Mensaje de confirmación.
                echo "<h4>¡Comentario eliminado correctamente!</h4>";


                //Hacer que el ContenidoEntrada sea visible porque si no al recargar la página se cierra.
                echo "<script>  document.getElementById('ContenidoComentario').style='display:block;';</script>";

                /*Cambiar el color y el color de fondo*/
                echo "<script> document.getElementById('administrarC').style='background: #333333; color: white;';</script>";
              }

            }

          ?>

        <!--Fin si se ha pulsado eliminarC-->
      
      </div>

    </form>

  </article>
  <!-- FIN ARTICLE CONTENIDO COMENTARIOS -->


  <!-- Articulo con las imagenes que tenemos subidas -->
  <article id="imagenesart" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

    <button type="submit" id="cerrarimagenes">X</button>
   <?php
     $directorio="uploads/entrada_imagenes/";
     $objeto = dir($directorio);
     while (($archivo = $objeto->read()) !== false)
      {
        echo '<img id="imagenart" src="'.$directorio."/".$archivo.'">'."\n";
        echo "<p><b>Direccion:</b> $directorio$archivo</p>";
      }
      $objeto->close();
   ?>
   </article>
     <!-- FIN Articulo con las imagenes que tenemos subidas -->

</section>
<!-- FIN SECTION -->

<script>
  
    
// boton de cerrar imagenes en panel de admin
  document.getElementById('cerrarimagenes').addEventListener('click',function(){
    $('#imagenesart').css("display","none");
  });
</script>

<!-------------------------------------------------------------- FOOTER ---------------------------------------------------------->


<!-- INICIO FOOTER -->


    <footer id="footerpie">
        <div class="container">
            <div class="row">

                <div class="col-sm-3">
                    <img src="imagenes/logoTxurdinaga.png">
                </div>

                <div class="col-sm-2">
                    <h5>Comenzar</h5>
                    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="registro.php">Registrarse</a></li>
                    </ul>
                </div>


                <div class="col-sm-2">
                    <h5>Nosotros</h5>
                    <ul>
                        <li><a href="#">Acerca de G3Blog</a></li>
                        <li><a href="contacto.php">Contacto</a></li>
                    </ul>
                </div>


                <div class="col-sm-2">
                    <h5>+ Info</h5>
                    <ul>
                        <li><a href="#">Politica de Privacidad</a></li>
                        <li><a href="#">Politica de Cookies</a></li>
                    </ul>
                </div>

                <div class="col-sm-2">
                <img src="imagenes/logoG3Blog.png" alt="">
                </div>
            </div>
        </div>
            <p>© 2017 Copyright</p>
            <p>® G3Blog.</p>
    </footer>


<!-- FIN FOOTER -->

</body>
</html>




<!-------------------------------------------------------------- SCRIPTS ---------------------------------------------------------->

<script>


  /*----------------------------------------ACCIONES DE ADMINISTRACIÓN-------------------------------------------------------*/


  /*--------------------------------------ADMINISTRACIÓN DE USUARIOS----------------------------------------------------*/


  /*SCRIPT DE ADMINISTRAR USUARIOS*/
  document.getElementById('administrarU').addEventListener("click",function(boton){


    /*Si alguno de los dos artículos están visibles*/
    if((document.getElementById('ContenidoEntrada').style="display:block") || (document.getElementById('ContenidoComentario').style="display:block")){

      /*Ocultar los artículos*/
      document.getElementById('ContenidoEntrada').style="display:none;";      
      document.getElementById('ContenidoComentario').style="display:none;";


      /*Cambiar el color y el color de fondo*/
      document.getElementById('administrarE').style="background: white; color: #333333;";
      document.getElementById('administrarC').style="background: white; color: #333333;";


      /*Hacer que el artículo "contenidousuario" sea visible*/  
      document.getElementById('ContenidoUsuario').style="display:block;";

      /*Cambiar el color y el color de fondo*/
      document.getElementById('administrarU').style="background: #333333; color: white;";
    }

    else{
      /*Hacer que el artículo "contenidousuario" sea visible*/  
      document.getElementById('ContenidoUsuario').style="display:block;";

      /*Cambiar el color y el color de fondo*/
      document.getElementById('administrarU').style="background: #333333; color: white;";
    }

   });


  /*--------------------------------------ADMINISTRACIÓN DE ENTRADAS----------------------------------------------------*/


  /*SCRIPT DE ADMINISTRAR ENTRADAS*/
  document.getElementById('administrarE').addEventListener("click",function(){

    /*Si alguno de los dos artículos están visibles*/
    if((document.getElementById('ContenidoUsuario').style="display:block") || (document.getElementById('ContenidoComentario').style="display:block")){

      /*Ocultar los artículos*/
      document.getElementById('ContenidoUsuario').style="display:none;";      
      document.getElementById('ContenidoComentario').style="display:none;";

      /*Cambiar el color y el color de fondo*/
      document.getElementById('administrarU').style="background: white; color: #333333;";
      document.getElementById('administrarC').style="background: white; color: #333333;";


      /*Hacer que el artículo "contenidoentrada" sea visible*/  
      document.getElementById('ContenidoEntrada').style="display:block;";

      /*Cambiar el color y el color de fondo*/
      document.getElementById('administrarE').style="background: #333333; color: white;";
    }

    else{
      /*Hacer que el artículo "contenidoentrada" sea visible*/  
      document.getElementById('ContenidoEntrada').style="display:block;";
      }

      /*Cambiar el color y el color de fondo*/
      document.getElementById('administrarE').style="background: #333333; color: white;";

   });


  /*--------------------------------------ADMINISTRACIÓN DE COMENTARIOS----------------------------------------------------*/


  /*SCRIPT DE ADMINISTRAR COMENTARIOS*/
  document.getElementById('administrarC').addEventListener("click",function(){

    /*Si alguno de los dos artículos están visibles*/
    if((document.getElementById('ContenidoUsuario').style="display:block") || (document.getElementById('ContenidoEntrada').style="display:block")){

      /*Ocultar los artículos*/
      document.getElementById('ContenidoUsuario').style="display:none;";      
      document.getElementById('ContenidoEntrada').style="display:none;";


      /*Cambiar el color y el color de fondo*/
      document.getElementById('administrarU').style="background: white; color: #333333;";
      document.getElementById('administrarE').style="background: white; color: #333333;";


      /*Hacer que el artículo "contenidocomentario" sea visible*/  
      document.getElementById('ContenidoComentario').style="display:block;";

      /*Cambiar el color y el color de fondo*/
      document.getElementById('administrarC').style="background: #333333; color: white;";
    }

    else{
      /*Hacer que el artículo "contenidocomentario" sea visible*/  
      document.getElementById('ContenidoComentario').style="display:block;";
    }

      /*Cambiar el color y el color de fondo*/
      document.getElementById('administrarC').style="background: #333333; color: white;";
   });

</script>
