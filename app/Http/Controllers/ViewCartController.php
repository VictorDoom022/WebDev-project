<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ViewCartController extends Controller
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
        //$products = Product::latest()->get();

        $position = Auth::user()->position;

        if($position == 'customer'){
            return view('viewCart');
        }else{
            return view('accessDenied');
        }
    }

    public function store(Request $request){

        $cartData = request("cartData");
        error_log($cartData);

        $decodedCartData = json_decode($cartData, true);
        print_r($decodedCartData);

        $position = Auth::user()->position;

        if($position == 'customer'){
            return view('viewCart',[
                'data' => $decodedCartData,
            ]);
        }else{
            return view('accessDenied');
        }
    }
}
