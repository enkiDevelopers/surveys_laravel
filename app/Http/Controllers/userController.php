<?php

namespace App\Http\Controllers;
use App\usuarios;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function show(Request $request)
    {
        $id = $request->session()->get('id');
        $usuarios = usuarios::where('addBy', $id)->get();;
    
        return view('administrator.management',compact('usuarios'));
    }
}
