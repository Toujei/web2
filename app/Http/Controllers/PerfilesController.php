<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use Gate;

class PerfilesController extends Controller
{   
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        if(Gate::denies('listado')){
            return redirect()->route('home.index');
        }
        $perfiles = Perfil::orderBy('id')->get();
        return view('perfiles.index',compact('perfiles'));
    }
}
