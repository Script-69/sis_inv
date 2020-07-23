<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth/login');
});

Route::resource('sidacta/usuario','UsuarioController');
Route::resource('sidacta/sitio','SitioController');
Route::resource('sidacta/almacen','AlmacenController');
Route::resource('sidacta/proveedor','ProveedorController');
Route::resource('sidacta/equipo','EquipoController');
Route::resource('sidacta/bitacora_falla','BitacoraFallaController');
Route::get('sidacta/bitacora_falla/create/{id_equipo}/{sitio}','BitacoraFallaController@create');
Route::get('sidacta/', 'EquipoController@form')->name('form');
//Route::get('sidacta/bitacora_falla', 'BitacoraFallaController@falla')->name('falla');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pdf', 'ReporteController@PDF')->name('descargarPDF');
Route::get('/equipos', 'EquipoController@index2')->name('equipos');
Route::get('/pdfequipos', 'ReporteController@PDFEquipos')->name('descargarPDFEquipos');

