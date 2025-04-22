<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        // Fetch all movies from the database
        $movies = Movie::all();

        // Return the view with the movies data
        return view('movies.index', compact('movies'));
    }

    public function store(Request $request)
{
    // Validate the incoming data
    $validated = $request->validate([
        'title' => 'required|max:255',
        'genre' => 'required|max:100',
        'release_year' => 'required|integer|digits:4',
        'description' => 'required',
    ]);

    // Create the new movie in the database
    Movie::create([
        'title' => $validated['title'],
        'genre' => $validated['genre'],
        'release_year' => $validated['release_year'],
        'description' => $validated['description'],
    ]);

    // Redirect back to the movies index page
    return redirect()->route('movies.index');
}

}
