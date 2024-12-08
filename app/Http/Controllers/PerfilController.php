<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class PerfilController extends Controller
{
    //


    public function index(Request $request, User $user)
    {
        return view('profile/index');


    }

    public function store(Request $request)
    {

        //dd($request->imagen);

        $request->request->add(['username' => Str::slug($request->username)]);

        $request->validate([
            'username' => ['required','unique:users,username,'.auth()->user()->id,'min:3','max:20','not_in:twitter,edit-profile'],
            'imagen' => 'max:2048',
        ]);

        if($request->imagen){
            $manager = ImageManager::gd();

            $file = $request->file('imagen');


            $imagen  = $manager->read($file);

            $imagen = $imagen->cover(1000, 1000);

            $nameImg = Str::uuid() . '.' . $request->file('imagen')->getClientOriginalExtension();

            $imgPath = public_path('profiles'.'/'.$nameImg);

            $imagen->save($imgPath);
        }





        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->password = Hash::make($request->password);
        $usuario->imagen = $nameImg ?? auth()->user()->imagen ?? '';
        $usuario->save();

        //redirect
        return redirect()->route('posts.index', $usuario->username);
    }

}
