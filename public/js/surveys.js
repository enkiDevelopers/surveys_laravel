
//limpieza de los formularios
    function limpiar(){
  $('#imgSalida').attr("src","/img/iconos/default.png");
      document.getElementById("myForm").reset();
                      }
          function limpiar2()
                    {
                      $('#imgSalida').attr("src","/img/iconos/default.png");
                      }

    function limpiar3(){
    document.getElementById("form").reset();
    CKEDITOR.instances.instrucciones.setData('');
                        }

    function limpiar4(){
    document.getElementById("duForm").reset();
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

swal({
title: "¿Seguro que deseas continuar?",
text: "No podrás deshacer este paso.",
type: "warning",
showCancelButton: true,
cancelButtonText: "Cancelar",
confirmButtonColor: "#DD6B55",
confirmButtonText: "Eliminar",
closeOnConfirm: true },
function(){
  $("#procesando").show();
 $.ajax({
  url: "/administrator/delete/",
  type: 'GET',
  datatype: "json",
  data:{
        id:id,
        idAdmin: idAdmin
  },beforeSend: function(){
    $("#procesando").show();
  }
  ,success: function( sms ) {
    showcards();
    swal({
       title: "Eliminado correctamente",
       type: "success",
        });
  $("#"+id).css("display", "none");
  $("#procesando").hide();
      },error: function(result) {
        swal({
           title: "Error",
           text: "Ha ocurrido un error",
           type: "warning",
            });
            $("#procesando").hide();
            }
  });

});

}

//oculta la pantalla de carga principal cuando la pagina este cargada
    /*  window.onload = detectarCarga;
      function detectarCarga(){
        document.getElementById("loader").style.display="none";
      }*/


//modal para publicacion de plantilla
  function openModal(id) {
        $("#idModal").val(id);
        var today = moment().format('YYYY-MM-DD hh:mm:ss');
        $("#inicio").val(today);
        $('#miModal').modal('show');
      }

//envia los datos para publicar la plantilla
function enviar()
{
  var id = $("#idModal").val();
  var asunto=$("#asunto").val();
  var fechai = $("#inicio").val();
  var fechat = $("#termino").val();
//  var instrucciones = $("#instrucciones").val();
var instrucciones = CKEDITOR.instances['instrucciones'].getData();
  var destinatarios = $("#destinatarios").val();
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
        destinatarios: destinatarios,
        asunto:asunto,
        tipo:tipo
  },
  beforeSend: function(){
    $("#procesando").show();
  },
  success: function( sms ) {
    swal({
       title: "Su encuesta ha sido publicada",
       text: "",
       type: "success",
        });
      document.getElementById("form").reset();
      CKEDITOR.instances.instrucciones.setData('');
      $('#miModal').modal('hide');
      busca();
      showcards();
      },error: function(result) {
        $("#procesando").hide();
        swal({
           title: "Error",
           text: "",
           type: "warning",
            });
            }
  });

}
//detiene el envio del formulario para no recargar la pagina
function detener()
{
event.preventDefault();
enviar();
}
/*
function detener3()
{
event.preventDefault();
enviar2();
}*/

//consulta para mostrar las encuestas publicdas
function busca(){
         var xmlhttp;
         if (window.XMLHttpRequest){
             // code for IE7+, Firefox, Chrome, Opera, Safari
             xmlhttp=new XMLHttpRequest();
         }else{
             // code for IE6, IE5
             xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
         }
         xmlhttp.onreadystatechange=function(){
             if(xmlhttp.status==404){
                  document.getElementById("recibiendo").innerHTML="Page not found";
             }
             if (xmlhttp.readyState==4 && xmlhttp.status==200){
                 document.getElementById("recibiendo").innerHTML=xmlhttp.responseText;
              }
         }
         xmlhttp.open("GET","/administrator/consultar/publicaciones/",true);
         xmlhttp.send();
     }
//modal para DUPLICAR
function DuModal(id,creador)
{
  $("#idDup").val(id);
  $("#idCreador").val(creador);
  $('#duModal').modal('show');
}

