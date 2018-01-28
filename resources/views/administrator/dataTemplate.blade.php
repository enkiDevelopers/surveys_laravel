<div class="col-md-12 ">
    <div>
        <div class="col-sm-12  light-grey">
            <h2 class="text-center">Plantilla de Encuesta</h2>
        </div>
   		<div class="col-md-12" style="margin-top:10px;">
   			<center>
            	<img src="\img/iconos/<?php echo $nombre;?>" width="10%" height="10%">
        	</center>
        </div>
        <div class="col-sm-12  " style="width:100%;">
            <div class="form-group" style="position: fixed;"></div>
            <label for="exampleInputEmail1" >Título de la encuesta</label>
        </div>
        <div class="col-md-11" style="margin-top: 5px;margin-bottom:15px;">
            <input type="text" class="form-control text-black" disabled id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Titulo de la Encuesta" value="<?php echo $titulo; ?>">
        </div>
        <div class="col-sm-12 " style="width:100%;">
            <div class="form-group" style="position: fixed;"></div>
            <label for="exampleInputEmail1" >Descripión de la encuesta</label>
        </div>
        <div class="col-md-11" style="margin-top: 5px;">
            <textarea rows="2" cols="50" class="form-control text-black" disabled id="inputDesc" aria-describedby="desc" placeholder="Descripción"><?php echo $descripcion; ?> </textarea>
        </div>
        <div class="row col-md-12">
        	<div class="col-md-8"></div>
            <div class="col-md-3 text-right" style="margin-top: 2%">
                <a data-toggle="modal" data-target="#ModalTitle" class="btn btn-info">
	                <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <a href="" class="btn btn-success">
                    <span class=" glyphicon glyphicon-eye-open "></span>
                </a>
            </div>
        </div>
	</div>
</div><br><br><br><br><br>

