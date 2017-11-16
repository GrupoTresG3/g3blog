<?php 

/* CONTROLANDO EL LOGIN */
if (isset($_POST['enviar'])){
  @ $dwes = new mysqli('localhost', 'id3287809_admin', 'adming3', 'id3287809_g3blog'); 

  	// guardamos el usuario y la contraseña la encriptamos
    $usuariologin = $_POST['usuario'];
    $contrasena = md5($_POST['contrasena']);

    // hacemos la select
    $consulta=$dwes->query("SELECT * FROM usuario WHERE nombre LIKE '".$usuariologin."' AND pass LIKE '".$contrasena."'");

    // Guardamos los campos en las variables
    if($usuario=$consulta->fetch_object()){
	     while ($usuario != null) { 
  		   $contraseñabdMD5=($usuario->pass);
  		   $nombre=($usuario->nombre);
  		   $usuario = $consulta->fetch_object(); 
	     }
    // Comparamos que coincidan, creamos la sesion y accedemos a la pagina de logueado
    if($contraseñabdMD5==$contrasena AND $nombre==$usuariologin){
        session_name("usuariologueado");
        session_start();
        $_SESSION['usuario']=$usuariologin;
        header('Location:../logueado.php');
      }
    }

    else{
    // mensaje de que no funciona, redireccion a index.php
    echo "<script>alert('¡Introduce un login correcto!');</script>";
    header('Location:../index.php');

    }
    $dwes->close(); 
}

/* FIN DEL LOGIN */



/* INICIO CERRAR SESION */

// si se pulsa cerrar sesion
if (isset($_POST['cerrarsesion'])) {
  session_name('usuariologueado');
  session_start();
session_destroy();
header('Location:../index.php');
}     



/* FIN CERRAR SESION */












 ?>