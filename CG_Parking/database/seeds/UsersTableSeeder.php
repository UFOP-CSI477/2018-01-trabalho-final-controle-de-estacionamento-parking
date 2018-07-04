<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Caio Caldeira Vieira',
            'endereco' => 'São Salvador, 258',
            'email' => 'caiocaldeira2011@hotmail.com',
            'password' => bcrypt('123456'),
            'cpf' => 12345678912,
            'telefone' => "(31) 1111 1111",
            'nivel' => "Administrador",
        ]);
        User::create([
            'name' => 'Gabriel Magalhaes',
            'endereco' => 'Vera Cruz, 666',
            'email' => 'gabrielmagalhaes@gmail.com',
            'password' => bcrypt('123456'),
            'cpf' => 12345678921,
            'telefone' => "(31) 2222 2222",
            'nivel' => "Operador",
        ]);
        User::create([
            'name' => 'Jesus Avelino',
            'endereco' => 'Palmares, 999',
            'email' => 'jesusavelino@gmail.com',
            'password' => bcrypt('123456'),
            'cpf' => 45625874163,
            'telefone' => "(31) 3333 3333",
            'nivel' => "Usuário",
        ]);
    }
}
