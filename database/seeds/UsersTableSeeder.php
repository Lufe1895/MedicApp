<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Semilla de superusuario

        $user = User::create([
            'name' => 'José de Jesús',
            'last_name' => 'Santiago Figueroa',
            'email' => 'admin@example.com',
            'api_token' => Str::random(60),
            'password' => Hash::make('12345678'),
            'phone' => '12345678',
            'address' => 'Oaxaca de Juárez',
            'sex' => 'M',
            'age' => 21,
        ]);

        $user->roles()->attach(Role::where('name', 'admin')->first());

        // Semilla de Farmacias

        $user = User::create([
            'name' => 'Farmacias Similares',
            'last_name' => '',
            'email' => 'farmacia@example.com',
            'api_token' => Str::random(60),
            'password' => Hash::make('12345678'),
            'phone' => '12345678',
            'address' => 'Oaxaca de Juárez',
            'sex' => 'M',
            'age' => 26,
        ]);

        $user->roles()->attach(Role::where('name', 'user')->first());

        // Semilla de Usuario

        $user = User::create([
            'name' => 'Luis Fernando',
            'last_name' => 'Antonio Toral',
            'email' => 'user@example.com',
            'api_token' => Str::random(60),
            'password' => Hash::make('12345678'),
            'phone' => '12345678',
            'address' => 'Oaxaca de Juárez',
            'sex' => 'M',
            'age' => 26,
        ]);

        $user->roles()->attach(Role::where('name', 'user')->first());
    }
}
