@extends('layouts.administrator')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">

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
                    
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Contraseña</label>
                            <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Contraseña">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Descripción</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Descripción">
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-info">Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

          
        </div>
    </div>
</div>
@endsection