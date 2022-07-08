@extends("layouts.admin")

@section("content")
    <div class="container">
        <h1>Elenco Post</h1>
        @if (session("deleteMessage"))
            <div class="alert alert-success" role="alert">
                {{session("deleteMessage")}}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{$post->category ? $post->category->name : "-"}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{route('admin.posts.show', $post)}}">VEDI</a>
                            <a class="btn btn-info" href="{{route('admin.posts.edit', $post)}}">MODIFICA</a>
                            <form
                                class="d-inline"
                                action="{{route('admin.posts.destroy', $post)}}"
                                onsubmit="return confirm('Sei sicuro di voler eliminare \'{{$post->title}}\'?')"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">ELIMINA</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{$posts->links()}}

        @foreach ($categories as $category)
            <h3>{{$category->name}}</h3>
            <ul>
                @forelse ($category->post as $post)
                    <li><a href="{{route("admin.posts.show", $post)}}">{{$post->title}}</a></li>
                @empty
                    <li>Non ci sono post per questa categoria.</li>
                @endforelse
            </ul>
        @endforeach
    </div>
@endsection
