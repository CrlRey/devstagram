@extends('layouts.app')

@section('titulo')
    Pagina principal
@endsection

@section('contenido')

<x-list-post :posts="$posts" />
@endsection



