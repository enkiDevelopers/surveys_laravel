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
                <table id="aPlantilla" class="table" style="width: 100%;">
                    <tr>
                        <td style="width:50%">
                            <div style="width:100%;">
                                <input type="text" maxlength="40" class="form-control text-black" value="{{$titulo}}" required id="ModalTitleInput" aria-describedby="emailHelp" placeholder="Titulo de la encuesta" name="titulo" style="margin-bottom: 20px;"/>
                            </div>
                        </td>
                        <td style="text-align: center;">
                            <label class="btn btn-info btn-file">
                            Seleccione su imagen<input type="file" id="icon_survey" onchange="return ShowImagePreview( this.files );" name="icon_survey" style="display: none;">
                           </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea maxlength="500" class="form-control text-black" required cols="10" rows="10" name="descripcion" id="ModalDescInput" aria-describedby="desc" placeholder="Descripción del proposito de la encuesta">{{$descripcion}}</textarea>
                        </td>
                        <td>
                            <div id="imgC">
                                
                                    <img id="imgSalida" src="\img/iconos/{{$nombre}}" onchange="return ShowImagePreview( this.files );" onerror="this.src='/img/iconos/default.png'"/>
                                    <div id="previewcanvascontainer" >
                                        <canvas id="previewcanvas"></canvas>
                                    </div>
                                
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer" style="z-index: 3000;position: relative;">
                <a type="button" class="btn btn-default" data-dismiss="modal" onclick="limpiar()">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
  </div>
</form>
