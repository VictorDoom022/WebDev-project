<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class SellerController extends Controller
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

        $products = Product::latest()->get();
        
        if($position == 'seller'){
            return view('seller',[
                'products' => $products,
            ]);
        }else{
            return view('accessDenied');
        }
        
    }

    public function destroy($id){

        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('seller')->with('productSavedMsg' , 'Product deleted successfully');
    }
}
