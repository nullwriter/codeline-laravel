<?php

namespace App\Http\Controllers;

use App\Film;
use App\FilmGenre;
use App\Genre;
use App\Http\Resources\FilmResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FilmController extends Controller
{
    public function index()
    {
        return response()->json(Film::with('genres')->paginate(1), 201);
    }

    public function store(Request $request)
    {
        $film = Film::create([
        	'name' => $request->name,
			'description' => $request->description,
			'release_date' => $request->release_date,
			'rating' => $request->rating,
			'country' => $request->country,
			'photo' => $request->photo,
			'ticket_price' => $request->ticket_price
		]);

        foreach($request->genre as $g) {
        	FilmGenre::create([
        		'film_id' => $film->id,
				'genre_id' => $g
			]);
		}

        return redirect()->route('film.view', ['film' => $film->slug]);
    }

    public function show(Film $film)
    {
        return response()->json(new FilmResource($film->load(['genres','comments'])), 201);
    }

    public function create(Request $request)
    {
        $genres = Genre::all();
        return view('create_film')->with('genres', $genres);
    }

    public function detail(Film $film)
	{
		Log::debug($film->comments()->with('user')->get());
		return view('film', ['comments' => $film->comments()->with('user')->get(), 'film_id' => $film->id]);
	}
}
