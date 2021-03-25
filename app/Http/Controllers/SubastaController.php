<?php

namespace App\Http\Controllers;

use Auth;
use DB;

use App\Models\Subasta;
use App\Models\Cotxe;

use Illuminate\Http\Request;

class SubastaController extends Controller
{
    public function allSubastes(){
        $subastes = Subasta::all();
        return view('allSubastes', compact('subastes'));
    }

    public function allMySubastas(){
        $user = Auth::user();
        $subastes = Subasta::all();
        return view('allMySubastas', compact('subastes', 'user'));
    }

    public function createSubasta(){
        $user = Auth::user();
        return view('createSubasta', compact('user'));
    }

    protected function crearSubasta(Request $request){
        $subasta = new Subasta();
        $subasta->user_id = Auth::id();
        $subasta->cotxe_id = $request->get('cotxe');

        $cotxe = Cotxe::find($request->get('cotxe'));
        $cotxe->subasta = true;
        $cotxe->save();

        $user = Auth::user();
        $user->saldo-=100;
        $user->save();
        
        $subasta->ilitació_minima = $request->get('licitacio_minima');
        $date = \Carbon\Carbon::now()->addDay(3);
        $subasta->data_final = $date->toDateTimeString();
        $subasta->activa = true;
        $subasta->save();
        return redirect('auctions');
    }

    public function baixarPreu($id){
        $user = Auth::id();
        $subasta = Subasta::find($id);

        if($user != $subasta->user_id)return "No ets el propietari";
        if($subasta->activa == false)return "La subasta no és activa";

        $subasta->ilitació_minima -= $subasta->ilitació_minima * 5 / 100;
        $subasta->save();
        return redirect('auctions');
    }

    public function check(){
        $subastes = Subasta::all();
        foreach($subastes as $subasta){
            if($subasta->activa){
                if(\Carbon\Carbon::now()->diffInSeconds($subasta->data_final)<0){
                    $cotxe = $subasta->cotxe;
                    $cotxe->subasta = false;
                    $cotxe->save();
                    $subasta->activa = false;
                    $subasta->save();
                }
            }
        }
        return redirect('');
    }
}
