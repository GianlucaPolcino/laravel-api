@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="py-5 text-center">
            {{$post->title}}
        </h1>
        
        @if ($post->category->name)
            <h3>
                Categoria: {{$post->category->name}}
            </h3>
        @endif
    
        <p class="py-5">
            {{$post->content}}
        </p>
    
        <div class="">
            <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-warning mr-3">Modifica</a>
        </div>
    </div>
@endsection

@section('title')
    {{$post->title}}
@endsection