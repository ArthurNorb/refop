<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Certifique-se de que o namespace do seu modelo User está correto
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str; // Não está sendo usado, pode remover se quiser

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminEmail = 'admin@refop.com';
        $adminPassword = 'REFOP2006admin'; // Lembre-se de usar uma senha forte em produção!

        $adminUser = User::where('email', $adminEmail)->first();

        if (!$adminUser) {
            // Se o usuário não existe, cria
            User::create([
                'name' => 'Administrador',
                'email' => $adminEmail,
                'email_verified_at' => now(),
                'password' => Hash::make($adminPassword),
                'is_admin' => true, // <<< CORREÇÃO AQUI: 'is_admin' em vez de 'isAdmin'
            ]);

            $this->command->info('Usuário administrador criado com sucesso!');
            $this->command->info('Email: ' . $adminEmail);
            $this->command->info('Senha: ' . $adminPassword . ' (Lembre-se de trocá-la se estiver em produção e esta for a padrão)');

        } else {
            // Se o usuário já existe, garante que ele seja admin
            // Isso é útil caso o usuário exista mas por algum motivo a flag is_admin não esteja correta
            if (!$adminUser->is_admin) {
                $adminUser->is_admin = true;
                $adminUser->save();
                $this->command->info('Usuário administrador com email ' . $adminEmail . ' já existia e foi atualizado para admin.');
            } else {
                $this->command->info('Usuário administrador com email ' . $adminEmail . ' já existe e já é admin.');
            }
        }
    }
}