<?php

// namespace Database\Seeders;

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
        DB::table('type_users')->insert([
            'tipo_usuario'=>'admin',
        ]);

        DB::table('users')->insert([
        	'name'=>'admin',
        	'lastname'=>'admin',
        	'email'=>'admin@sistema.com',
        	'password'=>bcrypt('12345678'),
            'genero' => 'masculino',
            'idtipoUsuario'=>'1',
        ]);
    }
}
