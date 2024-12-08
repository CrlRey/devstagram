@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads' . '/' . $post->imagen) }}" alt="{{$post->titulo}}">
            <div class="p-3 flex items-center gap-4">
               @auth

                    <livewire:like-post :post="$post"/>


               @endauth

            </div>

            <div>
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-5">
                    {{ $post->comentario }}

                </p>
            </div>

            @auth
            @if ($post->user_id === auth()->user()->id)
            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                @method('DELETE')
                @csrf
                <input
                type="submit"
                value="Eliminar Publicacion"
                class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer"
                />

            </form>
            @endif
            @endauth
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow p-5 bg-white mb-5">
                @auth
                <p class="text-4xl font-bold text-center mb-4">Agrega un nuevo comentario</p>

                @if (session('mensaje'))
                    <div class="bg-green-500 p-2 rounded-lg mb-6 text-white uppercase font-bold text-center ">
                        {{session('mensaje')}}
                    </div>
                @endif

               <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="comentario" class="mb-2 block uppercase text-sky-700 font-bold">Escribe un comentario</label>
                    <textarea name="comentario" id="comentario" placeholder="¿En que estas pensando?" class="border-2 p-3 w-full rounded-md
                    @error('comentario')
                        border-red-500
                    @enderror"

                    >  </textarea>
                    @error('comentario')
                        <p class="w-full mt-3 bg-red-200 border-2 rounded-md p-3 mb-3 border-red-600 text-center text-white font-bold uppercase">{{ $message }}</p>
                    @enderror

                </div>
                <input type="submit" value="COMENTAR" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase w-full text-white p-3 rounded-lg font-bold">
            </form>
                @endauth
                <div>
                    @foreach ($post->comentarios as $cmt)
                     <div class="p-5 border-gray-300 border-b">
                        <a href="{{ route('posts.index', $cmt->user ) }}" class="font-semibold">{{ $cmt->user->username }}</a>
                        <p>{{ $cmt->comentario }}</p>
                        <p class="text-gray-400 text-sm">{{ $cmt->created_at->diffForHumans() }}</p>
                     </div>
                    @endforeach
                </div>
            </div>



        </div>
    </div>
@endsection

