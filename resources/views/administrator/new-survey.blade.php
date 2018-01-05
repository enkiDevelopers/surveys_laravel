@extends('layouts.back-survey')
@section('content')


<div class="container" style="position: fixed; margin-left: 270px; height: 95%;">
    <div class="row">
        <div class="col-md-11">
        <!-- Modal publicar encuesta-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Publicar encuesta - Titulo de la encuesta</h4>
                </div>
                <div class="modal-body">
                <div class="input-daterange input-group" id="datepicker" data-provide="datepicker">
                    <input type="text" class="input-sm form-control" name="start" placeholder="Inicio"/>
                    <span class="input-group-addon">a</span>
                    <input type="text" class="input-sm form-control" name="end" placeholder="Final"/>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" >Publicar</button>
                </div>
                </div>
            </div>
        </div>

<div class="row">
    <div class="col-md-12 ">

        <div class="">
            <div class="col-md-9 col-sm-12  light-grey" style="width:100%;">
                <h2 class="text-center">Nueva encuesta</h2>
            </div>
            <div class="col-md-9 col-sm-12  light-grey" style="width:100%;">
                <form>
                      <div class="form-group" style="position: fixed;">
                      </div> <label for="exampleInputEmail1">Titulo de la encuesta</label>
                      </div>
                      <div class="col-md-9" style="margin-top: 20px;">
                      <input type="text" class="form-control text-black" disabled id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Titulo de la Encuesta">
                      </div>
                      <div class="col-md-9" style="margin-top: 20px;">
                      <textarea rows="2" cols="50" class="form-control text-black" disabled id="inputDesc" aria-describedby="desc" placeholder="Descripción de la Encuesta"></textarea>
                      </div><br><br> <div class="col-md-1"></div>

                      <div class="col-md-2 pull-left" style="margin-top:-40px;">
                          <a data-toggle="modal" data-target="#ModalTitle" class="btn btn-info">
                              <span class="glyphicon glyphicon-pencil"></span>
                          </a>
                          <a href="" class="btn btn-success" >
                              <span class=" glyphicon glyphicon-eye-open "></span>
                          </a>
                          <div class=" new-survey__controls" style="margin-top: 20px;margin-left: -30px;" >
                            <div class="">
                                <button class="btn btn-success col-md-11 new-survey__control disabled" id="add-question">Agregar pregunta</button>
                            </div>
                           </div>
                      </div> <br /><br /><br /><br /><br />
    <div class="new-survey__question-container"  style="position: fixed; overflow: auto; height: 70%; width:75%; margin-top: 100px;">




                        </div>
                        <div class="row new-satisfaction-question-template hide" id="satisfaction-question-template">
                            <div class="col-md-12 well">

                                <div class="row">
                                    <div class="col-md-1"><input type="radio" > 1</div>
                                    <div class="col-md-1"><input type="radio" > 2</div>
                                    <div class="col-md-1"><input type="radio" > 3</div>
                                    <div class="col-md-1"><input type="radio" > 4</div>
                                    <div class="col-md-1"><input type="radio" > 5</div>
                                    <div class="col-md-1"><input type="radio" > 6</div>
                                    <div class="col-md-1"><input type="radio" > 7</div>
                                    <div class="col-md-1"><input type="radio" > 8</div>
                                    <div class="col-md-1"><input type="radio" > 9</div>
                                    <div class="col-md-2"><input type="radio" > 10</div>
                                </div>

                            </div>
                        </div>

                        <div class="row new-question-template hide" id="new-question-template">
                            <div class="col-md-12 well">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Número</label>
                                        <select class="form-control questions-of-master-survey text-black-body">
                                            <!-- <option value="1">1</option>
                                            <option value="2">2</option> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Título de la pregunta</label>
                                        <input type="text" class="form-control text-black-body" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="¿Cual es la pregunta?">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" form-group">
                                        <label for="exampleInputEmail1">Tipo</label>
                                        <select class="form-control yes-no-question text-black-body">
                                            <option value="1">Pregunta abierta</option>
                                            <option value="2">Pregunta de opción Multiple </option>
  <!--                                          <option value="3">Pregunta de satisfacción</option> -->
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2 pull-right" style="margin-bottom: 15px;">
                                    <div class="row">
                                        <button class="btn btn-info col-md-4  new-question__control new-question__control--edit-question">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </button>
                                        <button class="btn btn-danger col-md-4 new-question__control new-question__control--delete-question">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row hide yes-no-question-block " id="yes-no-question-template">
                            <div class="col-md-12 well" data-questions="0" id="childSupport">
                                <div class="btn-group btn-group-xs pull-right" role="group" aria-label="...">
                                    <button class="btn btn-success add-question-to-yes-no">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    </button>
                                </div>

                                <div class="col-md-12 well" id="multi-options">
                                    <div class="col-md-6 " data-multioptions="0">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Opción Respuesta</label>
                                            <input type="text" class="form-control text-black-body" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="¿Cual es la pregunta?">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Redirigir a Pregunta:</label>
                                            <select class="form-control number-questions-survey text-black-body" id="idOfSelect"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </form>
            </div>
                <!-- <div class="col-md-1">&nbsp</div> -->

            </div>
    </div>
</div>
</div>
</div>
</div>




          <div class="modal fade" id="ModalTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static" tabindex="-1" style="z-index: 1050;" role ="dialog" aria-labelledby="myModalLabel1">
            <div class="modal-dialog" role="document">
<form method="post" action="/save">
            {{ csrf_field() }}
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onclick="window.history.back();" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel1">Datos Principales de la encuesta</h4>
                </div>
                <div class="modal-body">
                    <h5>Titulo de la encuesta:</h5>
<input type="text" class="form-control text-black " id="ModalTitleInput" name="titulo" aria-describedby="emailHelp" placeholder="Ingrese el titulo "><br>
                    <h5> Descripcición de la encuesta:</h5>
<textarea class="form-control text-black" cols="10" rows="5" id="ModalDescInput" name="descripcion" aria-describedby="desc" placeholder="Ingrese la Descripción "></textarea>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.history.back();">Cancelar</button>
                    <button type="submit" class="btn btn-primary" onclick="publish();" >Publicar</button>
                </div>


                </div>
</form>
            </div>
        </div>


<script>



    window.onload = function() {
        $("#home").addClass('active');
        $('#ModalTitle').modal();

    }

    function verificar(){
        if ($("#exampleInputEmail1").val() != "") {
            $("#add-question").removeClass('disabled');
        }else{

        }
    }

    function publish(){
        if ($("#ModalTitleInput").val() != "" && $("#ModalTitleInput").val() != " " && $("#ModalDescInput").val() != "" && $("#ModalDescInput").val() != " ") {
            $("#exampleInputEmail1").val($("#ModalTitleInput").val());
            $("#inputDesc").val($("#ModalDescInput").val());
            $("#ModalTitle").modal('hide');
            verificar();

        }else{
            alert("Ingrese un Título para la encuesta");
        }

    }
</script>
@endsection
