<?php 
    $i=1;
    $preguntas = unserialize($options);
    foreach ($preguntas as $cada) {
    $dato=$cada["questions"];
?>
    <div class="row new-question-template" id="new-question-template">
        <div class="col-md-12 well">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1">Número</label>
                    <input type="text" id="orden{{$dato->orden}}" readonly class="form-control-static form-control text-black-body numPregs" value="{{$dato->orden}}"/>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="form-group">
                    <label for="exampleInputEmail1">Título de la pregunta</label>
                    <input type="text" readonly class="form-control-static form-control text-black-body title" id="{{$dato->id}}" value="{{$dato->title}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class=" form-group">
                    <label for="exampleInputEmail1">Tipo</label>
                    <input type="text" readonly class="form-control-static form-control text-black-body" value="<?php echo ($dato->type==1?'Pregunta Abierta':'Opción Múltiple');?>">
                </div>
            </div>
<?php
        if($dato->type==2){
            $opciones=$cada["options"];
            foreach ($opciones as $option) {
?>
            <div class="row yes-no-question-block" id="yes-no-question-template">
                <div class="col-md-12" data-questions="0">
                    <div class="col-md-12" id="multi-options">
                        <div class="col-md-6 " data-multioptions="0">
                            <div class="form-group">
                                <label for="{{$option->id}}">Opción de la pregunta {{$dato->orden}}</label>
                                <input type="text" readonly class="form-control-static form-control text-black-body option" id="{{$option->id}}" value="{{$option->name}}" >
                            </div>
                        </div>
                        <div class="col-md-4  pull-right">                           
                           <label for="selectNumPreg text-black-body">Redireccionar a: </label>
                            <select order="{{$dato->orden}}" id="{{$dato->id}}" idOption="{{$option->id}}" class="form-control text-black-body selectNumPreg">
                                <option value="N/A" selected disabled>{{$option->salto}}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
<?php                   
            }
        }
?>
            <div class="col-md-2 pull-right btn-control" style="margin-bottom: 15px;">
                <div class="row">
                    <button class="btn btn-info col-md-4  new-question__control new-question__control--edit-question"
                    id="{{$dato->id}}" typeQuestion="{{$dato->type}}" orden="{{$dato->orden}}" idTemplate= {{$eid}}>
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </button>
                    <button class="btn btn-danger col-md-4 new-question__control delete-question__control--delete-question" id="{{$dato->id}}" typeQuestion="{{$dato->type}}" orden="{{$dato->orden}}" idTemplate= {{$eid}}>
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </div>

        </div>
    </div>
<?php
    } 
?>
