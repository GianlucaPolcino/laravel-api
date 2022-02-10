@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>
                Tutti i Post
            </h1>

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Tags</th>
                    <th scope="col" colspan="2" class="text-center">Azioni</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        @if ($post->category)
                          <td>{{$post->category->name}}</td>
                        @else
                          <td> - </td>
                        @endif

                        <td>
                          @forelse ($post->tags as $tag)
                            <span class="badge bg-primary">
                              {{$tag->name}}
                            </span>
                          @empty
                            
                          @endforelse
                        </td>
                        
                        <td><a href="{{route('admin.posts.show', $post)}}" class="btn btn-success">Vedi</a></td>
                        <td><a href="{{route('admin.posts.edit', $post)}}" class="btn btn-warning">Modifica</a></td>

                        <td>
                          <form onsubmit="return confirm('Sei sicuro di eliminare il post: {{$post->title}}?')" action="{{route('admin.posts.destroy', $post)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Elimina</button>
                          </form>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <div>
                {{$posts->links()}}
              </div>
        </div>
    </div>

    <div class="container pt-5">

      <h2 class="py-3 text-center">
        Categorie:
      </h2>

      @foreach ($categories as $category)

        <h3>
          {{$category->name}}
        </h3>

        <ul>

          @foreach ($category->posts as $item)
            <li>
              <a href="{{ route('admin.posts.show', $item) }}">
                {{$item->title}}
              </a>
            </li>
          @endforeach

        </ul>
        
      @endforeach
    </div>
@endsection

@section('title')
    Lista dei post
@endsection