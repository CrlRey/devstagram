<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __invoke()
    {
        $id = auth()->user()->followings->pluck('id')->toarray();
        $posts = Post::whereIn('user_id', $id)->latest()->paginate(10);
        return view('home', ['posts' => $posts]);
    }
}
