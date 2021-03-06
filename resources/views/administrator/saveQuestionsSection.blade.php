<form action="/saveQuestionsTemplate" id="saveQuestionForm">
    {{ csrf_field() }}
    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
    <div class="row new-question-template " id="new-question-template">
        <div aria-hidden="true" data-keyboard="false" data-backdrop="static" tabindex="-1" style="position: fixed;z-index: 1070;" class="modal fade" id="ModalQuestion" role="dialog" aria-labelledby="ModalQuestionLabel" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> -->
                        <h4 class="modal-title" id="ModalQuestionLabel">Agregar Pregunta</h4>
                    </div>
                    <div class="modal-body">
                        <div class=" col-md-12 well">
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" style="margin-left: -10px;">Número</label>
                                    <input type="text" class="form-control text-black-body" id="numPregSig" value = "2" aria-describedby="emailHelp" maxlength="5"  disabled>
                                </div>
                            </div>
                            <div class="col-md-6 titleQuestionModal" >
                                <div class="form-group">
                                    <label for="questionInput">Título de la pregunta</label>
                                    <input type="text" class="form-control text-black-body" id="questionInput" aria-describedby="emailHelp" placeholder="¿Cuál es la pregunta?" maxlength="256">
                                </div>
                            </div>
                            <div class="col-md-4">
                                 <div class=" form-group">
                                    <label for="questionType">Tipo</label>
                                    <select class="form-control yes-no-question text-black-body" id="questionType">
                                        <option value="1">Abierta</option>
                                        <option value="2">Opción múltiple </option>
                                        <option value="3">Selección múltiple</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="modal-footer">
                         <div class="row">
                            <div class="col-md-12 pull-right">
                                <button id="idSaveQuestion" class="btn btn-danger col-md-1 pull-right new-question__control new-question__control--add-question" onclick="saveQuestion(<?php echo $eid ?>);" >
                                    <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>
                                </button>
                                <button class="btn btn-info col-md-1 pull-right new-question__control new-question__control--delete-question" id="cancelarAgregarPreg" >
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                       </div>
                    </div>
                    </div>
        </div>
    </div>

  <div class="row hide yes-no-question-block " id="options-template">
    <div>
        <div class="col-md-12" id="multi-options">
            <div class="col-md-12 multi-options-template" data-multioptions="0" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Opción Respuesta</label>
                    <button class="btn btn-danger delete-question-to-yes-no pull-right" disabled style="margin-bottom: 4px;margin-top: 2px;">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>                    
                    <input type="text" class="form-control text-black-body questionOptionInputs"  id="questionOptionInput" aria-describedby="emailHelp" placeholder="¿Cual es la pregunta?"  maxlength="256">
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
    <div class="btn-group btn-group-sm pull-right" role="group" aria-label="...">
            <button class="btn btn-success add-question-to-yes-no">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
    </div>
  </div>
  
</form>

    <div id="loader" class="modal fade">
        <img src="/img/load/loader.gif" alt="cargando..." width="50px" height="50px" style="margin-top: 25%;margin-left: 50%">
    </div>
