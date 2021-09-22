<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $products = Product::all();

        return view('products.index')->with([
            'products' => $products,
        ]);
    }

    public function create(){

        return view('products.create');
    }

    public function store(Request $request){

       # dd(request(),request()->title , request()->all());
//
//        $product = Product::create([
//            'title' => $request->title,
//            'description' => $request->description,
//            'price' => $request->price,
//            'stock' => $request->stock,
//            'status' => $request->status
//        ]);

        $rules = [
            'title' => ['required','max:255'],
            'description' => ['required','max:1000'],
            'stock' => ['required','min:0'],
            'price' => ['required','min:1'],
            'status' => ['required','in:available,unavailable']
        ];

        request()->validate($rules);

        if(request()->stock == 0 && request()->status == 'available'){

            return redirect()
                ->back()
                ->withInput(request()->all())
                ->withErrors(['errors','if available must have stock']);
        }


        $product = Product::create(request()->all());

        return redirect()->route('products.index')
            ->withSuccess("new product with id {$product->id} was created");

    }

    public function show($product){

        $product = Product::findOrFail($product);
        return view('products.show')->with([
            'product' => $product,
            'subtitle' => '<h2> Something</h2>'
        ]);
    }

    public function edit($product){
        return view('products.edit')->with([
            'product' => Product::findOrFail($product),
        ]);
    }

    public function update($product){
        $rules = [
            'title' => ['required','max:255'],
            'description' => ['required','max:1000'],
            'stock' => ['required','min:0'],
            'price' => ['required','min:1'],
            'status' => ['required','in:available,unavailable']
        ];

        request()->validate($rules);

        $product = Product::findOrFail($product);

        $product->update(request()->all());

        return redirect()
            ->route('products.index')
            ->withSuccess("The product was updated successfully");
    }
    public function destroy($product){

        $product = Product::findOrFail($product);

        $product->delete();

        return redirect()
            ->route('products.index')
            ->withSuccess("This product with {$product->id} was deleted");
    }

}
