<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();

        return view('products.index')->with([
            'products' => $products,
        ]);
    }

    public function create(){
        return 'This is a means of creation';
    }

    public function store(){

    }

    public function show($product){

        $product = Product::findOrFail($product);
        return view('products.show')->with([
            'product' => $product,
            'subtitle' => '<h2> Something</h2>'
        ]);
    }

    public function edit($product){

    }

    public function update($product){

    }
    public function destroy($product){

    }

}
