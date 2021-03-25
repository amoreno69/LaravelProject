<?php

namespace App\Http\Controllers;

use Auth;
use DB;

use App\Models\Ilitacio;
use App\Models\Subasta;

use Illuminate\Http\Request;

class IlitacioController extends Controller
{
    public function allIlitacions(){
        $ilitacions = Ilitacio::all();
        $user = Auth::user();
        return view('allIlitacions', compact('ilitacions', 'user'));
    }

    public function crearLicitacio_Subasta($id){
        $ilitacions = Ilitacio::all();
        $user = Auth::user();
        $subasta = Subasta::find($id);
        $otherUser = $subasta->user;
        $cotxe = $subasta->cotxe;

        if($user->id==$subasta->user_id) return "No pots comprar a la teva subasta";
        if($subasta->activa == false) return "La subasta no està activa";
        if($user->saldo<$subasta->ilitació_minima) return "No tens el saldo suficient";
        
        $cotxe->subasta = false;
        $cotxe->user_id = $user->id;
        $cotxe->save();

        $subasta->activa = false;
        $subasta->save();

        $user->saldo-=$subasta->ilitació_minima;
        $user->save();

        $otherUser->saldo+= ($subasta->ilitació_minima -($subasta->ilitació_minima*3/100) ) + 100;
        $otherUser->save();

        $ilitacion = new Ilitacio();
        $ilitacion->user_id = $user->id;
        $ilitacion->subasta_id = $subasta->id;
        $ilitacion->preu = $subasta->ilitació_minima;
        $ilitacion->data_ilitacio = date('Y/m/d');
        $ilitacion->save();

        return view('allIlitacions', compact('ilitacions', 'user'));
    }

    public function crearIlitacio(){
        $ilitacion = new Ilitacio();
        $ilitacion->user_id = 1;
        $ilitacion->subasta_id = 1;
        $ilitacion->preu = 100;
        $ilitacion->data_ilitacio = date('Y/m/d');
        $ilitacion->save();
        return redirect('bids');
    }
}
