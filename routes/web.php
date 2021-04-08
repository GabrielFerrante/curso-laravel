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
//Rota Match permite requisições de acordo com o verbo HTTP específicado
Route::match(['post', 'get'],'/match', function(){ 
    return 'Match'; 
});
//Rota ANY permite requisições de qualquer verbo HTTP
//TER CAUTELA NO USO, PODE 
Route::any('/any', function(){ 
    return 'Any'; 
});

Route::get('/empresa', function (){
    return 'Sua empresa';
});

Route::get('/contato', function (){
    return view('site.contact');
});

Route::get('/', function () {
    //função de callback como parâmetro para a rota GET
    return view('welcome');
});
