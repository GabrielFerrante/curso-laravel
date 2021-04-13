<?php

use Illuminate\Support\Facades\Route;

//Chamando um controller na ROTA
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('products.index');

Route::get('/login', function(){
    return 'login';
})->name('login');

//GRUPO DE ROTAS

Route::middleware([])->group(function(){

    //Rotas com prefixo
    Route::prefix('admin')->group(function(){

        //Rotas com namespace
        Route::namespace('App\Http\Controllers\Admin')->group(function(){

            //Rotas com name
            Route::name('admin.')->group(function(){

                Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
    
                Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
                
                Route::get('/produtos', 'TesteController@teste')->name('produtos');
        
                Route::get('/', function(){
                    //redirecionamento através de nome de rota
                    return redirect()->route('admin.dashboard');
                })->name('home');

            });
            
        });

        
    });
    
    
});

Route::group([
   'middleware' => [],
   'prefix' => 'admin',
   'namespace' => 'App\Http\Controllers\Admin',
   'name' => 'admin.'
], function(){
    Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
    
    Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
                
    Route::get('/produtos', 'TesteController@teste')->name('produtos');
        
    Route::get('/', function(){
        //redirecionamento através de nome de rota
        return redirect()->route('admin.dashboard');
    })->name('home');
});


//ROTAS NOMEADAS
/*
Route::get('/redirect3', function(){
    return  redirect()->route('url.name');
});
Route::get('/name-url', function(){
    return 'Hey hey hey';
})->name('url.name');

#Somente no caso de uma view ser simples
Route::view('/view','welcome');

Route::get('/redirect2', function(){
    return "Texto da página 2";
});

Route::redirect('/redirect1', '/redirect2');
/* Redirecionamento
Route::get('/redirect1', function(){
    return redirect('/redirect2');
});

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
