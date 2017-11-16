
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


  </head>



<body>


<?php   

    //Conexion a la Base de Datos
    $dwes = new mysqli('localhost', 'id3287809_admin', 'adming3', 'id3287809_g3blog'); 
    $error = $dwes->connect_errno;  



  //INICIO DE SESIÓN.
    session_name("usuariologueado");
    session_start();

    if (isset($_POST['tituloentr'])) {

    	$_SESSION['entradaactual']=$_POST['tituloentr'];
    }




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
<!-- INICIO FORMULARIO -->
<form id="formulogin" name="formulogin" action="funciones_php/funcionesphp.php" method="POST">

  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="usuario" type="text" class="form-control" name="usuario" placeholder="usuario">
  </div>

  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="contrasena" type="password" class="form-control" name="contrasena" placeholder="contraseña">
  </div>

  <div class="input-group">
    <input id="enviar" type="submit" class="btn btn-primary" name="enviar" value="Iniciar sesión">
    <input type="reset" id="cerrar" class="btn btn-basic" name="cerrar" value="Cerrar">
  </div>

</form>
<!-- FIN FORMULARIO -->



<!---------------------------------------------------------------------------------------------------------->

<!-- INICIO REDES SOCIALES -->

  <!-- Botones de la clase info y tamaño xs -->
  <button id="btnmostrar" class="btn btn-info btn-xs">>></button>
  <button id="btnocultar" class="btn btn-info btn-xs">X</button>

  <!-- Imagenes de las redes sociales -->
  <aside class="redes_sociales">
    <li><a href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
    <li><a href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
    <li><a href="https://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
  </aside>

  <!-- FIN REDES SOCIALES -->


<!---------------------------------------------------------------------------------------------------------->





 <?php 

  // Se recogera el titulo (la cual es PK) desde el formulario que se ejecuta al clicar en las li del nav
  $titentr = ($_SESSION['entradaactual']);
  if ($error == null) { 
      // Se hara una SELECT usando  el titulo de la entrada
      $sentencia="SELECT * FROM `entrada` WHERE titulo LIKE '".$titentr."';";
      //Ejecutamos la query
      $resultado = $dwes->query($sentencia) ;
      //Si la ejecucion no ha dado errores... 
      if ($resultado = mysqli_query($dwes , $sentencia)) {
        //Se crea un objeto al que se le da el resultado de la SELECT
        $obj = mysqli_fetch_object($resultado);
       } 
    }
?>

<!-- INICIO ENTRADA -->
<div class="container-fluid" id="contenidoEntrada">
  <article class="artentrada1 row">
<div id="diventrada" class="col-xs-12 col-sm-12 col-md-offset-2 col-md-8 col-lg-offset-2 col-lg-8">
  <?php
//Se imprime el campo "contenido" de la BD. Dicho campo esta formateado a HTML
  echo "<h1>$obj->titulo</h1>";
  echo"<hr>";
echo($obj->contenido);
?>
</div>

</article>
</div>

<!-- FIN ENTRADA  -->


<hr>

<!-- INICIO COMENTARIOS -->
  <section>
    
    <h2>¡Deja tu comentario!</h2> 


      <?php 

      if (isset($_SESSION['usuario'])) {
        $sentencia="SELECT * FROM  `usuario` WHERE nombre LIKE '".$_SESSION['usuario']."'";
      $resultado = $dwes->query($sentencia);
      $obj = mysqli_fetch_object($resultado);  		
      $imagen = "uploads/user_imagenes/".$_SESSION['usuario']."/".$obj->imagen;
      }
      else{
      $imagen = "uploads/user_imagenes/perfil.png";
      }
       ?>

  <article class="artentrada">
    <div class="nuevocoment">
    <form action="entrada.php" method="post">

      <img class="imgnucoment"  src=<?php echo "'$imagen'";?>>

      <!-- En este textarea es donde ira el comentario -->
      <textarea class="areacoment" id="areacoment" placeholder="  Comparte tu opinión!!!" name="contenido"  maxlength="200"></textarea> <br>

      <!-- Estte hidden esta hecho para que una vez comentes, te redireccione a la misma entrada -->
      <input type="hidden" name="tituloentr" value= <?php echo "'$titentr'"; ?>>
      <input class="envcoment" type="submit" name="enviarcoment" value="Comentar" id="botonenv">
    </form>
  </div>
  </article>



  <?php 
    //Si se le ha dado al boton "Comentar"...
    if (isset($_POST['enviarcoment'])){
      //Si se ha escrito algo ...  
      if (!(empty($_POST['contenido']))) {
        $sentencia="INSERT INTO `comentario` (titulo_entrada, contenido, usuario_comentario) VALUES ('".$titentr."', '".$_POST['contenido']."', '".$_SESSION['usuario']."') ";
        $resultado = $dwes->query($sentencia) ;
      }
    }

   ?>

<hr>

  <h2>Comentarios de otro usuarios</h2> 

  <?php  
    if ($error == null) { 
      //Se hace una SELECT de la tabla 'comentario', para el comentario en si y quien lo ha comentado. Tambien se hace de la tabla 'usuario' para obtener su imagen de perfil
      $sentencia="SELECT * FROM `comentario`,`usuario` WHERE `usuario_comentario` LIKE `nombre` AND titulo_entrada LIKE '".$titentr."';";
        
      //Se ejecuta la query 
      $resultado = $dwes->query($sentencia) ;

      //Si se ejecuta correctamente...
      if ($resultado = mysqli_query($dwes , $sentencia)) {

        //Por cada comentario en esa entrada...
        while ($obj = mysqli_fetch_object($resultado)) {
          //Se imprime por pantalla un DIV por cada comentario
        $imagen = "uploads/user_imagenes/".$obj->usuario_comentario."/".$obj->imagen;

          echo('<div class="divcoment"> 
          <img class="imgcoment"  src="'.$imagen.'">
          <p> <span class="nomusuario">'.$obj->usuario_comentario.'</span> <span class="fechacom">'.$obj->fecha.'</span></p>
          <p class="contcoment">'.$obj->contenido.'</p>
          </div>' );
        }
      } 
     }
  ?>
  </section>

<!-- FIN COMENTARIOS  -->

<?php 

require_once('footer.html');
 ?>

</body>
</html>