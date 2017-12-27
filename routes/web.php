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
Route::get('/administrator/surveys', function () {
    return view('administrator.surveys');
});

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

Route::get('/directive/report', function(){
    return view('directive.report');
});

Route::get('sendemail', function(){
    $data=array(
        'name' => "Bienvenido a la plataforma de encuestas Enki",
    );
    
    Mail::send('emails.welcome', $data, function($message){

        $message->from('enkidevelopers@gmail.com', 'Enki Developers');

        $message->to('bakur95@gmail.com')->subject('Correo de Bienvenida');

    });

    return "Email enviado correctamente!";

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
