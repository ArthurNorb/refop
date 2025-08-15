<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Republica; // 👈 Importe a sua Model

class RepublicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $republicas = [
            ['nome' => 'República Adega', 'genero' => 'masculina', 'endereco' => 'Av. Vitorino Dias, 118 - Ouro Preto, MG'],
            ['nome' => 'República Alforria', 'genero' => 'masculina', 'endereco' => 'Campus Universitário, R. Quatorze, 19 - Ouro Preto, MG'],
            ['nome' => 'República Aquarius', 'genero' => 'masculina', 'endereco' => ' R. Paraná, 26 - Ouro Preto, MG'],
            ['nome' => 'República Arca de Noé', 'genero' => 'masculina', 'endereco' => 'R. Xavier da Veiga, 164 - Ouro Preto, MG'],
            ['nome' => 'República Arte e Manha', 'genero' => 'mista', 'endereco' => 'R. Treze, 4b, Ouro Preto - MG'],
            ['nome' => 'República Bangalô', 'genero' => 'masculina', 'endereco' => 'R. das Mercês, 247 - Ouro Preto, MG'],
            ['nome' => 'República Bastilha', 'genero' => 'masculina', 'endereco' => ': R. Treze, Casa 2B - Campus Universitário, Ouro Preto - MG'],
            ['nome' => 'República Baviera', 'genero' => 'masculina', 'endereco' => 'R. dos Paulistas, 215 - Antônio Dias, Ouro Preto - MG'],
            ['nome' => 'República Bem na Boca', 'genero' => 'feminina', 'endereco' => 'R. Diogo de Vasconcelos, 87 - Pilar, Ouro Preto - MG'],
            ['nome' => 'República Boite Casablanca', 'genero' => 'masculina', 'endereco' => 'R. São José, 216 - Ouro Preto, MG'],
            ['nome' => 'República Butantan', 'genero' => 'masculina', 'endereco' => 'Praça Barão do Rio Branco, 44 - Pilar, Ouro Preto - MG'],
            ['nome' => 'República Canaan', 'genero' => 'masculina', 'endereco' => 'R. Xavier da Veiga, 29 - Ouro Preto, MG'],
            ['nome' => 'República Casanova', 'genero' => 'masculina', 'endereco' => 'Praça Barão do Rio Branco, 46, Ouro Preto - MG'],
            ['nome' => 'República Cassino', 'genero' => 'masculina', 'endereco' => 'Praça Juvenal Santos, 31 - Pilar, Ouro Preto - MG'],
            ['nome' => 'República Castelo dos Nobres', 'genero' => 'masculina', 'endereco' => 'R. Bernardo Vasconcellos - Antônio Dias, Ouro Preto - MG'],
            ['nome' => 'República Chega Mais', 'genero' => 'feminina', 'endereco' => 'R. Diogo de Vasconcelos, 87 E - Pilar, Ouro Preto - MG'],
            ['nome' => 'República Cirandinha', 'genero' => 'feminina', 'endereco' => 'R. Diogo de Vasconcelos, 87d - Ouro Preto, MG'],
            ['nome' => 'República Consulado', 'genero' => 'masculina', 'endereco' => 'R. das Mercês, 89 - Ouro Preto, MG'],
            ['nome' => 'República Convento', 'genero' => 'feminina', 'endereco' => 'Campus Universitário, Ala 1, Casa B, Universidade Federal de - Morro do Cruzeiro, Ouro Preto - MG'],
            ['nome' => 'República Cosa Nostra', 'genero' => 'masculina', 'endereco' => 'R. Quatorze, 9A - Ouro Preto, MG'],
            ['nome' => 'República Covil dos Gênios', 'genero' => 'masculina', 'endereco' => 'R. Treze, 4 - Morro do Cruzeiro, Ouro Preto - MG'],
            ['nome' => 'República Doce Mistura', 'genero' => 'feminina', 'endereco' => 'Campus Universitário, Morro do Cruzeiro, Ouro Preto - MG'],
            ['nome' => 'República dos Deuses', 'genero' => 'masculina', 'endereco' => 'R. Bernardo de Guimarães, 11 - Ouro Preto, MG'],
            ['nome' => 'República Espigão', 'genero' => 'masculina', 'endereco' => 'R. Sen. Rocha Lagoa, 35 - Centro, Ouro Preto - MG'],
            ['nome' => 'República Formigueiro', 'genero' => 'masculina', 'endereco' => 'R. Xavier da Veiga, 178 - Ouro Preto, MG'],
            ['nome' => 'República Gaiola de Ouro', 'genero' => 'masculina', 'endereco' => 'Rua Conde de Bobadela, 167 - Ouro Preto, MG'],
            ['nome' => 'República Jardim de Alá', 'genero' => 'masculina', 'endereco' => 'Rua Amália Bernhaus, 44, Ouro Prêto 35400-000'],
            ['nome' => 'República Jardim Zoológico', 'genero' => 'masculina', 'endereco' => 'R. Randolpho Bretas, 76 - Ouro Preto, MG'],
            ['nome' => 'República Koxixo', 'genero' => 'feminina', 'endereco' => 'Campus Universitario, Ala 3, Casa B, s/n - Morro do Cruzeiro'],
            ['nome' => 'República Lumiar', 'genero' => 'feminina', 'endereco' => 'Casa 4A, Campus Universitário, R. Treze, Ouro Preto - MG'],
            ['nome' => 'República Maracangalha', 'genero' => 'masculina', 'endereco' => 'R. Cláudio Manoel, 129 - Centro, Ouro Preto - MG'],
            ['nome' => 'República Maria Bonita', 'genero' => 'feminina', 'endereco' => 'Rua Doutor Claudio Lima Benedito Valadares, 109, Rosário, Ouro Preto - MG'],
            ['nome' => 'República Marragolo', 'genero' => 'masculina', 'endereco' => 'R. Prof. Ros P. Gomes, 02 - Casa - Ouro Preto, MG'],
            ['nome' => 'República Mixuruka', 'genero' => 'masculina', 'endereco' => 'Av. Lima Júnior - Ouro Preto, MG'],
            ['nome' => 'República Nau Sem Rumo', 'genero' => 'masculina', 'endereco' => 'R. Paraná, 40 - Ouro Preto, MG'],
            ['nome' => 'República Necrotério', 'genero' => 'masculina', 'endereco' => 'R. Padre Rolim, 811, Ouro Preto - MG'],
            ['nome' => 'República Ninho do Amor', 'genero' => 'masculina', 'endereco' => 'R. do Pilar, 2 - Pilar, Ouro Preto - MG'],
            ['nome' => 'República Ovelha Negra', 'genero' => 'feminina', 'endereco' => 'R. Treze, 5 - Ouro Preto, MG, Ouro Preto - MG'],
            ['nome' => 'República Palmares', 'genero' => 'feminina', 'endereco' => 'R. Treze, 4 - Ouro Preto, MG'],
            ['nome' => 'República Pasárgada', 'genero' => 'masculina', 'endereco' => 'Campus Universitário - Casa 2D - Morro do Cruzeiro, Ouro Preto - MG'],
            ['nome' => 'República Patotinha', 'genero' => 'feminina', 'endereco' => 'R. Felipe dos Santos, 212 - Antônio Dias, Ouro Preto - MG'],
            ['nome' => 'República Penitenciária', 'genero' => 'masculina', 'endereco' => 'R. Tomé Afonso, 220 - Água Limpa, Ouro Preto - MG'],
            ['nome' => 'República Peripatus', 'genero' => 'masculina', 'endereco' => 'Campus universitário, terceira ala - R. Treze, 64 - Casa D - Morro do cruzeiro, Ouro Preto - MG'],
            ['nome' => 'República Pif-Paf', 'genero' => 'masculina', 'endereco' => 'Praça Americo Lopes, R. do Pilar, 78, Ouro Preto - MG'],
            ['nome' => 'República Poleiro dos Anjos', 'genero' => 'masculina', 'endereco' => 'R. Santa Efigênia, 27 - Ouro Preto, MG'],
            ['nome' => 'República Pronto Socorro', 'genero' => 'masculina', 'endereco' => 'Praça Juvenal Santos, 21 - Ouro Preto, MG'],
            ['nome' => 'República Pulgatório', 'genero' => 'masculina', 'endereco' => 'R. Paraná, 54 - Ouro Preto, MG'],
            ['nome' => 'República Pureza', 'genero' => 'masculina', 'endereco' => 'R. das Mercês, 198 - Ouro Preto, MG'],
            ['nome' => 'República Quarto Crescente', 'genero' => 'feminina', 'endereco' => ' CAMPUS UNIVERSITARIO, CASA 1A Morro do Cruzeiro, Ouro Preto - MG'],
            ['nome' => 'República Quitandinha', 'genero' => 'masculina', 'endereco' => 'R. Teixeira Amaral, 102 - Ouro Preto, MG'],
            ['nome' => 'República Rebu', 'genero' => 'feminina', 'endereco' => 'R. do Pilar, 61 - Ouro Preto, MG'],
            ['nome' => 'República Reino de Baco', 'genero' => 'masculina', 'endereco' => 'R. das Mercês, 186 - Ouro Preto, MG'],
            ['nome' => 'República Saudade da Mamãe', 'genero' => 'masculina', 'endereco' => 'R. Dr. Cláudio de Lima, 109 - Ouro Preto, MG'],
            ['nome' => 'República Senzala', 'genero' => 'masculina', 'endereco' => 'Campus Universitário - Casa 3C - Morro do Cruzeiro, Ouro Preto - MG'],
            ['nome' => 'República Sinagoga', 'genero' => 'masculina', 'endereco' => 'R. das Mercês, 167 - Ouro Preto, MG'],
            ['nome' => 'República Tabu', 'genero' => 'masculina', 'endereco' => 'Rua Conde de Bobadela, 166 - Ouro Preto, MG'],
            ['nome' => 'República Tanto Faz', 'genero' => 'feminina', 'endereco' => 'R. Diogo de Vasconcelos, 87 - Pilar, Ouro Preto - MG'],
            ['nome' => 'República Território Xavante', 'genero' => 'masculina', 'endereco' => 'R. Conselheiro Quintiliano Maciel, 294 - Ouro Preto, MG'],
            ['nome' => 'República Tigrada', 'genero' => 'masculina', 'endereco' => 'R. Dezesseis, 1D - Bauxita, Ouro Preto - MG'],
            ['nome' => 'República Toka', 'genero' => 'feminina', 'endereco' => 'R. Dezesseis, 1C - Bauxita, Ouro Preto - MG'],
            ['nome' => 'República Unidos por Acaso', 'genero' => 'masculina', 'endereco' => 'R. Treze, 2A - Bauxita, Ouro Preto - MG'],
            ['nome' => 'República Vaticano', 'genero' => 'masculina', 'endereco' => 'R. das Mercês, 198 - Ouro Preto, MG'],
            ['nome' => 'República Verdes Mares', 'genero' => 'masculina', 'endereco' => 'Praça Juvenal Santos, 34 - Pilar, Ouro Preto - MG'],
            ['nome' => 'República Virada pra Lua', 'genero' => 'feminina', 'endereco' => 'R. Diogo de Vasconcelos, 87 - Pilar, Ouro Preto - MG'],
            ['nome' => 'República Vira Saia', 'genero' => 'masculina', 'endereco' => 'R. Treze, 4D - Bauxita, Ouro Preto - MG'],
            ['nome' => 'República Xeque-Mate', 'genero' => 'masculina', 'endereco' => 'Campus Universitário - R. Quatorze, 7A - Morro do Cruzeiro, Ouro Preto - MG'],
        ];

        foreach ($republicas as $republicaData) {
            Republica::firstOrCreate(['nome' => $republicaData['nome']], $republicaData);
        }
    }
}
