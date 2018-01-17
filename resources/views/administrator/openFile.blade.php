@extends('layouts.admin')
@section('content')

        <div>
                        <div class="col-md-10 col-sm-12  light-grey">
                            <h2 class="text-center">Plantilla de Encuesta</h2>
                        </div>
                        <div class="col-md-10" style="margin-top:10px;">
                            <center>
                                <img src="img/iconos/default.jpg" width="10%" height="10%"> 
                            </center>
                        </div>
                        <div class="col-md-10 col-sm-12  " style="width:100%;">
                            <div class="form-group" style="position: fixed;"></div>
                            <label for="exampleInputEmail1" >Título de la encuesta</label>
                        </div>
                        <div class="col-md-10" style="margin-top: 5px;margin-bottom:15px;">
                            <input type="text" class="form-control text-black" disabled id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Titulo de la Encuesta" >
                        </div>
                        <div class="col-md-10 col-sm-12 " style="width:100%;">
                            <div class="form-group" style="position: fixed;"></div>
                            <label for="exampleInputEmail1" >Descripión de la encuesta</label>
                        </div>
                        <div class="col-md-10" style="margin-top: 5px;">
                            <textarea rows="2" cols="50" class="form-control text-black" disabled id="inputDesc" aria-describedby="desc" placeholder="Descripción"> </textarea>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-9 "></div>
                                <div class="col-md-3 pull-right" style="margin-top:10px;">
                                    <a data-toggle="modal" data-target="#ModalTitle" class="btn btn-info">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                </div>
                       </div>
                        <div class="row col-md-12">
                            <div class=" new-survey__controls " > <center>
                                <div class="col-md-4 pull-left col-md-offset-3 ">
                                    <button class="btn btn-success new-survey__control "  onclick="ModalQuestion();" id="add-question">Agregar pregunta</button>
                                </div>
                                <div class="col-md-1 pull-left">
                                    <a href="" class="btn btn-success">
                                        <span class=" glyphicon glyphicon-eye-open "></span>
                                    </a>
                                </div>
                             </center>
                            </div>
                        </div>
        </div>
<form action="/saveQuestionsTemplate" id="saveQuestionForm" method="post">
    
                  {{ csrf_field() }}
                  <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

        <div class="row new-question-template " id="new-question-template">
                <div aria-hidden="true" data-keyboard="false" data-backdrop="static" tabindex="-1" style="position: fixed;z-index: 1070;" class="modal fade" id="ModalQuestion" role="dialog" aria-labelledby="ModalQuestionLabel" >
                    <div class="modal-dialog" role="document" style="width: 825px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="ModalQuestionLabel">Agregar Pregunta</h4>
                                <img src="https://www.mathworks.com/content/mathworks/www/en/solutions/verification-validation/jcr:content/svg.adapt.full.high.svg/1507664300553.svg" width="10%" height="10%">
                        </div>
                        <div class="modal-body">
                            <div class=" col-md-12 well">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Número</label>
                                            <select class="form-control questions-of-master-survey text-black-body"></select>
                                        </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="questionInput">Título de la pregunta</label>
                                        <input type="text" class="form-control text-black-body" id="questionInput" aria-describedby="emailHelp" placeholder="¿Cual es la pregunta?">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" form-group">
                                        <label for="questionType">Tipo</label>
                                            <select class="form-control yes-no-question text-black-body" id="questionType">
                                                <option value="1">Pregunta abierta</option>
                                                <option value="2">Pregunta de opción multiple </option>
                                            </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                         <div class="row">
                            <div class="col-md-12 pull-right">
                                <button class="btn btn-danger col-md-1 pull-right new-question__control new-question__control--add-question" onclick="saveQuestion();">
                                    <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>
                                </button>
                                <button class="btn btn-info col-md-1 pull-right new-question__control new-question__control--delete-question" >
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
@endsection

<script>

    function ModalQuestion(){
        $("#ModalQuestion").appendTo('body').modal();
    }    
    function saveQuestion(){

        var action = document.getElementById("saveQuestionForm").action;
        var questionInput = $("#questionInput").val();
        var questionType = $("#questionType").val();
        var token = $("#token").val();

       $.ajax({
        type: "post",
        headers: {'X-CSRF-TOKEN': token},
        url: action,
        datatype: json,
        data: {questionInput: questionInput, questionType: questionType },
        success: function(data) {
          if (data == 1) {
            alert("Se ha agregado la pregunta");

          }else{
            alert("No se ha podido agregar la pregunta :C");
          }
        },
         error: function (textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
      });
    }
</script>