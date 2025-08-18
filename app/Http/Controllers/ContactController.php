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
        $data = $request->validate([
            'nome' => 'required|string|max:100',
            'email' => 'required|email',
            'identificacao' => 'required|string|max:50',
            'telefone' => 'required|string|max:20',
            'mensagem' => 'required|string|min:10',
        ]);

        $recipientEmail = 'refop@ufop.edu.br'; 
        
        Mail::to($recipientEmail)->send(new ContactFormMail($data));

        return redirect()->route('contato.show')->with('success', 'Sua mensagem foi enviada com sucesso!');
    }
}
