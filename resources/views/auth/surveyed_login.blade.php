@extends('layouts.app')
@section('content')
<div class="contenedor">
        <div class="col-md-8 col-md-offset-2">
            <section class="col-centered text-center">
                <img src="/img/logos/UVM_Logo.png" alt="Cargando Logo UVM ..." class="img_UVM_logo">
            </section>

            </div>
<<<<<<< HEAD
            <div class="col-md-3 pull-right" style="right: 19%;">
=======

            <div class="col-md-4 pull-right" style="margin-right: 16%;">
>>>>>>> 7fcdcd005c910765f8f758d481ceb745027b889f
                <img src="/img/logos/Por_Ti.png" alt="Cargando Logo UVM ..." class="img_Por_ti_logo pull-right">

            </div>

            <form class="form-horizontal" method="POST" action="/surveyed/validate">
                <div class="col-md-6 col-md-offset-1 form-container">
                        {{ csrf_field() }}               
                <div class="col-md-12 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="cuenta" class="col-md-5 control-label text-black" style="margin-left: 17px;">Matrícula: </label><br><br>
                    <div class="col-md-10">
                    <input id="cuenta" type="text" placeholder="Número Cuenta" class="form-control text-black-body" name="cuenta" required autofocus="true">
                    <input id="ruta"   type="hidden" name="ruta" value="{{$ruta}}"> 
                    </div>
                </div>

                <div class=" col-md-12 form-group{{ $errors->has('email') ? ' has-error' : ''  }}">
                    <label for="correo" class="col-md-5  control-label text-black">Correo: </label><br><br>
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
                    <div class="col-md-2 col-md-offset-5">
                        <button type="submit" class="btn btn-primary">
                            Ingresar
                        </button>
                    </div>

                    </form>        
            </div>
</div>

@endsection
