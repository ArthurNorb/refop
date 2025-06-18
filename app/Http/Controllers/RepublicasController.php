<?php

namespace App\Http\Controllers;

use App\Models\Republica;
use App\Models\RepublicaFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Importar o Storage facade
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class RepublicasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Republica::query();

        if ($request->filled('genero')) {
            $query->where('genero', $request->genero);
        }

        $republicas = $query->orderBy('nome')->get();

        return view('republicas.index', [
            'republicas' => $republicas,
            'filtroGenero' => $request->genero,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('republicas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'fotos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'genero' => 'required|string|in:masculina,feminina,mista',
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            try {
                $logoPath = $request->file('logo')->store('logos', 'public');
            } catch (\Exception $e) {
                return back()->withInput()->withErrors(['logo' => 'Falha ao fazer upload do logo: ' . $e->getMessage()]);
            }
        }

        $republica = Republica::create([
            'nome' => $validatedData['nome'],
            'endereco' => $validatedData['endereco'],
            'descricao' => $validatedData['descricao'],
            'logo' => $logoPath,
            'genero' => $validatedData['genero'],
        ]);

        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                try {
                    $fotoPath = $foto->store('republica_fotos', 'public');

                    $republica->fotos()->create([
                        'caminho_foto' => $fotoPath,
                    ]);
                } catch (\Exception | \Throwable $e) {
                    return back()->withInput()->withErrors(['fotos' => 'Falha ao fazer upload de uma ou mais fotos: ' . $e->getMessage()]);
                }
            }
        }

        return redirect()->route('republicas.show', $republica)->with('success', 'República adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Republica $republica)
    {
        return view('republicas.show', compact('republica'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Republica $republica)
    {
        return view('republicas.edit', ['republica' => $republica]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Republica $republica)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'genero' => 'required|string|in:masculina,feminina,mista',
            'descricao' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'fotos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            if ($republica->logo) {
                $oldLogoPath = str_replace('storage/', '', $republica->logo);
                Storage::disk('public')->delete($oldLogoPath);
            }

            $logoPath = $request->file('logo')->store('logos', 'public');
            $validatedData['logo'] = $logoPath;
        }

        $republica->update($validatedData);

        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                $fotoPath = $foto->store('republica_fotos', 'public');
                $republica->fotos()->create([
                    'caminho_foto' => $fotoPath,
                ]);
            }
        }

        return redirect()->route('republicas.show', $republica)->with('success', 'República atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Republica $republica)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Acesso não autorizado.');
        }

        if ($republica->fotos->isNotEmpty()) {
            foreach ($republica->fotos as $foto) {
                $path = str_replace('storage/', '', $foto->caminho_foto);
                Storage::disk('public')->delete($path);
            }
        }

        if ($republica->logo) {
            $path = str_replace('storage/', '', $republica->logo);
            Storage::disk('public')->delete($path);
        }

        $republica->delete();

        return redirect()->route('republicas.index')
            ->with('success', 'República excluída com sucesso.');
    }

     public function destroyFoto(RepublicaFoto $foto)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Acesso não autorizado.');
        }

        $path = str_replace('storage/', '', $foto->caminho_foto);
        Storage::disk('public')->delete($path);

        $foto->delete();

        return back()->with('success', 'Foto excluída com sucesso.');
    }
}
