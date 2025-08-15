<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SetorController extends Controller
{
    /**
     * Lista todos os setores.
     * GET /api/setores
     */
    public function index()
    {
        $setores = Setor::paginate(10);
        return response()->json($setores);
    }

    /**
     * Cria um novo setor.
     * POST /api/setores
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $dados = $validator->validated();
        $caminhoImagem = null;

        if ($request->hasFile('imagem')) {
            $caminhoImagem = $request->file('imagem')->store('setores', 'public');
            $dados['imagem'] = $caminhoImagem;
        }

        $setor = Setor::create($dados);

        return response()->json($setor, 201);
    }

    /**
     * Mostra um setor específico.
     * GET /api/setores/{id}
     */
    public function show(Setor $setor)
    {
        return response()->json($setor);
    }

    /**
     * Atualiza um setor existente.
     * PUT/PATCH /api/setores/{id}
     */
    public function update(Request $request, Setor $setor)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'sometimes|required|string|max:255',
            'descricao' => 'sometimes|nullable|string',
            'imagem' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $dados = $validator->validated();

        if ($request->hasFile('imagem')) {
            if ($setor->imagem) {
                Storage::disk('public')->delete($setor->imagem);
            }

            $caminhoImagem = $request->file('imagem')->store('setores', 'public');
            $dados['imagem'] = $caminhoImagem;
        }

        $setor->update($dados);

        return response()->json($setor);
    }

    /**
     * Deleta um setor.
     * DELETE /api/setores/{id}
     */
    public function destroy(Setor $setor)
    {
        if ($setor->imagem) {
            Storage::disk('public')->delete($setor->imagem);
        }

        $setor->delete();
        return response()->json(null, 204);
    }
}