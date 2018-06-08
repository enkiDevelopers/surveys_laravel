<?php 
    $i=1;
    $preguntas = unserialize($options);
    foreach ($preguntas as $cada) {
    $dato=$cada["questions"];
?>
<div class="well">
    <div class="row new-question-template" id="new-question-template">
        <div class="col-md-12 " value="<?php echo ($dato->type== 1 ? 'Abierta':($dato->type== 2 ? 'Opc. Múltiple':($dato->type== 3 ? 'Selec. Múltiple' : 'Otro Tipo')));?> ">
            <div class="col-md-1 num">
                <div class="form-group">
                    <label for="exampleInputEmail1">Número</label>
                    <input type="text" id="orden{{$dato->orden}}" readonly class="form-control-static form-control text-black-body numPregs" value="{{$dato->orden}}"/>
                </div>
            </div>
            <div class="col-md-6 text-question">
                <div class="form-group">
                    <label for="exampleInputEmail1">Título de la pregunta</label>
                    <input type="text" readonly class="form-control-static form-control text-black-body" id="{{$dato->id}}" value="{{$dato->title}}">
                </div>
            </div>
            <div class="col-md-3 type">
                <div class=" form-group">
                    <label for="exampleInputEmail1">Tipo</label>
                    <input type="text" readonly class="form-control-static form-control text-black-body" value="<?php 
                    echo ($dato->type== 1 ? 'Abierta':
                            ($dato->type== 2 ? 'Opc. Múltiple':
                            ($dato->type== 3 ? 'Selec. Múltiple' : 'Otro Tipo')));
                     ?> ">
                </div>
            </div>

<?php
    if($dato->type==1 || $dato->type==3){
?>
            <div class="col-md-2 salto">
               <label for="selectNumPregParent text-black-body">Salto: </label>
                <select  order="{{$dato->orden}}" id="{{$dato->id}}" class="form-control text-black-body selectNumPregParent">
                    <option value="N/A" selected disabled>{{$dato->salto}}</option>
                </select>                
            </div>
<?php 
    }
?>
            <div class="col-md-2 pull-right btn-control">
                <div class="row">
                    <button class="btn btn-info col-md-4  new-question__control new-question__control--edit-question"
                    id="{{$dato->id}}" designQuestion="{{$dato->design}}" typeQuestion="{{$dato->type}}" orden="{{$dato->orden}}" idTemplate= {{$eid}}>
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </button>
                    <button class="btn btn-danger col-md-4 new-question__control delete-question__control--delete-question" id="{{$dato->id}}" typeQuestion="{{$dato->type}}" orden="{{$dato->orden}}" idTemplate= {{$eid}}>
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
               </div>
            </div>
<?php
        if($dato->type==2){
            $opciones=$cada["options"];
            foreach ($opciones as $option) {
?>
            <div class="row yes-no-question-block" id="yes-no-question-template" >
                <div class="col-md-12" data-questions="0">
                    <div id="multi-options">
                        <div class="col-md-6 col-md-offset-1 titleOptions" data-multioptions="0">
                            <div class="form-group opcionesRespon" >
                                <label for="{{$option->id}}">Opción de la pregunta {{$dato->orden}}</label>
                                <input type="text" readonly class="form-control-static form-control text-black-body option" id="{{$option->id}}" value="{{$option->name}}" >
                            </div>
                        </div>
                        <div class="col-md-2 col-md-offset-1 pull-left selectRespon">                           
                           <label for="selectNumPreg text-black-body">Salto: </label>
                            <select order="{{$dato->orden}}" id="{{$dato->id}}" idOption="{{$option->id}}" class="form-control text-black-body selectNumPreg {{$dato->id}}">
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

<?php
        if($dato->type==3){
            $opciones=$cada["options"];
            foreach ($opciones as $option) {
?>
            <div class="row yes-no-question-block" id="yes-no-question-template" >
                <div class="col-md-12" data-questions="0">
                    <div id="multi-options">
                        <div class="col-md-6 col-md-offset-1 " data-multioptions="0">
                            <div class="form-group opcionesRespon" >
                                <label for="{{$option->id}}">Opción de la pregunta {{$dato->orden}}</label>
                                <input type="text" idOption="{{$option->id}}" readonly class="form-control-static form-control text-black-body option {{$dato->id}}" id="{{$option->id}}" value="{{$option->name}}" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php                   
            }
        }
?>

        </div>
    </div>
</div>
<?php
    } 
?>
