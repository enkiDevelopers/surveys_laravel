<div class="col-md-12" id="dataTemplateContainer">
  <div class="col-sm-7 col-sm-offset-4  light-grey">
      <h2 class="text-center text-black-body" id="exampleInputEmail1">{{$titulo}}</h2>
   </div>
  <div class="col-sm-1 col-sm-offset-11 header-template">
<!--            <a class="btn btn-primary pull-right" id="minDataTemplate" style="position: relative; z-index: 1;">
                <span class=" glyphicon glyphicon-minus"></span>
            </a> -->
    <a data-toggle="modal" data-target="#ModalTitle" class="btn btn-info btn-editTitle" style="position: relative; z-index: 1;margin-top: 10px; margin-bottom: 10px;box-shadow: 3px 3px 3px #174340;">
      <span class="glyphicon glyphicon-edit"></span>
    </a>
    <a href="/administrator/previewtem/{{$eid}}/" target="_blank" class="btn btn-preview" style="background: gray;color:white;position: relative; z-index: 1;box-shadow: 3px 3px 3px #616161;">
      <span class=" glyphicon glyphicon-eye-open"></span>
    </a>
  </div>
        <div id="dataContainer" style="position: relative; z-index: 0;">
       		<div class="col-md-3 col-img" style="margin-top: -14%;">
       			<center>
                	<img src="\img/iconos/{{$nombre}}" class="img-thumbnail" width="250px" style="max-height: 250px;" onerror="this.src='/img/iconos/default.png'">
            	</center>
            </div>
            <div class="col-md-8 col-desc" style="margin-top: -8%;margin-bottom: 1%;margin-left:270px;">
                <textarea rows="4" cols="50" class="form-control text-black" disabled id="inputDesc" aria-describedby="desc" placeholder="Descripción">{{$descripcion}}</textarea>
            </div>
        </div>
</div>
