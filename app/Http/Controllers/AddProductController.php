<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AddProductController extends Controller
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

        $users = User::latest()->get();

        $position = Auth::user()->position;

        if($position == 'seller'){
            return view('addProduct',[
                'users' => $users,
            ]);
        }else{
            return view('accessDenied');
        }
    }    
}
