<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Imagen;
use App\Models\Cuenta;


class FotosController extends Controller
{
    public function index(){
        $artistas = Cuenta::where('perfil_id', 2)->orderBy('user')->get(); 
        $imagenes = Imagen::orderBy('id')->get();
        return view('imagenes.index',compact(['imagenes','artistas']));
    }

    public function create(){
        $imagenes = Imagen::orderBy('id')->get();
        return view('imagenes.create',compact('imagenes'));
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
    
    public function destroy($id){
        
        $imagen = Imagen::find($id);
        $path = 'public/' . $imagen->archivo;
        Storage::delete($path);
        $imagen->delete();
        return redirect()->route('imagenes.index');
    }

    public function edit(Imagen $imagen){

        return view('imagenes.edit',compact('imagen'));
    }

    public function update(Request $request,Imagen $imagen){
        $imagen->titulo = $request->titulo;
        $imagen->save();
        return redirect()->route('imagenes.index');
    }
}

