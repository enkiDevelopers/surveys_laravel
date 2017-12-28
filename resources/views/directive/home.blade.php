@extends('layouts.directive')
	@section('content')

<div class="container" >
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-4">
                            Plantillas
                        </div>    
                        <div class="col-md-8 ">
                            <div class="row">
                                <div class="col-md-1">&nbsp</div>  
                                <div class="col-md-2 pull-right">
                                    Ver&nbsp&nbsp<span class="glyphicon glyphicon-eye-open"></span>
                                </div> 
                            </div>
                        </div>
                    </div>    
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card well" >
                                <div class="card-body">
                                    <h4 class="card-title">Primer Reporte </h4>
                                    <p class="card-text"></p><br><br><br>
                                    <div class="btn-group " role="group" aria-label="...">
                                        <a href="{{url('/directive/report')}}" type="button" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Reporte Uno">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card well" >
                                <div class="card-body">
                                    <h4 class="card-title">Segundo Reporte</h4>
                                    <p class="card-text"></p><br><br><br>
                                    <div class="btn-group " role="group" aria-label="...">
                                        <a href="{{url('/directive/report1')}}" type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Reporte Dos">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                    </div>
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