<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrador do Sistema',
            'email' => 'admin@admin',
            'password' => bcrypt('admin123@')
        ]);
    }
}
