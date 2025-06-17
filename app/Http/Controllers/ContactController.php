<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; 

class ContactController extends Controller
{
    // Mostra a view do formulário
    public function show()
    {
        return view('contato');
    }

    // Processa o envio do formulário
    public function send(Request $request)
    {
        // 1. Validação dos campos
        $data = $request->validate([
            'nome' => 'required|string|max:100',
            'email' => 'required|email',
            'identificacao' => 'required|string|max:50',
            'telefone' => 'required|string|max:20',
            'mensagem' => 'required|string|min:10',
        ]);

        // 2. Envio do E-mail
        // O destinatário final. Por enquanto, seu email para teste.
        $recipientEmail = 'arthurnorberto4@gmail.com'; 
        
        Mail::to($recipientEmail)->send(new ContactFormMail($data));

        // 3. Redireciona de volta com uma mensagem de sucesso
        return redirect()->route('contato.show')->with('success', 'Sua mensagem foi enviada com sucesso!');
    }
}
