<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Imagen;
use App\Models\Cuenta;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MotivoRequest;


class FotosArtistaController extends Controller
{
    public function index(){
        $artistas = Cuenta::where('perfil_id', 2)->orderBy('user')->get(); 
        $imagenes = Imagen::orderBy('id')->get();
        return view('imagenban.index',compact('imagenes','artistas'));
    }

    public function ban(Imagen $imagen){
        return view('imagenes.ban',compact('imagen'));
    }
    
    public function banear(Request $request, Imagen $imagen){
        
        $imagen->motivo_ban = $request->motivo_ban;
        $imagen->baneada = true;
        $imagen->save();
        return view('home.index');
    }

    public function unban(Imagen $imagen){
        $imagen->baneada = false;
        $imagen->motivo_ban = null;
        $imagen->save();
        return view('home.index');
    }
}

