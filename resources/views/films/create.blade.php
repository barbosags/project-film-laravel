@extends('layouts.main')
@section('title', 'Criar Filme')
@section('content')

    <div class="col-md-6 offset-md-3" id="film-create-container">
        <h1>Crie o seu Filme</h1>
        <form action="/films" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group input-container">
                <label for="title">Imagem em cartaz:</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="Nome do filme">
            </div>
            <div class="form-group input-container">
                <label for="title">Título do filme:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do filme">
            </div>
            <div class="form-group input-container">
                <label for="title">URL do trailer:</label>
                <input type="url" name="trailer" placeholder="URL do trailer..." class="form-control">
            </div>
            <div class="form-group input-container">
                <label for="title">Ano de lançamento:</label>
                <input type="number" class="form-control" id="year" name="year" >
            </div>
            <div class="form-group input-container">
                <label for="title">Gênero:</label>
                <select name="genre" class="form-control">
                    <option value="Ação">Ação</option>
                    <option value="Aventura" selected>Aventura</option>
                    <option value="Comédia">Comédia</option>
                    <option value="Drama">Drama</option>
                </select>
            </div>

            <div class="form-group input-container">
                <label for="title">Descrição:</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control"
                    placeholder="Descrição do filme"></textarea>
            </div>

            <input type="submit" class="btn btn-primary input-container" value="Criar Filme">
        </form>
    </div>

@endsection
