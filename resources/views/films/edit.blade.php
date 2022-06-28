@extends('layouts.main')
@section('title', 'Editando: ' . $film->title)
@section('content')

    <div class="col-md-6 offset-md-3" id="film-create-container">
        <h1>Editando: {{ $film->title }}</h1>
        <form action="/films/update/{{ $film->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group input-container">
                <label for="title">Imagem do Filme:</label>
                <input type="file" class="form-control" id="image" name="image">
                <img src="/img/Films/{{ $film->image }}" class="img-preview" alt="{{ $film->title }}">
            </div>
            <div class="form-group input-container">
                <label for="title">Título do Filme:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Título filme"
                    value="{{ $film->title }}">
            </div>
            <div class="form-group input-container">
                <label for="title">URL do trailer:</label>
                <input type="url" name="trailer" value="{{$film->trailer}}" placeholder="URL do trailer..." class="form-control">
            </div>
            <div class="form-group input-container">
                <label for="title">Ano de lançamento:</label>
                <input type="number" value="{{ $film->year }}" class="form-control" id="year" name="year">
            </div>
            <div class="form-group input-container">
                <label for="title">Gênero:</label>
                <select name="genre" value="{{$film->genre}}" class="form-control">
                    <option value="Ação">Ação</option>
                    <option value="Aventura">Aventura</option>
                    <option value="Comédia">Comédia</option>
                    <option value="Drama">Drama</option>
                </select>
            </div>
            <div class="form-group input-container">
                <label for="title">Descrição:</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control"
                    placeholder="Descrição do filme">{{ $film->description }}</textarea>
            </div>

            <input type="submit" class="btn btn-primary input-container" value="Editar filme">
        </form>
    </div>

@endsection
