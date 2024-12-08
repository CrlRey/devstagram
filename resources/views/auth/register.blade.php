@extends('layouts.app')

@section('titulo')
    Registrate en DevStagram
@endsection

@section('contenido')


    <div class="md:flex md:justify-center h-2/6">
        <div class="md:w-4/12">
            <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen registro" class="shadow-xl">
        </div>

        <div class="md:w-4/12 bg-white p-10 rounded-lg shadow-xl">
            <form action="{{ route('register')}}" method="POST" novalidate>
                @csrf
                @error('name')
                        <p class="w-full bg-red-200 border-2 rounded-md p-3 mb-3 border-red-600 text-center text-white font-bold uppercase">{{ $message }}</p>
                @enderror
                @error('username')
                        <p class="w-full bg-red-200 border-2 rounded-md p-3 mb-3 border-red-600 text-center text-white font-bold uppercase">{{ $message }}</p>
                @enderror
                @error('email')
                        <p class="w-full bg-red-200 border-2 rounded-md p-3 mb-3 border-red-600 text-center text-white font-bold uppercase">{{ $message }}</p>
                @enderror
                @error('password')
                        <p class="w-full bg-red-200 border-2 rounded-md p-3 mb-3 border-red-600 text-center text-white font-bold uppercase">{{ $message }}</p>
                @enderror
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-sky-700 font-bold">Nombre</label>
                    <input type="text" name="name" id="name" placeholder="Tu nombre" class="border-2 p-3 w-full rounded-md @error('name')
                        border-red-500
                    @enderror"
                    value="{{ old('name') }}"
                    >

                </div>
                <div class="mb-5">

                    <label for="username" class="mb-2 block uppercase text-sky-700 font-bold">Username</label>
                     <input type="text" name="username" id="username" placeholder="Tu nombre de usuario" class="border-2 p-3 w-full rounded-md @error('username')
                     border-red-500
                 @enderror "
                 value="{{ old('name') }}"
                 >

                </div>

                <div class="mb-5">

                    <label for="email" class="mb-2 block uppercase text-sky-700 font-bold">Email</label>
                     <input type="email" name="email" id="email" placeholder="Tu email de registro" class="border-2 p-3 w-full rounded-md @error('email')
                     border-red-500
                 @enderror "
                 value="{{ old('name') }}"
                 >

                </div>

                <div class="mb-5">

                    <label for="password" class="mb-2 block uppercase text-sky-700 font-bold">Contraseña</label>
                     <input type="password" name="password" id="password" placeholder="Tu password" class="border-2 p-3 w-full rounded-md @error('password')
                     border-red-500
                 @enderror"

                 >

                </div>

                <div class="mb-5">

                    <label for="password_confirmation" class="mb-2 block uppercase text-sky-700 font-bold">Repite tu contraseña</label>
                     <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repite tu contraseña" class="border-2 p-3 w-full rounded-md">

                </div>

                <input type="submit" value="crear cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase w-full text-white p-3 rounded-lg font-bold">
            </form>
        </div>
    </div>
@endsection
