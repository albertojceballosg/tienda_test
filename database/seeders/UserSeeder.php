<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Alberto',
            'last_name' => 'Ceballos',
            'email' => 'albertojceballosg@gmail.com',
            'password' => bcrypt('12345678'),
            'type' => 'backend',
        ]);

        User::create([
            'first_name' => 'Amanda',
            'last_name' => 'Gonzalez',
            'email' => 'agonzalez@gmail.com',
            'password' => bcrypt('12345678'),
            'type' => 'frontend',
        ]);
    }
}
