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

        \App\Models\UsuarioPerfil::create([
            'nome' => 'Tipo Teste'
        ]);

        \App\Models\User::create([
            'name' => 'Usuário teste',
            'email' => 'teste@teste.com',
            'type' => 1,
            'password' => bcrypt('12345678')
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
