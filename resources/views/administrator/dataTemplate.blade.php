<div class="col-md-12" id="dataTemplateContainer">
    <div>
        <div class="col-sm-9 col-sm-offset-3  light-grey">
            <h2 class="text-center text-black-body" id="exampleInputEmail1">{{$titulo}}</h2>
        </div>
        <div class="header-template">
            <a class="btn btn-primary pull-right" id="minDataTemplate" style="position: relative; z-index: 1;">
                <span class=" glyphicon glyphicon-minus"></span>
            </a>
        </div>
        <div id="dataContainer" style="position: relative; z-index: 0;">
       		<div class="col-md-3" style="margin-top: -5%;" >
       			<center>
                	<img src="\img/iconos/{{$nombre}}" class="img-thumbnail" width="200px" style="max-height: 200px;" onerror="this.src='/img/iconos/default.png'">
            	</center>
            </div>
<!--            <div class="col-sm-8" style="margin-top: 10px;">
                <div class="form-group" style="position: fixed;"></div>
                <label for="exampleInputEmail1" >Título de la encuesta</label>
            </div>
            <div class="col-md-8" style="margin-top: 5px;margin-bottom:15px;">
                <input type="text" class="form-control text-black" disabled  aria-describedby="emailHelp" placeholder="Titulo de la Encuesta" value="{{$titulo}}">
            </div> 
            <div class="col-sm-8">
                <div class="form-group" style="position: fixed;"></div>
                <label for="exampleInputEmail1" >Descripión de la encuesta</label>
            </div> -->
            <div class="col-md-8" style="margin-top: 3%;">
                <textarea rows="4" cols="50" class="form-control text-black" disabled id="inputDesc" aria-describedby="desc" placeholder="Descripción">{{$descripcion}}</textarea>
            </div>
            <div class="row col-md-12">
            	<div class="col-md-8"></div>
                <div class="col-md-3 text-right" style="margin-top: 2%">
                    <a data-toggle="modal" data-target="#ModalTitle" class="btn btn-info">
    	                <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="/administrator/previewtem/{{$eid}}/" target="_blank" class="btn btn-success">
                        <span class=" glyphicon glyphicon-eye-open "></span>
                    </a>
                </div>
            </div>
        </div>
	</div>
</div>
