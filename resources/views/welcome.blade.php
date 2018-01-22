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
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else

                    <div class="container full-screen">
                      <div class="row row-centered pos">
                      <section class="col-lg-12 col-xs-12 col-centered">
                        <h1 class="title">Bienvenido</h1>
                        <hr/>
                        <div class="col-xs-8 col-xs-offset-2">
                          <p class="lead text-center"> Una breve descripcion de la página web</p>
                          <hr/>
                        </div>
                      </section>
                      <div class="">
                        <article class="col-lg-4 col-xs-12 col-centered padding-card-welcome">
                          <div class="cards card-directive"><span class="glyphicon glyphicon-briefcase icon"></span>
                            <hr class="divider"/>
                            <h2 class="title"> Directivo </h2>
                            <div class="info">
                              <hr class="divider"/>
                              <p class="lead">Ingresa para visualizar los reportes que las encuestas han generado.</p><a href="{{('/directives/login')}}" class="btn btn-lg center-block">Iniciar Sesión !</a>
                            </div>
                          </div>
                        </article><br><br>
                        <article class="col-lg-4 col-xs-12 col-centered padding-card-welcome">
                          <div class="cards card-alumno"><span class="glyphicon glyphicon-bookmark icon"></span>
                            <hr class="divider"/>
                            <h2 class="title">Alumno  </h2>
                            <div class="info">
                              <hr class="divider"/>
                              <p class="lead">Comienza a realizar encuestas. </p><a href="{{('/surveyed/login')}}" class="btn btn-lg center-block">Empieza !</a>
                            </div>
                          </div>
                        </article>
                        <article class="col-lg-4 col-xs-12 col-centered padding-card-welcome">
                          <div class="cards card-administrador"><span class="glyphicon glyphicon-cog icon"></span>
                            <hr class="divider"/>
                            <h2 class="title">Administrador</h2>
                            <div class="info">
                              <hr class="divider"/>
                              <p class="lead">Empieza a generar encuestas, gestionar a los usuarios, etc.</p><a href="{{('/login')}}" class="btn btn-lg center-block">Iniciar Sesión</a>
                            </div>
                          </div>
                        </article>
                      </div>
                      </div>
                    </div>    
                    @endauth
                </div>
            @endif

        </div>
    </body>
</html>
