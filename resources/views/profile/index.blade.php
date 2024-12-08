@extends('layouts.app')

@section('titulo')
    Editar perfil {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="w-1/2 bg-white shadow p-6">
            <form action="{{ route('profile.store') }}" method="POST" class="mt-10 md:mt-0" enctype="multipart/form-data">
                @csrf
                @error('username')
                <p class="w-full bg-red-200 border-2 rounded-md p-3 mb-3 border-red-600 text-center text-white font-bold uppercase">{{ $message }}</p>
                @enderror
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-sky-700 font-bold">Username</label>
                    <input type="text" name="username" id="Username" placeholder="Tu nombre de usuario" class="border-2 p-3 w-full rounded-md @error('username')
                        border-red-500
                    @enderror"
                    value="{{ auth()->user()->username }}"
                    >

                </div>



                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-sky-700 font-bold">Imagen Perfil</label>
                    <input type="file" accept="" name="imagen" id="imagen" placeholder="Seleccionar tu imagen" class="border-2 p-3 w-full rounded-md
                    value=""
                    >

                </div>
                <input type="submit" value="Guardar Cambios" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase w-full text-white p-3 rounded-lg font-bold">
            </form>
        </div>
    </div>
@endsection
