<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>UVM | Universidad del Valle de México </title>
    <style>
      #content
      {
        position: fixed;
        margin-top: 200px;
        overflow: auto;
        word-break: break-all;
        -webkit-hyphens: auto;
        -moz-hyphens: auto;
        hyphens: auto;
        width: 80%;
        height: 380px;

      }
    </style>
  </head>
  <body style="position: fixed; ">

<img src="{{$message["image"]}}" alt="">
<img src="/img/mail_bottom.jpg" width="80%" height="400px" style="margin-top: 250px; position: fixed; margin-left: 0px;" >
<img src="/img/mail_logo.png" width="200px" style="position: fixed; margin-top: 10px; margin-left: 520px;">
  <div id=content>
<?php echo $instrucciones; ?>
  </div>
<center>
  <br />
  <br>
 <a href="http://localhost:8000/surveyed/previewtem/{{$infousuario->idE}}"> Contesta aqui tu encuesta</a>
</center>
  </body>
</html>
