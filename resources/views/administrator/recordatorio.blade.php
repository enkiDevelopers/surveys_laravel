<style>
#tabla
{
width: 100%;
text-align: center;
}
#encabezado
{
width: 100%;
}

table-editable {
  position: relative;

  .glyphicon {
    font-size: 20px;
  }
}

.table-remove {
  color: #700;
  cursor: pointer;

  &:hover {
    color: #f00;
  }
}

.table-up, .table-down {
  color: #007;
  cursor: pointer;

  &:hover {
    color: #00f;
  }
}

.table-add {
  color: #070;
  cursor: pointer;
  position: absolute;
  top: 8px;
  right: 0;

  &:hover {
    color: #0b0;
  }
}
</style>
<input type="hidden" id="idPub" value="{{$mensaje->idPub}}" />
<table id="tabla">
  <thead id="encabezado">
    <tr>
<center>
      Titulo:      {{$mensaje->titulo}}
</center>

    </tr>
  </thead>
<tbody >
<tr>
  <td>
    <p>Asunto: </p>
  </td>
  <td>
    {{$mensaje->asunto}}
  </td>
</tr>

<tr>
  <td>
    <p>Destinatarios: </p>
  </td>
  <td>
    {{$mensaje->destinatarios}}
  </td>
</tr>
</tbody>
</table>

<center>
  <h5>Reccordatorios enviados</h5>
</center>
<?php $cont = 1; ?>
<table class="table">
<thead>
</thead>
<tbody>
  <tr>
    <td>
      <h5>#</h5>
    </td>
    <td>
      <h5>Enviado el</h5>
    </td>
  </tr>
<?php foreach ($recordatorios as $recordatorio) { ?>
  <tr>
    <td>
      {{$cont}}
    </td>
<td>
  {{$recordatorio->fechaEnvio}}
</td>
  </tr>
  <?php $cont = $cont+1; ?>
<?php } ?>
</tbody>
</table>
