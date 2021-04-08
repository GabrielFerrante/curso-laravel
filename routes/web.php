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
#Somente no caso de uma view ser simples
Route::view('/view','welcome');

Route::get('/redirect2', function(){
    return "Texto da página 2";
});

Route::redirect('/redirect1', '/redirect2');
/* Redirecionamento
Route::get('/redirect1', function(){
    return redirect('/redirect2');
});*/

//PERMITINDO PARÂMETROS OPCIONAIS
Route::get('/produtos/{idProduct?}', function($idProduct = ''){
    return "Produtos {$idProduct}";
});

Route::get('/categoria/{flag}/posts', function ($para1){
    return "Posts da categoria: {$para1}";
});

//PASSANDO PARÂMETROS NA URL
Route::get('/categorias/{flag}', function ($flag){
        return "Produtos da categoria: {$flag}";
});

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
