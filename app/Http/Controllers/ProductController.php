<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Nome de Classe Controller é Singular da classe seguido de 'Controller'
class ProductController extends Controller
{
    public function index(){

        $products = ['Product 01', 'Product 02', 'Product 03'];
        return $products;
    }
}
