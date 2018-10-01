<?php

namespace App\Http\Controllers;

use App\Film;
use App\Genre;
use App\Http\Resources\FilmResource;
use Illuminate\Http\Request;

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

        return redirect()->route('film.view', ['film' => $film->slug]);
    }

    public function show(Film $film)
    {
        return response()->json(new FilmResource($film->load('genres')), 201);
    }

    public function create(Request $request)
    {
        $genres = Genre::all();
        return view('film_create')->with('genres', $genres);
    }

    public function destroy(Film $film)
    {
		$film->delete();
		return response()->json(null, 204);
    }
}
