<form enctype="multipart/form-data" id="updateDataTemplateForm">
  {{ csrf_field() }}
  <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="idTemplate" value="{{$eid}}">
  <div class="modal fade bd-example-modal-lg" id="ModalTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static" tabindex="-1" style="z-index: 1050;" role ="dialog" aria-labelledby="myModalLabel1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-sm-10">
                    <h4 class="modal-title" id="myModalLabel1">Datos principales de la plantilla de encuesta</h4>
                    </div>
                </div>
            </div>
            <div class="modal-body">
              <div class="row">
              <div class="col-md-4">
                <input
                  type="text" maxlength="40" class="form-control text-black "
                  required id="ModalTitleInput" aria-describedby="emailHelp"
                  placeholder="Titulo de la encuesta" name="titulo" style="margin-bottom: 20px;" value="{{$titulo}}"/>
                  <textarea maxlength="500" style="resize:none"
                                              class="form-control text-black" required
                                              cols="10" rows="10" name="descripcion" id="ModalDescInput" aria-describedby="desc"
                                              placeholder="Descripción del proposito de la encuesta">{{$descripcion}}</textarea>
              </div>

              <div class="col-md-4" id="pHorizontal">
                  <br />
                <div class="col-md-3 col-md-offset-3 text-center cont">
                  <div class="titleed text-center">
                    Título de prueba
                  </div>
                <div class="btnC">
                  <a class="btn btn-icon text-center" data-toggle="tooltip" data-placement="top" >
                  <span class="glyphicon glyphicon-edit "></span>
                  </a>
                  <a class="btn btn-icon text-center" data-toggle="tooltip" data-placement="top" >
                  <span class="glyphicon glyphicon-duplicate"></span>
                  </a>
                  <a class="btn btn-icon text-center" data-toggle="tooltip" data-placement="top" >
                  <span class="glyphicon glyphicon-trash "></span>
                  </a>
                  <a class="btn btn-icon text-center" data-toggle="tooltip" data-placement="top" >
                <span class="glyphicon glyphicon-eye-open" ></span>
                  </a>
                  <a class="btn btn-icon text-center" data-toggle="tooltip" data-placement="top" >
                  <span class="glyphicon glyphicon-send"></span>
                  </a>
                </div>

                  <div class="horizontal" >
                <div class="vertical">
                    <img id="imgSalida" class="img-responsive center-block imgIcon" src="/img/iconos/{{$nombre}}"/>
                </div>

                </div>



                        </div>
                       </div>
              <div class="col-md-4 text-center">
              <label class="btn btn-info btn-file">
                Seleccione su imagen
                <input type="file" id="icon_survey" name="icon_survey" onclick="limpiar2({{$nombre}});" style="display:none;"/>
              </label>
              </div>

              </div>



            </div>
            <div class="modal-footer" style="z-index: 3000;position: relative;">
                <a class="btn btn-default" data-dismiss="modal"onclick="limpiar2({{$nombre}});">
                Cancelar
                </a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
  </div>
</form>
