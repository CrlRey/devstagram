@extends('layouts.app')

@section('titulo')
    Nuevo Post
@endsection

@section('contenido')


@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

    <div class="md:flex md:items-center ">
        <div class="md:w-1/2 px-10 text-center">

            <form action="{{ route('imagen') }}" method="POST" id="dropzone" enctype="multipart/form-data" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center  items-center">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 px-10 mt-10 md:mt-0">
            <div class=" bg-white p-10 rounded-lg shadow-xl">
            <form action="{{ route('post.store')}}" method="POST" novalidate>
                @error('titulo')
                        <p class="w-full bg-red-200 border-2 rounded-md p-3 mb-3 border-red-600 text-center text-white font-bold uppercase">{{ $message }}</p>
                @enderror
                @error('description')
                        <p class="w-full bg-red-200 border-2 rounded-md p-3 mb-3 border-red-600 text-center text-white font-bold uppercase">{{ $message }}</p>
                @enderror
                @error('imagen')
                        <p class="w-full bg-red-200 border-2 rounded-md p-3 mb-3 border-red-600 text-center text-white font-bold uppercase">{{ $message }}</p>
                @enderror
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-sky-700 font-bold">Titulo</label>
                    <input type="text" name="titulo" id="titulo" placeholder="Nombra tu post" class="border-2 p-3 w-full rounded-md
                    @error('titulo')
                        border-red-500
                    @enderror"
                    value="{{ old("titulo") }}"
                    >

                </div>

                <div class="mb-5">
                    <label for="description" class="mb-2 block uppercase text-sky-700 font-bold">Escribelo...</label>
                    <textarea name="description" id="description" placeholder="¿En que estas pensando?" class="border-2 p-3 w-full rounded-md
                    @error('description')
                        border-red-500
                    @enderror"
                    {{ old("description") }}
                    >  </textarea>

                </div>

                <div>
                    <input
                    type="hidden"
                    name="imagen"
                    value="{{old('imagen')}}"
                    >
                </div>

                <input type="submit" value="publicar" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase w-full text-white p-3 rounded-lg font-bold">
            </form>
            </div>
        </div>
    </div>
@endsection
