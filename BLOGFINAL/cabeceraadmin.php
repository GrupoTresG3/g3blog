
<!-- INICIO NAVEGADOR -->

<!-- 
	navbar-default lo pone en blanco
	navbar-inverse lo pone en negro

 -->
<nav class="navbar navbar-default">
  <div class="container-fluid">

  <!-- Indica que todo lo que este aqui dentro flotara a la izquierda -->
    <div class="navbar-header">

    <!-- Al pulsar este boton la barra de navegacion se abrira 
	"navbar-toogle" aplica unos colores y dependiendo si la barra de navegacion es default o inverse. tambien aplica float:right, padding...

	data-toogle = "collapse" oculta los elementos


	data-target recibe un id de los elementos que queremos ocultar
    -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">

      <!-- ".icon-bar" Es una clase que crea una barra con un ancho, alto y color de fondo-->
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <!-- Aplica un estilo en funcion del tipo de nav -->
      <a class="navbar-brand" href="logueado.php">G3Blog</a>
    </div>




    <div class="collapse navbar-collapse" id="myNavbar">
    	<!-- Le da un estilo a la lista para cuando haces focus,hover... -->
      <ul class="nav navbar-nav">
        <li class="active"><a href="logueado.php"><span class="fa fa-home"></span> Inicio</a></li>
        <li><a id="enlacenav" href="#"> Dificultades</a></li>

        <?php 
        // Esto rellena las entradas
        @ $dwes = new mysqli('localhost', 'id3287809_admin', 'adming3', 'id3287809_g3blog'); 

        $sentencia="SELECT * FROM `entrada`";
        $resultado = $dwes->query($sentencia) ;
        if ($resultado = mysqli_query($dwes , $sentencia)) {

        ?> 

        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Entradas
        <span class="caret"></span></a>
        <ul id="listaul" class="dropdown-menu">
        <?php         
         while ($obj = mysqli_fetch_object($resultado)) {
          echo '<li><a href="#">'.$obj->titulo.'</a></li>';
        } 
        } 
        ?>
        </ul>
        </li>
        </ul>
      <!-- FORMULARIO TRAMPA -->
      <form action="entrada.php" method="post" id="formentr">
        <input type="hidden" name="tituloentr" id="inpuhid">
      </form>
	
		<!-- Los span contienen los iconos -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="contacto.php"><span class="glyphicon glyphicon-envelope"></span> Contacto</a></li>
        <li><a id="cambiausuario" href="administrar.php" >Panel <?php echo $_SESSION['usuario']; ?></a></li>
        <li>
        <form method="POST" action="funciones_php/funcionesphp.php">
        <button id="cerrarsesion" name="cerrarsesion"><span class="glyphicon glyphicon-remove"></span> Cerrar sesión
        </button>
        </form>
        </li>
      </ul>

    </div>
  </div>
</nav>	


      <!-- FORMULARIO TRAMPA -->
      <form action="entrada.php" method="post" id="formentr" style="display:none;">
        <input type="hidden" name="tituloentr" id="inpuhid">
      </form>
<!-- FIN NAVEGADOR -->