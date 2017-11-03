

  /* ABRIR LA GALERIA DE IMAGENES */
  function abrirGaleria() {
    document.getElementById('miGaleria').style.display = "block";
    document.getElementById("flechaarriba").style.visibility="hidden";
  }
  /* FIN ABRIR LA GALERIA DE IMAGENES */


  /* CERRAR LA GALERIA DE IMAGENES */
  function cerrarGaleria() {
    document.getElementById('miGaleria').style.display = "none";
    document.getElementById("flechaarriba").style.visibility="visible";

  }
  /* FIN CERRAR LA GALERIA DE IMAGENES */


  /* INDEX DE LAS IMÁGENES */
  var indexImagenes = 1;

  /* MOSTRAR EL INDEX DE LAS IMÁGENES */
  mostrarImagenes(indexImagenes);


  /* PARA QUE PASE A LA SIGUIENTE IMÁGEN */
  function pasarImagenes(n) {
    mostrarImagenes(indexImagenes += n);
  }
  /* FIN PARA QUE PASE A LA SIGUIENTE IMÁGEN */


  /* PARA QUE TE MUESTRE LA IMÁGEN CLICADA */ 
  function imagenClicada(n) {
    mostrarImagenes(indexImagenes = n);
  }
  /* FIN PARA QUE TE MUESTRE LA IMÁGEN CLICADA */


  /* MOSTRAR IMÁGENES */
  function mostrarImagenes(n) {
    var i;
    var imagenes = document.getElementsByClassName("misImagenes");

    if (n > imagenes.length){
      indexImagenes = 1;
    }

    if (n < 1){
      indexImagenes = imagenes.length;
    }

    for (i = 0; i < imagenes.length; i++) {
      imagenes[i].style.display = "none";
    }

    imagenes[indexImagenes-1].style.display = "block";
  }
  /* FIN MOSTRAR IMÁGENES */





// tooltip iconos de redes sociales y
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
