<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Configuración del Sistema</title>
  <link rel="stylesheet" href="css/config.css">
</head>
<body id="bg_config">
  <div id="login-button">
    <img src="https://www.shareicon.net/download/2015/09/03/95316_key_512x512.png">
    </img>
  </div>

<?php 
echo $todo['DB_HOST'];

 ?>

<div id="container">
  <h1>Contraseña Root</h1>
  <form method="POST" action="" >
    <input type="password" name="pass" id="pass" minlength="6" placeholder="Contraseña" required >
    <input type="password" name="rePass" id="rePass" minlength="6" placeholder="Repetir Contraseña" required >
    <input type="submit" value="Siguiente">
  </form>
</div>
<div id="container-step2">
  <h1>Base de Datos</h1>
<!--  <span class="close-btn">
    <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
  </span>  -->
  <form action="" method="POST">
    <input type="text" name="host" placeholder="Host" class="host" required >
    <input type="number" name="port" placeholder="Puerto" class="port" required >
    <input type="text" name="nameDB" placeholder="Nombre de la Base de Datos" required >
    <input type="text" name="userDB" placeholder="Nombre del Usuario" required >
    <input type="password" name="passDB" placeholder="Contraseña" required >
    <input type="submit" value="Guardar">
  </form>
</div>

</body>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js"></script>
<script src="js/config.js"></script>
</html>
