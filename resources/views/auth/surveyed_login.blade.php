@extends('layouts.app')

@section('content')
<div class="contenedor">
    <div class="row">
                <div class="col-md-6">
            <div class="col-md-4 col-md-offset-4">
                <img src="/img/logos/UVM_Logo.png" alt="Cargando Logo UVM ..." class="img_UVM_logo">
            </div>
            </div>
            <div class="col-md-6">
            <div class="col-md-4 col-md-offset-4">
                <img src="/img/logos/Por_Ti.png" alt="Cargando Logo UVM ..." class="img_Por_ti_logo pull-right">
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                    <form class="form-horizontal" method="POST" action="/surveyed/validate">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for ="correo" class="col-md-4 control-label">Correo Electronico</label>
                                <input id="correo" type="email" class="form-control" value="" placeholder="Correo Electronico" required>
                                <br>
                            <label for="cuenta" class="col-md-4 control-label">Matricula</label>

                                <input id="cuenta" type="text"  class="form-control" name="cuenta" value="{{ old('email') }}" placeholder="Número Cuenta" required autofocus>
                                <input id="ruta"   type="hidden" name="ruta" value="{{$ruta}}"> 
                        </div>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary">
                                    Ingresar
                                </button>
                            </div>
                    </form>        
            </div>
    </div>
</div>
@endsection
