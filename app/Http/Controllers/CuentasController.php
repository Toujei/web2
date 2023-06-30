<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Http\Requests\CuentaRequest;
use Illuminate\Support\Facades\Hash;
use Gate;
use Illuminate\Support\Facades\Auth;


class CuentasController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['acceso','logout','create','store']);
    }

    public function index(){
        if(Gate::denies('listado')){
            return redirect()->route('home.index');
        }

        $roles = Cuenta::orderBy('nombre')->get();
        $cuentas = Cuenta::orderBy('user')->get();
        return view('cuentas.index',compact('cuentas'));
    }

    public function create(){
        $cuentas = Cuenta::orderBy('nombre')->get();
        return view('cuentas.create',compact('cuentas'));
    }

    public function store(CuentaRequest $request){
        $cuenta = new Cuenta();
        if($request->perfil_id = "Artista"){
            $cuenta->perfil_id = 2;
        }

        $cuenta->user = $request->user;
        $cuenta->password = Hash::make($request->password);
        $cuenta->nombre = $request->nombre;
        $cuenta->apellido = $request->apellido;
        $cuenta->save();
        return redirect()->route('cuentas.index');
    }

    public function acceso(Request $request){
        $user = $request->user;
        $password = $request->password;

        if(Auth::attempt(['user'=>$user,'password'=>$password])){
            return redirect()->route('home.index');
        }

        return back()->withErrors([
            'user' => 'Datos Erroneos',
        ])->onlyInput('user');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home.login');
    }

    public function edit(Cuenta $cuenta){
        return view('cuentas.edit',compact('cuenta'));
    }

    public function update(Request $request, Cuenta $cuenta){
        $cuenta->nombre = $request->nombre;
        $cuenta->apellido = $request->apellido;
        $cuenta->password = Hash::make($request->password);
        $cuenta->perfil_id = $request->perfil_id;
        $cuenta->save();
        return view('home.index');
    }

    public function destroy(Cuenta $cuenta){
        if($cuenta!=Auth::user()){
            $cuenta->delete();
        }
        return redirect()->route('cuentas.index');
    }
        

}
