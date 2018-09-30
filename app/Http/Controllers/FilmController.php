<?php

namespace App\Http\Controllers;

use App\Film;
use App\Http\Resources\FilmResource;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        return FilmResource::collection(Film::with('genres')->limit(1));
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

        return new FilmResource($film);
    }

    public function show(Film $film)
    {
        return new FilmResource($film);
    }

    public function update(Request $request, Film $film)
    {
        // code
    }

    public function destroy(Film $film)
    {
		$film->delete();
		return response()->json(null, 204);
    }
}
