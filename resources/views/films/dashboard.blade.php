@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus Filmes</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-films-container">
        @if (count($films) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($films as $film)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td><a href="/films/{{ $film->id }}">{{ $film->title }}</a></td>
                            <td>{{ count($film->users) }}</td>
                            <td>
                                <a href="/films/edit/{{ $film->id }}" class="btn btn-info edit-btn">
                                    <ion-icon name="create-outline"></ion-icon> Editar
                                </a>
                                <form action="/films/{{ $film->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn">
                                        <ion-icon name="trash-outline"></ion-icon> Deletar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Você ainda não tem filmes, <a href="/films/create">criar filme</a></p>
        @endif
    </div>
@endsection
