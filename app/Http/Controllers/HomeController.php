<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Exibe a página inicial com dados agregados de várias seções do site.
     */
    public function index()
    {
        $featuredArticles = Article::whereNotNull('image_path')
            ->latest()
            ->take(5)
            ->get();

        $upcomingEvents = Event::where('event_datetime', '>=', now())
            ->orderBy('event_datetime', 'asc')
            ->take(3)
            ->get();
        
        $recentImages = GalleryImage::latest()
            ->take(6)
            ->get();

        return view('index', compact('featuredArticles', 'upcomingEvents', 'recentImages'));
    }
}