<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setor;

class SetorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setores = [
            [
                'nome' => 'Presidência',
                'descricao' =>
                    '<ul class="list-disc list-inside pl-5 text-gray-700 space-y-2">
                        <li>Representar a REFOP;</li>
                        <li>Presidir a Assembléia Geral e os encontros de sócios;</li>
                        <li>Cumprir e fazer cumprir o estatuto;</li>
                        <li>Garantir e avaliar a execução do programa administrativo da Diretoria Geral e o trabalho de todos os Diretores separadamente;</li>
                        <li>Buscar sempre o melhor interesse dos associados e garantir a consecução dos objetivos da Associação;</li>
                        <li>Nomear e destituir os membros das comissões.</li>
                    </ul>',
                'imagem' => null
            ],
            [
                'nome' => 'Vice-Presidência',
                'descricao' =>
                    '<ul class="list-disc list-inside pl-5 text-gray-700 space-y-2">
                        <li>Subistituir o presidente em suas faltas ou impedimentos;</li>
                        <li>Assumir o mandato, em caso de vacância, até o seu término;</li>
                        <li>Aconselhar e prestar sua colaboração ao presidente na divisão de tarefas, de um modo geral.</li>
                    </ul>',
                'imagem' => null
            ],
            [
                'nome' => 'Jurídico',
                'descricao' => 
                    '<ul class="list-disc list-inside pl-5 text-gray-700 space-y-2">
                        <li>Acessorar tecnicamente o restante da Diretoria Geral e os demais associados quanto a temas legais e processuais, sempre que solicitada ou demandada;</li>
                        <li>Acessorar a Presidência garantindo que o Estatuto seja respeitado pelos associados;</li>
                        <li>Coordenar a criação de calendário de obrigações e deveres dos associados junto à REFOP, UFOP, Prefeitura de Ouro Preto, Receita Federal e demais Instituições que se mostre necessário;</li>
                        <li>Correção de documentos junto à Diretoria Institucional.</li>
                    </ul>',
                'imagem' => null,
            ],
            [
                'nome' => 'Secretaria',
                'descricao' => 
                    '<ul class="list-disc list-inside pl-5 text-gray-700 space-y-2">
                        <li>Publicar avisos e convocações de reuniões, divulgar editais e expedir convites;</li>
                        <li>Lavrar atas de reuniões da diretoria e assembleias;</li>
                        <li>Redigir e assinar, com o presidente, correspondências oficiais da entidade</li>
                    </ul>',
                'imagem' => null,
            ],
            [
                'nome' => 'Comunicação',
                'descricao' => 
                    '<ul class="list-disc list-inside pl-5 text-gray-700 space-y-2">
                        <li>Garantir a plena comunicação entre a Diretoria Geral e os demais associados;</li>
                        <li>Viabilizar a ampla divulgação e promoção midiáticas de todas as ações e projetos da Instituição e de seus associados;</li>
                        <li>Manter constante diálogo com os veículos de comunicação local, sejam independentes ou institucionais, para melhor implementação e alcance das ações da Instituição e promoções de outras instituições que tenham o voluntariado e o desenvolvimento social como premissa</li>
                    </ul>',
                'imagem' => null,
            ],
            [
                'nome' => 'Institucional',
                'descricao' => 
                    '<ul class="list-disc list-inside pl-5 text-gray-700 space-y-2">
                        <li>Assessorar a Presidência e Vice-presidência nas diretrizes e atividades da gestão;</li>
                        <li>Realizar as tratativas de interesse da instituição junto a Administração Central da UFOP, Pró-reitorias e demais órgãos da Universidade;</li>
                        <li>Promover reuniões e resolver demais questões de interesse da Instituição e de seus associados junto a Instituições da Administração Pública, com destaque a Prefeitura de Ouro Preto e o Ministério Público;</li>
                        <li>Realizar reuniões, acordos e parcerias com instituições que corroborem para atingir os objetivos e diretrizes da REFOP;</li>
                        <li>Emitir notas públicas, ofícios, intimações aos associados, notificações, bem como contratos e acordos;</li>
                        <li>Zelar pela integração e cooperação da Instituição junto à Comunidade Ouro-pretana;</li>
                        <li>Correção de documentos junto à Diretoria de Assuntos Jurídicos.</li>
                    </ul>',
                'imagem' => null,
            ],
            [
                'nome' => 'Tesouraria',
                'descricao' => 
                    '<ul class="list-disc list-inside pl-5 text-gray-700 space-y-2">
                        <li>Arrecadar e contabilizar as contribuições dos associados, rendas, auxílios e donativos, mantendo em dia a escrituração da Instituição;</li>
                        <li>Pagar as contas autorizadas pelo Presidente;</li>
                        <li>Apresentar relatórios de receitas e despesas, sempre que forem solicitados;</li>
                        <li>Conservar, sob sua guarda e responsabilidade, os documentos relativos à tesouraria.</li>
                    </ul>',
                'imagem' => null,
            ],
            [
                'nome' => 'Eventos',
                'descricao' => 
                    '<ul class="list-disc list-inside pl-5 text-gray-700 space-y-2">
                        <li>Promover e garantir a execução de todo e qualquer projeto de caráter recreativo dos associados, viabilizando a promoção da Instituição e a integração de seus associados;</li>
                        <li>Cooperar com a execução dos projetos da Diretoria de Ações Solidárias;</li>
                        <li>Garantir a realização de qualquer evento que seja idealizado e desenvolvido pelas demais diretorias, desde que presente no Programa Administrativo ou aprovado em assembleia com maioria dos associados presentes aptos a votarem.</li>
                    </ul>',
                'imagem' => null,
            ],
        ];

        foreach ($setores as $setor) {
            Setor::create($setor);
        }
    }
}
