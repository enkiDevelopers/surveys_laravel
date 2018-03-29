@extends('layouts.app')
@section('content')

<div class="contenedor">
        <div class="col-md-8 col-md-offset-2">
            <section class="col-centered text-center">
                <img src="/img/logos/UVM_Logo.png" alt="Cargando Logo UVM ..." class="img_UVM_logo">
            </section>
        </div>
        <div class="col-md-3 pull-right" style="right: 19%;">
            <img src="/img/logos/Por_Ti.png" alt="Cargando Logo UVM ..." class="img_Por_ti_logo pull-right">
        </div>

            <form class="form-horizontal" method="POST" action="/surveyed/validate">
                <div class="col-md-7 col-md-offset-2 form-container">
                        {{ csrf_field() }}               
                <div class="col-md-12 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="cuenta" class="col-md-5 control-label text-black">Matrícula: </label>
                    <div class="col-md-10">
                    <input id="cuenta" type="text" placeholder="Número Cuenta" class="form-control text-black-body" name="cuenta" required autofocus="true">
                    <input id="ruta" type="hidden" name="ruta" value="{{$ruta}}"> 
                    </div>
                </div>

                <div class=" col-md-12 form-group{{ $errors->has('email') ? ' has-error' : ''  }}">
                    <label for="correo" class="col-md-5  control-label text-black">Correo: </label>
                    <div class="col-md-10">
                        <input id="correo" type="email" class="form-control" value="" placeholder="Correo Electronico" required>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                </div>
                    <div class="col-md-8 col-md-offset-2 form-button-login">
                        <button type="submit" class="btn btn-primary">
                            Ingresar
                        </button>
                    </div>

                    </form>        
            </div>
</div>

@endsection
