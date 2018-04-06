<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>UVM | Universidad del Valle de México</title>
</head>
<body>
<!--Copia desde aquí-->
<table style="max-width: 800px; padding: 10px; margin:0 auto; border-collapse: collapse;">
	<tr>
		<td style="background-color: #ecf0f1; text-align: left; padding: 0">
		</td>
	</tr>
	<tr>
		<td style="padding: 0">
			<img style="padding: 0; display: block; margin-left:25%; margin-top: 10%; border-radius: 5px;" src="https://uvmmejoraporti.mx/img/iconos/<?php echo $imagen; ?>" width="50%" height="auto">
		</td>
	</tr>
	<tr>
		<td style="background-color: #fff">
			<div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
				<h2 style="color: #e67e22; margin: 0 0 7px">¡Hola!</h2>
				<p style="margin: 2px; font-size: 15px">
     				<?php echo $instrucciones; ?>
          </p>
			<div style="width: 100%;margin:20px 0; display: inline-block;text-align: center">
	<hr />
				</div>
				<div style="width: 100%; text-align: center">


        <div style="margin-bottom: 20px;">
<a href="<?php echo $protocolo; ?>://<?php echo $host; ?>/surveyed/previewtem/{{$infousuario->idE}}"><h1><b>Contesta aquí tu encuesta </b></h1></a>
		    </div>

      	</div>
				<p style="color: #b3b3b3; font-size: 12px; text-align: justify;margin: 30px 0 0">
					Una vez que respondas a la encuesta, dejarás de recibir recordatorios.
					Para que no recibas un recordatorio de éste correo y encuesta, puedes responder a éste correo acompañándolo de una breve explicación del motivo por el cuál no debemos seguir enviándote recordatorios.
					Recuerda que también puedes llenar ésta encuesta por medio de Conexión UVM, BlackBoard, en Centros de Cómputo, Facebook ó Twitter.
					</p>




			</div>
		</td>
	</tr>
</table>
<!--hasta aquí-->

</body>
</html>
