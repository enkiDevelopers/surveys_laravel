<div class="col-md-12" id="dataTemplateContainer">
  <div class="col-md-3 col-img">
    <img src="\img/iconos/{{$nombre}}" class="img-thumbnail" onerror="this.src='/img/iconos/default.png'">
  </div>
  <div class="col-md-8 title">
    <div class="col-md-12  titleContainer">
      <h2 class="text-center text-black-body titleWrite">{{$titulo}}</h2>
    </div>
    <div class="col-md-12 col-desc" >
      <textarea rows="5" cols="50" class="form-control text-black" disabled id="inputDesc" aria-describedby="desc" placeholder="Descripción" style="overflow-y: auto;">{{$descripcion}}</textarea>
    </div>
  </div>

  
    <div class="col-md-1 header-template">
      <a data-toggle="modal" data-target="#ModalTitle" class="btn btn-info btn-editTitle" style="position: relative; z-index: 1;margin-top: 10px; margin-bottom: 10px;width: 42px;/*box-shadow: 3px 3px 3px #174340;*">
        <span class="glyphicon glyphicon-edit"></span>
      </a>
      <a href="/administrator/previewtem/{{$eid}}/" target="_blank" class="btn btn-preview" style="background: gray;color:white;position: relative; z-index: 1;width: 42px;/*box-shadow: 3px 3px 3px #616161;*/">
        <span class=" glyphicon glyphicon-eye-open"></span>
      </a>
    </div>
    
  

</div>
