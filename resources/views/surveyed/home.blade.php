@extends('layouts.surveyed')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Encuestas Pendientes</div>

                <div class="panel-body ">
                  <div class="row">
                        <div class="col-md-2">
                            <div class="card well" >
                                <img class="card-img-top" src="..." alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Titulo de la encuesta</h4>
                                    <p class="card-text"></p>
                                    <a  class="btn btn-red" href="#" disabled>Expirada</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="card well">
                                <img class="card-img-top" src="..." alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Titulo de la encuesta</h4>
                                    <p class="card-text"></p>
                                    <a href="{{ url('/surveyed/solve') }}" class="btn btn-red">Responder</a>
                                </div>
                            </div>
                        </div>
                        
                  </div>
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">Encuestas Realizadas</div>

                <div class="panel-body">
                  <div class="row">
                        <div class="col-md-2">
                            <div class="card well" >
                                <img class="card-img-top" src="..." alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Titulo de la encuesta</h4>
                                    <p class="card-text"></p>
                                    <a href="#" class="btn btn-primary">Ver encuesta</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="card well">
                                <img class="card-img-top" src="..." alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Titulo de la encuesta</h4>
                                    <p class="card-text"></p>
                                    <a href="#" class="btn btn-primary">Ver encuesta</a>
                                </div>
                            </div>
                        </div>
                        
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection