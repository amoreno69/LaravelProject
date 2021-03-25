<?php

namespace App\Http\Controllers;

use Auth;
use DB;

use App\Models\Cotxe;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CotxeController extends Controller
{
    public function allCotxes(){
        $cotxes = Cotxe::all();
        $user = Auth::user();
        return view('allCotxes', compact('cotxes', 'user'));
    }

    public function verCrearCotxe(){
        $user = Auth::user();
        return view('createCotxe', compact('user'));
    }


    public function crearCotxe(Request $request){
        
        $cotxe = new Cotxe();
        if ($request->hasFile('input_img')!=null) {
            $image = $request->file('input_img');
            $fileArray = array('image' => $image);

            $rules = array(
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
            );

            $validator = Validator::make($fileArray, $rules);
            if ($validator->fails()) {
                return "error al pujar la imatge";
            }
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $image->move($destinationPath, $name);
            $cotxe->path = '/images' . "/" . $name;
        }
        
        $cotxe->user_id = Auth::id();
        $cotxe->nom = $request->get('nom');
        $cotxe->matricula = $request->get('matricula');
        $cotxe->motor = $request->get('motor');
        $cotxe->marca = $request->get('marca');
        $cotxe->tipus_de_cotxe = $request->get('tipus_de_cotxe');
        $cotxe->save();
        return redirect('myObjects');
    }
}
