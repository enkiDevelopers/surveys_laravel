<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="/css/surveys.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  </head>
  <body>
  
  <div class="col-md-9 col-md-offset-3">
    <div class="col-md-1">
      <img src="/img/avatar/default.png" class="circle" alt="">
    </div>
    <div class="col-md-5 infoUser">
      <span class="glyphicon glyphicon-cog"></span>
      <label style="padding-top: -10px">Rafael Alberto Martínez Méndez</label>   
      <label>admin@admin.com</label>
    </div>
  </div>

      <?php
  echo $_SERVER['SERVER_NAME'];
    echo "<br />";
  echo $_SERVER["HTTP_HOST"];;
  ?>

  </body>
</html>
