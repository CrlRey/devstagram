<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @stack('styles')
    <title>Devstagram - @yield('titulo')</title>
    @vite('resources/js/app.js')
    @livewireStyles

</head>
<body class="bg-gray-100">
    <header class="bg-white w-full p-5 shadow boder-b">
        <div class="container justify-between mx-auto flex items-center">
            <a class="text-3xl font-bold text-sky-700" href="{{ route('home') }}">
                DevStagram
            </a>

            @auth
            <nav class="flex gap-2 items-center">

                {{-- Crear publicacion --}}
                <a href="{{ route('post.create') }}" class="flex items-center gap-2 mr-3 bg-sky-700 border border-sky-700 p-2 text-white rounded-md uppercase font-semibold">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                      </svg>


                    crear</a>

                <a href="{{ route('posts.index', auth()->user()->username ) }}" class="font-bold text-sky-700 text-sm uppercase">Hola: <span>{{ auth()->user()->username }}</span></a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="font-bold text-sky-700 uppercase text-sm rounded-md p-2">Cerrar Sesion</button>
                </form>
            </nav>

            @endauth
            @guest
            <nav>
                <a href="{{ route('login') }}" class="font-bold text-sky-700 uppercase text-sm border-2 rounded-md p-2 border-sky-700">Iniciar sesion</a>
                <a href="{{ route('register') }}" class="font-bold text-white uppercase text-sm border-2 rounded-md p-2 border-sky-700 bg-sky-700 ">Registrarse</a>
            </nav>
            @endguest
        </div>


    </header>

    <main class="container mx-auto mt-10">
        <h2 class="font-black text-4xl text-sky-600 text-center mb-10">
            @yield('titulo')
        </h2>
        @yield('contenido')
    </main>

    <footer class="font-bold text-2xl uppercase text-gray-400 text-center mt-10">
        Devstagram - todos los derechos reservado {{ now()->year }}
    </footer>
    @livewireScripts
</body>
</html>
