@extends('layouts.app')
@section('content')

<div class="contenedor">
    <div class="">
        <div class="col-md-8 col-md-offset-2">
            <section class="col-centered text-center">
                <img src="/img/logos/UVM_Logo.png" alt="Cargando Logo UVM ..." class="img_UVM_logo">
            </section>
            </div><br><br>
            <section>
                <img src="/img/logos/Por_Ti.png" alt="Cargando Logo UVM ..." class="img_Por_ti_logo pull-right">
            </section>
            <div class="col-md-6" style="margin-left: 5%;margin-right: 5%;">
            <form class="form-horizontal" method="POST" action="/administrator/validate">
                {{ csrf_field() }}
                <div class=" col-md-12 form-group{{ $errors->has('email') ? ' has-error' : ''  }}" style="margin-bottom: 7%">
                    <label for="email" class="col-md-5  control-label text-black">Correo: </label><br><br>
                    <div class="col-md-10">
                        <input id="email" type="email" class="form-control" placeholder="Correo" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-5 control-label text-black">Contraseña: </label><br><br>
                    <div class="col-md-10">
                    <input id="password" type="password" placeholder="Contraseña" class="form-control" name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Ingresar
                        </button>
                    </div>
                </div>
            </form>           
        </div>
    </div>
</div>
@endsection
