<form action="/updateDataTemplate" id="updateDataTemplateForm">
    {{ csrf_field() }}
    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
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
                        <input type="text" class="form-control text-black " id="ModalTitleInput" aria-describedby="emailHelp" value="<?php echo "$titulo" ?>" name="titulo"><br>
                        <h5> Descripción de la encuesta:</h5>
                        <textarea class="form-control text-black" cols="10" rows="5" name="descripcion" id="ModalDescInput" aria-describedby="desc" ><?php echo $descripcion; ?></textarea>

                        <input type="file" id="foto1"  onchange="return ShowImagePreview( this.files );" name="icono" onclick="limpiar2();"/> <br />
                        <div id="previewcanvascontainer" style="height 200px; width 200px;">
                            <canvas id="previewcanvas" > 
                                <img src="\img/iconos/<?php echo $nombre;?>" width="10%" height="10%">
                            </canvas>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="publish();" >Guardar</button>
                    </div>


                    </div>
                </div>
    </div>
</form>
