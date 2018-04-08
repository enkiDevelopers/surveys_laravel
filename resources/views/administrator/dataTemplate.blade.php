<div class="col-md-12" id="dataTemplateContainer">
  <div class="col-sm-8 light-grey titleContainer">
    <h2 class="text-center text-black-body" id="exampleInputEmail1">{{$titulo}}</h2>
  </div>
  <div class="col-sm-4 header-template">
    <!--  <a class="btn btn-primary pull-right" id="minDataTemplate" style="position: relative; z-index: 1;">
            <span class=" glyphicon glyphicon-minus"></span>
          </a> -->
    <a data-toggle="modal" data-target="#ModalTitle" class="btn btn-info btn-editTitle" style="position: relative; z-index: 1;margin-top: 10px; margin-bottom: 10px;width: 42px;/*box-shadow: 3px 3px 3px #174340;*">
      <span class="glyphicon glyphicon-edit"></span>
    </a>
    <a href="/administrator/previewtem/{{$eid}}/" target="_blank" class="btn btn-preview" style="background: gray;color:white;position: relative; z-index: 1;width: 42px;/*box-shadow: 3px 3px 3px #616161;*/">
      <span class=" glyphicon glyphicon-eye-open"></span>
    </a>
  </div>
	<div class="col-md-3 col-img" style="margin-top: -5vw;">
  	<img src="\img/iconos/{{$nombre}}" class="img-thumbnail" width="15vw" height="15vw" style="max-height: 15vw; min-height: 15vw;max-width: 15vw;min-width: 15vw;" onerror="this.src='/img/iconos/default.png'">
  </div>
  <div class="col-md-8 col-desc" >
    <textarea rows="5" cols="50" class="form-control text-black" disabled id="inputDesc" aria-describedby="desc" placeholder="Descripción" style="overflow-y: auto;">{{$descripcion}}</textarea>
  </div>
</div>