//duplicar
function duplicar()
{
  var id = $("#idDup").val();
  var creador = $("#idCreador").val();
  var nNombre = $("#nNombre").val();
  $.ajax({
  url: "/administrator/duplicar/plantilla",
  type: 'POST',
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  datatype: "json",
  data:{
        nNombre:nNombre,
        id:id,
        nNombre:nNombre,
        creador:creador
  },
  beforeSend: function(){
    $("#procesando").show();
  },
  success: function( sms ) {

    swal({
       title: "Su plantilla ha sido duplicada",
       text: sms["sms"],
       type: "success",
        });
          showcards();
      document.getElementById("duForm").reset();
      $('#duModal').modal('hide');

      },error: function(result) {
        $("#procesando").hide();
        swal({
           title: "Error",
           text: "",
           type: "warning",
            });
            showcards();
            }
  });

}

//no recargar la pagina al duplicar
function detener2()
{
event.preventDefault();
duplicar();
}

function showcards(){
         var xmlhttp;
         if (window.XMLHttpRequest){
             // code for IE7+, Firefox, Chrome, Opera, Safari
             xmlhttp=new XMLHttpRequest();
         }else{
             // code for IE6, IE5
             xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
         }
         xmlhttp.onreadystatechange=function(){
             if(xmlhttp.status==404){
                  document.getElementById("actualizar").innerHTML="Page not found";
             }
             if (xmlhttp.readyState==4 && xmlhttp.status==200){
                 document.getElementById("actualizar").innerHTML=xmlhttp.responseText;
                  setTimeout(function(){
                  //  document.getElementById("loader").style.display="none";
                    $("#loader").fadeOut(300);
                 }, 500);
                  $("#procesando").hide();

             }
         }
         var x = document.getElementById("idadmin").value;
         xmlhttp.open("get","/administrator/showcards/?value="+x,true);
         xmlhttp.send();
     }

function reminder(id)
{
  $.ajax({
  url: "/administrator/surveys/reminder",
  type: 'POST',
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  data: {idPub:id},
  datatype: "json",
  beforeSend: function(){
    $("#procesando").show();
  },
  success: function( sms ) {
    $("#ir").attr('href',"/administrator/previewtem/"+id);
    $("#procesando").hide();
$("#recorRec").html(sms);
$('#recordatorio').modal('show');

          },error: function(result) {
        $("#procesando").hide();

        swal({
           title: "Error",
           text: "",
           type: "warning",
            });
            }
  });

}



function send()
{
var id = $("#idPub").val();
  $.ajax({
  url: "/administrator/reminderSend",
  type: 'POST',
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  data: {idPub:id},
  datatype: "json",
  beforeSend: function(){
    $("#procesando").show();
  },
  success: function( sms ) {
    $("#procesando").hide();
$("#recorRec").html(sms);
$('#recordatorio').modal('show');
swal({
   title: "Su recordatorio ha sido enviado",
   text: "",
   type: "success",
    });

          },error: function(result) {
        $("#procesando").hide();

        swal({
           title: "Error",
           text: "",
           type: "warning",
            });
            }
  });

}



function ocultar()
{
//$("#pBody").toggle();
$('#pBody').slideToggle("slow");
}

function ocultar2()
{
//$("#pBody").toggle();
$('#pPBody').slideToggle("slow");
}

function infoF()
{
  swal("Comparte en Facebook:","www.uvmmejoraporti.mx/surveyeds/login/facebook");

}

function infoT()
{
swal("Comparte en twitter:","www.uvmmejoraporti.mx/surveyeds/login/twitter");
}

function principal()
{
location.href ="/";
}

window.onresize = cambiar_tamaño();

function cambiar_tamaño()
{
    if (window.innerWidth < 500)
    {
        window.resizeTo(502,window.innerHeight); //esto no lo permiten los exploradores prueba un window.locaton.reload

    }
}




function editPub(id)
{

  swal({
  title: "¿Seguro que deseas continuar?",
  text: "Esta acción es peligrosa, puedes agregar, modificar o eliminar preguntas que ya son parte de tu encuesta. ¿Deseas continuar?",
  type: "warning",
  showCancelButton: true,
  cancelButtonText: "Cancelar",
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "continuar",
  closeOnConfirm: true },
  function(){
      window.location.href = "/administrator/edit/"+id;
  });

}





function imagen(){
     $('#foto1').change(function(e) {
         addImage(e);
        });

        function addImage(e){
         var file = e.target.files[0],
         imageType = /image.*/;

         if (!file.type.match(imageType))
         {
           swal({
              title: "Su archivo no es una imagen",
              type: "error",
               });

               return;
         }
         var reader = new FileReader();
         reader.onload = fileOnload;
         reader.readAsDataURL(file);
        }

        function fileOnload(e) {
         var result=e.target.result;
         $('#imgSalida').attr("src",result);
        }

     }
