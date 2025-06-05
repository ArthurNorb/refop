<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Certifique-se de que o namespace do seu modelo User está correto
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        $adminPassword = 'REFOP2006admin';

        if (User::where('email', $adminEmail)->doesntExist()) {
            User::create([
                'name' => 'Administrador',
                'email' => $adminEmail,
                'email_verified_at' => now(),
                'password' => Hash::make($adminPassword),
            ]);

            $this->command->info('Usuário administrador criado com sucesso!');
            $this->command->info('Email: ' . $adminEmail);
            $this->command->info('Senha: ' . $adminPassword);

        } else {
            $this->command->info('Usuário administrador com email ' . $adminEmail . ' já existe.');
        }
    }
}