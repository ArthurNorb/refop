<?php

namespace App\Http\Controllers;

use App\Models\Sobre;
use Illuminate\Http\Request;

class SobreController extends Controller
{
    /**
     * Mostra o conteúdo da página "Sobre".
     */
    public function show()
    {
        $sobre = Sobre::firstOrCreate(
            [],
            ['content' => '<h1>Conteúdo Padrão</h1><p>Clique em editar para alterar este texto.</p>']
        );

        return view('sobre', compact('sobre'));
    }

    /**
     * Atualiza o conteúdo da página "Sobre".
     */
    public function update(Request $request) 
    {
        $request->validate([
            'content' => 'required',
        ]);

        $sobre = Sobre::firstOrFail();
        
        $sobre->update([
            'content' => $request->content
        ]);

        return response()->json(['success' => true, 'message' => 'Página atualizada com sucesso!']);
    }
}