@extends('layouts.admin')
<script>
    
    window.onload = function() {
        $("#list-surveyed").addClass('active');
    }</script>
@section('content')
<link rel="stylesheet" type="text/css" href="/css/list.css">

<div class="container menu-margin" >
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-success text-center col-sm-11"> 
                <h3> LISTA DE ENCUESTADOS</h3>
            </div>
        </div>

        <div class="col-sm-6">
            <ol id="lista4" >
                <li class="responsive-card">
                    <table class="text-card">
                        <tr>
                            <td >
                                <img class="image-list" src="/img/icon.png">
                            </td>
                            <td>
                                Nombre:Jane Doe <br>
                                E-mail: jane.doe@foo.com<br>
                                Telefono: 01 800 2000<br>
                                Encuestas contestadas: 0<br>
                            </td>
                        </tr>
                    </table>
                </li>    
                <li class="responsive-card">
                    <table class="text-card">
                        <tr>
                            <td>
                                <img class="image-list" src="/img/icon.png">
                            </td>
                            <td>
                                Nombre:Jane Doe <br>
                                E-mail: jane.doe@foo.com<br>
                                Telefono: 01 800 2000<br>
                                Encuestas contestadas: 0<br>
                            </td>
                        </tr>
                    </table>
                </li>
                
                <li>
                    <table class="text-card">
                        <tr>
                            <td>
                                <img class="image-list" src="/img/icon.png">
                            </td>
                            <td>
                                Nombre:Jane Doe <br>
                                E-mail: jane.doe@foo.com<br>
                                Telefono: 01 800 2000<br>
                                Encuestas contestadas: 0<br></td>
                        </tr>
                    </table>
                </li>
                <li>
                    <table class="text-card">
                        <tr>
                            <td>
                                <img class="image-list" src="/img/icon.png">
                            </td>
                            <td>
                                Nombre:Jane Doe <br>
                               E-mail: jane.doe@foo.com<br>
                                Telefono: 01 800 2000<br>
                             Encuestas contestadas: 0<br>
                            </td>
                        </tr>
                    </table>
                </li>
            </ol>     
        </div>
    </div>
</div>
@endsection
