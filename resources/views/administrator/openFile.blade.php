<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Final Output</title>   
<meta name="description" content="Bootstrap.">  
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>  
<body style="margin:20px auto">  
<div class="container">
<div class="row header" style="text-align:center;color:green">
</div>
<table id="myTable" class="table table-striped" >  
        <thead>  
          <tr>  

              <th>Nombre</th>
              <th>email1</th>
              <th>Incidente</th>
              <th>Motivo</th>
  <!--            <th>apPaterno</th>
              <th>apMaterno</th>
              <th>matricula</th>
              <th>clave</th> -->
          </tr>  
        </thead>  
        <tbody>  
            <?php
                foreach ($data as $info) 
                {
            ?>
                    <tr>
                        <td><?php echo $info->nombreGeneral  ?>   </td>
                        <td><?php echo $info->email1         ?>   </td>
                        <td><?php echo $info->incidente      ?>   </td>
                        <td><?php echo $info->comentario     ?></td>

                    </tr>      

            <?php
                }

            ?> 
 
        </tbody>  
      </table>  
    </div>
</body>  
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
</html>  
