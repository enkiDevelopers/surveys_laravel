<form id="updateDataTemplateForm" action="" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="idTemplate" value="{{$eid}}">
    <div class="modal fade" id="ModalTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static" tabindex="-1" style="z-index: 1050;" role ="dialog" aria-labelledby="myModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel1">Datos principales de la plantilla de encuesta</h4>
            </div>
            <div class="modal-body">
                <h5>Título de la encuesta:</h5>
                <input type="text" class="form-control text-black " id="ModalTitleInput" aria-describedby="emailHelp" value="{{$titulo}}" name="titulo"><br>
                <h5> Descripción de la encuesta:</h5>
                <textarea class="form-control text-black" cols="10" rows="5" name="descripcion" id="ModalDescInput" aria-describedby="desc" >{{$descripcion}}</textarea>
                <h5> Icono de la encuesta:</h5>
                <label class="btn btn-info btn-file">
                    Seleccione su imagen<input type="file" id="icon_survey" onchange="return ShowImagePreview( this.files );" name="icon_survey" onclick="limpiar2();" style="display: none;">
                </label> <br><br>
                <img id="img_survey" src="\img/iconos/{{$nombre}}" width="20%" height="20%" onerror="this.src='/img/iconos/default.png'">
                <div id="previewcanvascontainer" style="height 200px; width 200px;display: none;">
                    <canvas id="previewcanvas"></canvas>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="limpiar()" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="editDataTemplate" >Guardar</button>
            </div>
            </div>
        </div>
    </div>
</form>
