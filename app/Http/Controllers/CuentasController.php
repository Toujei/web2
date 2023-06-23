<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;

class CuentasController extends Controller
{
    public function index(){
        $roles = Cuenta::orderBy('nombre')->get();
        $cuentas = Cuenta::orderBy('user')->get();
        return view('cuentas.index',compact('cuentas'));
    }
}
