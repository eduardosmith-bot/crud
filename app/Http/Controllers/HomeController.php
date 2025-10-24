<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function consultaUsuario(){
        $usuarios = User::all();
        // dd($usuarios);
        return view('consultaUsuario', compact('usuarios'));
    }

    public function alterar($id){
        $usuario = User::find($id);
        return view('consultaUsuario', compact('usuarios'));
    }

    public function deletar($id){
        $usuario = User::find($id);
        $usuario->delete();
        return->back();
        
    }
}
