$(document).ready(function() {

  $("#updateImageProfile").on('submit', function(e) {
    e.preventDefault();
  });
});


    function limpiar(){
      var canvas = document.getElementById("previewcanvas");
      canvas.width=canvas.width;
      $("#previewcanvascontainer").css('display', 'none');
      document.getElementById("updateImageProfile").reset();
    }
    function limpiar2(){
      var canvas = document.getElementById("previewcanvas");
      canvas.width=canvas.width;
    }

      function ShowImagePreview( files )
    {

    if( !( window.File && window.FileReader && window.FileList && window.Blob ) )
    {
      alert('Por favor Ingrese un archivo de Imagen');
      document.getElementById("myForm").reset();
      return false;
    }

    if( typeof FileReader === "undefined" )
    {
        alert( "El archivo no es una imagen por favor ingrese una" );
        document.getElementById("myForm").reset();
        return false;
    }

    var file = files[0];

    if( !( /image/i ).test( file.type ) )
    {
        alert( "El archivo no es una imagen" );
          document.getElementById("myForm").reset();
        return false;
    }

    reader = new FileReader();
    reader.onload = function(event)
            { var img = new Image;
              img.onload = UpdatePreviewCanvas;
              img.src = event.target.result;  }
    reader.readAsDataURL( file );
  }
  //cargar el preview de la imagen de la encuesta
  function UpdatePreviewCanvas()
  {
    $("#previewcanvascontainer").css('display', 'inline');
    var img = this;
    var canvas = document.getElementById( 'previewcanvas' );

    if( typeof canvas === "undefined"
        || typeof canvas.getContext === "undefined" )
        return;

    var context = canvas.getContext( '2d' );

    var world = new Object();
    world.width = canvas.offsetWidth;
    world.height = canvas.offsetHeight;

    canvas.width = world.width;
    canvas.height = world.height;

    if( typeof img === "undefined" )
        return;

    var WidthDif = img.width - world.width;
    var HeightDif = img.height - world.height;

    var Scale = 0.0;
    if( WidthDif > HeightDif )
    {
        Scale = world.width / img.width;
    }
    else
    {
        Scale = world.height / img.height;
    }
    if( Scale > 1 )
        Scale = 1;

    var UseWidth = Math.floor( img.width * Scale );
    var UseHeight = Math.floor( img.height * Scale );

    var x = Math.floor( ( world.width - UseWidth ) / 2);
    var y = Math.floor( ( world.height - UseHeight ) / 2 );

    context.drawImage( img, x, y, 200, 200 );
}
