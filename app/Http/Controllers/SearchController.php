<?php
// app/Http/Controllers/SearchController.php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;
use App\Models\Republica;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $term = $request->input('term');

        if (empty($term)) {
            return redirect()->route('home');
        }

        $articles = Article::search($term)->get();
        $events = Event::search($term)->get();
        $republicas = Republica::search($term)->get();

        $results = collect([])->concat($articles)->concat($events)->concat($republicas);

        return view('search.results', [
            'term' => $term,
            'results' => $results,
        ]);
    }
}