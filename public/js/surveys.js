
//limpieza de los formularios
    function limpiar(){
    var canvas = document.getElementById("previewcanvas");
    canvas.width=canvas.width;
    document.getElementById("myForm").reset();
                      }

    function limpiar3(){
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
  	$('#panel').load('#panel');
swal({ 
title: "¿Seguro que deseas continuar?",
text: "No podrás deshacer este paso.",
type: "warning",
showCancelButton: true,
cancelButtonText: "Cancelar",
confirmButtonColor: "#DD6B55",
confirmButtonText: "Eliminar",
closeOnConfirm: false },
function(){ 
 $.ajax({
  url: "/administrator/delete/",
  type: 'GET',
  datatype: "json",
  data:{
        id:id,
        idAdmin: idAdmin
  },success: function( sms ) {
    swal({
       title: "Eliminado correctamente",
       type: "success",
        });
     $("#"+id).css("display", "none");
      },error: function(result) {
        swal({
           title: "Error",
           text: "Ha ocurrido un error",
           type: "warning",
            });

            }
  });               

});
            
}

//oculta la pantalla de carga principal cuando la pagina este cargada
      window.onload = detectarCarga;
      function detectarCarga(){
        document.getElementById("loader").style.display="none";
                             }


//modal para publicacion de plantilla
  function openModal(id) {
        $("#idModal").val(id);
        $('#miModal').modal('show');
      }

//envia los datos para publicar la plantilla
function enviar()
{
  var id = $("#idModal").val();
  var fechai = $("#inicio").val();
  var fechat = $("#termino").val();
  var instrucciones = $("#instrucciones").val();
  var destinatarios = $("#destinatario").val();
  var tipo = $("#tipo").val();

  $.ajax({
  url: "/administrator/publicar/encuesta",
  type: 'POST',
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  datatype: "json",
  data:{
        id:id,
        fechai:fechai,
        fechat:fechat,
        instrucciones:instrucciones,
        destinatarios: destinatarios
  },success: function( sms ) {
    swal({
       title: "Su encuesta ha sido publicada",
       text: ""+sms,
       type: "success",
        });
      document.getElementById("form").reset();
      },error: function(result) {
        swal({
           title: "Error",
           text: "Ingrese valor valido ",
           type: "warning",
            });
            }
  });

}


