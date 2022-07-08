@extends("layouts.admin")

@section("content")
    <div class="container">
        <h1>{{$post->title}}</h1>
        <h4 class="my-4">Categoria: {{$post->category ? $post->category->name : "-"}}</h4>
        <p>
            {{$post->content}}
        </p>

        <a class="btn btn-primary" href="{{route('admin.posts.index')}}">Torna all'elenco</a>
    </div>
@endsection
