<?php

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

        $searchTerm = '%' . $term . '%';

        $articles = Article::where('title', 'LIKE', $searchTerm)
                           ->orWhere('excerpt', 'LIKE', $searchTerm)
                           ->orWhere('body', 'LIKE', $searchTerm)
                           ->get();

        $events = Event::where('title', 'LIKE', $searchTerm)
                       ->orWhere('description', 'LIKE', $searchTerm)
                       ->orWhere('location_name', 'LIKE', $searchTerm)
                       ->get();

        $republicas = Republica::where('nome', 'LIKE', $searchTerm)
                             ->orWhere('descricao', 'LIKE', $searchTerm)
                             ->get();
        
        $results = collect([])->concat($articles)->concat($events)->concat($republicas);

        $sortedResults = $results->sortByDesc('created_at');

        return view('search.results', [
            'term' => $term,
            'results' => $sortedResults,
        ]);
    }
}