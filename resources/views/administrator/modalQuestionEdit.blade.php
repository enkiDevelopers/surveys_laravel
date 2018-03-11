<form action="/editQuestionsTemplate" id="editQuestionForm">
    {{ csrf_field() }}
    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
    <div class="row new-question-template " id="edit-question-template">
        <div aria-hidden="true" data-keyboard="false" data-backdrop="static" tabindex="-1" style="position: fixed" class="modal fade" id="ModalQuestionEdit" role="dialog" aria-labelledby="ModalQuestionLabelEdit" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="ModalQuestionLabelEdit">Editar Pregunta</h4>
                    </div>
                    <div class="modal-body">
                        <div class=" col-md-12 well" id="optionsMultEdit">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Número</label>
                                    <input type="text" class="form-control text-black-body" id="numPregSigEdit" disabled>
                                    <input type="hidden" id="idQuestion">
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label for="questionInput">Título de la pregunta</label>
                                    <input type="text" class="form-control text-black-body" id="questionInputEdit" aria-describedby="emailHelp" placeholder="¿Cual es la pregunta?" maxlength="200">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class=" form-group">
                                    <label for="questionTypeEdit">Tipo</label>
                                    <select class="form-control yes-no-question text-black-body" disabled id="questionTypeEdit">
                                        <option value="1">Abierta</option>
                                        <option value="2">Opción múltiple</option>
                                        <option value="3">Selección múltiple</option>
                                    </select>
                                </div>
                            </div>


                        <div class="row yes-no-question-block" id="options-template-edit">
                            <div class="col-md-12" id="multi-options-edit">
                                <div class="col-md-12 multi-options-template-edit" data-multioptions="0" >
                                    <div class="form-group hidden" id="optionEdit">
                                        <label for="exampleInputEmail1">Opción Respuesta</label>
                                        <input type="text" class="form-control text-black-body questionOptionInputsEdit"  id="questionOptionInputEdit" aria-describedby="emailHelp" placeholder="¿Cual es la pregunta?"  maxlength="250">
                                        <button class="btn btn-danger delete-question-to-yes-no pull-right" disabled style="margin-top: 5px;">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                            <div class="btn-group btn-group-sm pull-right " role="group">
                                    <button class="btn btn-success add-question-to-yes-no hidden">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    </button>
                            </div>
                        </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-md-12 pull-right">
                                <button onclick="editQuestion({{$eid}});" class="btn btn-danger col-md-1 pull-right new-question__control edit-question__control--edit-question" >
                                    <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>
                                </button>
                                <button class="btn btn-info col-md-1 pull-right new-question__control edit-question__control--delete-question" data-dismiss="modal">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 
</form>

