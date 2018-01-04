@extends('layouts.back-admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ">

            <div class="panel panel-default">
                <div class="panel-heading">Nuevo administrador</div>

                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Apellido</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Apellido">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Correo</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Correo">
                            </div>
                        </div>
                    <br>
                        <div class="form-group col-md-12">
                            <div class="col-sm-1  pull-right" >
                            <button type="submit" class="btn btn-info">Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>


<script>

    window.onload = function() {
        $("#home").addClass('active');
    }
</script>
@endsection
