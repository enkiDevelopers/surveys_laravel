@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                <h3 class="text-center">Titulo de la encuesta</h3>

                <div class="row">
                    <div class="col-md-2">&nbsp</div>
                    <div class="col-md-8 offset-md-2">
                    
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pregunta 1</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Respuesta">
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pregunta 2</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Respuesta">
                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Pregunta 3</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Respuesta">
                                
                            </div>
                    
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection