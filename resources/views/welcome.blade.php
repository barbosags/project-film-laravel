@extends('layouts.main')

@section('title', 'HDC Filmes')

@section('content')

    <div id="search-container" class="col-md-12">
        <h1>Busque um Filme</h1>
        <form action="/" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <div id="films-container" class="col-md-12">
        @if ($search)
            <h2>Buscando por: {{ $search }}</h2>
        @else
            <h2>Próximos Filmes</h2>
            <p class="subtitle">Veja os filmes dos próximos dias</p>
        @endif
        <div id="cards-container" class="row">
            @foreach ($films as $film)
                <div class="card col-md-3">
                    <img src="/img/films/{{ $film->image }}" alt="{{ $film->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $film->title }}</h5>
                        <p class="card-participants">{{$film->year}}</p>
                        <a href="/films/{{ $film->id }}" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach
            @if (count($films) == 0 && $search)
                <p>Não foi possível encontrar nenhum filme com {{$search}}! <a href="/">Ver todos</a></p>
            @elseif(count($films) == 0)
                <p>Não há eventos disponíveis</p>
            @endif
        </div>
    </div>

@endsection
