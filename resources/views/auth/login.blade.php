@extends('layouts.app')

@section('titulo')
    Inicia sesión
@endsection

@section('contenido')
    <div class="md:flex md:justify-center h-2/6">
        <div class="md:w-4/12">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen registro" class="shadow-xl">
        </div>

        <div class="md:w-4/12 bg-white p-10 rounded-lg shadow-xl">
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                @if (session('mensaje'))
                <p class="w-full bg-red-200 border-2 rounded-md p-3 mb-3 border-red-600 text-center text-white font-bold uppercase">{{ session('mensaje') }}</p>
                @endif

                @error('email')
                        <p class="w-full bg-red-200 border-2 rounded-md p-3 mb-3 border-red-600 text-center text-white font-bold uppercase">{{ $message }}</p>
                @enderror
                @error('password')
                        <p class="w-full bg-red-200 border-2 rounded-md p-3 mb-3 border-red-600 text-center text-white font-bold uppercase">{{ $message }}</p>
                @enderror


                <div class="mb-5">

                    <label for="email" class="mb-2 block uppercase text-sky-700 font-bold">Email</label>

                     <input type="email" name="email" id="email" placeholder="Tu email de registro" class="border-2 p-3 w-full rounded-md
                 @error('email')
                     border-red-500
                 @enderror "
                 value="{{ old('email') }}"
                 >

                </div>

                <div class="mb-5">

                    <label for="password" class="mb-2 block uppercase text-sky-700 font-bold">Contraseña</label>
                     <input type="password" name="password" id="password" placeholder="Tu password" class="border-2 p-3 w-full rounded-md
                 @error('password')
                     border-red-500
                 @enderror"

                 >

                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember" > <label class="uppercase text-gray-700 font-bold" for="">Mantener mi sesión abierta</label>
                </div>



                <input type="submit" value="Iniciar Sesion" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase w-full text-white p-3 rounded-lg font-bold">
            </form>
        </div>
    </div>
@endsection
