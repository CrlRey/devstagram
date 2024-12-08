<?php

namespace App\Http\Controllers;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Laravel\Facades\Image;

class ImagenController extends Controller
{
    //
    public function store(Request $request)
    {

    $manager = new ImageManager(new Driver());

    $imagen  = $manager->read($request->file('file'));

    $imagen = $imagen->resize(1000, 1000);

    $nameImg = Str::uuid() . '.' . $request->file('file')->getClientOriginalExtension();

    $imgPath = public_path('uploads'.'/'.$nameImg);

    $imagen->save($imgPath);

    return response()->json(['imagen' => $nameImg]);






     //   Storage::put($imagenPath, $imagenServer->encode());



    }
}
