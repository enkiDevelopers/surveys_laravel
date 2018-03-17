<form action="/editQuestionsTemplate" id="editQuestionForm">
    {{ csrf_field() }}
    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
    <div class="row new-question-template " id="edit-question-template">
        <div aria-hidden="true" data-keyboard="false" data-backdrop="static" tabindex="-1" style="position: fixed" class="modal fade" id="ModalQuestionEdit" role="dialog" aria-labelledby="ModalQuestionLabelEdit" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> -->
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

<!--################################## nuevo modal   ###################################################-->


<form id="myForm" method="post" action="/save" enctype="multipart/form-data" id="myForm">
        {{ csrf_field() }}
<div class="modal fade bd-example-modal-lg" id="ModalTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static" tabindex="-1" style="z-index: 1050;" role ="dialog" aria-labelledby="myModalLabel1">
  <div class="modal-dialog modal-lg" role="document">

      <div class="modal-content">
      <div class="modal-header">
<div class="row">
<div class="col-sm-10">
<h4 class="modal-title" id="myModalLabel1">Inicializar plantila</h4>
</div>

<div class="col-sm-2 pull-right pull-right">
<div class="pull-right">
<a type="button" class="glyphicon glyphicon-remove" data-dismiss="modal" href="administrator/surveys" onclick="limpiar()"></a>
      </div>
      </div>

      </div>
      </div>

      <div class="modal-body">
        <input type="hidden" value="{{$id}}" name="creador" id="creador"/>
          <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}"/>

          <table id="aPlantilla" class="table">
          <tr>
              <td style="width:50%">
              <div style="width:100%;">
                <input
                type="text" maxlength="40" class="form-control text-black "
                required id="ModalTitleInput" aria-describedby="emailHelp"
                placeholder="Titulo de la encuesta" name="titulo" style="margin-bottom: 20px;"/>
                </div>
              </td>
                    <td style="text-align: center;">
              <input type="file" id="foto1" name="icono" onclick="limpiar2();"/>
                    </td>
          </tr>
              <tr>
                <td>

                  <textarea maxlength="500"
                  class="form-control text-black" required
                  cols="10" rows="5" name="descripcion" id="ModalDescInput" aria-describedby="desc"
                  placeholder="Descripción del proposito de la encuesta"></textarea>

                </td>
                    <td>
                          <div id="imgC">
                          <img id="imgSalida" src="/img/iconos/default.png"/>
                              </div>
                    </td>
              </tr>
          </table>


      </div>


      <div class="modal-footer">

   <a type="button" class="btn btn-default" data-dismiss="modal"
   onclick="limpiar()">Cancelar</a>
          <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </div>



  </div>


</div>
</form>


<script>

function limpiar(){
$('#imgSalida').attr("src","/img/iconos/default.png");
  document.getElementById("myForm").reset();

                  }
      function limpiar2()
                {
                  $('#imgSalida').attr("src","/img/iconos/default.png");
                  }



                  function imagen(){
                       $('#foto1').change(function(e) {
                           addImage(e);
                          });

                          function addImage(e){
                           var file = e.target.files[0],
                           imageType = /image.*/;

                           if (!file.type.match(imageType))
                           {
                             swal({
                                title: "Su archivo no es una imagen",
                                type: "error",
                                 });

                                 return;
                           }
                           var reader = new FileReader();
                           reader.onload = fileOnload;
                           reader.readAsDataURL(file);
                          }

                          function fileOnload(e) {
                           var result=e.target.result;
                           $('#imgSalida').attr("src",result);
                          }

                       }


</script>
