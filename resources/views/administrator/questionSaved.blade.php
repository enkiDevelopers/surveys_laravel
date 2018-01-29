<?php foreach ($datos as $datos) { ?>
    <div class="row new-question-template" id="new-question-template">
        <div class="col-md-12 well">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1">Número</label>
                    <input type="text" class="form-control text-black-body numPregs"  aria-describedby="emailHelp" value="<?php echo $datos->order;?>" disabled>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="form-group">
                    <label for="exampleInputEmail1">Título de la pregunta</label>
                    <input type="text" class="form-control text-black-body" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $datos->title;?>" disabled>
                </div>
            </div>
            <div class="col-md-4">
                <div class=" form-group">
                    <label for="exampleInputEmail1">Tipo</label>
                    <input type="text" class="form-control text-black-body" aria-describedby="emailHelp" value="<?php echo ($datos->type==1?'Pregunta Abierta':'Opción Múltiple');?>" disabled>
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
<?php } ?>
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
                </div>
            </div>
        </div>
    </div>
