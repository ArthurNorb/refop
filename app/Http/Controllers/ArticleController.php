<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('user')->latest()->paginate(10);
        return view('artigos.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artigos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:300',
            'body' => 'required|string',
            'image' => 'nullable|image|max:5120',
        ]);

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('articles', 'public');
        }

        $article = Article::create($data);

        return redirect()->route('artigos.show', $article)->with('success', 'Artigo publicado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('artigos.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $this->authorize('update', $article);
        return view('artigos.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:300',
            'body' => 'required|string',
            'image' => 'nullable|image|max:5120',
        ]);

        if ($request->title !== $article->title) {
            $data['slug'] = Str::slug($request->title);
        }

        if ($request->hasFile('image')) {
            if ($article->image_path) Storage::disk('public')->delete($article->image_path);
            $data['image_path'] = $request->file('image')->store('articles', 'public');
        }
        
        $article->update($data);

        return redirect()->route('artigos.show', $article)->with('success', 'Artigo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article); 

        if ($article->image_path) Storage::disk('public')->delete($article->image_path);
        $article->delete();

        return redirect()->route('artigos.index')->with('success', 'Artigo excluído com sucesso!');
    }
}
