<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Pharmacy;
use App\Person;
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
            'email' => 'admin@example.com',
            'api_token' => Str::random(60),
            'password' => Hash::make('12345678'),
        ]);

        $person = Person::create([
            'name' => 'José de Jesús',
            'last_name' => 'Santiago Figueroa',
            'phone' => '12345678',
            'address' => 'Oaxaca de Juárez',
            'sex' => 'M',
            'age' => 21,
            'user_id' => $user->id
        ]);

        $user->person_id = $person->id;
        $user->save();

        $user->roles()->attach(Role::where('name', 'admin')->first());

        // Semilla de Farmacias

        $user = User::create([
            'email' => 'farmacia@example.com',
            'api_token' => Str::random(60),
            'password' => Hash::make('12345678'),
        ]);

        $pharmacy = Pharmacy::create([
            'name' => 'Farmacias Similares',
            'phone' => '12345678',
            'address' => 'Oaxaca de Juárez',
            'user_id' => $user->id
        ]);

        $user->pharmacy_id = $pharmacy->id;
        $user->save();

        $user->roles()->attach(Role::where('name', 'pharmacy')->first());

        // Semilla de Usuario

        $user = User::create([
            'email' => 'user@example.com',
            'api_token' => Str::random(60),
            'password' => Hash::make('12345678'),
        ]);

        $person = Person::create([
            'name' => 'Luis Fernando',
            'last_name' => 'Antonio Toral',
            'phone' => '12345678',
            'address' => 'Oaxaca de Juárez',
            'sex' => 'M',
            'age' => 26,
            'user_id' => $user->id
        ]);

        $user->person_id = $person->id;
        $user->save();

        $user->roles()->attach(Role::where('name', 'user')->first());
    }
}
