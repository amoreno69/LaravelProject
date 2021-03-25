<?php

namespace App\Http\Controllers;

use Auth;
use DB;

use App\Models\Subasta;

use Illuminate\Http\Request;

class HomeController extends Controller
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
        $user = Auth::user();
        $subastes = Subasta::all();
        return view('home', compact('subastes', 'user'));
    }

    public function afegir(Request $request){
        $user = Auth::user();
        $subastes = Subasta::all();
        $user->saldo+=1000;
        $user->save();
        return view('auth/login', compact('subastes', 'user'));
    }
}
