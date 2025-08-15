<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SetorController extends Controller
{
    /**
     * Mostra a lista de todos os setores.
     * GET /setores
     */
    public function index()
    {
        $setores = Setor::paginate(10);
        return view('setores.index', compact('setores'));
    }

    /**
     * Mostra o formulário para criar um novo setor.
     * GET /setores/create
     */
    public function create()
    {
        return view('setores.create');
    }

    /**
     * Salva um novo setor no banco de dados.
     * POST /setores
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048' // max 2MB
        ]);
        if ($request->hasFile('imagem')) {
            $validatedData['imagem'] = $request->file('imagem')->store('setores', 'public');
        }
        Setor::create($validatedData);
        return redirect()->route('setores.index')->with('success', 'Setor criado com sucesso!');
    }

    /**
     * Mostra os detalhes de um setor específico.
     * GET /setores/{setor}
     */
    public function show(Setor $setor)
    {
        return view('setores.show', compact('setor'));
    }

    /**
     * Mostra o formulário para editar um setor.
     * GET /setores/{setor}/edit
     */
    public function edit(Setor $setor)
    {
        return view('setores.edit', compact('setor'));
    }

    /**
     * Atualiza um setor no banco de dados.
     * PUT/PATCH /setores/{setor}
     */
    public function update(Request $request, Setor $setor)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        if ($request->hasFile('imagem')) {
            if ($setor->imagem) {
                Storage::disk('public')->delete($setor->imagem);
            }
            $validatedData['imagem'] = $request->file('imagem')->store('setores', 'public');
        }

        $setor->update($validatedData);
        return redirect()->route('setores.index')->with('success', 'Setor atualizado com sucesso!');
    }

    /**
     * Remove um setor do banco de dados.
     * DELETE /setores/{setor}
     */
    public function destroy(Setor $setor)
    {
        if ($setor->imagem) {
            Storage::disk('public')->delete($setor->imagem);
        }
        $setor->delete();
        return redirect()->route('setores.index')->with('success', 'Setor excluído com sucesso!');
    }
}