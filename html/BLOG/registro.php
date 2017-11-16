
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Registrarse</title>
    

    
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


  <!-- El link y el script son para los modals -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>




  <!-- FUNCIONES PERSONALIZADAS -->
  <script src="funciones_js/funciones.js" type="text/javascript" charset="utf-8" async defer></script>





  </head>
  <body id="bodyform">
      
<!---------------------------------------------------------------------------------------------------------->




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
      <a class="navbar-brand" href="index.php">G3Blog</a>
    </div>




    <div class="collapse navbar-collapse" id="myNavbar">
    	<!-- Le da un estilo a la lista para cuando haces focus,hover... -->
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php"><span class="fa fa-home"></span> Inicio</a></li>
        <li><a href="dificultades.php"> Dificultades</a></li>

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
        <li><a href="registro.php"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>
        <li id="iniciarsesion"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Iniciar sesion</a></li>        
        <li><a href="contacto.php"><span class="glyphicon glyphicon-envelope"></span> Contacto</a></li>
      </ul>

    </div>
  </div>
</nav>	
<!-- FIN NAVEGADOR -->
      
      


<!-- FORMULARIO DE INICIO DE SESION -->
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

<!-- FIN DE FORMULARIO DE INICIO DE SESION -->

























<!--FORMULARIO DE CONTACTO-->   
   <div  id="formureg" action="registro.php" class="form">
          <h1 id="hola">Formulario de registro</h1>
          <form name="form" action="registro.php" method="POST" enctype="multipart/form-data">
            <div class="field-wrap">
              <input id="regusuario" type="text" name="usuario" placeholder="Usuario 6 caracteres minimo*"/>
                        <p  id="p_usumal" style="color:red"></p>

            </div>
            <div class="field-wrap">

              <input id="emailregistro" type="email" name="email1" placeholder="Correo Electrónico*"/>
            </div>
            <div class="field-wrap">

              <input id="pass1" type="password" name="pass1" placeholder="Contraseña Numero, Mayus, Minus y 8 caracteres*"/>
            </div>
            <div class="field-wrap">

              <input id="pass2" type="password" name="pass2" placeholder="Repite Contraseña*"/>
            </div>

            <div class="field-wrap">
            <input type="file" name="foto"/>
            </div>
            
            <input id="botonregistrar" name="enviarregistro" type="submit" class="button button-block" id="Registrar" disabled/> 
            <button name="restablecer" type="reset" class="button button-block"/>Restablecer</button> 

          </form>
      </div>


<?php 
if (isset($_POST['enviarregistro'])) {

      if($_FILES['foto']['name']==""){
        $imagenPD="perfil.png";
        $temporal="uploads/user_imagenes/perfil.png";
      }
      else{
        $imagenPD=$_FILES['foto']['name'];
        $temporal=$_FILES['foto']['tmp_name'];
      }
      
      // conectamos con la BD
      @ $dwes = new mysqli('localhost', 'id3287809_admin', 'adming3', 'id3287809_g3blog'); 
      // realizamos la insert del usuario
      $insert=$dwes->query("INSERT INTO `usuario`(`nombre`, `correo`, `verificado`, `pass`, `imagen`) VALUES ('".$_POST['usuario']."','".$_POST['email1']."','1','".md5($_POST['pass1'])."','".$imagenPD."')");

      // si la insert falla(fallara en caso de introducir un usuario ya existente), se crea un script que modificara un parrafo oculto y pondra en rojo que este usuario ya existe.
     if(!$insert){
?>
    <script>
      document.getElementById('p_usumal').innerHTML="*Este usuario ya existe";
    </script>
    <?php
      }
      else{
      // crear directorio para ese usuario
      //  subir archivo "nombre temporal--donde se sube--nombre final"
      mkdir("uploads/user_imagenes/".$_POST['usuario']."", 0777);
      copy('uploads/user_imagenes/perfil.png','uploads/user_imagenes/'.$_POST['usuario'].'/perfil.png');
      move_uploaded_file($temporal,'uploads/user_imagenes/'.$_POST['usuario'].'/'.$imagenPD);

    ?>
      <script>
      $.confirm({
        title: "Usuario registrado",
        content: "Te has registrado con exito",
        theme: 'supervan',
            buttons: {
        Acepto: function () {

        },        
    }
 
      });
      </script>
    <?php
      }
    
} 
?>



<script>

  $(document).ready(function(){
  // Variables que controlan que cada campo del formulario sea correcto.
  var valida1=false;
  var valida2=false;
  var valida3=false;
  var valida4=false;


    // si el usuario cumple los requisitos se pone verde el borde, la variable valida se pone true y se llama a la funcion... mas abajo se explica lo que hace la funcion
    // y si no cumple los requisitos se pone el borde rojo, valida es falso y se llama de nuevo a la funcion y esta funcion se utiliza por cada campo.
    $("#regusuario").keyup(function(elemento){
        if($(this).val().length<=5){
          $(this).css("border-color","red");
          valida1=false; 
          validar(valida1,valida2,valida3,valida4);  
        }
        else{
          $(this).css("border-color","green");
          valida1=true;
          validar(valida1,valida2,valida3,valida4);
        }
    });
    // controla correo electronico que cumpla los requisitos de cualquier caracter+@+cualquier caracter+punto+cualquier caracter
    $("#emailregistro").keyup(function(elemento){
      var patron = /[a-z]*[0-9]*[.]*[_]*@[a-z]*[.][a-z]/i;
        if(!patron.test($(this).val())){
          $(this).css("border-color","red");
          valida2=false;   
          validar(valida1,valida2,valida3,valida4);
        }
        else{
          $(this).css("border-color","green");
          valida2=true;
          validar(valida1,valida2,valida3,valida4);

        }
    });

    // controlar contraseña Mayuscula,Minuscula y numero(min 8 caracteres)
    $("#pass1").keyup(function(elemento){
    var patron2 = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
        if(!patron2.test($(this).val())){
          $(this).css("border-color","red"); valida3=false;   
            validar(valida1,valida2,valida3,valida4);
        }
        else{
          $(this).css("border-color","green");
        valida3=true;
        validar(valida1,valida2,valida3,valida4);
        }
    });

    // controla que la contraseña sea igual que la anterior y que sea mayor de 7 caracteres porque sino se pondria de color verde si la anterior tiene menos de los caracteres deseados.
    $("#pass2").keyup(function(elemento){
        if($(this).val()==$("#pass1").val() && $(this).val().length>7){
          $(this).css("border-color","green");
          valida4=true;  
          validar(valida1,valida2,valida3,valida4); 
        }
        else{
          $(this).css("border-color","red");
          valida4=false;   
          validar(valida1,valida2,valida3,valida4);
        }
    });






});


// funcion que recibe 4 parametros(las 4 variables valida), comprueba que todas esten en "true", entonces quita el atributo disabled al boton registrar y le cambia el puntero
// si no le devuelve la propiedad disabled y el cursor "not-allowed"
function validar(v1,v2,v3,v4){
if (v1==true && v2==true && v3==true && v4==true) {
  $("#botonregistrar").removeAttr("disabled");
  $("#botonregistrar").css('cursor','pointer');
}
else{
   $('#botonregistrar').attr('disabled','disabled'); 
   $("#botonregistrar").css('cursor',' not-allowed');
}
}

</script>

      

<!-- INICIO FOOTER -->

<?php 
  require_once("footer.html");

 ?>


<!-- FIN FOOTER -->
      
  </body>
</html>
