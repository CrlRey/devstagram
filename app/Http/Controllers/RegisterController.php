<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() : View {

        return view('auth/register');

    }

    public function store(Request $request)
    {
        // Acceder a los valores
        //dd($request);

        // Modificando el request para un nuevo parametro
        //$request->request->add(['username' => Str::slug($request->username)]);

        // Validar formularios
        $request->validate([
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|min:8|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'username' => Str::slug($request->username),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //Autenticar
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password,

        // ]);

        //Autenticar de segunda forma
        auth()->attempt($request->only('email', 'password'));

        // Redireccionar usuario
        return redirect()->route('posts.index', auth()->user()->username);

    }


}
