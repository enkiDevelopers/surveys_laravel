<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css')}}">
  </head>
  <body>
    <div class="flex-center position-ref -height">
      @if (Route::has('login'))
        <div class="top-right links">
        @auth
          <a href="{{ url('/home') }}">Home</a>
      @else

        <div class="container full-screen">
          <div class="row row-centered pos">
            <section class="col-centered text-center">
              <img src="/img/logos/UVM_Logo.png" alt="Cargando Logo UVM ..." class="img_UVM_logo">
            </section>
            <section class="col-lg-12 col-xs-12 col-centered text-center">
              <img src="/img/logos/Por_Ti.png" alt="Cargando Logo Por Ti ..." class="img_Por_ti_logo">
            </section>
            <article class="col-lg-4 col-xs-12 col-centered padding-card-welcome">
              <div class="cards card-administrador" onclick="admin();">
                <span class="glyphicon glyphicon-cog icon"></span>
                <h2 class="title title-administrador"> ADMINISTRADOR </h2>
              </div>
            </article>
            <article class="col-lg-4 col-xs-12 col-centered padding-card-welcome">
              <div class="cards card-lider" onclick="lider();">
                <span class="glyphicon glyphicon-bookmark icon"></span>
                <center>  <h2 class="title"> LÍDER </h2> </center>
              </div>
            </article>
            <article class="col-lg-4 col-xs-12 col-centered padding-card-welcome">
              <div class="cards card-encuestado" onclick="encuestado();"><span class="glyphicon glyphicon-screenshot icon"></span>
                <h2 class="title "> ENCUESTADO </h2>
              </div>
            </article>
          </div>
        </div>
        @endauth
            </div>
        @endif
    </div>

  <script>
    function admin(){
      location.href= "{{url('/administrator/login')}}";
    }
    function lider(){
      location.href= "{{url('/directives/login')}}";
    }
    function encuestado(){
      location.href= "{{url('/surveyeds/login/sistema')}}";
    }
  </script>
  </body>
</html>
