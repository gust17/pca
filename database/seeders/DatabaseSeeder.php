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
            'type' => 0,
            'password' => bcrypt('12345678')
        ]);
    }
}
