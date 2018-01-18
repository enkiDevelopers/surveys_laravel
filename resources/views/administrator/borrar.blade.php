<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>borrar</title>
<body>

  <p id="contadorTaComentario">0/140</p>
  <textarea id="taComentario" rows="10" cols=""></textarea>



  <script>

  function init_contadorTa(idtextarea, idcontador,max)
  {
  $("#"+idtextarea).keyup(function()
  {
  updateContadorTa(idtextarea, idcontador,max);
  });

  $("#"+idtextarea).change(function()
  {
  updateContadorTa(idtextarea, idcontador,max);
  });

  }

  function updateContadorTa(idtextarea, idcontador,max)
  {
  var contador = $("#"+idcontador);
  var ta =     $("#"+idtextarea);
  contador.html("0/"+max);

  contador.html(ta.val().length+"/"+max);
  if(parseInt(ta.val().length)>max)
  {
  ta.val(ta.val().substring(0,max-1));
  contador.html(max+"/"+max);
  }

  }​


  </script>


  </body>
</html>
