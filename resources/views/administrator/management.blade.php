@extends('layouts.admin')
@section('content')


 <link rel="stylesheet" href="/css/normalize.css">
<link rel="stylesheet" href="/css/style.css">
<div class="menu-margin">
  <div style="height: 20px;">

  </div>
    <div class="row">

        <div class="col-md-4 ">

        </div>
        <div class="col-md-4 ">
            </div>
    </div>

    <div class="row">



          <div class="table-users">
         <div class="header">Administradores registrados <a href="{{ url('/administrator/management/new') }}"
            class="btn btn-primary pull-right">
                         <span class="glyphicon glyphicon-plus"></span> Añadir
                     </a></div>

         <table cellspacing="0">
            <tr>
               <th class="text-center">Imagen</th>
               <th class="text-center">Nombre</th>
               <th class="text-center">E-mail</th>
               <th class="text-center">Telefono</th>
               <th class="text-center" width="230">Acciones</th>
            </tr>

            <tr>
               <td><img src="http://lorempixel.com/100/100/people/1" alt="" /></td>
               <td>Jane Doe</td>
               <td>jane.doe@foo.com</td>
               <td>01 800 2000</td>
               <td>

                 <input type="button" class="btn btn-info" value="Dar de baja" style="width: 180px;margin-bottom: 10px;" >
                 
               </td>
            </tr>

            <tr>
               <td><img src="http://lorempixel.com/100/100/sports/2" alt="" /></td>
               <td>John Doe</td>
               <td>john.doe@foo.com</td>
               <td>01 800 2000</td>
               <td>
                 <input type="button" class="btn btn-info" value="Dar de baja" style="width: 180px;margin-bottom: 10px;" >
                  

               </td>
            </tr>

            <tr>
               <td><img src="http://lorempixel.com/100/100/people/9" alt="" /></td>
               <td>Jane Smith</td>
               <td>jane.smith@foo.com</td>
               <td>01 800 2000</td>
               <td>  <input type="button" class="btn btn-info" value="Dar de baja" style="width: 180px;margin-bottom: 10px;" >
                 
</td>
            </tr>

            <tr>
               <td><img src="http://lorempixel.com/100/100/people/3" alt="" /></td>
               <td>John Smith</td>
               <td>john.smith@foo.com</td>
               <td>01 800 2000</td>
               <td>
                 <input type="button" class="btn btn-info" value="Dar de baja" style="width: 180px;margin-bottom: 10px;" >
                  
               </td>
            </tr>
         </table>
      </div>



    </div>
</div>
@endsection
