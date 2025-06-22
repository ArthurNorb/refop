<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::latest()->paginate(12);
        return view('galeria', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif,webp',
                'max:10240', // 10 MB
                'dimensions:max_width=4000,max_height=4000', // Dimensões máximas de 4000x4000 pixels
            ],
            'caption' => 'nullable|string|max:255',
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        GalleryImage::create([
            'user_id' => auth()->id(),
            'path' => $path,
            'caption' => $request->caption,
        ]);

        return back()->with('success', 'Imagem enviada com sucesso!');
    }

    public function destroy(GalleryImage $image)
    {
        if (auth()->id() !== $image->user_id && !auth()->user()->is_admin) {
            return back()->with('error', 'Você não tem permissão para excluir esta imagem.');
        }

        Storage::disk('public')->delete($image->path);

        $image->delete();

        return back()->with('success', 'Imagem excluída com sucesso.');
    }
}
