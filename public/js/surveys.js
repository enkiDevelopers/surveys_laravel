
//limpieza de los formularios
function limpiar()
{
  var canvas = document.getElementById("previewcanvas");
  canvas.width=canvas.width;
document.getElementById("myForm").reset();
}

function limpiar3()
{
  document.getElementById("form").reset();
}

function limpiar2()
{
  var canvas = document.getElementById("previewcanvas");
  canvas.width=canvas.width;
}



//pintar opcion del sidebar
    window.onload = function() {
        $("#home").addClass('active');
    }

//redigirige a editar 
    function editar(){
        window.location = "{{ url('/administrator/edit') }}";
    }

 
  

//verificaciones de la carga de una imagen en la creacion de la plantilla
    function ShowImagePreview( files )
    {

    if( !( window.File && window.FileReader && window.FileList && window.Blob ) )
    {
      alert('Por favor Ingrese un archivo de Imagen');
      return false;
    }

    if( typeof FileReader === "undefined" )
    {
        alert( "El archivo no es una imagen por favor ingrese una" );
        return false;
    }

    var file = files[0];

    if( !( /image/i ).test( file.type ) )
    {
        alert( "El archivo no es una imagen" );
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

//alerta para eliminar
function alerta(id,idAdmin) {

alertify.defaults.glossary.title = 'Eliminar';

  alertify.confirm("¿Seguro que desea eliminar la plantilla? ",
  function(){
   location.replace("/administrator/delete/"+id+"/"+idAdmin);
   $('#procesando').show();
  },
  function(){
    alertify.error('Cancel');
  });

}
//oculta la pantalla de carga principal cuando la pagina este cargada
window.onload = detectarCarga;
function detectarCarga(){
document.getElementById("loader").style.display="none";
}


