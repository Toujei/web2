<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;

class PerfilesController extends Controller
{
    public function index(){
        $perfiles = Perfil::orderBy('id')->get();
        return view('perfiles.index',compact('perfiles'));
    }
}
