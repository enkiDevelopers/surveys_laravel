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
                    <input type="text" class="form-control text-black-body numPregs"  aria-describedby="emailHelp" value=" {{$dato->order}}" disabled />
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="form-group">
                    <label for="exampleInputEmail1">Título de la pregunta</label>
                    <input type="text" class="form-control text-black-body" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$dato->title}}" disabled>
                </div>
            </div>
            <div class="col-md-4">
                <div class=" form-group">
                    <label for="exampleInputEmail1">Tipo</label>
                    <input type="text" class="form-control text-black-body" aria-describedby="emailHelp" value="<?php echo ($dato->type==1?'Pregunta Abierta':'Opción Múltiple');?>" disabled>
                </div>
            </div>
<?php
    if($dato->type==2){
        $opciones=$cada["options"];
        foreach ($opciones as $option) {
?>
    <div class="row  yes-no-question-block " id="yes-no-question-template">
        <div class="col-md-12" data-questions="0" id="childSupport">
            <div class="col-md-12" id="multi-options">
                <div class="col-md-6 " data-multioptions="0">
                    <div class="form-group">
                        <label for="{{$option->id}}">Opción de la pregunta {{$dato->order}}</label>
                        <input type="text" class="form-control text-black-body" id="{{$option->id}}" placeholder="¿Cual es la pregunta?" value="{{$option->name}}" disabled="true">
                        <input id="{{$i}}salto{{$option->id}}" type="text" class="form-control text-black-body" name="salto" value="{{$option->salto}}">
                        <select name="" id=""></select>

                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </div>
<?php                   
        }
    }
?>
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
<?php
} 
?>
