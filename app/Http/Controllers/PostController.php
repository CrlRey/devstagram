<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PostController extends Controller implements HasMiddleware

{
    //
    public static function middleware(): array
    {
        return[
            new Middleware('auth', except:['show', 'index'])
        ];
    }

    public function index(User $user)
    {

        $posts = Post::where('user_id', $user->id)->latest()->simplePaginate(15);

        //dd($posts);

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function create()
    {
       return view('post/create');
    }

    public function store(Request $request)
    {
        // Validar dentro de store
        $request->validate([
            'titulo' => 'required|max:255',
            'description' => 'required',
            'imagen' => 'required'
        ]);

        Post::create([
            'titulo' => $request->titulo,
            'description' => $request->description,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);


        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user, Post $post, Comentario $comentario)
    {

      //      $comentario = Comentario::where('user_id', $user->id)->simplePaginate(15);

        return view('post/show', [
            'post' => $post,
            'user' => $user,
            'comentario' => $comentario
        ]);
    }

    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);
        $post->delete();

        $imagen_path = public_path('uploads' . $post->imagen);

        if(File::exists($imagen_path)){
            unlink($imagen_path);

        }

        return redirect()->route('posts.index', auth()->user()->username);

    }


}
