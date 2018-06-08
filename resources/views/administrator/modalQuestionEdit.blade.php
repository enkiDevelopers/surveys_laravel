<form action="/editQuestionsTemplate" id="editQuestionForm">
  {{ csrf_field() }}
  <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
  <div class="row new-question-template " id="edit-question-template">
    <div aria-hidden="true" data-keyboard="false" data-backdrop="static" tabindex="-1" style="position: fixed" class="modal fade" id="ModalQuestionEdit" role="dialog" aria-labelledby="ModalQuestionLabelEdit" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="ModalQuestionLabelEdit">Editar Pregunta</h4>
        </div>
        <div class="modal-body">
          <div class="navbar">
            <div class="navbar-inner">
              <ul class="nav nav-pills">
                <li id="oneEdit" class="active"><a href="#step1Edit" data-toggle="tab" data-step="1">Definición</a></li>
                <li class="config hidden"><a href="#step2Edit" data-toggle="tab" data-step="2">Configuración</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-12 well">
            <div class="tab-content">
              <div class="tab-pane fade in active" id="step1Edit">
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
                            <button class="btn btn-danger delete-question-to-yes-no pull-right" disabled style="margin-bottom: 4px;margin-top: 2px;">
                              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                            <input type="text" class="form-control text-black-body questionOptionInputsEdit"  id="questionOptionInputEdit" aria-describedby="emailHelp" placeholder="¿Cual es la pregunta?"  maxlength="250">
                          </div>
                        </div>
                      <div class="col-md-4"></div>
                    </div>
                  </div>
                </div>
                <div class="btn-group btn-group-sm pull-right " role="group">
                  <button class="btn btn-success add-question-to-yes-no hidden">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                  </button>
                </div>                            
              </div>
              <div class="tab-pane fade" id="step2Edit">
                <div class="col-md-12 typeDesign hidden">
                  <div class="col-md-4">
                    <label for="questionDesign">Tipo de display: </label>
                  </div>
                  <div class="col-md-8">
                    <select  class="form-control yes-no-question text-black-body" id="questionDesignEdit">
                      <option value="0" disabled="true">Seleccione un diseño</option>
                      <option value="1" data-design="option">Radio Buttons</option>
                      <option value="2" data-design="option">Botones Horizontales</option>
                      <option value="3" data-design="option">Botones Verticales</option>
                      <option value="4" data-design="option">Menú Desplegable</option>
                      <option value="10" data-design="select">CheckBox</option>
                      <option value="11" data-design="select">Caja de selección múltipe</option>
                    </select>
                  </div> 
                </div>
                <div class="examples">
                  <div class="col-md-12">
                    <label class="col-md-4">Vista previa:</label><br><br>
                  </div>
                  <center>
                    <div class="radios hidden"> 
                      <input id="exampleradio1" class="form-check-input" type="Radio" name="exampleradio">
                      <label for="exampleradio1">Opción 1</label> <br><br>
                      <input id="exampleradio2" class="form-check-input" type="Radio" name="exampleradio">
                      <label for="exampleradio2">Opción 2</label> <br><br>
                      <input id="exampleradio3" class="form-check-input" type="Radio" name="exampleradio">
                      <label for="exampleradio3">Opción 3</label>
                    </div>
                    <div class="btns-horizontal hidden">            
                      <button class="btn btn-primary">Opción 1</button>
                      <button class="btn btn-primary">Opción 2</button>
                      <button class="btn btn-primary">Opcion 3</button>        
                    </div>
                    <div class="btns-vertical hidden">
                      <button class="btn btn-primary">Opción 1</button><br><br>
                      <button class="btn btn-primary">Opción 2</button><br><br>
                      <button class="btn btn-primary">Opcion 3</button>
                    </div>
                    <div class="exampleselects hidden col-md-4 col-md-push-4">
                      <select  class="form-control yes-no-question text-black-body">
                        <option value="1">Opción 1</option>
                        <option value="2">Opción 2</option>
                        <option value="3">Opción 3</option>
                      </select>
                    </div>
                    <div class="examplecheckboxes hidden col-md-4 col-md-push-4">
                      <input class="form-check-input" type="checkbox" id="defaultCheck1">
                      <label class="form-check-label" for="defaultCheck1">Opción 1</label><br><br>
                      <input class="form-check-input" type="checkbox" id="defaultCheck2">
                      <label class="form-check-label" for="defaultCheck2">Opción 2</label><br><br>
                      <input class="form-check-input" type="checkbox" id="defaultCheck3">
                      <label class="form-check-label" for="defaultCheck3">Opción 3</label><br><br>
                    </div>
                    <div class="boxSel hidden">
                      <div>
                        <select name="origen[]" id="origen" multiple="multiple" size="8">
                          <option value="1">Opción 1</option>
                          <option value="2">Opción 2</option>
                          <option value="3">Opción 3</option>
                          <option value="4">Opción 4</option>
                        </select>
                        <select name="destino[]" id="destino" multiple="multiple" size="8">
                          <option value="5">Opción 5</option>
                          <option value="6">Opción 6</option>
                        </select>
                      </div>
                      <div>
                        <button class="btn btn-default pasar izq">Pasar »</button>
                        <button class="btn btn-default quitar der">« Quitar</button> <br />
                      </div>
                    </div>
                  </center>
                </div>
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
