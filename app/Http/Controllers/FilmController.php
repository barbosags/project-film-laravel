<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Film;
use App\Models\User;

class FilmController extends Controller
{
    public function index(){
        $search = request('search');

        if($search){
            $films = Film::where([
                  ['title', 'like', '%'.$search.'%']
                ])->get();
        }else{
            $films = Film::all();
        }

        return view('welcome', ['films' => $films, 'search' => $search]);
    }

    public function create(){
        return view('films.create');
    }

    public function store(Request $request){

        $film = new Film;

        $film->title = $request->title;
        $film->trailer = $request->trailer;
        $film->year = $request->year;
        $film->description = $request->description;
        $film->genre = $request->genre;
        //$Film->items =$request->items;

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);

            $request->image->move(public_path('img/Films'), $imageName);

            $film->image = $imageName;

        }

        $user = auth()->user();
        $film->user_id = $user->id;

        $film->save();

        return redirect("/")->with('msg', 'Filme criado com sucesso!');
    }


    public function show($id){

        $film = Film::findOrFail($id);

        $user = auth()->user();
        $hasUserJoined = false;

        if($user){
            $userFilms = $user->filmsAsParticipant->toArray();

            foreach($userFilms as $userFilm){
                if($userFilm['id'] == $id){
                    $hasUserJoined = true;
                }
            }
        }

        $filmOwner = User::where('id', $film->user_id)->first()->toArray();

        return view('films.show', ['film' => $film, 'filmOwner' => $filmOwner, 'hasUserJoined' => $hasUserJoined]);

    }

    public function dashboard(){
        $user = auth()->user();

        $films = $user->films;

        $filmsAsParticipant = $user->filmsAsParticipant;

        return view('films.dashboard', ['films' => $films, 'filmsasparticipant' => $filmsAsParticipant]);
    }

    public function destroy($id){
        Film::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg','Filme excluído com sucesso!');
    }

    public function edit($id){

        $user = auth()->user();

        $film = Film::findOrFail($id);

        if($user->id != $film->user->id){
            return redirect('/dashboard');

        }

        return view('films.edit', ['film' => $film]);

    }

    public function update(Request $request){

        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);

            $request->image->move(public_path('img/Films'), $imageName);

            $data['image'] = $imageName;

        }

        Film::findOrFail($request->id)->update($data);
        return redirect('/dashboard')->with('msg','Filme editado com sucesso!');

    }

    public function joinFilm($id){
        $user = auth()->user();

        $user->filmsAsParticipant()->attach($id);

        $film = Film::findOrFail($id);

        return redirect('/dashboard')->with('msg','Sua presença está confirmada no Filme ' . $film->title);

    }

    public function leaveFilm($id){
        $user = auth()->user();

        $user->filmsAsParticipant()->detach($id);

        $film = Film::findOrFail($id);
        return redirect('/dashboard')->with('msg','Você saiu com sucesso do Filmo: ' . $film->title);

    }


}
