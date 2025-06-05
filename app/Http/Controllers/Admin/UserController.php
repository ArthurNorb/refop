<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // Importe o modelo User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Para criptografar a senha
use Illuminate\Validation\Rules;     // Para regras de validação (ex: Password::defaults())
use Illuminate\Support\Facades\Auth; // Para verificar o usuário autenticado, se necessário

class UserController extends Controller
{
    /**
     * Exibe o formulário para o administrador criar um novo usuário.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Este método simplesmente retorna a view que contém o formulário de criação.
        // Vamos assumir que a view se chama 'admin.users.create'.
        // Você precisará criar esta view na pasta resources/views/admin/users/
        return view('admin.users.create');
    }

    /**
     * Armazena um novo usuário criado pelo administrador no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], // Garante que o email seja único na tabela 'users'
            'password' => ['required', 'confirmed', Rules\Password::defaults()], // 'confirmed' espera um campo 'password_confirmation'
            'is_admin' => ['nullable', 'boolean'], // Permite que o admin defina se o novo usuário é admin (opcional no formulário)
        ]);

        // Criação do usuário
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->boolean('is_admin'), // Se 'is_admin' não for enviado ou for '0', será false. Se for '1', será true.
            'email_verified_at' => now(), // Opcional: marcar o email como verificado automaticamente
        ]);

        return redirect()->route('admin.user.index')
                         ->with('success', 'Usuário criado com sucesso!');
    }
}