@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">&nbsp</div>
        <div class="col-md-4 ">
            <h3 class="text-center">Administradores registrados</h3>
        </div>
        <div class="col-md-4 ">
            <p>
                <a href="{{ url('/administrator/management/new') }}" class="btn btn-info btn-lg">
                    <span class="glyphicon glyphicon-plus"></span> Añadir 
                </a>
            </p>  
        </div>
    </div>
   
    <div class="row">
        <div class="col-md-3 ">&nbsp</div>
        <div class="col-md-6">
            <table class="table table-bordered">
                <thead>
                
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Operación</th>
                    </tr>
                
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Administrador 1</td>
                        <td>Mi apellido</td>
                        <td>micorreo@gmail.com</td>
                        <td>
                            <button class="btn btn-red ">Dar de baja</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Administrador 2</td>
                        <td>Mi apellido</td>
                        <td>micorreo2@gmail.com</td>
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