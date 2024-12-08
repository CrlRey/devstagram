<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    //
    public function store(Request $request, User $user, Post $post)
    {
        $request->validate([
            'comentario' => 'required|max:255',
        ]);

        // crear
        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comentario' => $request->comentario,

        ]);

        //Ver comentarios
        return back()->with('mensaje', 'Se publico tu comentario');
    }
}
