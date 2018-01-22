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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/administrator', function () {
    return view('administrator.home');
});

Route::get('/administrator/surveys/{id}', 'surveyController@show_cards');

Route::get('/administrator/surveys/new', function () {
    return view('administrator.new-survey');
});

Route::get('/surveyed', function () {
    return view('surveyed.home');
});

Route::get('/surveyed/solve', function () {
    return view('surveyed.solve-survey');
});

Route::get('/administrator/files', function () {
    return view('administrator.files');

});

Route::get('/administrator/file/open', function(){
	return view('administrator.openFile');
});

Route::get('/administrator/file/delete', function(){
	return view('administrator.delete');
});

Route::get('/administrator/exclude', function(){
	return view('administrator.exclude');
});

Route::get('/administrator/management', function(){
	return view('administrator.management');
});

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

Route::get('/surveyed/login', function(){
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
});
*/
Route::get('/administrator/edit/{id}/',["as" => "editar", "uses" => "editController@busqueda" ]);
Route::get('/administrator/delete/{id}/', "editController@delete" );

Route::get('/borrar', function(){
  return view("administrator.borrar");
});

Route::get('/administrator/surveys/preview',function(){
    return view("administrator.preview");
});

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

Route::get('/updateDataTemplate','surveyController@updateDataTemplate');
