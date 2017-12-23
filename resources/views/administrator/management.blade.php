@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">&nbsp</div>
        <div class="col-md-4 ">
            <h3 class="text-cener">Administradores registrados</h3>
        </div>
        <div class="col-md-4 ">
            <a href="{{ url('/administrator/management/new') }}" class="btn btn-success">Nuevo</a>
        </div>
    </div>
   
    <div class="row">
        <div class="col-md-3 ">&nbsp</div>
        <div class="col-md-6">
            <table class="table table-bordered">
                <thead>
                
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Operación</th>
                    </tr>
                
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Administrador 1</td>
                        <td>Mi apellido</td>
                        <td>
                            <button class="btn btn-red">Dar de baja</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Administrador 2</td>
                        <td>Mi apellido</td>
                        <td>
                            <button class="btn btn-red">Dar de baja</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection