@extends('layouts.app')

@section('content')
<div class="contenedor">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <section class="col-centered text-center">
                <img src="/img/logos/UVM_Logo.png" alt="Cargando Logo UVM ..." class="img_UVM_logo">
            </section>
            </div><br><br>
            <section>
                <img src="/img/logos/Por_Ti.png" alt="Cargando Logo UVM ..." class="img_Por_ti_logo pull-right">
            </section>
            <div class="col-md-6" style="margin-left: 5%;margin-right: 5%;">
                    <form class="form-horizontal" method="POST" action="/surveyed/validate">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Número Cuenta:</label>
                            <div class="col-md-6">
                                <input id="cuenta" type="text" class="form-control" name="cuenta" value="{{ old('email') }}" placeholder="Número Cuenta" required autofocus>
                                <input id="ruta" type="hidden" name="ruta" value="{{$ruta}}"> 
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                     


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                
                            </div>
                        </div>
                    </form>        
        </div>
    </div>
</div>
@endsection
