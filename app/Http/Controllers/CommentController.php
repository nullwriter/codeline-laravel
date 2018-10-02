<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

	public function create(Request $request)
	{
		Comment::create([
			'comment' => $request->comment,
			'film_id' => $request->film_id,
			'user_id' => auth()->user()->id
		]);

		return redirect()->back();
	}
}
