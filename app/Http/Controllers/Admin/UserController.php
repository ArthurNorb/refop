<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // Importe o modelo User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Para criptografar a senha
use Illuminate\Validation\Rules;     // Para regras de validação (ex: Password::defaults())
use Illuminate\Support\Facades\Auth; // Para verificar o usuário autenticado, se necessário
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Exibe o formulário para o administrador criar um novo usuário.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], // Garante que o email seja único na tabela 'users'
            'password' => ['required', 'confirmed', Rules\Password::defaults()], // 'confirmed' espera um campo 'password_confirmation'
            'is_admin' => ['nullable', 'boolean'], // Permite que o admin defina se o novo usuário é admin (opcional no formulário)
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->boolean('is_admin'), // Se 'is_admin' não for enviado ou for '0', será false. Se for '1', será true.
            'email_verified_at' => now(), // Opcional: marcar o email como verificado automaticamente
        ]);

        return redirect('/')
            ->with('success', 'Usuário criado com sucesso!');
    }

    public function index()
    {
        $users = User::orderBy('id')->paginate(10);
        return view('admin.users.gerenciar-usuarios', compact('users'));
    }

    public function destroy(User $user)
    {
        if (Auth::id() === $user->id) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Você não pode deletar sua própria conta de administrador!');
        }

        $userName = $user->name;
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', "Usuário '{$userName}' deletado com sucesso!");
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // 1. Validação dos dados
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()], 
            'is_admin' => ['nullable', 'boolean'],
        ]);

        $updateData = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'is_admin' => $request->boolean('is_admin'),
        ];

        if (!empty($validatedData['password'])) {
            $updateData['password'] = Hash::make($validatedData['password']);
        }

        $user->update($updateData);

        return redirect()->route('admin.users.index') ->with('success', "Dados do usuário '{$user->name}' atualizados com sucesso!");
    }
}
