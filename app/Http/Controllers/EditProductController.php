<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class EditProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $position = Auth::user()->position;

        if($position == 'seller'){
            return view('editProduct');
        }else{
            return view('accessDenied');
        }
    }

    public function show($id){
        
        $product = Product::findOrFail($id);

        return view('editProduct',[
            'product'=> $product
        ]);
    }

    public function edit($id){

        $product = Product::findOrFail($id);

        $product->prdt_code = request('prdt_code');
        $product->prdt_name = request('prdt_name');
        $product->prdt_oriPrice = request('prdt_oriPrice');
        $product->prdt_sellPrice = request('prdt_sellPrice');
        $product->prdt_type = request('prdt_type');
        $product->prdt_quantity = request('prdt_quantity');
        $product->prdt_image = request('prdt_image');
        $product->prdt_desc = request('prdt_desc');
        if(request('prdt_available') != null){
            $product->prdt_available = request('prdt_available');
        }else{
            $product->prdt_available = 0;
        }

        $product->save();
        return redirect('/seller')->with('productSavedMsg' , 'Product edit successfully');
    }
}
