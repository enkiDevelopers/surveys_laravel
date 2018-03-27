@extends('layouts.app')
@section('content')
<div class="contenedor">
    <div class="background">
        <div class="col-md-8 col-md-offset-2">
            <section class="col-centered text-center">
                <img src="/img/logos/UVM_Logo.png" alt="Cargando Logo UVM ..." class="img_UVM_logo">
            </section>
        </div>
        <div class="col-md-3 pull-right" style="right: 19%">
            <img src="/img/logos/Por_Ti.png" alt="Cargando Logo UVM ..." class="img_Por_ti_logo pull-right">
        </div>
               
                    <form class="form-horizontal" method="POST" action="/directive/validate"> 
                        <div class="col-md-6 col-md-offset-1 form-container"> 
                        {{ csrf_field() }}

                        <div class=" col-md-12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-5  control-label text-black">Correo: </label><br><br>
                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control text-black" placeholder="Correo" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-5 control-label text-black" style="margin-left: 33px;">Contraseña</label><br><br>
                            <div class="col-md-10">
                                <input id="password" type="password" placeholder="Contraseña" class="form-control text-black-body" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>
                            <div class="col-md-8 col-md-offset-2" style="text-align: center;">
                                <button type="submit" class="btn btn-primary">
                                    Ingresar
                                </button>                         
                            </div>
                    </form>

    </div>
</div>

@endsection
