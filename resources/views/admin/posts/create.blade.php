@extends("layouts.admin")

@section("content")
    <div class="container">
        <h1>Crea un nuovo post</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route("admin.posts.store")}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input
                    type="text"
                    value="{{old("title")}}"
                    class="form-control @error("title") is-invalid @enderror"
                    id="title" name="title" placeholder="Titolo">
                    @error("title")
                        <p class="text-danger">{{$message}}</p>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Contenuto del post</label>
                <textarea class="form-control @error("content") is-invalid @enderror" name="content" id="content" cols="30" rows="10">{{old("content")}}
                </textarea>
                @error("content")
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <select class="form-select" name="category_id">
                    <option value="">Seleziona una categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" @if (old("category_id") == $category->id) selected @endif >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Pubblica</button>
        </form>
    </div>

@endsection
