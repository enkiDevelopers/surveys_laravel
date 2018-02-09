<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>UVM | Universidad del Valle de México</title>
</head>
<body style="background-image: url('https://image.ibb.co/ej9skc/mail_center.png') ">
<!--Copia desde aquí-->
<table style="max-width: 800px; padding: 10px; margin:0 auto; border-collapse: collapse;">
	<tr>
		<td style="background-color: #ecf0f1; text-align: left; padding: 0">
				<img width="20%" style="display:block; margin: 1.5% 3%" height="80px" src="https://image.ibb.co/eXzEyx/mail_logo.png">
		</td>
	</tr>
	<tr>
		<td style="padding: 0">
			<img style="padding: 0; display: block" src="https://image.ibb.co/fmTvOx/self_assessment.jpg" width="100%">
		</td>
	</tr>
	<tr>
		<td style="background-color: #ecf0f1">
			<div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
				<h2 style="color: #e67e22; margin: 0 0 7px">¡Hola!</h2>
				<p style="margin: 2px; font-size: 15px">
          <?php echo $instrucciones; ?>
          </p>
			<div style="width: 100%;margin:20px 0; display: inline-block;text-align: center">
	<hr />
				</div>
				<div style="width: 100%; text-align: center">

          <?php
          if (isset($_SERVER['HTTPS'])) { ?>
            <div style="margin-bottom: 20px;">
        <a href="https://<?php echo $_SERVER["HTTP_HOST"]; ?>/surveyed/previewtem/{{$infousuario->idE}}"> Contesta aqui tu encuesta</a>
        </div>
          <?php
          } else {
          ?>
          <div style="margin-bottom: 20px;">
                          <a href="http://<?php echo $_SERVER["HTTP_HOST"]; ?>/surveyed/previewtem/{{$infousuario->idE}}"> Contesta aqui tu encuesta</a>
                        </div>
            <?php
          }
          ?>

          <div style="width: 80px; display:inline-block">
                  <a href="https://www.facebook.com/UniversidaddelValledeMexico" target="_blank">
                  <img style="padding: 0; width: 50px; margin: 5px" src="https://image.ibb.co/fDmJRH/Facebook.png">
                  </a>
          </div>
                  <div style="width: 80px; display:inline-block">
                  <a href="https://twitter.com/UVMMEXICO" target="_blank">
                    <img style="padding: 0; width: 50px; margin: 5px" src="https://image.ibb.co/gbWGfc/twitter.png">
                  </a>
                  </div>

                  <div style="width: 80px; display:inline-block">
                    <a href="https://www.linkedin.com/school/universidad-del-valle-de-m-xico/" target="_blank">
                      <img style="padding: 0; width: 50px; margin: 5px" src="https://image.ibb.co/f5t7mH/linked.png">
                  </a>
            </div>

            <div style="width: 80px;display:inline-block">
                    <a href="https://www.youtube.com/user/uvmmexico" target="_blank">
                      <img style="padding: 0; width: 50px; margin: 5px" src="https://image.ibb.co/noR4Yx/youtube.png">
                    </a>
          </div>

          <div style="width: 80px; display:inline-block">
                    <a href="https://blog.universidaduvm.mx" target="_blank">
                      <img style="padding: 0; width: 50px; margin: 5px" src="https://image.ibb.co/cd1cmH/Blog.png">
                    </a>
          </div>
      	</div>
				<p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">D.R.© Universidad del Valle de México, México. <?php echo date("Y"); ?> Laureate International Universities</p>
			</div>
		</td>
	</tr>
</table>
<!--hasta aquí-->

</body>
</html>S
