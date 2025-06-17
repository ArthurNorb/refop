<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserProfileController extends Controller
{
    public function show(): View
    {
        $user = Auth::user();
        return view('perfil.meu-perfil', compact('user'));
    }

    public function edit(): View
    {
        $user = Auth::user();
        return view('perfil.editar-perfil', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id) // Garante que o email é único, exceto para o próprio usuário
            ],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'], // 'nullable' pois é opcional, 'confirmed' verifica o campo password_confirmation
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('meu-perfil')->with('success', 'Perfil atualizado com sucesso!');
    }
}
