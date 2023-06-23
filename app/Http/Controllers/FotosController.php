<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Imagen;

class FotosController extends Controller
{
    public function index(){
        $imagenes = Imagen::orderBy('id')->get();
        return view('fotos.index',compact('imagenes'));
    }

    public function store(Request $request)
    {
        $imagen = new Imagen();
    
        $foto = $request->file('imagen');
        $arch = $foto->getClientOriginalName();
    
        
        $rutaarch = 'images/' . $arch;
        Storage::disk('public')->put($rutaarch, file_get_contents($foto));
    
        
        $imagen->titulo = $request->titulo;
        $imagen->archivo = $rutaarch;
        $imagen->baneada = false;
        $imagen->motivo_ban = null;
        $imagen->cuenta_user = $request->cuenta_user;
    
        $imagen->save();
    
        return view('home.index');
    }
    
}
