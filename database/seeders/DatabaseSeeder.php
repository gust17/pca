<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\ServidorPublico::create([
            'nome' => 'NÃO EXCLUIR',
            'matricula' => '654654',
            'rg' => '32132123',
            'cpf' => '51634637054',
            'data_nascimento' => '1999-05-02',
            'orientacao_sexual' => 'Homossexual',
            'cor'=> 'Branca',
            'nacionalidade' => 'Afeganistão',
            'naturalidade' => 'Macapá',
            'estado_civil' => 'Solteiro(a)',
            'lotacao' => 'aaa',
            'grupo_trabalho' => 'aaa',
            'area_atuacao' => 'aaa',
            'formacao_profissional' => 'Bacharelado',
            'numero_telefone' => '87897987',
            'numero_celular'  => '87897987',
            'email' => 'teste2@teste.com',
        ]);

        \App\Models\SolicitanteExterno::create([
            'nome' => 'NÃO EXCLUIR',
            'cpf' => '09025564011',
            'rg' => '123456',
            'data_nascimento' => '1996-18-12',
            'nacionalidade' => 'Afeganistão',
            'instituicao' => 'instituicao',
            'area_atuacao' => 'area_atuacao',
            'numero_telefone' => '65465456',
            'numero_celular' => '1321231',
            'email' => 'teste@teste.com'
        ]);

        \App\Models\UsuarioPerfil::create([
            'nome' => 'Tipo Teste'
        ]);

        \App\Models\User::create([
            'email' => 'teste@teste.com',
            'type' => 'Tipo Teste',
            'password' => bcrypt('12345678'),
            'solicitante_externo_id' => 1
        ]);

        \App\Models\Endereco::create([
            'tipo_endereco' => 'via-publica',
            'cep' => '68904360',
            'logradouro' => 'Av João Guerra',
            'numero' => '1646',
            'complemento' => null,
            'bairro' => 'Congós',
            'cidade' => 'amapa',
        ]);

        \App\Models\EntidadeExterna::create([
            'nome' => 'Entidade externa teste',
            'sigla' => 'ET',
            'numero_telefone' => '9699999999',
            'email' => 'entidadeteste@teste.com',
            'nome_representante' => 'Representante teste',
            'endereco_id' => 1
        ]);
    }
}
