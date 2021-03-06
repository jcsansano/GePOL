<?php
use App\Http\Controllers;
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


Route::get('/', 'App\Http\Controllers\MainController@home')->name('inicio');

/** Grup de rutes de taules auxiliars **/

/** Rutes d'OrganAcreditador */
Route::group(['middleware'=>'web'], function(){
    Route::match(['get','post'],'llistaOrgAcred', 'App\Http\Controllers\OrgAcreditControlador@index')->name('orgAcredList');
    Route::get('nouOrgAcred', 'App\Http\Controllers\OrgAcreditControlador@create')->name('orgAcredCreate');
    Route::post('grabarOrgAcred', 'App\Http\Controllers\OrgAcreditControlador@store')->name('orgAcredStore');
    Route::post('updateOrgAcred', 'App\Http\Controllers\OrgAcreditControlador@update')->name('orgAcredUpdate');
//  Route::post('baixaOrgAcred', 'App\Http\Controllers\OrgAcreditControlador@destroy')->name('orgAcredBaixa'); 
    Route::post('voreOrgAcred', 'App\Http\Controllers\OrgAcreditControlador@show')->name('orgAcredShow');
    Route::post('canviOrgAcred', 'App\Http\Controllers\OrgAcreditControlador@changeState')->name('orgAcredChangeState');
    
});
    
/** Rutes d'Acreditacions */
    Route::group(['middleware'=>'web'], function(){
    Route::match(['get','post'],'llistaAcredit', 'App\Http\Controllers\AcreditacioControlador@index')->name('acreditList');
    Route::post('nouAcredit', 'App\Http\Controllers\AcreditacioControlador@create')->name('acreditNou');
    Route::post('editAcredit/{acredit}', 'App\Http\Controllers\AcreditacioControlador@edit')->name('acreditEdit');
    Route::post('baixaAcredit', 'App\Http\Controllers\AcreditacioControlador@destroy')->name('acreditBaixa');    
    Route::post('canviAcredit', 'App\Http\Controllers\AcreditacioControlador@changeState')->name('acreditChangeState');
}); 

/** Rutes d'Acreditacions */
Route::group(['middleware'=>'web'], function(){
    Route::get('llistaColaborador', 'App\Http\Controllers\ColaboradorsColaboradors@index')->name('colaboradorsList');
    Route::get('nouColaborador', 'App\Http\Controllers\ColaboradorsControlador@create')->name('colaboradorsNou');
   // Route::get('editaColaborador/{Acredit}', 'App\Http\Controllers\ColaboradorControlador@edit')->name('colaboradorsEdita');
    Route::post('baixaColaborador', 'App\Http\Controllers\ColaboradorControlador@destroy')->name('colaboradorsBaixa');    
});


Route::get('/hola/{persona?}', 'App\Http\Controllers\PrimerControlador@hola');

Route::get('/seunova', function(){ return view('seuCrear'); });

Route::get('/usuarinou', function(){ return view('usuariCrear'); });

Route::resource('/seus', 'App\Http\Controllers\SeuController');

Route::resource('/usuaris', 'App\Http\Controllers\UsuariController');