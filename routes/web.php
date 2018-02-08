<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/administrator/login',function () {
    return view('auth.login');})->name("adminLogin");

Route::post('/administrator/validate', 'iniciarSesion@ldap');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/administrator', 'iniciarSesion@validar')->name('adminHome');

Route::get('/administrator/surveys/', 'surveyController@show_cards');
Route::post('/administrator/reminderSend', 'surveyController@send');

Route::get('/administrator/surveys/new', function () {
    return view('administrator.new-survey');
});

Route::post('/administrator/surveys/reminder/', 'surveyController@reminder');

Route::get('/surveyed/solve', function () {
    return view('surveyed.solve-survey');
});
//
Route::get('/surveyed/{matricula}','responderController@presentacion');
Route::get('/completo/{matricula}','responderController@completo');


Route::post("/administrator/publicar/encuesta","encuestadosController@publicar");
Route::get('/administrator/files/', 'encuestadosController@showList');

Route::get('/administrator/file/open', function(){
	return view('administrator.openFile');
});

Route::get('/administrator/files/delete/{id}', "encuestadosController@deletelist") ;
Route::post('/administrator/duplicar/plantilla',"surveyController@duplicar");
Route::get('/administrator/showcards/', 'surveyController@ajaxshowcards');

Route::get('/administrator/exclude', function(){
	return view('administrator.exclude');
});

Route::get('/administrator/management', 'userController@show' );

Route::get('/administrator/management/new', function(){
	return view('administrator.new-administrator');
});

Route::get('/directive/{id}/', ['as' => 'directive', 'uses'=>'directiveController@show_cards']);

//Route::post('/directive', 'directiveController@show_cards');

Route::get('/directive/report', function(){
    return view('directive.report');
});

Route::get('sendemail', function(){
    $data=array(
        'name' => "Bienvenido a la plataforma de encuestas Enki",
    );

    Mail::send('emails.welcome', $data, function($message){

        $message->from('enkidevelopers@gmail.com', 'Enki Developers');

        $message->to('jclopezpimentel@gmail.com')->subject('Correo de Bienvenida');

    });

    return "Email enviado correctamente!";

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/directives/login', function(){
    return view('auth.directive_login');
});

Route::get('/surveyeds/login', function(){
    return view('auth.surveyed_login');
});

Route::get('/directive/report1', function(){
    return view('directive.report1');
});

Route::get('/root', function(){
    return view('root.home');
});


Route::get('/root/new', function(){
    return view('root.new-administrator');
});

Route::get('/administrator/surv-list', function(){
    return view('administrator.surveyed-list');
});

Route::get('/config',function(){
  return view('root.config');
});

Route::post('/save', 'surveyController@save');

/*Route::get('/administrator/edit',function(){
    return view ('administrator.edit');
});*/

Route::get('/administrator/edit/{id}/',["as" => "editar", "uses" => "editController@busqueda" ]);

Route::get('/administrator/delete/', "editController@delete" );
Route::get('/administrator/consultar/publicaciones', 'encuestadosController@consultar');

//ruta editar
Route::get('/administrator/edit/{id}/',["as" => "editar", "uses" => "editController@busqueda" ]);


Route::get('/borrar', function(){
  return view("administrator.borrar");
});


Route::get('administrator/surveys/preview', function(){
    return view("administrator.preview");
});

Route::get('/administrator/previewtem/{id}/',["as" => "previewtem", "uses" => "previewtemController@busqueda" ]);
Route::get("/administrator/consultar/publicaciones" ,"encuestadosController@consultar");

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::post('busquedamodal', 'directiveController@buscar');

Route::post('/saveQuestionsTemplate','questionsTemplateController@saveQuestionsTemplate');

Route::get('/administrator/saveQuestionsSection', function(){
    return view("administrator.saveQuestionsSection");
});

Route::get('/administrator/modalTitle', function(){
    return view("administrator.modalTitle");
});

Route::get('/administrator/questionSaved','questionsTemplateController@questionSaved');

/*Route::get('/administrator/questionSaved', function(){
    $datos = App\questionstemplates::where('templates_idTemplates','=','49')->get()->toJson();
    $datos =Response::Json($datos);
    dd($datos);
});
*/
Route::get('/administrator/dataTemplate', function(){
    return view("administrator.dataTemplate");
});

Route::post('buscarcampus', 'directiveController@busquedacampus');

Route::get('/campus/{id}/{idcampus}', ['as' => 'campus', 'uses'=>'directiveController@estadisticaCampus']);

Route::get('/updateDataTemplate','surveyController@updateDataTemplate');

Route::get('/region/{id}/{idcampus}', ['as' => 'region', 'uses'=>'directiveController@estadisticasRegion']);

Route::get('/general/{id}', ['as' => 'general', 'uses'=>'directiveController@estadisticasGeneral']);

Route::post('/conectar', 'conexionController@conexion');

Route::get('/surveyed/previewtem/{id}/',["as" => "previewtem", "uses" => "responderController@busqueda" ]);

Route::post('pdf', 'directiveController@generarPdf');

Route::post('/administrator/addSalto/','questionsTemplateController@addSalto');

Route::post('/administrator/deleteQuestion','questionsTemplateController@deleteQuestion');

Route::post('/guardar',['as'=>'guardar' , 'uses'=> 'responderController@guardarencuesta']);

Route::get('/administrator/modalQuestionEdit', function(){
    return view("administrator.modalQuestionEdit");
});

Route::post('/administrator/editQuestion/','questionsTemplateController@editQuestion');

Route::get('/enviar', 'encuestadosController@enviar');

Route::post('/administrator/editEliminarQuestion/','questionsTemplateController@editEliminarQuestion');

Route::get('contestado',function(){
    return view("administrator.encuestacontestada");
});
Route::post('/administrator/deleteOptions/', 'questionsTemplateController@deleteOptions');

Route::post('/administrator/updateOrderQuestion', 'questionsTemplateController@updateOrderQuestion');
