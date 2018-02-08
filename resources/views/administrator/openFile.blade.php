@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <br>
            <hr>
            <table class="table">
                <thead>
                <tr>
                    <th>email1</th>
                    <th>email2</th>
                    <th>email3</th>
                    <th>name</th>
                    <th>apPaterno</th>
                    <th>apMaterno</th>
                    <th>matricula</th>
                    <th>clave</th>

                </tr>
            </thead>
                <tbody>

            <?php
                foreach ($data as $info) {
            ?>
                    <tr>
                        <td><?php echo $info->email1 ?></td>
                        <td><?php echo $info->email2 ?></td>
                        <td><?php echo $info->email3 ?></td>
                        <td><?php echo $info->name ?></td>
                        <td><?php echo $info->apPaterno ?></td>
                        <td><?php echo $info->apMaterno ?></td>
                        <td><?php echo $info->matricula ?></td>
                        <td><?php echo $info->clave ?></td>
                    </tr>      

            <?php
                }

            ?>
                </tbody>

            </table>

        </div>
                
            </div>
    </div>
</div>
                      <!--  <div class="row new-question-template modal fade hide" aria-hidden="true" data-keyboard="false" data-backdrop="static" tabindex="-1" style="z-index: 1050;position: relative;" role ="dialog" aria-labelledby="myModalLabel1" id="new-question-template">
                            <div class="col-md-12 well modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Número</label>
                                        <select class="form-control questions-of-master-survey text-black-body">
                                            <!-- <option value="1">1</option>
                                            <option value="2">2</option> -->
                                      <!--  </select>
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
                                     <!--   </select>
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
                            </div>
                        </div>-->
@endsection

<script>
$(document).ready(function(){        
    $("#new-question-template").show();
    });
</script>