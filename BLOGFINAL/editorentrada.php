
<?php 
 //INICIO DE SESIÓN.
    session_name("usuariologueado");
    session_start();
    if ($_SESSION['usuario']!='admin') {
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

  
  <!-- El link y el script son para los modals -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>


    <!-- FUNCIONES PERSONALIZADAS -->
    <script src="funciones_js/funciones.js" type="text/javascript"></script>



  <script src="js/tinymce.min.js"></script>
  <script>tinymce.init({
  mode : "specific_textareas",
  editor_selector : "mceEditor",
  selector: 'textarea',
  height: 550,
  theme: 'modern',
  mobile: {
    theme: 'beta-mobile',
    plugins: [ 'autosave' ]
  },
  // powerpaste  advcode tinymcespellchecker a11ychecker linkchecker mediaembed
  plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount  imagetools  contextmenu colorpicker textpattern help',
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



  <!-- Para que se adapte correctamente a moviles y puedas hacer zoom -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<?php require_once('cabeceraadmin.php'); ?>



<article>
<form id="formusubir" method="post" enctype="multipart/form-data">
         <h3>Subir imágenes</h3><input type="file" name="foto" />
          <button type="submit" class="btn btn-primary" name="subir" >Subir archivo</button>
          <button  id="imagenessubidas" type="submit" class="btn btn-primary" name="imagenes" >Mis imágenes</button>
</form>
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
</article>

<section class="row">
  <form class="col-md-9 col-lg-9" action="editorentrada.php" method="post" name="form_post">
  <input type="text" name="titulo" placeholder="Titulo Entrada">
  <section> 
    <textarea id="texto" name="texto">
      <h1>Escribe tu entrada</h1>
    </textarea>
  </section>
  <input type="submit" name="creaentrada" id="misubm" value="Agregar Entrada">

  <input type="hidden" name="section">

</form>





<article id="imagenesart" class="col-md-2 col-lg-2">
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

<script>
  // boton de cerrar imagenes en panel de admin
  document.getElementById('cerrarimagenes').addEventListener('click',function(){
    $('#imagenesart').css("display","none");
  });
       // funcion que controla el boton de ver imagenes
      document.getElementById('imagenessubidas').addEventListener("click",function(formu){
      formu.preventDefault();
      $('#imagenesart').css("display","block");
      });
</script>
</section>







<?php 

if(isset($_POST['creaentrada'])){
  @ $basedatos = new mysqli('localhost', 'id3287809_admin', 'adming3', 'id3287809_g3blog'); 

 $entradaCortada = substr($_POST['texto'],48,-18);

  $insert=$basedatos->query("INSERT INTO entrada (titulo,contenido) VALUES('".$_POST['titulo']."','".$entradaCortada."')");
  $basedatos->close();

}
 ?>
<!-- FIN COMENTARIOS  -->

<!-- INICIO FOOTER -->
<?php require_once('footer.html'); ?>

<!-- FIN FOOTER -->

</body>
</html>