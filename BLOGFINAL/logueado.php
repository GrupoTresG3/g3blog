<?php
// Iniciamos la sesion 
session_name("usuariologueado");
session_start();

// si no existe la variable de sesion redirecciona a index
if(!isset($_SESSION['usuario'])){
header('Location:index.php');
}
?>
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



	<!-- Para que se adapte correctamente a moviles y puedas hacer zoom -->
	<meta name="viewport" content="width=device-width, initial-scale=1">




	<!-- FUNCIONES PERSONALIZADAS -->
	<script src="funciones_js/funciones.js" type="text/javascript" charset="utf-8" async defer></script>


  </head>


<!-- El contenido hay que meterlo en un contenedor para que funcione bien el chiken-wrap xD que hace con los elementos  puede ser ".container"(fijo) o ".container-fluid"(todo el width)-->
<body>


<!---------------------------------------------------------------------------------------------------------->


<?php
// si el usuario es admin carga su cabecera sino carga la del usuario logueado 
if ($_SESSION['usuario']=='admin'){
require_once('cabeceraadmin.php');
}
else{
require_once('cabecerausuario.php');
}
 ?>







<!---------------------------------------------------------------------------------------------------------->



<!-- INICIO DEL CARRUSEL -->
<section id="carrusel_section">

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


	<article id="carrusel" class="carousel slide" data-ride="carousel">
		<!-- Indica que elemento tiene que cojer de los seleccionados abajo-->
		<ol class="carousel-indicators">
	    	<li data-target="#carrusel" data-slide-to="0" class="active"></li>
	    	<li data-target="#carrusel" data-slide-to="1"></li>
	    	<li data-target="#carrusel" data-slide-to="2"></li>
	  </ol>

	  <!-- Elementos a cojer -->
	  <div class="carousel-inner">
	    <div id="enlacecarruseld" class="item active">
        <a href="#">
	      	<div class="carousel-caption">
	          <h3>Dificultades</h3>
	        	<p>Aqui os mostramos las dificultades que hemos encontrado a lo largo del reto.</p>
	      	</div>
        </a>
	    </div>

	    <div id="enlacecarruselv" class="item">
	      <a href="#">
	      <div class="carousel-caption">
	      	<h1>Última entrada</h1>
	      	<?php 
	      		@ $basedatos = new mysqli('localhost', 'id3287809_admin', 'adming3', 'id3287809_g3blog'); 
	      		$select=$basedatos->query("SELECT * FROM entrada ORDER BY fecha_entrada DESC");
          		//Guardar el array en la variable.
          		$entrada = $select->fetch_object();
          		$fecha=date_create($entrada->fecha_entrada);
	      		echo "<h3 id='tevisitada'>$entrada->titulo</h3>";
	      		echo "<p>Creada el " . date_format($fecha,"d") . " del " . date_format($fecha,"m") . " del " . date_format($fecha,"Y")." a las ".date_format($fecha,"H:m:s")."</p>";

	      	 ?>
	        
	      </div>
	  	  </a>
	    </div>

	    <div id="enlacecarruselc" class="item">

	    <a href="#">

	      <div class="carousel-caption">
	      	<h1>Más comentada</h1>
	      	<?php 
	      		$select2=$basedatos->query("SELECT COUNT(*) entradas, titulo_entrada FROM comentario WHERE titulo_entrada=(SELECT titulo FROM entrada WHERE `comentario`.`titulo_entrada`=`entrada`.`titulo`) GROUP BY titulo_entrada ORDER BY entradas DESC");

            //Guardar el array en la variable.
            $comentario = $select2->fetch_object();
            echo "<h3 id='tecomentada'>$comentario->titulo_entrada</h3>";
            echo "<p>¡$comentario->entradas comentarios!</p>";
	      	 ?>
	    
	       
	      </div>
	  	  </a>
	    </div>
	  </div>

	  <!-- Flechas de izquierda y derecha -->
	  <a class="left carousel-control" href="#carrusel" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left"></span>
	  </a>
	  <a class="right carousel-control" href="#carrusel" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right"></span>
	  </a>
	</article>

</section>
<!-- FIN DEL CARRUSEL  -->

<section id="sectioncomentarios" class="row container-fluid">
<h1>Comentarios de los usuarios:</h1>
		<?php 
	    $select3=$basedatos->query("SELECT * FROM `comentario` ORDER BY RAND()");
		$comentarios = $select3->fetch_object();
		$contador=0;
		

		while ($contador<6) {
		echo "<div class='col-md-3 col-lg-3' id='divgirar'>";
		echo "<h3>$comentarios->usuario_comentario</h3><p>$comentarios->contenido</p>";
		echo "</div>";
        $comentarios = $select3->fetch_object();
		$contador++;
		echo "</div>";
		}
		
		$basedatos->close();

 	?>

</section>





<!---------------------------------------------------------------------------------------------------------->



<!-- INICIO FOOTER -->

<?php 
  require_once("footer.html");

 ?>



<!-- FIN FOOTER -->

</body>
</html>


