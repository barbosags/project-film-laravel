@extends('layouts.main')
@section('title', $film->title)
@section('content')

    <div class="col-md-10 offset-md-1" style="display: flex; justify-content: center; padding-left: 10%; padding-top: 4%">
        <div class="row">
            <div style="display: flex; flex-direction: row; align-items: center; align-self: center">
                <ion-icon name="film-outline" style="width: 40px; height: 40px; margin-right: 2%"></ion-icon>
                <h1>
                    {{ $film->title }} - {{ $film->year }}
                </h1>
            </div>

            <div id="info-container" class="col-md-6">
                <h4>Assista o trailer a seguir</h4>
                <x-embed url="https://www.youtube.com/watch?v=g6ng8iy-l0U" aspect-ratio="16:9" />
            </div>

            <div id="image-container" class="col-md-6">
                <p></p>
                <p></p>
                <br>
                <img src="/img/Films/{{ $film->image }}" class="img-fluid" alt="{{ $film->title }}">
                <div class="col-md-12" id="description-container">
                    <h3>Sinopse:</h3>
                    <p class="event-description">{{ $film->description }}</p>
                    <p class="event-description"><b>Gênero:</b> {{ $film->genre }}</p>
                </div>
                <p class="event-owner">
                    <ion-icon name="videocam-outline"></ion-icon>
                    Produtor: {{ $filmOwner['name'] }}
                </p>
            </div>



        </div>
    </div>

@endsection
