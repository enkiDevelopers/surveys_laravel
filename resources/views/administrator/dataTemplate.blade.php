<div class="col-md-12 ">
    <div>
        <div class="col-md-10 col-sm-12  light-grey">
            <h2 class="text-center">Plantilla de Encuesta</h2>
        </div>
   		<div class="col-md-10" style="margin-top:10px;">
   			<center>
            	<img src="\img/iconos/<?php echo $nombre;?>" width="10%" height="10%">
        	</center>
        </div>
        <div class="col-md-10 col-sm-12  " style="width:100%;">
            <div class="form-group" style="position: fixed;"></div>
            <label for="exampleInputEmail1" >Título de la encuesta</label>
        </div>
        <div class="col-md-10" style="margin-top: 5px;margin-bottom:15px;">
            <input type="text" class="form-control text-black" disabled id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Titulo de la Encuesta" value="<?php echo $titulo; ?>">
        </div>
        <div class="col-md-10 col-sm-12 " style="width:100%;">
            <div class="form-group" style="position: fixed;"></div>
            <label for="exampleInputEmail1" >Descripión de la encuesta</label>
        </div>
        <div class="col-md-10" style="margin-top: 5px;">
            <textarea rows="2" cols="50" class="form-control text-black" disabled id="inputDesc" aria-describedby="desc" placeholder="Descripción"><?php echo $descripcion; ?> </textarea>
        </div>
        <div class="row col-md-12">
        	<div class="col-md-9 "></div>
	            <div class="col-md-3 pull-right" style="margin-top:10px;">
	                <a data-toggle="modal" data-target="#ModalTitle" class="btn btn-info">
		                <span class="glyphicon glyphicon-pencil"></span>
	                </a>
	            </div>
	   </div>
	    <div class="row col-md-12">
            <div class=" new-survey__controls " > <center>
            	<div class="col-md-4 pull-left col-md-offset-3 ">
                    <button class="btn btn-success new-survey__control "  onclick="ModalQuestion();" id="add-question">Agregar pregunta</button>
                </div>
                <div class="col-md-1 pull-left">
                    <a href="" class="btn btn-success">
                    	<span class=" glyphicon glyphicon-eye-open "></span>
                	</a>
                </div>
			 </center>
            </div>
		    </div>
	</div>
</div><br><br><br><br><br>