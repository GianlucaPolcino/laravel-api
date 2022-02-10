@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center py-3">
            Creazione articolo
        </h1>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('admin.posts.store')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="title">Titolo Post</label>
              <input value="{{old('title')}}" type="text" class="form-control @error('title') is-invalid  @enderror" id="title" name="title" placeholder="Titolo">
              @error('title')
                  <p class="text-danger">
                    {{$message}}
                  </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="content">Testo</label>
              <textarea class="form-control @error('content') is-invalid  @enderror" id="content" name="content" rows="3">{{old('content')}}</textarea>
              @error('content')
                <p class="text-danger">
                    {{$message}}
                </p>
              @enderror
            </div>
            <div class="form-group">
                <label for="content">Categoria</label>
                <select class="form-control" aria-label="Default select example" name="category_id" id="category_id">
                    <option selected>Seleziona una categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                </select>
            </div>

            <div class="py-5">
                <button type="submit" class="btn btn-success">Invia</button>
                <button type="reset" class="btn btn-secondary">Cancella</button>

            </div>
        </form>
    </div>
@endsection

@section('title')
    Creazione articolo
@endsection